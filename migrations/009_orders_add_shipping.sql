ALTER TABLE orders ADD COLUMN governorate_id INT DEFAULT NULL AFTER shipping_address;
ALTER TABLE orders ADD COLUMN shipping_fee DECIMAL(10,3) NOT NULL DEFAULT 0.000 AFTER total;
ALTER TABLE orders ADD COLUMN delivery_notes TEXT DEFAULT NULL AFTER shipping_fee;
ALTER TABLE orders ADD COLUMN phone VARCHAR(20) DEFAULT NULL AFTER delivery_notes;
ALTER TABLE orders ADD FOREIGN KEY (governorate_id) REFERENCES governorates(id) ON DELETE SET NULL;
