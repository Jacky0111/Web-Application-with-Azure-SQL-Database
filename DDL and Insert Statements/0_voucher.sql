-- Voucher (6 records)

CREATE TABLE `voucher` (
	`voucherID` INT NOT NULL AUTO_INCREMENT COLLATE 'utf8mb4_0900_ai_ci',
	`voucherDescription` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`voucherAmount` DOUBLE NOT NULL,
	PRIMARY KEY (`voucherID`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

-- Shipping Fee: RM 10.00
INSERT INTO VOUCHER VALUES (10001, 'RM 1 OFF with no minimum spend', 1);
INSERT INTO VOUCHER VALUES (10002, 'RM 2 OFF with RM 10 minimum spend', 2);
INSERT INTO VOUCHER VALUES (10003, 'RM 5 OFF with RM 60 minimum spend', 5);
INSERT INTO VOUCHER VALUES (10004, 'RM 10 OFF with RM 80 minimum spend', 10);
INSERT INTO VOUCHER VALUES (10005, 'RM 15 OFF with RM 90 minimum spend', 15);
INSERT INTO VOUCHER VALUES (10006, 'RM 20 OFF with RM 100 minimum spend', 20);
