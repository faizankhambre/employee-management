<?php
require_once 'config/db.php';
include 'includes/header.php';

$id = $_GET['id'] ?? null;
$success = '';
$error = '';

// Step 1: Check if ID is valid and fetch existing employee
if (!$id || !is_numeric($id)) {
    echo "<div class='alert alert-danger'>Invalid Employee ID.</div>";
    include 'includes/footer.php';
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM employees WHERE id = :id");
$stmt->execute([':id' => $id]);
$employee = $stmt->fetch();

if (!$employee) {
    echo "<div class='alert alert-danger'>Employee not found.</div>";
    include 'includes/footer.php';
    exit;
}

// Step 2: Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $position = trim($_POST['position'] ?? '');

    // Validate
    if (empty($name) || empty($email) || empty($position)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        try {
            // Check for duplicate email (excluding current employee)
            $check = $pdo->prepare("SELECT id FROM employees WHERE email = :email AND id != :id");
            $check->execute([':email' => $email, ':id' => $id]);

            if ($check->rowCount() > 0) {
                $error = "Email already exists for another employee.";
            } else {
                $update = $pdo->prepare("UPDATE employees SET name = :name, email = :email, position = :position WHERE id = :id");
                $update->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':position' => $position,
                    ':id' => $id
                ]);
                $success = "Employee updated successfully.";
                // Refresh data after update
                $employee = ['name' => $name, 'email' => $email, 'position' => $position];
            }
        } catch (PDOException $e) {
            $error = "Update failed: " . $e->getMessage();
        }
    }
}
?>

<h2 class="text-center mb-4">Edit Employee</h2>

<?php if ($success): ?>
    <div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>
<?php if ($error): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<div class="card-form">
    <form method="POST" class="row g-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Full Name<span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($employee['name']) ?>" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($employee['email']) ?>" required>
        </div>
        <div class="col-md-6">
            <label for="position" class="form-label">Position<span class="text-danger">*</span></label>
            <input type="text" name="position" class="form-control" value="<?= htmlspecialchars($employee['position']) ?>" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update Employee</button>
            <a href="index.php" class="btn btn-secondary">Back to List</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
