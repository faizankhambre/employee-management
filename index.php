<?php
require_once 'config/db.php';
include 'includes/header.php';

// Pagination setup
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Search setup
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sql = "SELECT * FROM employees";
$params = [];

if ($search) {
    $sql .= " WHERE name LIKE :search OR email LIKE :search OR position LIKE :search";
    $params['search'] = "%$search%";
}
$sql .= " ORDER BY created_at DESC LIMIT $start, $limit";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$employees = $stmt->fetchAll();

// Count total records
$countSql = "SELECT COUNT(*) FROM employees";
if ($search) {
    $countSql .= " WHERE name LIKE :search OR email LIKE :search OR position LIKE :search";
}
$countStmt = $pdo->prepare($countSql);
$countStmt->execute($params);
$total = $countStmt->fetchColumn();
$totalPages = ceil($total / $limit);
?>

<h2 class="text-center mb-4">Employee List</h2>

<form method="get" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search by name/email/position" value="<?= htmlspecialchars($search) ?>">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>

<div class="table-responsive">
<table class="table table-bordered table-hover align-middle">
    <thead class="table-light">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($employees): ?>
            <?php foreach ($employees as $emp): ?>
                <tr>
                    <td><?= htmlspecialchars($emp['name']) ?></td>
                    <td><?= htmlspecialchars($emp['email']) ?></td>
                    <td><?= htmlspecialchars($emp['position']) ?></td>
                    <td><?= htmlspecialchars($emp['created_at']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $emp['id'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i>Edit</a>
                    
                        <a href="delete.php?id=<?= $emp['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this employee?')"><i class="bi bi-trash-fill"></i>Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" class="text-center">No employees found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
</div>

<!-- Pagination -->
<nav>
  <ul class="pagination justify-content-center">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>

<?php include 'includes/footer.php'; ?>
