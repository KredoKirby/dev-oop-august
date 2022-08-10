<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="dashboard.php" class="navbar-brand ms-3">
        <h1 class="h5">The Company</h1>
    </a>

    <div class="ms-auto">
        <ul class="navbar-nav me-3">
            <li class="nav-item">
                <a href="profile.php" class="nav-link">
                    <?= $_SESSION['username'];?>
                </a>
            </li>

            <li class="nav-item">
                <a href="../actions/logout.php" class="nav-link text-danger">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>