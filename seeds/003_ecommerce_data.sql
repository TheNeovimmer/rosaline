-- Rosaline Tunisian Ecommerce Seed Data
-- Users, Categories, Products, Addresses, Orders, Reviews
-- Idempotent: cleans conflicting 001 seed data first, then inserts fresh

START TRANSACTION;

-- Remove dependency chains from 001_data.sql to avoid FK conflicts
DELETE FROM `reviews` WHERE `user_id` IN (SELECT `id` FROM `users` WHERE `email` IN ('admin@rosaline.com','sarah.chen@example.com','jessica.m@example.com'));
DELETE FROM `order_status_history` WHERE `order_id` IN (SELECT `id` FROM `orders` WHERE `user_id` IN (SELECT `id` FROM `users` WHERE `email` IN ('admin@rosaline.com','sarah.chen@example.com','jessica.m@example.com')));
DELETE FROM `order_items` WHERE `order_id` IN (SELECT `id` FROM `orders` WHERE `user_id` IN (SELECT `id` FROM `users` WHERE `email` IN ('admin@rosaline.com','sarah.chen@example.com','jessica.m@example.com')));
DELETE FROM `orders` WHERE `user_id` IN (SELECT `id` FROM `users` WHERE `email` IN ('admin@rosaline.com','sarah.chen@example.com','jessica.m@example.com'));
DELETE FROM `addresses` WHERE `user_id` IN (SELECT `id` FROM `users` WHERE `email` IN ('admin@rosaline.com','sarah.chen@example.com','jessica.m@example.com'));
DELETE FROM `wishlists` WHERE `user_id` IN (SELECT `id` FROM `users` WHERE `email` IN ('admin@rosaline.com','sarah.chen@example.com','jessica.m@example.com'));
DELETE FROM `products` WHERE `category_id` IN (SELECT `id` FROM `categories` WHERE `slug` IN ('skincare','makeup','haircare','fragrance','body-care','gifts-sets','cleansers','serums','moisturizers'));
DELETE FROM `categories` WHERE `slug` IN ('skincare','makeup','haircare','fragrance','body-care','gifts-sets','cleansers','serums','moisturizers');
DELETE FROM `users` WHERE `email` IN ('admin@rosaline.com','sarah.chen@example.com','jessica.m@example.com');

-- ── Categories ──────────────────────────────────────────────────────────────
INSERT IGNORE INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `parent_id`, `sort_order`) VALUES
(1, 'Soins du Visage', 'face-care', 'Soins hydratants, sérums et nettoyants pour une peau radieuse.', 'assets/images/category/placeholder.jpg', NULL, 1),
(2, 'Soins du Corps', 'body-care', 'Huiles, gommages et laits corporels pour une peau douce et nourrie.', 'assets/images/category/placeholder.jpg', NULL, 2),
(3, 'Soins Capillaires', 'hair-care', 'Huiles, shampooings et soins naturels pour des cheveux brillants.', 'assets/images/category/placeholder.jpg', NULL, 3);

-- ── Products ────────────────────────────────────────────────────────────────
INSERT IGNORE INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `short_description`, `price`, `sku`, `stock_quantity`, `low_stock_threshold`, `image`, `images`, `featured`, `status`) VALUES

