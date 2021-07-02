-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2021 at 09:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stop_time`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nombre`, `descripcion`, `imagen`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Pasteles', 'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera', NULL, '1', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(2, 'Bebestibles', 'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera', NULL, '1', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(3, 'Tortas', 'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera', NULL, '1', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(4, 'EstadoCero', 'Es un test pra verificar si se ve un producto con estado 0', NULL, '0', '2021-07-02 23:24:10', '2021-07-02 23:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `complements`
--

CREATE TABLE `complements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complements`
--

INSERT INTO `complements` (`id`, `nombre`, `stock`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Mermelada', 10, 'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(2, 'Frutilla', 30, 'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(3, 'Mora', 3, 'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(4, 'Canela', 5, 'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(5, 'Palta', 50, 'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera', '2021-07-02 23:24:10', '2021-07-02 23:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `in_shopping_carts`
--

CREATE TABLE `in_shopping_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopping_cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `crema` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `azucar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `servir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complements` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_27_042001_create_categories_table', 1),
(5, '2021_06_27_042002_create_products_table', 1),
(6, '2021_06_27_043646_shoping_cart', 1),
(7, '2021_06_27_043650_create_in_shopping_carts_table', 1),
(8, '2021_06_27_044000_create_orders_table', 1),
(9, '2021_06_28_043648_create_permission_tables', 1),
(10, '2021_06_28_154557_create_complements_table', 1),
(11, '2021_06_28_212826_create_products_complements_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopping_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `line1` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line2` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'creado',
  `guide_number` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` decimal(11,2) NOT NULL,
  `pagado` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'products.index', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(2, 'opciones.index', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(3, 'users.index', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(4, 'users.show', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(5, 'users.edit', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(6, 'users.update', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(7, 'users.destroy', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(8, 'roles.index', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(9, 'roles.show', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(10, 'roles.edit', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(11, 'roles.update', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(12, 'roles.create', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(13, 'roles.store', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(14, 'roles.destroy', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(15, 'warehouse.category.index', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(16, 'warehouse.category.show', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(17, 'warehouse.category.edit', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(18, 'warehouse.category.update', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(19, 'warehouse.category.create', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(20, 'warehouse.category.store', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(21, 'warehouse.category.destroy', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(22, 'warehouse.product.index', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(23, 'warehouse.product.show', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(24, 'warehouse.product.edit', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(25, 'warehouse.product.update', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(26, 'warehouse.product.create', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(27, 'warehouse.product.store', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(28, 'warehouse.product.destroy', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(29, 'warehouse.complement.index', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(30, 'warehouse.complement.show', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(31, 'warehouse.complement.edit', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(32, 'warehouse.complement.update', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(33, 'warehouse.complement.create', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(34, 'warehouse.complement.store', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(35, 'warehouse.complement.destroy', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(36, 'orders.show', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(37, 'orders.edit', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(38, 'orders.create', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(39, 'orders.destroy', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(40, 'ordersDay.index', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_category` bigint(20) UNSIGNED DEFAULT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `precio` int(11) NOT NULL,
  `cant_complements` int(11) NOT NULL DEFAULT 1,
  `crema` int(11) NOT NULL DEFAULT 0,
  `azucar` int(11) NOT NULL DEFAULT 0,
  `descripcion` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_complements`
--

CREATE TABLE `products_complements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `complement_id` bigint(20) UNSIGNED NOT NULL,
  `cant_porcion` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(2, 'Guest', 'web', '2021-07-02 23:24:10', '2021-07-02 23:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customid` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_reserva` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sebastian Cornejo', 'seba@seba.cl', NULL, '$2y$10$mkFTEqONgNZS1.whA0b7uOG7sz4oeS7vbU.GadX6eu3PheR41Yv3C', NULL, '2021-07-02 23:24:10', '2021-07-02 23:24:10'),
(2, 'Admin', 'admin@admin.cl', NULL, '$2y$10$N49El.5Wh9wYAToQHBv1QOsrVzJibzbaQpZJ1gJ2g.fS311JhOeEK', NULL, '2021-07-02 23:24:10', '2021-07-02 23:24:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complements`
--
ALTER TABLE `complements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `in_shopping_carts`
--
ALTER TABLE `in_shopping_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `in_shopping_carts_ibfk_1` (`shopping_cart_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`shopping_id`),
  ADD KEY `orders_ibfk_2` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`id_category`);

--
-- Indexes for table `products_complements`
--
ALTER TABLE `products_complements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_complements_ibfk_1` (`product_id`),
  ADD KEY `products_complements_ibfk_2` (`complement_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customid` (`customid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complements`
--
ALTER TABLE `complements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `in_shopping_carts`
--
ALTER TABLE `in_shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_complements`
--
ALTER TABLE `products_complements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `in_shopping_carts`
--
ALTER TABLE `in_shopping_carts`
  ADD CONSTRAINT `in_shopping_carts_ibfk_1` FOREIGN KEY (`shopping_cart_id`) REFERENCES `shopping_carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`shopping_id`) REFERENCES `shopping_carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products_complements`
--
ALTER TABLE `products_complements`
  ADD CONSTRAINT `products_complements_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_complements_ibfk_2` FOREIGN KEY (`complement_id`) REFERENCES `complements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
