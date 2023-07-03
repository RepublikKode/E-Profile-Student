<?php 
$conn = mysqli_connect("localhost", "root", "", "ulunpintar");

if(!$conn) {
    echo "Database Gagal Terkoneksi";
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

$getSoal = query("SELECT * FROM data_gaya_belajar");
$getPribadi = query("SELECT * FROM data_kepribadian");
$getSiswa = query("SELECT * FROM users WHERE level = 'siswa'");
$getGuru = query("SELECT * FROM users WHERE level = 'guru'");
$getHasil = query("SELECT * FROM hasil_gaya_belajar");
$getKepribadian = query("SELECT * FROM hasil_kepribadian");
$getDesc = query("SELECT * FROM deskripsi_gaya_belajar")[0];
$getDescP = query("SELECT * FROM deskripsi_kepribadian")[0];

function hitungJumlahPilihan($data) {
  $countOpsiSatu = 0;
  $countOpsiDua = 0;
  $countOpsiTiga = 0;

  foreach ($data['checkboxGroup'] as $index => $jawaban) {
    if ($index % 3 == 0) {
      $countOpsiSatu += ($jawaban == 'opsi_satu') ? 2 : 0;
    } elseif ($index % 3 == 1) {
      $countOpsiDua += ($jawaban == 'opsi_dua') ? 1 : 0;
    } elseif ($index % 3 == 2) {
      $countOpsiTiga += ($jawaban == 'opsi_tiga') ? 1 : 0;
    }
  }

  return array($countOpsiSatu, $countOpsiDua, $countOpsiTiga);
}

function tentukanGayaBelajar($countOpsiSatu, $countOpsiDua, $countOpsiTiga) {
  $threshold = 3; // Threshold for determining "sama banyak" (adjust as needed)

  if ($countOpsiSatu > $countOpsiDua + $threshold && $countOpsiSatu > $countOpsiTiga + $threshold) {
    return "visual";
  } else if ($countOpsiDua > $countOpsiSatu + $threshold && $countOpsiDua > $countOpsiTiga + $threshold) {
    return "auditori";
  } else if ($countOpsiTiga > $countOpsiSatu + $threshold && $countOpsiTiga > $countOpsiDua + $threshold) {
    return "kinestetik";
  } else if (abs($countOpsiSatu - $countOpsiDua) <= $threshold) {
    return "visual auditori";
  } else if (abs($countOpsiSatu - $countOpsiTiga) <= $threshold) {
    return "visual kinestetik";
  } else if (abs($countOpsiDua - $countOpsiSatu) <= $threshold) {
    return "auditori visual";
  } else if (abs($countOpsiDua - $countOpsiTiga) <= $threshold) {
    return "auditori kinestetik";
  } else if (abs($countOpsiTiga - $countOpsiSatu) <= $threshold) {
    return "kinestetik visual";
  } else if (abs($countOpsiTiga - $countOpsiDua) <= $threshold) {
    return "kinestetik auditori";
  } else if (abs($countOpsiSatu - $countOpsiDua) <= $threshold && abs($countOpsiSatu - $countOpsiTiga) <= $threshold && abs($countOpsiDua - $countOpsiTiga) <= $threshold) {
    return "visual kinestik auditori";
  } else {
    // Default case
    return "lainnya";
  }
}


function gayaBelajar($data) {
  global $conn;

  $fullname = $_SESSION['fullname'];
  $username = $_SESSION['username'];
  $level = $_SESSION['level'];

  $jawaban = $data['checkboxGroup'];

  // Menghitung jumlah opsi pertama, kedua, dan ketiga yang dipilih
  $counter = array(
    'opsi_satu' => 0,
    'opsi_dua' => 0,
    'opsi_tiga' => 0
  );

  // Menghitung jumlah jawaban untuk setiap gaya belajar
  foreach ($jawaban as $index => $pilihan) {
    if ($pilihan == 'opsi_satu') {
      $counter['opsi_satu']++;
    } elseif ($pilihan == 'opsi_dua') {
      $counter['opsi_dua']++;
    } elseif ($pilihan == 'opsi_tiga') {
      $counter['opsi_tiga']++;
    }
  }

  // Menentukan gaya belajar berdasarkan jumlah jawaban
  $gayaBelajar = tentukanGayaBelajar($counter['opsi_satu'], $counter['opsi_dua'], $counter['opsi_tiga']);

  // Menyimpan hasil ke database
  $query = "INSERT INTO hasil_gaya_belajar (user, unik, level, soal_1, soal_2, soal_3, soal_4, soal_5, soal_6, soal_7, soal_8, soal_9, soal_10, soal_11, soal_12, soal_13, soal_14, soal_15, gaya_belajar) VALUES ('$fullname', '$username', '$level', ";

  foreach ($jawaban as $index => $jawaban) {
    $query .= "'$jawaban'";

    if ($index < 14) {
      $query .= ", ";
    }
  }

  $query .= ", '$gayaBelajar')";

  mysqli_query($conn, $query);

  // Menambahkan data gaya_belajar ke array $data
  $data['gaya_belajar'] = $gayaBelajar;
  return $gayaBelajar;
}


if (isset($_POST["submitBelajar"])) {
  // Cek apakah tombol submit sudah ditekan atau belum
  $gayaBelajar = gayaBelajar($_POST);

  if ($gayaBelajar != 'lainnya') {
    $_SESSION['hasilGayaBelajar'] = true;
    // Redirect ke halaman hasil dengan mengirim data gaya_belajar melalui URL
    header("Location: ../pages/hasilGayaBelajar.php?gaya_belajar=" . urlencode($gayaBelajar));
    exit();
  } else {
    echo "<script>
            alert('Gagal');
            window.location.href = '../views/beranda.php';
          </script>";
  }
}


function jumlahPilihan($data) {
  $opsiSatu = 0;
  $opsiDua = 0;
  $opsiTiga = 0;
  $opsiEmpat = 0;

  foreach ($data['checkboxGroup'] as $index => $jawaban) {
    if ($index % 3 == 0) {
      $opsiSatu += ($jawaban == 'opsi_satu') ? 2 : 0;
    } elseif ($index % 3 == 1) {
      $opsiDua += ($jawaban == 'opsi_dua') ? 1 : 0;
    } elseif ($index % 3 == 2) {
      $opsiTiga += ($jawaban == 'opsi_tiga') ? 1 : 0;
    } elseif ($index % 3 == 3) {
      $opsiEmpat += ($jawaban == 'opsi_empat') ? 1 : 0;
    }
  }

  return array($opsiSatu, $opsiDua, $opsiTiga, $opsiEmpat);
}

function tentukanKepribadian($opsiSatu, $opsiDua, $opsiTiga, $opsiEmpat)
{
  $threshold = 3; // Threshold for determining "sama banyak" (adjust as needed)

  if ($opsiSatu > $opsiDua + $threshold && $opsiSatu > $opsiTiga + $threshold && $opsiSatu > $opsiEmpat + $threshold) {
    return "Dominance";
  } else if ($opsiDua > $opsiSatu + $threshold && $opsiDua > $opsiTiga + $threshold && $opsiDua > $opsiEmpat + $threshold) {
    return "Influence";
  } else if ($opsiTiga > $opsiSatu + $threshold && $opsiTiga > $opsiDua + $threshold && $opsiTiga > $opsiEmpat + $threshold) {
    return "Steadiness";
  } else if ($opsiEmpat > $opsiSatu + $threshold && $opsiEmpat > $opsiDua + $threshold && $opsiEmpat > $opsiTiga + $threshold) {
    return "Conscientiousness";
  } else if (abs($opsiSatu - $opsiDua) <= $threshold) {
    return "Dominance-Influence";
  } else if (abs($opsiSatu - $opsiTiga) <= $threshold) {
    return "Dominance-Steadiness";
  } else if (abs($opsiSatu - $opsiEmpat) <= $threshold) {
    return "Dominance-Conscientiousness";
  } else if (abs($opsiDua - $opsiSatu) <= $threshold) {
    return "Influence-Dominance";
  } else if (abs($opsiDua - $opsiTiga) <= $threshold) {
    return "Influence-Steadiness";
  } else if (abs($opsiDua - $opsiEmpat) <= $threshold) {
    return "Influence-Conscientiousness";
  } else if (abs($opsiTiga - $opsiSatu) <= $threshold) {
    return "Steadiness-Dominance";
  } else if (abs($opsiTiga - $opsiDua) <= $threshold) {
    return "Steadiness-Influance";
  } else if (abs($opsiTiga - $opsiEmpat) <= $threshold) {
    return "Steadiness-Conscientiousness";
  } else if (abs($opsiEmpat - $opsiSatu) <= $threshold) {
    return "Conscientiousness-Dominance";
  } else if (abs($opsiEmpat - $opsiDua) <= $threshold) {
    return "Conscientiousness-Influence";
  } else if (abs($opsiEmpat - $opsiTiga) <= $threshold) {
    return "Conscientiousness-Steadiness";
  } else {
    // Default case
    return "Lainnya";
  }
}


function kepribadian($data)
{
  global $conn;

  $fullname = $_SESSION['fullname'];
  $username = $_SESSION['username'];
  $level = $_SESSION['level'];

  $jawaban = $data['checkboxGroup']; // Ambil jawaban dari data

  $counter = array(
    'opsi_satu' => 0,
    'opsi_dua' => 0,
    'opsi_tiga' => 0,
    'opsi_empat' => 0
  );

  // Menghitung jumlah jawaban untuk setiap gaya belajar
  foreach ($jawaban as $index => $pilihan) {
    if ($pilihan == 'opsi_satu') {
      $counter['opsi_satu']++;
    } elseif ($pilihan == 'opsi_dua') {
      $counter['opsi_dua']++;
    } elseif ($pilihan == 'opsi_tiga') {
      $counter['opsi_tiga']++;
    } elseif ($pilihan == 'opsi_empat') {
      $counter['opsi_empat']++;
    }
  }
    // Menentukan gaya belajar berdasarkan jumlah jawaban
    $kepribadian = tentukanKepribadian($counter['opsi_satu'], $counter['opsi_dua'], $counter['opsi_tiga'], $counter['opsi_empat']);

  $query = "INSERT INTO hasil_kepribadian (user, unik, level, soal_1, soal_2, soal_3, soal_4, soal_5, soal_6, soal_7, soal_8, soal_9, soal_10, soal_11, soal_12, kepribadian) VALUES ('$fullname', '$username', '$level', ";

  foreach ($jawaban as $index => $jawaban) {
    $query .= "'$jawaban'";

    if ($index < 11) {
      $query .= ", ";
    }
  }

  $query .= ", '$kepribadian')";

  mysqli_query($conn, $query);

  return $kepribadian;
}

if(isset($_POST["submitKepribadian"])) {

  $kepribadian = kepribadian($_POST);

  // cek apakah tombol submit sudah ditekan atau belum
  if(kepribadian($_POST) > 0 ) {
    $_SESSION['hasilKepribadian'] = true;
    header("Location: ../pages/hasilKepribadian.php?kepribadian=" . urlencode($kepribadian));
    exit();
  } else {
    $_SESSION['hasilKepribadian'] = true;
    header("Location: ../pages/hasilKepribadian.php?kepribadian=" . urlencode($kepribadian));
    exit();
  }
}

function editProfile($data) {
  global $conn; 

  $id = $data["id"];
  $fullname = htmlspecialchars($data['fullnameInput']);
  $username = htmlspecialchars($data['usernameInput']);

  $query = "UPDATE users SET 
                id = '$id',
                fullname = '$fullname',
                username = '$username'
           WHERE id = $id
  ";

   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);

}

