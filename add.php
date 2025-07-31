<?php
require_once 'config/db.php';
include 'includes/header.php';

// Flash message variables
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $position = trim($_POST['position'] ?? '');

    // Basic Validation
    if (empty($name) || empty($email) || empty($position)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // Insert into DB using prepared statements
        try {
            $stmt = $pdo->prepare("INSERT INTO employees (name, email, position) VALUES (:name, :email, :position)");
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':position' => $position
            ]);
            $success = "Employee added successfully.";
            // Clear form after success
            $name = $email = $position = '';
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $error = "Email already exists.";
            } else {
                $error = "Error: " . $e->getMessage();
            }
        }
    }
}
?>

<h2 class="text-center mb-4">Add Employee</h2>

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
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($name ?? '') ?>" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email ?? '') ?>" required>
        </div>
        <div class="col-md-6">
            <label for="position" class="form-label">Position<span class="text-danger">*</span></label>
            <input type="text" name="position" class="form-control" value="<?= htmlspecialchars($position ?? '') ?>" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Add Employee</button>
            <a href="index.php" class="btn btn-secondary">Back to List</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
