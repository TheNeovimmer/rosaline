CREATE TABLE IF NOT EXISTS governorates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_en VARCHAR(100) NOT NULL,
    name_fr VARCHAR(100) NOT NULL,
    shipping_fee DECIMAL(10,3) NOT NULL DEFAULT 0.000,
    region ENUM('north_east','north_west','central_east','central_west','south') NOT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
