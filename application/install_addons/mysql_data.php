<?php
$db_querydata ="
CREATE TABLE `vmcs_logs` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `vmcs_news` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `vmcs_pages` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` int(1) DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `vmcs_purchases` (
  `id` int(11) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `service` int(11) NOT NULL,
  `server` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `profit` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `vmcs_servers` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `query_port` int(11) NOT NULL,
  `rcon_port` int(11) NOT NULL,
  `rcon_pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `vmcs_services` (
  `id` int(11) NOT NULL,
  `server` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `sms_channel` varchar(64) DEFAULT NULL,
  `sms_channel_id` int(11) DEFAULT NULL,
  `sms_number` int(11) DEFAULT NULL,
  `paypal_cost` int(11) DEFAULT NULL,
  `commands` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `vmcs_users` (
  `id` int(11) NOT NULL,
  `name` varchar(36) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` text,
  `lastIP` varchar(36) DEFAULT NULL,
  `lastLogin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `vmcs_users` (`id`, `name`, `password`, `avatar`, `lastIP`, `lastLogin`) VALUES
(1, 'Admin', '$2a$06$4PH7hx5AX23KclP.ndkzKeF7xehEVYLMeMYtoMdEX.85s5oQEZSaC', 'https://vmcshop.pro/assets/images/avatars/default-avatar.png', '127.0.0.1', '1502732862');
CREATE TABLE `vmcs_vouchers` (
  `id` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `vmcs_logs`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `vmcs_news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_id_uindex` (`id`);
ALTER TABLE `vmcs_pages`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `vmcs_purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchases_id_uindex` (`id`);
ALTER TABLE `vmcs_servers`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `vmcs_services`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `vmcs_users`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `vmcs_vouchers`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `vmcs_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `vmcs_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `vmcs_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `vmcs_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `vmcs_servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `vmcs_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `vmcs_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `vmcs_vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;
";
