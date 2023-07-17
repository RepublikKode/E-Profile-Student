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
$getMenu = query("SELECT * FROM menu");
$getKolomA = query("SELECT * FROM soal_minat_belajar WHERE kolom = 'kolom a'");
$getKolomB = query("SELECT * FROM soal_minat_belajar WHERE kolom = 'kolom b'");
$getKolomC = query("SELECT * FROM soal_minat_Belajar WHERE kolom = 'kolom c'");
$getKolomD = query("SELECT * FROM soal_minat_Belajar WHERE kolom = 'kolom d'");
$getKolomE = query("SELECT * FROM soal_minat_Belajar WHERE kolom = 'kolom e'");
$getKolomF = query("SELECT * FROM soal_minat_Belajar WHERE kolom = 'kolom f'");
$getKolomG = query("SELECT * FROM soal_minat_Belajar WHERE kolom = 'kolom g'");
$getKolomH = query("SELECT * FROM soal_minat_belajar WHERE kolom = 'kolom h'");
$getDescM = query("SELECT * FROM deskripsi_minat_belajar")[0];

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

  $id = $data['id'];
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
  $query = "UPDATE users SET gayaBelajar = '$gayaBelajar' WHERE id = $id";

  mysqli_query($conn, $query);

  // Mengembalikan hasil gaya belajar
  return $gayaBelajar;
}

