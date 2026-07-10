ALTER TABLE addresses ADD COLUMN governorate_id INT DEFAULT NULL AFTER state;
ALTER TABLE addresses ADD FOREIGN KEY (governorate_id) REFERENCES governorates(id) ON DELETE SET NULL;
