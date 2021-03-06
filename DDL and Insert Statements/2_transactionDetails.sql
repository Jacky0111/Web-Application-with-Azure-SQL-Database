-- TranstionDetails (100 records)

CREATE TABLE `transactiondetails` (
	`transID` INT NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`productID` INT NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`productQty` INT(10) NOT NULL,
	`transactionSubtotalAmount` DOUBLE NOT NULL,
	PRIMARY KEY (`transID`, `productID`) USING BTREE,
	INDEX `FK_transactiondetails_product` (`productID`) USING BTREE,
	CONSTRAINT `FK_transactiondetails_transactions` FOREIGN KEY (`transID`) REFERENCES `wordpress`.`transactions` (`transID`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `FK_transactiondetails_product` FOREIGN KEY (`productID`) REFERENCES `wordpress`.`product` (`productID`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

INSERT INTO TransactionDetails VALUES (10001, 10013, 1, 129.90);
INSERT INTO TransactionDetails VALUES (10001, 10007, 2, 79.80);
INSERT INTO TransactionDetails VALUES (10002, 10024, 3, 389.70);
INSERT INTO TransactionDetails VALUES (10002, 10021, 4, 319.60);
INSERT INTO TransactionDetails VALUES (10003, 10007, 5, 199.50);
INSERT INTO TransactionDetails VALUES (10004, 10010, 1, 149.90);
INSERT INTO TransactionDetails VALUES (10004, 10021, 3, 239.70);
INSERT INTO TransactionDetails VALUES (10005, 10006, 2, 119.80);
INSERT INTO TransactionDetails VALUES (10005, 10014, 3, 299.70);
INSERT INTO TransactionDetails VALUES (10005, 10012, 1, 129.90);
INSERT INTO TransactionDetails VALUES (10006, 10007, 1, 39.90);
INSERT INTO TransactionDetails VALUES (10007, 10002, 2, 79.80);
INSERT INTO TransactionDetails VALUES (10008, 10006, 3, 179.70);
INSERT INTO TransactionDetails VALUES (10009, 10007, 5, 199.50);
INSERT INTO TransactionDetails VALUES (10010, 10012, 5, 649.5);
INSERT INTO TransactionDetails VALUES (10010, 10023, 1, 79.90);
INSERT INTO TransactionDetails VALUES (10011, 10004, 2, 159.80);
INSERT INTO TransactionDetails VALUES (10012, 10016, 1, 59.90);
INSERT INTO TransactionDetails VALUES (10013, 10004, 2, 159.80);
INSERT INTO TransactionDetails VALUES (10013, 10012, 3, 389.70);
INSERT INTO TransactionDetails VALUES (10014, 10007, 1, 39.90);
INSERT INTO TransactionDetails VALUES (10015, 10018, 2, 119.80);
INSERT INTO TransactionDetails VALUES (10016, 10016, 3, 179.70);
INSERT INTO TransactionDetails VALUES (10017, 10006, 4, 239.60);
INSERT INTO TransactionDetails VALUES (10017, 10014, 5, 499.50);
INSERT INTO TransactionDetails VALUES (10018, 10020, 2, 259.80);
INSERT INTO TransactionDetails VALUES (10019, 10006, 2, 119.80);
INSERT INTO TransactionDetails VALUES (10020, 10002, 2, 79.80);
INSERT INTO TransactionDetails VALUES (10021, 10002, 2, 79.80);
INSERT INTO TransactionDetails VALUES (10022, 10016, 3, 179.70);
INSERT INTO TransactionDetails VALUES (10023, 10006, 1, 59.90);
INSERT INTO TransactionDetails VALUES (10023, 10012, 3, 389.70);
INSERT INTO TransactionDetails VALUES (10024, 10013, 3, 389.70);
INSERT INTO TransactionDetails VALUES (10025, 10023, 4, 319.60);
INSERT INTO TransactionDetails VALUES (10026, 10005, 5, 399.50);
INSERT INTO TransactionDetails VALUES (10026, 10022, 6, 899.40);
INSERT INTO TransactionDetails VALUES (10027, 10007, 3, 119.70);
INSERT INTO TransactionDetails VALUES (10028, 10017, 3, 179.70);
INSERT INTO TransactionDetails VALUES (10029, 10011, 3, 389.70);
INSERT INTO TransactionDetails VALUES (10029, 10005, 4, 319.60);
INSERT INTO TransactionDetails VALUES (10030, 10016, 1, 59.90);
INSERT INTO TransactionDetails VALUES (10031, 10022, 2, 299.80);
INSERT INTO TransactionDetails VALUES (10031, 10013, 4, 519.60);
INSERT INTO TransactionDetails VALUES (10032, 10021, 4, 319.60);
INSERT INTO TransactionDetails VALUES (10033, 10016, 5, 299.50);
INSERT INTO TransactionDetails VALUES (10034, 10019, 4, 239.60);
INSERT INTO TransactionDetails VALUES (10035, 10018, 6, 359.40);
INSERT INTO TransactionDetails VALUES (10035, 10020, 7, 909.30);
INSERT INTO TransactionDetails VALUES (10036, 10022, 1, 149.90);
INSERT INTO TransactionDetails VALUES (10037, 10012, 5, 649.50);
INSERT INTO TransactionDetails VALUES (10037, 10002, 1, 39.90);
INSERT INTO TransactionDetails VALUES (10038, 10008, 2, 259.80);
INSERT INTO TransactionDetails VALUES (10039, 10020, 3, 389.70);
INSERT INTO TransactionDetails VALUES (10040, 10010, 5, 749.50);
INSERT INTO TransactionDetails VALUES (10041, 10008, 5, 649.50);
INSERT INTO TransactionDetails VALUES (10042, 10001, 1, 29.90);
INSERT INTO TransactionDetails VALUES (10042, 10017, 1, 59.90);
INSERT INTO TransactionDetails VALUES (10043, 10024, 1, 129.90);
INSERT INTO TransactionDetails VALUES (10043, 10007, 1, 39.90);
INSERT INTO TransactionDetails VALUES (10044, 10002, 2, 79.80);
INSERT INTO TransactionDetails VALUES (10045, 10003, 2, 199.80);
INSERT INTO TransactionDetails VALUES (10046, 10009, 3, 389.70);
INSERT INTO TransactionDetails VALUES (10046, 10015, 1, 79.90);
INSERT INTO TransactionDetails VALUES (10047, 10017, 1, 59.90);
INSERT INTO TransactionDetails VALUES (10047, 10021, 1, 149.90);
INSERT INTO TransactionDetails VALUES (10048, 10012, 3, 389.70);
INSERT INTO TransactionDetails VALUES (10048, 10013, 3, 389.70);
INSERT INTO TransactionDetails VALUES (10049, 10023, 4, 319.60);
INSERT INTO TransactionDetails VALUES (10049, 10005, 5, 399.50);
INSERT INTO TransactionDetails VALUES (10050, 10022, 6, 899.40);
INSERT INTO TransactionDetails VALUES (10051, 10007, 3, 119.70);
INSERT INTO TransactionDetails VALUES (10051, 10016, 3, 179.70);
INSERT INTO TransactionDetails VALUES (10051, 10011, 3, 389.70);
INSERT INTO TransactionDetails VALUES (10052, 10005, 4, 319.60);
INSERT INTO TransactionDetails VALUES (10052, 10016, 1, 59.90);
INSERT INTO TransactionDetails VALUES (10052, 10022, 2, 299.80);
INSERT INTO TransactionDetails VALUES (10053, 10013, 1, 129.90);
INSERT INTO TransactionDetails VALUES (10053, 10007, 2, 79.80);
INSERT INTO TransactionDetails VALUES (10053, 10024, 3, 389.70);
INSERT INTO TransactionDetails VALUES (10054, 10021, 4, 319.60);
INSERT INTO TransactionDetails VALUES (10054, 10007, 5, 199.50);
INSERT INTO TransactionDetails VALUES (10054, 10010, 1, 149.90);
INSERT INTO TransactionDetails VALUES (10054, 10023, 3, 239.70);
INSERT INTO TransactionDetails VALUES (10055, 10006, 2, 119.80);
INSERT INTO TransactionDetails VALUES (10055, 10014, 3, 299.70);
INSERT INTO TransactionDetails VALUES (10056, 10007, 1, 39.90);
INSERT INTO TransactionDetails VALUES (10056, 10002, 2, 79.80);
INSERT INTO TransactionDetails VALUES (10056, 10019, 3, 179.70);
INSERT INTO TransactionDetails VALUES (10057, 10007, 5, 199.50);
INSERT INTO TransactionDetails VALUES (10057, 10012, 5, 649.5);
INSERT INTO TransactionDetails VALUES (10057, 10023, 1, 79.90);
INSERT INTO TransactionDetails VALUES (10058, 10005, 2, 159.80);
INSERT INTO TransactionDetails VALUES (10058, 10016, 1, 59.90);
INSERT INTO TransactionDetails VALUES (10058, 10004, 2, 159.80);
INSERT INTO TransactionDetails VALUES (10059, 10012, 3, 389.70);
INSERT INTO TransactionDetails VALUES (10059, 10007, 1, 39.90);
INSERT INTO TransactionDetails VALUES (10059, 10018, 2, 119.80);
INSERT INTO TransactionDetails VALUES (10060, 10016, 3, 179.70);
INSERT INTO TransactionDetails VALUES (10060, 10006, 4, 239.60);
INSERT INTO TransactionDetails VALUES (10060, 10014, 5, 499.50);
