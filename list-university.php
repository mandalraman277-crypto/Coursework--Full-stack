<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login-form.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Universities</title>

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >

  <style>
    body {
      background: #f4f6f9;
    }

    .table-card {
      background: #ffffff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .custom-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 10px;
    }

    .custom-table thead th {
      background: #1f2937;
      color: white;
      padding: 12px;
      border: none;
      font-size: 14px;
      text-transform: uppercase;
    }

    .custom-table tbody tr {
      background: #ffffff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      border-radius: 10px;
      transition: 0.3s;
    }

    .custom-table tbody tr:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }

    .custom-table td {
      padding: 14px;
      border: none;
      vertical-align: middle;
    }

    .custom-table td:first-child {
      border-radius: 10px 0 0 10px;
    }

    .custom-table td:last-child {
      border-radius: 0 10px 10px 0;
    }

    .university-link {
      font-weight: 600;
      color: #2563eb;
      text-decoration: none;
    }

    .university-link:hover {
      text-decoration: underline;
    }

    .rating-badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: bold;
      color: white;
    }

    .rating-high { background: #16a34a; }
    .rating-mid { background: #f59e0b; }
    .rating-low { background: #ef4444; }

    .btn-edit {
      background: #fbbf24;
      border: none;
    }

    .btn-delete {
      border: 1px solid #ef4444;
      color: #ef4444;
    }

    .btn-delete:hover {
      background: #ef4444;
      color: white;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">List of ALL Universities!!!</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <div class="ms-auto d-flex align-items-center">

        <!-- Search -->
        <form class="d-flex me-3" action="search-university.php" method="post">
          <input class="form-control form-control-sm me-2"
                 type="text" name="keywords" placeholder="Search">
          <button class="btn btn-sm btn-outline-light">Go!</button>
        </form>

        <!-- Username -->
        <span class="text-white me-3">
          Logged in as <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>
        </span>

        <!-- AJAX features -->
        <ul class="navbar-nav me-3">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="ajaxDropdown"
               role="button" data-bs-toggle="dropdown" aria-expanded="false">
              AJAX Features
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="ajaxDropdown">
              <li><a class="dropdown-item" href="bootstrap-ajax-dropdown.html">Dropdown Example</a></li>
              <li><a class="dropdown-item" href="bootstrap-ajax-modal.html">Modal Example</a></li>
            </ul>
          </li>
        </ul>

        <!-- Logout -->
        <a class="btn btn-sm btn-danger" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</nav>

<!-- CONTENT -->
<div class="container my-4">

<?php
include("db.php");

$sql = "SELECT * FROM university ORDER BY established_date";
$results = mysqli_query($mysqli, $sql);

if (!$results) {
    die("Database error: " . htmlspecialchars(mysqli_error($mysqli)));
}
?>

<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Universities</h1>
  <a href="add-university-form.php" class="btn btn-success btn-sm">
    + Add a university
  </a>
</div>

<!-- TABLE -->
<div class="table-card">
  <table class="custom-table">
    <thead>
      <tr>
        <th>University</th>
        <th>Rating</th>
        <th style="width:200px;">Actions</th>
      </tr>
    </thead>

    <tbody>
      <?php while ($a_row = mysqli_fetch_assoc($results)): ?>
        <?php
          $rating = (int)$a_row['rating'];
          if ($rating >= 8) $class = "rating-high";
          elseif ($rating >= 5) $class = "rating-mid";
          else $class = "rating-low";
        ?>
        <tr>
          <td>
            <a class="university-link"
               href="university-details.php?id=<?= (int)$a_row['university_id'] ?>">
              <?= htmlspecialchars($a_row['university_name']) ?>
            </a>
          </td>

          <td>
            <span class="rating-badge <?= $class ?>">
              <?= $rating ?>
            </span>
          </td>

          <td>
            <a class="btn btn-sm btn-edit"
               href="edit-university-form.php?id=<?= (int)$a_row['university_id'] ?>">
              Edit
            </a>

            <a class="btn btn-sm btn-delete ms-1"
               href="delete-university.php?id=<?= (int)$a_row['university_id'] ?>">
              Delete
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
