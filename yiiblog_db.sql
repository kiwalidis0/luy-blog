-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 02:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yiiblog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `url` varchar(128) DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `content`, `status`, `create_time`, `author`, `email`, `url`, `post_id`) VALUES
(50, 'Thanks for this!!!!', 2, NULL, 'demo', 'webmaster@example.com', NULL, 50),
(51, 'Wow, it worked for me!!', 2, NULL, 'demo', 'webmaster@example.com', NULL, 49);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup`
--

CREATE TABLE `tbl_lookup` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_lookup`
--

INSERT INTO `tbl_lookup` (`id`, `name`, `code`, `type`, `position`) VALUES
(1, 'Draft', 1, 'PostStatus', 1),
(2, 'Published', 2, 'PostStatus', 2),
(3, 'Archived', 3, 'PostStatus', 3),
(4, 'Pending Approval', 1, 'CommentStatus', 1),
(5, 'Approved', 2, 'CommentStatus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `tags` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `comment_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `content`, `tags`, `status`, `create_time`, `update_time`, `author_id`, `comment_count`) VALUES
(39, '5 Must-Have Art Supplies for Beginners', 'Starting your artistic journey? Having the right tools can make all the difference. In this post, we’ll cover five essential art supplies every beginner should have. From sketchbooks to paints, these budget-friendly items will help you create stunning artworks without overspending.', 'beginner, art supplies, essentials', 2, 1742516881, 1742516881, 1, 0),
(40, 'How to Choose the Right Paint for Your Artwork', 'Not all paints are the same! Whether you’re working with acrylics, oils, or watercolors, choosing the right paint can greatly affect your final piece. This guide will break down the differences and help you decide which one suits your art style best.', 'painting, art materials, guide', 2, 1742516898, 1742516898, 1, 0),
(41, '10 Affordable Alternatives to Expensive Art Brands', 'Professional-grade art supplies can be costly, but there are plenty of budget-friendly options that deliver similar results. We list ten affordable alternatives to high-end brands, so you can create amazing artwork without overspending.', 'budget, art supplies, affordable alternatives', 2, 1742516913, 1742516913, 1, 0),
(42, 'Understanding Color Theory: A Beginner’s Guide', 'Ever wondered why some color combinations work better than others? This beginner-friendly guide to color theory will help you understand the basics of complementary colors, contrast, and harmony in your art.', 'color theory, beginner, painting', 2, 1742516929, 1742516929, 1, 0),
(43, 'How to Sell Your Art Online: A Step-by-Step Guide', 'Turning your passion into profit is easier than ever with the rise of online marketplaces and social media. However, selling art successfully requires more than just posting your work online.\r\n\r\nIn this guide, we’ll walk you through setting up an online store, pricing your artwork, marketing your brand, and choosing the best platforms for selling. Whether you prefer Etsy, Instagram, or a personal website, we’ll help you find the best approach to attract buyers and grow your art business.', 'art business, online selling, marketing', 2, 1742516947, 1742516982, 1, 0),
(44, 'Drawing Exercises to Improve Your Skills', 'Like any skill, drawing improves with consistent practice. If you’re looking to enhance your technique, here are five simple yet effective exercises to help refine your lines, shading, and proportions.\r\n\r\nFrom gesture drawing to blind contour exercises, these practices will strengthen your observation skills and hand-eye coordination. Whether you’re a beginner or an experienced artist, incorporating these exercises into your routine will lead to noticeable improvements over time.', 'drawing, practice, improvement', 2, 1742517011, 1742517011, 1, 0),
(45, 'The Best Digital Art Apps for Beginners in 2025', 'Digital art has opened up new possibilities for artists, making it easier to experiment and create without traditional materials. But with so many apps available, which one should you choose as a beginner?\r\n\r\nIn this post, we review the best digital art apps for 2025, focusing on features, ease of use, and affordability. Whether you’re using Procreate, Clip Studio Paint, or Krita, we’ll help you find the perfect software for your needs.', 'digital art, apps, beginner friendly', 2, 1742517075, 1742517075, 1, 0),
(46, 'Traditional vs. Digital Art: Which One Should You Choose?', 'Traditional and digital art each have their unique strengths and challenges. While traditional mediums like oil and watercolor offer a hands-on experience and organic textures, digital art provides flexibility and limitless possibilities.\r\n\r\nIn this post, we compare the pros and cons of both mediums, helping you decide which one aligns with your creative goals and workflow.', 'traditional art, digital art, comparison', 2, 1742517091, 1742517091, 1, 0),
(47, '5 Inspiring Art Styles to Experiment With', 'Looking for a fresh approach to your artwork? Experimenting with different art styles can help you discover new techniques and push your creativity further.\r\n\r\nFrom impressionism to surrealism, we highlight five inspiring styles that can add diversity to your portfolio and expand your artistic skills.', 'art styles, creativity, inspiration', 2, 1742517105, 1742517105, 1, 0),
(48, 'The Importance of Sketching: Why Every Artist Should Do It', 'Sketching isn’t just for beginners—it’s a vital practice that helps artists of all levels improve their skills. Regular sketching enhances observation, refines technique, and sparks creativity.\r\n\r\nIn this post, we explore the benefits of daily sketching and suggest simple exercises to help you get started.', 'sketching, practice, fundamentals', 2, 1742517120, 1742517120, 1, 0),
(49, 'How to Overcome Art Block: 7 Proven Tips', 'Every artist faces art block at some point. Whether it’s lack of inspiration or self-doubt, it can be frustrating. Fortunately, there are ways to overcome it.\r\n\r\nIn this post, we share seven practical strategies to reignite your creativity and get back into the flow of making art.', 'art block, creativity, motivation', 2, 1742517138, 1742517138, 1, 0),
(50, 'The Best Paper Types for Different Art Mediums', 'Choosing the right paper is crucial for different techniques like watercolor, charcoal, and ink. The texture, weight, and absorbency of paper can affect the final result.\r\n\r\nThis guide will help you understand which paper works best for your preferred medium, ensuring the best possible outcome for your art.', 'paper, art materials, guide', 2, 1742517154, 1742517154, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

CREATE TABLE `tbl_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `frequency` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_tag`
--

INSERT INTO `tbl_tag` (`id`, `name`, `frequency`) VALUES
(32, 'motivation', 1),
(50, 'budget', 1),
(53, 'beginner', 2),
(54, 'art supplies', 2),
(55, 'essentials', 1),
(56, 'painting', 2),
(57, 'art materials', 2),
(58, 'guide', 2),
(59, 'affordable alternatives', 1),
(60, 'color theory', 1),
(61, 'art business', 1),
(62, 'online selling', 1),
(63, 'marketing', 1),
(64, 'drawing', 1),
(65, 'practice', 2),
(66, 'improvement', 1),
(67, 'digital art', 2),
(68, 'apps', 1),
(69, 'beginner friendly', 1),
(70, 'traditional art', 1),
(71, 'comparison', 1),
(72, 'art styles', 1),
(73, 'creativity', 2),
(74, 'inspiration', 1),
(75, 'sketching', 1),
(76, 'fundamentals', 1),
(77, 'art block', 1),
(78, 'paper', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `profile` text DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `profile`, `role`) VALUES
(1, 'demo', '$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC', 'webmaster@example.com', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_post` (`post_id`);

--
-- Indexes for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_post_author` (`author_id`);

--
-- Indexes for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