if (isset($_POST['editProfile'])) {
  if (editProfile($_POST) > 0) {
    echo "
    <script>
      alert('Profile Diperbarui');
      window.location.href = '../views/';
    </script>
    ";
  }
}

function findBelajar($keyword) {
  $query = "SELECT * FROM hasil_gaya_belajar
                      WHERE 
            id LIKE '%$keyword%' OR
            user LIKE '%$keyword%' OR
            unik LIKE '%$keyword%' OR
            gaya_belajar LIKE '%$keyword%'
           ";
  return query($query);
}

function findPribadi($keyword) {
  $query = "SELECT * FROM hasil_kepribadian
                      WHERE 
            id LIKE '%$keyword%' OR
            user LIKE '%$keyword%' OR
            unik LIKE '%$keyword%' OR
            kepribadian LIKE '%$keyword%'
           ";
  return query($query);
}

function findUser($keyword) {
  $query = "SELECT * FROM Users
                      WHERE 
            id LIKE '%$keyword%' OR
            fullname LIKE '%$keyword%' OR
            username LIKE '%$keyword%'
           ";
  return query($query);
}

function register($data) {
    global $conn;

    $fullname = stripslashes($data["fullname"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $level = mysqli_real_escape_string($conn, $data["level"]);

    // Cek apakah username sudah terdaftar
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            alert('Username sudah terdaftar!');
        </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi password tidak sesuai');
        </script>";

        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru ke database
    $query = "INSERT INTO users (fullname, username, password, level) VALUES ('$fullname', '$username', '$password', '$level')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>