-- OrderCancellation (10 records)

CREATE TABLE `ordercancellation` (
	`orderCancellationID` INT NOT NULL AUTO_INCREMENT COLLATE 'utf8mb4_0900_ai_ci',
	`cancellationStatus` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`requestDate` DATE NOT NULL,
	`responseDate` DATE NOT NULL,
	`cancellationReason` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`custID` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`staffID` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`transID` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	PRIMARY KEY (`orderCancellationID`) USING BTREE,
	INDEX `FK_ordercancellation_customer` (`custID`) USING BTREE,
	INDEX `FK_ordercancellation_staff` (`staffID`) USING BTREE,
	INDEX `FK_ordercancellation_transactions` (`transID`) USING BTREE,
	CONSTRAINT `FK_ordercancellation_customer` FOREIGN KEY (`custID`) REFERENCES `wordpress`.`customer` (`custID`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `FK_ordercancellation_staff` FOREIGN KEY (`staffID`) REFERENCES `wordpress`.`staff` (`staffID`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `FK_ordercancellation_transactions` FOREIGN KEY (`transID`) REFERENCES `wordpress`.`transactions` (`transID`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

INSERT INTO OrderCancellation VALUES (10001, 'Rejected', '2021-07-10', '2021-07-14', 'Modify existing order', 10005, '20WMR08883', 10005);
INSERT INTO OrderCancellation VALUES (10002, 'Pending', '2021-07-16', NULL, 'Seller failed to ship on time', 10010, NULL, 10010);
INSERT INTO OrderCancellation VALUES (10003, 'Accepted', '2021-07-17', '2021-07-21', 'Change of mind', 10013, '20WMR08877', 10013);
INSERT INTO OrderCancellation VALUES (10004, 'Pending', '2021-07-18', NULL, 'Need to change delivery address', 10007, NULL, 10019);
INSERT INTO OrderCancellation VALUES (10005, 'Rejected', '2021-07-29', '2021-07-30', 'Others', 10020, '20WMR08876', 10028);
INSERT INTO OrderCancellation VALUES (10006, 'Pending', '2021-08-02', NULL, 'Change of mind', 10009, NULL, 10040);
INSERT INTO OrderCancellation VALUES (10007, 'Accepted', '2021-08-10', '2021-08-14', 'Seller failed to ship on time', 10008, '20WMR08879', 10044);
INSERT INTO OrderCancellation VALUES (10008, 'Rejected', '2021-08-10', '2021-08-15', 'Modify existing order', 10029, '20WMR08877', 10047);
INSERT INTO OrderCancellation VALUES (10009, 'Pending', '2021-08-18', NULL, 'Need to change delivery address', 10026, NULL, 10057);
INSERT INTO OrderCancellation VALUES (10010, 'Accepted', '2021-08-27', '2021-08-31', 'Others', 10022, '20WMR08883', 10058);
