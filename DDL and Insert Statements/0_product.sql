-- Product (30 records)

CREATE TABLE `product` (
	`productID` INT NOT NULL AUTO_INCREMENT COLLATE 'utf8mb4_0900_ai_ci',
	`productName` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`productDescription` VARCHAR(500) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`entryDate` DATE NOT NULL,
	`productQty` INT(10) NOT NULL,
	`productPrice` DOUBLE NOT NULL,
	`productImage` LONGBLOB NOT NULL,
	PRIMARY KEY (`productID`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

INSERT INTO PRODUCT VALUES (10001, 'NESYA KURUNG', 'Material: Pearl skin high quality. Leher bulat,Zip belakang. Zip ditangan. Baju cutting Loose. Kain getah separuh dan zip. Kain potong 6.', '2021-07-07', 30, 29.90, 'https://cf.shopee.com.my/file/b79d1f61307eba667d2d32e09c8c80a2');
INSERT INTO PRODUCT VALUES (10002, 'LAIQA KURUNG', 'Material: Pearl skin high quality. Leher bulat,Zip belakang. Zip ditangan. Baju cutting Loose. Kain getah separuh dan zip. Dihiasi button.', '2021-07-01', 25, 39.90, 'https://cf.shopee.com.my/file/6cbec048abbca45043b960cb05cad62f');
INSERT INTO PRODUCT VALUES (10003, 'ARIANA SUIT', 'Material: Como crepe high quality. Leher bulat. Zip depan (Menyusu). Poket 1 depan, Baju belah kiri dan kanan, Baju cutting Loose. Kain getah penuh.', '2021-07-08', 50, 99.90, 'https://cf.shopee.com.my/file/43323dca1b0549bf746a5a0f93dbba73');
INSERT INTO PRODUCT VALUES (10004, 'HAIFA SUIT', 'Material: Como crepe, Leher bulat,Zip dibahagian belakang. Zip ditangan, Baju cutting Loose. Seluar getah separuh dan zip sorok. Dihiasi button.', '2021-07-10', 20, 79.90, 'https://cf.shopee.com.my/file/2318db60f2a3241d8fb89b542e9cf29e');
INSERT INTO PRODUCT VALUES (10005, 'NAYLA SUIT', 'Material: Como crepe high quality. Leher bulat. Zip di bahagian dada. Baju cutting loose dress labuh arabic styles. Seluar straight cut + full getah dipinggang.', '2021-07-14', 100, 79.90, 'https://cf.shopee.com.my/file/3c44069cd5bd1c40567ae170747af16c');
INSERT INTO PRODUCT VALUES (10006, 'MEDINA KURUNG', 'Medina Kuring 2 in 1 boleh digayakan bersama kain ataupun long pants. Tali yang dijihait bersilang ikat mengikut gaya dan keselesaan si pemakai. Belah dikiri kanan baju.', '2021-07-03', 70, 59.90, 'https://cf.shopee.com.my/file/30e9af84f9e22a88dd1b50cd8eff559c');
INSERT INTO PRODUCT VALUES (10007, 'POLKADOT RANAA', 'Material como crepe high quality.. (tak perlu gosok). Design kurung moden. Zip didepan (Menyusu). mudah berwuduk. Cutting loose dear, tak mahu ketat2 kan dear, yang penting lebih selesa dear. Comfem repeat oder tau.P inggang getah dan zip belah kiri.', '2021-07-04', 65, 39.90, 'https://cf.shopee.com.my/file/32f62432e8f19eb17e835dea580316a9');
INSERT INTO PRODUCT VALUES (10008, 'HALWA KURUNG', 'Material: Pearl Skin High Quality. 6 Leher bulat, Zip di leher. Baju cutting Loose. Seluar getah separuh dan zip. Poket satu didepan. Kain renda.', '2021-07-09', 59, 129.90, 'https://cf.shopee.com.my/file/e6cd5d43dcfdc464eb06d7adbfe20e3d');
INSERT INTO PRODUCT VALUES (10009, 'CIK BUNGA COTTON', 'Material: Cotton italian High Quality. Leher bulat,Zip di leher. Baju cutting Loose. Seluar getah separuh dan zip. Design Kurung Modern.', '2021-07-14', 61, 12, 'https://cf.shopee.com.my/file/a87878bd67b0785dcfbc0ef5d0540525');
INSERT INTO PRODUCT VALUES (10010, 'MALISSA SUIT', 'Material: Pearl skin high quality. Leher bulat,Zip didepan. Zip ditangan. Baju cutting Loose. Seluar getah separuh dan zip sorok.', '2021-07-09', 37, 149.90, 'https://cf.shopee.com.my/file/b1e853ea183cbb0f75fabe69c2793a34');
INSERT INTO PRODUCT VALUES (10011, 'ARIANA FASHION SUIT', 'Material COMO CREPE high quality, Poket satu didepan, Cutting loose dear, tak mahu ketat-ketat kan dear, yang penting lebih selesa dear, Leher bulat, Zip didepan (Menyusu), Design exclusive , by syasya, Kain lembut,sejuk dan iron less, Comfem repeat oder tau.', '2021-07-01', 43, 129.90, 'https://cf.shopee.com.my/file/0e32d1ae96bed65d0a9794a644d89815');
INSERT INTO PRODUCT VALUES (10012, 'KURUNG PEPLUM POTONGAN', 'MATERIAL PEARL SKIN JAPAN HIGH QUALITY. MUDAH DIGOSOK. SEJUK DAN SELESA. TAHAN LASAK', '2021-07-05', 64, 129.90, 'https://cf.shopee.com.my/file/e937aa8a58756406fb457e1a604e29c8');
INSERT INTO PRODUCT VALUES (10013, 'ADENA KURUNG', 'Material: Pearl skin high quality, Leher bulat,Zip didepan, Zip ditangan, Baju cutting Loose, Kain getah separuh dan zip, Dihiasi button.', '2021-07-10', 129, 129.90, 'https://cf.shopee.com.my/file/2d08e2620bc9f90d85f741df3a66a02f');
INSERT INTO PRODUCT VALUES (10014, 'MALIKA SUIT', 'Material: Como crepe high quality. Leher bulat. Zip bahagian depan (sesuai untuk ibu menyusu). belahan dibahagian kiri dan kanan baju (punjabi style). poket di sebelah kiri baju (bahagian sisi), Loose cutting. Seluar cutting straight. pinggang seluar full getah', '2021-07-10', 100, 99.90, 'https://cf.shopee.com.my/file/66677b43306085445f2d0477a95afc61');
INSERT INTO PRODUCT VALUES (10015, 'QALESYA KURUNG', 'Design EXCLUSIVE by syasya. Material Pearl skin high quality. Harga of Course MURAH dan MAMPU MILIK. Cutting Loose Berdutt di Belakang dan Rompol exclusive dibahagian atas bahu (tutup dada). Terletak elok dibadan Apabila Dipakai. Design Mini Kurung dan skirt kembang.', '2021-07-09', 90, 79.90, 'https://cf.shopee.com.my/file/2a0ff6029171f4abfabbd564b8bf21be');
INSERT INTO PRODUCT VALUES (10016, 'ERMA KURUNG', 'Material: Pearl skin high quality, Leher bulat,Zip didepan, Zip ditangan, Baju cutting Loose, Seluar getah separuh dan zip, Dihiasi button.', '2021-07-09', 86, 59.90, 'https://cf.shopee.com.my/file/981aabb20b53311681626872be3de809');
INSERT INTO PRODUCT VALUES (10017, 'AURORA KURUNG', 'Material: Como crepe high quality Baju dan Kain. Zip didepan dan ditangan. Kain kembang payung. Leher bulat. Baju cutting Loose. Kain getah separuh dan zip.', '2021-07-06', 30, 59.90, 'https://cf.shopee.com.my/file/558e63259a98f0904392820c62baaf65');
INSERT INTO PRODUCT VALUES (10018, 'KEISHA SUIT', 'Material: Como crepe. Leher bulat,Zip di leher. Baju cutting Loose. Seluar getah separuh dan zip sorok. Dihiasi button.', '2021-07-01', 110, 59.90, 'https://cf.shopee.com.my/file/4fe2aca73fabefebb17d4f11f9fb9f1e');
INSERT INTO PRODUCT VALUES (10019, 'ADONIA KURUNG', 'Material: Como crepe high quality Baju dan Kain. Zip didepan dan ditangan. Kain lipat depan. Leher bulat. Design Kurung Modern. Baju cutting Loose. Kain getah separuh dan zip.', '2021-07-14', 98, 59.90, 'https://cf.shopee.com.my/file/ef89a6aefd119040dc6ccfb67d0a8d82');
INSERT INTO PRODUCT VALUES (10020, 'KURUNG CLARISSA', 'Material: Como crepe high quality Baju dan Kain. Kain kembang payung. Leher bulat. Design Kurung Modern. Baju cutting Loose. Kain getah separuh dan zip. ', '2021-07-04', 45, 129.90, 'https://cf.shopee.com.my/file/a6a6ad404f3aa22f41e65bf6e272d340');
INSERT INTO PRODUCT VALUES (10021, 'KAFTAN SHERLY', 'Material: Pearl skin high quality. Ada zip didepan,boleh menyusu. Baju cutting Loose. Seluar getah. Kain duyung.', '2021-07-05', 55, 79.90, 'https://cf.shopee.com.my/file/84f8a1048e33b55fdad905dba620b601');
INSERT INTO PRODUCT VALUES (10022, 'KURUNG DAVINA', 'Material: SETAPURA SILK hight quality. Leher bulat dan button. Design Kurung Modern. Baju cutting Loose. Kain getah separuh dan zip.', '2021-07-15', 90, 149.90, 'https://cf.shopee.com.my/file/2cdf36c299d03194fdcc69c3ce5e7963');
INSERT INTO PRODUCT VALUES (10023, 'POLKADOT RANAA NEW', 'Material como crepe high quality (tak perlu gosok). Design kurung moden. Zip didepan (Menyusu). mudah berwuduk. Cutting loose dear, tak mahu ketat2 kan dear, yang penting lebih selesa dear. Design exclusive , by syasya. Kain lembut,sejuk dan eron less. Comfem repeat oder tauu. Pinggang getah dan zip belah kiri.', '2021-07-07', 60, 79.90, 'https://cf.shopee.com.my/file/92dfce48e0cbef9f986408cfbd40388c');
INSERT INTO PRODUCT VALUES (10024, 'BAJU MELAYU, SLIM FITT', 'Material Pearl Skin High Quality. Cutting Slim Fitt. Cutting Butik. Baju 2 in 1, Boleh gayakan baju sahaja bersama seluar slack.', '2021-07-08', 77, 129.90, 'https://cf.shopee.com.my/file/1a55eafce38c07c4968e89fc6da77cf8');
