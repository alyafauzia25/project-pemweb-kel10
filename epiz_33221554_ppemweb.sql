-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql204.byetcluster.com
-- Generation Time: Dec 20, 2022 at 05:44 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33221554_ppemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_obat`
--

CREATE TABLE `data_obat` (
  `id_obat` int(10) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `merek` varchar(25) NOT NULL,
  `stok_obat` int(15) NOT NULL,
  `harga_obat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_obat`
--

INSERT INTO `data_obat` (`id_obat`, `nama_obat`, `merek`, `stok_obat`, `harga_obat`) VALUES
(3, 'Betadine Solution ', 'Betadine', 12, '26.000'),
(5, 'Blackmores Odourless Fish Oil', 'Blackmorest', 12, '182.600'),
(10, 'Antangin JRG Tablet ', 'Antangin', 19, '3.500'),
(11, 'Imboost Kids Sirup 120ml', 'Imboost', 15, '66.500'),
(13, 'Antimo 50 Mg Strip 10 Tablet', 'Phapros', 43, '6.500'),
(30, 'Imboost Extra Suplemen ', 'Imboost', 40, '41.846'),
(31, 'Promag Tablet Box Isi 3 Blister', 'Promag', 19, '23.500'),
(32, 'Caladine Lotion 60 ml', 'Caladine', 15, '15.000'),
(33, 'Hansaplast Wound Spray Antiseptic', 'Hansaplast', 40, '16.000'),
(34, 'Insto Moist 7.5 mL Obat Tetes Mata', 'Insto', 45, '15.000'),
(35, 'Proris Sirup Ibuprofen', 'Proris', 66, '30.000'),
(36, 'Kalpanax CreamAnti Jamur 5gr', 'Kalpanax', 45, '15.000'),
(41, 'Dermatix Ultra Gel Salep ', 'Dermatix', 13, '33.500'),
(42, 'Sanmol Paracetamol Tablets', 'Sanmol', 45, '2.000');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_obat`
--

