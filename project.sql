-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 07, 2014 at 05:49 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jeremy Nixon', 'jnixon2@gmail.com', '$2y$10$gsb7Pw7AxJObQw4BGLmUU./ll/2TKgDz4wAvjw9Boa2pFjKrtrX8K', 0, '2014-12-06 11:24:01', '2014-12-06 11:24:01'),
(2, 'Jeremy', 'jeremy@gmail.com', '$2y$10$x0DeGr9fYmQLj0xZhNW/MOJ4i2FVRO8gUyT6NC/58zC7c/1gHwCOS', 0, '2014-12-07 21:30:03', '2014-12-07 21:30:11'),
(3, 'Jeremy', 'jer@gmail.com', '$2y$10$y3y5459WTr22/4cNrRse4umg8jMJSaj6.FZTzK8V11s4hoptc3MfS', 9, '2014-12-07 21:33:50', '2014-12-07 21:42:15'),
(7, 'Jeremy', 'je3r@gmail.com', '$2y$10$gjICt33DpNO2YE9edGadxOSsMAV8KsJmTWxD32FVD23JwwwKaglHe', 0, '2014-12-07 21:44:39', '2014-12-07 21:44:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;