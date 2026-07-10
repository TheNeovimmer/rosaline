CREATE TABLE IF NOT EXISTS `settings` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) NOT NULL,
  `value` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `settings` (`key`, `value`) VALUES
('store_name', 'Rosaline'),
('store_email', 'hello@rosaline.com'),
('store_phone', '+1 (800) 555-2390'),
('store_address', '456 Blooming Lane, Suite 9A, Los Angeles, CA 90025, USA'),
('currency', 'USD'),
('tax_rate', '0'),
('free_shipping_threshold', '49'),
('cod_enabled', '1'),
('cod_min_amount', '0'),
('cod_max_amount', '0'),
('cod_description', 'Pay when your order arrives. No extra fees.');
