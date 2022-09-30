/*
SQLyog Community
MySQL - 10.1.37-MariaDB : Database - servicequantrac
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`servicequantrac` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `servicequantrac`;

/*Table structure for table `areadata` */

DROP TABLE IF EXISTS `areadata`;

CREATE TABLE `areadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `areadata` */

insert  into `areadata`(`id`,`area_name`,`area_status`) values 
(1,'Trên sông Mỹ Thanh',1);

/*Table structure for table `dataquantrac` */

DROP TABLE IF EXISTS `dataquantrac`;

CREATE TABLE `dataquantrac` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDTRAM` int(11) NOT NULL,
  `FKEY` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FNAME` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FINDEX` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FRESULT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FUNIT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FDATETIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CREATED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`IDTRAM`,`FKEY`,`ID`),
  KEY `ID` (`ID`),
  CONSTRAINT `dataquantrac_ibfk_1` FOREIGN KEY (`IDTRAM`) REFERENCES `tramquantrac` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1313 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dataquantrac` */

/*Table structure for table `datathuyloi` */

DROP TABLE IF EXISTS `datathuyloi`;

CREATE TABLE `datathuyloi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDTRAM` int(11) DEFAULT NULL,
  `FKEY` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FDATETIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FUNIT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Salinity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Temperature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pH` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `IDTRAM` (`IDTRAM`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `datathuyloi` */

/*Table structure for table `logdata` */

DROP TABLE IF EXISTS `logdata`;

CREATE TABLE `logdata` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FKEY` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FACTION` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FTYPE` int(11) DEFAULT NULL COMMENT '1: TNMT, 2: Thủy lợi',
  `FCREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1314 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `logdata` */

insert  into `logdata`(`ID`,`FKEY`,`FACTION`,`FTYPE`,`FCREATED`) values 
(1312,'654616468','nhập',1,'2022-09-30 15:16:51'),
(1313,'984165646','nhập',1,'2022-09-30 15:23:53');

/*Table structure for table `tramquantrac` */

DROP TABLE IF EXISTS `tramquantrac`;

CREATE TABLE `tramquantrac` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FCODE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TENTRAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FADDRESS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DIRECTORY` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FLOCATION_LAT` double DEFAULT NULL,
  `FLOCATION_LNG` double DEFAULT NULL,
  `FDESCRIPTION` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FAREA_ID` int(11) DEFAULT NULL,
  `FTYPE` int(11) DEFAULT NULL COMMENT '1: TNMT, 2: Thủy Lợi',
  `FIDANOTHER` int(11) DEFAULT NULL,
  `FSTATUS` int(11) DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `FAREA_ID` (`FAREA_ID`),
  CONSTRAINT `tramquangtrac_ibfk_1` FOREIGN KEY (`FAREA_ID`) REFERENCES `areadata` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tramquantrac` */

insert  into `tramquantrac`(`ID`,`FCODE`,`TENTRAM`,`FADDRESS`,`DIRECTORY`,`FLOCATION_LAT`,`FLOCATION_LNG`,`FDESCRIPTION`,`FAREA_ID`,`FTYPE`,`FIDANOTHER`,`FSTATUS`) values 
(1,'COC','Cổ Cò','Cổ Cò','D:/FTP/CoCo/backup/*.txt',9.5996249,105.9728063,NULL,1,1,NULL,1),
(2,'LOP','Long Phú','Long Phú','D:/FTP/LongPhu/backup/*.txt',NULL,NULL,NULL,1,1,NULL,1),
(3,'MYT','Mỹ Thanh','Mỹ Thanh','D:/FTP/MyThanh/backup/*.txt',NULL,NULL,NULL,1,1,NULL,1),
(4,'SOD','Sông Đinh','Sông Đinh','D:/FTP/SongDinh/backup/*.txt',NULL,NULL,NULL,1,1,NULL,1),
(5,'KHITNMT','Trạm Khí Sở Tài Nguyên Môi Trường','Sở TNMT','D:/FTP/TramKhiSTNMT/backup/*.txt',NULL,NULL,NULL,1,1,NULL,1),
(6,NULL,'Sóc Trang',NULL,NULL,NULL,NULL,NULL,1,2,1,1),
(7,NULL,'Long Phú',NULL,NULL,NULL,NULL,NULL,1,2,2,1),
(8,NULL,'Châu Thành',NULL,NULL,NULL,NULL,NULL,1,2,3,1),
(9,NULL,'Vinh Châu',NULL,NULL,NULL,NULL,NULL,1,2,4,1),
(10,NULL,'Cù Lao Dung',NULL,NULL,NULL,NULL,NULL,1,2,5,1),
(11,NULL,'Trần Đề',NULL,NULL,NULL,NULL,NULL,1,2,6,1);

/*Table structure for table `unitsymbol` */

DROP TABLE IF EXISTS `unitsymbol`;

CREATE TABLE `unitsymbol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_index` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'tên chỉ số',
  `unit_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'tên tiếng Việt',
  `unit_symbol` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'đơn vị tính',
  `unit_upper` float DEFAULT NULL COMMENT 'cận trên',
  `unit_lower` float DEFAULT NULL COMMENT 'cận dưới',
  `unit_comment` int(11) DEFAULT '0' COMMENT '0: bình thường, 1: khí',
  `unit_status` int(11) DEFAULT '1' COMMENT 'trạng thái',
  PRIMARY KEY (`id`),
  KEY `idtram` (`unit_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `unitsymbol` */

insert  into `unitsymbol`(`id`,`unit_index`,`unit_name`,`unit_symbol`,`unit_upper`,`unit_lower`,`unit_comment`,`unit_status`) values 
(1,'AirPress','','Pa',NULL,NULL,0,1),
(2,'AirTemp','','oC',NULL,NULL,0,1),
(3,'CO','','ppm',NULL,NULL,0,1),
(4,'COD','','mg/l',NULL,NULL,0,1),
(5,'Compass','','',NULL,NULL,0,1),
(6,'DO','','mg/l',NULL,NULL,0,1),
(7,'G-Radian','','W/m2',NULL,NULL,0,1),
(8,'Humidity','','%',NULL,NULL,0,1),
(9,'NH4','','mg/l',NULL,NULL,0,1),
(10,'NO','','ppb',NULL,NULL,0,1),
(11,'NO2','','ppb',NULL,NULL,1,1),
(12,'NO2','','mg/l',NULL,NULL,0,1),
(13,'NO3','','mg/l',NULL,NULL,0,1),
(14,'NOx','','ppb',NULL,NULL,0,1),
(15,'O3','','ppb',NULL,NULL,0,1),
(16,'pH','','',NULL,NULL,0,1),
(17,'PM1','','ug/m3',NULL,NULL,0,1),
(18,'PM10','','ug/m3',NULL,NULL,0,1),
(19,'PM2.5','','ug/m3',NULL,NULL,0,1),
(20,'PO4','','mg/l',NULL,NULL,0,1),
(21,'Rain','','mm',NULL,NULL,0,1),
(22,'SAL','','‰',NULL,NULL,0,1),
(23,'SO2','','ppb',NULL,NULL,0,1),
(24,'Temp','','oC',NULL,NULL,0,1),
(25,'TotalAlkalinity','','mg/l',NULL,NULL,0,1),
(26,'TSP','','ug/m3',NULL,NULL,0,1),
(27,'TSS','','mg/l',NULL,NULL,0,1),
(28,'Turb','','NTU',NULL,NULL,0,1),
(29,'WaterLevel','','m',NULL,NULL,0,1),
(30,'WDirect','','o',NULL,NULL,0,1),
(31,'WSpeed','','m/s',NULL,NULL,0,1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fbirthday` date DEFAULT NULL,
  `fGender` int(11) DEFAULT NULL COMMENT '1: Nam, 2: Nữ',
  `faddress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `femail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fmenu` longtext COLLATE utf8mb4_unicode_ci,
  `fadmin` int(11) DEFAULT '1',
  `fstatus` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`fname`,`fbirthday`,`fGender`,`faddress`,`femail`,`fmenu`,`fadmin`,`fstatus`) values 
(1,'admin','783d3aebfb3acb32064b8811e7ac7f72','Admin','2022-09-28',1,'Sóc Trăng','admin@gmail.com',NULL,0,1),
(2,'soctrang','0b7e367fb674d93b0681eeb663987782','Sóc Trăng','2022-09-28',1,'Sóc Trăng','soctrang@gmail.com',NULL,1,1);

/* Function  structure for function  `f_lichsuchuongtrinh` */

/*!50003 DROP FUNCTION IF EXISTS `f_lichsuchuongtrinh` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `f_lichsuchuongtrinh`(fkey VARCHAR(50),
	faction VARCHAR(255),
	ftype VARCHAR(10)
) RETURNS varchar(100) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci
BEGIN
	DECLARE v_ketqua INT(11) DEFAULT 0;
	
	INSERT INTO logdata(FKEY,FACTION,FTYPE,FCREATED)
	VALUES(fkey,faction,ftype,DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i:%s'));
	
	SELECT ROW_COUNT() INTO v_ketqua;
	
	IF v_ketqua > 0 THEN
		RETURN 'SUCCESS';
	ELSE
		RETURN 'FAIL';
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_all_datatype` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_all_datatype` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_get_all_datatype`()
BEGIN
	select id as d_key, case when unit_name = '' then unit_index else unit_name end as d_name, unit_symbol as d_symbol
	from unitsymbol
	order by id;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_tram_tnmt` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_tram_tnmt` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_get_tram_tnmt`(
	p_type varchar(10)
)
BEGIN
	SELECT  a.ID,
			a.FCODE,
			a.TENTRAM,
			a.FADDRESS,
			a.DIRECTORY,
			a.FLOCATION_LAT,
			a.FLOCATION_LNG,
			a.FDESCRIPTION,
			a.FAREA_ID,
			a.FTYPE,
			a.FIDANOTHER,
			b.area_name
		FROM tramquantrac a LEFT JOIN areadata b ON a.FAREA_ID = b.id
		WHERE a.Fstatus = 1 and a.FTYPE = p_type;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_insert_result_data` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_insert_result_data` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insert_result_data`(
	p_id varchar(20),
	p_fkey varchar(50),
	p_name varchar(250),
	p_index varchar(250),
	p_result varchar(250),
	p_unit varchar(250),
	p_datetime varchar(250)
)
BEGIN
	DECLARE v_kq INT(100);
	
	insert into dataquantrac(IDTRAM,FKEY,FNAME,FINDEX,FRESULT,FUNIT,FDATETIME,CREATED)
	values(p_id, p_fkey, p_name, p_index, p_result, p_unit, p_datetime, DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i:%s'));
	
	SELECT ROW_COUNT() INTO v_kq;
	SELECT CASE WHEN v_kq > 0 THEN 'SUCCESS' ELSE 'FAIL' END AS STATUS, f_lichsuchuongtrinh(p_fkey,CONCAT('Insert Data: ',p_index,', result: ',p_result,' ',p_unit,', time: ',p_datetime),1) AS LOGINSERT;
	COMMIT;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_load_loginsert` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_load_loginsert` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_load_loginsert`()
BEGIN
	select ID,FKEY,FACTION,case when FTYPE = 1 then 'Tài nguyên môi trường' else 'Thủy lợi' end as FTYPE,FCREATED
	from logdata;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_load_user` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_load_user` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_load_user`()
BEGIN
	select 	id,
		username,
		fname,
		date_format(fbirthday,'%d-%m-%Y') as fbirthday,
		case when fGender = 1 then 'Nam' else 'Nữ' end as fGender,
		faddress,
		femail,
		fmenu,
		fadmin,
		CASE WHEN fstatus = 1 then 'Hoạt động' else 'Đã khóa' end as fstatus
	from user;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_all_data` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_all_data` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_get_all_data`()
BEGIN
	select data_quantrac.idtram, data_quantrac.tentram, 
		sum(pH) as pH,
		SUM(TSS) AS TSS,
		SUM(SAL) AS SAL,
		SUM(Turb) AS Turb,
		SUM(DO) AS DO,
		SUM(COD) AS COD,
		SUM(Temp) AS Temp,
		SUM(NH4) AS NH4,
		SUM(NO3) AS NO3,
		SUM(NO2) AS NO2,
		SUM(PO4) AS PO4,
		SUM(TotalAlkalinity) AS TotalAlkalinity,
		SUM(CO) AS CO,
		SUM(NOx) AS NOx,
		SUM(NO) AS NO,
		SUM(O3) AS O3,
		SUM(SO2) AS SO2,
		SUM(PM1) AS PM1,
		SUM(PM2_5) AS PM2_5,
		SUM(PM10) AS PM10,
		SUM(TSP) AS TSP,
		SUM(AirTemp)AS AirTemp,
		SUM(Humidity) AS Humidity,
		SUM(AirPress) AS AirPress,
		SUM(WSpeed) AS WSpeed,
		SUM(WDirect) AS WDirect,
		SUM(Compass) AS Compass,
		SUM(G_Radian)AS G_Radian,
		SUM(Rain) AS Rain
	from (
		select idtram, fname as tentram,
			CASE WHEN findex = 'pH' THEN ifnull(fresult,0) ELSE 0 END AS pH,
			CASE WHEN findex = 'TSS' THEN ifnull(fresult,0) ELSE 0 END AS TSS,
			CASE WHEN findex = 'SAL' THEN ifnull(fresult,0) ELSE 0 END AS SAL,
			CASE WHEN findex = 'Turb' THEN ifnull(fresult,0) ELSE 0 END AS Turb,
			CASE WHEN findex = 'DO' THEN ifnull(fresult,0) ELSE 0 END AS DO,
			CASE WHEN findex = 'COD' THEN ifnull(fresult,0) ELSE 0 END AS COD,
			CASE WHEN findex = 'Temp' THEN ifnull(fresult,0) ELSE 0 END AS Temp,
			CASE WHEN findex = 'NH4' THEN ifnull(fresult,0) ELSE 0 END AS NH4,
			CASE WHEN findex = 'NO3' THEN ifnull(fresult,0) ELSE 0 END AS NO3,
			CASE WHEN findex = 'NO2' THEN ifnull(fresult,0) ELSE 0 END AS NO2,
			CASE WHEN findex = 'PO4' THEN ifnull(fresult,0) ELSE 0 END AS PO4,
			CASE WHEN findex = 'TotalAlkalinity' THEN ifnull(fresult,0) ELSE 0 END AS TotalAlkalinity,
			CASE WHEN findex = 'CO' THEN ifnull(fresult,0) ELSE 0 END AS CO,
			CASE WHEN findex = 'NOx' THEN ifnull(fresult,0) ELSE 0 END AS NOx,
			CASE WHEN findex = 'NO' THEN ifnull(fresult,0) ELSE 0 END AS NO,
			CASE WHEN findex = 'O3' THEN ifnull(fresult,0) ELSE 0 END AS O3,
			CASE WHEN findex = 'SO2' THEN ifnull(fresult,0) ELSE 0 END AS SO2,
			CASE WHEN findex = 'PM1' THEN ifnull(fresult,0) ELSE 0 END AS PM1,
			CASE WHEN findex = 'PM2.5' THEN ifnull(fresult,0) ELSE 0 END AS PM2_5,
			CASE WHEN findex = 'PM10' THEN ifnull(fresult,0) ELSE 0 END AS PM10,
			CASE WHEN findex = 'TSP' THEN ifnull(fresult,0) ELSE 0 END AS TSP,
			CASE WHEN findex = 'AirTemp' THEN ifnull(fresult,0) ELSE 0 END AS AirTemp,
			CASE WHEN findex = 'Humidity' THEN ifnull(fresult,0) ELSE 0 END AS Humidity,
			CASE WHEN findex = 'AirPress' THEN ifnull(fresult,0) ELSE 0 END AS AirPress,
			CASE WHEN findex = 'WSpeed' THEN ifnull(fresult,0) ELSE 0 END AS WSpeed,
			CASE WHEN findex = 'WDirect' THEN ifnull(fresult,0) ELSE 0 END AS WDirect,
			CASE WHEN findex = 'Compass' THEN ifnull(fresult,0) ELSE 0 END AS Compass,
			CASE WHEN findex = 'G-Radian' THEN ifnull(fresult,0) ELSE 0 END AS G_Radian,
			CASE WHEN findex = 'Rain' THEN ifnull(fresult,0) ELSE 0 END AS Rain
		from dataquantrac
		where FDATETIME IN (SELECT MAX(FDATETIME) FROM dataquangtrac GROUP BY idtram)
		group by idtram, fname, findex
	) data_quantrac
	group by data_quantrac.idtram, data_quantrac.tentram;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_detail_id` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_detail_id` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_get_detail_id`(
	p_id varchar(50)
)
BEGIN
	SELECT datalog.*
	FROM (
		SELECT  a.idtram AS su_id, 
			a.fresult AS data_val,
			a.fdatetime AS data_time,
			b.id AS data_type,
			CASE WHEN b.unit_name = '' THEN b.unit_index ELSE b.unit_name END AS datatype_name,
			b.unit_symbol AS datatype_symbol,
			DATE_FORMAT(a.fdatetime,'%d/%m/%Y %H:%i:%s') AS data_time_display
		FROM dataquantrac a LEFT JOIN unitsymbol b ON a.findex = b.unit_index
		WHERE a.idtram = p_id AND a.FDATETIME IN (SELECT MAX(FDATETIME) FROM dataquantrac WHERE idtram = p_id GROUP BY idtram)
		
		UNION ALL
		
		SELECT 
			datathuyloi.idtram AS su_id, 
			datathuyloi.val AS data_val,
			datathuyloi.fdatetime AS data_time,
			b.id AS data_type,
			CASE WHEN b.unit_name = '' THEN b.unit_index ELSE b.unit_name END AS datatype_name,
			b.unit_symbol AS datatype_symbol,
			DATE_FORMAT(datathuyloi.fdatetime,'%d/%m/%Y %H:%i:%s') AS data_time_display
		FROM (
			SELECT b.id AS IDTRAM, a.Salinity AS val, a.fdatetime, 'Salinity' AS datavalue, a.funit FROM datathuyloi a, tramquantrac b WHERE a.idtram = b.fidanother AND b.id = p_id
			UNION ALL
			SELECT b.id AS IDTRAM, a.Temperature AS val, a.fdatetime, 'Temperature' AS datavalue, a.funit FROM datathuyloi a, tramquantrac b WHERE a.idtram = b.fidanother AND b.id = p_id
			UNION ALL
			SELECT b.id AS IDTRAM, a.Level AS val, a.fdatetime, 'Level' AS datavalue, a.funit FROM datathuyloi a, tramquantrac b WHERE a.idtram = b.fidanother AND b.id = p_id
			UNION ALL
			SELECT b.id AS IDTRAM, a.pH AS val, a.fdatetime, 'pH' AS datavalue, a.funit FROM datathuyloi a, tramquantrac b WHERE a.idtram = b.fidanother AND b.id = p_id
		) datathuyloi LEFT JOIN unitsymbol b ON datathuyloi.datavalue = b.unit_index AND IFNULL(datathuyloi.funit,'') = b.unit_symbol
		WHERE datathuyloi.IDTRAM = p_id AND datathuyloi.FDATETIME IN (SELECT MAX(a.FDATETIME) FROM datathuyloi a, tramquantrac b WHERE a.idtram = b.fidanother AND b.id = p_id GROUP BY a.IDTRAM)
	) datalog
	ORDER BY datalog.su_id,datalog.data_type;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_tramquantrac` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_tramquantrac` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_get_tramquantrac`(
	p_idtram varchar(50)
)
BEGIN
	if p_idtram = '-1' then
		select  a.ID,
			a.FCODE,
			a.TENTRAM,
			a.FADDRESS,
			a.DIRECTORY,
			a.FLOCATION_LAT,
			a.FLOCATION_LNG,
			a.FDESCRIPTION,
			a.FAREA_ID,
			a.FTYPE,
			a.FIDANOTHER,
			b.area_name
		from tramquantrac a LEFT JOIN areadata b ON a.FAREA_ID = b.id
		where a.Fstatus = 1;
	else
		SELECT  a.ID,
			a.FCODE,
			a.TENTRAM,
			a.FADDRESS,
			a.DIRECTORY,
			a.FLOCATION_LAT,
			a.FLOCATION_LNG,
			a.FDESCRIPTION,
			a.FAREA_ID,
			a.FTYPE,
			a.FIDANOTHER,
			b.area_name
		FROM tramquantrac a left join areadata b on a.FAREA_ID = b.id
		WHERE a.ID = p_idtram and a.Fstatus = 1;
	end if;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_insert_data_thuyloi` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_insert_data_thuyloi` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insert_data_thuyloi`(
	p_idtram VARCHAR(20),
	p_fkey VARCHAR(50),
	p_name VARCHAR(250),
	p_datetime VARCHAR(250),
	p_Salinity VARCHAR(250),
	p_Temperature VARCHAR(250),
	p_level VARCHAR(250),
	p_ph VARCHAR(250)
)
BEGIN
	DECLARE v_check_tramthuyloi INT(100);
	DECLARE v_id_tramthuyloi INT(100);
	DECLARE v_kq1 INT(100);
	DECLARE v_kq2 INT(100);
	
	SELECT COUNT(*) INTO v_check_tramthuyloi
	FROM tramquantrac
	WHERE FIDANOTHER = p_idtram AND ftype = 2;
	
	IF v_check_tramthuyloi = 0 THEN
		INSERT INTO tramquantrac(FCODE,TENTRAM,FADDRESS,DIRECTORY,FLOCATION_LAT,FLOCATION_LNG,FDESCRIPTION,FAREA_ID,FTYPE,FIDANOTHER,FSTATUS)
		VALUES(NULL,p_name,NULL,NULL,NULL,NULL,NULL,1,2,p_idtram,1);
		
		SELECT ROW_COUNT() INTO v_kq1;
		IF v_kq1 >= 1 THEN
			INSERT INTO datathuyloi(IDTRAM,FKEY,FDATETIME,FUNIT,Salinity,Temperature,LEVEL,pH,CREATED)
			VALUES(p_idtram,p_fkey,p_datetime,NULL,p_Salinity,p_Temperature,p_level,p_ph,DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i:%s'));
			
			SELECT ROW_COUNT() INTO v_kq2;
		END IF;
	ELSE
		INSERT INTO datathuyloi(IDTRAM,FKEY,FDATETIME,FUNIT,Salinity,Temperature,LEVEL,pH,CREATED)
		VALUES(p_idtram,p_fkey,p_datetime,NULL,p_Salinity,p_Temperature,p_level,p_ph,DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i:%s'));
		
		SELECT ROW_COUNT() INTO v_kq2;
	END IF;
	
	SELECT CASE WHEN v_kq2 > 0 THEN 'SUCCESS' ELSE 'FAIL' END AS STATUS, f_lichsuchuongtrinh(p_fkey,CONCAT('Insert Data: ',p_name,', Salinity: ',p_Salinity,', Temperature: ',p_Temperature,', LEVEL: ',p_level,', pH: ',p_ph,', time: ',p_datetime),2) AS LOGINSERT;
	
	COMMIT;
	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_login` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_login`(
	p_username VARCHAR(250),
	p_password VARCHAR(250)
)
BEGIN
	DECLARE v_checkusername VARCHAR(250);
	DECLARE v_checkuserpass VARCHAR(250);
	
	SELECT COUNT(*) INTO v_checkusername
	FROM user WHERE username = p_username; -- AND PASSWORD = p_password;
	
	if v_checkusername > 0 then
		SELECT COUNT(*) INTO v_checkuserpass
		FROM USER WHERE username = p_username AND PASSWORD = p_password;
		
		if v_checkuserpass > 0 then
			SELECT u.id, u.username, u.fname, DATE_FORMAT(u.fbirthday,'%d/%m/%Y') AS fbirthday, u.fGender, u.faddress, u.femail, u.fadmin, u.fstatus AS STATUS
			FROM USER u
			WHERE u.username = p_username AND u.password = p_password AND u.fstatus = 1
			LIMIT 1;
		else
			SELECT '-1' AS id, ' ' AS username, ' ' AS fname, ' ' AS fbirthday, ' ' AS fGender, ' ' AS faddress, ' ' AS femail, ' ' AS fadmin, '-2' AS STATUS
			FROM DUAL;
		end if;
	else
		SELECT '-1' AS id, ' ' AS username, ' ' AS fname, ' ' AS fbirthday, ' ' AS fGender, ' ' AS faddress, ' ' AS femail, ' ' AS fadmin, '-1' AS STATUS
		FROM DUAL;
	end if;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
