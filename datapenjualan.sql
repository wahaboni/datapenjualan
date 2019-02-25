# Host: localhost  (Version 5.5.5-10.1.37-MariaDB)
# Date: 2019-02-21 21:02:15
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "data_akun"
#

DROP TABLE IF EXISTS `data_akun`;
CREATE TABLE `data_akun` (
  `id_akun` int(11) NOT NULL AUTO_INCREMENT,
  `nama_akun` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hak_akses` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "data_akun"
#


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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "data_barang"
#

INSERT INTO `data_barang` VALUES (1,'Acer Nitro 5','i5-8250U, RAM 8GB SSD 25GB Windows',21,'Acer',8200000,8700000,80000),(2,'Legion Y520 67ID','i7 ram 8GB gtx 1050 4GB',10,'Lenovo',13500000,13899000,100000),(3,'Flex 5','RAM 8GB MX130 2GB Windows',22,'Lenovo',12900000,13000000,100000),(4,'Miix 320','Intel Atom, 4GB, emmc 128GB',8,'Lenovo',3100000,3500000,50000),(5,'Lenovo IP 330 - i5 Win VGA','i5 8250U 530 2GB RAM 4GB HDD 1TB Windows 10 Resmi',6,'Lenovo',8500000,8900000,100000),(6,'Asus X4004AU','i3 RAM 4GB HDD 500GB Windows resmi',4,'Asus',5900000,6300000,50000);

#
# Structure for table "data_penjualan"
#

DROP TABLE IF EXISTS `data_penjualan`;
CREATE TABLE `data_penjualan` (
  `kode_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` int(11) NOT NULL DEFAULT '0',
  `harga_penjualan` int(11) DEFAULT NULL,
  `jenis_penjualan` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `waktu_penjualan` date DEFAULT NULL,
  `id_akun` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "data_penjualan"
#

