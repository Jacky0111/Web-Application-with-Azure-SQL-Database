-- Staff (6 records)

CREATE TABLE `staff` (
	`staffID` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`staffName` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`staffPhoneNo` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`staffPassword` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	PRIMARY KEY (`staffID`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

INSERT INTO STAFF VALUES ('20WMR08883', 'Ong Tnsam', '017-9190716', 'CC2assignment');
INSERT INTO STAFF VALUES ('20WMR08868', 'Kow Yee Hui', '011-53389981', 'CC2assignment');
INSERT INTO STAFF VALUES ('20WMR08877', 'Lim Chia Chung', '012-9499233', 'CC2assignment');
INSERT INTO STAFF VALUES ('20WMR08869', 'Lai Pei Xuan', '016-8043923', 'CC2assignment');
INSERT INTO STAFF VALUES ('20WMR08876', 'Leong Yit Wee', '011-56509133', 'CC2assignment');
INSERT INTO STAFF VALUES ('20WMR08879', 'Lim Ming Jun', '012-3232410', 'CC2assignment');
