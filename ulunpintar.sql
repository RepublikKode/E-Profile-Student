-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2023 at 11:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ulunpintar`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_gaya_belajar`
--

CREATE TABLE `data_gaya_belajar` (
  `id` int NOT NULL,
  `soal` text COLLATE utf8mb4_general_ci,
  `opsi_satu` text COLLATE utf8mb4_general_ci,
  `opsi_dua` text COLLATE utf8mb4_general_ci,
  `opsi_tiga` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_gaya_belajar`
--

INSERT INTO `data_gaya_belajar` (`id`, `soal`, `opsi_satu`, `opsi_dua`, `opsi_tiga`) VALUES
(1, 'Anda cenderung belajar dengan cara?', 'Melihat gambar atau diagram yang menggambarkannya.', 'Belajar dengan mendengarkan penjelasan lisan atau ceramah dari guru atau narator.', 'Belajar dengan melakukan aktivitas fisik atau praktik langsung.'),
(2, 'Bagaimana Anda merasa paling nyaman dan fokus saat belajar?', 'Melihat materi yang dipresentasikan dengan visual, seperti video pembelajaran.', 'Saat dapat mendengarkan materi yang disampaikan secara verbal.', 'Saat terlibat dalam percobaan atau kegiatan yang melibatkan gerakan tubuh.'),
(3, 'Anda lebih mudah mengingat informasi ketika...', 'Menggunakan alat bantu visual seperti peta, grafik, atau bagan saat belajar.', 'Menggunakan pendengaran untuk memahami dan mengingat informasi yang disampaikan.', 'Cenderung memahami konsep baru dengan lebih baik ketika dia dapat melakukan tugas atau latihan praktis yang melibatkan tubuhnya.'),
(4, 'Bagaimana Anda biasanya mengorganisir dan mengingat informasi?', 'Ketika melihat secara visual.', 'Ketika dapat mendengarkannya dalam bentuk rekaman suara atau pembicaraan.', 'Ketika dapat mengaitkannya dengan pengalaman nyata atau melakukan tugas yang melibatkan tindakan fisik.'),
(5, 'Apa jenis media yang paling efektif bagi Anda dalam mempelajari konsep baru?', 'Belajar menggunakan diagram atau grafik.', 'Pendekatan belajar yang melibatkan diskusi kelompok atau presentasi lisan.', 'Pembelajaran yang melibatkan simulasi atau permainan peran.'),
(6, 'Bagaimana Anda merespons jika Anda diberi petunjuk melalui suara atau instruksi secara lisan?', 'Cenderung membayangkan seperti apa petunjuk tersebut.', 'Merasa lebih mengerti dan menganggap pelajaran tersebut menyenangkan.', 'Merespon petunjuk dengan mencoba memeragakan agar lebih mengerti.'),
(7, 'Apakah Anda merasa lebih terhubung dengan materi belajar ketika ada elemen visual yang mendukung? Jika ya, dalam bentuk apa?', 'Iya, saya merasa terhubung saat ada metode pembelajaran menggunakan gambaran atau ilustrasi.', 'Asalkan visual tersebut disertai dengan penjelasan materi yang dialog-nya jelas.', 'Saya bisa mengerti apabila visual tersebut berbentuk video animasi yang bergerak memegarakan materi-nya.'),
(8, 'Apakah Anda lebih baik dalam mengingat informasi ketika Anda melihat gambar atau bagan yang menggambarkannya?', 'Iya, saya sangat mengerti', 'Tidak, terkecuali ada yang menjelaskan mengenai bagan tersebut', 'Tidak, kecuali saya mempraktekkannya langsung.'),
(9, 'Bagaimana cara kalian mencatat informasi penting saat pembelajaran di sekolah?', 'Informasi penting tersebut dicatat dalam bentuk diagram atau grafik.', 'Mencatat informasi penting dalam bentuk catatan suara atau rekaman audio.', 'Mengamati dan mengikuti langkah-langkah yang ditunjukkan melalui demonstrasi fisik, atau langsung mempraktekkannya.'),
(10, 'Apakah Anda merasa lebih fokus saat Anda berinteraksi langsung dengan materi belajar, misalnya melalui percobaan atau aktivitas fisik?', 'Tidak, saya tidak terlalu menyukai aktifitas fisik.', 'Tidak, terkecuali ada teman atau guru yang menjelaskan materi tersebut terlebih dahulu.', 'Iya, saya sangat fokus.'),
(11, 'Apakah Anda suka menggunakan contoh audio atau rekaman sebagai alat pembelajaran?', 'Tidak, saya tidak bisa mengerti apabila tidak ada gambar atau objek nyata di pembelajaran tersebut.', 'Iya, saya sangat mengerti.', 'Terkadang iya, namun saya cenderung suka memperagakannya'),
(12, 'Apakah Anda merasa lebih mudah mengingat informasi ketika Anda terlibat dalam diskusi kelompok atau mendengarkan presentasi lisan?', 'Tidak, saat diskusi kelompok saya bagian mencatat informasi dengan diagram atau bagan.', 'Iya, saya merasa mudah mengingat hanya dengan mendengarkan presentasi saat diskusi kelompok.', 'Saat diskusi kelompok, saya cenderung mengingat saat sesi tanya jawab antar kelompok.'),
(13, 'Saat pelajaran sejarah, atau materi yang berhubungan dengan masa penjajahan, bagaimana kamu mengingat materi tersebut?', 'Saya mencari informasi di internet dan mencatatnya.', 'Mendengarkan cerita pahlawan dari internet, atau mendengarkan podcast yang berkaitan dengan materi tersebut.', 'Berkunjung ke Museum edukasi mengenai materi tersebut.'),
(14, 'Bagaimana Anda merespons saat Anda diberi kesempatan untuk melakukan praktik langsung atau eksperimen dengan konsep yang dipelajari?', 'Melihat teman memeragakan praktik tersebut terlebih dahulu', 'Mendengarkan instruksi dari guru dan teman mengenai praktik tersebut', 'Menunjukkan minat dalam melakukan tugas-tugas tersebut'),
(15, 'Apakah Anda merasa lebih termotivasi saat Anda dapat berpartisipasi aktif dalam pembelajaran melalui aktivitas fisik atau interaksi langsung?', 'Cenderung tidak menyukai pelajaran motorik', 'Cenderung tidak menyukai pelajaran motorik', 'Sangat termotivasi');

-- --------------------------------------------------------

--
-- Table structure for table `data_kepribadian`
--

CREATE TABLE `data_kepribadian` (
  `id` int NOT NULL,
  `soal` text COLLATE utf8mb4_general_ci,
  `opsi_satu` text COLLATE utf8mb4_general_ci,
  `opsi_dua` text COLLATE utf8mb4_general_ci,
  `opsi_tiga` text COLLATE utf8mb4_general_ci,
  `opsi_empat` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kepribadian`
--

INSERT INTO `data_kepribadian` (`id`, `soal`, `opsi_satu`, `opsi_dua`, `opsi_tiga`, `opsi_empat`) VALUES
(1, 'Jika kamu pindah ke lingkungan baru, manakah tipe yang cocok dengan mu?', 'Saya berpetualang di lingkungan sekitar terlebih dahulu', 'Saya akan mudah mengakrabkan diri dengan tetangga', 'Saya sangat mudah menyesuaikan diri di lingkungan baru', 'Saya sangat teliti mengenai keadaan lingkungan sekitar'),
(2, 'Jika kamu membuat teman marah, apa yang kamu lakukan?', 'Membujuk-nya agar tidak marah lagi', 'Menceritakan hal lucu agar dia tidak marah lagi', 'Meminta maaf dengan tulus', 'Jujur akan kesalahan yang telah diperbuat'),
(3, 'Saat membuat rencana, tipe manakah dirimu?', 'Saya suka membuat rencana yang praktis', 'Saya suka rencana spontan', 'Saya membuat rencana dengan konsisten', 'Saya membuat rencana dengan penuh pertimbangan'),
(4, 'Saat berdiskusi, tipe manakah dirimu?', 'Mampu memutuskan hasil akhir & bersikap bossy', 'Saya bisa meyakinkan orang untuk mempercayai ide saya', 'Saya suka memberikan ide & inspirasi', 'Saya setuju dengan ide teman'),
(5, 'Saat tampil di depan umum, tipe manakah dirimu?', 'Saya tipe orang yang tampil dengan percaya diri', 'Saya tampil dengan penuh semangat', 'Saya tampil dengan wajah tanpa ekspresi', 'Saya tampil dengan malu-malu'),
(6, 'Ketika berdebat dengan partner mu, tipe manakah dirimu?', 'Saya akan membantah & melawan balik pendapat yang diberikan oleh partner', 'Saya suka menyela saat partner memberikan pendapat', 'Saya cenderung pendiam saat berdebat', 'Saya gampang tersinggung saat berdebat'),
(7, 'Pilih tipe yang sangat menggambarkan kepribadian mu!', 'Keras kepala', 'Ceroboh', 'Sering bimbang', 'Perfeksionis'),
(8, 'Jika ada yang bertengkar, sikap apa yang akan kamu ambil?', 'Cepat bertindak untuk menghentikan pertengkaran', 'Bersenda gurau untuk mencairkan suasana', 'Menjadi penengah diantara orang yang bertengkar tersebut', 'Bersikap cuek'),
(9, 'Pilih tipe yang sangat menggambarkan kepribadian mu!', 'Tidak simpatik', 'Kurang disiplin', 'Tidak mudah memaafkan', 'Susah untuk merelakan sesuatu'),
(10, 'Pilih tipe yang sangat menggambarkan kepribadian mu!', 'Berpikir positif', 'Optimis', 'Sabar', 'Berpendirian teguh'),
(11, 'Ketika teman meminta pendapat mu mengenai penampilannya, apa yang akan kamu lakukan?', 'Memberikan pendapat secara terus terang', 'Memberi pujian mengenai penampilannya hari ini', 'Memberikan pendapat dengan sopan & hati-hati karena takut menyinggung perasaaannya', 'Memperhatikan kerapian penampilannya'),
(12, 'Kepribadian mana yang sangat menggambarkan dirimu?', 'Tegar', 'Idealis', 'Cinta Keluarga', 'Peka');

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_gaya_belajar`
--

CREATE TABLE `deskripsi_gaya_belajar` (
  `id` int NOT NULL,
  `visual` text NOT NULL,
  `auditori` text NOT NULL,
  `kinestetik` text NOT NULL,
  `visual_auditori` text NOT NULL,
  `visual_kinestetik` text NOT NULL,
  `auditori_visual` text NOT NULL,
  `auditori_kinestetik` text NOT NULL,
  `kinestetik_visual` text NOT NULL,
  `kinestetik_auditori` text NOT NULL,
  `visual_auditori_kinestetik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `deskripsi_gaya_belajar`
--

INSERT INTO `deskripsi_gaya_belajar` (`id`, `visual`, `auditori`, `kinestetik`, `visual_auditori`, `visual_kinestetik`, `auditori_visual`, `auditori_kinestetik`, `kinestetik_visual`, `kinestetik_auditori`, `visual_auditori_kinestetik`) VALUES
(1, 'Visual adalah salah satu gaya belajar yang berfokus pada penggunaan gambar, grafik, dan visualisasi untuk memahami dan mengingat informasi. Individu dengan gaya belajar visual memiliki kemampuan yang baik dalam memproses informasi melalui penglihatan dan cenderung lebih mudah mengingat hal-hal yang dilihat secara visual. Mereka suka menggunakan gambar, diagram, dan presentasi visual sebagai alat bantu dalam pembelajaran. Gaya belajar visual dapat ditingkatkan dengan memberikan materi dalam bentuk visual yang menarik dan memanfaatkan sumber daya visual untuk meningkatkan pemahaman dan pengingatan informasi.', 'Auditori adalah salah satu gaya belajar yang mengutamakan pendengaran dan penggunaan informasi verbal untuk memahami dan mengingat informasi. Individu dengan gaya belajar auditori cenderung lebih efektif dalam memproses informasi melalui penjelasan lisan, diskusi, dan pendengaran. Mereka suka mendengarkan ceramah, pidato, atau penjelasan yang disampaikan secara verbal. Mereka juga cenderung lebih baik dalam mengingat informasi yang didengar dan lebih nyaman belajar melalui diskusi dan interaksi verbal dengan orang lain. Memanfaatkan rekaman audio, pembacaan teks dengan suara, atau berpartisipasi dalam kelompok diskusi dapat membantu meningkatkan pembelajaran bagi individu dengan gaya belajar auditori.', 'Kinestetik adalah gaya belajar yang mengutamakan pengalaman fisik dan interaksi langsung dengan objek atau lingkungan sekitar untuk memahami dan mengingat informasi. Individu dengan gaya belajar kinestetik cenderung belajar lebih baik melalui pengalaman praktis, gerakan, simulasi, atau melalui sentuhan dan interaksi fisik. Mereka suka melakukan percobaan langsung, berlatih, atau menggunakan alat peraga yang memungkinkan mereka untuk melibatkan indera peraba dan gerakan fisik. Mereka lebih mudah memahami konsep melalui tindakan, melakukan eksperimen, atau melalui kegiatan yang melibatkan gerakan tubuh. Aktivitas fisik, permainan peran, praktik lapangan, atau simulasi dapat membantu meningkatkan pembelajaran bagi individu dengan gaya belajar kinestetik.', 'Visual Auditori adalah kombinasi gaya belajar yang mengutamakan penggunaan visual dan auditori. Individu dengan gaya belajar ini efektif dalam memproses informasi melalui gambar, grafik, pendengaran, dan penjelasan lisan. Mereka cenderung menggunakan gambaran visual dan mendengarkan penjelasan untuk memahami konsep. Mereka suka presentasi, ceramah, video pembelajaran, dan memanfaatkan sumber daya visual. Diskusi dan kolaborasi membantu dalam pemahaman dan memori. Mereka mengingat informasi yang dilihat dan didengar dengan baik.', '                Visual Kinestetik adalah kombinasi gaya belajar yang menggabungkan aspek visual dan kinestetik. Individu dengan gaya belajar ini efektif dalam memproses informasi melalui penggunaan gambar, gerakan, dan pengalaman langsung. Mereka cenderung menggunakan gambaran visual untuk memahami konsep, namun juga sangat terlibat dalam aktivitas fisik dan pengalaman praktis. Mereka suka menggunakan alat bantu visual, seperti diagram atau grafik, tetapi juga senang melakukan eksperimen, simulasi, atau praktik langsung untuk memperkuat pemahaman mereka. Gerakan fisik dan penggunaan sensorik membantu mereka dalam mengingat dan memahami materi dengan lebih baik.', 'Auditori Visual adalah kombinasi gaya belajar yang mengutamakan penggunaan pendengaran dan visual. Individu dengan gaya belajar ini cenderung belajar lebih baik melalui pendengaran suara, penjelasan lisan, dan penggunaan materi visual seperti gambar, grafik, atau presentasi. Mereka suka mendengarkan ceramah, presentasi, atau penjelasan verbal, sambil melihat gambar atau materi visual yang mendukung. Mereka mampu memahami informasi dengan baik melalui pendengaran dan pengamatan visual secara bersamaan. Diskusi kelompok, presentasi multimedia, dan penggunaan media audio-visual dapat membantu meningkatkan pembelajaran bagi individu dengan gaya belajar auditori visual.', 'Auditori Kinestetik adalah kombinasi gaya belajar yang mengutamakan penggunaan pendengaran dan gerakan fisik. Individu dengan gaya belajar ini cenderung belajar lebih baik melalui pendengaran suara, penjelasan lisan, dan melibatkan diri dalam aktivitas fisik atau pengalaman langsung. Mereka suka berpartisipasi dalam diskusi, simulasi, praktik, atau percobaan yang melibatkan gerakan atau interaksi fisik. Mereka belajar dengan cara mencoba, merasakan, dan mengalami secara langsung. Melalui penggabungan pendengaran dan pengalaman fisik, mereka dapat memahami dan mengingat informasi dengan lebih baik. Aktivitas fisik, praktek langsung, atau penggunaan alat peraga yang melibatkan gerakan dapat membantu meningkatkan pembelajaran bagi individu dengan gaya belajar auditori kinestetik.', '\r\nKinestetik Visual adalah kombinasi gaya belajar yang mengutamakan penggunaan gerakan fisik dan penglihatan. Individu dengan gaya belajar ini belajar lebih efektif melalui pengalaman fisik dan pengamatan visual. Mereka cenderung memahami dan mengingat informasi dengan lebih baik ketika melibatkan gerakan tubuh dan menggunakan gambaran visual. Mereka suka melakukan eksperimen, praktik langsung, atau kegiatan yang melibatkan tindakan fisik dan penggunaan alat peraga visual. Melalui kombinasi pengalaman langsung dan pengamatan visual, mereka dapat memperkuat pemahaman dan pengingatan mereka. Kegiatan seperti pemodelan, demonstrasi, atau penggunaan gambar dan diagram dapat membantu meningkatkan pembelajaran bagi individu dengan gaya belajar kinestetik visual.', 'Kinestetik Auditori adalah kombinasi gaya belajar yang mengutamakan penggunaan gerakan fisik dan pendengaran. Individu dengan gaya belajar ini belajar lebih efektif melalui pengalaman fisik dan mendengarkan suara-suara yang berkaitan dengan pembelajaran. Mereka cenderung memahami dan mengingat informasi dengan lebih baik ketika melibatkan gerakan tubuh dan mendengarkan penjelasan lisan. Mereka suka melakukan tindakan fisik, seperti praktek langsung atau eksperimen, sambil mendengarkan penjelasan atau instruksi verbal. Melalui kombinasi gerakan fisik dan pendengaran, mereka dapat meningkatkan pemahaman dan memori mereka. Diskusi, berbicara, dan menjelaskan konsep juga membantu dalam proses pembelajaran bagi individu dengan gaya belajar kinestetik auditori.', '\r\nVisual Auditori Kinestetik adalah kombinasi gaya belajar yang menggabungkan penggunaan visual, auditori, dan kinestetik. Individu dengan gaya belajar ini memanfaatkan berbagai cara untuk memproses informasi. Mereka efektif dalam memahami konsep melalui penggunaan gambar, grafik, pendengaran, gerakan fisik, dan pengalaman langsung. Mereka cenderung membutuhkan stimulus visual, seperti diagram atau gambar, penjelasan lisan, dan pengalaman fisik untuk meningkatkan pemahaman dan mengingat informasi dengan baik. Diskusi, praktik langsung, dan penggunaan berbagai indra membantu dalam pembelajaran mereka. Melalui kombinasi penggunaan visual, auditori, dan kinestetik, individu dengan gaya belajar ini dapat mengoptimalkan proses pembelajaran mereka.');

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_kepribadian`
--

CREATE TABLE `deskripsi_kepribadian` (
  `id` int NOT NULL,
  `dominance` text NOT NULL,
  `influence` text NOT NULL,
  `conscientiousness` text NOT NULL,
  `steadiness` text NOT NULL,
  `dominance_influence` text NOT NULL,
  `dominance_conscientiousness` text NOT NULL,
  `dominance_steadiness` text NOT NULL,
  `influence_dominance` text NOT NULL,
  `influence_conscientiousness` text NOT NULL,
  `influence_steadiness` text NOT NULL,
  `conscientiousness_dominance` text NOT NULL,
  `conscientiousness_influence` text NOT NULL,
  `conscientiousness_steadiness` text NOT NULL,
  `steadiness_dominance` text NOT NULL,
  `steadiness_influence` text NOT NULL,
  `steadiness_conscientiousness` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `deskripsi_kepribadian`
--

INSERT INTO `deskripsi_kepribadian` (`id`, `dominance`, `influence`, `conscientiousness`, `steadiness`, `dominance_influence`, `dominance_conscientiousness`, `dominance_steadiness`, `influence_dominance`, `influence_conscientiousness`, `influence_steadiness`, `conscientiousness_dominance`, `conscientiousness_influence`, `conscientiousness_steadiness`, `steadiness_dominance`, `steadiness_influence`, `steadiness_conscientiousness`) VALUES
(1, 'Dominance adalah sifat kepribadian yang menggambarkan tingkat kekuatan, pengaruh, dan keinginan untuk mengendalikan atau memimpin dalam situasi sosial. Individu dengan sifat dominance yang tinggi cenderung menjadi pemimpin, mengambil inisiatif, dan menunjukkan ketegasan dalam berinteraksi dengan orang lain. Mereka sering kali merasa nyaman dalam posisi pengambilan keputusan, mengekspresikan pendapat mereka dengan percaya diri, dan mempengaruhi orang lain dengan mudah. Sifat dominance dapat mencerminkan keberanian, ambisi, dan keinginan untuk menjadi yang terdepan dalam kelompok. Namun, penting untuk diingat bahwa dominance bukanlah satu-satunya faktor yang menentukan kepribadian seseorang, dan sifat lain seperti kestabilan emosi, keterbukaan terhadap pengalaman baru, dan kepedulian terhadap orang lain juga berperan penting dalam membentuk kepribadian seseorang.', 'Influence adalah sifat kepribadian yang mencerminkan kemampuan seseorang untuk mempengaruhi orang lain atau situasi di sekitarnya. Individu dengan sifat influence yang tinggi cenderung memiliki keahlian komunikasi yang baik, kemampuan persuasi, dan daya tarik sosial yang kuat. Mereka mampu membuat orang lain terpengaruh oleh ide, pandangan, atau tindakan mereka. Orang dengan sifat influence yang tinggi sering kali dapat membangun hubungan sosial yang baik, menjadi pemimpin yang efektif, dan mempengaruhi perubahan dalam lingkungan mereka. Sifat ini mencerminkan kemampuan seseorang untuk memanfaatkan kekuatan kata-kata, ekspresi nonverbal, dan karisma pribadi untuk memengaruhi orang lain dan mencapai tujuan mereka. Namun, penting untuk digunakan secara positif dan etis, karena pengaruh yang kuat juga dapat digunakan untuk kepentingan yang negatif atau manipulatif.', 'Conscientiousness adalah sifat kepribadian yang mencerminkan tingkat ketelitian, kedisiplinan, tanggung jawab, dan kecenderungan untuk bekerja keras. Individu dengan sifat conscientiousness yang tinggi cenderung menjadi orang yang terorganisir, berkomitmen untuk mencapai tujuan, dan memiliki orientasi terhadap detail. Mereka memiliki kecenderungan untuk melakukan perencanaan yang baik, mengikuti aturan, dan menyelesaikan tugas dengan teliti. Orang dengan sifat conscientiousness yang tinggi juga cenderung memiliki kepatuhan diri yang kuat, kemauan untuk berupaya secara konsisten, dan orientasi pada hasil yang berkualitas. Mereka biasanya dapat diandalkan, memiliki kontrol diri yang baik, dan menjaga komitmen yang telah mereka buat. Sifat ini sering dikaitkan dengan kesuksesan dalam pencapaian pribadi dan profesional, karena mereka cenderung bekerja dengan keras dan bertanggung jawab terhadap tugas-tugas yang diberikan kepada mereka.', 'Steadiness adalah sifat kepribadian yang mencerminkan stabilitas emosional, ketenangan, konsistensi, dan ketekunan. Individu dengan sifat steadiness yang tinggi cenderung menjadi orang yang tenang, stabil, dan tidak mudah terpengaruh oleh perubahan atau tekanan eksternal. Mereka memiliki kecenderungan untuk tetap tenang dalam situasi yang sulit atau menantang. Orang dengan sifat steadiness yang tinggi juga cenderung menjadi pendengar yang baik, bisa diandalkan, dan setia dalam hubungan interpersonal. Mereka memiliki kecenderungan untuk mempertahankan hubungan jangka panjang dan memprioritaskan harmoni dan stabilitas dalam interaksi sosial. Sifat steadiness sering dikaitkan dengan kesabaran, kerjasama, dan kemampuan untuk menjaga keseimbangan emosional dalam situasi yang menegangkan. Individu dengan sifat ini sering memberikan perasaan kestabilan dan keamanan bagi orang-orang di sekitar mereka.', 'Dominance-Influence adalah kombinasi dua sifat kepribadian, yaitu \"dominance\" dan \"influence\", yang mengacu pada dominasi dan pengaruh sosial yang kuat. Individu dengan dominasi-influence yang tinggi cenderung memiliki kepribadian yang ekstrovert, percaya diri, dan berani dalam mengambil inisiatif dalam situasi sosial. Mereka memiliki keinginan untuk memimpin dan memengaruhi orang lain, serta mampu mengendalikan situasi dengan karisma dan keterampilan komunikasi yang kuat. Orang dengan dominasi-influence yang tinggi sering menjadi pemimpin yang efektif, mampu memotivasi dan menggerakkan orang lain menuju tujuan bersama. Mereka mampu membangun hubungan sosial yang kuat, memperoleh dukungan dari orang lain, dan memanfaatkan kekuatan mereka untuk mencapai hasil yang diinginkan. Kombinasi dominasi-influence ini sering ditemukan pada individu yang karismatik, berprestasi, dan memiliki kemampuan untuk mengatur dan mempengaruhi dinamika kelompok dengan keahlian mereka.', 'Dominance-Conscientiousness adalah kombinasi dua sifat kepribadian, yaitu \"dominance\" dan \"conscientiousness\", yang mencerminkan kombinasi antara dominasi sosial dan kepatuhan yang kuat terhadap tugas dan tanggung jawab. Individu dengan dominasi-conscientiousness yang tinggi cenderung memiliki kepribadian yang terorganisir, berkomitmen, dan berorientasi pada pencapaian. Mereka memiliki keinginan untuk mengambil kendali dan memimpin, serta menunjukkan disiplin dan kecenderungan untuk bekerja keras dalam mencapai tujuan mereka. Orang dengan dominasi-conscientiousness yang tinggi sering menjadi pemimpin yang efisien dan bertanggung jawab, dengan kemampuan untuk mengatur dan memimpin dengan tindakan yang terarah. Mereka memiliki kecenderungan untuk mengikuti aturan, menghargai ketepatan, dan bekerja dengan teliti dalam menjalankan tugas-tugas mereka. Kombinasi dominasi-conscientiousness ini sering ditemukan pada individu yang kuat dalam mengelola tanggung jawab, menyelesaikan proyek dengan efisiensi, dan memiliki kemampuan untuk mempengaruhi orang lain dalam mencapai hasil yang diinginkan.', 'Dominance-Steadiness adalah kombinasi dua sifat kepribadian, yaitu \"dominance\" dan \"steadiness\", yang mencerminkan kombinasi antara dominasi sosial dan stabilitas emosional. Individu dengan dominasi-steadiness yang tinggi cenderung memiliki kepribadian yang tegas, stabil, dan tenang. Mereka memiliki keinginan untuk mengambil kendali dan memimpin, serta menunjukkan stabilitas emosional dalam berbagai situasi. Orang dengan dominasi-steadiness yang tinggi cenderung menjadi pemimpin yang tenang dan stabil, dengan kemampuan untuk mempertahankan ketenangan dalam menghadapi tantangan dan mengatur situasi dengan kestabilan emosional. Mereka memiliki kecenderungan untuk menjaga keseimbangan dan harmoni dalam interaksi sosial, sambil tetap memimpin dan mengendalikan situasi. Kombinasi dominasi-steadiness ini sering ditemukan pada individu yang kuat dalam mempertahankan stabilitas dan keseimbangan, mampu mengatasi ketegangan, dan memiliki kemampuan untuk mempengaruhi orang lain dengan kebijaksanaan dan ketenangan mereka.', 'Influence-Dominance adalah kombinasi dua sifat kepribadian, yaitu \"influence\" dan \"dominance\", yang mencerminkan kombinasi antara pengaruh sosial yang kuat dan kepemimpinan yang dominan. Individu dengan kombinasi influence-dominance yang tinggi cenderung memiliki kepribadian yang ekstrovert, percaya diri, dan berani dalam mempengaruhi orang lain serta mengambil inisiatif dalam situasi sosial. Mereka memiliki kemampuan komunikasi yang baik, karisma, dan keahlian persuasif untuk memengaruhi dan memimpin orang lain. Orang dengan influence-dominance yang tinggi sering menjadi pemimpin yang efektif, mampu memotivasi dan menggerakkan orang lain menuju tujuan bersama, serta mampu mengontrol situasi dengan kepercayaan diri dan karisma mereka. Kombinasi influence-dominance ini sering ditemukan pada individu yang berpengaruh, memiliki kemampuan kepemimpinan yang kuat, dan mampu mengarahkan dan memimpin kelompok dengan percaya diri dan keahlian sosial mereka.', 'Influence-Conscientiousness adalah kombinasi dua sifat kepribadian, yaitu \"influence\" dan \"conscientiousness\", yang mencerminkan kombinasi antara pengaruh sosial yang kuat dan kepatuhan yang tinggi terhadap tugas dan tanggung jawab. Individu dengan kombinasi influence-conscientiousness yang tinggi cenderung memiliki kepribadian yang ekstrovert, berkomitmen, dan terorganisir. Mereka memiliki kemampuan komunikasi yang baik, serta keinginan untuk mempengaruhi orang lain dengan pendekatan yang terarah dan bertanggung jawab terhadap tugas-tugas yang mereka jalankan. Orang dengan influence-conscientiousness yang tinggi sering menjadi pemimpin yang efisien dan dapat diandalkan, dengan kemampuan untuk memotivasi orang lain dan menjalankan tanggung jawab mereka dengan teliti. Mereka cenderung bekerja keras dan menghargai ketepatan dalam mencapai tujuan mereka. Kombinasi influence-conscientiousness ini sering ditemukan pada individu yang mampu membangun hubungan sosial yang kuat, mengelola tugas dengan efisien, dan mempengaruhi orang lain dengan tanggung jawab dan dedikasi mereka.', 'Influence-Steadiness adalah kombinasi dua sifat kepribadian, yaitu \"influence\" dan \"steadiness\", yang mencerminkan kombinasi antara pengaruh sosial yang kuat dan stabilitas emosional. Individu dengan kombinasi influence-steadiness yang tinggi cenderung memiliki kepribadian yang ekstrovert, ramah, dan tenang. Mereka memiliki kemampuan komunikasi yang baik dan kemampuan untuk mempengaruhi orang lain dengan kelembutan dan ketenangan mereka. Orang dengan influence-steadiness yang tinggi sering menjadi pendengar yang baik, mampu membangun hubungan interpersonal yang kuat, dan menciptakan rasa harmoni dalam interaksi sosial. Mereka mampu mempengaruhi orang lain dengan sikap yang tenang dan stabil, menciptakan lingkungan yang nyaman dan damai. Kombinasi influence-steadiness ini sering ditemukan pada individu yang karismatik, dapat diandalkan, dan mampu mempengaruhi orang lain dengan kelembutan, stabilitas emosional, dan kehangatan sosial mereka.', 'Conscientiousness-Dominance adalah kombinasi dua sifat kepribadian, yaitu \"conscientiousness\" dan \"dominance\", yang mencerminkan kombinasi antara kepatuhan yang tinggi terhadap tugas dan tanggung jawab serta kecenderungan untuk mengendalikan dan memimpin dalam situasi sosial. Individu dengan kombinasi conscientiousness-dominance yang tinggi cenderung memiliki kepribadian yang terorganisir, berorientasi pada pencapaian, dan tegas dalam mengambil inisiatif. Mereka memiliki kecenderungan untuk bekerja keras, mengikuti aturan, dan menjalankan tanggung jawab mereka dengan disiplin. Orang dengan conscientiousness-dominance yang tinggi juga cenderung menjadi pemimpin yang efektif, dengan kemampuan untuk mengontrol dan memimpin dalam situasi dengan kepercayaan diri dan ketegasan mereka. Kombinasi conscientiousness-dominance ini sering ditemukan pada individu yang bertanggung jawab, tegas dalam mengambil keputusan, dan memiliki kemampuan untuk memimpin dengan ketelitian dan keberanian.', 'Conscientiousness-Influence adalah kombinasi dua sifat kepribadian, yaitu \"conscientiousness\" dan \"influence\", yang mencerminkan kombinasi antara kepatuhan yang tinggi terhadap tugas dan tanggung jawab serta kemampuan untuk mempengaruhi orang lain secara sosial. Individu dengan kombinasi conscientiousness-influence yang tinggi cenderung memiliki kepribadian yang terorganisir, berorientasi pada pencapaian, dan memiliki kemampuan komunikasi yang baik. Mereka memiliki kecenderungan untuk bekerja dengan disiplin, mengikuti aturan, dan menyelesaikan tugas dengan teliti. Orang dengan conscientiousness-influence yang tinggi juga cenderung menjadi pengaruh yang kuat dalam interaksi sosial, dengan kemampuan untuk mempengaruhi orang lain melalui komunikasi yang efektif dan karisma pribadi. Kombinasi conscientiousness-influence ini sering ditemukan pada individu yang bertanggung jawab, mampu memotivasi orang lain, dan memiliki kemampuan untuk membangun hubungan sosial yang kuat. Mereka dapat menggabungkan kepatuhan mereka dengan pengaruh sosial yang positif untuk mencapai tujuan bersama dan mempengaruhi lingkungan sekitar dengan cara yang baik.', 'Conscientiousness-Steadiness adalah kombinasi dua sifat kepribadian, yaitu \"conscientiousness\" dan \"steadiness\", yang mencerminkan kombinasi antara kepatuhan yang tinggi terhadap tugas dan tanggung jawab serta stabilitas emosional. Individu dengan kombinasi conscientiousness-steadiness yang tinggi cenderung memiliki kepribadian yang terorganisir, berorientasi pada pencapaian, dan tenang dalam menghadapi situasi. Mereka memiliki kecenderungan untuk bekerja dengan disiplin, mengikuti aturan, dan menyelesaikan tugas dengan teliti. Orang dengan conscientiousness-steadiness yang tinggi juga cenderung menjadi individu yang stabil secara emosional, dengan kemampuan untuk menjaga ketenangan dalam situasi yang menegangkan atau sulit. Kombinasi conscientiousness-steadiness ini sering ditemukan pada individu yang bertanggung jawab, konsisten, dan dapat diandalkan. Mereka mampu menghadapi tantangan dengan tenang, mempertahankan fokus pada tujuan, dan menjaga keseimbangan dalam hubungan sosial. Individu dengan kombinasi ini cenderung menjadi pribadi yang stabil secara emosional sambil tetap melaksanakan tugas dan tanggung jawab mereka dengan penuh ketekunan.', 'Steadiness-Dominance adalah kombinasi dua sifat kepribadian, yaitu \"steadiness\" dan \"dominance\", yang mencerminkan kombinasi antara stabilitas emosional yang tinggi dan kepemimpinan yang dominan. Individu dengan kombinasi steadiness-dominance yang tinggi cenderung memiliki kepribadian yang tenang, stabil, dan tegas dalam mengambil kendali. Mereka memiliki kemampuan untuk menjaga ketenangan dalam situasi yang menegangkan serta mampu memimpin dengan keyakinan dan keberanian. Orang dengan steadiness-dominance yang tinggi sering menjadi pemimpin yang tenang dan stabil, dengan kemampuan untuk mengendalikan situasi dan mengarahkan orang lain menuju tujuan yang diinginkan. Mereka mampu membangun hubungan sosial yang kuat sambil tetap menunjukkan kepemimpinan yang dominan. Kombinasi steadiness-dominance ini sering ditemukan pada individu yang stabil secara emosional, tegas dalam mengambil keputusan, dan memiliki kemampuan untuk mempengaruhi dan memimpin orang lain dengan keseimbangan dan keberanian mereka.', 'Steadiness-Influence adalah kombinasi dua sifat kepribadian, yaitu \"steadiness\" dan \"influence\", yang mencerminkan kombinasi antara stabilitas emosional yang tinggi dan kemampuan untuk mempengaruhi orang lain secara sosial. Individu dengan kombinasi steadiness-influence yang tinggi cenderung memiliki kepribadian yang tenang, stabil, dan ramah. Mereka mampu menjaga ketenangan dalam berbagai situasi dan memiliki kemampuan komunikasi yang baik. Orang dengan steadiness-influence yang tinggi juga cenderung menjadi pengaruh yang kuat dalam interaksi sosial, dengan kemampuan untuk membangun hubungan yang baik dan mempengaruhi orang lain melalui kelembutan dan keramahan mereka. Kombinasi steadiness-influence ini sering ditemukan pada individu yang stabil secara emosional, mampu membangun hubungan interpersonal yang kuat, dan memiliki kemampuan untuk mempengaruhi orang lain dengan ketenangan dan kehangatan sosial mereka. Mereka mampu memadukan stabilitas emosional mereka dengan pengaruh sosial yang positif untuk menciptakan lingkungan yang harmonis dan mempengaruhi orang lain secara positif.', 'Steadiness-Conscientiousness adalah kombinasi dua sifat kepribadian, yaitu \"steadiness\" dan \"conscientiousness\", yang mencerminkan kombinasi antara stabilitas emosional yang tinggi dan kepatuhan yang kuat terhadap tugas dan tanggung jawab. Individu dengan kombinasi steadiness-conscientiousness yang tinggi cenderung memiliki kepribadian yang tenang, stabil, dan berkomitmen terhadap pencapaian. Mereka mampu menjaga ketenangan dalam berbagai situasi dan memiliki kecenderungan untuk bekerja keras, mengikuti aturan, dan menyelesaikan tugas dengan teliti. Orang dengan steadiness-conscientiousness yang tinggi juga cenderung menjadi individu yang dapat diandalkan, bertanggung jawab, dan terorganisir. Kombinasi steadiness-conscientiousness ini sering ditemukan pada individu yang stabil secara emosional, memiliki integritas, dan mempunyai kemampuan untuk menjaga keseimbangan antara tanggung jawab dan stabilitas emosional. Mereka cenderung menjalankan tugas dan tanggung jawab mereka dengan kesetiaan dan dedikasi, sambil tetap tenang dan terfokus pada pencapaian tujuan.');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_gaya_belajar`
--

CREATE TABLE `hasil_gaya_belajar` (
  `id` int NOT NULL,
  `user` text NOT NULL,
  `unik` text NOT NULL,
  `level` text NOT NULL,
  `soal_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_6` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_7` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_8` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_9` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_10` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_11` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_12` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_13` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_14` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soal_15` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gaya_belajar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_kepribadian`
--

CREATE TABLE `hasil_kepribadian` (
  `id` int NOT NULL,
  `user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_5` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_6` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_7` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_8` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_9` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_10` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_11` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_12` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepribadian` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `menu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_general_ci,
  `img` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_gaya_belajar`
--

CREATE TABLE `tipe_gaya_belajar` (
  `id` int NOT NULL,
  `tipe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tipe_gaya_belajar`
--

INSERT INTO `tipe_gaya_belajar` (`id`, `tipe`) VALUES
(1, 'visual'),
(2, 'auditori'),
(3, 'kinestetik');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` enum('guru','siswa') COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_gaya_belajar`
--
ALTER TABLE `data_gaya_belajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kepribadian`
--
ALTER TABLE `data_kepribadian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deskripsi_gaya_belajar`
--
ALTER TABLE `deskripsi_gaya_belajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deskripsi_kepribadian`
--
ALTER TABLE `deskripsi_kepribadian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_gaya_belajar`
--
ALTER TABLE `hasil_gaya_belajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_kepribadian`
--
ALTER TABLE `hasil_kepribadian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_gaya_belajar`
--
ALTER TABLE `tipe_gaya_belajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_gaya_belajar`
--
ALTER TABLE `data_gaya_belajar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_kepribadian`
--
ALTER TABLE `data_kepribadian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `deskripsi_gaya_belajar`
--
ALTER TABLE `deskripsi_gaya_belajar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deskripsi_kepribadian`
--
ALTER TABLE `deskripsi_kepribadian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hasil_gaya_belajar`
--
ALTER TABLE `hasil_gaya_belajar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_kepribadian`
--
ALTER TABLE `hasil_kepribadian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe_gaya_belajar`
--
ALTER TABLE `tipe_gaya_belajar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