if (isset($_POST["submitBelajar"])) {
  // Cek apakah tombol submit sudah ditekan atau belum
  $gayaBelajar = gayaBelajar($_POST);

  if ($gayaBelajar != 'lainnya') {
    $_SESSION['hasilGayaBelajar'] = true;

    // Update kolom gayaBelajar di tabel users
    $id = $_SESSION['loginId'];
    $query = "UPDATE users SET gayaBelajar = '$gayaBelajar' WHERE id = $id";
    mysqli_query($conn, $query);

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
    if ($index % 4 == 0) {
      $opsiSatu += ($jawaban == 'opsi_satu') ? 2 : 0;
    } elseif ($index % 4 == 1) {
      $opsiDua += ($jawaban == 'opsi_dua') ? 1 : 0;
    } elseif ($index % 4 == 2) {
      $opsiTiga += ($jawaban == 'opsi_tiga') ? 1 : 0;
    } elseif ($index % 4 == 3) {
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
  } else if (abs($opsiSatu - $opsiDua) <= $threshold && $opsiSatu > $opsiTiga + $threshold && $opsiDua > $opsiEmpat + $threshold) {
    return "Dominance-Influence";
  } else if (abs($opsiSatu - $opsiDua) <= $threshold && $opsiSatu > $opsiEmpat + $threshold) {
    return "Dominance-Conscientiousness";
  } else if (abs($opsiSatu - $opsiTiga) <= $threshold && $opsiSatu > $opsiDua + $threshold) {
    return "Dominance-Steadiness";
  } else if (abs($opsiSatu - $opsiEmpat) <= $threshold && $opsiSatu > $opsiDua + $threshold) {
    return "Dominance-Conscientiousness";
  } else if (abs($opsiDua - $opsiTiga) <= $threshold && $opsiDua > $opsiSatu + $threshold && $opsiDua > $opsiEmpat + $threshold) {
    return "Influence-Steadiness";
  } else if (abs($opsiDua - $opsiEmpat) <= $threshold && $opsiDua > $opsiTiga + $threshold) {
    return "Influence-Conscientiousness";
  } else if (abs($opsiTiga - $opsiEmpat) <= $threshold && $opsiTiga > $opsiSatu + $threshold && $opsiEmpat > $opsiDua + $threshold) {
    return "Steadiness-Conscientiousness";
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

  $query = "INSERT INTO hasil_kepribadian (user, unik, level, soal_1, soal_2, soal_3, soal_4, soal_5, soal_6, soal_7, soal_8, soal_9, soal_10, soal_11, soal_12, soal_13, soal_14, soal_15, kepribadian) VALUES ('$fullname', '$username', '$level', ";

  foreach ($jawaban as $index => $jawaban) {
    $query .= "'$jawaban'";

    if ($index < count($data['checkboxGroup']) - 1) {
      $query .= ", ";
    }
  }

  $query .= ", '$kepribadian')";

  mysqli_query($conn, $query);

  // Menambahkan hasil kepribadian ke dalam data yang dikembalikan
  $data['kepribadian'] = $kepribadian;
  return $kepribadian;
}


if (isset($_POST["submitKepribadian"])) {
  // Cek apakah tombol submit sudah ditekan atau belum
  $kepribadian = kepribadian($_POST);

  if ($kepribadian != 'lainnya') {
    $_SESSION['kepribadian'] = true;
    // Redirect ke halaman hasil dengan mengirim data gaya_belajar melalui URL
    $id = $_SESSION['loginId'];
    $query = "UPDATE users SET kepribadian = '$kepribadian' WHERE id = $id";
    mysqli_query($conn, $query);
    header("Location: ../pages/hasilKepribadian.php?kepribadian=" . urlencode($kepribadian));
    exit();
  } else {
    echo "<script>
            alert('Gagal');
            window.location.href = '../views/beranda.php';
          </script>";
  }
}

function calculateTotalPoin($jawaban, $nilaiJawaban)
{
    $totalPoin = 0;

    foreach ($jawaban as $mb) {
        if (isset($nilaiJawaban[$mb])) {
            $totalPoin += $nilaiJawaban[$mb];
        }
    }

    return $totalPoin;
}

function determineIntelligence($kolom, $nilaiJawaban)
{
    $totalPoin = array();

    foreach ($kolom as $namaKolom => $jawaban) {
        $totalPoin[$namaKolom] = calculateTotalPoin($jawaban, $nilaiJawaban);
    }

    $kecerdasan = '';

    foreach ($totalPoin as $namaKolom => $poin) {
        if ($poin > 0) {
            if (empty($kecerdasan) || $poin > $totalPoin[$kecerdasan]) {
                $kecerdasan = $namaKolom;
            } elseif ($poin == $totalPoin[$kecerdasan]) {
                $kecerdasan .= ', ' . $namaKolom;
            }
        }
    }

    if (empty($kecerdasan)) {
        $kecerdasan = 'Tidak dapat menentukan kecerdasan utama';
    }

    return $kecerdasan;
}

function determineUserIntelligence($jawabanA, $jawabanB, $jawabanC, $jawabanD, $jawabanE, $jawabanF, $jawabanG, $jawabanH)
{
    $nilaiJawaban = array(
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5
    );

    $kolom = array(
        'Kecerdasan Linguistik' => $jawabanA,
        'Kecerdasan Matematis' => $jawabanB,
        'Kecerdasan Spasial' => $jawabanC,
        'Kecerdasan Kinestetik' => $jawabanD,
        'Kecerdasan Musikal' => $jawabanE,
        'Kecerdasan Interpersonal' => $jawabanF,
        'Kecerdasan Intrapersonal' => $jawabanG,
        'Kecerdasan Naturalis' => $jawabanH
    );

    $kecerdasan = determineIntelligence($kolom, $nilaiJawaban);

    return $kecerdasan;
}

function updateUserIntelligence($userId, $kecerdasan)
{
    global $conn;

    $query = "UPDATE users SET kecerdasan = '$kecerdasan' WHERE id = $userId";

    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['editProfile'])) {
  $id = $_POST['id'];
  $fullname = htmlspecialchars($_POST['fullnameInput']); 
  $username = htmlspecialchars($_POST['usernameInput']);
  $gambarLama = $_POST['gambarLama'];
  

  if ($_FILES['gambarInput']['error'] === 4) {
    $gambarInput = $gambarLama;
  } else {
    $gambarInput = upload(); // Execute the upload() function to get the uploaded file name
    $_SESSION['gambarLogin'] = $gambarInput;
  }
  
  $_SESSION['fullname'] = $fullname;
  $_SESSION['username'] = $username;

  // Update the SQL query to use the new file name directly
  $query = "UPDATE users SET 
                id = '$id',
                fullname = '$fullname',
                username = '$username',
                gambar = '$gambarInput'
           WHERE id = $id
  ";

  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0) {
    echo "
    <script>
      alert('Profile Diperbarui');
      window.location.href = 'profile.php';
    </script>
    ";
  } else {
    echo "
    <script>
      alert('Gagal mengunggah gambar');
      window.location.href = 'profile.php';
    </script>
    ";
  }
}


