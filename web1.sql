-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2023 lúc 07:05 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4
create database web1;
USE web1;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `createAt`, `updateAt`) VALUES
('admin1', 'ilovebiya', NULL, NULL),
('admin2', 'biyabigbig', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `date`, `approved`, `content`, `news_id`, `user_id`, `parent`) VALUES
(1, '2021-12-12 00:00:00', 0, 'Hello World', 1, 'hihi@gmail.com', NULL),
(2, '2021-12-12 00:00:00', 1, 'NSFW', 1, 'hihi@gmail.com', NULL),
(3, '2021-12-12 00:00:00', 1, 'Đinh Vũ Hà đã đánh giá', 2, 'kaicongchua@gmail.com', NULL),
(4, '2023-12-14 18:53:01', 1, 'vai\n', 4, 'kaicongchua@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `gmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `createAt`, `updateAt`, `phone`, `gmail`) VALUES
(1, 'Chi nhánh TPHCM', '268 Lý Thường Kiệt, Phường 14, Quận 10, TPHCM', NULL, NULL, 969696991, 'gojohalflife@gmail.com'),
(2, 'Chi nhánh Hà Nội', 'Hà Nội', NULL, NULL, 932381737, 'gojohalfman123@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `status`, `date`, `description`, `content`, `title`) VALUES
(1, 1, '2023-11-11 00:00:00', 'Phong cách thời trang nam là một trong những yếu tố ảnh hưởng đến sự tự tin của các chàng trai. Tìm hiểu xem các phong cách thời trang nam nào đang làm mưa làm gió và khiến chị em đổ rần rần trong năm 2022 nhé!\r\n\r\n', 'Phong cách thời trang nam Hàn Quốc:\nLàn sóng Hallyu đã có một sự ảnh hưởng không nhỏ đối với phong cách thời trang nam châu Á và cả thế giới. Phong cách Hàn Quốc mang lại sự trẻ trung, thanh lịch, khiến chị em đều bị thu hút từ ánh nhìn đầu tiên. Nếu “u mê” phong cách này thì bạn đừng quên sắm những chiếc quần jeans ống suông, quần tây, áo thun và đặc biệt là những chiếc sơ mi rộng trong tủ đồ nhé. Các items này mà mix với nhau sẽ mang đến một chàng lãng tử chuẩn “oppa” Hàn Quốc ngay.\n<br>\n<br>\nPhong cách thời trang nam Trung Quốc:\nPhong cách của các “nam thần” trong phim Trung Quốc cũng nhiều lần khiến các chị em đứng ngồi không yên. Với đất nước tỷ dân thì phong cách thời trang Trung Quốc nam cũng rất đa dạng, từ phong trần cho đến lịch lãm, từ phong cách trẻ trung đến trưởng thành đều xuất hiện ở đất nước này. Dù các bạn theo đuổi sự tươi trẻ, khỏe khoắn hay lịch sự, chín chắn thì với những tips phối đồ với phong cách thời trang Trung Quốc nam đều sẽ khiến “ai đó” phải ngước nhìn.\n<br>\n<br>\nPhong cách thời trang nam tối giản:\nPhong cách thời trang tối giản cho nam – “Minimalism style” được nhiều người yêu thích khi vừa dễ phối đồ, lại không cần phải quá đau đầu trong việc lựa chọn trang phục. Đặc điểm của phong cách này đầu tiên cần kể đến màu sắc. Những tông màu cho phong cách thời trang nam đơn giản thường là tông trung tính, không quá 3 màu sắc trong 1 outfit. Những màu thường được Minimalist (người theo chủ nghĩa tối giản) lựa chọn là đen, trắng, ghi, be, nâu, xanh navy. Về thiết kế, phong cách minimalism thường hợp với những trang phục giản lược các đường nét rườm rà, không nhấn nhá nhiều chi tiết. Phong cách mang đến sự đơn giản nhưng không nhạt nhoà, mà đằng sau đó là một chàng trai, một quý ông tinh tế và đầy cuốn hút.\n<br>\n<br>\nPhong cách thời trang nam street style:\nSự phong trần, mạnh mẽ được thể hiện nhiều nhất ở phong cách đường phố. Những chàng trai cá tính thường rất phá cách mỗi khi “lên đồ”, nhưng tất cả đều thể hiện được vẻ nam tính, quyến rũ của mình. Với style này, bạn có thể thoải mái mix đồ theo cách mình ưng, bởi không có chuẩn mực nào dành cho trang phục streetwear. Bạn chỉ cần tự tin là chính mình và mặc những gì mình thích, tất cả đều sẽ phải ngoái nhìn với sự cá tính này.\n', 'NHỮNG PHONG CÁCH PHỐI ĐỒ THỜI TRANG NAM HOT NHẤT HIỆN NAY\n'),
(2, 1, '2023-12-04 00:00:00', 'Ngoài Off-White, đêm khai mạc Tuần lễ thời trang nữ Thu-Đông Paris 2022 còn có sự ra mắt ấn tượng của các dự án về thời trang kỹ thuật số để phục vụ cho \"vũ trụ ảo\" (metaverse).', 'Tối 28/2, Tuần lễ thời trang nữ Thu-Đông Paris 2022 đã được khai mạc tại thủ đô nước Pháp, với sự tham dự trực tiếp của nhiều ngôi sao hàng đầu thế giới, trong đó có nữ ca sỹ Rihanna đang mang bầu ở những tháng cuối.\n<br>\n<br>\nTuần lễ thời trang nữ Thu-Đông năm nay có sự góp mặt của 95 thương hiệu thời trang lớn của thế giới, trong đó 13 nhà mốt tham gia theo hình thức trực tuyến do lo ngại ảnh hưởng của dịch COVID-19.\n<br>\n<br>\nTrong bối cảnh các biện pháp hạn chế để phòng ngừa dịch COVID-19 đã được nới lỏng trên khắp châu Âu, nhiều tên tuổi lớn như Dior, Chanel và Hermes sẽ tổ chức các buổi trình diễn catwalk trực tiếp trong Tuần lễ thời trang nữ Thu-Đông 2022, trong khi nhà mốt Yves Saint Laurent đã từ chối tham gia.\n<br>\n<br>\nNhiều thương hiệu khác vẫn đang kết hợp giữa hai hình thức trực tuyến và trực tiếp để giới thiệu các bộ trang phục đến với người mua và giới truyền thông. Hình thức này được phát triển trong hai năm qua và vẫn đang được nhiều nhà mốt, ví dụ như Issey Miyake của Nhật Bản, áp dụng.', 'TUẦN LỄ THỜI TRANG NỮ THU-ĐÔNG PARIS 2022 HƯỚNG TỚI VŨ TRỤ ẢO'),
(3, 1, '2023-12-01 10:15:37', 'Thời trang hiện đại đang ngày càng trở nên phóng khoáng, đơn giản, không còn gò bó, ngột ngạt hay diêm dúa, lồng lộn như xưa. Và xu hướng thời trang 2022 cho giới trẻ cũng đang hòa vào xu hướng chung của thời trang hiện đại.\n\n\n', '\r\nThế giới thời trang là một khái niệm rộng lớn và muôn màu. Đâu cần phải đầm đuôi cá hay váy xẻ tà cầu kỳ, lộng lẫy, một chiếc quần jean đơn giản phối với một chiếc áo sơ mi cũng đã trở thành một phong cách rồi đấy. Thời trang nữ thường theo trào lưu, theo cái mà nhiều người quan niệm đó là đẹp, là sang, và chính trào lưu sẽ tạo xu hướng.\r\n<br>\r\n<br>\r\nChiếc quần rách chắc không còn xa lạ gì với các bạn nữ. Nó không những mang lại cho người mặc cảm giác thoải mái, năng động mà còn khiến bạn trở nên nổi bật trước đám đông. Năm 2022, xu hướng này sẽ trở lại mạnh mẽ bởi sự giản dị và hiện đại đang được giới trẻ rất quan tâm.\r\n<br>\r\n<br>\r\nKhông phải vest chỉ dành cho đàn ông, phụ nữ mặc vest còn đẹp hơn rất nhiều, mọi sự sang trọng, tinh tế, sắc sảo đều được thể hiện hết trong phong cách này. Đây là kiểu thời trang công sở độc đáo khi kết hợp với những phụ kiện đi kèm, bạn sẽ trở nên sành điệu hơn rất nhiều.\r\n<br>\r\n<br>\r\nNhững năm gần đây, các trang phục mang họa tiết da động vật như ngựa vằn, da rắn, da cá sấu, da báo, hổ… xuất hiện rất nhiều trong các thiết kế giày cao gót, túi xách, mũ… Đây là thể loại họa tiết cá tính và sành điệu giúp chị em trông thêm tự tin và kiêu hãnh hơn.\r\n\r\n\r\n\r\n\r\n', 'XU HƯỚNG THỜI TRANG 2022: NĂNG ĐỘNG, CÁ TÍNH LÊN NGÔI'),
(4, 1, '2023-12-09 00:00:00', 'Có những trang phục nàng chỉ có thể mặc vào những ngày mùa đầy gió, những ngày mùa đầy mùi hương – đó là những ngày tháng 12, ngày tháng của mùa lễ hội, tiệc tùng và cũng là những ngày mà các vạt nắng đông vẫn còn kịp vương đầy, rạng rỡ, còn chưa bị làm lu mờ bởi những cơn mưa bụi mùa xuân.\r\n\r\n', 'Tháng 12 không chỉ cuốn các nàng đi trong những bộn bề công việc chốn văn phòng mà còn mang đến cho nàng đầy ắp sự thú vị của những ngày lễ, đêm hội, sự kiện gặp gỡ cùng các buổi tiệc tùng. Không còn quá lâu, chỉ còn chưa đầy hai tuần nữa là tới Noel và cũng chỉ còn hơn một tháng nữa là tới tết cổ truyền, nàng đã chuẩn bị gì cho tủ quần áo tháng 12 đặc biệt của mình?\r\n<br>\r\n<br>\r\nCác nhà thiết kế của thương hiệu thời trang Lê House có tiếng là lãng mạn. Họ thường rất kịp thời tung ra thị trường những mẫu thiết kế thời trang quyến rũ nhất, ngọt ngào nhất, sexy nhất và cũng bắt nhịp thị trường nhất. Lần này, họ mang tới tủ quần áo cho các nàng chỉ với hai gam màu đặc biệt. Đó là màu của nắng và màu của đêm…\r\n<br>\r\n<br>\r\nMàu của nắng là những gam màu ấm áp, chói chang, rực rỡ, đong đầy niềm vui và sự hy vọng. Nàng có thể diện những bộ cánh nổi bật nhất, xuống phố, làm những điều cuối cùng của năm trong hanh thông và phấn khích.\r\n<br>\r\n<br>\r\nĐó có thể là những chiếc đầm dài, những váy xòe điệu đà hay là những chiếc đầm chữ A, đầm ôm body siêu quyến rũ… Tất thảy chúng mang màu đỏ, màu vàng – những màu mà chỉ có tia nắng mặt trời mới có. Không khí ấm áp của mùa lễ hội sẽ ùa đến. Không gian lạnh giá của những ngọn gió mùa đông như tan ra bởi những khí sắc như thế. Tháng 12, tủ quần áo của nàng nhất định phải có.\r\n<br>\r\n<br>\r\nNếu là một tín đồ thời trang thật sự, nàng hãy nhớ nhé, tủ quần áo tháng 12 của nàng, chắc chắn không thể thiếu những gam màu của nắng cho những ngày dài rộn rã giúp nàng khoe trọn sắc thắm và những gam màu của đêm cho những niềm vui bất tận giúp nàng tỏa sáng và gắn kết với tất thảy xung quanh…\r\n', 'MÀU NẮNG HAY MÀU ĐÊM SẼ THỐNG LĨNH TỦ QUẦN ÁO THÁNG 12 CỦA NÀNG ?');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_code` int(11) NOT NULL,
  `order_date` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_code`, `order_date`, `order_status`, `user_email`) VALUES
(1, 30087205, 12, 1, ''),
(2, 96110334, 12, 0, ''),
(3, 7483697, 12, 0, ''),
(4, 84543481, 12, 0, ''),
(5, 62807073, 12, 0, ''),
(6, 15189155, 12, 0, ''),
(7, 32325543, 12, 0, ''),
(8, 46576540, 12, 0, ''),
(9, 3746817, 12, 0, ''),
(10, 42212460, 12, 0, ''),
(11, 22237574, 12, 0, ''),
(12, 94830163, 12, 0, ''),
(13, 85900874, 12, 0, ''),
(14, 97188005, 12, 0, ''),
(15, 66416373, 12, 0, ''),
(16, 61138766, 12, 0, ''),
(17, 80083330, 12, 0, ''),
(18, 51991945, 12, 0, ''),
(19, 90523893, 12, 0, ''),
(20, 17839288, 12, 0, ''),
(21, 81996382, 12, 0, ''),
(22, 69133272, 12, 0, ''),
(23, 28915270, 12, 0, ''),
(24, 99735183, 12, 0, ''),
(25, 64074399, 12, 0, ''),
(26, 29683498, 12, 0, ''),
(27, 37179045, 12, 0, ''),
(28, 23756075, 14, 0, ''),
(29, 38710871, 14, 0, ''),
(30, 93775828, 14, 0, ''),
(31, 19628781, 14, 0, ''),
(32, 89246877, 14, 0, ''),
(33, 66355117, 14, 0, 'thenhanvt123@gmail.com'),
(34, 92139475, 14, 0, 'thenhanvt123@gmail.com'),
(35, 97108842, 14, 1, 'thenhanvt123@gmail.com'),
(36, 63158353, 15, 0, 'thenhanvt123@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_size` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `method` varchar(200) NOT NULL,
  `proof` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_code`, `product_id`, `product_quantity`, `product_size`, `name`, `phone`, `email`, `location`, `method`, `proof`) VALUES
(1, '30087205', 2, 1, '', 'Harvertz', '0856684801', 'kaicongchua@gmail.com', 'Phạm Ngũ Lão', '', NULL),
(2, '30087205', 1, 1, '', 'Harvertz', '0856684801', 'kaicongchua@gmail.com', 'Phạm Ngũ Lão', '', NULL),
(22, '85900874', 1, 1, '', 'Harvertz', '0856684801', 'kaicongchua@gmail.com', 'Bachs Khoa', '', NULL),
(27, '37179045', 2, 1, '', 'Kai Harvertz', '0856684801', 'kaicongchua@gmail.com', '29 Phạm Ngũ Lão, Lâm Đồng, 12, Vũng Tàu', 'Thanh toán bằng mã QR', 'assets/images/2023_12_12_12_03_28pm.jpg'),
(28, '37179045', 6, 7, '', 'Kai Harvertz', '0856684801', 'kaicongchua@gmail.com', '29 Phạm Ngũ Lão, Lâm Đồng, 12, Vũng Tàu', 'Thanh toán bằng mã QR', 'assets/images/2023_12_12_12_03_28pm.jpg'),
(29, '19628781', 41, 1, '', 'Nhân Từ Mai Thế', '0865684801', 'thenhanvt123@gmail.com', '29 Phạm Ngũ Lão, Lâm Đồng, 12, Vũng Tàu', 'Thanh toán khi nhận hàng', 'assets/images/2023_12_14_08_06_30pm.'),
(30, '89246877', 22, 1, '', 'Trossard', '0865684801', 'thenhanvt123@gmail.com', '29 Phạm Ngũ Lão, Lâm Đồng, 12, Vũng Tàu', 'Thanh toán khi nhận hàng', 'assets/images/2023_12_14_08_07_40pm.'),
(31, '66355117', 2, 0, '', 'Trossard', '0865684801', 'thenhanvt123@gmail.com', '29 Phạm Ngũ Lão, Lâm Đồng, 12, Vũng Tàu', 'Thanh toán khi nhận hàng', 'assets/images/2023_12_14_08_09_29pm.'),
(32, '92139475', 42, 5, '', 'Trossard', '0865684801', 'thenhanvt123@gmail.com', '29 Phạm Ngũ Lão, Lâm Đồng, 12, Vũng Tàu', 'Thanh toán khi nhận hàng', 'assets/images/2023_12_14_10_08_20pm.'),
(33, '97108842', 42, 1, '', 'Trossard', '0865684801', 'thenhanvt123@gmail.com', '29 Phạm Ngũ Lão, Lâm Đồng, 12, Vũng Tàu', 'Thanh toán khi nhận hàng', 'assets/images/2023_12_14_10_09_25pm.'),
(34, '97108842', 2, 1, '', 'Trossard', '0865684801', 'thenhanvt123@gmail.com', '29 Phạm Ngũ Lão, Lâm Đồng, 12, Vũng Tàu', 'Thanh toán khi nhận hàng', 'assets/images/2023_12_14_10_09_25pm.'),
(35, '63158353', 42, 4, 'S', 'Trossard', '0865684801', 'thenhanvt123@gmail.com', '29 Phạm Ngũ Lão, Lâm Đồng, 12, Vũng Tàu', 'Thanh toán khi nhận hàng', 'assets/images/2023_12_15_12_42_53am.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'public/img/default/df.jpeg',
  `img1` varchar(255) DEFAULT 'public/img/default/df.jpeg',
  `img2` varchar(255) DEFAULT 'public/img/default/df.jpeg',
  `img3` varchar(255) DEFAULT 'public/img/default/df.jpeg',
  `sale` int(11) NOT NULL,
  `vote_number` int(11) NOT NULL,
  `total_stars` int(11) NOT NULL,
  `typeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `price`, `name`, `description`, `content`, `img`, `img1`, `img2`, `img3`, `sale`, `vote_number`, `total_stars`, `typeid`) VALUES
(1, 150000, 'Sweater cổ', 'Áo khoác nam', 'Cách để được tư vấn chính xác ', 'public/img/products/men/011.jpeg', 'public/img/products/men/012.jpeg', 'public/img/products/men/013.jpeg', 'public/img/products/men/014.jpeg', 10, 1, 2, 0),
(2, 150000, 'American Cardigan nâu', 'Áo khoác nam', ' nỉ cao cấp 2 lớp', 'public/img/products/men/021.jpeg', 'public/img/products/men/022.jpeg', 'public/img/products/men/023.jpeg', 'public/img/products/men/024.jpeg', 30, 0, 0, 0),
(3, 200000, 'American Tee ver II', 'Áo khoác nữ', ' aokhoac', 'public/img/products/men/031.jpeg', 'public/img/products/men/032.jpeg', 'public/img/products/men/033.jpeg', 'public/img/products/men/034.jpeg', 10, 0, 0, 0),
(4, 85000, 'Organic Sweater ver II', 'Áo sơ mi nam', ' tôi cải thiện chất lượng dịch vụ tốt hơn.', 'public/img/products/men/041.jpeg', 'public/img/products/men/042.jpeg', 'public/img/products/men/043.jpeg', 'public/img/products/men/044.jpeg', 0, 9, 0, 0),
(5, 79000, '3CM RAGLAN Sweater', 'Quần Jean nam', 'Liên quan đến chất lượng', 'public/img/products/men/051.jpeg', 'public/img/products/men/052.jpeg', 'public/img/products/men/053.jpeg', 'public/img/products/men/054.jpeg', 8, 0, 0, 0),
(6, 129000, 'American Kritted Polo Shirt', 'Quần Jean nam', ' Liên quann đến chất lượng', 'public/img/products/men/061.jpeg', 'public/img/products/men/062.jpeg', 'public/img/products/men/063.jpeg', 'public/img/products/men/064.jpeg', 10, 0, 0, 0),
(7, 100000, 'American Oversized Blazer', 'Quần lửng nam', ' Lưng nhận đổi trả với lí do không vừa ý ', 'public/img/products/men/071.jpeg', 'public/img/products/men/072.jpeg', 'public/img/products/men/073.jpeg', 'public/img/products/men/074.jpeg', 15, 0, 0, 0),
(8, 208000, 'Daily Suit Trouser', 'Quần lửng nam', 'Sản xuất trực tiếp tại Việt Nam.', 'public/img/products/men/081.jpeg', 'public/img/products/men/082.jpeg', 'public/img/products/men/083.jpeg', 'public/img/products/men/084.jpeg', 10, 0, 0, 0),
(9, 175000, 'S Cross Tee', 'Quần lửng nam', 'hợp công nghệ chống nhăn, chống nhàu.', 'public/img/products/men/091.jpeg', 'public/img/products/men/092.jpeg', 'public/img/products/men/093.jpeg', 'public/img/products/men/094.jpeg', 10, 0, 0, 0),
(10, 398000, 'Checked Outer Jacket', 'Quần lửng nam', 'các phẩm dịch vụ của GENVI', 'public/img/products/men/101.jpeg', 'public/img/products/men/102.jpeg', 'public/img/products/men/103.jpeg', 'public/img/products/men/104.jpeg', 10, 0, 0, 0),
(11, 68000, 'Time Bomber jacket', 'váy nữ', 'váy trễ vai tguyên ', 'public/img/products/men/111.jpeg', 'public/img/products/men/112.jpeg', 'public/img/products/men/113.jpeg', 'public/img/products/men/114.jpeg', 10, 0, 0, 0),
(12, 109000, 'City Sweatshirt', 'áo nam', '4 chiều  thấm hút chuẩn size ', 'public/img/products/men/121.jpeg', 'public/img/products/men/122.jpeg', 'public/img/products/men/123.jpeg', 'public/img/products/men/124.jpeg', 10, 0, 0, 0),
(13, 110000, 'Time Suit Jacket', 'áo nữ', 'hihi', 'public/img/products/men/131.jpeg', 'public/img/products/men/132.jpeg', 'public/img/products/men/133.jpeg', 'public/img/products/men/134.jpeg', 30, 0, 0, 0),
(14, 51000, 'Time Trousers', 'áo nam', ' ƯU ĐÃI KHỦNG!!!', 'public/img/products/men/141.jpeg', 'public/img/products/men/142.jpeg', 'public/img/products/men/143.jpeg', 'public/img/products/men/144.jpeg', 20, 0, 0, 0),
(15, 51000, 'Denim Shirt', 'áo nam', 'các bạn hoàn toàn yên tâm khi mua hàng tại nhà Chanh', 'public/img/products/men/151.jpeg', 'public/img/products/men/152.jpeg', 'public/img/products/men/153.jpeg', 'public/img/products/men/154.jpeg', 35, 0, 0, 0),
(16, 205000, 'S Knit Tee', 'quần nam', 'bạn hoàn toàn yên tâm khi mua hàng tại nhà Chanh', 'public/img/products/men/161.jpeg', 'public/img/products/men/162.jpeg', 'public/img/products/men/163.jpeg', 'public/img/products/men/164.jpeg', 10, 0, 0, 0),
(17, 240000, 'Smart Baggy Jeans', 'Quần Jeans', 'hihi', 'public/img/products/men/171.jpeg', 'public/img/products/men/172.jpeg', 'public/img/products/men/173.jpeg', 'public/img/products/men/174.jpeg', 0, 0, 0, 0),
(18, 220000, 'V Club Polo', 'áo nam', ' sản phẩm dung sai cho phép ', 'public/img/products/men/181.jpeg', 'public/img/products/men/182.jpeg', 'public/img/products/men/183.jpeg', 'public/img/products/men/184.jpeg', 10, 0, 0, 0),
(19, 250000, 'Patch Polo Shirt', 'áo nam nữ', 'Len lông xuyên vận động', 'public/img/products/men/191.jpeg', 'public/img/products/men/192.jpeg', 'public/img/products/men/193.jpeg', 'public/img/products/men/194.jpeg', 15, 0, 0, 0),
(20, 200000, 'Great Life Tee Ver II', 'quần lót nam', 'trả hàng hoặc hoàn tiền cho khách ạ', 'public/img/products/men/201.jpeg', 'public/img/products/men/202.jpeg', 'public/img/products/men/203.jpeg', 'public/img/products/men/204.jpeg', 30, 0, 0, 0),
(21, 373000, 'Áo phao lửng phối viền lông cừu', 'áo nữ', 'Len', 'public/img/products/women/011.jpg', 'public/img/products/women/012.jpg', 'public/img/products/women/013.jpg', 'public/img/products/women/014.jpg', 30, 0, 0, 1),
(22, 150000, 'Áo khoác kaki lửng DT phối lé', 'Áo khoác', ' tđược tư vấn chính xác nhất', 'public/img/products/women/021.jpg', 'public/img/products/women/022.jpg', 'public/img/products/women/023.jpg', 'public/img/products/women/024.jpg', 20, 0, 0, 1),
(23, 150000, 'Áo phao ngắn túi cơi có mũ', 'áo nữ', 'hất liệu cúa áo khoác nỉ nam', 'public/img/products/women/031.jpg', 'public/img/products/women/032.jpg', 'public/img/products/women/033.jpg', 'public/img/products/women/034.jpg', 10, 0, 0, 1),
(24, 200000, 'Áo khoác kaki dài đai eo', 'Áo khoác nữ', 'Áo Krdiganformrong', 'public/img/products/women/041.jpg', 'public/img/products/women/042.jpg', 'public/img/products/women/043.jpg', 'public/img/products/women/044.jpg', 30, 0, 0, 1),
(25, 85000, 'Áo khoác kaki lửng lá cổ kèm đai', 'Áo sơ mi nam', ' chất lượng dịch vụ tốt hơn.', 'public/img/products/women/051.jpg', 'public/img/products/women/052.jpg', 'public/img/products/women/053.jpg', 'public/img/products/women/054.jpg', 30, 0, 0, 1),
(26, 79000, 'Áo khoác croptop DT vạt bung', 'Quần Jean nam', 'THÔNG TIN SẢNhào liên quan đến chất lượng', 'public/img/products/women/061.jpg', 'public/img/products/women/062.jpg', 'public/img/products/women/063.jpg', 'public/img/products/women/064.jpg', 10, 0, 0, 1),
(27, 129000, 'Khoác kaki can bong ngực thắt đai', 'Quần Jean nam', ' ở đến chất lượng', 'public/img/products/women/071.jpg', 'public/img/products/women/072.jpg', 'public/img/products/women/073.jpg', 'public/img/products/women/074.jpg', 30, 0, 0, 1),
(28, 100000, 'Áo thun ôm LT lệch vai', 'áo nữ', 'Không nhận đổi trả với lí do không vừa ý ', 'public/img/products/women/081.jpg', 'public/img/products/women/082.jpg', 'public/img/products/women/083.jpg', 'public/img/products/women/084.jpg', 30, 0, 0, 1),
(29, 208000, 'Đầm Vest ôm xếp ly', 'Quần lửng nam', 'QUẦN ĐÙI THần sp tại Việt Nam.', 'public/img/products/women/091.jpg', 'public/img/products/women/092.jpg', 'public/img/products/women/093.jpg', 'public/img/products/women/094.jpg', 30, 0, 0, 1),
(30, 175000, 'Chân váy xoè cạp to can diễu', 'Quần lửng nam', ' chống nhăn', 'public/img/products/women/101.jpg', 'public/img/products/women/102.jpg', 'public/img/products/women/103.jpg', 'public/img/products/women/104.jpg', 35, 0, 0, 1),
(31, 398000, 'Chân váy A phối cơi ', 'Quần lửng nam', 'dịch vụ của GENVIET', 'public/img/products/women/111.jpg', 'public/img/products/women/112.jpg', 'public/img/products/women/113.jpg', 'public/img/products/women/114.jpg', 30, 0, 0, 1),
(32, 68000, 'Đầm party 2 dây in hoạ tiết', 'váy nữ', 'vá hàng yêu quý của shop ', 'public/img/products/women/121.jpg', 'public/img/products/women/122.jpg', 'public/img/products/women/123.jpg', 'public/img/products/women/124.jpg', 20, 0, 0, 1),
(33, 109000, 'Đầm A cổ nơ vải phối', 'áo nam', 'Sản lượng', 'public/img/products/women/131.jpg', 'public/img/products/women/132.jpeg', 'public/img/products/women/133.jpeg', 'public/img/products/women/134.jpeg', 30, 0, 0, 1),
(34, 110000, 'Quần soóc in hoa gấp gấu', 'áo nữ', 'giare', 'public/img/products/women/141.jpg', 'public/img/products/women/142.jpg', 'public/img/products/women/143.jpg', 'public/img/products/women/144.jpg', 35, 0, 0, 1),
(35, 51000, 'Áo khoác tuytsi cổ vest đai eo', 'áo nam', 'nhận ƯU ĐÃI KHỦNG!!!', 'public/img/products/women/151.jpg', 'public/img/products/women/152.jpg', 'public/img/products/women/153.jpg', 'public/img/products/women/154.jpg', 30, 0, 0, 1),
(36, 51000, 'Chân váy bút chì nơ cạp', 'quần nam', ' mua hàng tại nhà Chanh', 'public/img/products/women/161.jpg', 'public/img/products/women/162.jpg', 'public/img/products/women/163.jpg', 'public/img/products/women/164.jpg', 30, 0, 0, 1),
(37, 205000, 'CV bút chì can cạp đính cúc', 'quần nam', 'mua hàng tại nhà Chanh', 'public/img/products/women/171.jpg', 'public/img/products/women/172.jpg', 'public/img/products/women/173.jpg', 'public/img/products/women/174.jpg', 30, 0, 0, 1),
(38, 240000, 'Quần baggy ly súp cạp', 'áo nữ', ' Hihi ', 'public/img/products/women/181.jpg', 'public/img/products/women/182.jpg', 'public/img/products/women/183.jpg', 'public/img/products/women/184.jpg', 30, 0, 0, 1),
(39, 250000, 'Quần baggy khóa moi xếp ly', 'áo nam nữ', 'Len ', 'public/img/products/women/191.jpg', 'public/img/products/women/192.jpg', 'public/img/products/women/193.jpg', 'public/img/products/women/194.jpg', 30, 0, 0, 1),
(40, 200000, 'Quần loe cạp to đính cúc', 'quần lót nam', 'ng hoặc hoàn tiền cho khách ạ', 'public/img/products/women/201.jpg', 'public/img/products/women/202.jpg', 'public/img/products/women/203.jpg', 'public/img/products/women/204.jpg', 30, 0, 0, 1),
(41, 373000, 'Giày Thể Thao Nam MWC NATT- 5488', 'Giày', 'Form', 'public/img/products/shoes/011.jpg', 'public/img/products/shoes/012.jpg', 'public/img/products/shoes/013.jpg', 'public/img/products/shoes/014.jpg', 30, 0, 0, 2),
(42, 150000, 'Giày Thể Thao Nam MWC NATT- 5490', 'giày', 'rực tiếp cho shop để được tư vấn chính xác nhất', 'public/img/products/shoes/021.jpg', 'public/img/products/shoes/022.jpg', 'public/img/products/shoes/023.jpg', 'public/img/products/shoes/024.jpg', 30, 1, 3, 2),
(43, 150000, 'Giày Thể Thao Nam MWC NATT - 5491', 'giày', 'oác nỉ nam : nỉ cao cấp 2 lớp', 'public/img/products/shoes/031.jpg', 'public/img/products/shoes/032.jpg', 'public/img/products/shoes/033.jpg', 'public/img/products/shoes/034.jpg', 30, 0, 0, 2),
(44, 200000, 'Giày Oxford MWC NUOX- 9635', 'Áo khoác nữ', 'Áo Khoákhoac', 'public/img/products/shoes/041.jpg', 'public/img/products/shoes/042.jpg', 'public/img/products/shoes/043.jpg', 'public/img/products/shoes/044.jpg', 30, 0, 0, 2),
(45, 85000, 'Giày Oxford MWC NUOX- 9633', 'Áo sơ mi nam', 'dịch vụ tốt hơn.', 'public/img/products/shoes/051.jpg', 'public/img/products/shoes/052.jpg', 'public/img/products/shoes/053.jpg', 'public/img/products/shoes/054.jpg', 10, 0, 0, 2),
(46, 79000, 'Giày Oxford MWC NUCG- 4482', 'Quần Jean nam', 'THÔNG ', 'public/img/products/shoes/061.jpg', 'public/img/products/shoes/062.jpg', 'public/img/products/shoes/063.jpg', 'public/img/products/shoes/064.jpg', 30, 0, 0, 2),
(47, 129000, 'Giày boot nam MWC NABO- 8042', 'Quần Jean nam', 'THÔNG nhiệt độquan đến chất lượng', 'public/img/products/shoes/071.jpg', 'public/img/products/shoes/072.jpg', 'public/img/products/shoes/073.jpg', 'public/img/products/shoes/074.jpg', 20, 0, 0, 2),
(48, 100000, 'Giày Thể Thao Nam MWC NATT- M668', 'Quần lửng nam', 'THÔNG không vừa ý ', 'public/img/products/shoes/081.jpg', 'public/img/products/shoes/082.jpg', 'public/img/products/shoes/083.jpg', 'public/img/products/shoes/084.jpg', 30, 0, 0, 2),
(49, 208000, 'Giày cao gót MWC NUCG- 4472', 'Quần lửng nam', 'QUẦN ĐÙI tại Việt Nam.', 'public/img/products/shoes/091.jpg', 'public/img/products/shoes/092.jpg', 'public/img/products/shoes/093.jpg', 'public/img/products/shoes/094.jpg', 30, 0, 0, 2),
(50, 175000, 'Giày sandal nữ MWC NUSD- 2447', 'Quần lửng nam', ' ng nhăn, chống ', 'public/img/products/shoes/101.jpg', 'public/img/products/shoes/102.jpg', 'public/img/products/shoes/103.jpg', 'public/img/products/shoes/104.jpg', 30, 0, 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT 'public/img/default/avtdf.jpg',
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`email`, `profile_photo`, `fname`, `lname`, `gender`, `age`, `phone`, `createAt`, `updateAt`, `password`) VALUES
('hihi@gmail.com', NULL, 'Michael', 'Jordan', 1, 15, '0123456789', NULL, NULL, ''),
('hihihi@gmail.com', NULL, 'Kim', 'Jong Un', 0, 30, '0123456789', NULL, NULL, ''),
('kaicongchua@gmail.com', 'public/img/default/avtdf.jpg', 'Kai', 'Harvertz', 1, 19, '0856684801', '2023-12-12 00:41:22', '2023-12-12 00:41:22', '8fa5f7c11a174d22e187c65963e053d3827dc4701281f4e0f706577cb47a7cce');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `parent` (`parent`);

--
-- Chỉ mục cho bảng `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sale` (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`parent`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
