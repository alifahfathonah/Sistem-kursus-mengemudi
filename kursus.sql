/*
SQLyog Enterprise v12.09 (64 bit)
MySQL - 10.4.8-MariaDB : Database - kursus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kursus` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

/*Table structure for table `absensi` */

DROP TABLE IF EXISTS `absensi`;

CREATE TABLE `absensi` (
  `id_absen` int(8) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(8) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `pertemuan` int(3) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_absen`),
  KEY `id_jadwal` (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

/*Data for the table `absensi` */

insert  into `absensi`(`id_absen`,`id_jadwal`,`tgl`,`pertemuan`,`keterangan`) values (53,22,'2020-01-21',1,'OK'),(54,22,'2020-01-21',2,'Siap'),(55,22,'2020-01-21',3,'Bagus'),(56,22,'2020-01-21',4,'Keren'),(57,22,'2020-01-21',5,'Mantap'),(58,22,'2020-01-21',6,'Ok'),(59,22,'2020-01-21',7,'Cepet lulus'),(60,22,'2020-01-21',8,'OK'),(61,22,'2020-01-21',9,'Keren'),(62,22,'2020-01-21',10,'SIP');

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) DEFAULT NULL,
  `tmpt_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` varchar(12) DEFAULT NULL,
  `jns_kel` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nama_admin`,`tmpt_lahir`,`tgl_lahir`,`jns_kel`,`alamat`,`foto`,`username`,`password`,`level`) values (1,'Bima Febriansyah','Pontianak','2010-02-19','Laki-Laki','Jalan Perdamaian Komplek Borneo 1 Blok B3','CAPTURE1.jpeg','BmF10','311d0efeb9d1b587667a84ff83ecd01f','1'),(2,'Maemunah','Pontianak','09/08/1997','Perempuan','Jalan Prof M. Yamin Gg. Budikarya no 13','user7-128x128.jpg','Maemunah','e10adc3949ba59abbe56e057f20f883e','0'),(7,'Jono','Pontianak','09/02/1989','Laki-Laki','Jalan Dr. Sutomo Gg. Karya No 1','avatar5.png','jonojono','e10adc3949ba59abbe56e057f20f883e','1');

/*Table structure for table `bayar` */

DROP TABLE IF EXISTS `bayar`;

CREATE TABLE `bayar` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kode_unik` int(3) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `id_rekening` int(5) DEFAULT NULL,
  `id_peserta` int(5) DEFAULT NULL,
  KEY `id` (`id`),
  KEY `id_peserta` (`id_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `bayar` */

insert  into `bayar`(`id`,`kode_unik`,`nominal`,`id_rekening`,`id_peserta`) values (37,127,649873,6,29);

/*Table structure for table `instruktur` */

DROP TABLE IF EXISTS `instruktur`;

