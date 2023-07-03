<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex flex-column">
  <div class="container-fluid">
    <a class="navbar-brand" href="../">Ulun Pintar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="../">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../views/mainMenu.php">Tes Minat Bakat</a>
          </li>
          <?php if (isset($_SESSION["login"]) && $_SESSION["level"] == "guru") : ?>
            <li class="nav-item">
              <a class="nav-link active" href="../guru/dashboardGuru.php">Guru</a>
            </li>
          <?php endif; ?>
          <?php if (isset($_SESSION["fullname"])) : ?>
          <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> -->
          <li>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                  <?php echo $_SESSION["fullname"]; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item" href="../pages/profile.php?id=<?= $_SESSION['loginId']; ?>">Profile</a></li>
                  <li><a class="dropdown-item bg-danger" href="../private/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <?php if (!isset($_SESSION["login"])) : ?>
            <li class="nav-item">
              <a class="nav-link active bg-success text-white rounded mx-2 d-flex align-items-center gap-2" href="../pages/login.php">Login</a>
            </li>
          <?php else : ?>
            <!-- <li class="nav-item">
              <a class="nav-link active bg-danger text-white rounded mx-2 d-flex align-items-center gap-2" href="../pages/logout.php">Logout</a>
            </li> -->
          <?php endif; ?>
        </>
      </ul>
  </div>
</nav>