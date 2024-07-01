-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 11:26 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Whey protein'),
(2, 'Casein protein'),
(3, 'Egg protein'),
(4, 'Pea protein'),
(5, 'Hemp protein'),
(6, 'Brown rice protein'),
(7, 'Mixed plant proteins'),
(8, 'aerobic fitness equipment'),
(9, 'power training equipment'),
(10, 'GYM Equipments');

-- --------------------------------------------------------

--
-- Table structure for table `equiparchive`
--

CREATE TABLE `equiparchive` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `visible` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `visible` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `category_id`, `name`, `description`, `slug`, `photo`, `quantity`, `visible`) VALUES
(1, 10, 'Adjustable Weight Bench - Utility Weight Benches for Full Body Workout', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>K KiNGKANG</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>14 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material</td>\r\n			<td>Leather</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color</td>\r\n			<td>DZ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Product Dimensions</td>\r\n			<td>51.57&quot;D x 13.4&quot;W x 31.5&quot;H</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Frame Material</td>\r\n			<td>Iron</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Weight Limit</td>\r\n			<td>660 Pounds</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>âœ…ADJUSTABLE WEIGHT BENCH : Adjustable weight beach has 7 backrest pad positions to meet all you need when workout. The adjustable weight rack is ideal for working out and training on your chest, shoulders, back, abs, and more for Home Gym.</li>\r\n	<li>âœ…COMFORTABLE &amp; ERGONOMIC DESIGN : Comfortable high-density foam padding and seat secures body firmly and reducing muscle fatigue during workout. This Weight Bench Features a soft leather which is filled with dense foam padding so it is comfortable to do multiple exercises.</li>\r\n	<li>âœ…EASY ASSEMBLY : Most of the bench is pre-assembled for convenience, coming with installation tools. You can finish the assembly quickly and enjoy your bench workout at home.</li>\r\n	<li>âœ…SIZE &amp; SAVE SPACE : Can be folded and stored. Folded size: 51.57 x 13.4 x 11 inches. Expanded dimensions: 51.57&quot; length x 13.4&quot; width x 31.5 inches height. Adjustable weight bench is simple to assemble and easy to carry and store.</li>\r\n	<li>âœ…Note : The set of adjustable weight bench doesn&#39;t include leg weights, The leg weight rod can match the weight block with the inner hole of 1in and the max diameter of 8.7in.</li>\r\n</ul>\r\n', 'adjustable-weight-bench-utility-weight-benches-full-body-workout', 'adjustable-weight-bench-utility-weight-benches-full-body-workout.jpg', 2, 0),
(2, 10, 'Bowflex SelectTech 552 Adjustable Dumbbells', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>ZYCKWXS</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color</td>\r\n			<td>YELLOW-22LBS</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>10 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material</td>\r\n			<td>Neoprene</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Feature</td>\r\n			<td>20lbs,Adjustable,Adjustable-dumbbells-set</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Use for</td>\r\n			<td>Neck</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Product Dimensions</td>\r\n			<td>16&quot;L x 8&quot;W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Style</td>\r\n			<td>Adjustable</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Handle Diameter</td>\r\n			<td>1.25 inch</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Handle Material</td>\r\n			<td>Alloy Steel</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>ã€ADJUSTABLE DUMBBELLSã€‘ï¼šAre you tired of the limited workout options at home? Upgrade your fitness routine with ZYCKWXS&#39;s adjustable dumbbell set! Our weight plates are filled with iron sand and wrapped with high-grade PE materials to prevent damage to your floors and rust. The thickened foam connecting rod conforms to ergonomic design and reduces pressure on your shoulders, preventing sports injuries.</li>\r\n	<li>ã€3 IN 1 SINGLEã€‘ :This 20 lbs fitness dumbbell set includes 4 &times; 2.75lbs weight plates, 4x2.2lbs weight plates,4x dumbbell nuts, 1x connector, and 2x dumbbell bar, giving you the freedom to choose different weights to meet the intensity needs of you and your family at different stages of exercise. With three modes of use, you can switch between dumbbell, light barbell, and heavy barbell exercises, offering you the versatility you need to achieve your fitness goals.</li>\r\n	<li>ã€HOME GYMã€‘ï¼šInvest in the best home fitness equipment available and build your own personal gym. With ZYCKWXS&#39;s adjustable dumbbell set, you can carry out a variety of balance strength training to help exercise your biceps brachii, leg, and abdominal muscles. Additionally, this set helps maintain low blood fat and increase oxygen intake, leading to a healthier body.</li>\r\n	<li>ã€COMFORTABLE GRIPã€‘ï¼šTake your workout to the next level with our barbell weight set. Whether you&#39;re looking to build muscle, tone your body, or simply stay in shape, our weights are the perfect tool for the job. The adjustable weight plates and comfortable foam handles make it easy to switch between exercises and focus on your fitness goals.</li>\r\n	<li>ã€TAKE UP LESS SPACEã€‘ï¼šOur adjustable dumbbell set is easy to assemble and store, making it perfect for anyone who wants to improve their fitness routine without taking up too much space. Whether you&#39;re an experienced athlete or a beginner, this set is perfect for you. Plus, with our satisfaction guarantee, you can rest assured that you&#39;re making a risk-free investment in your health and fitness. Don&#39;t wait any longer, click &quot;add to cart&quot; now and start your fitness journey with ZYCKWXS!</li>\r\n</ul>\r\n', 'bowflex-selecttech-552-adjustable-dumbbells', 'bowflex-selecttech-552-adjustable-dumbbells_1681932964.jpg', 4, 0),
(3, 10, ' Basics Rubber Encased Hex Dumbbell Hand Weight', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Amazon Basics</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color</td>\r\n			<td>Black &amp; Silver</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>15 Pounds</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material</td>\r\n			<td>Cast Iron, Rubber</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Use for</td>\r\n			<td>Hand</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Product Dimensions</td>\r\n			<td>12&quot;L x 4.5&quot;W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Style</td>\r\n			<td>15 lb</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Handle Diameter</td>\r\n			<td>1 38 inch</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Handle Material</td>\r\n			<td>Rubber</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Number of Pieces</td>\r\n			<td>1</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>15 pound individual dumbbell weight with a solid cast iron core for exercise and strength training</li>\r\n	<li>Ideal for use in fitness classes, home gym or workout area</li>\r\n	<li>Hexagonal rubber-encased ends help prevent rolling and promote stay-in-place storage</li>\r\n	<li>Non-slip textural grip for reliable, comfortable use</li>\r\n	<li>Dimensions: 12 x 4.5 x 4 inches (LxWxH) with 1.38-inch grip diameter; weighs 15 pounds</li>\r\n</ul>\r\n', 'basics-rubber-encased-hex-dumbbell-hand-weight', 'basics-rubber-encased-hex-dumbbell-hand-weight.jpg', 10, 0),
(4, 10, 'Basics Cast Iron Kettlebell Weight', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>15 Pounds</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Amazon Basics</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color</td>\r\n			<td>Black</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material</td>\r\n			<td>Cast Iron</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Dimensions LxWxH</td>\r\n			<td>7 x 4 x 7.5 inches</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Kettlebell supports a wide range of resistance training exercises</li>\r\n	<li>Includes a 15 pound kettlebell made of solid cast iron for built-to-last strength</li>\r\n	<li>Black enamel finish for increased durability and corrosion protection</li>\r\n	<li>Textured wide handle helps ensure a comfortable, secure grip; hold with one hand or two</li>\r\n	<li>Product dimensions: 7 x 4 x 7.5 inches (LxWxH)</li>\r\n</ul>\r\n', 'basics-cast-iron-kettlebell-weight', 'basics-cast-iron-kettlebell-weight.jpg', 10, 0),
(5, 10, 'Basics Vinyl Coated Hand Weight Dumbbell Pair', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Amazon Basics</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color</td>\r\n			<td>Teal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>13.5 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material</td>\r\n			<td>Vinyl, Alloy Steel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Use for</td>\r\n			<td>Hand</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Product Dimensions</td>\r\n			<td>9.8&quot;L x 4.6&quot;W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Style</td>\r\n			<td>15 lbs Set</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Handle Material</td>\r\n			<td>Alloy Steel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Number of Pieces</td>\r\n			<td>2</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Dumbbell hand weights for everyday fitness; great for a variety of workout routines</li>\r\n	<li>Includes 2 dumbbells, 15 pounds each (30 pounds total)</li>\r\n	<li>Durable steel construction with teal vinyl exterior for a secure, non-slip grip</li>\r\n	<li>Printed weight number on each end cap for quick identification</li>\r\n	<li>Hexagonal shape prevents dumbbells from rolling away</li>\r\n	<li>Product dimensions: approximately 9.8 x 4 x 4 inches (LxWxH)</li>\r\n</ul>\r\n', 'basics-vinyl-coated-hand-weight-dumbbell-pair', 'basics-vinyl-coated-hand-weight-dumbbell-pair.jpg', 10, 0),
(6, 10, 'Vinsguir Ab Roller for Abs Workout, Exercise Equipment', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>VINSGUIR</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color</td>\r\n			<td>Black</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material</td>\r\n			<td>Plastic</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Style</td>\r\n			<td>Protection</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum Weight Recommendation</td>\r\n			<td>500 Pounds</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>ã€More Accessible &amp; Hassle Freeã€‘The 3.2 inch dual-wheel ab roller offers extra support and stability compared to the common single ab wheel. Equipped with a knee pad, this ab roller wheel delivers comfortable workout experience and caring protection. Just embrace the freedom of more thrilling and challenging routines without the hassle of using resistance bands!</li>\r\n	<li>ã€Grow Six Packs Faster &amp; Saferã€‘The Vinsguir abs wheel targets your abdominals, hip flexors and back muscles. With dedicated practice, this exercise wheel will speed up your core &amp; low back strengthening while lessoning your risk of muscle injury.</li>\r\n	<li>ã€Efficient Exercise Equipmentã€‘Unlike big gym machines, or heavy weight benches, dumbbells and the like, the Vinsguir ab wheel roller is portable size-wise -- a compact design that enables you to take it anywhere to exercise, be it your home, office, gym, or outdoors</li>\r\n	<li>ã€Amazingly Durable &amp; Stableã€‘The high-strength stainless steel shaft of the ab roller for abs workout can hold a maximum weight of 500 pounds for your safety. The 3.2 inch ultra-wide abs roller ensures balance and stability as it does not deviate sideways. EVA rubber cotton handles provide nonslip and comfortable grip</li>\r\n</ul>\r\n', 'vinsguir-ab-roller-abs-workout-exercise-equipment', 'vinsguir-ab-roller-abs-workout-exercise-equipment_1681933204.jpg', 5, 0),
(7, 1, 'Sunny Health & Fitness Power Zone Strength Rack Power Cage', '<ul>\r\n	<li>ULTRA STRENGTH AND DURABILITY: Capable of carrying a max weight of 1000 LB, the Power Zone Power Cage is for serious strength training enthusiasts.</li>\r\n	<li>SPOTTER BARS: You will always have a spotter in the Power Zone Power Cage with safety lock latches for ease of mind and safety assurance when squatting with heavier weights.</li>\r\n	<li>HIGH WEIGHT CAPACITY: Having one of the highest max weight capacities for a home workout exercise flat weight bench at 550 LB, the Powerzone lets you push your gains further.</li>\r\n	<li>DUMBBELL RACK: The frame mounted dumbbell rack helps you to store your dumbbell sets in a safe and convenient fashion. Never end up stubbing your foot on a loose dumbbell again!</li>\r\n	<li>HIGH MAX WEIGHT: Superior build and engineering allow for this Lat Pulldown Attachment to carry up to 200 LBS maximum weight.</li>\r\n	<li>UPRIGHT ROWS: The counterweight also helps you with curls and underarm upright rows. Located near your feet, the upright handlebars help to provide a comprehensive total upper body workout.</li>\r\n</ul>\r\n', 'sunny-health-fitness-power-zone-strength-rack-power-cage', 'sunny-health-fitness-power-zone-strength-rack-power-cage.jpg', 4, 0),
(8, 10, 'Marcy 150-lb Multifunctional ', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>125 Pounds</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Marcy</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color</td>\r\n			<td>Black</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material</td>\r\n			<td>Steel, Vinyl, Foam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Dimensions LxWxH</td>\r\n			<td>68 x 42 x 78 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Handle Type</td>\r\n			<td>Pulldown, D Type</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum Weight Recommendation</td>\r\n			<td>136 Kilograms</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>PREMIUM STEEL CONSTRUCTION &ndash; This home gym system is made with heavy-duty steel tubing and reinforced with guard rods that hold weight in place during workouts.</li>\r\n	<li>WEIGHT STACK LOCK &ndash; This gear comes with a 150-pound selectorized weight stack that can be customized according to your skill level to avoid the stresses of loading and unloading weight plates with a safety lock that prevents unauthorized use of equipment</li>\r\n	<li>DUAL ACTION PRESS ARMS-Designed with dual action press arms, this versatile equipment allows you to perform chest press and vertical butterfly exercises to develop your biceps, triceps, pectorals, and other muscles with a simple remove/insertion of a pin</li>\r\n	<li>REMOVEABLE CURL PAD &ndash; This home gym machine features ergonomically designed seats with high-density boxed upholstery to reduce tension and impact. The preacher curl bicep pad is removable and adjustable to allow isolated bicep exercises.</li>\r\n	<li>CONVENIENT HOME GYM- enjoy efficient training right in the comfort of home with this equipment featuring an innovative structure that combines arm and leg stations; great for strengthening muscle groups and achieving a comprehensive total-body workout.</li>\r\n	<li>Assembled Dimensions: 68&rdquo;L x 42&rdquo;W x 78&rdquo;H || Maximum Weight Capacity: 300lb</li>\r\n	<li>Burn calories and increase lean muscle mass. Resistance training not only builds lean and powerful muscles, it also increases your metabolic rate, allowing you to burn more calories and lose unwanted weight.</li>\r\n</ul>\r\n', 'marcy-150-lb-multifunctional', 'marcy-150-lb-multifunctional.jpg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `supply_id` int(11) NOT NULL,
  `suppliers_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `stock_type` int(11) NOT NULL COMMENT '1= in , 2 = out	',
  `amount` double NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `supply_id`, `suppliers_id`, `customer_id`, `qty`, `stock_type`, `amount`, `date_created`) VALUES
(1, 1, 7, 0, 50, 1, 300, '2023-04-20'),
(2, 2, 2, 0, 50, 1, 1000, '2023-04-20'),
(3, 3, 1, 0, 40, 1, 1000, '2023-04-20'),
(4, 4, 2, 0, 50, 1, 1500, '2023-04-21'),
(5, 5, 4, 0, 10, 1, 1800, '2023-04-20'),
(6, 6, 5, 0, 50, 1, 700, '2023-04-20'),
(7, 7, 1, 0, 40, 1, 800, '2023-04-20'),
(8, 8, 2, 0, 30, 1, 2000, '2023-04-20'),
(9, 9, 6, 0, 5, 1, 1500, '2023-04-20'),
(10, 10, 10, 0, 50, 1, 900, '2023-04-20'),
(11, 9, 0, 4, 5, 2, 2924, '2023-04-20'),
(12, 1, 0, 6, 5, 2, 500, '2023-04-20'),
(13, 10, 0, 6, 10, 2, 1856, '2023-04-20'),
(14, 2, 0, 5, 5, 2, 2081, '2023-04-20'),
(15, 10, 0, 5, 5, 2, 1856, '2023-04-20'),
(16, 5, 0, 6, 1, 2, 2474, '2023-04-19'),
(17, 1, 0, 5, 5, 2, 1631, '2023-04-19'),
(18, 6, 0, 3, 10, 2, 1631, '2023-04-20'),
(19, 8, 0, 3, 5, 2, 3656, '2023-04-20'),
(20, 3, 0, 5, 5, 2, 1968, '2023-04-20'),
(21, 1, 0, 5, 10, 2, 2868, '2023-04-20'),
(22, 7, 0, 5, 15, 2, 1631, '2023-04-20'),
(23, 4, 0, 2, 9, 2, 2868, '2023-04-21'),
(24, 3, 4, 0, 5, 1, 800, '2023-04-19'),
(25, 1, 0, 2, 2, 2, 500, '2023-04-20'),
(26, 3, 0, 2, 3, 2, 1968, '2023-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `prodarchive`
--

CREATE TABLE `prodarchive` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `visible` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `visible` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `visible`) VALUES
(1, 1, 'GHOST WHEY Protein Powder, Peanut Butter Cereal Milk ', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>GHOST</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flavor</td>\r\n			<td>Peanut Butter Cereal Milk</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Gluten Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Protein Source</td>\r\n			<td>Whey</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Unit Count</td>\r\n			<td>32 Ounce</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Versatile and Delicious AF: GHOST WHEY protein combines a premium, fully disclosed whey protein blend, a few digestive enzymes, and out-of-this-world Peanut Butter Cereal Milk flavor. 26 servings.</li>\r\n	<li>26G Whey Protein: Every scoop of GHOST Peanut Butter Cereal Milk Whey contains 26G of pure, fully disclosed whey protein. Flip the tub around for a breakdown of exactly how many grams of whey protein isolate, concentrate, and hydrolysate are in every scoop.</li>\r\n	<li>Soy and Gluten Free: While most brands use soy lecithinated whey protein, we opted to use only sunflower lecithinated whey protein. Why? For starters, soy is one of the common allergens on the market today. Additionally, soy contains phytoestrogens that mimic the body&rsquo;s natural estrogen hormones, which isn&rsquo;t great for anyone. And ZERO gluten. Enough said.</li>\r\n	<li>Total Transparency: All GHOST products feature a transparent label that fully discloses the dose of each active ingredient. Zero proprietary blends means you know what you&rsquo;re getting in each and every scoop.</li>\r\n	<li>BE SEEN: As a premium active lifestyle brand, GHOST is powering and empowering users to BE SEEN beyond the walls of the gym. The name GHOST and mantra &ldquo;BE SEEN&rdquo; come from that feeling of being behind the scenes and wanting to be heard, waiting to make an impact. We&rsquo;re all Ghosts. This is our time.</li>\r\n</ul>\r\n', 'ghost-whey-protein-powder-peanut-butter-cereal-milk', 500, 'ghost-whey-protein-powder-peanut-butter-cereal-milk.jpg', 0),
(2, 4, 'KOS Vegan Protein Powder Erythritol Free, Chocolate', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>KOS</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flavor</td>\r\n			<td>Chocolate 30 Servings</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Paleo</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Protein Source</td>\r\n			<td>Blend, Pea</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Unit Count</td>\r\n			<td>41.3 Ounce</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Amazing Flavor: Infused with organic Peruvian cacao, Himalayan salt, organic coconut milk, a dash of stevia &amp; monk fruit, our award-winning protein blend is simply delicious! Add 2 scoops to cold water for tasty shakes or mix into smoothies &amp; snacks.</li>\r\n	<li>Weight Management: Great protein powder for weight loss. The soluble fiber in plant protein gives you that &ldquo;full&rdquo; feeling for a longer period of time. You eat less but not at the expense of calories. Still packed with 20g protein per serving.</li>\r\n	<li>Complete Protein: Our USDA Organic vegan protein powder has a 5 protein blend of Pea, Flax Seed, Quinoa, Pumpkin Seed &amp; Chia Seed + essential vitamins &amp; minerals. Healthier than whey protein powder for both your body and the environment.</li>\r\n	<li>Digestion Support: Enhanced with powerful digestion support by DigeSEB, a proprietary digestive enzyme blend. DigeSEB aids digestion &amp; helps the body maximize absorption by embracing &amp; capitalizing on its ingested nutrients.</li>\r\n	<li>Responsibly Sourced: Nearly every ingredient is certified organic and free of gluten, dairy, soy, hormones, artificial sweeteners, colors, and GMOs. Made with USDA and CCOF certified ingredients.</li>\r\n</ul>\r\n', 'kos-vegan-protein-powder-erythritol-free-chocolate', 2081, 'kos-vegan-protein-powder-erythritol-free-chocolate.jpg', 0),
(3, 5, 'Garden of Life Raw Organic Protein Vanilla Powder, 20 Servings', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Garden of Life</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flavor</td>\r\n			<td>Vanilla</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Gluten Free, Vegan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Protein Source</td>\r\n			<td>Blend</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Unit Count</td>\r\n			<td>21.86 Ounce</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>SMOOTH, CREAMY TEXTURE: Get 22g of muscle-building Certified Organic and Non-GMO protein made from peas and raw sprouted seeds, grains and legumes&mdash;plus 3 Billion CFU of live probiotics &amp; 13 digestive enzymes&mdash;for a delicious blender free protein smoothie</li>\r\n	<li>COMPLETE PLANT BASED PROTEIN: Protein and BCAAs after a workout can help your body rebuild broken down muscle and reduce recovery time; Raw Organic Protein is a complete plant protein with all essential amino acids and 4g of naturally occurring BCAA</li>\r\n	<li>FOUNDATIONAL, ORGANIC FOODS: We combine the cleanest vegan proteins, including organic peas and 13 organic sprouted grains, seeds and legumes, with fat-soluble vitamins A, D, E and K, probiotics and enzymes, to help promote digestive and immune health</li>\r\n	<li>EASY TO DIGEST: Heat can denature proteins, reducing their availability to your body; Raw Organic Protein is made at low temperatures, preserving its complete amino acid integrity&mdash;with live probiotics and protein-digesting enzymes for proper absorption</li>\r\n	<li>EMPOWERING EXTRAORDINARY HEALTH - We start with what goes IN our products; whole food ingredients and rigorous standards because we believe in truly clean products you can trust. We do it because it&rsquo;s the only way we know how to deliver on our promise</li>\r\n</ul>\r\n', 'garden-of-life-raw-organic-protein-vanilla-powder-20-servings', 1968, 'garden-of-life-raw-organic-protein-vanilla-powder-20-servings.jpg', 0),
(4, 1, 'Nutricost Whey Protein Concentrate (Chocolate) 5LBS', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Nutricost</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flavor</td>\r\n			<td>Chocolate</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Gluten Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Protein Source</td>\r\n			<td>Whey</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Unit Count</td>\r\n			<td>80 Ounce</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Undenatured, Whey Protein Concentrate</li>\r\n	<li>5LBS of Chocolate Flavored Whey Protein Concentrate Per Bottle</li>\r\n	<li>Delicious Milk Chocolate Flavored Whey Protein Concentrate</li>\r\n	<li>Non-GMO &amp; Gluten Free</li>\r\n	<li>Made in a GMP Compliant, FDA Registered Facility</li>\r\n</ul>\r\n', 'nutricost-whey-protein-concentrate-chocolate-5lbs', 2868, 'nutricost-whey-protein-concentrate-chocolate-5lbs.jpg', 0),
(5, 1, 'Optimum Nutrition Gold Standard 100% Whey Protein Powder', '<hr />\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Optimum Nutrition</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flavor</td>\r\n			<td>Double Rich Chocolate</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Gluten Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Protein Source</td>\r\n			<td>Whey</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Unit Count</td>\r\n			<td>32.0 Ounce</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Packaging may vary - new look with the same trusted quality</li>\r\n	<li>Gold Standard 100% Whey - 24g of protein per serving to help build and maintain muscle when taken over time with regular resistance training</li>\r\n	<li>5.5g of naturally occurring branched chain amino acids (BCAA and 11g of naturally occurring essential amino acids (EAAs) per serving to support muscle recovery</li>\r\n	<li>Anytime formula &ndash; great before or after exercise, between meals, with a meal, or any time of day when you need extra protein</li>\r\n	<li>The world&#39;s best-selling whey protein powder</li>\r\n	<li>Banned substance tested and the highest quality control measures so you feel comfortable and confident consuming the product</li>\r\n</ul>\r\n', 'optimum-nutrition-gold-standard-100-whey-protein-powder', 2474, 'optimum-nutrition-gold-standard-100-whey-protein-powder.jpg', 0),
(6, 1, 'Body Fortress Super Advanced Chocolate', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Body Fortress</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flavor</td>\r\n			<td>Chocolate</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Gluten Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Protein Source</td>\r\n			<td>Whey</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Unit Count</td>\r\n			<td>28.48 Ounce</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>YOU WILL RECEIVE: 1.78 lb container of Body Fortress Chocolate Super Advanced Whey Protein Powder</li>\r\n	<li>POWER PACKED PROTEIN: 60 grams of protein and 12 grams of BCAA&rsquo;s per every two scoop serving - helping you train harder and rebuild lean muscle faster (1)</li>\r\n	<li>PROTEIN WHEN YOU NEED IT: Great for pre and post workout or as needed throughout the day in order to meet daily protein recommendations</li>\r\n	<li>NUTRIENT RICH: Amino acids with no aspartame and no gluten</li>\r\n	<li>IMMUNE SUPPORT: With vitamins C &amp; D plus zinc. Helps support your immune system (1)</li>\r\n	<li>GREAT TASTE: Deliciously creamy Chocolate flavor</li>\r\n</ul>\r\n', 'body-fortress-super-advanced-chocolate', 1631, 'body-fortress-super-advanced-whey-protein-powder-chocolate-immune-support.jpg', 0),
(7, 1, 'Vitamins C & D Plus Zinc, 1.78 lbs', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Body Fortress</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flavor</td>\r\n			<td>Chocolate</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Gluten Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Protein Source</td>\r\n			<td>Whey</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Unit Count</td>\r\n			<td>28.48 Ounce</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>YOU WILL RECEIVE: 1.78 lb container of Body Fortress Chocolate Super Advanced Whey Protein Powder</li>\r\n	<li>POWER PACKED PROTEIN: 60 grams of protein and 12 grams of BCAA&rsquo;s per every two scoop serving - helping you train harder and rebuild lean muscle faster (1)</li>\r\n	<li>PROTEIN WHEN YOU NEED IT: Great for pre and post workout or as needed throughout the day in order to meet daily protein recommendations</li>\r\n	<li>NUTRIENT RICH: Amino acids with no aspartame and no gluten</li>\r\n	<li>IMMUNE SUPPORT: With vitamins C &amp; D plus zinc. Helps support your immune system (1)</li>\r\n	<li>GREAT TASTE: Deliciously creamy Chocolate flavor</li>\r\n</ul>\r\n', 'vitamins-c-d-plus-zinc-1-78-lbs', 1631, 'body-fortress-super-advanced-whey-protein-powder-chocolate-immune-support-1-vitamins-c-d-plus-zinc-1-78-lbs.jpg', 0),
(8, 1, 'Dymatize ISO100 Hydrolyzed Protein Powder, 100% Whey Isolate', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Dymatize</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flavor</td>\r\n			<td>Vanilla</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Gluten Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Protein Source</td>\r\n			<td>Whey</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Unit Count</td>\r\n			<td>21.2 Ounce</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Dymatize ISO100 Gourmet Vanilla Protein Powder (20 Servings)</li>\r\n	<li>Scientifically formulated with fast-digesting hydrolyzed whey protein isolate</li>\r\n	<li>25 grams of protein, which includes 5.5 grams of branched-chain amino acids (BCAAs), &amp; 2.6 grams of Leucine per serving</li>\r\n	<li>Zero grams of fat and less than 1 gram of sugar per serving.</li>\r\n	<li>Gluten free with less than 1g lactose</li>\r\n	<li>During the summer months products may arrive warm but Amazon stores and ships products in accordance with manufacturers&#39; recommendations, when provided.</li>\r\n</ul>\r\n', 'dymatize-iso100-hydrolyzed-protein-powder-100-whey-isolate', 3656, 'dymatize-iso100-hydrolyzed-protein-powder-100-whey-isolate.jpg', 0),
(9, 2, 'Premier Protein Powder, Chocolate Milkshake, 30g Protein', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Premier Protein</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flavor</td>\r\n			<td>Chocolate</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Gluten Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Protein Source</td>\r\n			<td>Whey</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Unit Count</td>\r\n			<td>24.5 Ounce</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Each serving contains 30g Protein* with all the essential amino acids, 150 calories, and 1g Sugar, *100% of protein from Whey</li>\r\n	<li>Available in two delicious flavors: Chocolate milkshake, vanilla milkshake, try it mixed with water or milk, blended into your favorite smoothie recipe, or baked into protein packed recipes</li>\r\n	<li>No Soy ingredients, GLUTEN FREE</li>\r\n	<li>6.6g naturally occurring BCAA&#39;s</li>\r\n	<li>You may receive different sized tubs- either 24.5oz or 28oz, but they both carry 17 servings which deliver 30g of protein per serving</li>\r\n</ul>\r\n', 'premier-protein-powder-chocolate-milkshake-30g-protein', 2924, 'premier-protein-powder-chocolate-milkshake-30g-protein.jpg', 0),
(10, 1, 'Ascent Native Fuel Whey Protein Powder', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Ascent</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Gluten Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flavor</td>\r\n			<td>Chocolate</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Product Benefits</td>\r\n			<td>Muscle Growth</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Ingredients</td>\r\n			<td>Certified Gluten Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Age Range (Description)</td>\r\n			<td>Adult</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Package Information</td>\r\n			<td>Bag</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Unit Count</td>\r\n			<td>32.0 Ounce</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Number of Items</td>\r\n			<td>1</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"javascript:void(0)\">See more</a></p>\r\n\r\n<hr />\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Native Whey Protein Powder Isolate Blend - The least-processed chocolate whey protein available today, naturally higher in leucine for muscle synthesis. Mixes silky smooth every time with just cold water.</li>\r\n	<li>25g Protein Per Scoop - 5.7g Naturally Occurring BCAAs, and a clean, minimalist ingredient list. Certified Gluten Free and Informed Choice Certified. Lightly sweetened with stevia leaf extract.</li>\r\n	<li>Designed for Post Workout Recovery - Supports fitness goals with pure whey that rapidly digests to fuel muscle growth and recovery. A protein smoothie essential.</li>\r\n	<li>0g of Added Sugar, Zero Artificial Ingredients - Clean, pure protein that easily fits low carb and keto diets. Perfect for recipes &amp; baking high protein snacks.</li>\r\n	<li>2 LB Whey Protein Powder with included scoop - Simple collapsible bag packaging for easier storage in small or irregular cabinets and drawers.</li>\r\n</ul>\r\n', 'ascent-native-fuel-whey-protein-powder', 1856, 'ascent-native-fuel-whey-protein-powder.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `address`) VALUES
(1, 'John Smith', '09123456789', '123 Main Street, Makati City'),
(2, 'Jane Doe', '09129876543', '456 Acacia Avenue, Quezon City'),
(3, 'David Lee', '09187654321', ' 789 Pine Street, Mandaluyong City'),
(4, 'Sarah Johnson', '09123456701', '321 Oak Road, Pasig City'),
(5, 'Michael Kim', '09123456712', ' 111 Maple Street, Taguig City'),
(6, ' Emily Tan', '09123456723', '222 Elm Avenue, Marikina City\r\n\r\n'),
(7, 'William Lee', '09123456734', '333 Walnut Drive, Pasay City'),
(8, ' Grace Reyes', '09123456745', '444 Birch Lane, Manila City'),
(9, 'Alex Tan', '09123456756', ' 555 Cedar Street, San Juan City'),
(10, 'Mary Cruz', '09123456767', '666 Pine Tree Road, Valenzuela City');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `fullname`, `address`, `contact_info`, `status`, `photo`, `created_on`) VALUES
(1, 'admin@admin.com', '123123', 1, 'Admin', '', '', 1, 'profile.jpg', '2023-03-02'),
(2, 'leonidas@gmail.com', '$2y$10$8wY63GX/y9Bq780GBMpxCesV9n1H6WyCqcA2hNy2uhC59hEnOpNaS', 0, 'Leo Nidas', 'Quezon City', '09291234567', 1, 'profile.jpg', '2023-03-22'),
(3, 'john.doe@gmail.com', '$2y$10$8wY63GX/y9Bq780GBMpxCesV9n1H6WyCqcA2hNy2uhC59hEnOpNaS', 0, 'John Doe', '123 Main St, Anytown USA', '555-1234', 1, '', '2023-04-20'),
(4, 'jane.smith@yahoo.com', '$2y$10$8wY63GX/y9Bq780GBMpxCesV9n1H6WyCqcA2hNy2uhC59hEnOpNaS', 0, 'Jane Smith', '456 Elm St, Anytown USA', '555-5678', 1, '', '2023-04-20'),
(5, 'robert.jones@hotmail.com', '$2y$10$8wY63GX/y9Bq780GBMpxCesV9n1H6WyCqcA2hNy2uhC59hEnOpNaS', 0, 'Robert Jones', '789 Oak St, Anytown USA', '555-9012', 1, '', '2023-04-20'),
(6, 'sarah.brown@outlook.com', '$2y$10$8wY63GX/y9Bq780GBMpxCesV9n1H6WyCqcA2hNy2uhC59hEnOpNaS', 0, 'Sarah Brown', '987 Pine St, Anytown USA', '555-3456', 1, '', '2023-04-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equiparchive`
--
ALTER TABLE `equiparchive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodarchive`
--
ALTER TABLE `prodarchive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `equiparchive`
--
ALTER TABLE `equiparchive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5075;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `prodarchive`
--
ALTER TABLE `prodarchive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