CREATE TABLE `instruktur` (
  `id_instruktur` int(8) NOT NULL AUTO_INCREMENT,
  `nm_instruktur` varchar(52) DEFAULT NULL,
  `jns_kel` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `tmpt_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` varchar(12) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_instruktur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `instruktur` */

insert  into `instruktur`(`id_instruktur`,`nm_instruktur`,`jns_kel`,`tmpt_lahir`,`tgl_lahir`,`alamat`,`no_telp`,`email`,`password`,`foto`) values (7,'Instruktur 1','Laki-Laki','Pontianak','1994-07-13','Jl. Prof. M. Yamin GG Usaha Bersama 1','089693943932','instruktur1@gmail.com','93db24ecd4547cb47848ca741b6a1faf','cok1.png'),(8,'Instruktur 2','Laki-Laki','Pontianak','1995-07-13','Jl. Prof. M. Yamin GG Usaha Bersama 1','089693943931','instruktur2@gmail.com','c34042340935fd454e6dae70ff136b49','COK21.png');

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `id_jadwal` int(8) NOT NULL AUTO_INCREMENT,
  `id_peserta` int(8) DEFAULT NULL,
  `id_instruktur` int(8) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `id_peserta` (`id_peserta`),
  KEY `id_instruktur` (`id_instruktur`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `jadwal` */

insert  into `jadwal`(`id_jadwal`,`id_peserta`,`id_instruktur`,`tgl_mulai`,`jam`,`tgl_selesai`,`status`) values (22,29,7,'2020-01-22','08:00:00','2020-02-01','Tidak Aktif');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT,
  `id_peserta` int(8) DEFAULT NULL,
  `id_rekening` int(8) DEFAULT NULL,
  `no_rekening` int(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jmlh_pembayaran` double DEFAULT NULL,
  `bukti_pembayaran` varchar(50) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `status` enum('Ditolak','Diterima','Proses') DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `nm_bank` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_rekening` (`id_rekening`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`id_peserta`,`id_rekening`,`no_rekening`,`nama`,`jmlh_pembayaran`,`bukti_pembayaran`,`tgl_upload`,`status`,`tgl_update`,`nm_bank`) values (30,29,6,2147483647,'Murid 1',649873,'20190515-042338-5cdb370875065776065e29e61.jpg','2020-01-21','Diterima','2020-01-21','BRI');

/*Table structure for table `penilaian` */

DROP TABLE IF EXISTS `penilaian`;

CREATE TABLE `penilaian` (
  `id_nilai` int(8) NOT NULL AUTO_INCREMENT,
  `id_peserta` int(8) DEFAULT NULL,
  `id_instruktur` int(8) DEFAULT NULL,
  `uullaj` int(3) DEFAULT NULL,
  `pdkb` int(3) DEFAULT NULL,
  `ttssb` int(3) DEFAULT NULL,
  `mrlp` int(3) DEFAULT NULL,
  `mrjr` int(3) DEFAULT NULL,
  `pkb` int(3) DEFAULT NULL,
  `jumlah` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `id_peserta` (`id_peserta`),
  KEY `id_instruktur` (`id_instruktur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `penilaian` */

insert  into `penilaian`(`id_nilai`,`id_peserta`,`id_instruktur`,`uullaj`,`pdkb`,`ttssb`,`mrlp`,`mrjr`,`pkb`,`jumlah`) values (4,29,7,80,70,75,75,79,70,449);

/*Table structure for table `rekening` */

DROP TABLE IF EXISTS `rekening`;

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL AUTO_INCREMENT,
  `nm_bank` varchar(10) DEFAULT NULL,
  `kode_bank` varchar(5) DEFAULT NULL,
  `pemilik` varchar(30) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_rekening`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `rekening` */

insert  into `rekening`(`id_rekening`,`nm_bank`,`kode_bank`,`pemilik`,`no_rek`) values (6,'BNI','007','Bima Febriansyah','09812989182998');

/*Table structure for table `sertifikat` */

DROP TABLE IF EXISTS `sertifikat`;

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(8) NOT NULL AUTO_INCREMENT,
  `id_peserta` int(8) DEFAULT NULL,
  `status` enum('Belum','Sudah') DEFAULT NULL,
  `scan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_sertifikat`),
  KEY `id_peserta` (`id_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `sertifikat` */

insert  into `sertifikat`(`id_sertifikat`,`id_peserta`,`status`,`scan`) values (29,29,'Sudah','screencapture-localhost-kursus-sertifikat-cetak-7-2019-08-24-14_49_13.jpg');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id_peserta` int(8) NOT NULL AUTO_INCREMENT,
  `nm_peserta` varchar(50) DEFAULT NULL,
  `jns_kel` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `tmpt_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` varchar(12) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif','Ditolak','Selesai','Proses','Gagal','Penilaian') DEFAULT NULL,
  `testimoni` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `siswa` */

insert  into `siswa`(`id_peserta`,`nm_peserta`,`jns_kel`,`tmpt_lahir`,`tgl_lahir`,`pekerjaan`,`alamat`,`no_telp`,`username`,`password`,`status`,`testimoni`) values (29,'Murid 1','Laki-Laki','Jogjakarta','1995-07-13','Mahasiswa','Jalan Kaliurang KM 5','089693943932','Murid1','ae601e56a98b104d8dc9b83ae76cb057','Selesai','Mantap Mas');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
