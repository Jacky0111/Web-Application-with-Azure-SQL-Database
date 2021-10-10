-- Customer (30 records)

CREATE TABLE `customer` (
	`custID` INT NOT NULL AUTO_INCREMENT COLLATE 'utf8mb4_0900_ai_ci',
	`custName` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`phoneNo` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`email` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`address` VARCHAR(200) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`custPassword` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	PRIMARY KEY (`custID`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

INSERT INTO CUSTOMER VALUES (10001, 'Milly', '013-8780611', 'milly@gmail.com', 'G-3A RESIDENSI UNGGUL KEPONG, Jalan Vista Mutiara 1, Kepong Baru, Kuala Lumpur', 'ay105hv4ylb6');
INSERT INTO CUSTOMER VALUES (10002, 'Kalindi', '019-5450750', 'kalindi@gmail.com', 'Lot 1464, Jalan Delima 1/1, Subang Hi-tech Industrial Park, 40000, Subang Jaya, Selangor', 'M1Xm6DPB5mGm');
INSERT INTO CUSTOMER VALUES (10003, 'Judah', '016-3369481', 'judah@gmail.com', 'PT 120, Jalan Ampang Hilir, Taman U Thant, 55000, Ampang, Kuala Lumpur', 'eQYfXm3i2OIM');
INSERT INTO CUSTOMER VALUES (10004, 'Archy', '014-6902511', 'archy@gmail.com', 'A-2020, Jalan PJU 3/27, Sunway Damansara, 47810, Petaling Jaya, Selangor', 'f5tX9PQZyHk7');
INSERT INTO CUSTOMER VALUES (10005, 'Noby', '013-8312174', 'noby@gmail.com', 'A-21-4 P103 Condo, Jalan Danau Saujana 1, 53300, Setapak, Kuala Lumpur', '28Y5cvxDZBt1');
INSERT INTO CUSTOMER VALUES (10006, 'Byrle', '014-2941876', 'byrle@gmail.com', 'A-3A01, Jalan PJU 3/27, Sunway Damansara, 47810, Petaling Jaya, Selangor', '28Y5cvxDZBt1');
INSERT INTO CUSTOMER VALUES (10007, 'Tedra', '018-2430762', 'tedra@gmail.com', 'E-3A Wangsa 9 Residency, Jalan Wangsa Perdana 1, 53300, Wangsa Maju, Kuala Lumpur', 'RnJM6ozzB0IJ');
INSERT INTO CUSTOMER VALUES (10008, 'Rafaela', '012-9511081', 'rafaela@gmail.com', 'D-21/11 Epic Residence, Jln BP 7/12, Bandar Bukit Puchong 2, 47120, Puchong, Selangor', 'm90MHfqpxMoX');
INSERT INTO CUSTOMER VALUES (10009, 'Tansy', '017-4049014', 'tansy@gmail.com', 'B-31 Wangsa 9 Residency, Jalan Wangsa Perdana 1, 53300, Wangsa Maju, Kuala Lumpur', 'GOEreFI7YE1f');
INSERT INTO CUSTOMER VALUES (10010, 'Arman', '018-9126750', 'arman@gmail.com', 'BlockA-033 Putra One Residence, Persiaran Bukit Rahman Putra 1, 47000, Sungai Buloh, Selangor', 'cOHGuNRXS8rR');
INSERT INTO CUSTOMER VALUES (10011, 'Heywood', '011-2714249', 'heywood@gmail.com', 'D-33-01 One Jelatek Condo, Jalan Jelatek, 54200, Jelatek, Kuala Lumpur', 'q33GUkluiZtl');
INSERT INTO CUSTOMER VALUES (10012, 'Jerrold', '015-6794318', 'jerrold@gmail.com', 'E-3A, Green Residence, Jalan Sayang 1, 43200, Cheras, Selangor', 'hrrUHOJiG93t');
INSERT INTO CUSTOMER VALUES (10013, 'Theodore', '018-6878938', 'theodore@gmail.com', 'Lot 1469 Menara Sri Jati, Jalan 30/56, Taman Setiawangsa, 54200, Setiawangsa, Kuala Lumpur', 'jUXUcInZG75X');
INSERT INTO CUSTOMER VALUES (10014, 'Thorpe', '011-9844343', 'thorpe@gmail.com', '18A-05 Ampang Damai Condominium, Jalan Wawasan 3, 68000, Ampang Jaya, Selangor', 'mY9jPmqhEZzh');
INSERT INTO CUSTOMER VALUES (10015, 'Ivette', '016-3947772', 'ivette@gmail.com', 'PT 3434, Seri Titiwangsa, Lorong Titiwangsa 1, 53200, Titiwangsa, Kuala Lumpur', 'FVhKdQA2uk2Q');
INSERT INTO CUSTOMER VALUES (10016, 'Casar', '019-2588895', 'casar@gmail.com', 'A-33-14 MH Platinum Residence, Jalan Gombak, 53100, Gombak, Selangor', 'sGbyBKd4Eu6Q');
INSERT INTO CUSTOMER VALUES (10017, 'Sigismundo', '018-8424071', 'sigismundo@gmail.com', 'Lot 235, Jalan Nora 2, 53100, Taman Melawati, Selangor', 'iTvzC7UAJ325');
INSERT INTO CUSTOMER VALUES (10018, 'Kat', '015-6866156', 'kat@gmail.com', 'Lot 111, Jalan Nora 2, 53100, Taman Melawati, Selangor', 'GhVc4aoKvRG1');
INSERT INTO CUSTOMER VALUES (10019, 'Tersina', '016-4465107', 'tersina@gmail.com', 'A-20/11 Amara Residensi, Jalan Raintree Utama, 68100, Batu Caves, Selangor', 'hbRadA6Plxfi');
INSERT INTO CUSTOMER VALUES (10020, 'Brunhilda', '019-3485500', 'brunhilda@gmail.com', 'A-03/13A Amara Residensi, Jalan Raintree Utama, 68100, Batu Caves, Selangor', 'RvULPNEoPv3E');
INSERT INTO CUSTOMER VALUES (10021, 'Patrica', '013-3237059', 'patrica@gmail.com', 'G-21 RESIDENSI UNGGUL KEPONG, Jalan Vista Mutiara 1, 52000, Kepong Baru, Kuala Lumpur', 'B2LCOi4jhg8B');
INSERT INTO CUSTOMER VALUES (10022, 'Blythe', '015-6497485', 'blythe@gmail.com', 'Block E, No.482, Jalan SS 15/6, Ss 15, 47500, Subang Jaya, Selangor', 'AW2qlN6eSL1c');
INSERT INTO CUSTOMER VALUES (10023, 'Matt', '019-7515960', 'matt@gmail.com', 'PT 440, Jalan Ampang Hilir, Taman U Thant, 55000, Ampang, Kuala Lumpur', 'CQBUAzN9cqPH');
INSERT INTO CUSTOMER VALUES (10024, 'Selig', '012-8954544', 'selig@gmail.com', 'A-1801, Jalan PJU 3/27, Sunway Damansara, 47810, Petaling Jaya, Selangor', 'B6tQCS2VDT6h');
INSERT INTO CUSTOMER VALUES (10025, 'Annora', '012-9038830', 'annora@gmail.com', 'A-18-4 P103 Condo, Jalan Danau Saujana 1, 53300, Setapak, Kuala Lumpur', 'VQgsE95y8k7W');
INSERT INTO CUSTOMER VALUES (10026, 'Kirstin', '012-7016166', 'kirstin@gmail.com', 'B-13/02 Jalan PJU 1a/3, Ara Damansara, 47301, Petaling Jaya, Selangor', 'WvHCBiT02G8T');
INSERT INTO CUSTOMER VALUES (10027, 'Lanie', '011-2765349', 'lanie@gmail.com', 'G-18 Wangsa 9 Residency, Jalan Wangsa Perdana 1, 53300, Wangsa Maju, Kuala Lumpur', 'Z1xHgUVWlA1Y');
INSERT INTO CUSTOMER VALUES (10028, 'Elladine', '015-1933831', 'elladine@gmail.com', 'B-11/11 Epic Residence, Jln BP 7/12, Bandar Bukit Puchong 2, 47120, Puchong, Selangor', 'CSowt7wYrIPL');
INSERT INTO CUSTOMER VALUES (10029, 'Dore', '011-2295793', 'dore@gmail.com', 'A-13A Wangsa 9 Residency, Jalan Wangsa Perdana 1, 53300, Wangsa Maju, Kuala Lumpur', 'pMxh0aKamiPc');
INSERT INTO CUSTOMER VALUES (10030, 'Konrad', '014-6707411', 'konrad@gmail.com', 'BlockA-122 Putra One Residence, Persiaran Bukit Rahman Putra 1, 47000, Sungai Buloh, Selangor', 'Ih5A6MshATfn') 
