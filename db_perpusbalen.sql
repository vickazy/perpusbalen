-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 04:55 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_perpusbalen`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `nis` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `ttl` varchar(10) DEFAULT NULL,
  `kelas` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nis`, `nama`, `jk`, `ttl`, `kelas`, `status`) VALUES
('4179', 'Aditya Cahyanto', 'L', NULL, '9-D', 0),
('4180', 'Achmad Sevian David', 'L', NULL, '9 C', 0),
('4181', 'Abdul Ghofur', 'L', NULL, '9 E', 0),
('4182', 'A. Syaiful Khafid', 'L', NULL, '9.A', 0),
('4183', 'Adam Avia Tama', 'L', NULL, '9 E', 0),
('4184', 'Abdullah Aziz Afandi Putra', 'L', NULL, '9 B', 1),
('4185', 'A. Bahrul Musyafa''', 'L', NULL, '9 E', 0),
('4186', 'Umi Khozinatul Khoiriyah', 'P', NULL, '9.A', 0),
('4187', 'Yuni Pratama Intan Fadilla', 'P', NULL, '9 F', 0),
('4188', 'Yazi Yahya', 'L', NULL, '9 D', 0),
('4189', 'Wahida Ezi', 'P', NULL, '9 E', 0),
('4190', 'Wahyu Dwi Ardianti', 'P', NULL, '9 C', 0),
('4191', 'Zaky Annabil Romadhon', 'L', NULL, '9 F', 0),
('4192', 'Moch. As''ad Toha', 'L', NULL, '9 B', 0),
('4193', 'Genduk Nia Agustin', 'P', NULL, '9 G', 0),
('4194', 'Rani Fitrianingsih', 'P', NULL, '9 B', 0),
('4195', 'Lutfiul Banin', 'L', NULL, '9 G', 0),
('4196', 'Bella Nurviana', 'P', NULL, '9 C', 0),
('4197', 'Lia Rizqi Ani', 'P', NULL, '9 C', 0),
('4198', 'Mohammad Dimas Rofi''uddin', 'L', NULL, '9 F', 0),
('4199', 'Berliana Angeli Bilkist', 'P', NULL, '9 C', 0),
('4200', 'Adi Ardyansyah', 'L', NULL, '9 B', 0),
('4201', 'Agung Ardiansyah', 'L', NULL, '9 E', 0),
('4202', 'Adinda Dhayu Anggraini', 'P', NULL, '9.A', 0),
('4203', 'Ahmad Dwiyaiqbal Akbar', 'L', NULL, '9 C', 0),
('4204', 'Ahmad Al Khusni', 'L', NULL, '9 C', 0),
('4205', 'Adis Nilam Sari', 'P', NULL, '9 F', 0),
('4206', 'Surya Asdi Prasetya', 'L', NULL, '9.A', 0),
('4207', 'Nisma Ridhotin', 'P', NULL, '9 F', 0),
('4208', 'Moch Abu Hasan Al-Asy''ary', 'L', NULL, '9 C', 0),
('4209', 'M. Mujib Kurniawan', 'L', NULL, '9 F', 0),
('4210', 'Vera Eka Fitriana', 'P', NULL, '9 C', 0),
('4211', 'Yuliana Siti Nur H', 'P', NULL, '9 G', 0),
('4212', 'Amelia Rosita', 'P', NULL, '9 B', 0),
('4213', 'Bagus Indra Wirakusuma', 'L', NULL, '9 G', 0),
('4214', 'Wahyu Hidayat', 'L', NULL, '9 E', 0),
('4215', 'Ufkhi Hasta Zulkifli', 'L', NULL, '9 E', 0),
('4216', 'Nida Nur Fauziah', 'P', NULL, '9 D', 0),
('4217', 'Ahmad Farid Zaini', 'L', NULL, '9 C', 0),
('4218', 'Reva Lina Eka Enjelia', 'P', NULL, '9 E', 0),
('4219', 'Lenni Oktavia R', 'P', NULL, '9 D', 0),
('4220', 'Moh. Fajar Anshori', 'L', NULL, '9 B', 0),
('4221', 'Alifia Rima Agustin', 'P', NULL, '9.A', 0),
('4222', 'Moch. Agus Saputra', 'L', NULL, '9.A', 0),
('4223', 'Ahmad Eko Cahyono', 'L', NULL, '9 G', 0),
('4224', 'Diyama Fatika Sari', 'P', NULL, '9 C', 0),
('4225', 'Erix Dwi Nata', 'L', NULL, '9 E', 0),
('4226', 'Luayatuz Zarok', 'P', NULL, '9.A', 0),
('4227', 'Ana Nur Syamsiyah', 'P', NULL, '9 F', 0),
('4228', 'Danang Adi Surya', 'L', NULL, '9 C', 0),
('4229', 'Mohammad Abdul Kharis', 'L', NULL, '9 F', 0),
('4230', 'Rio Duwi Pramudia', 'L', NULL, '9 B', 0),
('4231', 'Muhammad Aris Budiyanto', 'L', NULL, '9 G', 0),
('4232', 'Natjma Nur Aulia Maghfiroh', 'P', NULL, '9.A', 0),
('4233', 'Al Mukhtarom', 'L', NULL, '9 G', 0),
('4234', 'Nia Putri Sari', 'P', NULL, '9 D', 0),
('4236', 'Luluk Maghfiroh', 'P', NULL, '9 D', 0),
('4237', 'M. Khoirul Umam', 'L', NULL, '9 C', 0),
('4238', 'Rifky Bima Saputra', 'L', NULL, '9 F', 0),
('4239', 'Moch Rio Saputra', 'L', NULL, '9 D', 0),
('4240', 'R. Wahyu Aditya', 'L', NULL, '9 B', 0),
('4241', 'Muhammad Narendra Esa Atmaja', 'L', NULL, '9 D', 0),
('4242', 'Muhammad Abdul Afif', 'L', NULL, '9.A', 0),
('4243', 'Laila Ali Oktaviani', 'P', NULL, '9 G', 0),
('4244', 'Moch. Syahrul Ramadhoni', 'L', NULL, '9 C', 0),
('4245', 'M. Alfi Syahara', 'L', NULL, '9 F', 0),
('4246', 'Fenny Allysya Nendrastuti', 'P', NULL, '9.A', 0),
('4247', 'Nur Lita Amalia Romadoni', 'P', NULL, '9 F', 0),
('4248', 'Rendi Julyanto', 'L', NULL, '9 C', 0),
('4249', 'M. Rendi Hermansah', 'L', NULL, '9 G', 0),
('4250', 'Eka Erma Wati', 'P', NULL, '9 E', 0),
('4251', 'Moch. Qoirul Amin', 'L', NULL, '9 C', 0),
('4252', 'Anis Zumrotul Khoiriyah', 'P', NULL, '9 C', 0),
('4253', 'Bella Febriyanti Ainurrohmah', 'P', NULL, '9 G', 0),
('4254', 'Muhammad Bagus Adi Saputra', 'L', NULL, '9 D', 0),
('4255', 'Nurul Azizah', 'P', NULL, '9 E', 0),
('4256', 'Siti Masitoh', 'P', NULL, '9 D', 0),
('4257', 'Feri Setiawan', 'L', NULL, '9 C', 0),
('4258', 'Ahmad Aji Rizki Saputra', 'L', NULL, '9 F', 0),
('4259', 'Lutfiana Maulildah Aflaka', 'P', NULL, '9 D', 0),
('4260', 'Saiful Rohman', 'L', NULL, '9 B', 0),
('4261', 'Ayu Ulfani', 'P', NULL, '9 B', 0),
('4262', 'Agus Putra Tungga Jae M', 'L', NULL, '9 C', 0),
('4263', 'Briyan Rhoqibul Amar', 'L', NULL, '9 G', 0),
('4264', 'Udin Aldianto', 'L', NULL, '9 E', 0),
('4265', 'Rosalinda', 'P', NULL, '9 F', 0),
('4266', 'Riska Noer Aprilya', 'P', NULL, '9.A', 0),
('4267', 'Siti Nor Kholifah', 'P', NULL, '9 F', 0),
('4268', 'Alfi Nurlaili Safitri', 'P', NULL, '9 B', 0),
('4269', 'Amanda Ayu Safia', 'P', NULL, '9 G', 0),
('4270', 'M. Saifuddin', 'L', NULL, '9 B', 0),
('4271', 'Moh. Farid Angga Al Abrori', 'L', NULL, '9 G', 0),
('4272', 'M. Afif  Fakhruddin', 'L', NULL, '9 C', 0),
('4273', 'Jelita Eka Oktaviany', 'P', NULL, '9 G', 0),
('4274', 'Muhamad Eky Prasetyo', 'L', NULL, '9 D', 0),
('4275', 'Bila Amanda Febri Anaputri', 'P', NULL, '9 E', 0),
('4276', 'M. Ridwan Efendi', 'L', NULL, '9 D', 0),
('4277', 'Moh. Izza Hanafi', 'L', NULL, '9 C', 0),
('4278', 'Anis Watin', 'P', NULL, '9 F', 0),
('4279', 'M. Rully Khoirul Rokhimin', 'L', NULL, '9 D', 0),
('4280', 'Ahmad Bagus Bayu Saputro', 'L', NULL, '9 F', 0),
('4281', 'Dela Novita Sari', 'P', NULL, '9 E', 0),
('4282', 'Andi Santoso', 'L', NULL, '9.A', 0),
('4283', 'Sovia Dwi Aris Safitri', 'P', NULL, '9 G', 0),
('4284', 'Silfi Shofia Hanum', 'P', NULL, '9 B', 0),
('4285', 'Amelia Maharani', 'P', NULL, '9 F', 0),
('4286', 'Siti Nur Laili Zuhri', 'P', NULL, '9.A', 0),
('4287', 'Annindiya Almas Salsabillla', 'P', NULL, '9 F', 0),
('4288', 'M. Rafif Farkhanudin', 'L', NULL, '9 C', 0),
('4290', 'Ahmad Bahrul Hikam', 'L', NULL, '9.A', 0),
('4291', 'Ahmad Muzakki Chaerul Umam', 'L', NULL, '9 G', 0),
('4292', 'Inez Firdiarofi', 'P', NULL, '9.A', 0),
('4293', 'M. Imam Syafi''i', 'L', NULL, '9 G', 0),
('4294', 'Ardi Saefudin', 'L', NULL, '9 D', 0),
('4295', 'Helang Rafsanjani', 'L', NULL, '9 E', 0),
('4296', 'Siti Vivin Nur Diana', 'P', NULL, '9 B', 0),
('4297', 'Ainun Nurul Kh', 'P', NULL, '9 B', 0),
('4298', 'Desi Ainur Rohmah', 'P', NULL, '9 E', 0),
('4299', 'Ahmad Abil Khoir', 'L', NULL, '9 D', 0),
('4300', 'Ahmad Riadani', 'L', NULL, '9 B', 0),
('4301', 'Triana Agustina', 'P', NULL, '9 D', 0),
('4302', 'Sofia Fuji Rahayu', 'P', NULL, '9.A', 0),
('4303', 'Siti Mu''awanah ', 'P', NULL, '9 G', 0),
('4304', 'Ayu Febrianti', 'P', NULL, '9 C', 0),
('4305', 'Bagus Arifiyanto', 'L', NULL, '9 E', 0),
('4306', 'Myfan Rahmatullah', 'L', NULL, '9 G', 0),
('4307', 'Umi Maghfiroh', 'P', NULL, '9 G', 0),
('4308', 'Galuh Cindy Anggraini', 'P', NULL, '9 C', 0),
('4309', 'Nurillia Nadrotus Saad''zah', 'P', NULL, '9 G', 0),
('4310', 'Melani Angga Rahardiyanti', 'P', NULL, '9 E', 0),
('4311', 'Moh. Rukhan Sanusi', 'L', NULL, '9 G', 0),
('4312', 'Ahmad Abdul Mu''id', 'L', NULL, '9.A', 0),
('4313', 'Amelia Khosherawati', 'P', NULL, '9 G', 0),
('4314', 'Erna Amelia', 'P', NULL, '9 D', 0),
('4315', 'Much. Rogan Atok Amrulloh', 'L', NULL, '9 C', 0),
('4316', 'Mohammad Kristianto', 'L', NULL, '9 D', 0),
('4317', 'Jovan Nur Kholis', 'L', NULL, '9 C', 0),
('4318', 'M. Dimas Adi Nugroho', 'L', NULL, '9 C', 0),
('4319', 'Dewi Ulan Dari ', 'P', NULL, '9 C', 0),
('4320', 'Bagas Romadhoni Sugiarto', 'L', NULL, '9 B', 0),
('4321', 'Dani', 'L', NULL, '9 D', 0),
('4322', 'Dedy Dwi Prasetiyo', 'L', NULL, '9.A', 0),
('4323', 'Bagus Febriyanto', 'L', NULL, '9 G', 0),
('4324', 'Sri Wahyuni', 'P', NULL, '9 B', 0),
('4325', 'Dita Nisaul Hidayah', 'P', NULL, '9 E', 0),
('4326', 'Moch. Khoirul Mizan', 'L', NULL, '9 D', 0),
('4327', 'Salma Qoulum Fadlilah', 'P', NULL, '9 F', 0),
('4328', 'Moch. Ilhan Izza Irfani', 'L', NULL, '9.A', 0),
('4329', 'Eva Hana Natasya', 'P', NULL, '9 E', 0),
('4330', 'Sheila Dwi Anggraeni', 'P', NULL, '9 F', 0),
('4331', 'Mochamad Imron H.', 'L', NULL, '9 C', 0),
('4332', 'M. Sihabur Rizal', 'L', NULL, '9 E', 0),
('4333', 'Nina Nurul Chomariatin', 'P', NULL, '9 B', 1),
('4334', 'Much. Bara Assahida', 'L', NULL, '9.A', 0),
('4335', 'Fiky Nur Hardiansyah', 'L', NULL, '9 E', 0),
('4336', 'Reza Ardiansyah', 'L', NULL, '9 D', 0),
('4337', 'Desiana Maulidatur Rohmah', 'P', NULL, '9 C', 0),
('4338', 'Putri Oktaviana', 'P', NULL, '9 F', 0),
('4339', 'Aldi Nur Syafara', 'L', NULL, '9 B', 0),
('4340', 'Fajar Agi Aditya', 'L', NULL, '9 E', 0),
('4341', 'Diah Febriayanti', 'P', NULL, '9 D', 0),
('4342', 'Denia Oktaviani', 'P', NULL, '9.A', 0),
('4343', 'Fitria Rahmadani', 'P', NULL, '9 G', 0),
('4344', 'Amelina Zunianti', 'P', NULL, '9 C', 0),
('4345', 'Trisna Putri Mayang Sari', 'P', NULL, '9 F', 0),
('4346', 'Imam Juni Fredika', 'L', NULL, '9.A', 0),
('4347', 'Joko Agus Nur Rohman', 'L', NULL, '9 F', 0),
('4348', 'Moch. Yasir', 'L', NULL, '9 C', 0),
('4349', 'Elvina Ayu Norfadila', 'P', NULL, '9 D', 0),
('4350', 'Binti Rif''atul Izza', 'P', NULL, '9 D', 0),
('4351', 'Muhammad Abdullah Khatami', 'L', NULL, '9 G', 0),
('4352', 'Ainun Nafi''ah', 'P', NULL, '9.A', 0),
('4353', 'Elma Nur Aristia Putri', 'P', NULL, '9 B', 0),
('4354', 'Denny Romadhona', 'L', NULL, '9 F', 0),
('4355', 'Erna Lusiana', 'P', NULL, '9 D', 0),
('4356', 'Eva Nur Aini', 'P', NULL, '9 D', 0),
('4357', 'Putri Wahyuningsih', 'P', NULL, '9 C', 0),
('4358', 'Amanda Sabilla Yasaro', 'P', NULL, '9 B', 0),
('4359', 'As''at Suastom', 'L', NULL, '9 B', 0),
('4360', 'M. Saiful Dodi Saputro', 'L', NULL, '9 B', 0),
('4361', 'M. Bahrul Ilmi', 'L', NULL, '9 F', 0),
('4362', 'Ridho Aditya', 'L', NULL, '9.A', 0),
('4363', 'Jian Budi Nugroho', 'L', NULL, '9 E', 0),
('4364', 'Raisa Khairina', 'P', NULL, '9.A', 0),
('4365', 'Riyan Maulana', 'L', NULL, '9 G', 0),
('4366', 'Vega Wati Sairdekut', 'P', NULL, '9 C', 0),
('4367', 'Muhammad Reza Hamka Arrohman', 'L', NULL, '9 B', 0),
('4368', 'M. Anan Rohmatullah', 'L', NULL, '9 F', 0),
('4370', 'Dewi Rahayu', 'P', NULL, '9 C', 0),
('4371', 'M. Yoga Saputra', 'L', NULL, '9 F', 0),
('4372', 'Devi Nurvidhoni', 'P', NULL, '9 E', 0),
('4373', 'Vera Afrianti', 'P', NULL, '9 G', 0),
('4374', 'Moch Adi Nursatrio', 'L', NULL, '9.A', 0),
('4375', 'M. Alfan Afandi', 'L', NULL, '9 B', 0),
('4376', 'Lusianan Silviati', 'P', NULL, '9 D', 0),
('4377', 'Fani Nanda Larasati', 'P', NULL, '9 E', 0),
('4378', 'Lailatul Muhlisa', 'P', NULL, '9 D', 0),
('4379', 'Dwi Ardianti', 'P', NULL, '9 C', 0),
('4380', 'Linda Elisa', 'P', NULL, '9 B', 0),
('4381', 'Intan Nur Hidayah', 'P', NULL, '9 E', 0),
('4382', 'Kamila Zaharani', 'P', NULL, '9.A', 0),
('4383', 'Frean Prestiani', 'P', NULL, '9 G', 0),
('4384', 'Yogi Adi Candra', 'L', NULL, '9 E', 0),
('4385', 'M. Rendi Rizkiyansyah', 'L', NULL, '9 F', 0),
('4386', 'Miftakhul Septia Ningrum', 'P', NULL, '9.A', 0),
('4387', 'Riky Handika Aji Saputra', 'L', NULL, '9 F', 0),
('4388', 'Moch. Khoirul Fiqri', 'L', NULL, '9.A', 0),
('4389', 'M. Nasrullah', 'L', NULL, '9 F', 0),
('4390', 'Milda Aini Fahma', 'P', NULL, '9 B', 0),
('4391', 'Miftahul Rizqi Majid', 'L', NULL, '9 F', 0),
('4392', 'Sitta Dewi Rahmania', 'P', NULL, '9.A', 0),
('4393', 'Muhammad Firman Romadhoni', 'L', NULL, '9 B', 0),
('4394', 'Siti Nur Azizah', 'P', NULL, '9 B', 0),
('4395', 'Puji Lestari', 'P', NULL, '9 D', 0),
('4396', 'Ikhfandika Nurfatikhin', 'P', NULL, '9.A', 0),
('4397', 'Novi Nur Hidayah', 'P', NULL, '9 B', 0),
('4398', 'Mohammad Adit Nugroho', 'L', NULL, '9 F', 0),
('4399', 'Noval Tri Hidayat', 'L', NULL, '9 F', 0),
('4400', 'Ridho Dwi Saputra', 'L', NULL, '9 E', 0),
('4401', 'Moh. Ilham Romadloni', 'L', NULL, '9.A', 0),
('4402', 'Irvan Romadhon', 'L', NULL, '9 G', 0),
('4403', 'Moch Syaif Ali Mutaqin', 'L', NULL, '9 D', 0),
('4404', 'Rafida Tri Ista Qoilinglie', 'P', NULL, '9 F', 0),
('4405', 'Moh. Nasrul Ulum', 'L', NULL, '9.A', 0),
('4406', 'Laila Nur Fitriyanti', 'P', NULL, '9 G', 0),
('4407', 'M. Erwin Hidayat', 'L', NULL, '9.A', 0),
('4408', 'Muhammad Makhrus Azizun Alim', 'L', NULL, '9 F', 0),
('4409', 'Ricky Rifaldi', 'L', NULL, '9 B', 0),
('4410', 'Nur Ismawati', 'P', NULL, '9 E', 0),
('4411', 'Ristina', 'P', NULL, '9.A', 0),
('4412', 'Salma Nabella', 'P', NULL, '9 F', 0),
('4413', 'Deni Nuryati', 'P', NULL, '9 E', 0),
('4414', 'M. Nur Efendi', 'L', NULL, '9 D', 0),
('4415', 'Eko Fahrudin', 'L', NULL, '9 D', 0),
('4416', 'M. Rizki Kurniawan', 'L', NULL, '9 G', 0),
('4417', 'Nur Lina Safiatin', 'P', NULL, '9 E', 0),
('4418', 'Rangga Saputra', 'L', NULL, '9 E', 0),
('4419', 'Salwan Eka Azmi Nur Farhan', 'L', NULL, '9 G', 0),
('4420', 'Nur Fitri Yani Timur', 'P', NULL, '9 G', 0),
('4421', 'Muhammad Rizky Romadhon', 'L', NULL, '9.A', 0),
('4422', 'M. Syahid Rosadi', 'L', NULL, '9 B', 0),
('4423', 'Riska Purwitasari', 'P', NULL, '9 B', 0),
('4424', 'Erwin Adi Saputra', 'L', NULL, '9 D', 0),
('4429', 'Devin Anis Salehah', 'P', NULL, '8.A', 0),
('4430', 'Dwi Nofiatul Fitri', 'P', NULL, '8.A', 0),
('4431', 'Eka Pratama', 'L', NULL, '8 C', 0),
('4432', 'Himatun Nafi''ah', 'P', NULL, '8.A', 0),
('4433', 'Siti Nur Sella Zahwa', 'P', NULL, '8.A', 0),
('4434', 'Dwi Bunga Rahmawati', 'P', NULL, '8.A', 0),
('4435', 'Desy Intan Permata Sari', 'P', NULL, '8.A', 0),
('4436', 'Lutfia Ayu Maulida', 'P', NULL, '8.A', 0),
('4437', 'Ratna Asri Wulan Kusuma', 'P', NULL, '8.A', 0),
('4438', 'Ayu Setyoningsih', 'P', NULL, '8.A', 0),
('4439', 'Rita Olivia', 'P', NULL, '8.A', 0),
('4440', 'Devi Tiyasningrum', 'P', NULL, '8.A', 0),
('4441', 'Siti Irma Oktovia', 'P', NULL, '8.A', 0),
('4442', 'Novi Ayu Ramadhani', 'P', NULL, '8.A', 0),
('4443', 'Naila Haniatun Rosyidah', 'P', NULL, '8.A', 0),
('4444', 'Alifia Maharani', 'P', NULL, '8.A', 0),
('4445', 'M. Naufal Hidayat', 'L', NULL, '8.A', 0),
('4446', 'M. Maulia Taurizki', 'L', NULL, '8 F', 0),
('4447', 'Rifa Nur Syaida', 'P', NULL, '8.A', 0),
('4448', 'Agus Wijianto', 'L', NULL, '8.A', 0),
('4449', 'Dimas Rizki Saputra', 'L', NULL, '8.A', 0),
('4450', 'M. Aldi Prayoga', 'L', NULL, '8.A', 0),
('4451', 'M. Alfin Zamroni Aryanto', 'L', NULL, '8.A', 0),
('4452', 'M. Aditya', 'L', NULL, '8.A', 0),
('4453', 'Muhamad Fahrozi Aditya Rizki', 'L', NULL, '8.A', 0),
('4454', 'Diego Ermanda Chasila', 'L', NULL, '8.A', 0),
('4455', 'Kharis Nur Setiawan', 'L', NULL, '8.A', 0),
('4456', 'Reza Saputra', 'L', NULL, '8.A', 0),
('4457', 'Bagus Surya Dinata', 'L', NULL, '8.A', 0),
('4458', 'Edi Hariyadi', 'L', NULL, '8.A', 0),
('4459', 'Adel Al Gifari Anggid Dimarta', 'L', NULL, '8 F', 0),
('4460', 'Khusna Ibnu Zumro Aji', 'L', NULL, '8 D', 0),
('4461', 'Abdul Majid', 'L', NULL, '8.A', 0),
('4462', 'Moh. Ali Sofa', 'L', NULL, '8 C', 0),
('4463', 'Moch. Bayu Satrio', 'L', NULL, '8 B', 0),
('4464', 'Putri Nur Isnaini', 'P', NULL, '8 B', 0),
('4465', 'M. Ricky Pratama', 'L', NULL, '8 B', 0),
('4466', 'Ahmad Choirul Huda Al Fatikh', 'L', NULL, '8 B', 0),
('4467', 'M. Kharir Alfin', 'L', NULL, '8 B', 0),
('4468', 'Dela Udiwati', 'P', NULL, '8 B', 0),
('4469', 'M. Khabiballah', 'L', NULL, '8 B', 0),
('4470', 'M. Rifki Saputra', 'L', NULL, '8 B', 0),
('4471', 'Agung Lesmana', 'L', NULL, '8 B', 0),
('4472', 'Ahmad Prasetyo Aji', 'L', NULL, '8 B', 0),
('4473', 'Erick Verdyanto Prayoga', 'L', NULL, '8 B', 0),
('4474', 'Ulfatus Sholikah', 'P', NULL, '8 B', 0),
('4475', 'Tomi Setiawan', 'L', NULL, '8 C', 0),
('4476', 'Mohamad Akhyar Bintang Fabilla', 'L', NULL, '8 B', 0),
('4477', 'Muhammad Alwi Jamaludin Romadhon', 'L', NULL, '8 B', 0),
('4478', 'Mukhammad Khoirul Anwar', 'L', NULL, '8 B', 0),
('4479', 'M. Faridhi Faqih', 'L', NULL, '8 B', 0),
('4480', 'Muhammad Ari Firmansyah', 'L', NULL, '8 B', 0),
('4481', 'Adienda Desnata', 'P', NULL, '8 B', 0),
('4482', 'Ainur Nia Laiqa', 'P', NULL, '8 B', 0),
('4483', 'Dwi Novita Sari', 'P', NULL, '8 B', 0),
('4484', 'Farah Diva Putri Nur Andia', 'P', NULL, '8 B', 0),
('4485', 'Adinda Julia Sari', 'P', NULL, '8 B', 0),
('4486', 'Gita Aisyah Nur Fatikah', 'P', NULL, '8 B', 0),
('4487', 'Siti Nur Fatmasari', 'P', NULL, '8 B', 0),
('4488', 'Siti Aisyah', 'P', NULL, '8 B', 0),
('4489', 'Amilatun Hidayah', 'P', NULL, '8 B', 0),
('4490', 'Dewi Saptia Ningsih', 'P', NULL, '8 B', 0),
('4491', 'Hesty Arum Tyas', 'P', NULL, '8 B', 0),
('4492', 'Siti Alif Avia Adhana', 'P', NULL, '8 B', 0),
('4493', 'Siti Fatma Ainur Romadhon', 'P', NULL, '8 B', 0),
('4494', 'Lupi Oktavia', 'P', NULL, '8 B', 0),
('4495', 'Shahniza Tasya Kamila', 'P', NULL, '8 B', 0),
('4496', 'Efi Sulistian', 'P', NULL, '8 B', 0),
('4497', 'Fatika Nur Faizatin', 'P', NULL, '8 C', 0),
('4498', 'Dewi Ratna Anggraini', 'P', NULL, '8 C', 0),
('4499', 'Dhea Nanda Azzahra', 'P', NULL, '8 C', 0),
('4500', 'Nauva Lyla Rahmadini', 'P', NULL, '8 C', 0),
('4501', 'Nurul Firdausi Nusula', 'P', NULL, '8 C', 0),
('4502', 'Nindia Fauztafika Lusani', 'P', NULL, '8 C', 0),
('4503', 'Siti Solikhatun Nikmah', 'P', NULL, '8 C', 0),
('4504', 'Serli Isma Wati', 'P', NULL, '8 C', 0),
('4505', 'Siti Echa Irma Dhani', 'P', NULL, '8 C', 0),
('4506', 'Ahmad Rizal Abidin', 'L', NULL, '8 C', 0),
('4507', 'Yoga Hadi Saputra', 'L', NULL, '8 C', 0),
('4508', 'Achmad Nur Alfian', 'L', NULL, '8.A', 0),
('4509', 'Yoga Firmansyah', 'L', NULL, '8 C', 0),
('4510', 'Muhammad Khoirul Lil Alfani', 'L', NULL, '8 C', 0),
('4511', 'Moch. Rizqi Muammar Al-Farih', 'L', NULL, '8 C', 0),
('4512', 'Ahmad Torik Ariski', 'L', NULL, '8 B', 0),
('4514', 'M. Rio Saputra', 'L', NULL, '8 C', 0),
('4515', 'Danasir Akhyar', 'L', NULL, '8 C', 0),
('4516', 'Dwi Eka Afrizal', 'L', NULL, '8 C', 0),
('4517', 'Muhammad Ariel Setyawan', 'L', NULL, '8 C', 0),
('4518', 'Moch Ilham Abdul Aziz', 'L', NULL, '8 C', 0),
('4519', 'Aldo Yonniar', 'L', NULL, '8 C', 0),
('4520', 'M. Nurul Huda', 'L', NULL, '8 C', 0),
('4521', 'Yogi Tri Sandi', 'L', NULL, '8 D', 0),
('4522', 'Abdul Rohman Muzaki', 'L', NULL, '8 D', 0),
('4523', 'Mohammad Sufyan Jalil', 'L', NULL, '8 D', 0),
('4524', 'Andri Asnan Budianto', 'L', NULL, '8 D', 0),
('4525', 'Agus Suwartono', 'L', NULL, '8 D', 0),
('4526', 'Fitria Qurrotul A''yun', 'P', NULL, '8 C', 0),
('4527', 'Aulia Salsabila', 'P', NULL, '8 C', 0),
('4528', 'Ni''matul Rohmah', 'P', NULL, '8 C', 0),
('4529', 'Cecilia Putri Singkuku', 'P', NULL, '8 C', 0),
('4530', 'Siti Nur Afidah', 'P', NULL, '8 D', 0),
('4531', 'Siti Putri Nur Azizah', 'P', NULL, '8 D', 0),
('4532', 'Winda Chandra Dhynata', 'P', NULL, '8 D', 0),
('4533', 'Elfi Ermawati', 'P', NULL, '8 D', 0),
('4534', 'Lailatul Fitriani', 'P', NULL, '8 D', 0),
('4535', 'Fransisca Wahyu Wibowo', 'P', NULL, '8 D', 0),
('4536', 'Happy Naisyilla Yuliansyah', 'P', NULL, '8 D', 0),
('4537', 'M. Rifki Dwi Febrianto', 'L', NULL, '8 C', 0),
('4538', 'Sinta Dewi Nofia', 'P', NULL, '8 D', 0),
('4539', 'Rina Rahmawati', 'P', NULL, '8 D', 0),
('4540', 'M. Daniel Ardiansyah', 'L', NULL, '8 D', 0),
('4541', 'Agus Prayogo', 'L', NULL, '8 D', 0),
('4542', 'Adi Susanto', 'L', NULL, '8 D', 0),
('4543', 'M. Faiq Shohibul Burhan ', 'L', NULL, '8 D', 0),
('4544', 'Rendy Ardiansyah', 'L', NULL, '8 D', 0),
('4545', 'Tri Aditya Firmansyah', 'L', NULL, '8 F', 0),
('4546', 'M. Sirojul Huda', 'L', NULL, '8 D', 0),
('4547', 'Alfian Reza Aditya', 'L', NULL, '8 D', 0),
('4548', 'Kirana Andi Saputra', 'L', NULL, '8.A', 0),
('4549', 'Sindy Agustina', 'P', NULL, '8 C', 0),
('4550', 'Zetty Oktavia Pujiyanti', 'P', NULL, '8 D', 0),
('4551', 'Laila Nur Hidayah', 'P', NULL, '8 D', 0),
('4552', 'Putri Ilmi Choiriyah', 'P', NULL, '8 D', 0),
('4553', 'Siti Nur Azizah', 'P', NULL, '8 D', 0),
('4554', 'Lailatul Indriani', 'P', NULL, '8 D', 0),
('4555', 'Adit Raya Pangestu', 'L', NULL, '8 D', 0),
('4556', 'Bramantya Tri Wirayudha', 'L', NULL, '8 E', 0),
('4557', 'Aditya Arza Maulana', 'L', NULL, '8 D', 0),
('4558', 'Ahmad Nur Abdus Salam', 'L', NULL, '8.A', 0),
('4559', 'Bagus Lukman Ainur Rozikin', 'L', NULL, '8 D', 0),
('4560', 'Muhamad Choirul Zaki', 'L', NULL, '8 D', 0),
('4561', 'Kalvin Putra Pratama', 'L', NULL, '8 D', 0),
('4562', 'Dimas Syaifuddin Nur Saputra', 'L', NULL, '8 E', 0),
('4563', 'Dimas Wahyu Saputro', 'L', NULL, '8 E', 0),
('4564', 'Yudha Cahya Ramadhani', 'L', NULL, '8 E', 0),
('4565', 'Akbar Kurnia Bayu Pratama', 'L', NULL, '8 E', 0),
('4566', 'M. Saiful Romadhoni ', 'L', NULL, '8 E', 0),
('4567', 'M. Gilang Romadhon Yossy Saputra', 'L', NULL, '8 E', 0),
('4568', 'Dimas Rofi Firdaus', 'L', NULL, '8 E', 0),
('4569', 'M. Adip Setia Firnanda', 'L', NULL, '8 F', 0),
('4570', 'Maulana Ibrohim', 'L', NULL, '8 E', 0),
('4571', 'Agus Hermawan ', 'L', NULL, '8 E', 0),
('4572', 'Alifia Syafrina', 'P', NULL, '8 E', 0),
('4573', 'Ainurrizqi Hidayah', 'P', NULL, '8 E', 0),
('4574', 'Alyssa Prabandari', 'P', NULL, '8 E', 0),
('4575', 'Rafika Prasasti Sulantono', 'P', NULL, '8 E', 0),
('4576', 'Dewi Annisa', 'P', NULL, '8 E', 0),
('4577', 'Yuriska Arifinanda', 'P', NULL, '8 E', 0),
('4578', 'Dewi Imayanti', 'P', NULL, '8 E', 0),
('4579', 'Cindy Ardianti Fahriyah', 'P', NULL, '8 E', 0),
('4580', 'Indi Syifa Khoiria', 'P', NULL, '8 E', 0),
('4581', 'M. Farid Prasetyo', 'L', NULL, '8 E', 0),
('4582', 'Satria Adzin Mauza Altaff', 'L', NULL, '8 E', 0),
('4583', 'Muh. Afwan Mahlawy', 'L', NULL, '8 E', 0),
('4584', 'M. Farkhan Abruri', 'L', NULL, '8 E', 0),
('4585', 'Mochammad Eka Arya Ardiansyah', 'L', NULL, '8 E', 0),
('4586', 'M. Arifudin Zaki', 'L', NULL, '8 E', 0),
('4587', 'Galuh Supriyono', 'L', NULL, '8 E', 0),
('4588', 'M. Irfaq', 'L', NULL, '8 E', 0),
('4589', 'Totok Sutikno', 'L', NULL, '8 E', 0),
('4590', 'Ahmad Diva Setyawan', 'L', NULL, '8 D', 0),
('4591', 'Dwi Nurilismawati', 'P', NULL, '8 E', 0),
('4592', 'Alviana Shufiah', 'P', NULL, '8 E', 0),
('4593', 'Amirotul Khusniah', 'P', NULL, '8 E', 0),
('4594', 'Dewi Farikhatul Fitriya', 'P', NULL, '8 E', 0),
('4595', 'Wahyuningsih', 'P', NULL, '8 E', 0),
('4596', 'Ajeng Dayu Nova Sabilla', 'P', NULL, '8 E', 0),
('4597', 'Ovie Yogi Noviana', 'P', NULL, '8 E', 0),
('4598', 'Indrawati Norman', 'P', NULL, '8 F', 0),
('4599', 'Elis Alistia Hayu', 'P', NULL, '8 F', 0),
('4600', 'Dwi Suci Rahayu', 'P', NULL, '8 F', 0),
('4601', 'Sunariyah Duwi Wantika', 'P', NULL, '8 F', 0),
('4602', 'Erlin Natasya Dewanti', 'P', NULL, '8 F', 0),
('4603', 'Moch. Wahyu Arifudin', 'L', NULL, '8 E', 0),
('4604', 'Moh. Irfan Nasrudin', 'L', NULL, '8 F', 0),
('4605', 'Muhammad Alif', 'L', NULL, '8 F', 0),
('4606', 'M. Thoriqun Nasroh', 'L', NULL, '8.A', 0),
('4607', 'Muhammad Kamil Najib', 'L', NULL, '8 F', 0),
('4608', 'M. Ardi Miftakhul Huda', 'L', NULL, '8 F', 0),
('4609', 'Muhamad Ferdian Ramandani', 'L', NULL, '8 F', 0),
('4610', 'Achmad Hadi Choiril Walidain', 'L', NULL, '8 F', 0),
('4611', 'M. Iz Zainal Muttaqin', 'L', NULL, '8 F', 0),
('4612', 'A. Sharifuddin Afandi', 'L', NULL, '8.A', 0),
('4613', 'Ilgi Dama Alfito Saputra', 'L', NULL, '8 F', 0),
('4614', 'Ani Ufil Kaila', 'P', NULL, '8 F', 0),
('4615', 'Putri Regina Kisa Az-Sahra', 'P', NULL, '8 F', 0),
('4616', 'Ina Mutma''inah', 'P', NULL, '8 F', 0),
('4617', 'Dhea Triesya Syailira', 'P', NULL, '8 F', 0),
('4618', 'Ega Dwi Seftiani', 'P', NULL, '8 F', 0),
('4619', 'Silvia Riska Indriyana', 'P', NULL, '8 F', 0),
('4620', 'Adinda Norma Berliana', 'P', NULL, '8 F', 0),
('4621', 'Nashwa Putri Rahmadani', 'P', NULL, '8 F', 0),
('4622', 'Novita Nurul Hidayah', 'P', NULL, '8 F', 0),
('4623', 'Siti Wulandari', 'P', NULL, '8 F', 0),
('4624', 'Muhammad Mukti', 'L', NULL, '8 F', 0),
('4625', 'Mohammad Yogi Ramadhan', 'L', NULL, '8 F', 0),
('4626', 'Ahmad Nur Shulthoni', 'L', NULL, '8 F', 0),
('4627', 'Muhammad Riyanto', 'L', NULL, '8 F', 0),
('4628', 'M. Aries Syaifudin', 'L', NULL, '8 F', 0),
('4630', 'Muhammad Septian Dwi Rico', 'L', NULL, '8 F', 0),
('4631', 'M. Farid Mustofa', 'L', NULL, '8 F', 0),
('4632', 'Jarno', 'L', NULL, '8 F', 0),
('4633', 'Teguh Firmansyah', 'L', NULL, '8 D', 0),
('4634', 'Khoirun Nasikhin', 'L', NULL, '8 C', 0),
('4635', 'M. Aldo Saputra', 'L', NULL, '8 C', 0),
('4636', 'Eka Bella Dwi Rahayu', 'P', NULL, '8 C', 0),
('4637', 'Revana Yuliyastuti', 'P', NULL, '8 C', 0),
('4638', 'Moch. Syaiful Anam', 'L', NULL, '8 B', 0),
('4639', 'Ahmad Raffi Sahrudin', 'L', NULL, '9 E', 0),
('4639sama', 'Dina Septiana Dewi', 'P', NULL, '8 B', 0),
('4640', 'A. AGUS ALFAN NASRUDDIN', 'L', NULL, '7-F', 0),
('4641', 'ABDUL MUHYI', 'L', NULL, '7-E', 0),
('4642', 'ACHMAD RYAN ARDIANSYAH', 'L', NULL, '7-A', 0),
('4643', 'ADI ZAKARIA', 'L', NULL, '7-E', 0),
('4644', 'ADIB ZAIDANI ABDURROHMAN', 'L', NULL, '7 G', 0),
('4645', 'ADINDA NUR AYUNDA', 'P', NULL, '7 B', 0),
('4646', 'ADINDA SEPTIANA PUSPITA SARI ', 'P', NULL, '7-E', 0),
('4647', 'ADITIA SUCIANA', 'P', NULL, '7-D', 0),
('4648', 'ADITYA ROSDY WARDANA', 'L', NULL, '7-A', 0),
('4649', 'AFID ARDIANTO', 'L', NULL, '7-D', 0),
('4650', 'AGUS TINO DWI PRABOWO', 'L', NULL, '7-C', 0),
('4651', 'AHMAD ABDUL GHOFAR', 'L', NULL, '7-C', 0),
('4652', 'AHMAD ABDUL MUFID', 'L', NULL, '7 G', 0),
('4653', 'AHMAD ALFIN FEBRIANTO', 'L', NULL, '7-E', 0),
('4654', 'AHMAD ALFIYAN', 'L', NULL, '7 B', 0),
('4655', 'AHMAD ALIF KHOIRUN NIZAM', 'L', NULL, '7-F', 0),
('4656', 'AHMAD AMIN SAPUTRO', 'L', NULL, '7-C', 0),
('4657', 'AHMAD FARHAN AL-FARIZY', 'L', NULL, '7 G', 0),
('4658', 'AHMAD GHUFRON AL-BAIHAQI', 'L', NULL, '7-E', 0),
('4659', 'AHMAD KHAFID', 'L', NULL, '7-D', 0),
('4660', 'AHMAD KHOIRUL UMAM', 'L', NULL, '7-E', 0),
('4661', 'AHMAD SRI PRASETYO', 'L', NULL, '7 B', 0),
('4662', 'AISYKA KHOIRUNNISA', 'P', NULL, '7-F', 0),
('4663', 'ALDI SAPUTRA', 'L', NULL, '7-C', 0),
('4664', 'ALFI SINTA RAMADHANI', 'P', NULL, '7 G', 0),
('4665', 'ALFINDI EDO KURNIA', 'L', NULL, '7 G', 0),
('4666', 'ALFIYAH PUTRI HISBULLAH', 'P', NULL, '7-E', 0),
('4667', 'ALIFIA PUTRI BALKIS', 'P', NULL, '7 G', 0),
('4668', 'ALIN NURA FIRDA', 'P', NULL, '7 B', 0),
('4669', 'ALVINA RISMA NA''IFAH', 'P', NULL, '7-E', 0),
('4670', 'AMANDA PUTRI APRILIA', 'P', NULL, '7 B', 0),
('4671', 'AMELIA NAMIRA DAMAYANTI', 'P', NULL, '7-A', 0),
('4672', 'ANANDA HAFIF MUKHAROM', 'L', NULL, '7-E', 0),
('4673', 'ANGGA DWI SAPUTRO', 'L', NULL, '7-D', 0),
('4674', 'ANGGI NUR CAHYATI', 'P', NULL, '7-D', 0),
('4675', 'ANGGI NURDIANA', 'P', NULL, '7-A', 0),
('4676', 'ANGGUN NUR CAHYANI', 'P', NULL, '7-D', 0),
('4677', 'ANIS FITRIA', 'P', NULL, '7-F', 0),
('4678', 'ARIS HARIYANTO', 'L', NULL, '7-D', 0),
('4679', 'ATANIA IZZA SALSABILA', 'P', NULL, '7-F', 0),
('4680', 'AULIA ADI RAMADHANI', 'L', NULL, '7 G', 0),
('4681', 'AVID ARDIANSYAH', 'L', NULL, '7-C', 0),
('4682', 'BACHTIAR ALI SYAFI''I', 'L', NULL, '7 B', 0),
('4683', 'BAGUS EKA PRATAMA', 'L', NULL, '7-C', 0),
('4684', 'BASUKI RAHMAT', 'L', NULL, '7-C', 0),
('4685', 'CHALISTA ZAHIRA ANJANI', 'P', NULL, '7-F', 0),
('4686', 'DAVIS WAHYU SATRIO', 'L', NULL, '7-C', 0),
('4687', 'DAVIT BAYU SAMUDRA', 'L', NULL, '7 B', 0),
('4688', 'DESI SETYAWATI', 'P', NULL, '7-C', 0),
('4689', 'DEWI ANGELITA', 'P', NULL, '7-D', 0),
('4690', 'DEWI LINGGOWATI', 'P', NULL, '7-F', 0),
('4691', 'DEWI TRIANA RAHAYU', 'P', NULL, '7 B', 0),
('4692', 'DIAH AYU ARIANI', 'P', NULL, '7 B', 0),
('4693', 'DIMAS AGUNG TRISAPUTRA', 'L', NULL, '7-A', 0),
('4694', 'DIMAS SURYA ERLANGGA', 'L', NULL, '7-F', 0),
('4695', 'DINDA VALEN AMELLIYA', 'P', NULL, '7-C', 0),
('4696', 'DISTA RAHMA AYU SYARIDA LURY', 'P', NULL, '7-A', 0),
('4697', 'DUWI MAMBAUL RISKIYAH', 'P', NULL, '7-E', 0),
('4698', 'DWI CAHYO RIZKY FIRMANSYAH', 'L', NULL, '7-A', 0),
('4699', 'DWI WULAN APRILYA', 'P', NULL, '7-E', 0),
('4700', 'EVA AFI DATUN NURIYAH', 'P', NULL, '7-F', 0),
('4701', 'EVA JULIANI RAHMAWATI', 'P', NULL, '7-E', 0),
('4702', 'FADHILA NUR FAIZIN', 'L', NULL, '7-D', 0),
('4703', 'FADLY HARIS PRATAMA', 'L', NULL, '7-E', 0),
('4704', 'FAIZ SYAHRIL BAHTIAR ROHANA', 'L', NULL, '7-C', 0),
('4705', 'FAJAR IMAMI', 'L', NULL, '7 B', 0),
('4706', 'FAJRIN RAFIQOH', 'P', NULL, '7 B', 0),
('4707', 'FAREL ELGA DENATA', 'L', NULL, '7-A', 0),
('4708', 'FARIZA DESI AINUR RIZKIYANA', 'P', NULL, '7-A', 0),
('4709', 'FATIMATUS SA''DIYAH', 'P', NULL, '7-F', 0),
('4710', 'FATIMATUS ZAHRA', 'P', NULL, '7-A', 0),
('4711', 'FIKRI HAIKAL MAULUDIN', 'L', NULL, '7-F', 0),
('4712', 'GALUH RAGIL NASTITI', 'P', NULL, '7-F', 0),
('4713', 'GILANG EKA ADI SAPUTRA', 'P', NULL, '7 G', 0),
('4714', 'GILANG FAIZAH ANSHORI', 'L', NULL, '7-C', 0),
('4715', 'HARIS', 'L', NULL, '7-C', 0),
('4716', 'HENDIN DELA PUTRI FARDANA', 'P', NULL, '7-F', 0),
('4717', 'HERLIN MEILIANA AGUSTIN', 'P', NULL, '7-E', 0),
('4718', 'HILDA SAPUTRI', 'P', NULL, '7-E', 0),
('4719', 'IBNU AKBAR AL FATHONI ', 'L', NULL, '7-D', 0),
('4720', 'IKA LUSIANA PRATIWI', 'P', NULL, '7-F', 0),
('4721', 'ILHAM FATKUR ROHMAN', 'L', NULL, '7-C', 0),
('4722', 'ILHAM RIZKIAWAN', 'L', NULL, '7-D', 0),
('4723', 'INDIKA MAISAROH', 'P', NULL, '7 B', 0),
('4724', 'INTAN NUR''AINI', 'P', NULL, '7-D', 0),
('4725', 'ISLAHU AINUR ROZIKIN', 'L', NULL, '7-D', 0),
('4726', 'ISNA NUR FITRIA', 'P', NULL, '7-E', 0),
('4727', 'ISNA NUR HIDAYAH', 'P', NULL, '7-C', 0),
('4728', 'JUAN TRI LAKSONO', 'L', NULL, '7 B', 0),
('4729', 'KALIN ADIS TIA TASYA', 'P', NULL, '7-F', 0),
('4730', 'KELIK AJI PANGESTU', 'L', NULL, '7 B', 0),
('4731', 'KHILMATUR ROSYIDAH', 'P', NULL, '7-C', 0),
('4732', 'KHUSNUL MAULIDIA', 'P', NULL, '7-A', 0),
('4733', 'LAILATUL ISRO''IYAH', 'P', NULL, '7 G', 0),
('4734', 'LAUDYA CITRA APRILLIA', 'P', NULL, '7 G', 0),
('4735', 'LINTANG MONAGITA', 'P', NULL, '7-A', 0),
('4736', 'LIVIA WULANDARI', 'P', NULL, '7-E', 0),
('4737', 'M. ADRIANSYAH', 'L', NULL, '7 G', 0),
('4738', 'M. AFAN MAHENDRA', 'L', NULL, '7-A', 0),
('4739', 'M. ALFIYAN SYAFI''UL ADHIM', 'L', NULL, '7-F', 0),
('4740', 'M. ALVIN MUGNI', 'L', NULL, '7-A', 0),
('4741', 'M. BAGAS SEPTIANTO', 'L', NULL, '7-A', 0),
('4742', 'M. BAGUS ADI SAPUTRO', 'L', NULL, '7-A', 0),
('4743', 'M. DAMAR TSALIST SYAHRU SYA''BANA', 'L', NULL, '7-E', 0),
('4744', 'M. DIAN ANGGA PRAYOGA', 'L', NULL, '7-C', 0),
('4745', 'M. FAHRUL ARIFFUDDIN', 'L', NULL, '7-D', 0),
('4746', 'M. FARID PUJI EFENDI', 'L', NULL, '7 G', 0),
('4747', 'M. LEVI NADIN CANDRA SAPUTRA', 'L', NULL, '7-D', 0),
('4748', 'M. NABIL SAIFUDIN HIDAYATULLOH', 'L', NULL, '7-D', 0),
('4749', 'M. NAUVAL DZINNUHA', 'L', NULL, '7-C', 0),
('4750', 'M. PRATAMA ADI SAPUTRA', 'L', NULL, '7 B', 0),
('4751', 'M. ROBITUL KAMAL', 'L', NULL, '7-E', 0),
('4752', 'M. TEDY RIVALDY', 'L', NULL, '7-F', 0),
('4753', 'MAULANA NIKOLAS SAPUTRA', 'L', NULL, '7-E', 0),
('4754', 'MEGA CANDRA PRATAMA', 'L', NULL, '7-E', 0),
('4755', 'MEISYA SAKHIYA AMANDA', 'P', NULL, '7-D', 0),
('4756', 'MELI SAHARANI', 'P', NULL, '7 B', 0),
('4757', 'MOCH. ADI CAHYA', 'L', NULL, '7-D', 0),
('4758', 'MOCH. ANDIKA ERIK PRATAMA', 'L', NULL, '7-C', 0),
('4759', 'MOCH. AVIV PRATAMA', 'L', NULL, '7 G', 0),
('4760', 'MOCH. DIKI WAHYU PRASETYO', 'L', NULL, '7 G', 0),
('4761', 'MOCH. HAIKAL FAIS', 'L', NULL, '7-A', 0),
('4762', 'MOCH. IMAM BAIHAQI', 'L', NULL, '7 G', 0),
('4763', 'MOCH. ISNAINI FARHAN', 'L', NULL, '7 B', 0),
('4764', 'MOCH. MIZAN MUZAKI', 'L', NULL, '7 B', 0),
('4765', 'MOCH. NANANG PRASETYO', 'L', NULL, '7-C', 0),
('4766', 'MOCH. OPICK ARIAWAN', 'L', NULL, '7 B', 0),
('4767', 'MOCH. SAHRUL MUBARROK', 'L', NULL, '7-F', 0),
('4768', 'MOCH. SYALTUT AL FALLACHY', 'L', NULL, '7 B', 0),
('4769', 'MOCH. THORIQ AFFANDI', 'L', NULL, '7-E', 0),
('4770', 'MOCHAMMAD HIDAYAT', 'L', NULL, '7-E', 0),
('4771', 'MOH. RAJUAR HERDIANSYAH', 'L', NULL, '7 B', 0),
('4772', 'MOH. RIZKI FUADDUDDIN', 'L', NULL, '7-A', 0),
('4773', 'MOHAMAD BHIMA FIRMANSAH', 'L', NULL, '7-F', 0),
('4774', 'MOHAMAD DWI DZAKI AL-IRSYAD', 'L', NULL, '7-E', 0),
('4775', 'MOHAMAD RIFA''I', 'L', NULL, '7-C', 0),
('4776', 'MOHAMMAD BAGUS HARIANTO', 'L', NULL, '7-A', 0),
('4777', 'MUCHAMMAD RISKA JOLIAN NARTA', 'L', NULL, '7-A', 0),
('4778', 'MUHAMAD ASROFUL MUJIB', 'L', NULL, '7-E', 0),
('4779', 'MUHAMED FAREL IBRAHIM', 'L', NULL, '7-D', 0),
('4780', 'MUHAMMAD  ROZAB ABUL CHOIR', 'L', NULL, '7-C', 0),
('4781', 'MUHAMMAD ADITYA DWI ANDIKA', 'L', NULL, '7 B', 0),
('4782', 'MUHAMMAD ALI MUSHOFA', 'L', NULL, '7-F', 0),
('4783', 'MUHAMMAD ANDI  MAULANA', 'L', NULL, '7 G', 0),
('4784', 'MUHAMMAD ARDIB ALDIANSYAH', 'L', NULL, '7-F', 0),
('4785', 'MUHAMMAD BAYU SAPUTRO', 'L', NULL, '7 B', 0),
('4786', 'MUHAMMAD DIMAS FACHRIZA', 'L', NULL, '7-A', 0),
('4787', 'MUHAMMAD FERDI ROZIANDA', 'L', NULL, '7-E', 0),
('4788', 'MUHAMMAD HUSEN', 'L', NULL, '7-D', 0),
('4789', 'MUHAMMAD IMAM SAMUDRA', 'L', NULL, '7 G', 0),
('4790', 'MUHAMMAD IQBAL FAHNANI', 'L', NULL, '7-F', 0),
('4791', 'MUHAMMAD MIFTAHUL AKMAL', 'L', NULL, '7 G', 0),
('4792', 'MUHAMMAD MISBAKHUL ANSORI', 'L', NULL, '7-D', 0),
('4793', 'MUHAMMAD NASRUDIN FIRMANSYAH', 'L', NULL, '7-F', 0),
('4794', 'MUHAMMAD NIZAM AFRIZA', 'L', NULL, '7-D', 0),
('4795', 'MUHAMMAD NUR KARIS AL ADNAN', 'L', NULL, '7 G', 0),
('4796', 'MUHAMMAD RIFKI ABDULLAH            ', 'L', NULL, '7 G', 0),
('4797', 'MUHAMMAD RIZAL', 'L', NULL, '7-E', 0),
('4798', 'MUHAMMAD ROYKHAN KHAMIMI', 'L', NULL, '7-D', 0),
('4799', 'MUHAMMAD TIO NUGROHO', 'L', NULL, '7-F', 0),
('4800', 'MUHAMMAD YAHYA', 'L', NULL, '7-E', 0),
('4801', 'MUHAMMAD YUSUF EFENDI', 'L', NULL, '7-D', 0),
('4802', 'MUKAMAD ARDIHANTO', 'L', NULL, '7-D', 0),
('4803', 'NABIL RANGGA ABDUL M', 'L', NULL, '7-F', 0),
('4804', 'NABILA ROHMA ZAYANTI', 'P', NULL, '7-A', 0),
('4805', 'NABILA TASYA AMALIA', 'P', NULL, '7-E', 0),
('4806', 'NADIA NURUL FADLA', 'P', NULL, '7-F', 0),
('4807', 'NADIVA AMELIA', 'P', NULL, '7 G', 0),
('4808', 'NAYSZUA REGITA AYU FIRDAUS', 'P', NULL, '7-D', 0),
('4809', 'NEZA DWI RAHMAWATI', 'P', NULL, '7-F', 0),
('4810', 'NOVA ADITYA PRANATA', 'L', NULL, '7 G', 0),
('4811', 'NOVI ANGGRAINI ', 'P', NULL, '7-D', 0),
('4812', 'NOVI AULIA PUTRI', 'P', NULL, '7 B', 0),
('4813', 'NOVIA FITRIANA', 'P', NULL, '7-A', 0),
('4814', 'NUR AINI AGUSTINA', 'P', NULL, '7-C', 0),
('4815', 'NUR CANDRA WIDYA N', 'P', NULL, '7-C', 0),
('4816', 'NUR IMAMATUN NISA''', 'P', NULL, '7-A', 0),
('4817', 'NUR SOFIA AZMA', 'P', NULL, '7-E', 0),
('4818', 'OCTA NUR RIZKI ROMADHON', 'L', NULL, '7-C', 0),
('4819', 'OKTAVIANA DWI RHAMDANI', 'P', NULL, '7 B', 0),
('4820', 'PRADIKA ARI PRATAMA', 'L', NULL, '7-C', 0),
('4821', 'PRISA ALVIANI', 'P', NULL, '7 G', 0),
('4822', 'PUGUH AINUN NA''IM', 'L', NULL, '7-F', 0),
('4823', 'PUTRI EKA SHINTIAWATI', 'P', NULL, '7 G', 0),
('4824', 'RADIT HINDRAWAN', 'L', NULL, '7 G', 0),
('4825', 'RADITYA BREGAS RANANTA', 'L', NULL, '7-A', 0),
('4826', 'RAFAELA ANDRIANI SILVANIA KHOIRIYAH', 'P', NULL, '7-F', 0),
('4827', 'RAHMA PABILA', 'P', NULL, '7 B', 0),
('4828', 'RAHMAD DANI SANTOSO', 'L', NULL, '7 B', 0),
('4829', 'RAHMANIA SABITHA PUTRI ROSYADI', 'P', NULL, '7-A', 0),
('4830', 'RAKA ADITYA', 'L', NULL, '7-D', 0),
('4831', 'RANDY WIBOWO', 'L', NULL, '7-C', 0),
('4832', 'RANGGA ARDIANSYAH', 'L', NULL, '7-C', 0),
('4833', 'RANGGA DWI FIRMANSYAH', 'L', NULL, '7-D', 0),
('4834', 'RELITA ANDITYA PUTRI', 'P', NULL, '7 G', 0),
('4835', 'RINTAQUL PUTRI KUSUMA', 'P', NULL, '7-D', 0),
('4836', 'RIRIN DWI HARIYANTI', 'P', NULL, '7-A', 0),
('4837', 'RISMA AZILIA CAHAYA DEVI', 'P', NULL, '7-A', 0),
('4838', 'RITA ELFINA', 'P', NULL, '7-C', 0),
('4839', 'RIZKIYATUS SHOFA AMELIA', 'P', NULL, '7-E', 0),
('4840', 'ROSA AGUSTINA', 'P', NULL, '7 G', 0),
('4841', 'SALISAH NURMALA', 'P', NULL, '7-E', 0),
('4842', 'SALVA SAVANA', 'P', NULL, '7-C', 0),
('4843', 'SALWA ADELIA SAFITRI', 'P', NULL, '7 G', 0),
('4844', 'SEPTI NUR FADHILATURROHMAH', 'P', NULL, '7-F', 0),
('4845', 'SERLI MEILIA KUSUMA', 'P', NULL, '7-D', 0),
('4846', 'SHAFA HELMALIA AYUNI', 'P', NULL, '7-A', 0),
('4847', 'SIHHAH ULYA KAMAL', 'P', NULL, '7 B', 0),
('4848', 'SINDI AULIYA RAHMAWATI', 'P', NULL, '7-A', 0),
('4849', 'SITI KHAMIDATUN NISA', 'P', NULL, '7 G', 0),
('4850', 'SITI LAILATUL FITRIYA', 'P', NULL, '7 G', 0),
('4851', 'SITI NUR AMANAH', 'P', NULL, '7-F', 0),
('4852', 'SITI NUR KHASANAH', 'P', NULL, '7 G', 0),
('4853', 'SITI OKTAVIA ROMADHONI', 'P', NULL, '7-A', 0),
('4854', 'SITI UMI MUSYAROFAH', 'P', NULL, '7-D', 0),
('4855', 'SRI INDAH YULIA PUTRI', 'P', NULL, '7-C', 0),
('4856', 'TAMAM KHOIRUDIN', 'L', NULL, '7 B', 0),
('4857', 'TASYA DWI UNTARA', 'P', NULL, '7-A', 0),
('4858', 'TATIA NABILA', 'P', NULL, '7-F', 0),
('4859', 'TEGAR PASHA RAMADHANI', 'L', NULL, '7 B', 0),
('4860', 'TIRZHA MACHFUD ARIF PUTRA', 'L', NULL, '7-F', 0),
('4861', 'TRIANA NOVI RAHMAWATI', 'P', NULL, '7 G', 0),
('4862', 'TSALITSA AZAHRA FEBYANTI', 'P', NULL, '7 G', 0),
('4863', 'UMMI FADHILATUSSA''IDAH', 'P', NULL, '7-E', 0),
('4864', 'VADA AULIA SIDIQ', 'L', NULL, '7-A', 0),
('4865', 'VIVI WULANDARI', 'P', NULL, '7 G', 0),
('4866', 'WAHYU SUPRAYITNO', 'L', NULL, '7 B', 0),
('4867', 'WULAN IRA AGUSTINA', 'P', NULL, '7-F', 0),
('4868', 'YIZA SETIAWAN ', 'L', NULL, '7-D', 0),
('4869', 'YOLA AMELIA PUTRI', 'P', NULL, '7 B', 0),
('4870', 'YUDA KURNIAWAN', 'L', NULL, '7-C', 0),
('4871', 'ZIKY NATA KURNIAWAN', 'L', NULL, '7 B', 0);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `kode_buku` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `penerbit` varchar(50) NOT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `klasifikasi` varchar(25) DEFAULT NULL,
  `tanggal` varchar(10) NOT NULL,
  `no_inventaris` varchar(20) NOT NULL,
  `asal` varchar(10) NOT NULL,
  `bahasa` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `no_induk` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `penerbit`, `pengarang`, `klasifikasi`, `tanggal`, `no_inventaris`, `asal`, `bahasa`, `harga`, `id_jenis`, `no_induk`, `keterangan`, `jumlah`) VALUES
