# Host: localhost  (Version 5.5.5-10.1.37-MariaDB)
# Date: 2019-03-25 03:23:46
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "data_akun"
#

DROP TABLE IF EXISTS `data_akun`;
CREATE TABLE `data_akun` (
  `id_akun` int(11) NOT NULL AUTO_INCREMENT,
  `nama_akun` varchar(255) NOT NULL DEFAULT '',
  `ket_akun` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hak_akses` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_akun`),
  UNIQUE KEY `nama_akun` (`nama_akun`)
) ENGINE=InnoDB AUTO_INCREMENT=1004 DEFAULT CHARSET=latin1;

#
# Data for table "data_akun"
#

INSERT INTO `data_akun` VALUES (1001,'administrasi','Administrasi','admin789','1'),(1002,'gudang','Gudang','12345','2'),(1003,'itstore','IT Store - Karawaci','112233','3');

#
# Structure for table "data_barang"
#

DROP TABLE IF EXISTS `data_barang`;
CREATE TABLE `data_barang` (
  `kode_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `harga_modal` int(11) DEFAULT NULL,
  `harga_m2` int(11) DEFAULT NULL,
  `komisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Data for table "data_barang"
#

INSERT INTO `data_barang` VALUES (1,'Acer Nitro 5','i5-8250U, RAM 8GB SSD 25GB Windows',6,'Acer',8200000,8700000,80000),(2,'Legion Y520 67ID','i7 ram 8GB gtx 1050 4GB',5,'Lenovo',13500000,13899000,100000),(3,'Flex 5','RAM 8GB MX130 2GB Windows',14,'Lenovo',12900000,13000000,100000),(4,'Miix 320','Intel Atom, 4GB, emmc 128GB',3,'Lenovo',3100000,3500000,50000),(6,'Asus X4004AU','i3 RAM 4GB HDD 500GB Windows resmi',1,'Asus',5900000,6300000,50000),(8,'Acer Aspire 3','Celeron RAM 4GB HDD 500GB',15,'Acer',3000000,3300000,0),(9,'Asus ROG GL552JX','GL552JX-XO139D',6,'Asus',8300000,8500000,100000),(12,'ThinkPad X1 Carbon','i7 RAM 8GB HDD 1TB SSD 256GB Windows',6,'Lenovo',1700000,17600000,100000),(13,'laptop hp 14s-cf0044tx','core i5-8250u - ram 4gb - hdd 1tb - vga r520',5,'HP',7700000,7900000,50000);

#
# Structure for table "status_penjualan"
#

DROP TABLE IF EXISTS `status_penjualan`;
CREATE TABLE `status_penjualan` (
  `kode_status` int(11) NOT NULL,
  `status_penjualan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kode_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "status_penjualan"
#

INSERT INTO `status_penjualan` VALUES (1,'Booking'),(2,'Terjual'),(3,'Sudah Terjual'),(4,'Di Return');

#
# Structure for table "data_penjualan"
#

DROP TABLE IF EXISTS `data_penjualan`;
CREATE TABLE `data_penjualan` (
  `kode_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` int(11) DEFAULT '0',
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga_penjualan` int(11) DEFAULT NULL,
  `harga_modal` int(11) DEFAULT NULL,
  `komisi` int(11) DEFAULT NULL,
  `jenis_penjualan` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `kode_status` int(11) DEFAULT NULL,
  `tgl_penjualan` date DEFAULT NULL,
  `nama_akun` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`kode_penjualan`),
  KEY `data_penjualan_ibfk_2` (`nama_akun`),
  KEY `data_penjualan_ibfk_3` (`kode_status`),
  CONSTRAINT `data_penjualan_ibfk_2` FOREIGN KEY (`nama_akun`) REFERENCES `data_akun` (`nama_akun`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `data_penjualan_ibfk_3` FOREIGN KEY (`kode_status`) REFERENCES `status_penjualan` (`kode_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "data_penjualan"
#

INSERT INTO `data_penjualan` VALUES (1,3,'Flex 5',13500000,12900000,100000,'Offline',2,2,'2019-03-24','itstore'),(2,13,'laptop hp 14s-cf0044tx',8000000,7700000,50000,'Offline',3,2,'2019-03-24','itstore'),(3,8,'Acer Aspire 3',3450000,3000000,0,'Offline',2,2,'2019-03-24','itstore'),(4,4,'Miix 320',3500000,3100000,50000,'Offline',2,2,'2019-03-24','itstore'),(5,1,'Acer Nitro 5',8300000,8200000,80000,'Offline',2,2,'2019-03-24','itstore'),(6,6,'Asus X4004AU',6000000,5900000,150000,'Offline',3,2,'2019-03-24','itstore');