CREATE TABLE `informasi_obat` (
  `id_obat` int(10) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `link` varchar(225) NOT NULL,
  `khasiat` varchar(25) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `aturan_pakai` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi_obat`
--

INSERT INTO `informasi_obat` (`id_obat`, `nama_obat`, `link`, `khasiat`, `deskripsi`, `aturan_pakai`) VALUES
(5, 'Betadine Solution ', 'https://denusastore.com/wp-content/uploads/2022/03/DS-PKS0158.png', 'Antiseptik Luka', 'BETADINE SOLUTION mengandung zat aktif Povidone Iodine 10%. Betadine solution merupakan antiseptik pada luka untuk membunuh kuman penyebab infeksi.', 'Oles atau kompres pada bagian yang luka. Hati-hati pada penderita yang hipersensitif terhadap iodium. Hipersensitivitas terhadap iodine. Efek Samping: iritasi lokal. Hentikan pemakaian apabila terjadi reaksi lokal.'),
(7, 'Blackmores Odourless Fish Oil', 'https://d2qjkwm11akmwu.cloudfront.net/products/861509_5-1-2021_17-48-11-1665827659.webp', 'Daya Tahan Tubuh', 'Blackmores Odourless Fish Oil 1000 merupakan suplemen dengan minyak ikan 1000 mg yang tidak berbau, yang sumber alami Omega-3 dari ikan laut dalam untuk bantu menjaga kesehatan.', 'Dapat dikonsumsi sesudah makan. Tidak ditujukan bagi yang alergi seafood. Konsumsi lebih dari sama dengan 10 kapsul/ hari (lebih dari sama dengan 5 kapsul/ hari untuk Omega Daily) bersamaan dengan obat pengencer darah dapat meningkatkan risiko pendarahan.'),
(9, 'Antangin JRG Tablet ', 'https://d2qjkwm11akmwu.cloudfront.net/products/10566-1665780995.webp', 'Masuk Angin', 'ANTANGIN JRG CAIR merupakan sirup herbal masuk angin dengan kandungan utama Jahe, Royal Jelly dan Ginseng. Antangin digunakan untuk membantu meredakan masuk angin, meriang, rasa mual, perut kembung, capek dan pusing serta melegakan tenggorokan', 'Dewasa: 3 x sehari 1 sachet. Anak usia 6-12 tahun: 3 x sehari 1/2 sachet. Sesudah makan atau dicampurkan dengan air teh hangat 0,5 gelas'),
(11, 'Antimo 50 Mg Strip 10 Tablet', 'https://d2qjkwm11akmwu.cloudfront.net/products/531242_2-6-2021_18-20-51-1665776700.webp', 'Mual/Mabuk Kendaraan', 'ANTIMO TABLET merupakan obat dengan kandungan Dimenhydrinate yang digunakan untuk mengatasi mual, muntah, dan pusing akibat mabuk perjalanan. Dimenhydrinate pada produk ini bekerja dengan cara menghambat produksi dan kerja histamin yang diproduksi tubuh, sehingga mencegah stimulasi saraf di otak dan telinga bagian dalam yang bisa menyebabkan mual, muntah, dan pusing.', 'Sesudah makan. Peringatan : Awas, Obat Keras Bacalah Aturan Pakainya. Tidak boleh digunakan pada bayi prematur dan bayi yang baru lahir. Hindari makanan dan minuman beralkohol selama mengonsumsi obat ini. Selama minum obat ini tidak boleh mengendarai kendaraan bermotor atau menjalankan mesin. Kategori kehamilan : Kategori B: Mungkin dapat digunakan oleh wanita hamil. Penelitian pada hewan uji tidak memperlihatkan ada nya risiko terhadap janin, namun belum ada bukti penelitian langsung.'),
(13, 'Imboost Kids Sirup 120ml', 'https://images.k24klik.com/product/large/apotek_online_k24klik_20200914021110359225_IMBOOST-FORCE-KID.jpg', 'daya tahan tubuh', 'Imboost Kids Sirup merupakan vitamin daya tahan tubuh untuk anak-anak. Imboos Kids Sirup juga dapat jadi vitamin anak untuk cegah COVID-19 dan variannya, karena mengandung multivitamin dan mineral yang dibutuhkan untuk lawan virus penyakit. Konsumsi Imboo', ' Vitamin untuk anak ini tergolong sebagai obat bebas, sehingga bisa dikonsumsi dengan atau tanpa resep dokter. Berikut dosis dan cara konsumsi Imboost Kids Sirup:\r\n\r\n-Dapat dikonsumsi oleh anak usia dari 1 tahun hingga 12 tahun dan sesuai dengan anjuran dokter\r\n\r\n-Anak usia 1 hingga 2 tahun, dosis vitamin sesuai dengan anjuran dokter\r\n\r\n-Anak usia 2 hingga 6 tahun: 5 ml sebanyak 1 hingga 2 kali dalam sehari (pagi, siang, atau sore hari).'),
(14, 'Imboost Extra Suplemen ', 'https://lzd-img-global.slatic.net/g/p/eeb9b19dff50e0f62b16c6dee967a585.png_2200x2200q80.jpg_.webp', 'daya tahan tubuh', 'IMBOOST EXTRA VIT C &amp; D3 merupakan suplemen dengan kandungan Echinacea &amp; Zinc yang dilengkapi dengan penambahan Vitamin C + Vitamin D yang bekerja secara sinergis untuk meningkatkan sistem kekebalan tubuh. Suplemen ini digunakan untuk membantu memelihara ', 'Dapat dikonsumsi setelah makan. Hentikan pemakaian jika terjadi reaksi alergi. Tidak dianjurkan digunakan lebih dari 8 minggu. Hindari penggunaan pada wanita hamil dan menyusui. Konsultasikan dengan dokter jika digunakan bersaam dengan obat lain. Tidak boleh digunakan oleh penderita sklerosis multiple, penyakit kolagen, leukosis, tuberkolosis, AIDS dan penyakit autoimun. Pemakaian obat umumnya memiliki efek samping tertentu dan sesuai dengan masing-masing individu. '),
(15, 'Promag Tablet Box Isi 3 Blister', 'https://d2qjkwm11akmwu.cloudfront.net/products/881948_2-12-2021_16-26-6-1665834167.png', 'Maag', 'PROMAG merupakan obat dengan kandungan Hydrotalcite, Mg(OH)2, Simethicone dalam bentuk tablet. Obat ini digunakan untuk mengurangi gejala-gejala yang berhubungan dengan kelebihan asam lambung, gastritis, tukak lambung, tukak usus 12 jari. Gejala seperti mual, nyeri lambung, nyeri ulu hati, kembung dan perasaan penuh pada lambung. ', 'Dianjurkan untuk meminum obat ini segera pada saat timbul gejala dan dilanjutkan 1-2 jam sebelum makan atau sesudah makan dan sebelum tidur. Obat ini dapat diminum dengan air atau dikunyah langsung. Hati-hati pada pasien dengan gangguan fungsi ginjal, pemberian antasida yang mengandung magnesium dapat menimbulkan hipermagnesia. Hati-hati pemberian pada penderita diet fosfor rendah karena dapat mengurangi fosfor dalam darah. Tidak dianjurkan untuk anak dibawah 6 tahun. '),
(16, 'Caladine Lotion 60 ml', 'https://images.k24klik.com/product/large/apotek_online_k24klik_20200908015356359225_CALADINE-LOTION.jpg', 'Biang Keringat', 'CALADINE LOTION merupakan lotion anti gatal yang mengandung Calamine, Zinc Oxyde dan Diphenhydramine HCL. Caladine lotion digunakan untuk mengobati gatal karena biang keringet, udara panas, gigitan serangga. Selain itu dapat digunakan sebagai antialergi, antideptik dan penyejuk kulit ', 'Bersihkan bagian kulit yang gatal lalu oleskan, sebaiknya digunakan sehabis mandi pagi dan sore. Jangan dipakai pada kulit yang melepuh, mengelupas atau mengeluarkan cairan. Jika setelah memakai obat ini tidak ada perubahan, timbul rasa terbakar, ruam (iritasi) kulit, hentikan pemakaian dan periksakan ke dokter. Simpan pada suhu di bawah 30 C.'),
(18, 'Insto Moist 7.5 mL Obat Tetes Mata', 'https://d2qjkwm11akmwu.cloudfront.net/products/1622-1665760830.webp', 'Obat tetes mata', 'Insto Moist adalah larutan atau suspensi steril yang digunakan untuk terapi atau pengobatan mata dengan cara meneteskan obat pada selaput lendir mata di sekitar kelopak dan bola mata.Mengandung Hydroxypropyl Methylcellulose 3 mg/mL, Benzalkonium Cl 0.1 mg/mL. Memberikan efek pelumas seperti air mata, mengatasi gejala kekeringan pada mata, dan meringankan iritasi mata yang disebabkan oleh kekurangan produksi air mata (biasanya pada kasus AR, keratokonjungtivitis dan xerophthalmia).', 'Teteskan 3 kali sehari 1-2 tetes pada tiap mata. Jangan dipakai sesudah dibuka 1 bulan. Hentikan penggunaan jika iritasi menetap, lebih buruk, sakit kepala, sakit pada mata, gangguan penglihatan, atau mata merah terus menerus. Ibu hamil. Jangan digunakan secara rutin atau jangka panjang. '),
(19, 'Proris Sirup Ibuprofen', 'https://d2qjkwm11akmwu.cloudfront.net/products/486169_26-3-2019_14-57-16-1665761250.webp', 'Penurun Demam Anak', 'PRORIS SIRUP mengandung Ibuprofen 100 mg. Ibuprofen merupakan obat yang memiliki sifat analgesik, anti-inflamasi dan antipiretik. Obat ini dapat digunakan untuk Nyeri ringan sampai sedang antara lain nyeri pada penyakit gigi atau pencabutan gigi, nyeri pasca bedah, sakit kepala, gejala artritis reumatoid, gejala osteoartritis, gejala juvenile artritis reumatoid, menurunkan demam pada anak.', 'Sesudah makan. Tidak dianjurkan pada lansia, kehamilan, persalinan, menyusui, pasien dengan perdarahan, ulkus, perforasi pada lambung, gangguan pernafasan, gangguan fungsi jantung, gangguan fungsi ginjal, gangguan fungsi hati, hipertensi tidak terkontrol, hiperlipidemia, diabetes melitus, gagal jantung kongestif, penyakit jantung iskemik, penyakit serebrovaskular, penyakit arteri periferal, dehidrasi, meningitis aseptik. '),
(23, 'Kalpanax Cream Obat Jamur 5gr', 'https://d2qjkwm11akmwu.cloudfront.net/products/353351_25-6-2021_13-26-48-1665779649.webp', 'Anti Jamur', 'KALPANAX K CREAM mengandung Miconazole yang merupakan obat anti jamur golongan imidazole, digunakan untuk mengobati penyakit kulit akibat infeksi jamur. Kerjanya yang sangat cepat, dingin di kulit, tidak membuat kulit terkelupas, aman digunakan pada daerah sensitif. Sangat aman digunakan untuk anak-anak, aroma bunga jasmine, dan tidak lengket di kulit.', 'Oleskan 2 atau 3 kali sehari. Oleskan pada kulit setiap selesai mandi dan sebelum tidur malam. Untuk pemakaian luar, Bila terjadi reaksi hipersensitivitas atau iritasi, obat harus dihentikan, Tidak boleh kontak dengan mukosa mata, Penggunaan topikal belum pernah dilaporkan diabsorbsi sistemik, namun hati-hati penggunaan pada wanita hamil.'),
(27, 'Sanmol Paracetamol Tablets', 'https://d2qjkwm11akmwu.cloudfront.net/products/782475_23-3-2020_14-28-1-1665778689.webp', 'Demam', 'Obat ini digunakan untuk meringankan rasa sakit pada keadaan sakit kepala, sakit gigi dan menurunkan demam. Sanmol bekerja pada pusat pengatur suhu di hipotalamus untuk menurunkan suhu tubuh (antipiretik) serta menghambat sintesis prostaglandin sehingga ', 'Dewasa dan anak &gt;12 tahun: 1 tablet, 3-4 kali per hari. Anak: 1/2 - 1 tablet, 3-4 kali sehari. Atau sesuai petunjuk dokter. Obat dapat diminum sebelum atau sesudah makan.'),
(31, 'Hansaplast Wound Spray Antiseptic', 'https://d2qjkwm11akmwu.cloudfront.net/products/538106_28-6-2022_10-27-51-1665794293.webp', 'Antiseptik Luka Luar', 'HANSAPLAST SPRAY ANTISEPTIC merupakan antiseptik yang digunakan sebagai pembersih luka yang praktis dan modern. Pembersih luka membantu mencegah dan mengatasi infeksi. 0.1% Decyl Glucoside Tenside dan 0.04% Polihexanide (PHMB) sebagai pengawet. Termasuk P3K.', 'Semprotkan 10 cm di area luka infeksi. Ulangi bila perlu. Tepuk tepuk secara lembut di area yang telah kering. Alat Kesehatan &amp; Medis Habis Pakai');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id`, `username`, `password`) VALUES
(1, 'efi', '123'),
(2, 'ppemweb10', '$2y$10$cJarsRaC5lrpEKbLy2vQ9.o9Uwlj0YOYjn69v3T9VWC.od0ujtRym'),
(3, 'ppemweb10', '$2y$10$yx6vgleQtoyjGpzulkb3L.rtQJubBs0yFH9tZMGTWOuiy5AVoF2sa'),
(5, 'alya', '$2y$10$yKjMtV9ikRVJJUgo/9Y6uu5CbzAZkn3T72A65UtCKUkuogG7y1uWq'),
(6, 'admin', '$2y$10$ISb1ngvmRkXvFMGoFOO0xe4GBvXHvN6dScVRwbI0AMXEjHSkvXCN6'),
(7, 'kel10', '$2y$10$gj614tLlZHpkALQ8e6nX6u3K5x1w2.6eJISTvJbVmQdSaaoOvlE9m'),
(8, 'adminn', '$2y$10$b2jCw7f8I/.RW2tyRpB9pOAr.DY7ZqZdKkedBOWV0zhk9sTEIgOlq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD UNIQUE KEY `nama_obat` (`nama_obat`);

--
-- Indexes for table `informasi_obat`
--
ALTER TABLE `informasi_obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD UNIQUE KEY `nama_obat` (`nama_obat`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_obat`
--
ALTER TABLE `data_obat`
  MODIFY `id_obat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `informasi_obat`
--
ALTER TABLE `informasi_obat`
  MODIFY `id_obat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