(1, 'IPA MTs KELAS VII', 'KEMDIKBUD', 'WAHONO DKK', NULL, '18-Juni-20', '/MTs/P/2015', 'P / BOS', 'INDONESIA', 22000, 1, 216, 'BAIK SEKALEEHH', 215),
(2, 'MTK MTs KELAS VII', 'KEMDIKBUD', 'ABD ROHMAN DKK', NULL, '18-Juni-20', '    /MTs/P/2015', 'P / BOS', 'INDONESIA', 22000, 1, 216, 'BAIK', 216),
(3, 'PKN MTs KELAS VII', 'KEMDIKBUD', 'SALIKUN DKK', NULL, '18-Juni-20', '    /MTs/P/2075', 'P / BOS', 'INDONESIA', 22000, 1, 276, 'BAIK', 276),
(4, 'PRAKARYA MTs KELAS VII', 'KEMDIKBUD', 'SUCI PRASTI', NULL, '18-Juni-20', '    /MTs/P/2015', 'P / BOS', 'INDONESIA', 22000, 1, 223, 'BAIK', 193),
(5, 'IPS MTs KELAS VII', 'KEMDIKBUD', 'MUSLIH', NULL, '18-Juni-20', '    /MTs/P/2015', 'P / BOS', 'INDONESIA', 22000, 1, 216, 'BAIK', 186);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_peminjaman` varchar(25) NOT NULL,
  `kode_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('P','K','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_peminjaman`, `kode_buku`, `jumlah`, `status`) VALUES
('2018-08-11-1', 1, 30, 'K'),
('2018-08-11-1', 5, 30, 'K'),
('2018-08-11-2', 2, 30, 'K'),
('2018-08-11-2', 3, 30, 'K'),
('2018-08-11-3', 2, 30, 'K'),
('2018-08-11-3', 3, 30, 'K'),
('2018-08-12-1', 1, 30, 'K'),
('2018-08-12-1', 5, 30, 'K'),
('2018-08-12-2', 2, 30, 'K'),
('2018-08-12-2', 1, 30, 'K'),
('2018-08-12-3', 1, 30, 'K'),
('2018-08-12-3', 2, 30, 'K'),
('2018-08-13-1', 1, 30, 'K'),
('2018-08-13-1', 5, 30, 'K'),
('2018-08-13-2', 2, 30, 'K'),
('2018-08-13-2', 3, 30, 'K'),
('2018-08-13-3', 4, 1, 'K'),
('2018-08-13-4', 1, 1, 'P'),
('2018-08-13-5', 1, 1, 'K'),
('2018-08-13-6', 4, 30, 'P'),
('2018-08-13-6', 5, 30, 'P'),
('2018-08-13-7', 1, 1, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id_guru` int(25) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `password` text NOT NULL,
  `nama_guru` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `user`, `password`, `nama_guru`) VALUES
(1, '196812311999031012', '196812311999031012', '493ff5a18bf5f65ae808604f88424d90', 'Drs. ABDUR ROZAQ, M.Pd.I'),
(2, '197110301997031002', '197110301997031002', '25c8a989027cdf297c066bc0fac62758', 'Tri Harianto, S.Pd'),
(3, '197209111998032001', '197209111998032001', 'bb789d38bca1a637fb3f3fa78edd99fa', 'Sri Isnaeni, S.Pd'),
(4, '196504281999032001', '196504281999032001', '999b7d576ce0605aa2e481b222bfde09', 'Dra. Laila Rohmatul Karomah'),
(5, '196803121999032001', '196803121999032001', '26635a41d3f22f9d7970c5fd545a2d10', 'Dra. St. Zahrotun Ni''mah'),
(6, '196910011998032002', '196910011998032002', 'd359efd762d35cbfe2f3450e5a6f781b', 'Umi Marzuqoh, S.Ag'),
(7, '197010271992031002', '197010271992031002', 'a51b99c92bdb6b855e680d852b13e69d', 'Elva Noor Varid, S.PdI'),
(8, '196509181989031002', '196509181989031002', '816d847b94b9e1961792538069c8f49a', 'Drs. H. Idrus Sulaiman, M.PdI'),
(9, '196907092003121003', '196907092003121003', '2147ee42354073ed48a3d9bf946492e2', 'Drs. Miftahur Rohman, MA'),
(10, '197107262003121001', '197107262003121001', '4ff08a1c78d710210e38ad6df684d274', 'Moch. Tarom, S.Ag'),
(11, '196503102003122001', '196503102003122001', 'ba4bf9e94abf585875c26cd0602b33d2', 'Dra. Sri Monah'),
(12, '196610302005012001', '196610302005012001', '55c6fa2c10266c2c8ea26ce0631da116', 'Dra. Sri Winariyati'),
(13, '196904162005012002', '196904162005012002', '6cc168baa800f6eb2e540b581c9bd8d6', 'Siti Innayati Niswatin, S.Pd'),
(14, '196703272005011002', '196703272005011002', 'ba75758fe9de69014d432f347517cb72', 'Yakqub, S.Pd.'),
(15, '198006182005012003', '198006182005012003', '509315a6eb211fc3f80bd6ca605a5c57', 'Rukhaniyah, S.Pd'),
(16, '198204222005012004', '198204222005012004', '2184b55d29733b482059c8658154e255', 'Indah Nur Dwiwati, S.Pd'),
(17, '197103132005012002', '197103132005012002', 'ba65ae56b29c32522325d8b4ac7338bd', 'Nurmawati, S.Pd'),
(18, '197412172005012003', '197412172005012003', '0855e4d35a2b37cbcb8c5ca3562d08e9', 'Sri Sujarwati, S.Psi.'),
(19, '196606132006042002', '196606132006042002', '647a7e1bc6242e1f2d77968d3741e711', 'Dra. Sri Hendrawati Wulan'),
(20, '198004102005012005', '198004102005012005', '11bca808dc701dff61fadbe85bc198b3', 'Jumini, S.Pd, M.Si'),
(21, '196906202007012038', '196906202007012038', '8ddb72121aee03ff9395ff24cb01b923', 'Dra. Tutik Nurhidayati'),
(22, '197201282007012015', '197201282007012015', 'aa59102e3b5f232d75752d6ecdd5b49f', 'Fa''ata, S.Ag'),
(23, '196705152005011004', '196705152005011004', '6ba472725f368d25e296fa14cb286dc6', 'Drs. Jupri'),
(24, '196904222007012019', '196904222007012019', 'bf9f8598bb495052c0aee92a006188fc', 'Dra. Umu Hanifah'),
(25, '198112182007012010', '198112182007012010', 'e36ef47e57013645505798b3623207f9', 'Beti Hariani, S.Pd'),
(26, '197305102007012005', '197305102007012005', 'abf3d31b975a51dea942bfc8840d5bbd', 'Masfiani, S.Ag'),
(27, '196908312007101002', '196908312007101002', 'bd70b88d4ec2de9764c80b4d9fd67452', 'Lasmiran, S.Ag, S.Pd'),
(28, '197302242007101001', '197302242007101001', 'fa77a04d84946eb0c4523ab24490ad0e', 'A. Zainal Abidin, S.Pd'),
(29, '197712122007102001', '197712122007102001', 'c469c8a68db7f6745dc56ea2de095bc7', 'Nursuli Ulfa, S.Ag'),
(30, '197902222007101003', '197902222007101003', 'e2f4fbfef90dd1585f2314d987066957', 'Arif Muhadzab, S.Pd'),
(31, '198002162007102003', '198002162007102003', 'f2cbe3b96ee0e83a150b88d09c549a4b', 'Sri Wahyuni, SS'),
(32, '198006192007102001', '198006192007102001', 'ed167b8fed29ce5f969d22f0a9254a2a', 'Diah Istiqomah, S.Pd'),
(33, '197712232009011004', '197712232009011004', '74c93da9956e0b6e200312f20cdd65e3', 'Masduki Hasan, S.Pd'),
(34, '197710142009101002', '197710142009101002', '64e0424f91d4cadd69d21fa335e4fc82', 'Imron Hamzah'),
(35, '197205072014121004', '197205072014121004', 'fe423ab88cb3a59e2ac3d3af59513f16', 'Wahyudi'),
(36, '198506142014121003', '198506142014121003', '6c836d1147dd69c947f1fef7e51b5944', 'Mujib, S.Kom'),
(37, '121135220003120045', '121135220003120045', '7a6a9c1f55089e22907dc4b658129351', 'Abdul Rohman, S.Kom'),
(38, '121135220003310046', '121135220003310046', '0cce7814b14d3ca027c8b18de64df592', 'Nanang Fahrudin, S.Pd'),
(39, '121135220003310047', '121135220003310047', '16016a96d7128a7898171e950967165c', 'Eni Indrawati, S.Psi'),
(40, '121135220003060048', '121135220003060048', '6c5575d6e6adb7f833e42979c0d18351', 'Muniroh, S.PdI'),
(41, '121135220003270049', '121135220003270049', '92b33589026157845eb10de9a01bab74', 'Ida Karimatul H, S.Pd'),
(42, '197101062014121001', '197101062014121001', 'fed4f2846fd3bdbcb5a3375beb04682e', 'Edy Supriyanto'),
(43, '121135220003330052', '121135220003330052', 'daa98ee64e63b874d28929980bbab61c', 'Suherman'),
(44, '121135220003330053', '121135220003330053', '7e25a75b11ad4a18fd8c3f01967d280f', 'Qona''im'),
(45, '121135220003330054', '121135220003330054', '66ef9973233975a88c64d65cdeacba59', 'Sakim'),
(46, '121135220003330055', '121135220003330055', '595ad59959a6919da38758c61e6bcfa7', 'Khorul Anwar'),
(47, '197204032009012002', '197204032009012002', 'fc2aa6bfb01433e23b30b4cf65fa0d57', 'Rohmatul Badiah, S.Pd.I'),
(48, '197609292007101005', '197609292007101005', '65740ca44b119bc74e52bf11db2c519b', 'Jazuli, S. Ag.'),
(49, '198304022009011007', '198304022009011007', '8599a0f4b7afa5e862a20fdd09db7bb4', 'Khoirur Rofiqi, S.Pd'),
(50, '196605052014121003', '196605052014121003', '7fab63675c703e55725d0a74bae9526d', 'Ali Ahmad, S.Pd'),
(51, '197010062014122001', '197010062014122001', '745ff2b6c02971b09d5b630bf926a7a7', 'Farida, S.Ag'),
(52, '198010252007102003', '198010252007102003', '507027cd84db825dca85c967ac214d05', 'Lu`Luatul Fuad '),
(53, '197408022005012001', '197408022005012001', '691d5e908c53ec56869687638d741fad', 'Nurul Ratna Wulan, S.Pd'),
(54, '197202052005011003', '197202052005011003', '8dbd1fb4ac05753ae224182ef4111ed9', 'Tri Marjono Siswo Handoko, S.Pd'),
(55, '121135220003330056', '121135220003330056', '8afde6887e3872537cf93465ead9ec50', 'Erna Kusvianto');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis_buku` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis_buku`) VALUES
(1, 'Buku Pelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int(25) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `password` text NOT NULL,
  `nama_petugas` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nip`, `user`, `password`, `nama_petugas`) VALUES
(1, '1641723007', '1641723007', '22f63f8955f81410f37ca6c7ce065723', 'Elfan Rodhian Putra');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_peminjaman` varchar(25) NOT NULL,
  `id_anggota` varchar(15) NOT NULL,
  `id_petugas` varchar(15) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `tanggal_pinjam` varchar(10) NOT NULL,
  `tanggal_kembali` varchar(10) NOT NULL,
  `kembali_tanggal` varchar(10) NOT NULL,
  `status` enum('P','K','','') NOT NULL,
  `denda` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_peminjaman`, `id_anggota`, `id_petugas`, `id_guru`, `tanggal_pinjam`, `tanggal_kembali`, `kembali_tanggal`, `status`, `denda`) VALUES
('2018-08-11-1', '4180', '1', 3, '2018-08-11', '2018-08-11', '2018-08-11', 'K', '0'),
('2018-08-11-2', '4180', '1', 4, '2018-08-11', '2018-08-11', '2018-08-11', 'K', '0'),
('2018-08-11-3', '4179', '1', 2, '2018-08-11', '2018-08-11', '2018-08-12', 'K', '0'),
('2018-08-12-1', '4180', '1', 2, '2018-08-12', '2018-08-12', '2018-08-12', 'K', '0'),
('2018-08-12-2', '4181', '1', 4, '2018-08-12', '2018-07-30', '2018-08-12', 'K', '2600'),
('2018-08-12-3', '4185', '1', 7, '2018-08-12', '2018-08-12', '2018-08-13', 'K', '200'),
('2018-08-13-1', '4182', '1', 4, '2018-08-13', '2018-08-13', '2018-08-13', 'K', '0'),
('2018-08-13-2', '4180', '1', 2, '2018-08-13', '2018-08-13', '2018-08-13', 'K', '0'),
('2018-08-13-3', '4179', '1', 0, '2018-08-13', '2018-08-15', '2018-08-13', 'K', '0'),
('2018-08-13-4', '', '1', 0, '2018-08-13', '2018-08-15', '', 'P', '0'),
('2018-08-13-5', '4181', '1', 0, '2018-08-13', '2018-08-15', '2018-08-13', 'K', '0'),
('2018-08-13-6', '4333', '1', 38, '2018-08-13', '2018-08-13', '', 'P', '0'),
('2018-08-13-7', '4184', '1', 0, '2018-08-13', '2018-08-11', '', 'P', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `kode_buku` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
