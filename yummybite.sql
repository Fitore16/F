
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 11:05 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yummybite`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullName` varchar(60) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullName`, `subject`, `email`, `message`, `created_at`) VALUES
(3, 'test test', 'test', 'etsetse@gmail.com', 'test', '2022-01-29 17:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `directions` varchar(255) NOT NULL,
  `readyIn` int(11) NOT NULL,
  `addedBy` varchar(60) NOT NULL,
  `image` longtext NOT NULL,
  `isHealthy` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `ingredients`, `directions`, `readyIn`, `addedBy`, `image`, `isHealthy`, `created_at`) VALUES
(11, 'Bourbon Chicken', '2 lbs boneless chicken breasts cut into bite-size pieces,\n1-2 tablespoon olive oil,\n1 garlic clove crushed,\n1/4 teaspoon ginger,\n3⁄4 teaspoon crushed red pepper flakes,\n1⁄4 cup apple juice', 'Heat oil in a large skillet.\r\nAdd chicken pieces and cook until lightly browned.\r\nRemove chicken.\r\nAdd remaining ingredients, heating over medium Heat until well mixed and dissolved.', 35, 'Admin', 'MwuCd6HpQ5mDvn4OLRkA_0S9A9886.jpg', 0, '2022-01-29 14:35:51'),
(12, 'Banana Bread', '1⁄2 cup butter softened,\r\n1 cup granulated sugar,\r\n2 eggs beaten,\r\n3 bananas finely crushed,\r\n1 cup all-purpose flour,\r\n1 teaspoon baking soda,\r\n1⁄2 teaspoon salt,\r\n1⁄2 teaspoon vanilla', 'Remove odd pots and pans from oven.\r\nPreheat oven to 350º / 180º.\r\nCream together butter and sugar.\r\nAdd eggs and crushed bananas.\r\nCombine well.', 70, 'Admin', '5458761_16x9.jpg', 0, '2022-01-29 14:40:14'),
(13, 'Oatmeal Raisin Cookies', '2 cups all-purpose flour,\r\n1 teaspoon baking soda,\r\n1 teaspoon baking powder,\r\n1 teaspoon kosher salt', 'Preheat oven to 350°.\r\nWhisk dry ingredients; set aside.\r\nCombine wet ingredients with a hand mixer on low.\r\nTo cream, increase speed to high and beat until fluffy and the color lightens.\r\nStir the flour mixture into the creamed mixture until no flour is ', 26, 'Admin', '0279066_16x9.jpg', 0, '2022-01-29 14:43:27'),
(14, 'Crock-Pot Chicken With Black Beans', '4 -5 boneless chicken breasts frozen,\r\n(15 1/2 ounce) can black beans,\r\n(15 ounce) can corn,\r\n(15 ounce) jar salsa any kind,\r\n(8 ounce) package cream cheese', 'Take 4-5 frozen, yes, frozen, boneless chicken breasts put into crock pot.\r\nAdd 1 can of black beans, drained, 1 jar of salsa, 1 can of corn drained.\r\nKeep in crock pot on high for about 4-5 hours or until chicken is cooked.', 243, 'Admin', 'uxMwt1VGQ5m2ePyzwHWy_salsa-chicken-black-beans-2312.jpg', 0, '2022-01-29 14:46:00'),
(15, 'Charred Jalapeno Poppers', '10 fresh jalapeno peppers,\r\n8 ounces cream cheese,\r\n1 lb bacon,\r\n20 toothpicks', 'Halve and seed the jalapenos.\r\nRoast on a hot grill just until skins start to turn dark.\r\nSlice the bacon strips in half.\r\nFill the jalapeno halves with cream cheese.\r\nWrap halves with bacon and secure with a toothpick.', 70, 'Admin', 'vg8BDoNDTSGth1px0xDq_jalepeno poppers SITE-1.jpg', 0, '2022-01-29 14:47:11'),
(16, 'Kellys Chili', '3 lbs hamburger,\r\n1 green pepper diced,\r\n1 red pepper diced,\r\n1 medium onion diced,\r\n3-4 fresh jalapenos chopped small', 'Stir and bring just to a low simmer, reduce heat and cook for at least 1-2 hours in a crockpot Thick, rich and slightly sweet/slightly hot, very unique!', 80, 'Admin', 'Iskw59BqQRq4DcfWKB3c_0S9A5747.jpg', 0, '2022-01-29 14:48:51'),
(17, 'Scalloped Potatoes', '4 cups thinly sliced potatoes,\r\n3 tablespoons butter,\r\n3 tablespoons flour,\r\n1 1⁄2 cups milk,\r\n1 teaspoon salt,\r\n1 dash cayenne pepper', 'In a small sauce pan, melt butter and blend in flour.\r\nLet sit for a minute.\r\nAdd all of cold milk, stirring with a whisk.\r\nSeason with salt and cayenne.\r\nCook sauce on low until smooth and boiling, stirring occasionally with a whisk.', 75, 'Admin', '5458742_16x9.jpg', 0, '2022-01-29 14:51:18'),
(18, 'Creamy Burrito Casserole', '1 lb ground beef or 1 lb ground turkey,\r\n1⁄2 medium yellow onion chopped,\r\n1 (1 1/4 ounce) package taco seasoning,\r\n6 large flour tortillas,\r\n(16 ounce) can refried beans', 'Brown ground meat/turkey & onion; drain.\r\nAdd taco seasoning and stir in refried beans.\r\nMix soup and sour cream in a separate bowl.\r\nSpread 1/2 sour cream mixture in the bottom of a casserole dish.', 50, 'Admin', '0279068_16x9.jpg', 0, '2022-01-29 14:52:55'),
(19, 'Honey ginger grilled Salmon', '1 teaspoon ground ginger,\r\n1 teaspoon garlic powder,\r\n1⁄3 cup reduced sodium soy sauce,\r\n1⁄3 cup orange juice', 'In a large self-closing plastic bag, combine first six ingredients; mix well.\r\nPlace salmon in bag and seal tightly.\r\nTurn bag gently to distribute marinade.\r\nRefrigerate 15 minutes or up to 30 minutes for stronger flavor.', 35, 'Admin', 'cg72v2oVSFO84VtIfgZb_Honey Ginger Grilled Salmon_final_3.jpg', 1, '2022-01-29 14:55:51'),
(20, 'citrusy kale salad with blueberries', '1 bunch curly kale,\r\n2 tablespoons extra olive oil,\r\n3⁄4 teaspoon sea salt,\r\n1 lemon juice and zest of,\r\n1 orange juice and zest of', 'Place kale in a large bowl and drizzle 1 tablespoon olive oil and salt into leaves, massaging with hands. Do this for a few minutes, massaging the olive oil well into the leaves. Set aside. (Leaves should begin to wilt a little.).', 20, 'Admin', 'MwrTLl9tTi5LzTfU9XdA_kale salad-9820.jpg', 1, '2022-01-29 14:58:18'),
(21, 'Cheesy chicken salad', '1 cup cooked boneless skinless chicken breast cubed,\r\n1⁄4 cup celery finely chopped,\r\n1⁄4 cup carrot shaved into ribbons', 'Mix all ingredients in a bowl so that everything is coated well with the mayonnaise mixture.\r\nChill in the fridge for at least 30 minutes but you could do it the night before.', 35, 'Admin', 'bQuhmloQzeBej2wYRgG5_0S9A0399.jpg', 1, '2022-01-29 14:59:33'),
(22, 'Cabbage Soup', '3 cups nonfat vegetable broth,\r\n2 garlic cloves, minced,\r\n1 tablespoon tomato paste,\r\n2 cups chopped cabbage', 'Spray pot with non stick cooking spray saute onions carrots and garlic for 5 minutes.\r\nAdd broth, Tomato paste, cabbage, green beans, basil, oregano and Salt & Pepper to taste.', 32, 'Admin', 'tunMZv24R9W8wsDTVD68_cabbage soup (1 of 4).jpg', 1, '2022-01-29 15:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(3, 'testing', '$2y$10$/eqafGwVbNrMbWpz20/fTOjLDeKHr03Jq5TmVBYYOUlgteFawbpw2', 'user', '2022-01-27 19:00:39'),
(4, 'Admin', '$2y$10$p.jmfqQiWpYzuAuN0.pwtOEoyOStRQdASZVoevBzyRjgtqWH6QFLS', 'admin', '2022-01-28 17:36:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
