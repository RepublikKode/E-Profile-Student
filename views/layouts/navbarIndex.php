<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex flex-column">
  <div class="container-fluid">
    <img src="assets/icon/smkn2.png" alt="smkn2" width="45" height="45"> &nbsp;&nbsp;&nbsp;
    <a class="navbar-brand fw-bold" href="../">E-<span class="text-warning border-bottom border-5">Profile Student</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto"> <!-- Menggunakan class 'me-auto' untuk memposisikan menu di sisi kiri -->
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Beranda</a>
        </li>
        <?php if (isset($_SESSION["login"]) && $_SESSION["level"] == "guru") : ?>
          <li class="nav-item">
            <a class="nav-link active" href="guru/dashboardGuru.php">Guru</a>
          </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav">
        <?php if (isset($_SESSION["fullname"])) : ?>
          <li class="nav-item">
            <div class="dropdown">
            <a class="btn btn-dark dropdown-toggle d-flex flex-row align-items-center gap-1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="assets/profile/<?= $_SESSION['gambarLogin']; ?>" alt="profile"  class="img-fluid rounded-circle bg-white" style="width: 35px; height: 35px;">
                <div class="border-bottom border-2">
                  <?php echo $_SESSION["fullname"]; ?>(<?= $_SESSION['level']; ?>)
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="pages/profile.php?id=<?= $_SESSION['loginId']; ?>">Profile</a></li>
                <li><a class="dropdown-item bg-danger" href="private/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </div>
          </li>
        <?php endif; ?>
        <?php if (!isset($_SESSION["login"])) : ?>
          <li class="nav-item">
            <a class="nav-link active bg-success text-white rounded mx-2 d-flex align-items-center gap-2" href="pages/login.php">Login</a>
          </li>
        <?php else : ?>
          <!-- <li class="nav-item">
            <a class="nav-link active bg-danger text-white rounded mx-2 d-flex align-items-center gap-2" href="../pages/logout.php">Logout</a>
          </li> -->
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