-- Face Care (category 1)
(1, 1, 'Crème Hydratante à l''Huile d''Argan', 'creme-hydratante-huile-argan', 'Une crème visage enrichie à l''huile d''argan biologique du sud tunisien. Hydrate en profondeur et laisse la peau douce, souple et lumineuse. Formulée sans parabènes ni silicones.', 'Crème visage hydratante à l''argan bio', 29.900, 'FAC-001', 50, 5, 'assets/images/products/product-1.jpg', '["assets/images/products/product-1_2.jpg","assets/images/products/product-1.jpg"]', 1, 'active'),
(2, 1, 'Sérum Anti-âge à la Rose de Damas', 'serum-antiage-rose-damas', 'Un sérum concentré à la rose de Damas et à l''acide hyaluronique. Réduit visiblement les rides, raffermit la peau et unifie le teint. Texture légère à pénétration rapide.', 'Sérum anti-âge à la rose de Damas', 49.500, 'FAC-002', 30, 5, 'assets/images/products/product-3.jpg', '["assets/images/products/product-3_2.jpg","assets/images/products/product-3.jpg"]', 0, 'active'),
(7, 1, 'Nettoyant Doux au Lait d''Ânesse', 'nettoyant-lait-anesse', 'Un nettoyant visage au lait d''ânesse frais de Tunisie. Nettoie en douceur tout en préservant le film hydrolipidique de la peau. Idéal pour les peaux sensibles et réactives.', 'Nettoyant visage au lait d''ânesse', 24.900, 'FAC-003', 40, 8, 'assets/images/products/product-2.jpg', '["assets/images/products/product-2_2.jpg","assets/images/products/product-2.jpg"]', 0, 'active'),
(8, 1, 'Masque Éclat à l''Argile Blanche et au Miel', 'masque-argile-blanche-miel', 'Un masque purifiant à l''argile blanche du Maghreb et au miel de jujubier tunisien. Absorbe les impuretés, illumine le teint et resserre les pores sans dessécher.', 'Masque purifiant éclat argile blanche', 19.500, 'FAC-004', 35, 5, 'assets/images/products/product-4.jpg', '["assets/images/products/product-4_2.jpg","assets/images/products/product-4.jpg"]', 1, 'active'),
(9, 1, 'Eau Florale de Fleur d''Oranger', 'eau-florale-fleur-oranger', 'Une eau florale 100% pure distillée à partir des fleurs d''oranger de Nabeul. Tonifie, apaise et rafraîchit la peau. Utilisable en lotion tonique ou brume rafraîchissante.', 'Eau florale pure de fleur d''oranger', 14.900, 'FAC-005', 60, 10, 'assets/images/products/product-6.jpg', '["assets/images/products/product-6_2.jpg","assets/images/products/product-6.jpg"]', 0, 'active'),
(10, 1, 'Contour des Yeux à l''Huile de Figue de Barbarie', 'contour-yeux-huile-figue-barbarie', 'Un soin contour des yeux à l''huile de figue de barbarie biologique. Atténue les poches, les cernes et les ridules. Texture gel ultra-fraîche non grasse.', 'Soin contour yeux figue de barbarie', 34.900, 'FAC-006', 25, 5, 'assets/images/products/product-10.jpg', '["assets/images/products/product-8.jpg","assets/images/products/product-10.jpg"]', 0, 'active'),
(11, 1, 'Beauté Flash Sérum Vitamine C', 'serum-vitamine-c', 'Un sérum concentré à 15% de vitamine C stable et à l''acide ferulique. Illumine le teint, réduit les taches brunes et booste la production de collagène. Pénétration rapide.', 'Sérum éclat vitamine C 15%', 42.000, 'FAC-007', 20, 5, 'assets/images/products/product-8.jpg', '["assets/images/products/product-8.jpg","assets/images/products/product-7.jpg"]', 1, 'active'),

