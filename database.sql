-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2021 lúc 05:46 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `total` float NOT NULL,
  `payment` varchar(100) NOT NULL,
  `dateorder` date NOT NULL,
  `note` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `customer_id`, `total`, `payment`, `dateorder`, `note`, `status`, `created_at`, `updated_at`) VALUES
(128, 57, 1340000, 'Thanh toán khi nhận hàng', '2021-05-13', 'Vui lòng giao đúng màu, đúng size,.. giao trong giờ hành chính', 1, '2021-05-13 08:45:44', '2021-05-13 08:45:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills_detail`
--

CREATE TABLE `bills_detail` (
  `id` bigint(20) NOT NULL,
  `id_bill` bigint(20) NOT NULL,
  `id_product_size_color` bigint(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bills_detail`
--

INSERT INTO `bills_detail` (`id`, `id_bill`, `id_product_size_color`, `amount`, `price`, `created_at`, `updated_at`) VALUES
(98, 128, 42, 1, 540000, '2021-05-13 08:45:44', '2021-05-13 08:45:44'),
(99, 128, 489, 2, 400000, '2021-05-13 08:45:44', '2021-05-13 08:45:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `product_id` int(100) NOT NULL,
  `color_id` int(100) NOT NULL,
  `size_id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(21, 'Sneaker', 1, '2021-05-11 01:39:44', '2021-05-11 01:39:44'),
(22, 'Boot', 1, '2021-05-11 01:40:09', '2021-05-11 01:40:09'),
(23, 'Sport', 1, '2021-05-11 01:40:34', '2021-05-11 01:40:34'),
(24, 'Classic', 1, '2021-05-11 01:42:43', '2021-05-11 01:42:43'),
(25, 'Dép Nam', 2, '2021-05-13 08:29:20', '2021-05-13 08:29:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` bigint(20) NOT NULL,
  `color` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `color`, `created_at`, `updated_at`) VALUES
(139, 'Đen', '2021-04-05 23:40:34', '2021-04-05 23:40:34'),
(140, 'Đỏ', '2021-04-05 23:40:34', '2021-04-05 23:40:34'),
(141, 'Xanh', '2021-04-07 15:26:07', '2021-04-07 15:26:11'),
(142, 'Trắng', '2021-04-07 15:26:07', '2021-04-07 15:26:07'),
(143, 'Nâu', '2021-04-07 15:26:07', '2021-04-07 15:26:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `email`, `name`, `password`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(57, 'vophamtandoan99@gmail.com', 'Võ Phạm Tấn Đoan', 'eyJpdiI6InBObFdMeDNHaldKMnE2anM4M3VyYUE9PSIsInZhbHVlIjoidytsUklMTGZLbllnNzJFM09XNVozb3JMdXd0NW82ZzZTOVJNSzY4MzdqVT0iLCJtYWMiOiJjNGM3NjUzNjg3ODUzMmMyODJmNjdjODMzN2I5MjkxZTIyYmYyNzBlOGJmNTVkMjdiNmQxNjg3YjAyODNmOWU0In0=', '0337338920', 'Khu phố 4, phường Hòa Vinh, huyện Đông Hòa, tỉnh Phú Yên', '2021-05-11 23:10:38', '2021-05-13 08:45:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(100) DEFAULT NULL,
  `img` varchar(256) NOT NULL,
  `note` text NOT NULL,
  `import_price` double NOT NULL,
  `export_price` double DEFAULT NULL,
  `sale` int(100) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `amount`, `img`, `note`, `import_price`, `export_price`, `sale`, `status`, `supplier_id`, `category_id`, `created_at`, `updated_at`) VALUES
(235, 'Giày Nike Air Force 1 Peaceminusone', 12500, '745585808.jpg', 'Nike air force 1 para noise 2.0 Với sự thiết kế có sự thay đổi về cách phối màu sắc, đối ngược với phiên bản trước nhằm tạo nên những sự khác lạ cho người dùng. Và đây hứa hẹn sẻ là một trong những bản collab được giới trẻ chợ đợi nhiều nhất trong năm nay.', 600000, 540000, 10, 1, 21, 21, '2021-05-11 02:00:49', '2021-05-11 02:35:44'),
(236, 'Nike Zoom Nam Nữ Giá Rẻ - Fsport247®', 12500, '953439065.jpg', 'Giày Nike Air Zoom Pegasus 35 xanh sọc đỏ NZ04 sneaker nam nữ chính hãng', 1500000, 890000, 41, 1, 21, 21, '2021-05-11 02:41:09', '2021-05-11 02:49:51'),
(237, 'Giày Nike Air Max 97', 12500, '371245109.jpg', 'Nike luôn có ra mắt nhiều dòng sản phẩm đẹp – độc khiến giới mộ điệu “điêu đứng” không thôi. Điều mà khách hàng yêu thích nhất ở những đôi giày Nike là đảm bảo chất lượng về mẫu mã, thiết kế và độ bền khi sử dụng. ', 500000, 450000, 10, 1, 21, 21, '2021-05-11 02:55:42', '2021-05-11 21:02:15'),
(238, 'Giày Nike Air Jordan 1 (Stattered Backboard) rep 1:1', 12500, '724053921.jpg', 'Air Jordan 1 ra mắt vào năm 1985 trên đôi chân của một tân binh tốt lành tên là Michael Jordan. Với thiết kế sạch sẽ nổi bật với logo Wings Air Jordan trên mắt cá chân, Air Jordan 1 sẽ trở thành một trong những đôi giày bóng rổ vĩ đại nhất lịch sử. ', 2000000, 1800000, 20, 1, 21, 21, '2021-05-11 03:03:00', '2021-05-11 03:05:06'),
(239, 'Giày Adidas Ultraboost', 12500, '1418666715.jpg', 'Đôi giày này ngày càng trở thành siêu phẩm giày chạy bộ và đáp ứng xu hướng giày sneaker thời trang cực kỳ đỉnh hiện nay. Nếu như bạn là một runner hay là một tín đồ thời trang mà thiếu đi Ultra boost trong kệ giày thì quả thật là một điều thiếu sót. Hiện những mẫu giày adidas Ultra Boost đang càng ngày phát triển phổ biến tại Việt Nam và thu hút sự chú ý từ cộng đồng khi cho ra mắt nhiều phiên bản với thiết kế và phối màu đẹp đến mê mệt.', 420000, 340000, 19, 1, 22, 21, '2021-05-13 07:00:21', '2021-05-13 07:13:53'),
(240, 'A.didas Stan Smith SF', 12500, '249999260.jpg', 'Adidas Stan Smith là mẫu giày huyền thoại nổi tiếng bậc nhất của Adidas. Xuất hiện lần đầu tiên vào năm 1973 trải qua hơn 40 năm lịch sử nó đã ghi dấu ấn tới hàng triệu người trên thế giới. Adidas Stan Smith SF Black được đánh giá một trong những mẫu giày biểu tượng không bao giờ lỗi mốt.', 449000, NULL, NULL, 1, 22, 21, '2021-05-13 07:09:32', '2021-05-13 07:18:11'),
(241, 'Giày Adidas T12', 12500, '1681193904.jpg', 'Đế giày êm, thân giày được làm từ vái thoát khí, giúp bạn thoải mái, mang được lâu không bị đau chân', 230000, NULL, NULL, 1, 22, 21, '2021-05-13 07:22:35', '2021-05-13 07:25:29'),
(242, 'Giày Balenciaga Triple', 12500, '1696511118.jpg', 'Balenciaga triple s là một trong những đôi giày sneaker được giới trẻ yêu thích nhất trong thời điểm vừa qua. Đây là một trong những sản phẩm thiết kế theo phong cách thời trang hiện đại mang đến cho người dùng nhiều lợi thế. Như tăng đang kế về chiều cao củng như dễ dàng phối kết hợp với những phong cách thời trang mới hiện đại hiện tại. Đôi giày này được kết hợp với nhiều bản phối khác nhau đã tạo nên một bức tranh thời trang đầy đặc sắc cho ngành thể thao sneaker. Balenciaga triple s Beige Green Yellow là một trong những sản phẩm thuộc bộ sưu tập của dòng này và đây là một trong những màu sắc mà được giới trẻ yêu thích vì cách phối màu sắc tươi trẻ mang đến cho người dùng sự trẻ trung năng động.', 4500000, NULL, NULL, 1, 23, 21, '2021-05-13 07:32:30', '2021-05-13 07:34:47'),
(243, 'Giày Balenciaga Track', 12500, '1883077704.jpg', 'Được thiết kế tinh tế, phù hợp xu hướng thời trang. Mang êm chân, nhẹ chân, thoải mái di chuyển: đi làm, đi chơi, gym, phượt...', 2500000, 2200000, 12, 1, 23, 21, '2021-05-13 07:39:13', '2021-05-13 07:41:19'),
(244, 'PUMA FENTY CREEPER', 12500, '354561083.jpg', 'Creeper White là một phối màu nằm trong bộ sưu tập collab Puma Fenty giữa Puma và Rihanna, mẫu thiết kế hiện đại nhưng vẫn giữ được sự cổ điển. Với phần thân trên là da truyền thống, Fenty Creeper luôn cháy hàng khi tung ra bởi sự đa dạng màu sắc, đơn giản như trắng, đen tới bắt mắt như đỏ, vàng gold.', 780000, 599000, 23, 1, 24, 23, '2021-05-13 07:46:16', '2021-05-13 07:47:36'),
(245, 'PUMA ULTRA 3.1 FG/AG TURBO', 12500, '1002845924.webp', 'Giày sân cỏ', 5495000, NULL, NULL, 1, 24, 23, '2021-05-13 07:54:22', '2021-05-13 07:56:55'),
(246, 'Giày cao cổ nam da bò Redwing moctoe boots', 100, '1513544277.jpg', 'Da sáp ngựa điên bền, khoẻ, và tất nhiên nó mang lại một cái nhìn và cảm giác độc đáo kết hợp giữa sự sang trọng và cổ xưa.\nĐặc trưng nhất của dòng da bò sáp ngựa điên là bóp đổi màu và dễ trầy xước, nhưng thiếu một trong hai điểm này nó sẽ không mang lại chất lãng tử mà người dùng mong đợi.', 1550000, 1050000, 32, 1, 26, 22, '2021-05-13 08:04:51', '2021-05-13 08:04:51'),
(247, 'Giày Nam Cao Cổ Màu Đen (HM 501)', 600, '200665758.jpg', 'Với thiết kế mang xu hướng thời trang phong cách trẻ trung, đôi Giày Cao Cổ Nam HM-501 mang đậm phong cách sành điệu lịch lãm. Được làm từ da cao cấp gia công bằng công nghệ hiện đại nhập khẩu từ Châu Âu, Giày cao cổ nam HM-501 được khách hàng đánh giá là đôi Giày Cao Cổ Nam trẻ trung và sang trọng bậc nhất.', 950000, 800000, 16, 1, 27, 22, '2021-05-13 08:08:19', '2021-05-13 08:08:19'),
(248, 'Giày Nam Dr Martens (HM 503)', 600, '1526984844.jpg', 'Hầm hố và phong cách, thời trang và cá tính, kiểu dáng mạnh mẽ và quen thuộc đó là Giày Nam Dr Martens Màu Nâu HM-503 với chất liệu da cao cấp nhập khẩu và độ bền hoàn hảo, đế cao su siêu bền chống trơn trượt tốt. Với thiết kế mang phong cách trẻ trung sôi động, đôi Giày Nam Cao Cổ Dr Martens với thiết kế form mạnh mẽ, mũi giày rộng rãi chăm sóc tốt nhất cho các ngón chân. Các chi tiết như đường may nối cạnh bên ấn tượng, tinh tế. Chất liệu da cao cấp màu nâu sang trọng, bóng mịn chống bám bụi tốt cùng với các chi tiết mặt đế kẻ nổi cá tính vừa tăng thẩm mỹ Giày HM-503 xứng đáng là 1 đôi giày cao cổ nam hoàn hảo.', 900000, 750000, 16, 1, 27, 22, '2021-05-13 08:10:40', '2021-05-13 08:10:40'),
(249, 'Giày Vans Oldskool', 12500, '42493159.jpg', 'Giày thể thao Vans có lớp vải dày êm ái cùng thiết kế mặt đế bản to từ cao su vững chắc hình dạng y như một chiếc ván trượt của vận động viên. Không giống như những dòng giày thể thao khác, giày Vans được thiết kế thật ấm áp và thoải mái để bảo vệ đôi chân người dùng. Vans mang đến điểm tựa vững chắc cho những ai thích các hoạt động trò chơi mạo hiểm và tự tin hơn trong từng chuyển động cũng như khi chơi thể thao hàng ngày.', 450000, 299000, 34, 1, 28, 24, '2021-05-13 08:13:11', '2021-05-13 08:16:20'),
(250, 'Converse Chuck Taylor 1970s Đen Cổ Cao', 12500, '2035991782.jpg', 'Giày thể thao Converse Chuck Taylor All Star 1970s là dòng sản phẩm luôn được lòng khách hàng, với những thiết kế đơn giản, là một trong những đôi sneaker chưa bao giờ lỗi mốt và mang nét cổ điển hoàn hảo rất riêng của Giày Converse.', 1000000, 9000000, 10, 1, 29, 24, '2021-05-13 08:20:36', '2021-05-13 08:21:56'),
(251, 'Bitis hunter', 12500, '1770665050.jpg', 'Biti’s Hunter, với những chiếc giày “nhẹ như bay”, sẽ luôn đồng hành và truyền cảm hứng cho bạn trên những bước chân đi & trải nghiệm bất tận ghi dấu hành trình tuổi trẻ.', 400000, NULL, NULL, 1, 30, 24, '2021-05-13 08:26:52', '2021-05-13 08:28:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_size_color`
--

CREATE TABLE `product_size_color` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `size_id` bigint(20) NOT NULL,
  `color_id` bigint(20) NOT NULL,
  `amount` int(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_size_color`
--

INSERT INTO `product_size_color` (`id`, `product_id`, `size_id`, `color_id`, `amount`, `created_at`, `updated_at`) VALUES
(42, 235, 125, 139, 500, NULL, '2021-05-11 02:35:44'),
(43, 235, 126, 139, 500, NULL, '2021-05-11 02:35:44'),
(44, 235, 127, 139, 500, NULL, '2021-05-11 02:35:44'),
(45, 235, 128, 139, 500, NULL, '2021-05-11 02:35:44'),
(46, 235, 129, 139, 500, NULL, '2021-05-11 02:35:44'),
(47, 235, 125, 140, 500, NULL, '2021-05-11 02:35:44'),
(48, 235, 126, 140, 500, NULL, '2021-05-11 02:35:44'),
(49, 235, 127, 140, 500, NULL, '2021-05-11 02:35:44'),
(50, 235, 128, 140, 500, NULL, '2021-05-11 02:35:44'),
(51, 235, 129, 140, 500, NULL, '2021-05-11 02:35:44'),
(52, 235, 125, 141, 500, NULL, '2021-05-11 02:35:44'),
(53, 235, 126, 141, 500, NULL, '2021-05-11 02:35:44'),
(54, 235, 127, 141, 500, NULL, '2021-05-11 02:35:44'),
(55, 235, 128, 141, 500, NULL, '2021-05-11 02:35:44'),
(56, 235, 129, 141, 500, NULL, '2021-05-11 02:35:44'),
(57, 235, 125, 142, 500, NULL, '2021-05-11 02:35:44'),
(58, 235, 126, 142, 500, NULL, '2021-05-11 02:35:44'),
(59, 235, 127, 142, 500, NULL, '2021-05-11 02:35:44'),
(60, 235, 128, 142, 500, NULL, '2021-05-11 02:35:44'),
(61, 235, 129, 142, 500, NULL, '2021-05-11 02:35:44'),
(62, 235, 125, 143, 500, NULL, '2021-05-11 02:35:44'),
(63, 235, 126, 143, 500, NULL, '2021-05-11 02:35:44'),
(64, 235, 127, 143, 500, NULL, '2021-05-11 02:35:44'),
(65, 235, 128, 143, 500, NULL, '2021-05-11 02:35:44'),
(66, 235, 129, 143, 500, NULL, '2021-05-11 02:35:44'),
(123, 236, 125, 139, 500, NULL, '2021-05-11 02:53:47'),
(124, 236, 126, 139, 500, NULL, '2021-05-11 02:53:47'),
(125, 236, 127, 139, 500, NULL, '2021-05-11 02:53:47'),
(126, 236, 128, 139, 500, NULL, NULL),
(127, 236, 129, 139, 500, NULL, NULL),
(128, 236, 125, 140, 500, NULL, NULL),
(129, 236, 126, 140, 500, NULL, NULL),
(130, 236, 127, 140, 500, NULL, NULL),
(131, 236, 128, 140, 500, NULL, NULL),
(132, 236, 129, 140, 500, NULL, NULL),
(133, 236, 125, 141, 500, NULL, NULL),
(134, 236, 126, 141, 500, NULL, NULL),
(135, 236, 127, 141, 500, NULL, NULL),
(136, 236, 128, 141, 500, NULL, NULL),
(137, 236, 129, 141, 500, NULL, NULL),
(138, 236, 125, 142, 500, NULL, NULL),
(139, 236, 126, 142, 500, NULL, NULL),
(140, 236, 127, 142, 500, NULL, NULL),
(141, 236, 128, 142, 500, NULL, NULL),
(142, 236, 129, 142, 500, NULL, NULL),
(143, 236, 125, 143, 500, NULL, NULL),
(144, 236, 126, 143, 500, NULL, NULL),
(145, 236, 127, 143, 500, NULL, NULL),
(146, 236, 128, 143, 500, NULL, NULL),
(147, 236, 129, 143, 500, NULL, NULL),
(149, 237, 125, 139, 500, NULL, '2021-05-11 02:58:26'),
(150, 237, 126, 139, 500, NULL, '2021-05-11 02:58:26'),
(151, 237, 127, 139, 500, NULL, '2021-05-11 02:58:26'),
(152, 237, 128, 139, 500, NULL, NULL),
(153, 237, 129, 139, 500, NULL, NULL),
(154, 237, 125, 140, 500, NULL, NULL),
(155, 237, 126, 140, 500, NULL, NULL),
(156, 237, 127, 140, 500, NULL, NULL),
(157, 237, 128, 140, 500, NULL, NULL),
(158, 237, 129, 140, 500, NULL, NULL),
(159, 237, 125, 141, 500, NULL, NULL),
(160, 237, 126, 141, 500, NULL, NULL),
(161, 237, 127, 141, 500, NULL, NULL),
(162, 237, 128, 141, 500, NULL, NULL),
(163, 237, 129, 141, 500, NULL, NULL),
(164, 237, 125, 142, 500, NULL, NULL),
(165, 237, 126, 142, 500, NULL, NULL),
(166, 237, 127, 142, 500, NULL, NULL),
(167, 237, 128, 142, 500, NULL, NULL),
(168, 237, 129, 142, 500, NULL, NULL),
(169, 237, 125, 143, 500, NULL, NULL),
(170, 237, 126, 143, 500, NULL, NULL),
(171, 237, 127, 143, 500, NULL, NULL),
(172, 237, 128, 143, 500, NULL, NULL),
(173, 237, 129, 143, 500, NULL, NULL),
(175, 238, 125, 139, 500, NULL, '2021-05-11 03:05:06'),
(176, 238, 126, 139, 500, NULL, '2021-05-11 03:05:06'),
(177, 238, 127, 139, 500, NULL, '2021-05-11 03:05:06'),
(178, 238, 128, 139, 500, NULL, NULL),
(179, 238, 129, 139, 500, NULL, NULL),
(180, 238, 125, 140, 500, NULL, NULL),
(181, 238, 126, 140, 500, NULL, NULL),
(182, 238, 127, 140, 500, NULL, NULL),
(183, 238, 128, 140, 500, NULL, NULL),
(184, 238, 129, 140, 500, NULL, NULL),
(185, 238, 125, 141, 500, NULL, NULL),
(186, 238, 126, 141, 500, NULL, NULL),
(187, 238, 127, 141, 500, NULL, NULL),
(188, 238, 128, 141, 500, NULL, NULL),
(189, 238, 129, 141, 500, NULL, NULL),
(190, 238, 125, 142, 500, NULL, NULL),
(191, 238, 126, 142, 500, NULL, NULL),
(192, 238, 127, 142, 500, NULL, NULL),
(193, 238, 128, 142, 500, NULL, NULL),
(194, 238, 129, 142, 500, NULL, NULL),
(195, 238, 125, 143, 500, NULL, NULL),
(196, 238, 126, 143, 500, NULL, NULL),
(197, 238, 127, 143, 500, NULL, NULL),
(198, 238, 128, 143, 500, NULL, NULL),
(199, 238, 129, 143, 500, NULL, NULL),
(227, 239, 125, 139, 500, NULL, '2021-05-13 07:13:52'),
(228, 239, 126, 139, 500, NULL, '2021-05-13 07:13:52'),
(229, 239, 127, 139, 500, NULL, '2021-05-13 07:13:52'),
(230, 239, 128, 139, 500, NULL, NULL),
(231, 239, 129, 139, 500, NULL, NULL),
(232, 239, 125, 140, 500, NULL, NULL),
(233, 239, 126, 140, 500, NULL, NULL),
(234, 239, 127, 140, 500, NULL, NULL),
(235, 239, 128, 140, 500, NULL, NULL),
(236, 239, 129, 140, 500, NULL, NULL),
(237, 239, 125, 141, 500, NULL, NULL),
(238, 239, 126, 141, 500, NULL, NULL),
(239, 239, 127, 141, 500, NULL, NULL),
(240, 239, 128, 141, 500, NULL, NULL),
(241, 239, 129, 141, 500, NULL, NULL),
(242, 239, 125, 142, 500, NULL, NULL),
(243, 239, 126, 142, 500, NULL, NULL),
(244, 239, 127, 142, 500, NULL, NULL),
(245, 239, 128, 142, 500, NULL, NULL),
(246, 239, 129, 142, 500, NULL, NULL),
(247, 239, 125, 143, 500, NULL, NULL),
(248, 239, 126, 143, 500, NULL, NULL),
(249, 239, 127, 143, 500, NULL, NULL),
(250, 239, 128, 143, 500, NULL, NULL),
(251, 239, 129, 143, 500, NULL, NULL),
(252, 240, 125, 139, 500, NULL, '2021-05-13 07:18:11'),
(253, 240, 126, 139, 500, NULL, '2021-05-13 07:18:11'),
(254, 240, 127, 139, 500, NULL, '2021-05-13 07:18:11'),
(255, 240, 128, 139, 500, NULL, NULL),
(256, 240, 129, 139, 500, NULL, NULL),
(257, 240, 125, 140, 500, NULL, NULL),
(258, 240, 126, 140, 500, NULL, NULL),
(259, 240, 127, 140, 500, NULL, NULL),
(260, 240, 128, 140, 500, NULL, NULL),
(261, 240, 129, 140, 500, NULL, NULL),
(262, 240, 125, 141, 500, NULL, NULL),
(263, 240, 126, 141, 500, NULL, NULL),
(264, 240, 127, 141, 500, NULL, NULL),
(265, 240, 128, 141, 500, NULL, NULL),
(266, 240, 129, 141, 500, NULL, NULL),
(267, 240, 125, 142, 500, NULL, NULL),
(268, 240, 126, 142, 500, NULL, NULL),
(269, 240, 127, 142, 500, NULL, NULL),
(270, 240, 128, 142, 500, NULL, NULL),
(271, 240, 129, 142, 500, NULL, NULL),
(272, 240, 125, 143, 500, NULL, NULL),
(273, 240, 126, 143, 500, NULL, NULL),
(274, 240, 127, 143, 500, NULL, NULL),
(275, 240, 128, 143, 500, NULL, NULL),
(276, 240, 129, 143, 500, NULL, NULL),
(278, 241, 125, 139, 500, NULL, '2021-05-13 07:25:29'),
(279, 241, 126, 139, 500, NULL, '2021-05-13 07:25:29'),
(280, 241, 127, 139, 500, NULL, '2021-05-13 07:25:29'),
(281, 241, 128, 139, 500, NULL, NULL),
(282, 241, 129, 139, 500, NULL, NULL),
(283, 241, 125, 140, 500, NULL, NULL),
(284, 241, 126, 140, 500, NULL, NULL),
(285, 241, 127, 140, 500, NULL, NULL),
(286, 241, 128, 140, 500, NULL, NULL),
(287, 241, 129, 140, 500, NULL, NULL),
(288, 241, 125, 141, 500, NULL, NULL),
(289, 241, 126, 141, 500, NULL, NULL),
(290, 241, 127, 141, 500, NULL, NULL),
(291, 241, 128, 141, 500, NULL, NULL),
(292, 241, 129, 141, 500, NULL, NULL),
(293, 241, 125, 142, 500, NULL, NULL),
(294, 241, 126, 142, 500, NULL, NULL),
(295, 241, 127, 142, 500, NULL, NULL),
(296, 241, 128, 142, 500, NULL, NULL),
(297, 241, 129, 142, 500, NULL, NULL),
(298, 241, 125, 143, 500, NULL, NULL),
(299, 241, 126, 143, 500, NULL, NULL),
(300, 241, 127, 143, 500, NULL, NULL),
(301, 241, 128, 143, 500, NULL, NULL),
(302, 241, 129, 143, 500, NULL, NULL),
(303, 242, 125, 139, 500, '2021-05-13 07:32:30', '2021-05-13 07:32:30'),
(304, 242, 126, 139, 500, NULL, '2021-05-13 07:34:14'),
(305, 242, 127, 139, 500, NULL, '2021-05-13 07:34:14'),
(306, 242, 128, 139, 500, NULL, '2021-05-13 07:34:14'),
(307, 242, 129, 139, 500, NULL, '2021-05-13 07:34:14'),
(308, 242, 125, 140, 500, NULL, '2021-05-13 07:34:14'),
(309, 242, 126, 140, 500, NULL, '2021-05-13 07:34:14'),
(310, 242, 127, 140, 500, NULL, '2021-05-13 07:34:14'),
(311, 242, 128, 140, 500, NULL, '2021-05-13 07:34:14'),
(312, 242, 129, 140, 500, NULL, '2021-05-13 07:34:14'),
(313, 242, 125, 141, 500, NULL, '2021-05-13 07:34:14'),
(314, 242, 126, 141, 500, NULL, '2021-05-13 07:34:14'),
(315, 242, 127, 141, 500, NULL, '2021-05-13 07:34:14'),
(316, 242, 128, 141, 500, NULL, '2021-05-13 07:34:14'),
(317, 242, 129, 141, 500, NULL, '2021-05-13 07:34:14'),
(318, 242, 125, 142, 500, NULL, '2021-05-13 07:34:14'),
(319, 242, 126, 142, 500, NULL, '2021-05-13 07:34:14'),
(320, 242, 127, 142, 500, NULL, '2021-05-13 07:34:14'),
(321, 242, 128, 142, 500, NULL, '2021-05-13 07:34:14'),
(322, 242, 129, 142, 500, NULL, '2021-05-13 07:34:14'),
(323, 242, 125, 143, 500, NULL, '2021-05-13 07:34:14'),
(324, 242, 126, 143, 500, NULL, '2021-05-13 07:34:14'),
(325, 242, 127, 143, 500, NULL, '2021-05-13 07:34:14'),
(326, 242, 128, 143, 500, NULL, '2021-05-13 07:34:14'),
(327, 242, 129, 143, 500, NULL, '2021-05-13 07:34:14'),
(328, 242, 129, 143, 500, NULL, NULL),
(330, 243, 125, 139, 500, NULL, '2021-05-13 07:41:19'),
(331, 243, 126, 139, 500, NULL, '2021-05-13 07:41:19'),
(332, 243, 127, 139, 500, NULL, '2021-05-13 07:41:19'),
(333, 243, 128, 139, 500, NULL, NULL),
(334, 243, 129, 139, 500, NULL, NULL),
(335, 243, 125, 140, 500, NULL, NULL),
(336, 243, 126, 140, 500, NULL, NULL),
(337, 243, 127, 140, 500, NULL, NULL),
(338, 243, 128, 140, 500, NULL, NULL),
(339, 243, 129, 140, 500, NULL, NULL),
(340, 243, 125, 141, 500, NULL, NULL),
(341, 243, 126, 141, 500, NULL, NULL),
(342, 243, 127, 141, 500, NULL, NULL),
(343, 243, 128, 141, 500, NULL, NULL),
(344, 243, 129, 141, 500, NULL, NULL),
(345, 243, 125, 142, 500, NULL, NULL),
(346, 243, 126, 142, 500, NULL, NULL),
(347, 243, 127, 142, 500, NULL, NULL),
(348, 243, 128, 142, 500, NULL, NULL),
(349, 243, 129, 142, 500, NULL, NULL),
(350, 243, 125, 143, 500, NULL, NULL),
(351, 243, 126, 143, 500, NULL, NULL),
(352, 243, 127, 143, 500, NULL, NULL),
(353, 243, 128, 143, 500, NULL, NULL),
(354, 243, 129, 143, 500, NULL, NULL),
(356, 244, 125, 139, 500, NULL, '2021-05-13 07:47:36'),
(357, 244, 126, 139, 500, NULL, '2021-05-13 07:47:36'),
(358, 244, 127, 139, 500, NULL, '2021-05-13 07:47:36'),
(359, 244, 128, 139, 500, NULL, NULL),
(360, 244, 129, 139, 500, NULL, NULL),
(361, 244, 125, 140, 500, NULL, NULL),
(362, 244, 126, 140, 500, NULL, NULL),
(363, 244, 127, 140, 500, NULL, NULL),
(364, 244, 128, 140, 500, NULL, NULL),
(365, 244, 129, 140, 500, NULL, NULL),
(366, 244, 125, 141, 500, NULL, NULL),
(367, 244, 126, 141, 500, NULL, NULL),
(368, 244, 127, 141, 500, NULL, NULL),
(369, 244, 128, 141, 500, NULL, NULL),
(370, 244, 129, 141, 500, NULL, NULL),
(371, 244, 125, 142, 500, NULL, NULL),
(372, 244, 126, 142, 500, NULL, NULL),
(373, 244, 127, 142, 500, NULL, NULL),
(374, 244, 128, 142, 500, NULL, NULL),
(375, 244, 129, 142, 500, NULL, NULL),
(376, 244, 125, 143, 500, NULL, NULL),
(377, 244, 126, 143, 500, NULL, NULL),
(378, 244, 127, 143, 500, NULL, NULL),
(379, 244, 128, 143, 500, NULL, NULL),
(380, 244, 129, 143, 500, NULL, NULL),
(382, 245, 125, 139, 500, NULL, '2021-05-13 07:56:55'),
(383, 245, 126, 139, 500, NULL, '2021-05-13 07:56:55'),
(384, 245, 127, 139, 500, NULL, '2021-05-13 07:56:55'),
(385, 245, 128, 139, 500, NULL, NULL),
(386, 245, 129, 139, 500, NULL, NULL),
(387, 245, 125, 140, 500, NULL, NULL),
(388, 245, 126, 140, 500, NULL, NULL),
(389, 245, 127, 140, 500, NULL, NULL),
(390, 245, 128, 140, 500, NULL, NULL),
(391, 245, 129, 140, 500, NULL, NULL),
(392, 245, 125, 141, 500, NULL, NULL),
(393, 245, 126, 141, 500, NULL, NULL),
(394, 245, 127, 141, 500, NULL, NULL),
(395, 245, 128, 141, 500, NULL, NULL),
(396, 245, 129, 141, 500, NULL, NULL),
(397, 245, 125, 142, 500, NULL, NULL),
(398, 245, 126, 142, 500, NULL, NULL),
(399, 245, 127, 142, 500, NULL, NULL),
(400, 245, 128, 142, 500, NULL, NULL),
(401, 245, 129, 142, 500, NULL, NULL),
(402, 245, 125, 143, 500, NULL, NULL),
(403, 245, 126, 143, 500, NULL, NULL),
(404, 245, 127, 143, 500, NULL, NULL),
(405, 245, 128, 143, 500, NULL, NULL),
(406, 245, 129, 143, 500, NULL, NULL),
(407, 246, 128, 143, 100, '2021-05-13 08:04:51', '2021-05-13 08:04:51'),
(408, 247, 128, 143, 100, '2021-05-13 08:08:19', '2021-05-13 08:08:19'),
(409, 247, 129, 139, 500, '2021-05-13 08:08:19', '2021-05-13 08:08:19'),
(410, 248, 128, 143, 100, '2021-05-13 08:10:40', '2021-05-13 08:10:40'),
(411, 248, 129, 139, 500, '2021-05-13 08:10:40', '2021-05-13 08:10:40'),
(413, 249, 125, 139, 500, NULL, '2021-05-13 08:16:20'),
(414, 249, 126, 139, 500, NULL, '2021-05-13 08:16:20'),
(415, 249, 127, 139, 500, NULL, '2021-05-13 08:16:20'),
(416, 249, 128, 139, 500, NULL, NULL),
(417, 249, 129, 139, 500, NULL, NULL),
(418, 249, 125, 140, 500, NULL, NULL),
(419, 249, 126, 140, 500, NULL, NULL),
(420, 249, 127, 140, 500, NULL, NULL),
(421, 249, 128, 140, 500, NULL, NULL),
(422, 249, 129, 140, 500, NULL, NULL),
(423, 249, 125, 141, 500, NULL, NULL),
(424, 249, 126, 141, 500, NULL, NULL),
(425, 249, 127, 141, 500, NULL, NULL),
(426, 249, 128, 141, 500, NULL, NULL),
(427, 249, 129, 141, 500, NULL, NULL),
(428, 249, 125, 142, 500, NULL, NULL),
(429, 249, 126, 142, 500, NULL, NULL),
(430, 249, 127, 142, 500, NULL, NULL),
(431, 249, 128, 142, 500, NULL, NULL),
(432, 249, 129, 142, 500, NULL, NULL),
(433, 249, 125, 143, 500, NULL, NULL),
(434, 249, 126, 143, 500, NULL, NULL),
(435, 249, 127, 143, 500, NULL, NULL),
(436, 249, 128, 143, 500, NULL, NULL),
(437, 249, 129, 143, 500, NULL, NULL),
(439, 250, 125, 139, 500, NULL, '2021-05-13 08:21:55'),
(440, 250, 126, 139, 500, NULL, '2021-05-13 08:21:55'),
(441, 250, 127, 139, 500, NULL, '2021-05-13 08:21:55'),
(442, 250, 128, 139, 500, NULL, NULL),
(443, 250, 129, 139, 500, NULL, NULL),
(444, 250, 125, 140, 500, NULL, NULL),
(445, 250, 126, 140, 500, NULL, NULL),
(446, 250, 127, 140, 500, NULL, NULL),
(447, 250, 128, 140, 500, NULL, NULL),
(448, 250, 129, 140, 500, NULL, NULL),
(449, 250, 125, 141, 500, NULL, NULL),
(450, 250, 126, 141, 500, NULL, NULL),
(451, 250, 127, 141, 500, NULL, NULL),
(452, 250, 128, 141, 500, NULL, NULL),
(453, 250, 129, 141, 500, NULL, NULL),
(454, 250, 125, 142, 500, NULL, NULL),
(455, 250, 126, 142, 500, NULL, NULL),
(456, 250, 127, 142, 500, NULL, NULL),
(457, 250, 128, 142, 500, NULL, NULL),
(458, 250, 129, 142, 500, NULL, NULL),
(459, 250, 125, 143, 500, NULL, NULL),
(460, 250, 126, 143, 500, NULL, NULL),
(461, 250, 127, 143, 500, NULL, NULL),
(462, 250, 128, 143, 500, NULL, NULL),
(463, 250, 129, 143, 500, NULL, NULL),
(465, 251, 125, 139, 500, NULL, '2021-05-13 08:27:31'),
(466, 251, 126, 139, 500, NULL, '2021-05-13 08:27:31'),
(467, 251, 127, 139, 500, NULL, '2021-05-13 08:27:31'),
(468, 251, 128, 139, 500, NULL, NULL),
(469, 251, 129, 139, 500, NULL, NULL),
(470, 251, 125, 140, 500, NULL, NULL),
(471, 251, 126, 140, 500, NULL, NULL),
(472, 251, 127, 140, 500, NULL, NULL),
(473, 251, 128, 140, 500, NULL, NULL),
(474, 251, 129, 140, 500, NULL, NULL),
(475, 251, 125, 141, 500, NULL, NULL),
(476, 251, 126, 141, 500, NULL, NULL),
(477, 251, 127, 141, 500, NULL, NULL),
(478, 251, 128, 141, 500, NULL, NULL),
(479, 251, 129, 141, 500, NULL, NULL),
(480, 251, 125, 142, 500, NULL, NULL),
(481, 251, 126, 142, 500, NULL, NULL),
(482, 251, 127, 142, 500, NULL, NULL),
(483, 251, 128, 142, 500, NULL, NULL),
(484, 251, 129, 142, 500, NULL, NULL),
(485, 251, 125, 143, 500, NULL, '2021-05-13 08:28:37'),
(486, 251, 126, 143, 500, NULL, '2021-05-13 08:28:37'),
(487, 251, 127, 143, 500, NULL, '2021-05-13 08:28:37'),
(488, 251, 128, 143, 500, NULL, '2021-05-13 08:28:37'),
(489, 251, 129, 143, 500, NULL, '2021-05-13 08:28:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `session_users`
--

CREATE TABLE `session_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refresh_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_expried` datetime NOT NULL,
  `refresh_token_expried` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `session_users`
--

INSERT INTO `session_users` (`id`, `token`, `refresh_token`, `token_expried`, `refresh_token_expried`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'NXyAoNc3hbv01S5CVoMZszEGLCLAJM9tiLw02jIN', 'Ru8cj3mVL6tlqDShCztYUHKiIHJLZcgd5la2n0Xv', '2021-06-12 15:40:16', '2022-05-08 15:40:16', 29, '2021-05-13 08:40:16', '2021-05-13 08:40:16'),
(4, 'zHGaHNSUGokEsX06dWSIYS98OxJtVYd1KK4rtM16', 'I0YUEUgmOp2IeMf2KVD8yDquY1s3ZxMISh0HnNQH', '2021-06-12 15:40:48', '2022-05-08 15:40:48', 30, '2021-05-13 08:40:48', '2021-05-13 08:40:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` bigint(20) NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `size`, `created_at`, `updated_at`) VALUES
(125, 37, NULL, NULL),
(126, 38, NULL, NULL),
(127, 39, NULL, NULL),
(128, 40, NULL, NULL),
(129, 41, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`id`, `category_id`, `name`, `address`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(21, 21, 'Nike', 'Việt Nam', '0369852147', 1, '2021-05-11 01:44:27', '2021-05-11 01:44:27'),
(22, 21, 'Adidas', 'Italia', '0369857825', 1, '2021-05-11 01:44:57', '2021-05-11 01:44:57'),
(23, 21, 'Balenciaga', 'Japan', '033697852', 1, '2021-05-11 01:45:44', '2021-05-11 01:45:44'),
(24, 23, 'Puma', 'Đức', '0378965412', 1, '2021-05-11 01:47:27', '2021-05-11 01:47:27'),
(26, 22, 'Red Wing', 'Mỹ', '0345632198', 1, '2021-05-11 01:49:50', '2021-05-11 01:49:50'),
(27, 22, 'Grenson', 'Mỹ', '0356987413', 1, '2021-05-11 01:50:18', '2021-05-11 01:50:18'),
(28, 24, 'Vans', 'China', '0356456456', 1, '2021-05-11 01:51:09', '2021-05-11 01:51:09'),
(29, 24, 'Converse', 'Thailan', '0378963636', 1, '2021-05-11 01:51:39', '2021-05-11 01:51:39'),
(30, 24, 'Biti\'s', 'Việt Nam', '03789789789', 1, '2021-05-11 01:52:19', '2021-05-11 01:52:19'),
(31, 25, 'Dép lào', 'Lào', '025896317', 2, '2021-05-13 08:30:40', '2021-05-13 08:30:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofbirth` date NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `code`, `name`, `dateofbirth`, `phone`, `address`, `email`, `img`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(29, 'NV001', 'Admin Manager', '2021-04-29', '012345678', 'TMA Solution BINH DINH', 'admin@gmail.com', '29901734.png', '$2y$10$l2SDP5KneSIpObSaeKJ/ie4HjTAQxe87/1VA/tkFp1XJg2Qwi7ClS', 1, 1, '2021-05-13 08:37:48', '2021-05-13 08:37:48'),
(30, 'NV002', 'User Manager', '2021-04-29', '012345678', 'TMA Solution BINH DINH', 'user@gmail.com', '891160548.png', '$2y$10$qyd9n9K1JHJIgbfSxKjGxeIi1acgcYStl./G54QxUXQiIOIgv2zFy', 2, 1, '2021-05-13 08:39:07', '2021-05-13 08:39:07'),
(31, 'NV003', 'Staff Manager', '2021-04-29', '012345678', 'TMA Solution BINH DINH', 'staff@gmail.com', '222672829.png', '$2y$10$WqrehhAFR2Ku1xSvuxXll.CWo3EQrXREszfbkdLpVGQNCJMm3vSYu', 2, 2, '2021-05-13 08:39:36', '2021-05-13 08:39:36');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `bills_detail`
--
ALTER TABLE `bills_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_product_size_color` (`id_product_size_color`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_size_color`
--
ALTER TABLE `product_size_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Chỉ mục cho bảng `session_users`
--
ALTER TABLE `session_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT cho bảng `bills_detail`
--
ALTER TABLE `bills_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT cho bảng `product_size_color`
--
ALTER TABLE `product_size_color`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;

--
-- AUTO_INCREMENT cho bảng `session_users`
--
ALTER TABLE `session_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `bills_detail`
--
ALTER TABLE `bills_detail`
  ADD CONSTRAINT `bills_detail_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `bills_detail_ibfk_3` FOREIGN KEY (`id_product_size_color`) REFERENCES `product_size_color` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `product_size_color`
--
ALTER TABLE `product_size_color`
  ADD CONSTRAINT `product_size_color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_size_color_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `product_size_color_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`);

--
-- Các ràng buộc cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