function upload() {
  $fileName = $_FILES['gambarInput']['name'];
  $fileSize = $_FILES['gambarInput']['size'];
  $error = $_FILES['gambarInput']['error'];
  $tmpName = $_FILES['gambarInput']['tmp_name'];

  // check
  if($error === 4) {
      echo "<script>
              alert('Anda Tidak Menambahkan Gambar');
           </script>";
      return false;
  }

      // check
  $extensionValidImage = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
  $extensionImage = explode('.', $fileName);
  $extensionImage = strtolower(end($extensionImage));

  if(!in_array($extensionImage, $extensionValidImage)) {
      echo "<script>
          alert('Yang Anda Upload Bukan Gambar');
      </script>";
      return false;
  }

  // check[size]
  if($fileSize > 5000000 ) {
      echo "<script>
          alert('Size Gambar Terlalu Besar');
      </script>";
  return false;
  }

  //Generate New Name
  $newFileName = uniqid();
  $newFileName .= '.';
  $newFileName .= $extensionImage;

  // Ready to Upload
  move_uploaded_file($tmpName, '../assets/profile/' .$newFileName);
  return $newFileName;

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

function getDataSoal()
{
  // Kode untuk mengambil data soal dari sumbernya (database, file, API, dll.)
  // ...
  // Misalnya, hasil data soal disimpan dalam array multidimensi
  $soal = array(
    array('judul' => 'Soal 1', 'pertanyaan' => 'Pertanyaan 1', 'opsi' => array('Opsi A', 'Opsi B', 'Opsi C', 'Opsi D')),
    array('judul' => 'Soal 2', 'pertanyaan' => 'Pertanyaan 2', 'opsi' => array('Opsi A', 'Opsi B', 'Opsi C', 'Opsi D')),
    // ...
    // Daftar soal lainnya
  );

  return $soal;
}

// Ambil data soal dari database atau sumber lainnya
$soal = getDataSoal(); // Misalnya, fungsi getDataSoal() mengambil data soal dari database

$jumlahSoalPerHalaman = 10; // Jumlah soal per halaman
$jumlahHalaman = ceil(count($soal) / $jumlahSoalPerHalaman); // Jumlah halaman

$halamanAktif = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman aktif, default: 1

$mulai = ($halamanAktif - 1) * $jumlahSoalPerHalaman; // Indeks awal soal pada halaman aktif
$soalHalaman = array_slice($soal, $mulai, $jumlahSoalPerHalaman); // Ambil subset soal untuk halaman aktif

function angketSiswa($data) {
  global $conn;

  // Ambil semua data dari form angketSiswa.php
  $id = $data['userId'];
  $nama = htmlspecialchars($data['nama']);
  $tkl  = htmlspecialchars($data['tkl']);
  $ttl = $data['ttl'];
  $gender = $data['gender'];
  $namaOrtu = htmlspecialchars($data['namaOrtu']);
  $alamat = htmlspecialchars($data['alamat']);
  $nisn = htmlspecialchars($data['nisn']);
  $nis = htmlspecialchars($data['nis']);
  $nomorTelp = htmlspecialchars($data['nomorTelp']);
  $mapelTinggi = $data['mapelTinggi'];
  $nilaiTinggi = htmlspecialchars($data['nilaiTinggi']);
  $mapelRendah = $data['mapelRendah'];
  $nilaiRendah = htmlspecialchars($data['nilaiRendah']);
  $lomba = htmlspecialchars($data['lomba']);
  $lombaNon = htmlspecialchars($data['lombaNon']);
  $uraian = htmlspecialchars($data['uraian']);
  $tingkat = htmlspecialchars($data['tingkat']);
  $jurusan = $data['jurusan'];
  $alasan = htmlspecialchars($data['alasan']);
  $minat = $data['minat'];
  $alasanMinat = htmlspecialchars($data['alasanMinat']);

  $query = "INSERT INTO kuesioner 
  (
    userId,
    nama,
    tkl,
    ttl,
    gender,
    namaOrtu,
    alamat,
    nisn,
    nis,
    nomorTelp,
    mapelTinggi,
    nilaiTinggi,
    mapelRendah,
    nilaiRendah,
    lomba,
    lombaNon,
    uraian,
    tingkat,
    jurusan,
    alasan,
    minat,
    alasanMinat
  )
  VALUES
  (
    '$id',
    '$nama',
    '$tkl',
    '$ttl',
    '$gender',
    '$namaOrtu',
    '$alamat',
    '$nisn',
    '$nis',
    '$nomorTelp',
    '$mapelTinggi',
    '$nilaiTinggi',
    '$mapelRendah',
    '$nilaiRendah',
    '$lomba',
    '$lombaNon',
    '$uraian',
    '$tingkat',
    '$jurusan',
    '$alasan',
    '$minat',
    '$alasanMinat'
  )";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
  
}

if(isset($_POST['submitAngket'])) {
  if(angketSiswa($_POST) > 0) {
    echo "<script>
    alert('Angket di Submit');
    window.location.href = '../';
    </script>";
  }
}


?>