-- Body Care (category 2)
(3, 2, 'Huile Corporelle à l''Ambre', 'huile-corporelle-ambre', 'Une huile corporelle parfumée à l''ambre et enrichie en vitamines E et F. Nourrit la peau en profondeur et laisse un sillage envoûtant et chaleureux.', 'Huile corps nourrissante à l''ambre', 35.000, 'BOD-001', 40, 5, 'assets/images/products/product-5.jpg', '["assets/images/products/product-5_2.jpg","assets/images/products/product-5.jpg"]', 1, 'active'),
(4, 2, 'Gommage Corps au Sel Marin de Djerba', 'gommage-corps-sel-marin-djerba', 'Un gommage exfoliant au sel marin de Djerba et aux huiles essentielles d''orange douce et de lavande. Élimine les cellules mortes et revitalise la peau.', 'Gommage exfoliant au sel marin de Djerba', 22.500, 'BOD-002', 25, 5, 'assets/images/products/product-7.jpg', '["assets/images/products/product-7_2.jpg","assets/images/products/product-7.jpg"]', 0, 'active'),
(12, 2, 'Lait Corporel à l''Huile d''Olive et Beurre de Karité', 'lait-corporel-huile-olive-beurre-karite', 'Un lait corporel riche à l''huile d''olive tunisienne extra vierge et au beurre de karité. Hydrate, nourrit et adoucit la peau toute la journée. Pénétration rapide non collante.', 'Lait corporel hydratant olive karité', 27.000, 'BOD-003', 45, 8, 'assets/images/products/product-9.jpg', '["assets/images/products/product-9_2.jpg","assets/images/products/product-9.jpg"]', 0, 'active'),
(13, 2, 'Savon d''Alep Traditionnel à l''Huile de Laurier', 'savon-alep-laurier', 'Un savon d''Alep pur fait main selon la tradition ancestrale. 30% d''huile de laurier pour purifier et apaiser les peaux à tendance acnéique ou sujettes à l''eczéma.', 'Savon d''Alep traditionnel 30% laurier', 12.000, 'BOD-004', 100, 20, 'assets/images/products/product-12.jpg', '["assets/images/products/product-12_2.jpg","assets/images/products/product-12.jpg"]', 0, 'active'),
(14, 2, 'Beurre Corporel à la Fleur d''Oranger', 'beurre-corporel-fleur-oranger', 'Un beurre corporel onctueux infusé à la fleur d''oranger de Nabeul. Enrichi en beurre de mangue et huile d''amande douce pour une nutrition intense.', 'Beurre corps fleur d''oranger', 32.000, 'BOD-005', 30, 5, 'assets/images/products/product-14.jpg', '["assets/images/products/product-14.jpg","assets/images/products/product-13.jpg"]', 1, 'active'),
(15, 2, 'Déodorant Naturel Pierre d''Alun', 'deodorant-pierre-alun', 'Un déodorant naturel à base de pierre d''alun pure. Sans aluminium nocif, sans parfum. Efficace 24h, respecte la peau et l''environnement. Format roll-on.', 'Déodorant naturel pierre d''alun', 9.900, 'BOD-006', 80, 15, 'assets/images/products/product-16.jpg', '["assets/images/products/product-16.jpg","assets/images/products/product-15.jpg"]', 0, 'active'),
(16, 2, 'Huile de Massage Relaxante à la Lavande', 'huile-massage-lavande', 'Une huile de massage aux huiles essentielles de lavande de Provence et de camomille. Détend les muscles, apaise l''esprit et parfume délicatement la peau.', 'Huile massage relaxante lavande', 28.000, 'BOD-007', 35, 5, 'assets/images/products/product-20.jpg', '["assets/images/products/product-20.jpg","assets/images/products/product-19.jpg"]', 0, 'active'),

