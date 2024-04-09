-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2024 at 06:15 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u193265667_mrdbid_p`
--

-- --------------------------------------------------------

--
-- Table structure for table `abundance`
--

CREATE TABLE `abundance` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abundance`
--

INSERT INTO `abundance` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '23', 1, '2024-03-30 14:43:51'),
(2, 'None', '', '', '23', 1, '2024-03-15 06:26:21'),
(3, 'Low', '', '', '23', 1, '2024-03-15 06:28:22'),
(4, 'Moderate', '', '', '23', 1, '2024-03-15 06:28:38'),
(5, 'High', '', '', '23', 1, '2024-03-15 06:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `annulus_position`
--

CREATE TABLE `annulus_position` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `annulus_position`
--

INSERT INTO `annulus_position` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2023-02-21 09:37:26'),
(2, 'Superior', 'Near the cap', '', '7', 1, '2022-07-25 14:37:26'),
(3, 'Apical', 'upper half', '', '7', 1, '2021-11-14 13:33:00'),
(4, 'Median', 'in the middle', '', '7', 1, '2021-11-14 13:33:00'),
(5, 'Inferior', 'Lower half', '', '7', 1, '2021-11-14 13:33:00'),
(6, 'Basal', 'Near the base', '', '7', 1, '2021-11-14 13:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `bulb_type`
--

CREATE TABLE `bulb_type` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulb_type`
--

INSERT INTO `bulb_type` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 15:00:00'),
(2, 'Napiform (turnip)', '', '', '5', 1, '2024-03-01 15:00:00'),
(3, 'Saccate', '', '', '5', 1, '2024-03-01 15:00:00'),
(4, 'Sheathing', '', '', '5', 1, '2024-03-01 15:00:00'),
(5, 'Collar', '', '', '5', 1, '2024-03-01 15:00:00'),
(6, 'Granular', '', '', '5', 1, '2024-03-01 15:00:00'),
(7, 'Concentric rings or scales', '', '', '5', 1, '2024-03-01 15:00:00'),
(8, 'Friable, disappearing', '', '', '5', 1, '2024-03-01 15:00:00'),
(9, 'Fusiform', '', '', '5', 1, '2024-03-01 15:00:00'),
(10, 'Marginate-depressed', '', '', '5', 1, '2024-03-01 15:00:00'),
(11, 'Cleft', '', '', '5', 1, '2024-03-01 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cap_context_flesh_texture`
--

CREATE TABLE `cap_context_flesh_texture` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` int NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cap_context_flesh_texture`
--

INSERT INTO `cap_context_flesh_texture` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', 5, 2, '2023-03-23 17:22:58'),
(2, 'Soft', '', '', 5, 2, '2023-03-23 17:22:58'),
(3, 'Spongy', '', '', 5, 2, '2023-03-23 17:23:19'),
(4, 'Firm', '', '', 5, 2, '2023-03-23 17:23:39'),
(5, 'Compact', '', '', 5, 2, '2023-03-23 17:24:17'),
(6, 'Rigid', '', '', 5, 2, '2023-03-23 17:25:10'),
(7, 'Brittle', '', '', 5, 2, '2023-03-23 17:25:39'),
(8, 'Corky', '', '', 5, 2, '2023-03-23 17:26:01'),
(9, 'Other', '', '', 5, 2, '2023-03-23 17:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `cap_margin_shape`
--

CREATE TABLE `cap_margin_shape` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cap_margin_shape`
--

INSERT INTO `cap_margin_shape` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2023-02-21 09:37:26'),
(2, 'Straight', 'The margins remain uniform and do not curve.', 'edited 3-8-2023', '7', 2, '2023-03-08 07:02:40'),
(3, 'Decurved', 'The margins curve slightly downwards.', '', '7', 1, '2021-11-14 13:33:00'),
(4, 'Incurved', 'The margins curve down and inwards.', '', '7', 1, '2021-11-14 13:33:00'),
(5, 'Involute', 'The margins curve downwards and roll inwards. Also known as inrolled.', '', '7', 1, '2021-11-14 13:33:00'),
(6, 'Arched', 'The margins curve upwards between the edge and stipe (stem).', '', '7', 1, '2021-11-14 13:33:00'),
(7, 'Uplifted', 'The margins curve upwards. Also known as elevated.', '', '7', 1, '2021-11-14 13:33:00'),
(8, 'Revolute', 'The margins curve inwards and also rolled back..', '', '7', 1, '2021-11-14 13:33:00'),
(9, 'Exceeding', 'The margins extend past the gills.', '', '7', 1, '2021-11-14 13:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `cap_margin_type`
--

CREATE TABLE `cap_margin_type` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cap_margin_type`
--

INSERT INTO `cap_margin_type` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2023-02-21 09:37:26'),
(2, 'Entire', 'There is a smooth transition from the top of the cap to its underside. No irregular attributes should be present on the edges. Also referred to as Smooth, Even, Seamless, Flush, or Regular.', '', '7', 1, '2021-11-14 13:33:00'),
(3, 'Appendiculate', 'Remnants of a partial veil hang from the edge of the cap.', '', '7', 1, '2021-11-14 13:33:00'),
(4, 'Striate', 'Fine and narrow stripes run parallel on the cap margins. The lines will often coincide with the gills underneath the cap. In some cases, the lines are only visible when the cap is wet. Also referred to as striped, furrowed, streaked, ribbed, lined,', '', '7', 1, '2021-11-14 13:33:00'),
(5, 'Sulcate', 'Narrow parallel grooves that line the margins of the cap. Sulcate margins are more defined than striate but less ridged than plicated. Also referred to as plicate-striate.', '', '7', 1, '2021-11-14 13:33:00'),
(6, 'Plicate', 'Parallel pleated margins. They are best described as fan-like or umbrella-like as if the surface of the cap were folded. Plicate margins are more defined and ridged than Striate or Sulcate. Also referred to as pleated or ridged.', '', '7', 1, '2021-11-14 13:33:00'),
(7, 'Eroded', 'Deteriorated, gnawed, or eaten away. The disfigured margins are usually found in older specimens and are the result of insects or deliquescence (common with Ink Caps). Also referred to as gnawed or ragged.', '', '7', 1, '2021-11-14 13:33:00'),
(8, 'Split', 'The edges of the cap are split apart or full of large crevices. Also referred to as cracked or rimose.', '', '7', 1, '2021-11-14 13:33:00'),
(9, 'Lacerate', 'Many tears mark the edge of the cap. Similar to split margins, however, the cuts are smaller and more frequent. Also referred to as torn.', '', '7', 1, '2021-11-14 13:33:00'),
(10, 'Undulating - Hairy', 'Hairy - The edges of the cap form a wave-like pattern as they rise and fall. Also referred to as wavy irregular or festoony.', '', '7', 1, '2021-11-14 13:33:00'),
(11, 'Crenate - Hairy', 'Hairy - Semi-circle notches or round-toothed edges that are more blunted than serrate margins. Also referred to as scalloped.', '', '7', 1, '2021-11-14 13:33:00'),
(12, 'Serrate - Hairy', 'Hairy - The edges of the cap appear jagged and saw-toothed. More pronounced than crenate margins.', '', '7', 1, '2021-11-14 13:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `cap_shape`
--

CREATE TABLE `cap_shape` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` int NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cap_shape`
--

INSERT INTO `cap_shape` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', 7, 1, '2023-02-21 09:37:26'),
(2, 'Convex', 'evenly rounded', '', 5, 1, '2023-04-24 15:33:00'),
(3, 'Convex', 'evenly rounded', '', 5, 1, '2023-04-24 15:33:00'),
(4, 'ovoid', 'egg', '', 5, 1, '2023-04-24 15:33:00'),
(5, 'conic', 'cone', '', 5, 1, '2023-04-24 15:33:00'),
(6, 'campanulate', 'bell-shaped.', 'vv', 5, 1, '2023-04-24 15:33:00'),
(7, 'parabolic', 'half-egg', '', 5, 1, '2023-04-24 15:33:00'),
(8, 'pulvinate', 'cushion', '', 5, 1, '2023-04-24 15:33:00'),
(9, 'cylindric', 'bullet', '', 5, 1, '2023-04-24 15:33:00'),
(10, 'plane', 'flat', '', 5, 1, '2023-04-24 15:33:00'),
(11, 'conchate', 'sea-shell', '', 5, 1, '2023-04-24 15:33:00'),
(12, 'umbonate', 'w/bump', '', 5, 1, '2023-04-24 15:33:00'),
(13, 'cuspidate', 'Umbonate with a pointy conical apex; Witch-hat shaped. also known as eye-tooth.', '', 5, 1, '2023-04-24 15:33:00'),
(14, 'papillate', 'w/nipple', '', 5, 1, '2023-04-24 15:33:00'),
(15, 'depressed', 'Saucer-shaped; The center is lower than the cap margin.', '', 5, 1, '2023-04-24 15:33:00'),
(16, 'umbilicate', 'a navel-like depression in the center.', '', 5, 1, '2023-04-24 15:33:00'),
(17, 'infundibuliform', 'funnel-shaped', '', 5, 1, '2023-04-24 15:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `cap_shape_top_view`
--

CREATE TABLE `cap_shape_top_view` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cap_shape_top_view`
--

INSERT INTO `cap_shape_top_view` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '5', 2, '2023-03-20 15:12:05'),
(2, 'Petaloid', 'petal', '', '5', 2, '2023-03-20 15:12:05'),
(3, 'Spathulate', 'spatula', '', '5', 2, '2023-03-20 15:12:33'),
(4, 'Dimidiate', '1/2 circle', '', '5', 2, '2023-03-20 15:13:14'),
(5, 'Flabelliform', 'fan-shaped', '', '5', 2, '2023-03-20 15:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `cap_surface_dryness`
--

CREATE TABLE `cap_surface_dryness` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cap_surface_dryness`
--

INSERT INTO `cap_surface_dryness` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '5', 2, '2023-03-23 17:33:32'),
(2, 'dry: Dull', '', '', '5', 2, '2023-03-23 17:33:58'),
(3, 'dry:  Silky', '', '', '5', 2, '2023-03-23 17:34:43'),
(4, 'Moist:  lubricous/greasy', '', '', '5', 2, '2023-03-23 17:35:28'),
(5, 'Moist: Viscid/sticky/tacky', '', '', '5', 2, '2023-03-23 17:36:13'),
(6, 'Moist: Glutinous (slimy)', '', '', '5', 2, '2023-03-23 17:36:50'),
(7, 'dry: Shiny', '', '', '5', 2, '2023-03-23 17:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `cap_surface_texture`
--

CREATE TABLE `cap_surface_texture` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cap_surface_texture`
--

INSERT INTO `cap_surface_texture` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2023-02-21 09:37:26'),
(2, 'Smooth', 'No defining features found on the surface.', '', '7', 1, '2021-11-14 13:33:00'),
(3, 'Uneven', 'A bumpy surface.', '', '7', 1, '2021-11-14 13:33:00'),
(4, 'Rugose', 'A wrinkled or rough surface.', '', '7', 1, '2021-11-14 13:33:00'),
(5, 'Rugulose', 'A slightly wrinkled surface.', '', '7', 1, '2021-11-14 13:33:00'),
(6, 'Rivulose', 'A thinly wrinkled surface of branching wavy or crooked lines.', '', '7', 1, '2021-11-14 13:33:00'),
(7, 'Scrobiculate', 'A pitted or furrowed surface.', '', '7', 1, '2021-11-14 13:33:00'),
(8, 'Warty', 'Remnants of the universal veil remain on the surface in small patches.', '', '7', 1, '2021-11-14 13:33:00'),
(9, 'Virgate', 'A streaked surface.', '', '7', 1, '2021-11-14 13:33:00'),
(10, 'Hygrophanous', 'A surface that is transparent when wet and opaque when dry.', '', '7', 1, '2021-11-14 13:33:00'),
(11, 'Sericeous', 'A silky surface.', '', '7', 1, '2021-11-14 13:33:00'),
(12, 'Fibrillose', 'A surface covered in thread-like filaments.', '', '7', 1, '2021-11-14 13:33:00'),
(13, 'Squamose', 'A surface covered with scales.', '', '7', 1, '2021-11-14 13:33:00'),
(14, 'Squarrose', 'A ragged surface covered with small scales.', '', '7', 1, '2021-11-14 13:33:00'),
(15, 'Pruinose', 'A surface covered with a white powdery frostlike substance.', '', '7', 1, '2021-11-14 13:33:00'),
(16, 'Pulverulent', 'A surface covered with fine dust or powder.', '', '7', 1, '2021-11-14 13:33:00'),
(17, 'Granulose', 'A surface covered in salt-like granulates.', '', '7', 1, '2021-11-14 13:33:00'),
(18, 'Furfuraceous', 'A surface covered in flaky bran-like particles; dandruff-like.', '', '7', 1, '2021-11-14 13:33:00'),
(19, 'Zonate', 'A surface containing zones or bands that are distinguished by texture or color.', '', '7', 1, '2021-11-14 13:33:00'),
(20, 'Areolate', 'A cracked surface resembling dried-mud or paint.', '', '7', 1, '2021-11-14 13:33:00'),
(21, 'Rimose', 'A surface covered in cracks and crevices.', '', '7', 1, '2021-11-14 13:33:00'),
(22, 'Laccate', 'A waxy or lacquered surface texture.', '', '7', 1, '2021-11-14 13:33:00'),
(23, 'Viscid -', 'A sticky glue-like surface texture.', '', '7', 1, '2021-11-14 13:33:00'),
(24, 'Glutinous', 'A slimy surface.', '', '7', 1, '2021-11-14 13:33:00'),
(25, 'Glabrous - Hairy', 'Hairy - a bald surface.', '', '7', 1, '2021-11-14 13:33:00'),
(26, 'Velvety - Hairy', 'Hairy - A surface covered with very fine and soft hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(27, 'Pubescent - Hairy', 'Hairy - A surface cover with fuzz or fine hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(28, 'Canescent - Hairy', 'Hairy - A surface covered in dense white or gray down-like hairs. Giving a frosted appearance.', '', '7', 1, '2021-11-14 13:33:00'),
(29, 'Floccose - Hairy', 'Hairy - A surface covered in Wooly or cotton-like hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(30, 'Tomentose - Hairy', 'Hairy - A surface covered densely with matted hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(31, 'Hispid - Hairy', 'Hairy - A surface covered with straight bristle-like hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(32, 'Hirsute - Hairy', 'Hairy - A surface covered with slightly stiff and shaggy hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(33, 'Villose - Hairy', 'Hairy - A surface covered with long soft hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(34, 'Strigose - Hairy', 'Hairy - A surface covered with long bristle-like hairs.', '', '7', 1, '2021-11-14 13:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int NOT NULL,
  `name` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_options` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `look_up_y_n` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `part` mediumint NOT NULL COMMENT 'from parts lookup table',
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `name`, `display_options`, `look_up_y_n`, `part`, `entered_by`, `date_entered`) VALUES
(1, 'id', '4', '0', 2, 1, '2024-03-10 19:15:00'),
(3, 'specimen_age', '9', '1', 16, 1, '2024-03-10 19:15:00'),
(4, 'odor', '9', '1', 16, 1, '2024-03-10 19:15:00'),
(5, 'taste', '9', '1', 16, 1, '2024-03-10 19:15:00'),
(6, 'toxic', '9', '1', 16, 1, '2024-03-10 19:15:00'),
(7, 'habit', '9', '1', 11, 1, '2024-03-10 19:15:00'),
(8, 'cap_width', '2', '0', 3, 1, '2024-03-10 19:15:00'),
(9, 'cap_height', '2', '0', 3, 1, '2024-03-10 19:15:00'),
(10, 'cap_shape', '9', '1', 3, 1, '2024-03-10 19:15:00'),
(11, 'cap_shape_top_view', '9', '1', 3, 1, '2024-03-10 19:15:00'),
(12, 'cap_color', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(13, 'cap_color_disc', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(14, 'cap_color_margin', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(15, 'cap_color_background', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(16, 'cap_color_fibrils', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(17, 'cap_color_bruised', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(18, 'cap_color_wet', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(19, 'cap_color_dry', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(20, 'cap_surface_dryness', '9', '1', 3, 1, '2024-03-10 19:15:00'),
(21, 'cap_surface_texture', '9', '1', 3, 1, '2024-03-10 19:15:00'),
(22, 'cap_margin_shape', '9', '1', 3, 1, '2024-03-10 19:15:00'),
(23, 'cap_margin_type', '9', '1', 3, 1, '2024-03-10 19:15:00'),
(24, 'cap_hairy_y_n', '9', '0', 3, 1, '2024-03-10 19:15:00'),
(25, 'cap_context_flesh_color_moist', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(26, 'cap_context_flesh_color_dry', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(27, 'cap_context_flesh_color_cuticle', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(28, 'cap_context_flesh_thickness_disc', '2', '0', 3, 1, '2024-03-10 19:15:00'),
(29, 'cap_context_flesh_thickness_margin', '2', '0', 3, 1, '2024-03-10 19:15:00'),
(30, 'cap_context_flesh_texture', '9', '1', 3, 1, '2024-03-10 19:15:00'),
(31, 'cap_context_flesh_latex_color', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(32, 'cap_context_flesh_latex_color_exposed', '6', '1', 3, 1, '2024-03-10 19:15:00'),
(33, 'cap_context_flesh_latex_taste', '7', '1', 3, 1, '2024-03-10 19:15:00'),
(34, 'cap_context_flesh_latex_abundance', '9', '0', 3, 1, '2024-03-10 19:15:00'),
(35, 'gill_attachment', '9', '1', 4, 1, '2024-03-10 19:15:00'),
(36, 'gill_breadth', '2', '1', 4, 1, '2024-03-10 19:15:00'),
(37, 'gill_thickness', '2', '1', 4, 1, '2024-03-10 19:15:00'),
(38, 'gill_spacing', '9', '1', 4, 1, '2024-03-10 19:15:00'),
(39, 'gill_color_young', '6', '1', 4, 1, '2024-03-10 19:15:00'),
(40, 'gill_color_mature', '6', '1', 4, 1, '2024-03-10 19:15:00'),
(41, 'gill_edges', '9', '1', 4, 1, '2024-03-10 19:15:00'),
(42, 'gill_misc_waxy_y_n', '9', '0', 4, 1, '2024-03-10 19:15:00'),
(43, 'gill_misc_arid_dry_y_n', '9', '0', 4, 1, '2024-03-10 19:15:00'),
(44, 'gill_misc_deliquescent_y_n', '9', '0', 4, 1, '2024-03-10 19:15:00'),
(45, 'stem_location', '9', '1', 5, 1, '2024-03-10 19:15:00'),
(46, 'stem_height', '2', '0', 5, 1, '2024-03-10 19:15:00'),
(47, 'stem_diameter_top', '2', '0', 5, 1, '2024-03-10 19:15:00'),
(48, 'stem_diameter_mid', '2', '0', 5, 1, '2024-03-10 19:15:00'),
(49, 'stem_diameter_low', '2', '0', 5, 1, '2024-03-10 19:15:00'),
(50, 'stem_shape', '9', '1', 5, 1, '2024-03-10 19:15:00'),
(51, 'stem_color', '6', '1', 5, 1, '2024-03-10 19:15:00'),
(52, 'stem_color_change', '6', '1', 5, 1, '2024-03-10 19:15:00'),
(53, 'stem_color_base', '6', '1', 5, 1, '2024-03-10 19:15:00'),
(54, 'stem_color_apex', '6', '1', 5, 1, '2024-03-10 19:15:00'),
(55, 'stem_color_interior', '6', '1', 5, 1, '2024-03-10 19:15:00'),
(56, 'stem_color_exterior', '6', '1', 5, 1, '2024-03-10 19:15:00'),
(57, 'stem_color_bruise', '6', '1', 5, 1, '2024-03-10 19:15:00'),
(58, 'stem_surface', '9', '1', 5, 1, '2024-03-10 19:15:00'),
(59, 'stem_texture', '9', '1', 5, 1, '2024-03-10 19:15:00'),
(60, 'stem_interior', '9', '1', 5, 1, '2024-03-10 19:15:00'),
(61, 'partial_inner_veil_annulus_ring_position', '9', '0', 6, 1, '2024-03-10 19:15:00'),
(62, 'veil_annulus', '9', '0', 6, 1, '2024-03-10 19:15:00'),
(63, 'partial_inner_veil_color', '6', '1', 6, 1, '2024-03-10 19:15:00'),
(64, 'partial_inner_veil_texture', '9', '1', 6, 1, '2024-03-10 19:15:00'),
(65, 'partial_inner_veil_fate', '9', '1', 6, 1, '2024-03-10 19:15:00'),
(66, 'partial_inner_veil_annular_ring', '9', '0', 6, 1, '2024-03-10 19:15:00'),
(67, 'partial_inner_veil_appearance', '9', '1', 6, 1, '2024-03-10 19:15:00'),
(68, 'universal_outer_veil_description', '9', '0', 6, 1, '2024-03-10 19:15:00'),
(69, 'universal_outer_veil_volva', '9', '0', 6, 1, '2024-03-10 19:15:00'),
(70, 'bulb_type', '9', '1', 6, 1, '2024-03-10 19:15:00'),
(71, 'mycelium_color', '6', '1', 7, 1, '2024-03-10 19:15:00'),
(72, 'mycelium_texture', '9', '0', 7, 1, '2024-03-10 19:15:00'),
(73, 'spore_color', '6', '1', 8, 1, '2024-03-10 19:15:00'),
(74, 'spore_range_low', '8', '0', 8, 1, '2024-03-10 19:15:00'),
(75, 'spore_range_high', '8', '0', 8, 1, '2024-03-10 19:15:00'),
(76, 'habitat', '9', '1', 11, 1, '2024-03-10 19:15:00'),
(77, 'soil_type', '9', '1', 11, 1, '2024-03-10 19:15:00'),
(78, 'soil_temp', '4', '0', 11, 1, '2024-03-10 19:15:00'),
(79, 'air_temp', '4', '0', 11, 1, '2024-03-10 19:15:00'),
(80, 'plant_association', '9', '1', 11, 1, '2024-03-10 19:15:00'),
(81, 'rhizomorph_color', '6', '1', 12, 1, '2024-03-10 19:15:00'),
(82, 'rhizomorph_texture', '9', '0', 12, 1, '2024-03-10 19:15:00'),
(83, 'chem_reaction', '9', '1', 13, 1, '2024-03-10 19:15:00'),
(84, 'weight_before_dry', '4', '0', 17, 1, '2024-03-10 19:15:00'),
(85, 'weight_after_dry', '4', '0', 17, 1, '2024-03-10 19:15:00'),
(86, 'elevation', '4', '0', 11, 1, '2024-03-10 19:15:00'),
(87, 'soil_ph', '4', '0', 11, 1, '2024-03-10 19:15:00'),
(88, 'stipe_latex_color_exposed', '6', '1', 5, 1, '2024-03-15 06:20:16'),
(89, 'stipe_latex_taste', '7', '1', 5, 1, '2024-03-15 06:21:20'),
(90, 'stipe_latex_abundance', '17', '1', 5, 1, '2024-03-15 06:22:17'),
(91, 'Mycobank_name', '5', '0', 16, 1, '2024-03-16 07:00:06'),
(92, 'inaturalist_num', '5', '0', 16, 1, '2024-03-16 07:00:06'),
(93, 'mushroom_observer_num', '5', '0', 16, 1, '2024-03-16 07:00:06'),
(94, 'location_found_latitude', '5', '0', 15, 1, '2024-03-16 07:00:06'),
(95, 'location_found_longitude', '5', '0', 15, 1, '2024-03-16 19:15:00'),
(96, 'project', '9', '0', 16, 1, '2024-03-10 19:15:00'),
(97, 'microscoped_slides_included', '9', '0', 17, 1, '2024-03-10 19:15:00'),
(98, 'preservation_method', '9', '1', 17, 1, '2024-03-10 19:15:00'),
(99, 'genus', '9', '1', 16, 1, '2024-03-17 06:07:42'),
(100, 'species', '9', '1', 16, 1, '2024-03-17 06:08:12'),
(101, 'annulus_position', '9', '9', 6, 1, '2024-03-22 08:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `chem_reaction`
--

CREATE TABLE `chem_reaction` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chem_reaction`
--

INSERT INTO `chem_reaction` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '23', 23, '2024-03-08 18:48:03'),
(2, 'Ammonia (NH4OH, Ammonium Hydroxide)', '', '', '8', 23, '2024-03-08 18:55:34'),
(3, 'KOH (Potassium Hydroxide) - 3%', '', '', '8', 23, '2024-03-08 19:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int NOT NULL,
  `latin_name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'From AMS Latin Color Chart\r\n',
  `common_name` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'From rgbcolorcode.com/color/converter',
  `color_group` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hex` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence` int NOT NULL COMMENT 'sequence light to dark - similar alike?',
  `r_val` smallint NOT NULL COMMENT 'from my processing',
  `g_val` smallint NOT NULL COMMENT 'from my processing',
  `b_val` smallint NOT NULL COMMENT 'from my processing',
  `closest_websafe_color` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'fromrgbcolorcode.com/color/converter',
  `cwc_r` int NOT NULL COMMENT 'r value for CWC',
  `cwc_g` int NOT NULL COMMENT 'g value for CWC\r\n',
  `cwc_b` int NOT NULL COMMENT 'b value for CWC',
  `image_file` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='AMS Latin Color Chart';

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `latin_name`, `common_name`, `color_group`, `hex`, `sequence`, `r_val`, `g_val`, `b_val`, `closest_websafe_color`, `cwc_r`, `cwc_g`, `cwc_b`, `image_file`) VALUES
(0, 'Not Entered', 'Not Entered', NULL, NULL, 0, 1, 1, 1, 'None', 0, 0, 0, ''),
(1, 'Albus', 'White', '1', 'FFFFFF', 1, 255, 255, 255, 'White', 255, 255, 255, '../images/AMS_colors/colors/color_1.jpg'),
(2, 'Griseus', 'Grullo', '50', 'A9A292', 53, 169, 162, 146, 'Manatee', 0, 0, 0, '../images/AMS_colors/colors/color_2.jpg'),
(3, 'Murinus', 'Shadow', '50', '857C6B', 55, 133, 124, 107, 'Copper Rose', 0, 0, 0, '../images/AMS_colors/colors/color_3.jpg'),
(4, 'Ater', 'Dark Lava', '50', '4B4435', 57, 75, 68, 53, 'Olive Drab', 0, 0, 0, '../images/AMS_colors/colors/color_4.jpg'),
(5, 'Niger', 'Black', '99', '000000', 99, 0, 0, 0, 'Black', 0, 0, 0, '../images/AMS_colors/colors/color_5.jpg'),
(6, 'Fumosus', 'Pastel Brown', '50', '7E6455', 56, 126, 100, 85, 'Dim Gray', 0, 0, 0, '../images/AMS_colors/colors/color_6.jpg'),
(7, 'Avellaneus', 'Cafe au lait', '70', 'A97848', 72, 169, 120, 72, 'Raw Umber', 0, 0, 0, '../images/AMS_colors/colors/color_7.jpg'),
(8, 'Isabellinus', 'Ruddy Brown', '70', 'BF7029', 74, 194, 112, 41, 'Ruddy Brown', 0, 0, 0, '../images/AMS_colors/colors/color_8.jpg'),
(9, 'Umbrinus', 'Sepia', '70', '6E4116', 77, 110, 65, 22, 'Chocolate', 0, 0, 0, '../images/AMS_colors/colors/color_9.jpg'),
(10, 'Castaneus', 'Caput Mortuum', '70', '5E2914', 80, 94, 41, 20, 'Chocolate', 0, 0, 0, '../images/AMS_colors/colors/color_10.jpg'),
(11, 'Fuligineus', 'Zinnwaldite Brown', '70', '391401', 82, 57, 20, 1, 'Bulgarian Rose', 0, 0, 0, '../images/AMS_colors/colors/color_11.jpg'),
(12, 'Atropurpureus', 'Bulgarian Rose', '70', '4E0F0F', 84, 78, 15, 15, 'Rosewood', 0, 0, 0, '../images/AMS_colors/colors/color_12.jpg'),
(13, 'Purpureus', 'OU Crimson Red', '10', '940101', 10, 148, 1, 1, 'OU Crimson Red', 0, 0, 0, '../images/AMS_colors/colors/color_13.jpg'),
(14, 'Ruber', 'Rosso Corsa', '10', 'D30102', 30, 211, 1, 2, 'Boston University Red', 0, 0, 0, '../images/AMS_colors/colors/color_14.jpg'),
(15, 'Miniatus', 'Coquelicot', '10', 'F73601', 40, 247, 54, 1, 'Coquelicot', 0, 0, 0, '../images/AMS_colors/colors/color_15.jpg'),
(16, 'Incarnatus', 'Deep Carrot Orange', '10', 'ED7236', 70, 237, 114, 54, 'Portland Orange', 0, 0, 0, '../images/AMS_colors/colors/color_16.jpg'),
(17, 'Roseus', 'Light Salmon', '10', 'F39F7C', 90, 243, 159, 124, 'Atomic Tangerine', 0, 0, 0, '../images/AMS_colors/colors/color_17.jpg'),
(18, 'Testaceus', 'Flame', '10', 'DA5110', 50, 218, 81, 16, 'Tenne (Tawny)', 0, 0, 0, '../images/AMS_colors/colors/color_18.jpg'),
(19, 'Latericius', 'Sienna', '10', '97280A', 20, 151, 40, 10, 'Brown', 0, 0, 0, '../images/AMS_colors/colors/color_19.jpg'),
(20, 'Badius', 'Caput Mortuum (also)', '70', '561A10', 81, 86, 26, 16, 'Chocolate', 0, 0, 0, '../images/AMS_colors/colors/color_20.jpg'),
(21, 'Aurantiacus', 'Safety Orange (Blaze Orange)', '10', 'EE6005', 80, 238, 96, 5, 'Safety Orange', 0, 0, 0, '../images/AMS_colors/colors/color_21.jpg'),
(22, 'Luteus', 'Tangerine', '40', 'EE8801', 49, 238, 136, 1, 'Orange', 0, 0, 0, '../images/AMS_colors/colors/color_22.jpg'),
(23, 'Flavus', 'UCLA Gold', '40', 'E7B001', 48, 231, 176, 1, 'Orange', 0, 0, 0, '../images/AMS_colors/colors/color_23.jpg'),
(24, 'Citrinus', 'Meat brown', '40', 'DCC747', 47, 220, 199, 71, 'Pear', 0, 0, 0, '../images/AMS_colors/colors/color_24.jpg'),
(25, 'Sulphureus', 'Straw', '40', 'DCCB71', 43, 220, 203, 113, 'June Bud', 0, 0, 0, '../images/AMS_colors/colors/color_25.jpg'),
(26, 'Stramineus', 'Pale Gold', '40', 'E3CB95', 41, 227, 203, 149, 'Medium Bud Spring', 0, 0, 0, '../images/AMS_colors/colors/color_26.jpg'),
(27, 'Cremeus', 'Pale Gold (also)', '40', 'E8C583', 42, 232, 197, 131, 'Peach-Orange', 0, 0, 0, '../images/AMS_colors/colors/color_27.jpg'),
(28, 'Ochroleucus', 'Topaz', '40', 'F0C378', 44, 240, 195, 120, 'Jonquil', 0, 0, 0, '../images/AMS_colors/colors/color_28.jpg'),
(29, 'Ochraceus', 'Pastel Orange', '40', 'F3B556', 45, 243, 181, 86, 'Jonquil', 0, 0, 0, '../images/AMS_colors/colors/color_29.jpg'),
(30, 'Melleus', 'Indian Yellow', '40', 'DFB54F', 46, 223, 181, 79, 'June Bud', 0, 0, 0, '../images/AMS_colors/colors/color_30.jpg'),
(31, 'Ferrunineus', 'Burnt Orange', '10', 'CB5607', 60, 203, 86, 7, 'Tenne (Tawny)', 0, 0, 0, '../images/AMS_colors/colors/color_31.jpg'),
(32, 'Fulvus', 'Brown (Traditional)', '70', '9E4410', 78, 158, 68, 16, 'Brown', 0, 0, 0, '../images/AMS_colors/colors/color_32.jpg'),
(33, 'Flavo-virens', 'Brass', '60', 'B5AB3E', 61, 181, 171, 62, 'Satin  Sheen Gold', 0, 0, 0, '../images/AMS_colors/colors/color_33.jpg'),
(34, 'Atro-virens', 'Myrtle', '60', '213C25', 65, 33, 60, 37, 'Olive Drab', 0, 0, 0, '../images/AMS_colors/colors/color_34.jpg'),
(35, 'Viridis', 'Fern Green', '60', '4A7A3E', 64, 74, 122, 62, 'Hunter Green', 0, 0, 0, '../images/AMS_colors/colors/color_35.jpg'),
(36, 'Prasinus', 'Fern Green', '60', '6B8046', 62, 107, 128, 70, 'Olive Drab', 0, 0, 0, '../images/AMS_colors/colors/color_36.jpg'),
(37, 'Aerugineus', 'Slate Gray', '60', '6B938A', 63, 107, 147, 138, 'Cadet Blue', 0, 0, 0, '../images/AMS_colors/colors/color_37.jpg'),
(38, 'Glaucus', 'Pastel Gray', '50', 'D6D5B7', 51, 214, 213, 183, 'Pastel Gray', 0, 0, 0, '../images/AMS_colors/colors/color_38.jpg'),
(39, 'Olivaceus', 'Dark Brown', '70', '5C4C1D', 76, 92, 76, 29, 'Wine', 0, 0, 0, '../images/AMS_colors/colors/color_39.jpg'),
(40, 'Atro-cyaneus', 'Oxford Blue', '20', '020F41', 32, 2, 15, 65, 'Oxford Blue', 0, 0, 0, '../images/AMS_colors/colors/color_40.jpg'),
(41, 'Cyaneus', 'Royal Blue (Traditional)', '20', '012866', 22, 1, 40, 102, 'Dark Midnight Blue', 0, 0, 0, '../images/AMS_colors/colors/color_41.jpg'),
(42, 'Caeruleus', 'Moonstone Blue', '20', '76A1BC', 12, 118, 161, 188, 'Blue Gray', 0, 0, 0, '../images/AMS_colors/colors/color_42.jpg'),
(43, 'Caesius', 'Pale Silver', '50', 'C5C3AB', 52, 197, 195, 171, 'Medium Spring Bud', 0, 0, 0, '../images/AMS_colors/colors/color_43.jpg'),
(44, 'Plumbeus', 'Battleship Gray', '50', '858786', 54, 133, 135, 134, 'Manatee', 0, 0, 0, '../images/AMS_colors/colors/color_44.jpg'),
(45, 'Ardesiacus', 'Rifle Green', '60', '303C35', 66, 48, 60, 53, 'Olive Drab', 0, 0, 0, '../images/AMS_colors/colors/color_45.jpg'),
(46, 'Atro-violaceus', 'Caput Mortuum (Also)', '70', '491D31', 79, 73, 29, 49, 'Olive Drab', 0, 0, 0, '../images/AMS_colors/colors/color_46.jpg'),
(47, 'Violaceus', 'French Lilac', '70', '86728E', 73, 134, 114, 142, 'French Lilac', 0, 0, 0, '../images/AMS_colors/colors/color_47.jpg'),
(48, 'Lilacinus', 'Puce', '70', 'C39AA1', 71, 195, 154, 161, 'Puce', 0, 0, 0, '../images/AMS_colors/colors/color_48.jpg'),
(49, 'Lividus', 'Old Mauve', '70', '6E3534', 75, 110, 53, 69, 'Wine', 0, 0, 0, '../images/AMS_colors/colors/color_49.jpg'),
(50, 'Vinosus', 'Bulgarian Rose (Also)', '70', '460910', 83, 70, 9, 16, 'Bulgarian Rose', 0, 0, 0, '../images/AMS_colors/colors/color_50.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(0, 'Not Entered', '', '', '', 1, '2023-06-23 16:35:00'),
(1, 'USA', 'United States', '', '', 1, '2023-06-23 16:35:00'),
(2, 'MEX', 'Mexico', '', '', 1, '2023-06-23 16:35:00'),
(3, 'CAN', 'Canada', '', '', 1, '2023-06-23 16:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_source`
--

CREATE TABLE `data_source` (
  `id` int NOT NULL,
  `title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_source`
--

INSERT INTO `data_source` (`id`, `title`, `author`, `type`, `comment`, `entered_by`, `date_entered`) VALUES
(1, 'Introductory Mycology', 'C. J. Alexopoulos, C. W. Mims,  M. Blackwell', '2', '', 1, '2022-04-05 16:04:53'),
(2, 'Ainsworth & Bisbys Dictionary of the Fungi 10th Edition', 'P. M. Kirk, P. F. Cannon, D. W. Minter and J. A. Stalpers', '2', '', 1, '2022-04-05 16:26:11'),
(3, 'Illustrated Dictionary of Mycology Second Edition', 'Miguel Ulloa and Richard T. Hanlin', '2', '', 1, '2022-04-05 16:28:21'),
(4, 'Mushrooms Demystified Second Edition', 'David Arora', '2', '', 1, '2022-04-05 16:29:44'),
(5, 'Easy Guide to Mushrooms Descriptions', 'Kit Scates', '5', '', 1, '2022-04-05 16:32:25'),
(6, 'Easy Key to Common Gilled Mushrooms', 'Kit Scates', '5', '', 1, '2022-04-05 16:35:52'),
(7, 'https://mycologyst.art/mushroom-identification/mushroom-morphology', 'Unknown', '3', '', 1, '2022-04-05 16:39:44'),
(8, 'www.mushroomexpert.com/index.html', 'Michael Kuo', '3', 'Kuo, Michael (2022). Mushroomexpert.com homepage. Retrieved April 5, 2022 from the Mushroomexpert.Com website: www.mushroomexpert.com/index.html', 1, '2022-04-05 16:41:52'),
(9, 'Fungal Families of the World', 'P. F. Cannon and P. M. Kirk', '2', '', 1, '2022-04-05 16:44:27'),
(10, 'How to Know the Non-Gilled Fleshy Fungi', 'Helen V. Smith Alexander H. Smith', '2', '', 1, '2022-04-05 16:46:01'),
(11, 'How to Know the gilled mushrooms', 'Alexander H. Smith Helen V. Smith Nancy S. Weber', '2', '', 1, '2022-04-05 16:47:52'),
(12, 'National Audubon Society Field Guide to North American Mushrooms', 'Gary H. Lincoff', '2', '', 1, '2022-04-05 16:49:09'),
(13, 'How to Identify Mushrooms to Genus I:  Macroscopic Features', 'David L. Largent', '2', '', 1, '2022-04-05 16:50:36'),
(14, 'How to Identify Mushrooms to Genus III:  Microscopic Features', 'David Largent David Johnson Roy Watling (Consultant)', '2', '', 1, '2022-04-05 16:52:35'),
(15, 'Identification of the Larger Fungi Kindle Edition', 'Roy Watling', '2', '', 1, '2022-04-05 16:56:14'),
(16, 'North American Mushrooms A Field Guide to Edible and Inedible Fungi', 'Dr. Orson K. Miller Jr. and Hope H. Miller', '2', '', 1, '2022-04-05 17:04:46'),
(17, 'Mushrooms of the Southeast', 'Todd F. Elliott and Steven L. Stephenson', '2', '', 1, '2022-04-05 17:06:08'),
(18, 'Mushrooms of the Gulf Coast States A Field Guide to Texas, Louisiana, Mississippi, Alabama, and Florida', 'Alan E. Bessette Arleen R. Bessette David P. Lewis', '2', '', 1, '2022-04-05 17:07:51'),
(19, 'Mushrooms How to Identify and Gather Wild Mushrooms and Other Fungi', 'DK? Thomas Lessoe?', '2', '', 1, '2022-04-06 19:41:17'),
(20, 'Mushrooms of the Midwest', 'Michael Kuo and Andrew S. Methven', '2', '', 1, '2022-04-06 19:42:19'),
(21, 'North American Boletes A Color Guide to the Fleshy Pored Mushrooms', 'Alan E. Bessette, William C. Roody, and Arleen R. Bessette', '2', '', 1, '2023-06-04 05:50:30'),
(22, 'MBList', '', '', '', 1, '2023-07-09 09:00:00'),
(23, 'Will Johnston', 'Will Johnston', '1', '', 1, '2024-03-08 18:52:20'),
(24, 'Comparison of Different Drying Methods for Recovery of Mushroom DNA', 'Shouxian Wang,corresponding author1,2 Yu Liu,2 and Jianping Xu corresponding author1', '', 'Wang S, Liu Y, Xu J. Comparison of Different Drying Methods for Recovery of Mushroom DNA. Sci Rep. 2017 Jun 7;7(1):3008. doi: 10.1038/s41598-017-03570-7. PMID: 28592865; PMCID: PMC5462775.', 1, '2024-04-02 10:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `data_source_data_type`
--

CREATE TABLE `data_source_data_type` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_source_data_type`
--

INSERT INTO `data_source_data_type` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '23', 1, '2024-03-30 14:43:51'),
(2, 'Book', '', '', '23', 1, '2024-03-15 06:26:21'),
(3, 'Website', '', '', '23', 1, '2024-03-15 06:28:22'),
(4, 'Magazine', '', '', '23', 1, '2024-03-15 06:28:38'),
(5, 'Chart', 'like Scates', '', '5', 1, '2024-04-02 10:57:52'),
(6, 'Database', '', '', '23', 1, '2024-04-02 11:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `display_options`
--

CREATE TABLE `display_options` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `display_options`
--

INSERT INTO `display_options` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '23', 1, '2024-03-11 18:27:06'),
(2, 'text_box_number_mm', '', '', '23', 1, '2024-03-11 18:28:51'),
(3, 'text_box_number_um', '', '', '23', 1, '2024-03-11 18:29:25'),
(4, 'text_box_number', '', '', '23', 1, '2024-03-11 18:30:40'),
(5, 'text_box_string', '', '', '23', 1, '2024-03-11 18:30:58'),
(6, 'color', '', '', '23', 1, '2024-03-11 18:31:28'),
(7, 'taste', '', '', '23', 1, '2024-03-11 18:31:53'),
(8, 'odor', '', '', '23', 1, '2024-03-11 18:32:13'),
(9, 'radio', '', '', '23', 1, '2024-03-11 18:32:34'),
(10, 'drop-down', '', '', '23', 1, '2024-03-11 18:33:14'),
(11, 'state', '', '', '23', 1, '2024-03-11 18:33:31'),
(12, 'country', '', '', '23', 1, '2024-03-11 18:33:55'),
(13, 'texture', '', '', '23', 1, '2024-03-16 05:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `epithet`
--

CREATE TABLE `epithet` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fungus_type`
--

CREATE TABLE `fungus_type` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fungus_type`
--

INSERT INTO `fungus_type` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '23', 1, '2024-03-30 14:46:50'),
(2, 'Gills', '', '', '23', 1, '2024-03-13 05:41:38'),
(3, 'Pores', '', '', '23', 1, '2024-03-13 05:42:37'),
(4, 'Teeth', '', '', '23', 1, '2024-03-13 05:42:57'),
(5, 'Cups', '', '', '23', 1, '2024-03-13 05:43:12'),
(6, 'Stinkhorn', '', '', '23', 1, '2024-03-13 05:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `genus`
--

CREATE TABLE `genus` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` int NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genus`
--

INSERT INTO `genus` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(0, 'Not Entered', '', '', 1, 1, '2024-02-13 10:51:51'),
(1, 'Albatrellus', '', '', 21, 1, '2023-06-04 06:30:00'),
(2, 'Aureoboletus', '', '', 21, 1, '2023-06-04 06:30:00'),
(3, 'Austroboletus', '', '', 21, 1, '2023-06-04 06:30:00'),
(4, 'Boletellus', '', '', 21, 1, '2023-06-04 06:30:00'),
(5, 'Boletinellus', '', '', 21, 1, '2023-06-04 06:30:00'),
(6, 'Boletinus', '', '', 21, 1, '2023-06-04 06:30:00'),
(7, 'Boletopsis', '', '', 21, 1, '2023-06-04 06:30:00'),
(8, 'Boletus', '', '', 21, 1, '2023-06-04 06:30:00'),
(9, 'Chalciporus', '', '', 21, 1, '2023-06-04 06:30:00'),
(10, 'Coltricia', '', '', 21, 1, '2023-06-04 06:30:00'),
(11, 'Fuscoboletinus', '', '', 21, 1, '2023-06-04 06:30:00'),
(12, 'Gastroboletus', '', '', 21, 1, '2023-06-04 06:30:00'),
(13, 'Gastroleccinum', '', '', 21, 1, '2023-06-04 06:30:00'),
(14, 'Gastrosuillus', '', '', 21, 1, '2023-06-04 06:30:00'),
(15, 'Gomphidius', '', '', 21, 1, '2023-06-04 06:30:00'),
(16, 'Gyrodon', '', '', 21, 1, '2023-06-04 06:30:00'),
(17, 'Gyroporus', '', '', 21, 1, '2023-06-04 06:30:00'),
(18, 'Hypomyces', '', '', 21, 1, '2023-06-04 06:30:00'),
(19, 'Jabnoporus', '', '', 21, 1, '2023-06-04 06:30:00'),
(20, 'Leccinum', '', '', 21, 1, '2023-06-04 06:30:00'),
(21, 'Meiorganum', '', '', 21, 1, '2023-06-04 06:30:00'),
(22, 'Mucilopilus', '', '', 21, 1, '2023-06-04 06:30:00'),
(23, 'Paragyrodon', '', '', 21, 1, '2023-06-04 06:30:00'),
(24, 'Paxillus', '', '', 21, 1, '2023-06-04 06:30:00'),
(25, 'Phaeolus', '', '', 21, 1, '2023-06-04 06:30:00'),
(26, 'Phlebopus', '', '', 21, 1, '2023-06-04 06:30:00'),
(27, 'Phylloporus', '', '', 21, 1, '2023-06-04 06:30:00'),
(28, 'Polyporus', '', '', 21, 1, '2023-06-04 06:30:00'),
(29, 'Porphyrellus', '', '', 21, 1, '2023-06-04 06:30:00'),
(30, 'Pseudomerulius', '', '', 21, 1, '2023-06-04 06:30:00'),
(31, 'Pulveroboletus', '', '', 21, 1, '2023-06-04 06:30:00'),
(32, 'Strobilomyces', '', '', 21, 1, '2023-06-04 06:30:00'),
(33, 'Suillellus', '', '', 21, 1, '2023-06-04 06:30:00'),
(34, 'Suillus', '', '', 21, 1, '2023-06-04 06:30:00'),
(35, 'Truncocolumella', '', '', 21, 1, '2023-06-04 06:30:00'),
(36, 'Tylopilus', '', '', 21, 1, '2023-06-04 06:30:00'),
(37, 'Xanthoconium', '', '', 21, 1, '2023-06-04 06:30:00'),
(38, 'Xerocomus', '', '', 21, 1, '2023-06-04 06:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `gill_attachment`
--

CREATE TABLE `gill_attachment` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gill_attachment`
--

INSERT INTO `gill_attachment` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 11:33:00'),
(2, 'Free - remote', '', '', '5', 1, '2024-03-01 11:33:00'),
(3, 'Free - close', '', '', '5', 1, '2024-03-01 11:33:00'),
(4, 'Adnate - horizontal', '', '', '5', 1, '2024-03-01 11:33:00'),
(5, 'Adnate - ascending', '', '', '5', 1, '2024-03-01 11:33:00'),
(6, 'Adnexed (almost free)', '', '', '5', 1, '2024-03-01 11:33:00'),
(7, 'Sinuate', '', '', '5', 1, '2024-03-01 11:33:00'),
(8, 'Emarginate (notched)', '', '', '5', 1, '2024-03-01 11:33:00'),
(9, 'Decurrent - long', '', '', '5', 1, '2024-03-01 11:33:00'),
(10, 'Decurrent - short', '', '', '5', 1, '2024-03-01 11:33:00'),
(11, 'Seceding (breaking away)', '', '', '5', 1, '2024-03-01 11:33:00'),
(12, 'Uncinate (w/decurrent tooth)', '', '', '5', 1, '2024-03-01 11:33:00'),
(13, 'Collared', 'Gills are attached to a collar or ring that encircles the stipe.', '', '7', 1, '2024-03-01 11:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `gill_breadth`
--

CREATE TABLE `gill_breadth` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gill_breadth`
--

INSERT INTO `gill_breadth` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 11:33:00'),
(2, 'Broad', '', '', '5', 1, '2024-03-01 11:33:00'),
(3, 'Free - close', '', '', '5', 1, '2024-03-01 11:33:00'),
(4, 'Ventricose', '', '', '5', 1, '2024-03-01 11:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `gill_context_flesh_latex_abundance`
--

CREATE TABLE `gill_context_flesh_latex_abundance` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gill_edges`
--

CREATE TABLE `gill_edges` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gill_edges`
--

INSERT INTO `gill_edges` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 11:33:00'),
(2, 'Even - entire', '', '', '5', 1, '2024-03-01 11:33:00'),
(3, 'Serrate', '', '', '5', 1, '2024-03-01 11:33:00'),
(4, 'Serrulate', '', '', '5', 1, '2024-03-01 11:33:00'),
(5, 'Eroded (\"gnawed\")', '', '', '5', 1, '2024-03-01 11:33:00'),
(6, 'Fimbriate (fringed)', '', '', '5', 1, '2024-03-01 11:33:00'),
(7, 'Marginate (diff. color)', '', '', '5', 1, '2024-03-01 11:33:00'),
(8, 'Crenate (scalloped)', '', '', '5', 1, '2024-03-01 11:33:00'),
(9, 'Acute', '', '', '5', 1, '2024-03-01 11:33:00'),
(10, 'Obtuse (blunt)', '', '', '5', 1, '2024-03-01 11:33:00'),
(11, 'Crisped (crinkled)', '', '', '5', 1, '2024-03-01 11:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `gill_misc`
--

CREATE TABLE `gill_misc` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gill_misc`
--

INSERT INTO `gill_misc` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 11:33:00'),
(2, 'Veined (with ridges)', '', '', '5', 1, '2024-03-01 11:33:00'),
(3, 'Intervenose (with \"veins\" between gills', '', '', '5', 1, '2024-03-01 11:33:00'),
(4, 'Equal', '', '', '5', 1, '2024-03-01 11:33:00'),
(5, 'Unequal (w/short gills)', '', '', '5', 1, '2024-03-01 11:33:00'),
(6, 'Forking', '', '', '5', 1, '2024-03-01 11:33:00'),
(7, 'Anastomosing (joining crossways)', '', '', '5', 1, '2024-03-01 11:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `gill_spacing`
--

CREATE TABLE `gill_spacing` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gill_spacing`
--

INSERT INTO `gill_spacing` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2023-02-20 18:33:00'),
(2, 'Crowded', 'The Gills are tightly close together.', '', '7', 1, '2021-11-14 13:33:00'),
(3, 'Close', 'The Gills are close together.', '', '7', 1, '2021-11-14 13:33:00'),
(4, 'Subdistant', 'The gills are spaced apart.', '', '7', 1, '2021-11-14 13:33:00'),
(5, 'Distant', 'The gills are widely spaced apart.', '', '7', 1, '2021-11-14 13:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `gill_thickness`
--

CREATE TABLE `gill_thickness` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gill_thickness`
--

INSERT INTO `gill_thickness` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 11:33:00'),
(2, 'Average', '', '', '5', 1, '2024-03-01 11:33:00'),
(3, 'Thick', '', '', '5', 1, '2024-03-01 11:33:00'),
(4, 'Tapering', '', '', '5', 1, '2024-03-01 11:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `habit`
--

CREATE TABLE `habit` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `habit`
--

INSERT INTO `habit` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2023-02-20 18:33:00'),
(2, 'Single, solitary', '', '', '5', 1, '2023-02-19 08:10:26'),
(3, 'Scattered (1-2 feet apart)', '', '', '5', 1, '2023-02-19 08:10:26'),
(4, 'Gregarious (growing in a group)', '', '', '5', 1, '2023-02-19 08:10:26'),
(5, 'Caespitose (clustered, not joined)', '', '', '5', 1, '2023-02-19 08:10:26'),
(6, 'Connate (fused at base)', '', '', '5', 1, '2023-02-19 08:10:26'),
(7, 'Imbricate (overlapping)', '', '', '5', 1, '2023-02-19 08:10:26'),
(8, 'In troops or rings', '', '', '5', 1, '2023-02-19 08:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `habitat`
--

CREATE TABLE `habitat` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `habitat`
--

INSERT INTO `habitat` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2023-02-20 18:33:00'),
(2, 'Terrestrial (on soil - bare )', '', '', '5', 1, '2023-02-19 08:10:26'),
(3, 'Terrestrial (on soil - burned )', '', '', '5', 1, '2023-02-19 08:10:26'),
(4, 'Terrestrial (on soil - disturbed )', '', '', '5', 1, '2023-02-19 08:10:26'),
(5, 'Lignicolous (on wood) - what kind of tree?', '', '', '5', 1, '2023-02-19 08:10:26'),
(6, 'Humicolous (on humus, duff) - conifer, other?', '', '', '5', 1, '2023-02-19 08:10:26'),
(7, 'Coprophious (on dung) what kind?', '', '', '5', 1, '2023-02-19 08:10:26'),
(8, 'In grassy area - lawn, pasture, etc?', '', '', '5', 1, '2023-02-19 08:10:26'),
(9, 'In forest - conifer, hardwood, mixed?', '', '', '5', 1, '2023-02-19 08:10:26'),
(16, 'fungicolous', 'mushroom mycelia grow in other mushrooms', 'p 7, How to Identify Mushrooms to Genus I: Macroscopic Features - David L. Largent', '13', 2, '2023-03-16 11:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `specimen_id` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'is specimen id',
  `part` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'cap, stem, area, trees',
  `description` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'photo information, lighting, settings',
  `source_remote` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'file name in images folder',
  `source_local` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_width` int NOT NULL,
  `image_height` int NOT NULL,
  `camera_make` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `camera_model` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lens` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exposure` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `aperture` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso` int NOT NULL,
  `date_taken` datetime NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images_thumbnail`
--

CREATE TABLE `images_thumbnail` (
  `id` int NOT NULL,
  `specimen_id` int NOT NULL,
  `source_remote` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_width` int NOT NULL,
  `image_height` int NOT NULL,
  `date_entered` datetime NOT NULL,
  `entered_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lens`
--

CREATE TABLE `lens` (
  `id` int NOT NULL,
  `make` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lens`
--

INSERT INTO `lens` (`id`, `make`, `model`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', 1, '2024-03-30 14:52:23'),
(2, 'Nikon', 'Nikon ED AF Micro Nikkor 70-180mm 1:4.5-5.6 D', 2, '2023-03-20 11:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int NOT NULL,
  `member_type` char(48) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member' COMMENT '1-admin 2-member  3-scholar 4-author 5-expert 6-student ',
  `member_name` char(48) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_email` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_date_entered` datetime NOT NULL,
  `member_responded` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n',
  `member_valid` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n' COMMENT 'if valid allow'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_type`, `member_name`, `member_password`, `member_email`, `member_date_entered`, `member_responded`, `member_valid`) VALUES
(1, '2', 'Will Johnston', '$2y$10$dFEDbeyH9PLvDwOkje9wc.1hyCa4rsTFFmMqDdnY0hwA2A52/eTu2', 'willgb54@yahoo.com', '2022-03-30 13:38:27', 'y', 'y'),
(2, '1', 'admin', '$2y$10$l4bpA9pasbM.dyORjluAP.kcyuC.vUjNGnnXN2Bm9ZVlGKqZUfAQK', 'admin@mushroom.com', '2022-03-30 15:09:47', 'y', 'y'),
(3, '3', 'Hoffa Hoffa', '$2y$10$bod0BX8Ql3Rz5pgACadOC.HaTfrGzEoS7QwYCNNtFzk/rXIIKS8Tu', 'hoffa@hoffa.com', '2022-04-02 10:57:08', 'y', 'y'),
(17, '2', 'OgallyWally', '$2y$10$7ZuqN89rkBIqLvFJeHkSze2xRGq5NregKSA7DLimqk7jmBvt./fsy', 'ogally@wally.com', '2022-09-18 15:31:54', 'y', 'y'),
(18, '2', 'Joe Blow', '$2y$10$lEfp0J6wpSgbIWAVZ3essuNldWpQZhaj3ihZKBDggnC32wXed6nKS', 'joe@blow.com', '2022-10-10 11:44:48', 'y', 'y'),
(19, '2', 'Blob Lobley', '$2y$10$z4VI7KGptF3zRAb/Aa9dy.FQfFFyYLnl.l8pfJfUz5JJHXECbfRdy', 'willfh54@duck.com', '2022-10-13 17:29:23', 'y', 'y'),
(20, '2', 'Fred Flintstone', '$2y$10$7GyeI6X/kMxjjb26Is3WqeaFqdcTY8n.Uog9HoTWauc6nT1irlri6', 'fred@flintstone.com', '2023-03-30 08:04:51', 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `member_list_clusters`
--

CREATE TABLE `member_list_clusters` (
  `id` int NOT NULL,
  `specimen_id` int NOT NULL,
  `cluster_id` int NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_list_clusters`
--

INSERT INTO `member_list_clusters` (`id`, `specimen_id`, `cluster_id`, `entered_by`, `date_entered`) VALUES
(1, 5, 3, 1, '2023-08-24 19:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `member_list_groups`
--

CREATE TABLE `member_list_groups` (
  `id` int NOT NULL,
  `specimen_id` int NOT NULL,
  `group_id` int NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_list_groups`
--

INSERT INTO `member_list_groups` (`id`, `specimen_id`, `group_id`, `entered_by`, `date_entered`) VALUES
(1, 1, 1, 1, '2024-01-25 16:33:56'),
(2, 2, 1, 1, '2024-01-26 15:24:09'),
(3, 3, 9, 1, '2024-01-26 15:28:42'),
(4, 4, 10, 1, '2024-01-26 15:42:24'),
(5, 5, 10, 1, '2024-01-26 15:48:29'),
(6, 6, 10, 1, '2024-01-26 15:55:31'),
(7, 7, 10, 1, '2024-01-26 16:43:45'),
(8, 8, 10, 1, '2024-01-26 16:45:59'),
(9, 5, 10, 1, '2024-03-19 19:15:45'),
(10, 6, 3, 1, '2024-03-21 16:19:25'),
(11, 7, 10, 1, '2024-03-26 18:53:15'),
(12, 8, 4, 1, '2024-03-27 06:14:29'),
(13, 9, 12, 1, '2024-04-02 19:31:34'),
(14, 10, 12, 1, '2024-04-02 19:35:39'),
(15, 1, 4, 1, '2024-04-03 14:28:24'),
(16, 2, 4, 1, '2024-04-03 14:44:33'),
(17, 1, 13, 1, '2024-04-03 14:45:30'),
(18, 2, 13, 1, '2024-04-03 14:45:57'),
(19, 3, 12, 1, '2024-04-03 17:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `member_type`
--

CREATE TABLE `member_type` (
  `member_type_id` int NOT NULL,
  `member_type_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_type_date_entered` datetime NOT NULL,
  `member_type_entered_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_type`
--

INSERT INTO `member_type` (`member_type_id`, `member_type_name`, `member_type_date_entered`, `member_type_entered_by`) VALUES
(1, 'admin', '2022-03-31 15:16:40', 1),
(2, 'member', '2022-03-31 15:19:59', 1),
(3, 'scholar', '2022-03-31 15:20:18', 1),
(4, 'expert', '2022-03-31 15:20:25', 1),
(5, 'student', '2022-03-31 15:20:30', 1),
(6, 'researcher', '2022-03-31 15:20:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `odor`
--

CREATE TABLE `odor` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `odor`
--

INSERT INTO `odor` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2023-02-20 18:33:00'),
(2, 'None', '', '', '5', 1, '2023-02-19 08:10:26'),
(3, 'Fruity', '', '', '5', 1, '2023-02-19 08:10:26'),
(4, 'Lemony', '', '', '5', 1, '2023-02-19 08:10:26'),
(5, 'Anise (licorice)', '', '', '5', 1, '2023-02-19 08:10:26'),
(6, 'Farinaceous (like fresh meal)', '', '', '5', 1, '2023-02-19 08:10:26'),
(7, 'Pungent', '', '', '5', 1, '2023-02-19 08:10:26'),
(8, 'Nauseous', '', '', '5', 1, '2023-02-19 08:10:26'),
(9, 'Nitrous', '', '', '5', 1, '2023-02-19 08:10:26'),
(10, 'Earthy', '', '', '5', 1, '2023-02-19 08:10:26'),
(11, 'Spermatic', '', '', '5', 1, '2023-02-19 08:10:26'),
(12, 'Garlic', '', '', '4', 1, '2023-02-19 08:10:26'),
(13, 'Marasschino cherries', '', '', '4', 1, '2023-02-19 08:10:26'),
(14, 'Sewer gas', '', '', '4', 1, '2023-02-19 08:10:26'),
(15, 'spicy - red hots - dirty socks', '', '', '4', 1, '2023-02-19 08:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `partial_inner_veil_appearance`
--

CREATE TABLE `partial_inner_veil_appearance` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partial_inner_veil_appearance`
--

INSERT INTO `partial_inner_veil_appearance` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 15:00:00'),
(2, 'Two Rings (from 2 veils)', '', '', '5', 1, '2024-03-01 15:00:00'),
(3, 'Doubly-flared Ring', '', '', '5', 1, '2024-03-01 15:00:00'),
(4, '\"Cogwheel\" Stellate', '', '', '5', 1, '2024-03-01 15:00:00'),
(5, 'Floccose (downy tuffs)', '', '', '5', 1, '2024-03-01 15:00:00'),
(6, 'Cortinate PV & Fibrillose Annular Zone', '', '', '5', 1, '2024-03-01 15:00:00'),
(7, 'Single Ring thick on edge', '', '', '5', 1, '2024-03-01 15:00:00'),
(8, 'Pendant (hanging)', '', '', '5', 1, '2024-03-01 15:00:00'),
(9, 'Subperonate', '', '', '5', 1, '2024-03-01 15:00:00'),
(10, 'Peronate (w/\"boot\")', '', '', '5', 1, '2024-03-01 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `partial_inner_veil_fate`
--

CREATE TABLE `partial_inner_veil_fate` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partial_inner_veil_fate`
--

INSERT INTO `partial_inner_veil_fate` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 15:00:00'),
(2, 'Disappearing - Evanescent', 'can only be detected in button stage', '', '4', 1, '2024-03-01 15:00:00'),
(3, 'Persistent', 'leaving remnants on cap', '', '4', 1, '2024-03-01 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `partial_inner_veil_texture`
--

CREATE TABLE `partial_inner_veil_texture` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partial_inner_veil_texture`
--

INSERT INTO `partial_inner_veil_texture` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 15:00:00'),
(2, 'Membranous (skin-like)', '', '', '5', 1, '2024-03-01 15:00:00'),
(3, 'Cortinate (cobwebby)', '', '', '5', 1, '2024-03-01 15:00:00'),
(4, 'Fibillose (thready)', '', '', '5', 1, '2024-03-01 15:00:00'),
(5, 'Gelatinous (slimy)', '', '', '5', 1, '2024-03-01 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `partial_inter_veil_annulus_ring_position`
--

CREATE TABLE `partial_inter_veil_annulus_ring_position` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partial_inter_veil_annulus_ring_position`
--

INSERT INTO `partial_inter_veil_annulus_ring_position` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 15:00:00'),
(2, 'None', 'Does not have annulus ring', '', '5', 1, '2024-03-01 15:00:00'),
(3, 'Superior', 'Near the cap', '', '5', 1, '2024-03-01 15:00:00'),
(4, 'Apical', 'upper half', '', '5', 1, '2024-03-01 15:00:00'),
(5, 'Median', 'in the middle', '', '5', 1, '2024-03-01 15:00:00'),
(6, 'Inferior', 'Lower half', '', '5', 1, '2024-03-01 15:00:00'),
(7, 'Basal', 'Near the base', '', '5', 1, '2024-03-01 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Parts table lists the different character groups for mushroom identification';

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '23', 1, '2023-05-23 19:33:26'),
(2, 'Basic', 'default data that every specimen will have', '', '5', 1, '2023-05-23 19:33:26'),
(3, 'Cap - Pileus', '', '', '5', 1, '2023-05-23 19:33:26'),
(4, 'Gills - Lamellae', '', '', '5', 1, '2023-05-23 19:33:26'),
(5, 'Stem - Stipe', '', '', '5', 1, '2023-05-23 19:33:26'),
(6, 'Veil', '', '', '5', 1, '2023-05-23 19:33:26'),
(7, 'Mycelium', '', '', '5', 1, '2023-05-23 19:33:26'),
(8, 'Spores', 'micro for spores is here - not in micro', '', '5', 1, '2023-05-23 19:33:26'),
(9, 'Micro', '', '', '5', 1, '2023-05-23 19:33:26'),
(10, 'DNA', '', '', '5', 1, '2023-05-23 19:33:26'),
(11, 'Habitat', 'Habitat, Plant Assoc ', '', '5', 1, '2023-05-23 19:33:26'),
(12, 'Rhizomorph', '', '', '5', 1, '2023-05-13 19:36:00'),
(13, 'Chemical Reaction', '', '', '', 1, '2023-05-14 05:51:00'),
(14, 'Color', 'this will allow color selection for ALL color characters to be in one place', '', '1', 1, '2023-05-18 14:14:52'),
(15, 'Location', 'lat lon city county state country', '', '23', 1, '2024-03-11 19:26:57'),
(16, 'Identification', 'species genus inaturalist etc', '', '23', 1, '2024-03-11 19:29:40'),
(17, 'Storage', '', '', '23', 1, '2024-03-16 05:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` int NOT NULL,
  `specimen_id` int NOT NULL,
  `plant_id` int NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plant_association`
--

CREATE TABLE `plant_association` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `possible_match`
--

CREATE TABLE `possible_match` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preservation_method`
--

CREATE TABLE `preservation_method` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `preservation_method`
--

INSERT INTO `preservation_method` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '23', 1, '2024-03-30 14:43:51'),
(2, 'None', '', '', '23', 1, '2024-03-15 06:26:21'),
(3, 'Unknown', '', '', '23', 1, '2024-03-15 06:28:22'),
(4, 'Dehumidifier', '', '', '23', 1, '2024-03-15 06:28:38'),
(6, 'silica gel', '', '', '', 1, '2024-04-02 10:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `soil_type`
--

CREATE TABLE `soil_type` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soil_type`
--

INSERT INTO `soil_type` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2023-02-20 18:33:00'),
(2, 'Unknown', '', '', '', 1, '2023-02-21 08:10:26'),
(3, 'Loam', '', '', '', 1, '2023-02-21 08:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` int NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(0, 'Not Entered', '', '', 1, 1, '2024-02-13 19:27:57'),
(1, 'Some Species', 'Made Up', 'Fake', 1, 1, '2024-02-15 05:44:46'),
(2, 'Another', 'Fake', 'Made Up', 1, 1, '2024-02-15 05:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `specimens`
--

CREATE TABLE `specimens` (
  `id` int NOT NULL,
  `member_id` int NOT NULL COMMENT 'from member table',
  `specimen_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `common_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Entered',
  `description` varchar(1028) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(1028) NOT NULL,
  `specimen_location_now` smallint NOT NULL DEFAULT '1' COMMENT 'This is where the location is physically located right now',
  `location_found_city` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_found_county` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USA',
  `location_public_y_n` int NOT NULL DEFAULT '0',
  `month_found` int DEFAULT NULL,
  `day_found` int DEFAULT NULL,
  `year_found` int DEFAULT NULL,
  `fungus_type` int DEFAULT NULL,
  `entered_by` int NOT NULL DEFAULT '1',
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specimens`
--

INSERT INTO `specimens` (`id`, `member_id`, `specimen_name`, `common_name`, `description`, `comment`, `specimen_location_now`, `location_found_city`, `location_found_county`, `state`, `country`, `location_public_y_n`, `month_found`, `day_found`, `year_found`, `fungus_type`, `entered_by`, `date_entered`) VALUES
(1, 1, '1_wrj_4_3_2024_root', 'ganoderma I think on overturned tree roots', 'lacquer finish, dried out, light weight, tough, woody type stem', '', 3, 'Blakeley', 'Baldwin', '1', '1', 0, 4, 3, 2024, 4, 1, '2024-04-03 14:28:24'),
(2, 1, '2_wrj_04_03_2024_tree', 'Oyster type growing 6 feet up on tree trunk', 'Growing out of a knothole', '', 3, 'Blakeley', 'Baldwin', '1', '1', 0, 4, 3, 2024, 2, 1, '2024-04-03 14:44:33'),
(3, 1, 'ccccc', 'ccccccc', 'ccccccccc', 'cccccccc', 3, 'cccccccccccccc', 'cccccccccccccccc', '28', '1', 0, 12, 31, 2024, 3, 1, '2024-04-03 17:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `specimen_age`
--

CREATE TABLE `specimen_age` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specimen_age`
--

INSERT INTO `specimen_age` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 2, '2023-03-20 15:01:06'),
(2, 'Button', 'very young', '', '', 2, '2023-03-20 15:01:06'),
(3, 'Young', '', '', '', 2, '2023-03-20 15:01:25'),
(4, 'Mature', '', '', '', 2, '2023-03-20 15:01:41'),
(5, 'Past Prime', '', '', '', 2, '2023-03-20 15:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `specimen_characters`
--

CREATE TABLE `specimen_characters` (
  `id` int NOT NULL,
  `specimen_id` int NOT NULL,
  `character_id` int NOT NULL COMMENT 'from characters lookup table',
  `character_value` varchar(128) NOT NULL COMMENT 'if lookup table exists for this character, value from there, otherwise a string or number\r\n',
  `display_options` mediumint NOT NULL COMMENT 'text box - radio - drop down - color chart',
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specimen_cluster`
--

CREATE TABLE `specimen_cluster` (
  `id` int NOT NULL,
  `member_id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specimen_cluster`
--

INSERT INTO `specimen_cluster` (`id`, `member_id`, `name`, `description`, `comments`, `entered_by`, `date_entered`) VALUES
(1, 1, 'Parasol - yard - front & back', '', '', 1, '2023-05-29 11:25:45'),
(2, 1, 'Cluster of Ostrich Wings', 'Wing of ostrich clustered.', 'Ostrich Wing Cluster', 1, '2024-03-23 10:30:49'),
(3, 1, 'Ostrich Wing', 'The wing of an ostrich.', 'Wing belonging to ostrich.', 1, '2024-03-23 10:31:40'),
(4, 1, 'Random racoons', 'Racoons that are not orchestrated.', 'No organization, a cluster.', 1, '2024-03-23 10:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `specimen_group`
--

CREATE TABLE `specimen_group` (
  `id` int NOT NULL,
  `member_id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specimen_group`
--

INSERT INTO `specimen_group` (`id`, `member_id`, `name`, `description`, `comments`, `entered_by`, `date_entered`) VALUES
(1, 1, 'January', '', '', 1, '2023-04-18 14:31:36'),
(2, 1, 'February', '', '', 1, '2023-04-18 14:42:21'),
(3, 1, 'March', '', '', 1, '2023-04-18 14:44:49'),
(4, 1, 'April', '', '', 1, '2023-04-18 15:07:45'),
(5, 1, 'May', '', '', 1, '2023-04-18 15:21:02'),
(6, 1, 'June', '', '', 1, '2023-04-18 15:27:19'),
(7, 1, 'July', '', '', 1, '2023-04-18 15:28:20'),
(8, 1, 'August', '', '', 1, '2023-04-18 15:28:42'),
(9, 1, 'September', '', '', 1, '2023-04-18 15:29:12'),
(10, 1, 'October', '', '', 1, '2023-04-18 15:29:54'),
(11, 1, 'November', '', '', 1, '2023-04-18 15:30:17'),
(12, 1, 'December', '', '', 1, '2023-04-18 16:08:46'),
(13, 1, 'Blakeley', '', '', 1, '2024-01-18 15:30:19'),
(14, 1, 'Daphne', '', '', 1, '2024-01-25 15:55:13'),
(15, 1, 'Disc Golf Park', '', '', 1, '2024-01-25 15:57:32'),
(16, 1, 'Elberta', '', '', 1, '2024-01-25 15:57:59'),
(17, 1, 'Fairhope', '', '', 1, '2024-01-25 15:58:22'),
(18, 1, 'Foley', '', '', 1, '2024-01-25 15:58:43'),
(19, 1, 'Fort Pickens', '', '', 1, '2024-01-25 15:59:08'),
(20, 1, 'Pine Beach Trail', '', '', 1, '2024-01-25 16:00:52'),
(21, 1, 'Weeks Bay', '', '', 1, '2024-01-25 16:01:15'),
(22, 1, 'Yard - Back\r\n', '', '', 1, '2024-01-25 16:01:46'),
(23, 1, 'Yard - Front', '', '', 1, '2024-01-25 16:02:05'),
(24, 1, 'Ostrich Wing', 'The wing of an ostrich.', 'Wing belonging to ostrich.', 1, '2024-03-23 10:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `specimen_location_now`
--

CREATE TABLE `specimen_location_now` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specimen_location_now`
--

INSERT INTO `specimen_location_now` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', 'Not Entered', 'None', '99', 1, '2023-02-20 18:33:00'),
(2, 'Observation Only - No specimen collected', '', 'None', '', 2, '2023-04-18 16:26:54'),
(3, 'Speciment Collector', 'This is you, if you collected this specimen', '', '', 2, '2023-04-18 16:28:33'),
(4, 'Herbarium', '', '', '', 2, '2023-04-18 16:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(0, 'Not Selected', '', '', '', 1, '2023-06-23 16:35:00'),
(1, 'Alabama', '', '', '', 1, '2023-06-23 16:35:00'),
(2, 'Alaska', '', '', '', 1, '2023-06-23 16:35:00'),
(3, 'Arizona', '', '', '', 1, '2023-06-23 16:35:00'),
(4, 'Arkansas', '', '', '', 1, '2023-06-23 16:35:00'),
(5, 'California', '', '', '', 1, '2023-06-23 16:35:00'),
(6, 'Colorado', '', '', '', 1, '2023-06-23 16:35:00'),
(7, 'Connecticut', '', '', '', 1, '2023-06-23 16:35:00'),
(8, 'Delaware', '', '', '', 1, '2023-06-23 16:35:00'),
(9, 'District of Columbia', '', '', '', 1, '2023-06-23 16:35:00'),
(10, 'Florida', '', '', '', 1, '2023-06-23 16:35:00'),
(11, 'Georgia', '', '', '', 1, '2023-06-23 16:35:00'),
(12, 'Hawaii', '', '', '', 1, '2023-06-23 16:35:00'),
(13, 'Idaho', '', '', '', 1, '2023-06-23 16:35:00'),
(14, 'Illinois', '', '', '', 1, '2023-06-23 16:35:00'),
(15, 'Indiana', '', '', '', 1, '2023-06-23 16:35:00'),
(16, 'Iowa', '', '', '', 1, '2023-06-23 16:35:00'),
(17, 'Kansas', '', '', '', 1, '2023-06-23 16:35:00'),
(18, 'Kentucky', '', '', '', 1, '2023-06-23 16:35:00'),
(19, 'Louisiana', '', '', '', 1, '2023-06-23 16:35:00'),
(20, 'Maine', '', '', '', 1, '2023-06-23 16:35:00'),
(21, 'Maryland', '', '', '', 1, '2023-06-23 16:35:00'),
(22, 'Massachusetts', '', '', '', 1, '2023-06-23 16:35:00'),
(23, 'Michigan', '', '', '', 1, '2023-06-23 16:35:00'),
(24, 'Minnesota', '', '', '', 1, '2023-06-23 16:35:00'),
(25, 'Mississippi', '', '', '', 1, '2023-06-23 16:35:00'),
(26, 'Missouri', '', '', '', 1, '2023-06-23 16:35:00'),
(27, 'Montana', '', '', '', 1, '2023-06-23 16:35:00'),
(28, 'Nebraska', '', '', '', 1, '2023-06-23 16:35:00'),
(29, 'Nevada', '', '', '', 1, '2023-06-23 16:35:00'),
(30, 'New Hampshire', '', '', '', 1, '2023-06-23 16:35:00'),
(31, 'New Jersey', '', '', '', 1, '2023-06-23 16:35:00'),
(32, 'New Mexico', '', '', '', 1, '2023-06-23 16:35:00'),
(33, 'New York', '', '', '', 1, '2023-06-23 16:35:00'),
(34, 'North Carolina', '', '', '', 1, '2023-06-23 16:35:00'),
(35, 'North Dakota', '', '', '', 1, '2023-06-23 16:35:00'),
(36, 'Ohio', '', '', '', 1, '2023-06-23 16:35:00'),
(37, 'Oklahoma', '', '', '', 1, '2023-06-23 16:35:00'),
(38, 'Oregon', '', '', '', 1, '2023-06-23 16:35:00'),
(39, 'Pennsylvania', '', '', '', 1, '2023-06-23 16:35:00'),
(40, 'Rhode Island', '', '', '', 1, '2023-06-23 16:35:00'),
(41, 'South Carolina', '', '', '', 1, '2023-06-23 16:35:00'),
(42, 'South Dakota', '', '', '', 1, '2023-06-23 16:35:00'),
(43, 'Tennessee', '', '', '', 1, '2023-06-23 16:35:00'),
(44, 'Texas', '', '', '', 1, '2023-06-23 16:35:00'),
(45, 'Utah', '', '', '', 1, '2023-06-23 16:35:00'),
(46, 'Vermont', '', '', '', 1, '2023-06-23 16:35:00'),
(47, 'Virginia', '', '', '', 1, '2023-06-23 16:35:00'),
(48, 'Washington', '', '', '', 1, '2023-06-23 16:35:00'),
(49, 'West Virginia', '', '', '', 1, '2023-06-23 16:35:00'),
(50, 'Wisconsin', '', '', '', 1, '2023-06-23 16:35:00'),
(51, 'Wyoming', '', '', '', 1, '2023-06-23 16:35:00'),
(52, 'Alberta', '', '', '', 1, '2023-06-23 16:35:00'),
(53, 'British Columbia', '', '', '', 1, '2023-06-23 16:35:00'),
(54, 'Manitoba', '', '', '', 1, '2023-06-23 16:35:00'),
(55, 'New Brunswick', '', '', '', 1, '2023-06-23 16:35:00'),
(56, 'Newfoundland', '', '', '', 1, '2023-06-23 16:35:00'),
(57, 'Nova Scotia', '', '', '', 1, '2023-06-23 16:35:00'),
(58, 'Northwest Territories', '', '', '', 1, '2023-06-23 16:35:00'),
(59, 'Nunavut', '', '', '', 1, '2023-06-23 16:35:00'),
(60, 'Ontario', '', '', '', 1, '2023-06-23 16:35:00'),
(61, 'Prince Edward Island', '', '', '', 1, '2023-06-23 16:35:00'),
(62, 'Quebec', '', '', '', 1, '2023-06-23 16:35:00'),
(63, 'Saskatchewan', '', '', '', 1, '2023-06-23 16:35:00'),
(64, 'Yukon', '', '', '', 1, '2023-06-23 16:35:00'),
(65, 'Aguascalientes', '', '', '', 1, '2023-06-23 16:35:00'),
(66, 'Baja California', '', '', '', 1, '2023-06-23 16:35:00'),
(67, 'Baja California Sur', '', '', '', 1, '2023-06-23 16:35:00'),
(68, 'Campeche', '', '', '', 1, '2023-06-23 16:35:00'),
(69, 'Chiapas', '', '', '', 1, '2023-06-23 16:35:00'),
(70, 'Chihuahua', '', '', '', 1, '2023-06-23 16:35:00'),
(71, 'Coahuila', '', '', '', 1, '2023-06-23 16:35:00'),
(72, 'Colima', '', '', '', 1, '2023-06-23 16:35:00'),
(73, 'Distrito Federal', '', '', '', 1, '2023-06-23 16:35:00'),
(74, 'Durango', '', '', '', 1, '2023-06-23 16:35:00'),
(75, 'Guanajuato', '', '', '', 1, '2023-06-23 16:35:00'),
(76, 'Guerrero', '', '', '', 1, '2023-06-23 16:35:00'),
(77, 'Hidalgo', '', '', '', 1, '2023-06-23 16:35:00'),
(78, 'Jalisco', '', '', '', 1, '2023-06-23 16:35:00'),
(79, 'Mexico', '', '', '', 1, '2023-06-23 16:35:00'),
(80, 'Michoacan', '', '', '', 1, '2023-06-23 16:35:00'),
(81, 'Morelos', '', '', '', 1, '2023-06-23 16:35:00'),
(82, 'Nayarit', '', '', '', 1, '2023-06-23 16:35:00'),
(83, 'Nuevo Leon', '', '', '', 1, '2023-06-23 16:35:00'),
(84, 'Oaxaca', '', '', '', 1, '2023-06-23 16:35:00'),
(85, 'Puebla', '', '', '', 1, '2023-06-23 16:35:00'),
(86, 'Queretaro', '', '', '', 1, '2023-06-23 16:35:00'),
(87, 'Quintana Roo', '', '', '', 1, '2023-06-23 16:35:00'),
(88, 'San Luis Potosi', '', '', '', 1, '2023-06-23 16:35:00'),
(89, 'Sinaloa', '', '', '', 1, '2023-06-23 16:35:00'),
(90, 'Sonora', '', '', '', 1, '2023-06-23 16:35:00'),
(91, 'Tabasco', '', '', '', 1, '2023-06-23 16:35:00'),
(92, 'Tamaulipas', '', '', '', 1, '2023-06-23 16:35:00'),
(93, 'Tlaxcala', '', '', '', 1, '2023-06-23 16:35:00'),
(94, 'Veracruz', '', '', '', 1, '2023-06-23 16:35:00'),
(95, 'Yucatan', '', '', '', 1, '2023-06-23 16:35:00'),
(96, 'Zacatecas', '', '', '', 1, '2023-06-23 16:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `stem_interior`
--

CREATE TABLE `stem_interior` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stem_interior`
--

INSERT INTO `stem_interior` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 15:00:00'),
(2, 'Solid', '', '', '5', 1, '2024-03-01 15:00:00'),
(3, 'Hollow (fistulose)', '', '', '5', 1, '2024-03-01 15:00:00'),
(4, 'Tubular', '', '', '5', 1, '2024-03-01 15:00:00'),
(5, 'Cavernous', '', '', '5', 1, '2024-03-01 15:00:00'),
(6, 'Stuffed with pith', '', '', '5', 1, '2024-03-01 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stem_location`
--

CREATE TABLE `stem_location` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stem_location`
--

INSERT INTO `stem_location` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 11:33:00'),
(2, 'Central', '', '', '5', 1, '2024-03-01 11:33:00'),
(3, 'Eccentric (off-center)', '', '', '5', 1, '2024-03-01 11:33:00'),
(4, 'Lateral (attached at margin)', '', '', '5', 1, '2024-03-01 11:33:00'),
(5, 'Sessile (missing)', '', '', '5', 1, '2024-03-01 11:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `stem_shape`
--

CREATE TABLE `stem_shape` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stem_shape`
--

INSERT INTO `stem_shape` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 11:33:00'),
(2, 'Terete (round)', '', '', '5', 1, '2024-03-01 11:33:00'),
(3, 'Compressed (flattened)', '', '', '5', 1, '2024-03-01 11:33:00'),
(4, 'Equal', '', '', '5', 1, '2024-03-01 11:33:00'),
(5, 'Clavate (club)', '', '', '5', 1, '2024-03-01 11:33:00'),
(6, 'Radicating (w/\"root\")', '', '', '5', 1, '2024-03-01 11:33:00'),
(7, 'Flexous', '', '', '5', 1, '2024-03-01 11:33:00'),
(8, 'Ventricose Fusiform', '', '', '5', 1, '2024-03-01 11:33:00'),
(9, 'Tapering', '', '', '5', 1, '2024-03-01 11:33:00'),
(10, 'Abruptly bulbous', '', '', '5', 1, '2024-03-01 11:33:00'),
(11, 'Rounded', '', '', '5', 1, '2024-03-01 11:33:00'),
(12, 'Oblique (angle)', '', '', '5', 1, '2024-03-01 11:33:00'),
(13, 'Marginate', '', '', '5', 1, '2024-03-01 11:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `stem_surface`
--

CREATE TABLE `stem_surface` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stem_surface`
--

INSERT INTO `stem_surface` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2023-02-21 09:37:26'),
(2, 'Smooth', 'No defining features found on the surface.', '', '7', 1, '2021-11-14 13:33:00'),
(3, 'Uneven', 'A bumpy surface.', '', '7', 1, '2021-11-14 13:33:00'),
(4, 'Rugose', 'A wrinkled or rough surface.', '', '7', 1, '2021-11-14 13:33:00'),
(5, 'Rugulose', 'A slightly wrinkled surface.', '', '7', 1, '2021-11-14 13:33:00'),
(6, 'Rivulose', 'A thinly wrinkled surface of branching wavy or crooked lines.', '', '7', 1, '2021-11-14 13:33:00'),
(7, 'Scrobiculate', 'A pitted or furrowed surface.', '', '7', 1, '2021-11-14 13:33:00'),
(8, 'Warty', 'Remnants of the universal veil remain on the surface in small patches.', '', '7', 1, '2021-11-14 13:33:00'),
(9, 'Virgate', 'A streaked surface.', '', '7', 1, '2021-11-14 13:33:00'),
(10, 'Hygrophanous', 'A surface that is transparent when wet and opaque when dry.', '', '7', 1, '2021-11-14 13:33:00'),
(11, 'Sericeous', 'A silky surface.', '', '7', 1, '2021-11-14 13:33:00'),
(12, 'Fibrillose', 'A surface covered in thread-like filaments.', '', '7', 1, '2021-11-14 13:33:00'),
(13, 'Squamose', 'A surface covered with scales.', '', '7', 1, '2021-11-14 13:33:00'),
(14, 'Squarrose', 'A ragged surface covered with small scales.', '', '7', 1, '2021-11-14 13:33:00'),
(15, 'Pruinose', 'A surface covered with a white powdery frostlike substance.', '', '7', 1, '2021-11-14 13:33:00'),
(16, 'Pulverulent', 'A surface covered with fine dust or powder.', '', '7', 1, '2021-11-14 13:33:00'),
(17, 'Granulose', 'A surface covered in salt-like granulates.', '', '7', 1, '2021-11-14 13:33:00'),
(18, 'Furfuraceous', 'A surface covered in flaky bran-like particles; dandruff-like.', '', '7', 1, '2021-11-14 13:33:00'),
(19, 'Zonate', 'A surface containing zones or bands that are distinguished by texture or color.', '', '7', 1, '2021-11-14 13:33:00'),
(20, 'Areolate', 'A cracked surface resembling dried-mud or paint.', '', '7', 1, '2021-11-14 13:33:00'),
(21, 'Rimose', 'A surface covered in cracks and crevices.', '', '7', 1, '2021-11-14 13:33:00'),
(22, 'Laccate', 'A waxy or lacquered surface texture.', '', '7', 1, '2021-11-14 13:33:00'),
(23, 'Viscid -', 'A sticky glue-like surface texture.', '', '7', 1, '2021-11-14 13:33:00'),
(24, 'Glutinous', 'A slimy surface.', '', '7', 1, '2021-11-14 13:33:00'),
(25, 'Glabrous - Hairy', 'Hairy - a bald surface.', '', '7', 1, '2021-11-14 13:33:00'),
(26, 'Velvety - Hairy', 'Hairy - A surface covered with very fine and soft hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(27, 'Pubescent - Hairy', 'Hairy - A surface cover with fuzz or fine hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(28, 'Canescent - Hairy', 'Hairy - A surface covered in dense white or gray down-like hairs. Giving a frosted appearance.', '', '7', 1, '2021-11-14 13:33:00'),
(29, 'Floccose - Hairy', 'Hairy - A surface covered in Wooly or cotton-like hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(30, 'Tomentose - Hairy', 'Hairy - A surface covered densely with matted hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(31, 'Hispid - Hairy', 'Hairy - A surface covered with straight bristle-like hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(32, 'Hirsute - Hairy', 'Hairy - A surface covered with slightly stiff and shaggy hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(33, 'Villose - Hairy', 'Hairy - A surface covered with long soft hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(34, 'Strigose - Hairy', 'Hairy - A surface covered with long bristle-like hairs.', '', '7', 1, '2021-11-14 13:33:00'),
(35, 'Banded', '', '', '5', 1, '2021-11-14 13:33:00'),
(36, 'Peronate', '', '', '5', 1, '2021-11-14 13:33:00'),
(37, 'Fibrous', '', '', '5', 1, '2021-11-14 13:33:00'),
(38, 'Lacunose (w/dp.grooves)', '', '', '5', 1, '2021-11-14 13:33:00'),
(39, 'Longitudionally striate', '', '', '5', 1, '2021-11-14 13:33:00'),
(40, 'Ribbed/Costate', '', '', '5', 1, '2021-11-14 13:33:00'),
(41, 'Scabrous (scabby)', '', '', '5', 1, '2021-11-14 13:33:00'),
(42, 'Punctuate (w/small dots)', '', '', '5', 1, '2021-11-14 13:33:00'),
(43, 'Glanular-dotted (w/dark sticky dots)', '', '', '5', 1, '2021-11-14 13:33:00'),
(44, 'Reticulate (fishnet)', '', '', '5', 1, '2021-11-14 13:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `stem_texture`
--

CREATE TABLE `stem_texture` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stem_texture`
--

INSERT INTO `stem_texture` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 15:00:00'),
(2, 'Fragile', '', '', '5', 1, '2024-03-01 15:00:00'),
(3, 'Pliable', '', '', '5', 1, '2024-03-01 15:00:00'),
(4, 'Chalky', '', '', '5', 1, '2024-03-01 15:00:00'),
(5, 'Rigid', '', '', '5', 1, '2024-03-01 15:00:00'),
(6, 'Fibrous (Fleshy-Fibrous)', 'usually rather thick, and when broken in two, leaves a ragged edge.', '', '5', 1, '2024-03-01 15:00:00'),
(7, 'Cartilaginous', 'Common stipe, usually thin and breaks with a firm split when bent in two, similar to cartilage.', '', '13', 1, '2024-03-01 15:00:00'),
(8, 'Firm', '', '', '5', 1, '2024-03-01 15:00:00'),
(9, 'Woody', '', '', '13', 1, '2024-03-01 15:00:00'),
(10, 'Corky', '', '', '13', 1, '2024-03-01 15:00:00'),
(11, 'Leathery (coriaceous)', '', '', '13', 1, '2024-03-01 15:00:00'),
(12, 'Chalky', 'feels and breaks like chalk in hand. When crushed, it breaks up into powder or chunks.', '', '13', 1, '2024-03-01 15:00:00'),
(13, 'Breaking with a snap', '', '', '5', 1, '2024-03-01 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `synonyms`
--

CREATE TABLE `synonyms` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `synonym_with` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `synonyms`
--

INSERT INTO `synonyms` (`id`, `name`, `synonym_with`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'epigeous', 'above-ground ', '', 'https://en.wikipedia.org/wiki/Basidiocarp', 2, '2023-03-16 12:45:42'),
(2, 'hypogeous', 'underground', '', 'https://en.wikipedia.org/wiki/Basidiocarp', 2, '2023-03-16 13:02:18'),
(3, 'mushroom', 'fruiting body of a fungus', '', 'Page 7 How to Identify Mushrooms To Genus I - David L Largent', 2, '2023-03-16 13:08:10'),
(4, 'basidiocarp', 'fruiting body', '', 'https://en.wikipedia.org/wiki/Basidiocarp', 2, '2023-03-16 13:10:32'),
(5, 'thallus', 'soma', 'entire body of fungus', 'P 27 Introductory Mycology Alexopoulos', 2, '2023-03-20 10:57:58'),
(6, 'sporocarp', 'fruiting body', '', 'P 1 How to Know the Non-Gilled Fleshy Fungi Smith & Smith', 2, '2023-03-23 14:15:51'),
(7, 'pileus', 'cap', '', 'P 7 How to Know the Non-Gilled Fleshy Fungi Smith & Smith', 2, '2023-03-23 14:22:29'),
(8, 'Stipe', 'Stalk', '', 'P 7 How to Know the Non-Gilled Fleshy Fungi Smith & Smith', 2, '2023-03-23 14:23:02'),
(9, 'Gills', 'Lamellae', '', 'P 3 How to Know the Non-Gilled Fleshy Fungi Smith & Smith', 2, '2023-03-23 14:30:30'),
(10, 'Volva', 'cup', '', 'P 3 How to Know the Non-Gilled Fleshy Fungi Smith & Smith', 2, '2023-03-23 14:31:12'),
(11, 'Annulus', 'ring', '', 'P 3 How to Know the Non-Gilled Fleshy Fungi Smith & Smith', 2, '2023-03-23 14:32:15'),
(12, 'cone', 'conical', '', '5', 1, '2023-03-30 11:30:26'),
(13, 'conic', 'conical', '', '5', 1, '2023-03-30 11:30:26'),
(14, 'disc', 'center', '', '5', 1, '2023-03-30 11:30:26'),
(15, 'margin', 'edge', '', '5', 1, '2023-03-30 11:30:26'),
(16, 'ring', 'annulus', '', '5', 1, '2023-03-30 11:30:26'),
(17, 'stem', 'stipe', '', '5', 1, '2023-03-30 11:30:26'),
(18, 'volva', 'cup', '', '5', 1, '2023-03-30 11:30:26'),
(19, 'convex', 'evenly rounded', '', '5', 1, '2023-03-30 11:30:26'),
(20, 'ovoid', 'egg', '', '5', 1, '2023-03-30 11:30:26'),
(21, 'campanulate', 'bell-shaped', '', '5', 1, '2023-03-30 11:30:26'),
(22, 'parabolic', 'half-egg', '', '5', 1, '2023-03-30 11:30:26'),
(23, 'pulvinate', 'cushion', '', '5', 1, '2023-03-30 11:30:26'),
(24, 'cylindric', 'bullet', '', '5', 1, '2023-03-30 11:30:26'),
(25, 'plane', 'flat', '', '5', 1, '2023-03-30 11:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `taste`
--

CREATE TABLE `taste` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taste`
--

INSERT INTO `taste` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2023-02-20 18:33:00'),
(2, 'None', '', '', '5', 1, '2023-02-21 08:10:26'),
(3, 'Mild', '', '', '5', 1, '2023-02-21 08:10:26'),
(4, 'Bitter', '', '', '5', 1, '2023-02-21 08:10:26'),
(5, 'Acrid (=puckery? astringent)/Peppery', '', '', '5', 1, '2023-02-21 08:10:26'),
(6, 'Agreeable', '', '', '5', 1, '2023-02-21 08:10:26'),
(7, 'Farinaceous (like fresh meal)', '', '', '5', 1, '2023-02-21 08:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `token_id` int UNSIGNED NOT NULL,
  `token_user` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_token` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`token_id`, `token_user`, `token_token`, `token_date_entered`) VALUES
(14, '1', '8377ca418f4942df767e0549f4ba5031f0f2537945d90d475b734c5344a5a02cf82c7bc74dc0f6404cce9829dc136b080021c9a295e76b2712d2f0e529cef05ca6cc7c74fc8e87cb9a8a9c3a4e77413cc1789432deebf13810ab870b7d55d1d8cd7fdd378c7258aec867c9f54d8523b9024cb06f0dff0c1f53e62d2a0c6a99ba', '2024-04-02 15:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `toxic`
--

CREATE TABLE `toxic` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toxic`
--

INSERT INTO `toxic` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 2, '2023-03-21 17:48:13'),
(2, 'Not Toxic', '', '', '', 2, '2023-03-21 17:48:38'),
(3, 'Toxic', '', '', '', 2, '2023-03-21 17:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `universal_outer_veil_appearance`
--

CREATE TABLE `universal_outer_veil_appearance` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universal_outer_veil_appearance`
--

INSERT INTO `universal_outer_veil_appearance` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 15:00:00'),
(2, 'Two Rings (from 2 veils)', '', '', '5', 1, '2024-03-01 15:00:00'),
(3, 'Doubly-flared Ring', '', '', '5', 1, '2024-03-01 15:00:00'),
(4, '\"Cogwheel\" Stellate', '', '', '5', 1, '2024-03-01 15:00:00'),
(5, 'Floccose (downy tuffs)', '', '', '5', 1, '2024-03-01 15:00:00'),
(6, 'Cortinate PV & Fibrillose Annular Zone', '', '', '5', 1, '2024-03-01 15:00:00'),
(7, 'Single Ring thick on edge', '', '', '5', 1, '2024-03-01 15:00:00'),
(8, 'Pendant (hanging)', '', '', '5', 1, '2024-03-01 15:00:00'),
(9, 'Subperonate', '', '', '5', 1, '2024-03-01 15:00:00'),
(10, 'Peronate (w/\"boot\")', '', '', '5', 1, '2024-03-01 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `universal_outer_veil_fate`
--

CREATE TABLE `universal_outer_veil_fate` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universal_outer_veil_fate`
--

INSERT INTO `universal_outer_veil_fate` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 15:00:00'),
(2, 'Disappearing', '', '', '5', 1, '2024-03-01 15:00:00'),
(3, 'Leaving fragments on cap', '', '', '5', 1, '2024-03-01 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `universal_outer_veil_texture`
--

CREATE TABLE `universal_outer_veil_texture` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universal_outer_veil_texture`
--

INSERT INTO `universal_outer_veil_texture` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2024-03-01 15:00:00'),
(2, 'Membranous (skin-like)', '', '', '5', 1, '2024-03-01 15:00:00'),
(3, 'Cortinate (cobwebby)', '', '', '5', 1, '2024-03-01 15:00:00'),
(4, 'Fibillose (thready)', '', '', '5', 1, '2024-03-01 15:00:00'),
(5, 'Gelatinous (slimy)', '', '', '5', 1, '2024-03-01 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `veil`
--

CREATE TABLE `veil` (
  `id` int NOT NULL,
  `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entered_by` int NOT NULL,
  `date_entered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `veil`
--

INSERT INTO `veil` (`id`, `name`, `description`, `comments`, `source`, `entered_by`, `date_entered`) VALUES
(1, 'Not Entered', '', '', '', 1, '2023-02-20 18:33:00'),
(2, 'Flaring', 'The annulus is flaring upwards.', '', '7', 1, '2021-11-14 13:33:00'),
(3, 'Pendant', 'The veil is hanging downward from the stipe.', '', '7', 1, '2021-11-14 13:33:00'),
(4, 'Double Rings', 'Two visible veils..', '', '7', 1, '2021-11-14 13:33:00'),
(5, 'Ring Zone', 'The stipe is marked with the reminance of the ananulus', '', '7', 1, '2021-11-14 13:33:00'),
(6, 'Cortinate', 'The partial veil is cobweb-like or tread-like (Fibrillose)..', '', '7', 1, '2021-11-14 13:33:00'),
(7, 'Stellate', 'The partial veil resembles a cogwheel.', '', '7', 1, '2021-11-14 13:33:00'),
(8, 'Floccose', 'The partial veil is fluffy and down-like.', '', '7', 1, '2021-11-14 13:33:00'),
(9, 'Peronate', 'The stipe resembles a shealth-like boot or stocking', '', '7', 1, '2021-11-14 13:33:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abundance`
--
ALTER TABLE `abundance`
  ADD UNIQUE KEY `Index on id` (`id`);

--
-- Indexes for table `annulus_position`
--
ALTER TABLE `annulus_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulb_type`
--
ALTER TABLE `bulb_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `cap_context_flesh_texture`
--
ALTER TABLE `cap_context_flesh_texture`
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id Index` (`id`);

--
-- Indexes for table `cap_margin_shape`
--
ALTER TABLE `cap_margin_shape`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `cap_margin_type`
--
ALTER TABLE `cap_margin_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `cap_shape`
--
ALTER TABLE `cap_shape`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `cap_shape_top_view`
--
ALTER TABLE `cap_shape_top_view`
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id index` (`id`);

--
-- Indexes for table `cap_surface_dryness`
--
ALTER TABLE `cap_surface_dryness`
  ADD UNIQUE KEY `unique_id` (`id`);

--
-- Indexes for table `cap_surface_texture`
--
ALTER TABLE `cap_surface_texture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name_unique` (`name`);

--
-- Indexes for table `chem_reaction`
--
ALTER TABLE `chem_reaction`
  ADD UNIQUE KEY `Index on id` (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD UNIQUE KEY `Unique ID` (`id`),
  ADD KEY `Index on ID` (`id`);

--
-- Indexes for table `data_source`
--
ALTER TABLE `data_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_source_data_type`
--
ALTER TABLE `data_source_data_type`
  ADD UNIQUE KEY `Index on id` (`id`);

--
-- Indexes for table `display_options`
--
ALTER TABLE `display_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `fungus_type`
--
ALTER TABLE `fungus_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `genus`
--
ALTER TABLE `genus`
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `gill_attachment`
--
ALTER TABLE `gill_attachment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `gill_breadth`
--
ALTER TABLE `gill_breadth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `gill_context_flesh_latex_abundance`
--
ALTER TABLE `gill_context_flesh_latex_abundance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `gill_edges`
--
ALTER TABLE `gill_edges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `gill_misc`
--
ALTER TABLE `gill_misc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `gill_spacing`
--
ALTER TABLE `gill_spacing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `gill_thickness`
--
ALTER TABLE `gill_thickness`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `habit`
--
ALTER TABLE `habit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `habitat`
--
ALTER TABLE `habitat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `images_thumbnail`
--
ALTER TABLE `images_thumbnail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lens`
--
ALTER TABLE `lens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `member_list_groups`
--
ALTER TABLE `member_list_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_type`
--
ALTER TABLE `member_type`
  ADD PRIMARY KEY (`member_type_id`);

--
-- Indexes for table `odor`
--
ALTER TABLE `odor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `partial_inner_veil_appearance`
--
ALTER TABLE `partial_inner_veil_appearance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `partial_inner_veil_fate`
--
ALTER TABLE `partial_inner_veil_fate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `partial_inner_veil_texture`
--
ALTER TABLE `partial_inner_veil_texture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `partial_inter_veil_annulus_ring_position`
--
ALTER TABLE `partial_inter_veil_annulus_ring_position`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `plant_association`
--
ALTER TABLE `plant_association`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `preservation_method`
--
ALTER TABLE `preservation_method`
  ADD UNIQUE KEY `Index on id` (`id`);

--
-- Indexes for table `soil_type`
--
ALTER TABLE `soil_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `specimens`
--
ALTER TABLE `specimens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specimen_age`
--
ALTER TABLE `specimen_age`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `specimen_characters`
--
ALTER TABLE `specimen_characters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specimen_character_ids_unique` (`specimen_id`,`character_id`);

--
-- Indexes for table `specimen_cluster`
--
ALTER TABLE `specimen_cluster`
  ADD UNIQUE KEY `Unique id` (`id`);

--
-- Indexes for table `specimen_group`
--
ALTER TABLE `specimen_group`
  ADD UNIQUE KEY `Unique id` (`id`);

--
-- Indexes for table `specimen_location_now`
--
ALTER TABLE `specimen_location_now`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD UNIQUE KEY `Index on ID` (`id`);

--
-- Indexes for table `stem_interior`
--
ALTER TABLE `stem_interior`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `stem_location`
--
ALTER TABLE `stem_location`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `stem_shape`
--
ALTER TABLE `stem_shape`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `stem_texture`
--
ALTER TABLE `stem_texture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `synonyms`
--
ALTER TABLE `synonyms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `taste`
--
ALTER TABLE `taste`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token_id`),
  ADD UNIQUE KEY `mushroom_token_user` (`token_user`);

--
-- Indexes for table `universal_outer_veil_appearance`
--
ALTER TABLE `universal_outer_veil_appearance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `universal_outer_veil_fate`
--
ALTER TABLE `universal_outer_veil_fate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `universal_outer_veil_texture`
--
ALTER TABLE `universal_outer_veil_texture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- Indexes for table `veil`
--
ALTER TABLE `veil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abundance`
--
ALTER TABLE `abundance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `annulus_position`
--
ALTER TABLE `annulus_position`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cap_margin_shape`
--
ALTER TABLE `cap_margin_shape`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cap_margin_type`
--
ALTER TABLE `cap_margin_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cap_surface_texture`
--
ALTER TABLE `cap_surface_texture`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `data_source`
--
ALTER TABLE `data_source`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `data_source_data_type`
--
ALTER TABLE `data_source_data_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `display_options`
--
ALTER TABLE `display_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fungus_type`
--
ALTER TABLE `fungus_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genus`
--
ALTER TABLE `genus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `gill_spacing`
--
ALTER TABLE `gill_spacing`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `habit`
--
ALTER TABLE `habit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `habitat`
--
ALTER TABLE `habitat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images_thumbnail`
--
ALTER TABLE `images_thumbnail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lens`
--
ALTER TABLE `lens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `member_list_groups`
--
ALTER TABLE `member_list_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `member_type`
--
ALTER TABLE `member_type`
  MODIFY `member_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `odor`
--
ALTER TABLE `odor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `partial_inter_veil_annulus_ring_position`
--
ALTER TABLE `partial_inter_veil_annulus_ring_position`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `preservation_method`
--
ALTER TABLE `preservation_method`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `soil_type`
--
ALTER TABLE `soil_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specimens`
--
ALTER TABLE `specimens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specimen_age`
--
ALTER TABLE `specimen_age`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specimen_characters`
--
ALTER TABLE `specimen_characters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specimen_group`
--
ALTER TABLE `specimen_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `specimen_location_now`
--
ALTER TABLE `specimen_location_now`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `synonyms`
--
ALTER TABLE `synonyms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `taste`
--
ALTER TABLE `taste`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `token_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `veil`
--
ALTER TABLE `veil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
