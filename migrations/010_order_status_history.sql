CREATE TABLE IF NOT EXISTS order_status_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    from_status VARCHAR(50) DEFAULT NULL,
    to_status VARCHAR(50) NOT NULL,
    note TEXT DEFAULT NULL,
    created_by INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE orders MODIFY COLUMN status ENUM('pending','confirmed','processing','shipped','delivered','cancelled','return_requested','returned') NOT NULL DEFAULT 'pending';