-- Hair Care (category 3)
(5, 3, 'Huile de Ricin Biologique', 'huile-ricin-biologique', 'Huile de ricin pure pressée à froid, certifiée biologique. Stimule la pousse des cheveux, des cils et des sourcils. Idéale aussi pour les soins des ongles et du cuir chevelu.', 'Huile de ricin pure pressée à froid', 18.000, 'CAP-001', 80, 10, 'assets/images/products/product-9.jpg', '["assets/images/products/product-11_2.jpg","assets/images/products/product-11.jpg"]', 1, 'active'),
(6, 3, 'Shampooing Solide à l''Argile Ghassoul', 'shampooing-solide-argile-ghassoul', 'Un shampooing solide naturel à l''argile ghassoul du Maroc et à l''huile d''olive tunisienne. Nettoie en douceur sans agresser le cuir chevelu. Sans sulfate, sans emballage plastique.', 'Shampooing solide naturel ghassoul', 15.500, 'CAP-002', 60, 10, 'assets/images/products/product-11.jpg', '["assets/images/products/product-11_2.jpg","assets/images/products/product-11.jpg"]', 0, 'active'),
(17, 3, 'Masque Capillaire à l''Huile d''Argan', 'masque-capilla ire-huile-argan', 'Un masque capillaire réparateur à l''huile d''argan biologique et au beurre de karité. Répare les cheveux abîmés, nourrit en profondeur et redonne brillance et souplesse.', 'Masque réparateur argan karité', 26.500, 'CAP-003', 35, 5, 'assets/images/products/product-15.jpg', '["assets/images/products/product-15_2.jpg","assets/images/products/product-15.jpg"]', 1, 'active'),
(18, 3, 'Sérum Capillaire à l''Huile de Cactus', 'serum-capillaire-huile-cactus', 'Un sérum capillaire à l''huile de figue de barbarie tunisienne. Dompte les frisottis, apporte de la brillance et protège de la chaleur. Quelques gouttes suffisent.', 'Sérum brillance huile de cactus', 22.000, 'CAP-004', 40, 8, 'assets/images/products/product-17.jpg', '["assets/images/products/product-17.jpg","assets/images/products/product-18.jpg"]', 0, 'active'),
(19, 3, 'Baume à Lèvres au Miel et à la Cire d''Abeille', 'baume-levres-miel-cire-abeille', 'Un baume à lèvres 100% naturel au miel de montagne tunisien et à la cire d''abeille. Hydrate, protège et répare les lèvres gercées. Format stick pratique.', 'Baume lèvres naturel miel cire', 6.500, 'CAP-005', 120, 20, 'assets/images/products/product-18.jpg', '["assets/images/products/product-18_2.jpg","assets/images/products/product-18.jpg"]', 0, 'active'),
(20, 3, 'Huile de Coco Vierge Biologique', 'huile-coco-vierge-biologique', 'Huile de coco vierge pressée à froid, certifiée biologique. Multi-usage : soin capillaire, hydratation corporelle, démaquillage et cuisine santé.', 'Huile de coco vierge biologique', 21.000, 'CAP-006', 50, 10, 'assets/images/products/product-19.jpg', '["assets/images/products/product-19.jpg","assets/images/products/product-20.jpg"]', 0, 'active');

-- ── Users ───────────────────────────────────────────────────────────────────
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@rosaline.tn', '$2y$12$Js9EorHAiT9ypFAht4V09urDUgNdxFwlb5UL7RRkuAeH5VQvEKoVG', '+21650123456', 'admin', NOW(), NOW()),
(2, 'Ahmed Ben Salem', 'customer@example.tn', '$2y$12$lYjQR7hXB2AAnaqZLGcrq.Kv3MMQQ35oiSeJ.RI0GFUDfcpiHvwHW', '+21698765432', 'customer', NOW(), NOW());

-- ── Addresses ───────────────────────────────────────────────────────────────
INSERT INTO `addresses` (`user_id`, `label`, `full_name`, `phone`, `address_line1`, `address_line2`, `city`, `state`, `zip`, `country`, `governorate_id`, `is_default`)
SELECT 2, 'Home', 'Ahmed Ben Salem', '+21698765432', '15 Rue de la Liberté', NULL, 'Tunis', NULL, '1000', 'TN', 1, 1
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `addresses` WHERE `user_id` = 2 AND `address_line1` = '15 Rue de la Liberté' AND `city` = 'Tunis');

-- ── Orders ──────────────────────────────────────────────────────────────────
INSERT IGNORE INTO `orders` (`id`, `user_id`, `order_number`, `status`, `total`, `subtotal`, `shipping_fee`, `shipping_name`, `shipping_phone`, `shipping_address`, `billing_address`, `governorate_id`, `payment_method`, `payment_status`, `phone`, `created_at`) VALUES
(1, 2, 'ORD-20260301-A1B2C3', 'pending', 81.800, 77.800, 4.000, 'Ahmed Ben Salem', '+21698765432', 'Ahmed Ben Salem, 15 Rue de la Liberté, Tunis', 'Ahmed Ben Salem, 15 Rue de la Liberté, Tunis', 1, 'cod', 'pending', '+21698765432', '2026-03-01 10:30:00'),
(2, 2, 'ORD-20260220-D4E5F6', 'delivered', 53.500, 49.500, 4.000, 'Ahmed Ben Salem', '+21698765432', 'Ahmed Ben Salem, 15 Rue de la Liberté, Tunis', 'Ahmed Ben Salem, 15 Rue de la Liberté, Tunis', 1, 'cod', 'paid', '+21698765432', '2026-02-20 14:15:00');

