-- AutoDijelovi Shop - MySQL Database Dump
-- Laravel projekat - Web Programiranje i Dizajn
-- Verzija: 1.0
-- Generisano: 2024

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `autodijelovi_db`
--

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Podaci za tabelu `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@autodijelovi.com', NULL, '$2y$12$LQv3c1yytN1JBRXj.iJqNOd5pKxEDHVGZ9ygz/kBqFqCE1MHjZZCG', 1, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(2, 'Korisnik Test', 'korisnik@autodijelovi.com', NULL, '$2y$12$LQv3c1yytN1JBRXj.iJqNOd5pKxEDHVGZ9ygz/kBqFqCE1MHjZZCG', 0, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(3, 'Haris Hodžić', 'haris@test.com', NULL, '$2y$12$LQv3c1yytN1JBRXj.iJqNOd5pKxEDHVGZ9ygz/kBqFqCE1MHjZZCG', 0, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(4, 'Amina Karić', 'amina@test.com', NULL, '$2y$12$LQv3c1yytN1JBRXj.iJqNOd5pKxEDHVGZ9ygz/kBqFqCE1MHjZZCG', 0, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00');

-- --------------------------------------------------------

--
-- Struktura tabele `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Podaci za tabelu `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Motor', 'Dijelovi motora - klipovi, osovine, zupčanici, ventili i ostali dijelovi motora', '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(2, 'Kočnice', 'Kočioni sistem - pločice, diskovi, bubnjevi, cilindri i hidraulični sistemi', '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(3, 'Elektrika', 'Električni dijelovi - starteri, alternatori, akumulatori, žice i senzori', '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(4, 'Ovjesa', 'Sistem ovjesa - amortizeri, opruge, stabilizatori i zglobovi', '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(5, 'Transmisija', 'Dijelovi transmisije - mjenjači, kvačilo, kardanske osovine i diferencijali', '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(6, 'Karoserija', 'Vanjski dijelovi - branici, farovi, retrovizori, stakla i ostali karoserijski dijelovi', '2024-01-01 10:00:00', '2024-01-01 10:00:00');

-- --------------------------------------------------------

--
-- Struktura tabele `auto_parts`
--

DROP TABLE IF EXISTS `auto_parts`;
CREATE TABLE `auto_parts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auto_parts_category_id_foreign` (`category_id`),
  CONSTRAINT `auto_parts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Podaci za tabelu `auto_parts`
--

INSERT INTO `auto_parts` (`id`, `category_id`, `name`, `description`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Komplet Klipova 4 Cilindra', 'Visokokvalitetni komplet klipova za 4-cilindarski motor. Dimenzije: Ø82mm. Uključuje klipne prstenove i osovine. Kompatibilno sa većinom evropskih vozila.', 350.00, 15, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(2, 1, 'Bregasta Osovina', 'Originalna bregasta osovina za benzinske motore 1.6-2.0L. Poboljšane performanse i dugotrajnost. Garancija 2 godine.', 420.00, 8, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(3, 1, 'Set Ventila (Usisni + Izduvni)', 'Kompletni set ventila za 4-cilindarske motore. 8 ventila usisnih + 8 izduvnih. Visoka otpornost na temperaturu.', 280.00, 12, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(4, 2, 'Kočione Pločice Prednje', 'Originalne prednje kočione pločice za VW, Audi, Škoda. Low-dust tehnologija za manje prašine. Uključuje senzore habanja.', 85.00, 25, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(5, 2, 'Kočioni Diskovi Par (2kom)', 'Par kočionih diskova - ventilirani. Ø280mm. Premium kvalitet sa antikorozivnom zaštitom. Za prednje točkove.', 145.00, 18, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(6, 2, 'Glavni Kočioni Cilindar', 'Glavni kočioni cilindar sa rezervoarom za kočionu tečnost. Kompatibilno sa hidrauličkim ABS sistemima.', 195.00, 7, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(7, 3, 'Starter Motor', 'Starter motor 12V, 1.4kW. Kompatibilan sa dizel i benzinskim motorima do 2.0L. Ugrađen Bosch tehnologija.', 320.00, 10, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(8, 3, 'Alternator 90A', 'Alternator 90A, 14V. Regenerisan i testiran. Uključuje vakuum pumpu. Garancija 12 mjeseci.', 280.00, 6, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(9, 3, 'Akumulator 74Ah', 'Akumulator 74Ah, 680A. Calcium tehnologija. Bez potrebe za održavanjem. 3 godine garancije.', 185.00, 20, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(10, 3, 'Komplet Svećica (4kom)', 'Set svećica NGK/Bosch za benzinske motore. Dugi vijek trajanja. Iridijumski vrh za bolje paljenje.', 65.00, 30, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(11, 4, 'Amortizer Prednji Gas', 'Prednji gasni amortizer. Poboljšana stabilnost i komfor vožnje. Premium Bilstein kvalitet. Za VW Golf 5/6.', 155.00, 14, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(12, 4, 'Opruge Prednje Par', 'Par prednjih opruga. Standardna visina. Čelična konstrukcija sa antikorozivnom zaštitom.', 125.00, 10, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(13, 4, 'Stabilizator Prednji', 'Prednja stabilizaciona šipka. Povećava stabilnost u zavojima. Ø22mm. Uključuje gumice.', 95.00, 12, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(14, 5, 'Kvačilo Komplet (3 dijela)', 'Komplet kvačila - ploča, disk i ležaj. Za dizel motore 1.9-2.0 TDI. LUK original kvalitet.', 385.00, 9, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(15, 5, 'Kardanska Osovina', 'Prednja lijeva kardanska osovina. Sa ABS senzorom. Originalni OEM kvalitet. Za Golf 5/6, Audi A3.', 165.00, 11, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(16, 5, 'Ulje za Mjenjač 75W-90 (1L)', 'Sintetičko ulje za manuelne mjenjače. 75W-90 GL-4/GL-5. Motul Premium kvalitet.', 28.00, 50, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(17, 6, 'Far Prednji Lijevi', 'Prednji lijevi far za VW Golf 6. Halogeni sa pozicijskim svjetlom. Originalna Hella proizvodnja.', 245.00, 5, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(18, 6, 'Branik Prednji Crni', 'Prednji branik - crni, neofarban. Spremno za farbanje. Sa otvorima za maglenke. Za VW Passat B6.', 175.00, 3, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(19, 6, 'Retrovizor Desni Električni', 'Desni retrovizor sa električim podešavanjem i grijanjem. Crna boja kućišta. Za Golf 5/6.', 125.00, 8, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(20, 6, 'Vjetrobransko Staklo', 'Prednje vjetrobransko staklo. Zeleno, laminisano sa senzorom kiše. Za VW Golf 6.', 295.00, 4, NULL, '2024-01-01 10:00:00', '2024-01-01 10:00:00');

-- --------------------------------------------------------

--
-- Struktura tabele `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2024_01_01_000000_create_categories_table', 1),
(3, '2024_01_02_000000_create_auto_parts_table', 1);

COMMIT;

-- Napomena: Default lozinka za sve korisnike je 'password'
-- Admin: admin@autodijelovi.com / password
-- Korisnik: korisnik@autodijelovi.com / password
