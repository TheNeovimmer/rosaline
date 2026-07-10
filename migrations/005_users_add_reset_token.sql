ALTER TABLE `users`
ADD COLUMN `reset_token` VARCHAR(255) NULL AFTER `role`,
ADD COLUMN `reset_token_expires` DATETIME NULL AFTER `reset_token`;