-- ── Order Items ─────────────────────────────────────────────────────────────
INSERT INTO `order_items` (`order_id`, `product_id`, `product_name`, `product_price`, `quantity`, `subtotal`)
SELECT 1, 1, 'Crème Hydratante à l''Huile d''Argan', 29.900, 2, 59.800
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `order_items` WHERE `order_id` = 1 AND `product_id` = 1);

INSERT INTO `order_items` (`order_id`, `product_id`, `product_name`, `product_price`, `quantity`, `subtotal`)
SELECT 1, 5, 'Huile de Ricin Biologique', 18.000, 1, 18.000
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `order_items` WHERE `order_id` = 1 AND `product_id` = 5);

INSERT INTO `order_items` (`order_id`, `product_id`, `product_name`, `product_price`, `quantity`, `subtotal`)
SELECT 2, 2, 'Sérum Anti-âge à la Rose de Damas', 49.500, 1, 49.500
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `order_items` WHERE `order_id` = 2 AND `product_id` = 2);

-- ── Order Status History ────────────────────────────────────────────────────
INSERT INTO `order_status_history` (`order_id`, `from_status`, `to_status`, `note`, `created_by`, `created_at`)
SELECT 1, NULL, 'pending', 'Commande placée', 2, '2026-03-01 10:30:00'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `order_status_history` WHERE `order_id` = 1 AND `to_status` = 'pending' AND `from_status` IS NULL);

INSERT INTO `order_status_history` (`order_id`, `from_status`, `to_status`, `note`, `created_by`, `created_at`)
SELECT 2, NULL, 'pending', 'Commande placée', 2, '2026-02-20 14:15:00'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `order_status_history` WHERE `order_id` = 2 AND `to_status` = 'pending' AND `from_status` IS NULL);

INSERT INTO `order_status_history` (`order_id`, `from_status`, `to_status`, `note`, `created_by`, `created_at`)
SELECT 2, 'pending', 'confirmed', 'Paiement confirmé', 1, '2026-02-20 16:00:00'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `order_status_history` WHERE `order_id` = 2 AND `from_status` = 'pending' AND `to_status` = 'confirmed');

INSERT INTO `order_status_history` (`order_id`, `from_status`, `to_status`, `note`, `created_by`, `created_at`)
SELECT 2, 'confirmed', 'processing', 'Préparation en cours', 1, '2026-02-21 09:00:00'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `order_status_history` WHERE `order_id` = 2 AND `from_status` = 'confirmed' AND `to_status` = 'processing');

INSERT INTO `order_status_history` (`order_id`, `from_status`, `to_status`, `note`, `created_by`, `created_at`)
SELECT 2, 'processing', 'shipped', 'Expédié via Tunisian Express — suivi: TNX-987654', 1, '2026-02-22 11:00:00'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `order_status_history` WHERE `order_id` = 2 AND `from_status` = 'processing' AND `to_status` = 'shipped');

INSERT INTO `order_status_history` (`order_id`, `from_status`, `to_status`, `note`, `created_by`, `created_at`)
SELECT 2, 'shipped', 'delivered', 'Livré avec succès — signé par le client', 1, '2026-02-24 14:30:00'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `order_status_history` WHERE `order_id` = 2 AND `from_status` = 'shipped' AND `to_status` = 'delivered');

-- ── Reviews ─────────────────────────────────────────────────────────────────
INSERT INTO `reviews` (`product_id`, `user_id`, `rating`, `comment`, `status`, `created_at`)
SELECT 1, 2, 5, 'Excellente crème ! Ma peau est toute douce et sent merveilleusement bon. Le produit est arrivé rapidement et bien emballé.', 'approved', '2026-03-05 09:00:00'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `reviews` WHERE `product_id` = 1 AND `user_id` = 2 AND `comment` LIKE 'Excellente crème%');

INSERT INTO `reviews` (`product_id`, `user_id`, `rating`, `comment`, `status`, `created_at`)
SELECT 3, 2, 4, 'Bonne huile corporelle, le parfum tient toute la journée. La texture est agréable et non collante. Je recommande.', 'pending', '2026-03-08 14:00:00'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `reviews` WHERE `product_id` = 3 AND `user_id` = 2 AND `comment` LIKE 'Bonne huile corporelle%');

COMMIT;
