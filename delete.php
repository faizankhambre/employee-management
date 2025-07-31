<?php
require_once 'config/db.php';
include 'includes/header.php';

$id = $_GET['id'] ?? null;
$success = '';
$error = '';

// Step 1: Check if ID is valid
if (!$id || !is_numeric($id)) {
    echo "<div class='alert alert-danger'>Invalid Employee ID.</div>";
    include 'includes/footer.php';
    exit;
}

// Step 2: Fetch the employee for confirmation
$stmt = $pdo->prepare("SELECT * FROM employees WHERE id = :id");
$stmt->execute([':id' => $id]);
$employee = $stmt->fetch();

if (!$employee) {
    echo "<div class='alert alert-danger'>Employee not found.</div>";
    include 'includes/footer.php';
    exit;
}

// Step 3: Handle confirmation and deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $delete = $pdo->prepare("DELETE FROM employees WHERE id = :id");
        $delete->execute([':id' => $id]);
        $success = "Employee deleted successfully.";

        // Redirect to index after success (optional delay)
        echo "<div class='alert alert-success'>$success</div>";
        echo "<script>setTimeout(() => window.location.href='index.php', 1500);</script>";
        include 'includes/footer.php';
        exit;
    } catch (PDOException $e) {
        $error = "Delete failed: " . $e->getMessage();
    }
}
?>

<h2 class="text-center mb-4">Delete Employee</h2>

<?php if ($error): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<div class="card-form text-center">
    <p>Are you sure you want to delete <strong><?= htmlspecialchars($employee['name']) ?></strong>?</p>
    <form method="POST" class="row g-3">
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>


<?php include 'includes/footer.php'; ?>
