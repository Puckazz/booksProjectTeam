-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 25, 2024 lúc 01:59 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookdatabase`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `ID_tacgia` varchar(10) NOT NULL,
  `author_name` varchar(30) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `address` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `name_book` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`ID_tacgia`, `author_name`, `year`, `address`, `name_book`) VALUES
('TG02', 'John Wiley & Sons, Inc.', 1970, 'American', 'Data Science For DummiesÊ'),
('TG03', 'Joel Grus', 1976, 'American', 'Data Science From ScratchÊ'),
('TG05', 'Charles Wheelan', 1956, 'American', 'Naked Statistics'),
('TG07', 'Wes McKinney', 1955, 'American', 'Python For Data Analysis'),
('TG08', 'Winston Chang', 1953, 'American', 'Python For Data Analysis2'),
('TG10', 'Jez Humble,David Farley', 1965, 'American', 'Accelerate'),
('TG11', 'Paul Vincent', 1970, 'American', 'Continuous Delivery'),
('TG12', 'Lisa Crispin', 1962, 'American', 'Devops For Dummies'),
('TG14', 'Robert L. Trask II', 1955, 'American', 'Site Reliability Engineering'),
('TG17', 'Mark Freeman', 1897, 'American', 'The Phoenix Project'),
('TG19', 'Ivor Horton', 1949, 'American', 'Artificial Intelligence For Games'),
('TG20', 'Erica Sadun', 1948, 'American', 'Beginning C++ Through Game Programming'),
('TG21', 'Eric Lengyel', 1946, 'American', 'Beginning Iphone Games Development'),
('TG22', 'Kelvin Sung vˆ Mike Goslin', 1944, 'American', 'Foundations Of Game Engine Development'),
('TG23', 'Chris Crawford', 1943, 'American', 'Game Development Tool Essentials'),
('TG24', 'Jesse Schell', 1941, 'American', 'Game Engine Architecture'),
('TG25', 'Michael Schulman:', 1940, 'American', 'Mathematics For Game Developers'),
('TG26', 'Yue Dai, Qiang Li, Chen Lin', 1938, 'American', 'The Art Of Computer Game Design'),
('TG27', 'Bhaskar Chaudhuri', 1937, 'American', 'The Art Of Game Design A Book Of Lenses'),
('TG28', 'Yoav Goldberg', 1935, 'American', 'Think Like A Game Designer'),
('TG29', 'Ketan Mehta,Milind Padhi', 1934, 'American', 'Aiforcybersecurity'),
('TG30', 'Oliver Theobald', 1932, 'American', 'Deep Learning For Finance'),
('TG32', 'Adam Morgan', 1929, 'American', 'Deep Learning Foundations And Concepts'),
('TG33', 'Henry Kissinge', 1928, 'American', 'Deep Learning With Tensorflow And Keras'),
('TG34', 'Andrew Ng', 1926, 'American', 'Mlforabsolutebeginners'),
('TG35', 'ill Phillips', 1925, 'American', 'Mlforhigh-Riskapp'),
('TG37', 'Dmitry Jemerov', 1922, 'American', 'Pairprogrammingwithchatgpt'),
('TG38', 'Adam Boduch', 1920, 'American', 'Theageofai'),
('TG40', 'Benj Thomas', 1917, 'American', 'Android Programming The Big Nerd Ranch Guide'),
('TG41', 'Herbert Schildt', 1916, 'American', 'Ios Programming'),
('TG42', 'Darren Top , Jonathan Erikson', 1914, 'American', 'Kotlin In Action'),
('TG43', 'William E. Shotts, Jr.', 1913, 'American', 'Learning React Native'),
('TG44', 'Al Sweigart', 1911, 'American', 'Professional Android, 4Th Edition'),
('TG47', 'Andreas Wittig, Michael Wittig', 1907, 'American', 'The Mobile Application Hacker\'S Handbook'),
('TG48', 'B. Andrew Barrick', 1905, 'American', 'The Practice Of System And Network Administration'),
('TG49', 'Justin Ramaglia', 1904, 'American', 'The Linux Command Line'),
('TG50', 'Dan Sullivan', 1902, 'American', 'Automate The Boring Stuff With Python'),
('TG51', 'Robert C. Martin (Uncle Bob)', 1901, 'American', 'D? çn Phoenix'),
('TG52', 'Kathy Sierra, Bert Bates', 1899, 'American', 'The Devops Handbook'),
('TG53', 'Joshua Cooper', 1898, 'American', 'Amazon Web Services In Action'),
('TG54', 'Jon Stott', 1896, 'American', 'Aws Certified Solutions Architect Study Guide'),
('TG57', 'Marijn Haverbeke', 1892, 'American', 'Clean-Code'),
('TG58', 'Marc Geis', 1890, 'American', 'Head-First-Jservlet-Jsp'),
('TG59', 'Jon Duckett', 1889, 'American', 'Java-Complete_Reference'),
('TG60', 'Marc Geis', 1887, 'American', 'Node.Js-Design_Panttern'),
('TG61', 'Jon Duckett', 1886, 'American', 'Php-Msql-Web-Development');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `ID_bill` varchar(20) NOT NULL,
  `name_customer` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date_of_bill` date DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `ID_Book` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name_book` varchar(100) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `name_category_book` varchar(100) DEFAULT NULL,
  `name_typeBook` varchar(20) DEFAULT NULL,
  `buyPrice` double DEFAULT NULL,
  `salePrice` double DEFAULT NULL,
  `edition` int(11) DEFAULT NULL,
  `name_publisher` varchar(50) DEFAULT NULL,
  `year_publish` int(11) DEFAULT NULL,
  `ID_tacgia` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_book` varchar(3000) DEFAULT NULL,
  `link` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`ID_Book`, `name_book`, `discount`, `name_category_book`, `name_typeBook`, `buyPrice`, `salePrice`, `edition`, `name_publisher`, `year_publish`, `ID_tacgia`, `description_book`, `link`) VALUES
('978-0071808552', 'Java The Complete Reference Eleventh Edition', 0.61, 'Web', 'Sách điện tử', 900, 354, 10, 'Oracle Press McGraw Hill', 1986, 'TG07', 'Java: The Complete Reference là một cuốn sách tổng quan và chi tiết về ngôn ngữ lập trình Java. Nó cung cấp một bản cập nhật đầy đủ về ngôn ngữ Java, bao gồm cả các tính năng mới nhất và các chuẩn mới nhất của Java. Cuốn sách bao gồm cả những khái niệm cơ bản và những chủ đề nâng cao như đa luồng, lập trình mạng, lập trình giao diện người dùng, và nhiều hơn nữa.', 'https://m.media-amazon.com/images/I/81HIlxUsIZL._AC_UY327_FMwebp_QL65_.jpg'),
('978-0123747310', 'Artificial Intelligence for Games', 0.23, 'Game', 'Sách audio', 2000, 1540, 2, 'Morgan Kaufmann', 1961, 'TG25', 'Creating robust artificial intelligence is one of the greatest challenges for game developers, yet the commercial success of a game is often dependent upon the quality of the AI. In this book, Ian Millington brings extensive professional experience to the problem of improving the quality of AI in games. He describes numerous examples from real games and explores the underlying ideas through detailed case studies. He goes further to introduce many techniques little used by developers today. The book’s associated website contains a library of C++ source code and demonstration programs, and a complete commercial source code library of AI algorithms and techniques.', 'https://m.media-amazon.com/images/I/91N6DeQDH3L._SL1500_.jpg'),
('978-0132350884', 'Clean Code', 0.17, 'Web', 'Sách cứng', 120, 100, 4, 'Prentice Hall', 1992, 'TG52', 'Cuốn sách tập trung vào các nguyên tắc và kỹ thuật để viết mã dễ hiểu, dễ bảo trì và dễ mở rộng. Uncle Bob giới thiệu các khái niệm như \"code smell\" (mùi của mã), \"SOLID principles\" (nguyên tắc SOLID), và nhiều nguyên tắc khác để giúp bạn trở thành một lập trình viên tốt hơn. Ví dụ cụ thể và thực hành để minh họa các khái niệm, giúp người đọc hiểu rõ hơn và áp dụng chúng trong dự án của mình.', 'https://m.media-amazon.com/images/I/51E2055ZGUL._AC_UY327_FMwebp_QL65_.jpg'),
('978-0134706054', 'Android Programming The Big Nerd Ranch Guide', 0.55, 'Mobile App', 'Sách điện tử', 222, 100, 5, 'No Starch Press', 1978, 'TG50', '\"\"\"Android Programming: The Big Nerd Ranch Guide\"\" is a practical handbook for learning Android development. Authored by Bill Phillips, Chris Stewart, and Kristin Marsicano, this book covers essential concepts and techniques for building Android applications using Java. It offers clear explanations, real-world examples, and hands-on exercises, making it an excellent resource for both beginners and experienced developers looking to enhance their Android programming skills.', 'https://m.media-amazon.com/images/I/61bKlLz9sSL._AC_UY327_FMwebp_QL65_.jpg'),
('978-0321334204', 'The Java Tutorial A Short Course On The Basics', 0.33, 'Mobile App', 'Sách audio', 987, 666, 9, 'Oracle Press McGraw Hill', 1994, 'TG50', '\"The Java Tutorial, Sixth Edition, is based on the Java Platform, Standard Edition (Java SE) 8. This revised and updated edition introduces the new features added to the platform, including lambda expressions, default methods, aggregate operations, and more. An accessible and practical guide for programmers of any level, this book focuses on how to use the rich environment provided by Java to build applications, applets, and components. Expanded coverage includes a chapter on the Date-Time API and a new chapter on annotations, with sections on type annotations and pluggable type systems as well as repeating annotations. In addition, the updated sections “Security in Rich Internet Applications” and “Guidelines for Securing Rich Internet Applications” address key security topics. The latest deployment best practices are described in the chapter “Deployment in Depth.”\"', 'https://m.media-amazon.com/images/I/513r9ZR238L._AC_UY327_FMwebp_QL65_.jpg'),
('978-0321601919', 'Continuous Delivery', 0.08, 'DevOps', 'Sách audio', 87, 80, 2, 'Addison Wesley', 1972, 'TG07', 'Getting software released to users is often a painful, risky, and time-consuming process. This groundbreaking new book sets out the principles and technical practices that enable rapid, incremental delivery of high quality, valuable new functionality to users. Through automation of the build, deployment, and testing process, and improved collaboration between developers, testers, and operations, delivery teams can get changes released in a matter of hours―sometimes even minutes–no matter what the size of a project or the complexity of its code base. Jez Humble and David Farley begin by presenting the foundations of a rapid, reliable, low-risk delivery process. Next, they introduce the “deployment pipeline,” an automated process for managing all changes, from check-in to release. Finally, they discuss the “ecosystem” needed to support continuous delivery, from infrastructure, data and configuration management to governance.', 'https://m.media-amazon.com/images/I/71sYKaNItcL._SL1500_.jpg'),
('978-0321616951', 'Transcending CSS: The Fine Art of Web Design', 0.61, 'Web', 'Sách đặc biệt', 323, 127, 1, 'A Book Apart', 1938, 'TG60', 'As the Web evolves to incorporate new standards and the latest browsers offer new possibilities for creative design. the art of creating Web sites is also changing. Few Web designers are experienced programmers, and as a result, working with semantic markup and CSS can create roadblocks to achieving truly beautiful designs using all the resources available. Add to this the pressures of presenting exceptional design to clients and employers, without compromising efficient workflow, and the challenge deepens for those working in a fast-paced environment. As someone who understands these complexities firsthand, author and designer Andy Clarke offers visual designers a progressive approach to creating artistic, usable, and accessible sites using transcendent CSS.', 'https://m.media-amazon.com/images/I/61ay7CTKXTL._AC_UY327_FMwebp_QL65_.jpg'),
('978-0321833891', 'Php And Msql Web Development', 0.62, 'Web', 'Sách điện tử', 179, 68, 3, 'Apress', 1978, 'TG53', 'PHP and MySQL Web Development là một tài liệu hướng dẫn toàn diện về việc sử dụng PHP và MySQL để phát triển các ứng dụng web. Cuốn sách này cung cấp một cái nhìn tổng quan về cách sử dụng PHP và MySQL để tạo ra các trang web động, tương tác và dễ bảo trì.', 'https://m.media-amazon.com/images/I/81sOFJBUIzL._AC_UY327_FMwebp_QL65_.jpg'),
('978-0393347777', 'Naked Statistics', 0.77, 'Data Science', 'Sách audio', 654, 452, 5, 'W W Norton and Company', 1978, 'TG07', '\"Once considered tedious, the field of statistics is rapidly evolving into a discipline Hal Varian, chief economist at Google, has actually called \"sexy.\" From batting averages and political polls to game shows and medical research, the real-world application of statistics continues to grow by leaps and bounds. How can we catch schools that cheat on standardized tests? How does Netflix know which movies you’ll like? What is causing the rising incidence of autism? As best-selling author Charles Wheelan shows us in Naked Statistics, the right data and a few well-chosen statistical tools can help us answer these questions and more.\"', 'https://m.media-amazon.com/images/I/71L9LVXVSML._SL1500_.jpg'),
('978-0596005407', 'Head First Jservlet & Jsp', 0.45, 'Web', 'Sách audio', 300, 164, 2, 'O Reilly Media', 1978, 'TG53', 'Head First Servlets and JSP là một cuốn sách hướng dẫn thực hành về lập trình Java Servlet và JSP. Cuốn sách này sử dụng phong cách dễ hiểu, thú vị và đầy màu sắc của loạt sách Head First để giảng dạy về các khái niệm cơ bản và nâng cao trong việc phát triển các ứng dụng web sử dụng Java Servlet và JSP.', 'https://m.media-amazon.com/images/I/91yISYgXhcL._AC_UY327_FMwebp_QL65_.jpg'),
('978-0985580135', 'The C# Players Guide', 0, 'System Administration', 'Sách điện tử', 230, 230, 5, 'Starbound Software', 1971, 'TG19', 'The book in your hands is a different kind of programming book. Like an entertaining video game, programming is an often challenging but always rewarding experience. This book shakes off the dusty, dull, dryness of the typical programming book, replacing it with something more exciting and flavorful: a bit of humor, a casual tone, and examples involving dragons and asteroids instead of bank accounts and employees. And since you learn to program by doing instead of just reading, this book contains over 100 hands-on programming challenges. You will be building software instead of just reading about it. By completing the challenges, you’ll earn experience points, level up, and become a True C# Programmer!', 'https://m.media-amazon.com/images/I/619vzxml9jL._SL1250_.jpg'),
('978-0985811751', 'Foundations of Game Engine Development', 0.51, 'Game', 'Sách cứng', 182, 77, 2, 'Charles River Media', 1998, 'TG28', 'The first volume of Foundations of Game Engine Development discusses the mathematics needed by engineers who work on games or other types of virtual simulations. The book begins with conventional treatments of topics such as linear algebra, transforms, and geometry. Then, it introduces Grassmann algebra and geometric algebra to provide a much deeper understanding of the subject matter and highlight the places where traditional arithmetic with vectors, matrices, quaternions, etc., isn’t quite correct.', 'https://m.media-amazon.com/images/I/615Hrr-wDyL._SL1233_.jpg'),
('978-1118107535', 'Game Development Tool Essentials', 0.72, 'Game', 'Sách điện tử', 999, 278, 1, 'CRC Press', 2015, 'TG29', 'Game Development Tool Essentials\n\nSách lập trình game - Game Development Tool Essentials là một nguồn tài liệu vô cùng hữu ích, cung cấp các thủ thuật về lập trình game. Cho dù bạn là một người mới bắt đầu trong lĩnh vực này hay đã có kinh nghiệm, cuốn sách này sẽ cung cấp kiến thức giá trị dành cho bạn.\n\nCuốn sách chứa nhiều gợi ý và bí quyết học tập từ những chuyên gia có nhiều năm kinh nghiệm.\n\nCác câu chuyện thực tế và thông tin chi tiết sẽ dạy bạn cách lập trình một cách hiệu quả, đồng thời trang bị cho bạn những kỹ năng cần thiết để nâng cao chất lượng sản phẩm, quản lý dự án một cách thông minh và phát triển kỹ năng lập trình.\n\nCuốn sách Game Development Tool Essentials không chỉ giúp bạn tăng cường khả năng làm việc, mà còn cải thiện tương tác và nâng cao khả năng quản lý công việc của bạn.', 'https://m.media-amazon.com/images/I/81th--sIciL._SL1500_.jpg'),
('978-1118531645', 'Jquery', 0.45, 'Web', 'Sách đặc biệt', 500, 273, 3, 'O Reilly Media', 1972, 'TG33', 'Cuốn sách này là một tài liệu tham khảo nhỏ gọn về jQuery, cung cấp một tóm tắt về cú pháp và chức năng của thư viện jQuery. Với các ví dụ minh họa và hướng dẫn sử dụng, cuốn sách này là một nguồn thông tin hữu ích cho các nhà phát triển web muốn nắm vững và sử dụng jQuery một cách hiệu quả.', 'https://m.media-amazon.com/images/I/71+G8d9iqlL._AC_UY327_FMwebp_QL65_.jpg'),
('978-1118958506', 'The Mobile Application Hackers Handbook', 0.2, 'Mobile App', 'Sách bìa mềm', 400, 320, 1, 'No Starch Press', 1978, 'TG58', 'The Mobile Application Hackers Handbook is a comprehensive guide on attacking and defending mobile applications. It provides techniques, tools, and methodologies to assess and identify security vulnerabilities in mobile applications across various platforms like iOS and Android. From source code analysis to network-based attacks, it\'s a valuable resource for app developers, security professionals, and anyone interested in mobile security.', 'https://m.media-amazon.com/images/I/61xjT5j5lzL._AC_UY327_FMwebp_QL65_.jpg'),
('978-1119327639', 'Data Science for Dummies', 0.42, 'Data Science', 'Sách audio', 281, 164, 2, 'Wiley Publishing', 1978, 'TG07', 'Jobs in data science abound, but few people have the data science skills needed to fill these increasingly important roles. Data Science For Dummies is the perfect starting point for IT professionals and students who want a quick primer on all areas of the expansive data science space. With a focus on business cases, the book explores topics in big data, data science, and data engineering, and how these three areas are combined to produce tremendous value. If you want to pick up the skills you need to begin a new career or initiate a new project, reading this book will help you understand what technologies, programming languages, and mathematical methods on which to focus.', 'https://m.media-amazon.com/images/I/71j0QuAKReL._SL1500_.jpg'),
('978-1119504214', 'Aws Certified Solutions Architect Study Guide', 0.25, 'System Administration', 'Sách cứng', 134, 100, 2, 'John Wiley and Sons', 1913, 'TG50', 'The AWS Certified Solutions Architect Study Guide: Associate (SAA-C03) Exam. 4th Edition comprehensively and effectively prepares you for the challenging SAA-C03 Exam. This Study Guide contains efficient and accurate study tools that will help you succeed on the exam.', 'https://m.media-amazon.com/images/I/71lr2TYjAJL._AC_UY327_FMwebp_QL65_.jpg'),
('978-1119552222', 'DevOps For Dummies', 0.07, 'DevOps', 'Sách điện tử', 321, 300, 1, 'John Wiley and Sons', 1913, 'TG07', 'DevOps embraces a culture of unifying the creation and distribution of technology in a way that allows for faster release cycles and more resource-efficient product updating. DevOps For Dummies provides a guidebook for those on the development or operations side in need of a primer on this way of working. Inside, DevOps evangelist Emily Freeman provides a roadmap for adopting the management and technology tools, as well as the culture changes, needed to dive head-first into DevOps.', 'https://m.media-amazon.com/images/I/61E-KP4AevL._SL1254_.jpg'),
('978-1119564416', 'Google Cloud Certified Professional Cloud Architect Study Guide', 0.62, 'System Administration', 'Sách điện tử', 580, 222, 1, 'John Wiley and Sons', 2015, 'TG51', 'Google Cloud Certified Professional Cloud Architect Study Guide delivers a proven and effective roadmap to success on the latest Professional Cloud Architect accreditation exam from Google. Youll learn the skills you need to excel on the test and in the field, with coverage of every exam objective and competency, including focus areas of the latest exam such as Kubernetes, Anthos, and multi-cloud architectures.', 'https://m.media-amazon.com/images/I/81vE3-DbVxL._AC_UY327_FMwebp_QL65_.jpg'),
('978-1138035454', 'Game Engine Architecture', 0.25, 'Game', 'Sách audio', 134, 100, 1, 'Morgan Kaufmann', 1991, 'TG30', 'Game Engine Architecture\n\nCuốn sách này có thể được xem như \"\"sách giáo khoa\"\" quan trọng trong lĩnh vực lập trình game. Nó là tài liệu cần thiết cho bất kỳ ai muốn theo đuổi sự nghiệp trong lĩnh vực phát triển trò chơi. Cuốn sách này cung cấp một cái nhìn toàn diện về tất cả các khía cạnh lập trình game từ lý thuyết đến thực hành. Những nội dung chính của cuốn sách lập trình game Game Engine Architecture bao gồm:\n\n Lý thuyết cơ bản về thiết kế trò chơi gồm các yếu tố như cốt truyện, gameplay và giao diện người dùng.\n Các công cụ và kỹ thuật cần thiết để phát triển trò chơi như việc sử dụng các hệ thống game engine và ngôn ngữ lập trình.\n Cách tạo đồ họa, âm âm thanh cho trò chơi như việc sử dụng phần mềm đồ họa và âm nhạc. cũng như việc tối ưu hóa hiệu suất.\n\n Quy trình thử nghiệm và phân phối trò chơi cho các nền táng khác nhau bao gồm cả điện thoại di động. máy tính và các hệ thống console.', 'https://m.media-amazon.com/images/I/41KBkH73pZL.jpg'),
('978-1305109919', 'Beginning C++ Through Game Programming', 0.61, 'Game', 'Sách bìa mềm', 900, 354, 3, 'Sams Publishing', 2003, 'TG26', 'Beginning C++ Through Game Programming\n\nCuốn sách lập trình game Beginning C++ Through Game Programming đóng vai trò quan trọng trong việc giới thiệu ngôn ngữ lập trình C++ và cách áp dụng nó vào phát triển trò chơi. C++ là một trong những ngôn ngữ phổ biến và mạnh mẽ trong lĩnh vực lập trình game. Cuốn sách này cung cấp một nền tảng cơ bản cho những người mới bắt đầu với những kiến thức như:\n\n Hướng dẫn bạn kiến thức ngôn ngữ lập trình C++, từ cú pháp cơ bản đến cách sử dụng các tính năng quan trọng của ngôn ngữ.\nChia sẻ cách bắt đầu lập trình game căn bản bao gồm việc tạo ra các đối tượng, xử lý đầu vào từ người chơi và hiển thị đồ họa đơn giản.\n Phát triển kỹ năng lập trình game với cách tạo ra các yếu tố trò chơi như nhân vật, đối tượng và cách xử lý va chạm.\n Giới thiệu thế giới phát triển trò chơi thực tế bằng C++, từ việc sử dụng các framework, thư viện cho đến cách quản lý tài nguyên và hiệu suất.', 'https://m.media-amazon.com/images/I/81ZRGltnoGL._SL1500_.jpg'),
('978-1341674632', 'Machine Learning For Absolute Beginners', 0.72, 'Machine Learning', 'Sách điện tử', 999, 278, 1, 'Manning Publications', 1990, 'TG42', 'Featured by Tableau as the first of \"7 Books About Machine Learning for Beginners.\" Ready to spin up a virtual GPU instance and smash through petabytes of data? Want to add Machine Learning to your LinkedIn profile? Well, hold on there... Before you embark on your journey, there are some high-level theory and statistical principles to weave through first. However, rather than spend $30-$50 USD on a thick textbook, you may want to read this book first. As a clear and concise alternative, this book provides a high-level introduction to machine learning, free downloadable code exercises, and video demonstrations. Machine Learning for Absolute Beginners Third Edition has been written and designed for absolute beginners.', 'https://m.media-amazon.com/images/I/61IRqgDyviL._SL1499_.jpg'),
('978-1430245128', 'Beginning iPhone Games Development', 0.29, 'Game', 'Sách đặc biệt', 700, 500, 3, 'Apress', 1981, 'TG27', 'Beginning iPhone Games Development\n\nLập trình game trên iPhone cũng là một lĩnh vực phát triển nổi bật trong ngành công nghiệp lập trình. Cuốn sách lập trình game Beginning iPhone Games Development mang đến nhiều kiến thức thú vị cho những người muốn khám phá lập trình game iOS (với kiến thức cơ bản về lập trình game di động). Cuốn sách này sẽ giúp bạn:\n\n Hiểu về phương pháp thiết kế hình ảnh 2D và 3D trên iPhone.\n Nắm vững các kỹ thuật tạo animation đặc trưng cho trò chơi bằng Core Animation.\n Tạo ra các cảnh hành động từ những thứ đơn giản đến phức tạp.\n Bổ sung hiệu ứng và âm thanh để trò chơi trở nên hấp dẫn hơn.\nPhát triển tính năng đa người chơi và tương tác cho trò chơi từ 2 người chơi trở lên', 'https://m.media-amazon.com/images/I/41SgdA8mPnL._SY445_SX342_.jpg'),
('978-1430250597', 'Advanced Android 4 Games', 0.16, 'Mobile App', 'Sách điện tử', 200, 168, 1, 'Apress', 1993, 'TG24', 'Advanced Android 4 Games là phiên bản sách lập trình game nâng cao hơn của Beginning Android 4 Games Development. Tài liệu sẽ mang đến cho bạn những kiến thức và kỹ năng nâng cao về phát triển ứng dụng game trên nền tảng Android. Cuốn sách này cung cấp kiến thức và kỹ năng cần thiết như:\n\nTích hợp các phông chữ độc đáo vào sản phẩm.\nSử dụng các API liên quan đến giao diện người dùng và trải nghiệm người dùng.\nXử lý mã đa điểm chạm (multi-touch code).\nHiểu và triển khai multi-tasking để ứng dụng của bạn hoạt động mượt mà và hiệu quả hơn.\nTối ưu hóa hiệu suất ứng dụng của bạn để đảm bảo nó chạy nhanh hơn', 'https://m.media-amazon.com/images/I/41wroJPSoEL.jpg'),
('978-1461471370', 'An Introduction To Statistical Learning ', 0, 'Data Science', 'Sách điện tử', 311, 311, 7, 'Springer ', 1992, 'TG03', 'An Introduction to Statistical Learning provides an accessible overview of the field of statistical learning, an essential toolset for making sense of the vast and complex data sets that have emerged in fields ranging from biology to finance to marketing to astrophysics in the past twenty years. This book presents some of the most important modeling and prediction techniques, along with relevant applications. Topics include linear regression, classification, resampling methods, shrinkage approaches, tree-based methods, support vector machines, clustering, and more. Color graphics and real-world examples are used to illustrate the methods presented. Since the goal of this textbook is to facilitate the use of these statistical learning techniques by practitioners in science, industry, and other fields, each chapter contains a tutorial on implementing the analyses and methods presented in R, an extremely popular open source statistical software platform.', 'https://m.media-amazon.com/images/I/61Lvnv9+CML._SL1246_.jpg'),
('978-1466598645', 'The Art Of Game Design A Book Of Lenses', 0, 'Game', 'Sách audio', 323, 323, 3, 'CRC Press', 1986, 'TG33', 'Anyone can master the fundamentals of game design - no technological expertise is necessary. The Art of Game Design: A Book of Lenses shows that the same basic principles of psychology that work for board games, card games and athletic games also are the keys to making top-quality videogames. Good game design happens when you view your game from many different perspectives, or lenses. While touring through the unusual territory that is game design, this book gives the reader one hundred of these lenses - one hundred sets of insightful questions to ask yourself that will help make your game better. These lenses are gathered from fields as diverse as psychology, architecture, music, visual design, film, software engineering, theme park design, mathematics, writing, puzzle design, and anthropology. Anyone who reads this book will be inspired to become a better game designer - and will understand how to do it. * Jesse Schell is a highly recognizable name within the game indu', 'https://m.media-amazon.com/images/I/41HuScXUcwL._SY445_SX342_.jpg'),
('978-1484219953', 'PHP Object, Patterns And Pratice', 0.44, 'Web', 'Sách audio', 499, 278, 1, 'Apress', 1904, 'TG57', 'PHP Objects, Patterns, and Practice là một cuốn sách chuyên sâu về lập trình hướng đối tượng trong PHP. Cuốn sách này giúp bạn hiểu rõ hơn về cách sử dụng lập trình hướng đối tượng để xây dựng các ứng dụng PHP phức tạp và dễ bảo trì. các mẫu thiết kế phổ biến như Singleton, Factory, Observer, và nhiều hơn nữa.', 'https://m.media-amazon.com/images/I/71lsBm+sk6L._AC_UY327_FMwebp_QL65_.jpg'),
('978-1484242340', 'Deep Learning Foundations And Concepts', 0.24, 'Machine Learning', 'Sách cứng', 451, 342, 1, 'Morgan Kaufmann', 1978, 'TG40', 'Deep Learning: Foundations and Concepts book offers a comprehensive introduction to the central ideas that underpin deep learning. It is intended both for newcomers to machine learning and for those already experienced in the field. Covering key concepts relating to contemporary architectures and techniques, this essential book equips readers with a robust foundation for potential future specialization. The field of deep learning is undergoing rapid evolution, and therefore this book focuses on ideas that are likely to endure the test of time.', 'https://m.media-amazon.com/images/I/6141hTZKJbL._SL1175_.jpg'),
('978-1491926307', 'Effective DevOps', 0.24, 'DevOps', 'Sách cứng', 451, 342, 1, 'Addison Wesley', 1978, 'TG17', 'Some companies think that adopting devops means bringing in specialists or a host of new tools. With this practical guide, you’ll learn why devops is a professional and cultural movement that calls for change from inside your organization. Authors Ryn Daniels and Jennifer Davis provide several approaches for improving collaboration within teams, creating affinity among teams, promoting efficient tool usage in your company, and scaling up what works throughout your organization’s inflection points. Devops stresses iterative efforts to break down information silos, monitor relationships, and repair misunderstandings that arise between and within teams in your organization. By applying the actionable strategies in this book, you can make sustainable changes in your environment regardless of your level within your organization.', 'https://m.media-amazon.com/images/I/71JRyHK9XEL._SL1360_.jpg'),
('978-1491929124', 'Site Reliability Engineering', 0.7, 'DevOps', 'Sách audio', 333, 100, 1, 'O Reilly Media', 2015, 'TG07', 'The overwhelming majority of a software system’s lifespan is spent in use, not in design or implementation. So, why does conventional wisdom insist that software engineers focus primarily on the design and development of large scale computing systems? In this collection of essays and articles, key members of Google’s Site Reliability Team explain how and why their commitment to the entire lifecycle has enabled the company to successfully build, deploy, monitor, and maintain some of the largest software systems in the world. You’ll learn the principles and practices that enable Google engineers to make systems more scalable, reliable, and efficient—lessons directly applicable to your organization.', 'https://m.media-amazon.com/images/I/91CMi+LGZiL._SL1500_.jpg'),
('978-1491952962', 'Practical Statistics for Data Scientists', 0, 'Data Science', 'Sách điện tử', 499, 499, 2, 'O Reilly Media', 1993, 'TG08', 'Statistical methods are a key part of data science, yet few data scientists have formal statistical training. Courses and books on basic statistics rarely cover the topic from a data science perspective. The second edition of this popular guide adds comprehensive examples in Python, provides practical guidance on applying statistical methods to data science, tells you how to avoid their misuse, and gives you advice on what’s important and what’s not.', 'https://m.media-amazon.com/images/I/81Sdk02bg+L._SL1500_.jpg'),
('978-1491957660', 'Python for Data Analysis', 0.14, 'Data Science', 'Sách bìa mềm', 888, 765, 3, 'O Reilly Media', 1990, 'TG07', 'Get complete instructions for manipulating, processing, cleaning, and crunching datasets in Python. Updated for Python 3.6, the second edition of this hands-on guide is packed with practical case studies that show you how to solve a broad set of data analysis problems effectively. You’ll learn the latest versions of pandas, NumPy, IPython, and Jupiter in the process. Written by Wes McKinney, the creator of the Python pandas project, this book is a practical, modern introduction to data science tools in Python. It’s ideal for analysts new to Python and for Python programmers new to data science and scientific computing. Data files and related material are available on GitHub.', 'https://m.media-amazon.com/images/I/8125MPZTgbL._SL1500_.jpg'),
('978-1491957661', 'Python for Data Analysis2', 0.08, 'Data Science', 'Sách audio', 415, 380, 2, 'O Reilly Media', 1938, 'TG10', 'Data analysis plays a significant job in numerous parts of your regular day-to-day life today. From the moment you wake up, you interact with data at various levels. A lot of significant decisions are made based on data analysis. None of the companies would function and run smoothly without people who know how to use master this powerful tool. Companies use data to understand their customer needs and produce the best possible product or service.', 'https://m.media-amazon.com/images/I/912I2EtdCbL._SL1500_.jpg'),
('978-1492029038', 'Learning React Native', 0.11, 'Mobile App', 'Sách đặc biệt', 562, 500, 1, 'Manning Publications', 1970, 'TG07', '\"Learning React Native: Building Native Mobile Apps with JavaScript\" is a comprehensive guide to developing native mobile applications using JavaScript and React Native framework. Authored by Bonnie Eisenman, this book covers everything from setting up your development environment to building complex user interfaces and integrating with device features. It\'s an invaluable resource for developers looking to leverage their JavaScript skills to build powerful, cross-platform mobile applications.', 'https://m.media-amazon.com/images/I/911c4XAIZ5L._AC_UY327_FMwebp_QL65_.jpg'),
('978-1492032649', 'Hands-On Machine Learning with Scikit-Learn. Keras. and TensorFlow', 0, 'Data Science', 'Sách đặc biệt', 888, 888, 2, 'O Reilly Media', 1994, 'TG07', 'Through a recent series of breakthroughs, deep learning has boosted the entire field of machine learning. Now, even programmers who know close to nothing about this technology can use simple, efficient tools to implement programs capable of learning from data. This best-selling book uses concrete examples, minimal theory, and production-ready Python frameworks--scikit-learn, Keras, and TensorFlow--to help you gain an intuitive understanding of the concepts and tools for building intelligent systems.', 'https://m.media-amazon.com/images/I/81R5BmGtv-L._SL1500_.jpg'),
('978-1492041139', 'Data Science from Scratch', 0.5, 'Data Science', 'Sách bìa mềm', 626, 331, 2, 'O Reilly Media', 1986, 'TG05', 'Data science libraries, frameworks, modules, and toolkits are great for doing data science, but they’re also a good way to dive into the discipline without actually understanding data science. With this updated second edition, you’ll learn how many of the most fundamental data science tools and algorithms work by implementing them from scratch. If you have an aptitude for mathematics and some programming skills, author Joel Grus will help you get comfortable with the math and statistics at the core of data science, and with hacking skills you need to get started as a data scientist. Today’s messy glut of data holds answers to questions no one’s even thought to ask. This book provides you with the know-how to dig those answers out.', 'https://m.media-amazon.com/images/I/812I0mhF0DL._SL1500_.jpg'),
('978-1492044635', 'Ios Programming', 0.45, 'Mobile App', 'Sách audio', 300, 164, 4, 'No Starch Press', 2015, 'TG51', '\"\"\"iOS Programming: The Big Nerd Ranch Guide\"\" is a high-quality practical resource for learning app development on iOS. This book provides detailed guidance with real-world examples and hands-on exercises, helping readers grasp fundamental concepts and programming techniques on the iOS platform. The authors offer clear and detailed explanations, enabling readers to step-by-step progress towards building high-quality iOS applications.', 'https://m.media-amazon.com/images/I/81Rgu6qzSLL._SY342_.jpg'),
('978-1492046813', 'Deep Learning For Finance', 0.83, 'Machine Learning', 'Sách bìa mềm', 345, 57, 1, 'Cambridge University Press', 1986, 'TG38', 'Dancing with Python book will help you get started with coding for Python and Quantum Computing. Basic familiarity with algebra, geometry, trigonometry, and logarithms is required as the book does not cover the detailed mathematics and theory of quantum computing.', 'https://m.media-amazon.com/images/I/819lxfc3qIL._SL1500_.jpg'),
('978-1492049111', 'Hands-On AI For Cybersecurity', 0.17, 'Machine Learning', 'Sách audio', 812, 672, NULL, NULL, 1978, 'TG37', 'Identify and predict security threats using artificial intelligence. Develop intelligent systems that can detect unusual and suspicious patterns and attacks. Learn how to test the effectiveness of your AI cybersecurity algorithms and tools. Todays organizations spend billions of dollars globally on cybersecurity. Artificial intelligence has emerged as a great solution for building smarter and safer security systems that allow you to predict and detect suspicious network activity, such as phishing or unauthorized intrusions. This cybersecurity book presents and demonstrates popular and successful AI approaches and models that you can adapt to detect potential attacks and protect your corporate systems. Youll learn about the role of machine learning and neural networks, as well as deep learning in cybersecurity, and youll also learn how you can infuse AI capabilities into building smart defensive mechanisms. As you advance, youll be able to apply these strategies across a variety of applications, including spam filters, network intrusion detection, botnet detection, and secure authentication.', 'https://m.media-amazon.com/images/I/81POoBEfZAL._SL1500_.jpg'),
('978-1498789378', 'Think Like A Game Designer', 0.89, 'Game', 'Sách điện tử', 872, 100, 1, 'A K Peters CRC Press', 1989, 'TG34', 'Do you love gaming? Do you have ideas for games of your own and want to learn how to produce them Professionally? Longtime game designer Justin Gary has the answers you seek. After twenty years in the gaming industry, creating such games as Solforge, Ascension, and the World of Warcraft Miniatures Game, Justin is now sharing all his secrets in Think Like a Game Designer. Best of all, Justin’s secrets are really simple, practical, and common sense steps you can take yourself. Justin will walk you through each step and provide exercises for you to formulate your own game concepts and bring them to fruition. Whether you want to create video games, board games, of just discover how a true creative mind works, its all here in Think Like A Game Designer. Its time to take the first step toward your game designer dream. Are you game?', 'https://m.media-amazon.com/images/I/41sdgUxrPhL.jpg'),
('978-1523674635', 'Deep Learning With Tensorflow And Keras', 0.09, 'Machine Learning', 'Sách audio', 766, 700, 1, 'Manning Publications', 2004, 'TG41', 'Deep Learning with TensorFlow and Keras teaches you neural networks and deep learning techniques using TensorFlow (TF) and Keras. Youll learn how to write deep learning applications in the most powerful, popular, and scalable machine learning stack available.', 'https://m.media-amazon.com/images/I/61xl7robceL._SL1360_.jpg'),
('978-1530251193', 'The Art Of Computer Game Design', 0.5, 'Game', 'Sách đặc biệt', 555, 277, 3, 'No Starch Press', 1966, 'TG32', 'Chris Crawford, mastermind of some of Atari, Inc.s most fascinating games, including Eastern Front and Excalibur, shares his insights into the creation of computer games.\n\nViewing the computer game as a promising new art form, unique in its capability to interact with its audience, Crawford, the manager of research for Atari, Inc., offers guidelines for creative game development.\n\nThe Art of Computer Game Design emphasizes the artistic dimension of computer games, revealing computer game design as a creative process rather than a merely technical one.\n\nThe Art of Computer Game Design is informative reading for any computer game enthusiast and an essential book for all those involved in computer game design.', 'https://upload.wikimedia.org/wikipedia/en/0/00/The_Art_of_Computer_Game_Design.jpg'),
('978-1541632632', 'Interpretable Machine Learning With Python', 0, 'Machine Learning', 'Sách audio', 300, 300, 1, 'Manning Publications', 1992, 'TG44', 'Key Features: Interpret real-world data, including cardiovascular disease data and the COMPAS recidivism scores. Build your interpretability toolkit with global, local, model-agnostic, and model-specific methods. Analyze and extract insights from complex models from CNNs to BERT to time series models. Book Description: Interpretable Machine Learning with Python, Second Edition, brings to light the key concepts of interpreting machine learning models by analyzing real-world data, providing you with a wide range of skills and tools to decipher the results of even the most complex models. Build your interpretability toolkit with several use cases, from flight delay prediction to waste classification to COMPAS risk assessment scores. This book is full of useful techniques, introducing them to the right use case. Learn traditional methods, such as feature importance and partial dependence plots to integrated gradients for NLP interpretations and gradient-based attribution methods, such as saliency maps.', 'https://m.media-amazon.com/images/I/712JI+epziL._SL1500_.jpg'),
('978-1541674636', 'Pair Programming With ChatGPT', 0.5, 'Machine Learning', 'Sách điện tử', 555, 277, 6, 'Manning Publications', 1971, 'TG44', 'Unlock your full potential with the power of AI - Boost productivity. Modern Developers: The software development landscape is rapidly evolving, and AI is at the forefront of this transformation. Prepare to redefine your coding methodology with the cutting-edge power of ChatGPT-4. Step into the Future of Software Development \"Pair Programming with ChatGPT: AI-Enhanced Coding for the Modern Developer\" is your comprehensive manual for integrating AI into your development toolkit. This book demystifies the complex world of AI-assisted programming, providing clear explanations and pragmatic examples to kickstart your journey.', 'https://m.media-amazon.com/images/I/61-pIZ4jR-L._SL1500_.jpg'),
('978-1544674636', 'Machine Learning For High-Risk Applications', 0, 'Machine Learning', 'Sách cứng', 761, 761, 1, 'O Reilly Media', 1938, 'TG43', 'This book describes approaches to responsible AI—a holistic framework for improving AI/ML technology, business processes, and cultural competencies that builds on best practices in risk management, cybersecurity, data privacy, and applied social science. Authors Patrick Hall, James Curtis, and Parul Pandey created this guide for data scientists who want to improve real-world AI/ML system outcomes for organizations, consumers, and the public. Learn technical approaches for responsible AI across explainability, model validation and debugging, bias management, data privacy, and ML security. Learn how to create a successful and impactful AI risk management practice. Get a basic guide to existing standards, laws, and assessments for adopting AI technologies, including the new NIST AI Risk Management Framework. Engage with interactive resources on GitHub and Colab.', 'https://m.media-amazon.com/images/I/81XvHSjYeHL._SL1500_.jpg'),
('978-1544688636', 'The Age Of AI', 0.06, 'Machine Learning', 'Sách cứng', 212, 200, 1, 'Penguin Random House', 1992, 'TG42', 'Three of the world’s most accomplished and deep thinkers come together to explore Artificial Intelligence (AI) and the way it is transforming human society—and what this technology means for us all. Generative AI is filling the internet with false information. Artists, writers, and many other professionals are in fear of their jobs. AI is discovering new medicines, running military drones, and transforming the world around us—yet we do not understand the decisions it makes, and we don’t know how to control them. In The Age of AI, three leading thinkers have come together to consider how AI will change our relationships with knowledge, politics, and the societies in which we live. The Age of AI is an essential roadmap to our present and our future, an era unlike any that has come before.', 'https://m.media-amazon.com/images/I/71zaLrygEQL._SL1500_.jpg'),
('978-1592730041', 'Mathematics For Game Developers', 0.32, 'Game', 'Sách bìa mềm', 467, 316, 5, 'McGraw Hill Osborne Media', 1998, 'TG30', 'Mathematics for Game Developers is just that-a math book designed specifically for the game developer, not the mathematician. As a game developer, you know that math is a fundamental part of your programming arsenal. In order to program a game that goes beyond the basics, you must first master concepts such as matrices and vectors. In this book, you will find some unique solutions for dealing with real problems you’ll face when programming many types of 3D games. Not only will you learn how to solve these problems, you’ll also learn why the solution works, enabling you to apply that solution to other problems. You’ll also learn how to leverage software to help solve algebraic equations. Through numerous examples, this book clarifies how mathematical ideas fit together and how they apply to game programming.', 'https://m.media-amazon.com/images/I/61cgzLylhiL._SL1500_.jpg'),
('978-1593273897', 'The Linux Command Line', 0.68, 'System Administration', 'Sách bìa mềm', 399, 128, 4, 'No Starch Press', 1992, 'TG07', 'The Linux Command Line by William Shotts - This classic book is a must-have for any system administrator. It covers everything you need to know about using the Linux command line, from basic commands to more advanced topics.', 'https://m.media-amazon.com/images/I/81tKmn7KX1L._AC_UY327_FMwebp_QL65_.jpg'),
('978-1593275846', 'Eloquent Javascript', 0.08, 'Web', 'Sách cứng', 872, 800, 3, 'No Starch Press', 1992, 'TG61', 'With this book, you have the opportunity to learn JavaScript effectively and clearly. This work is packed with excellent explanations of programming concepts and how they apply in JavaScript. To aid comprehension, theoretical explanations are illustrated with very interesting practical examples, ranging from simple to more complex depending on the topic. Thus, you will learn how to create a triangle, build a table, a robot, a programming language, and even a pixel art editor.', 'https://m.media-amazon.com/images/I/81HqVRRwp3L._AC_UY327_FMwebp_QL65_.jpg'),
('978-1593275907', 'Black Hat Python Python Programming For Hackers And Pentesters', 0.4, 'System Administration', 'Sách audio', 1000, 599, 1, 'No Starch Press', 1978, 'TG50', 'When it comes to creating powerful and effective hacking tools, Python is the language of choice for most security analysts. In this second edition of the bestselling Black Hat Python, you’ll explore the darker side of Python’s capabilities: everything from writing network sniffers, stealing email credentials, and bruteforcing directories to crafting mutation fuzzers, investigating virtual machines, and creating stealthy trojans.', 'https://m.media-amazon.com/images/I/91NJ0qC4vEL._AC_UY327_FMwebp_QL65_.jpg'),
('978-1593275990', 'Automate The Boring Stuff With Python', 0.33, 'System Administration', 'Sách audio', 299, 200, 3, 'No Starch Press', 1955, 'TG44', 'Automate the Boring Stuff with Python by Al Sweigart - This book is a great introduction to Python scripting for system administrators. It will teach you how to automate tasks that you do on a regular basis, which can save you a lot of time and effort.', 'https://m.media-amazon.com/images/I/71uEI89mcpL._AC_UY327_FMwebp_QL65_.jpg'),
('978-1617293290', 'Kotlin In Action', 0.46, 'Game', 'Sách bìa mềm', 660, 354, 1, 'Manning Publications', 1971, 'TG52', 'Kotlin in Action guides experienced Java developers from the language basics of Kotlin all the way through building applications to run on the JVM and Android devices. Foreword by Andrey Breslav, Lead Designer of Kotlin. Purchase of the print book includes a free eBook in PDF, Kindle, and ePub formats from Manning Publications.', 'https://m.media-amazon.com/images/I/71pDcTu2oBL._AC_UY327_FMwebp_QL65_.jpg'),
('978-1617295119', 'Amazon Web Services In Action', 0.44, 'System Administration', 'Sách điện tử', 499, 278, 1, 'Manning Publications', 1927, 'TG58', 'Amazon Web Services in Action. Second Edition is a comprehensive introduction to computing, storing, and networking in the AWS cloud. You\'ll find clear, relevant coverage of all the essential AWS services you need to know, emphasizing best practices for security, high availability, and scalability.', 'https://m.media-amazon.com/images/I/71L-lHkQdnL._AC_UY327_FMwebp_QL65_.jpg'),
('978-1634627223', 'Understanding Deep Learning', 0, 'Machine Learning', 'Sách audio', 200, 200, 1, 'O Reilly Media', 1982, 'TG47', 'Understanding Deep Learning provides an authoritative, accessible, and up-to-date treatment of the subject, covering all the key topics along with recent advances and cutting-edge concepts.', 'https://m.media-amazon.com/images/I/71kZBjR+OVL._SL1500_.jpg'),
('978-1648554659', 'Javascript & Jquey', 0.2, 'Web', 'Sách bìa mềm', 400, 320, 4, 'O Reilly Media', 1982, 'TG44', 'Cuốn sách này là một hướng dẫn chi tiết về cách sử dụng JavaScript và jQuery để tạo ra các trang web tương tác và động. Nó cung cấp một cách tiếp cận thực hành thông qua ví dụ minh họa rõ ràng và đầy đủ. Từ các khái niệm cơ bản đến các kỹ thuật phức tạp hơn, cuốn sách này giúp độc giả hiểu rõ về cách làm việc với JavaScript và jQuery để tạo ra các trang web động đẹp mắt và có trải nghiệm người dùng tốt hơn', 'https://m.media-amazon.com/images/I/51-vkXYYH4L._AC_UY327_FMwebp_QL65_.jpg'),
('978-1783287314', 'Node.Js Design Panttern', 0.36, 'Web', 'Sách bìa mềm', 785, 500, 1, 'Manning Publications', 1994, 'TG50', 'Node.js Design Patterns là một cuốn sách hướng dẫn chi tiết về cách sử dụng các mẫu thiết kế trong Node.js để xây dựng các ứng dụng web hiệu quả và dễ bảo trì. Cuốn sách này giúp bạn hiểu rõ về cách sử dụng các mẫu thiết kế phổ biến như Singleton, Factory, Observer, và nhiều hơn nữa để giải quyết các vấn đề phức tạp trong Node.js.', 'https://m.media-amazon.com/images/I/81ji5vp1C5L._AC_UY327_FMwebp_QL65_.jpg'),
('978-1788471156', 'Swift Programming For Beginners', 0.44, 'Mobile App', 'Sách điện tử', 499, 278, 1, 'Apress', 1986, 'TG58', '\"Enter the dynamic world of Swift, Apple\'s innovative programming language that has taken the coding community by storm. Swift is renowned for its speed, clarity, and versatility, making it the perfect choice for anyone eager to dive into the exciting realm of app development. Unlock your potential as a Swift developer with our step-by-step guide tailored for beginners. From understanding variables and loops to mastering functions and classes, this book is your passport to becoming a proficient Swift programmer. Experience the thrill of crafting your code and witness your app ideas come to life.\"', 'https://m.media-amazon.com/images/I/7113Iensm2L._AC_UY327_FMwebp_QL65_.jpg'),
('978-1838444659', 'Html, Css And JavaScript', 0.25, 'Web', 'Sách audio', 134, 100, 6, 'O Reilly Media', 1992, 'TG60', 'Cuốn sách này cung cấp một hướng dẫn thực hành về cách sử dụng HTML và CSS để thiết kế và xây dựng các trang web hiện đại. Bằng cách sử dụng một phong cách minh họa phong phú và dễ hiểu, cuốn sách giúp độc giả hiểu rõ về cấu trúc của các tài liệu HTML và cách sử dụng CSS để tạo ra giao diện trang web hấp dẫn và linh hoạt. Nó bao gồm các ví dụ thực tế và bài tập thực hành để đảm bảo người đọc có thể áp dụng kiến thức của mình vào các dự án thực tế. Cuốn sách \"HTML and CSS: Design and Build Websites\" thích hợp cho cả người mới bắt đầu và những người muốn cải thiện kỹ năng của mình trong việc phát triển trang web.', 'https://m.media-amazon.com/images/I/61KOx7PYVzL._AC_UY327_FMwebp_QL65_.jpg'),
('978-1838554659', 'Getting Started With React Js', 0, 'Web', 'Sách điện tử', 900, 900, 1, 'Manning Publications', 1971, 'TG52', 'This project-driven book consists of different projects and multiple hands-on coding challenges, which are designed to guide you in your learning journey. You can follow this book - by using your local machine. This book is part of a larger Front End Developer career path, which takes you from zero to a hireable front-end developer. This book assumes that you have a solid grasp of the fundamentals of web development, namely HTML, CSS, JavaScript, and ES6 syntax. If you are feeling rusty on any of these topics, you can visit W3Schools, where you can brush up on your skills.', 'https://m.media-amazon.com/images/I/71HZwKAD-2L._AC_UY327_FMwebp_QL65_.jpg'),
('978-1838821654', 'Dancing With Python', 0.61, 'Machine Learning', 'Sách bìa mềm', 900, 354, 1, 'No Starch Press', 1994, 'TG30', 'Dancing with Python book will help you get started with coding for Python and Quantum Computing. Basic familiarity with algebra, geometry, trigonometry, and logarithms is required as the book does not cover the detailed mathematics and theory of quantum computing.', 'https://m.media-amazon.com/images/I/61hXshkzaEL._SL1360_.jpg'),
('978-1942788003', 'The DevOps Handbook', 0.07, 'DevOps', 'Sách cứng', 655, 612, 2, 'IT Revolution Press', 1970, 'TG20', 'Increase profitability, elevate work culture, and exceed productivity goals through DevOps practices. More than ever, the effective management of technology is critical for business competitiveness. For decades, technology leaders have struggled to balance agility, reliability, and security. The consequences of failure have never been greater—whether it’s the healthcare.gov debacle, cardholder data breaches, or missing the boat with Big Data in the cloud. And yet, high performers using DevOps principles, such as Google, Amazon, Facebook, Etsy, and Netflix, are routinely and reliably deploying code into production hundreds, or even thousands, of times per day.', 'https://m.media-amazon.com/images/I/81EZrrp5URL._AC_UY327_FMwebp_QL65_.jpg'),
('978-1942788294', 'The Phoenix Project', 0.49, 'DevOps', 'Sách audio', 198, 100, 3, 'IT Revolution Press', 1969, 'TG21', 'Bill is an IT manager at Parts Unlimited. It’s Tuesday morning and on his drive into the office, Bill gets a call from the CEO. The company’s new IT initiative, code named Phoenix Project, is critical to the future of Parts Unlimited, but the project is massively over budget and very late. The CEO wants Bill to report directly to him and fix the mess in ninety days or else Bill’s entire department will be outsourced. With the help of a prospective board member and his mysterious philosophy of The Three Ways, Bill starts to see that IT work has more in common with manufacturing plant work than he ever imagined. With the clock ticking, Bill must organize work flow streamline interdepartmental communications, and effectively serve the other business functions at Parts Unlimited.', 'https://m.media-amazon.com/images/I/51Fi5Fq4u5L.jpg');
INSERT INTO `book` (`ID_Book`, `name_book`, `discount`, `name_category_book`, `name_typeBook`, `buyPrice`, `salePrice`, `edition`, `name_publisher`, `year_publish`, `ID_tacgia`, `description_book`, `link`) VALUES
('978-1942788331', 'Accelerate', 0.43, 'DevOps', 'Sách cứng', 222, 127, 1, 'No Starch Press', 1982, 'TG14', 'How can we apply technology to drive business value? For years, we\'ve been told that the performance of software delivery teams doesn\'t matter—that it can\'t provide a competitive advantage to our companies. Through four years of groundbreaking research to include data collected from the State of DevOps reports conducted with Puppet, Dr. Nicole Forsgren, Jez Humble, and Gene Kim set out to find a way to measure software delivery performance—and what drives it—using rigorous statistical methods. This book presents both the findings and the science behind that research, making the information accessible for readers to apply in their own organizations. Readers will discover how to measure the performance of their teams, and what capabilities they should invest in to drive higher performance. This book is ideal for management at every level. \"This is the kind of foresight that CEOs, CFOs, and CIOs desperately need if their company is going to survive in this new software-centric world. Anyone that doesn\'t read this book will be replaced by someone that has.\" —Thomas A. Limoncelli, coauthor of The Practice of Cloud System Administration', 'https://m.media-amazon.com/images/I/51CjXuVck+L.jpg'),
('978-1942799321', 'The Phoenix Project', 0, 'DevOps', 'Sách audio', 872, 872, 2, 'The Pragmatic Bookshelf', 1992, 'TG25', 'The Phoenix Project by Gene Kim, Kevin Behr, and George Spafford - This book is a novel that tells the story of a fictional IT organization that is struggling to deliver software. It is a great introduction to the DevOps philosophy and how it can help organizations improve their software delivery process.', 'https://m.media-amazon.com/images/I/81IGqr-Jd6L._AC_UY327_FMwebp_QL65_.jpg'),
('978-3319448846', 'The Art of Data Science', 0.45, 'Data Science', 'Sách audio', 500, 273, 1, 'O Reilly Media', 1992, 'TG11', 'This book describes, simply and in general terms, the process of analyzing data. The authors have extensive experience both managing data analysts and conducting their own data analyses, and have carefully observed what produces coherent results and what fails to produce useful insights into data. This book is a distillation of their experience in a format that is applicable to both practitioners and managers in data science.', 'https://m.media-amazon.com/images/I/71zoLTSAWNL._SL1360_.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_book` varchar(20) NOT NULL,
  `name_book` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `img_book` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `author_book` varchar(50) DEFAULT NULL,
  `year_publish` int(11) DEFAULT NULL,
  `price_book` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_book`, `name_book`, `img_book`, `author_book`, `year_publish`, `price_book`, `quantity`) VALUES
('978-1838821654', 'Dancing With Python', 'https://m.media-amazon.com/images/I/61hXshkzaEL._SL1360_.jpg', 'Oliver Theobald', 1994, 354, 3),
('978-1942788003', 'The DevOps Handbook', 'https://m.media-amazon.com/images/I/81EZrrp5URL._AC_UY327_FMwebp_QL65_.jpg', 'Erica Sadun', 1970, 612, 2),
('978-1492049111', 'Hands-On AI For Cybersecurity', 'https://m.media-amazon.com/images/I/81POoBEfZAL._SL1500_.jpg', 'Dmitry Jemerov', 1978, 672, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `name_category_book` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`name_category_book`) VALUES
('Data Science'),
('DevOps'),
('Game'),
('Machine Learning'),
('Mobile App'),
('System Administration'),
('Web');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `ID_customer` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name_customer` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password_customer` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `number_phone` varchar(11) DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`ID_customer`, `name_customer`, `username`, `password_customer`, `email`, `number_phone`, `address`) VALUES
('KH0001', 'Nguyễn Kim Anh', 'NguyenKimAnh', 'NguyenKimAnh@r3245t6', 'nguyenkimanh1999@gmail.com', '0701234567', 'Nguyễn Trãi, Phường Bến Nghé, Quận 1, TP. Hồ Chí Minh'),
('KH0002', 'Lê Văn Bình', 'LeVanBinh', 'LeVanBinh@s234r5g', 'lebinh2002@gmail.com', '0398765432', 'Lê Văn Quật, Phường Đa Kao, Quận 1, TP. Hồ Chí Minh'),
('KH0003', 'Trần Thị Cẩm Tú', 'TranThiCamTu', 'TranThiCamTu@g2345t6', 'trancamtu1998@gmail.com', '0865432109', 'Nguyễn Đình Chiểu, Phường 6, Quận 3, TP. Hồ Chí Minh'),
('KH0004', 'Phạm Minh Dũng', 'PhamMinhDung', 'PhamMinhDung@n324r5g', 'phamminhdung2003@gmail.com', '0987654321', 'Trần Hưng Đạo, Phường 7, Quận 5, TP. Hồ Chí Minh'),
('KH0005', 'Hồ Thị Diễm My', 'HoThiDiemMy', 'HoThiDiemMy@t3245g6', 'hodiemmy2001@gmail.com', '0612345678', 'Phan Văn Trị, Phường 10, Quận 7, TP. Hồ Chí Minh'),
('KH0006', 'Bùi Quang Hải', 'BuiQuangHai', 'BuiQuangHai@s234r5g', 'buiquanghai1996@gmail.com', '0789101112', 'Nguyễn Văn Linh, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0007', 'Đặng Thị Huyền Trâm', 'DangThiHuyenTram', 'DangThiHuyenTram@g2345t6', 'dangthuyentram2000@gmail.com', '0323456789', 'Huỳnh Tấn Phát, Phường Tân Thuận Đông, Quận 7, TP. Hồ Chí Minh'),
('KH0008', 'Võ Minh Khoa', 'VoMinhKhoa', 'VoMinhKhoa@n3245g6', 'vominhkhoa1997@gmail.com', '0854321098', 'Nguyễn Lương Bằng, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0009', 'Lý Thị Lan Hương', 'LyThiLanHuong', 'LyThiLanHuong@t3245g6', 'lylanhuong2004@gmail.com', '0965432107', 'Lê Văn Chí, Phường Tân Kiểm, Quận 7, TP. Hồ Chí Minh'),
('KH0010', 'Trương Văn Minh', 'TruongVanMinh', 'TruongVanMinh@s234r5g', 'truongminh1995@gmail.com', '0678910112', 'Phạm Hữu Lầu, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0011', 'Dương Thị Ngọc Mai', 'DuongThiNgocMai', 'DuongThiNgocMai@g2345t6', 'duongngocmai2002@gmail.com', '0712345678', 'Võ Văn Ngân, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0012', 'Nguyễn Thành Nhất', 'NguyenThanhNhat', 'NguyenThanhNhat@n3245g6', 'nguyenthanh2001@gmail.com', '0334567890', 'Nguyễn Văn Linh, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0013', 'Lâm Thị Phương Linh', 'LamThiPhuongLinh', 'LamThiPhuongLinh@t3245g6', 'lamphuonglinh1999@gmail.com', '0865432109', 'Huỳnh Tấn Phát, Phường Tân Thuận Đông, Quận 7, TP. Hồ Chí Minh'),
('KH0014', 'Quách Công Quốc', 'QuachCongQuoc', 'QuachCongQuoc@s234r5g', 'quachcongquoc2004@gmail.com', '0976543210', 'Nguyễn Lương Bằng, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0015', 'Trần Đình Sang', 'TranDinhSang', 'TranDinhSang@g234r5g', 'trandinsang1998@gmail.com', '0689101112', 'Lê Văn Chí, Phường Tân Kiểm, Quận 7, TP. Hồ Chí Minh'),
('KH0016', 'Phạm Minh Thành', 'PhamMinhThanh', 'PhamMinhThanh@n3245g6', 'phamminhthanh2003@gmail.com', '0723456789', 'Phạm Hữu Lầu, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0017', 'Huỳnh Văn Toàn', 'HuynhVanToan', 'HuynhVanToan@t3245g6', 'huynhvantoan2000@gmail.com', '0345678901', 'Võ Văn Ngân, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0018', 'Bùi Thị Thu Thảo', 'BuiThiThuThao', 'BuiThiThuThao@s234r5g', 'buithuthao1997@gmail.com', '0876543210', 'Nguyễn Văn Linh, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0019', 'Đặng Quang Vinh', 'DangQuangVinh', 'DangQuangVinh@g2345t6', 'dangquangvinh2004@gmail.com', '0987654321', 'Huỳnh Tấn Phát, Phường Tân Thuận Đông, Quận 7, TP. Hồ Chí Minh'),
('KH0020', 'Võ Trọng Xuân', 'VoTrongXuan', 'VoTrongXuan@n3245g6', 'votrongxuan1995@gmail.com', '0690123456', 'Nguyễn Lương Bằng, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0021', 'Lý Văn Yên', 'LyVanYen', 'LyVanYen@t3245g6', 'lyyen2002@gmail.com', '0734567890', 'Lê Văn Chí, Phường Tân Kiểm, Quận 7, TP. Hồ Chí Minh'),
('KH0022', 'Trương Văn Anh', 'TruongVanAnh', 'TruongVanAnh@s234r5g', 'truongvananh2001@gmail.com', '0356789012', 'Phạm Hữu Lầu, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0023', 'Dương Văn Bảo', 'DuongVanBao', 'DuongVanBao@g2345t6', 'duongvanbao1999@gmail.com', '0887654321', 'Võ Văn Ngân, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0024', 'Nguyễn Minh Châu', 'NguyenMinhChau', 'NguyenMinhChau@n3245g6', 'nguyenminhchau2004@gmail.com', '0998765432', 'Nguyễn Văn Linh, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0025', 'Lâm Văn Đại', 'LamVanDai', 'LamVanDai@t3245g6', 'lamvandai1998@gmail.com', '0601234567', 'Huỳnh Tấn Phát, Phường Tân Thuận Đông, Quận 7, TP. Hồ Chí Minh'),
('KH0026', 'Quách Quốc Dũng', 'QuachQuocDung', 'QuachQuocDung@s234r5g', 'quachquocdung2003@gmail.com', '0745678901', 'Nguyễn Lương Bằng, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0027', 'Trần Văn Duy', 'TranVanDuy', 'TranVanDuy@g234r5g', 'tranvanduy2000@gmail.com', '0367890123', 'Lê Văn Chí, Phường Tân Kiểm, Quận 7, TP. Hồ Chí Minh'),
('KH0028', 'Phạm Quang Hùng', 'PhamQuangHung', 'PhamQuangHung@n3245g6', 'phamquang1997@gmail.com', '0898765432', 'Phạm Hữu Lầu, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0029', 'Huỳnh Văn Kiên', 'HuynhVanKien', 'HuynhVanKien@t3245g6', 'huynhvankien2004@gmail.com', '0812345678', 'Võ Văn Ngân, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0030', 'Bùi Đức Long', 'BuiDucLong', 'BuiDucLong@s234r5g', 'buiduc2002@gmail.com', '0756789012', 'Nguyễn Văn Linh, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0031', 'Đặng Văn Minh', 'DangVanMinh', 'DangVanMinh@g2345t6', 'dangvan31@gmail.com', '0378901234', 'Huỳnh Tấn Phát, Phường Tân Thuận Đông,Quận 7, TP. Hồ Chí Minh'),
('KH0032', 'Võ Văn Nam', 'VoVanNam', 'VoVanNam@n3245g6', 'vovannam2000@gmail.com', '0801234567', 'Nguyễn Lương Bằng, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0033', 'Lý Văn Nghĩa', 'LyVanNghia', 'LyVanNghia@t3245g6', 'lyvannghia1997@gmail.com', '0123456789', 'Lê Văn Chí, Phường Tân Kiểm, Quận 7, TP. Hồ Chí Minh'),
('KH0034', 'Trương Văn Phúc', 'TruongVanPhuc', 'TruongVanPhuc@s234r5g', 'truongvanphuc2004@gmail.com', '0767890123', 'Phạm Hữu Lầu, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0035', 'Dương Minh Quân', 'DuongMinhQuan', 'DuongMinhQuan@g2345t6', 'duongminhquan1998@gmail.com', '0389012345', 'Võ Văn Ngân, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0036', 'Nguyễn Văn Quốc', 'NguyenVanQuoc', 'NguyenVanQuoc@n3245g6', 'nguyenvanquoc2003@gmail.com', '0812345678', 'Nguyễn Văn Linh, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0037', 'Lâm Văn Sơn', 'LamVanSon', 'LamVanSon@t3245g6', 'lamvanson2000@gmail.com', '0234567890', 'Huỳnh Tấn Phát, Phường Tân Thuận Đông, Quận 7, TP. Hồ Chí Minh'),
('KH0038', 'Quách Văn Thanh', 'QuachVanThanh', 'QuachVanThanh@s234r5g', 'quachvanthanh1997@gmail.com', '0778901234', 'Nguyễn Lương Bằng, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0039', 'Trần Văn Thắng', 'TranVanThang', 'TranVanThang@g234r5g', 'tranvanthang2004@gmail.com', '0390123456', 'Lê Văn Chí, Phường Tân Kiểm, Quận 7, TP. Hồ Chí Minh'),
('KH0040', 'Phạm Minh Tuấn', 'PhamMinhTuan', 'PhamMinhTuan@n3245g6', 'phamminhtuan1998@gmail.com', '0823456789', 'Phạm Hữu Lầu, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0041', 'Huỳnh Văn Việt', 'HuynhVanViet', 'HuynhVanViet@t3245g6', 'huynhvanviet2003@gmail.com', '0456789012', '123 Đường Nguyễn Văn Cừ, Phường 2, Quận 5, TP. Hồ Chí Minh'),
('KH0042', 'Bùi Quang Vũ', 'BuiQuangVu', 'BuiQuangVu@s234r5g', 'buiquangvu2000@gmail.com', '0834567890', '45/6 Hẻm 289 Lê Văn Sỹ, Phường 14, Quận 3, TP. Hồ Chí Minh'),
('KH0043', 'Đặng Văn Xuân', 'DangVanXuan', 'DangVanXuan@g2345t6', 'dangvanxuan1997@gmail.com', '0567890123', '119 Đường Trần Hưng Đạo, Phường 1, Quận 5, TP. Hồ Chí Minh'),
('KH0044', 'Võ Trọng Ánh', 'VoTrongAnh', 'VoTrongAnh@n3245g6', 'votronganh2004@gmail.com', '0790123456', 'Số 8 Ngõ 122 Phố Vọng, Phường Phú Thượng, Quận Tây Hồ, Hà Nội'),
('KH0045', 'Lý Thị Bình An', 'LyThiBinhAn', 'LyThiBinhAn@t3245g6', 'lythibinhann2001@gmail.com', '0467890123', 'Phạm Hữu Lầu, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0046', 'Trương Văn Cường', 'TruongVanCuong', 'TruongVanCuong@s234r5g', 'truongvancuong2003@gmail.com', '0845678901', 'Võ Văn Ngân, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0047', 'Dương Văn Đan Thanh', 'DuongVanDanThanh', 'DuongVanDanThanh@g2345t6', 'duongvandanthanh1997@gmail.com', '0678901234', 'Nguyễn Văn Linh, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0048', 'Nguyễn Minh Đông', 'NguyenMinhDong', 'NguyenMinhDong@n3245g6', 'nguyenminhdong2000@gmail.com', '0801234567', 'Huỳnh Tấn Phát, Phường Tân Thuận Đông, Quận 7, TP. Hồ Chí Minh'),
('KH0049', 'Lâm Thị Hòa Bình', 'LamThiHoaBinh', 'LamThiHoaBinh@t3245g6', 'lamthihoabinh1998@gmail.com', '0578901234', 'Nguyễn Lương Bằng, Phường Tân Hưng, Quận 7, TP. Hồ Chí Minh'),
('KH0050', 'Quách Quốc Huy', 'QuachQuocHuy', 'QuachQuocHuy@s234r5g', 'quachquochuy1995@gmail.com', '0856789012', 'Lê Văn Chí, Phường Tân Kiểm, Quận 7, TP. Hồ Chí Minh'),
('KH0051', 'Trần Văn Kiên', 'TranVanKien', 'TranVanKien@g234r5g', 'tranvankien2004@gmail.com', '0888887678', 'Phạm Hữu Lầu, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh'),
('KH0052', 'Phạm Quang Long', 'PhamQuangLong', 'PhamQuangLong@n3245g6', 'phamquanglong1999@gmail.com', '0999956789', '123 Đường Nguyễn Văn Cừ, Phường 2, Quận 5, TP. Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_bill`
--

CREATE TABLE `detail_bill` (
  `ID_bill` varchar(20) DEFAULT NULL,
  `ID_Book` varchar(20) DEFAULT NULL,
  `name_book` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publishers`
--

CREATE TABLE `publishers` (
  `name_publisher` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `publishers`
--

INSERT INTO `publishers` (`name_publisher`) VALUES
('A Book Apart'),
('A K Peters CRC Press'),
('Addison Wesley'),
('Apress'),
('Cambridge University Press'),
('Charles River Media'),
('CRC Press'),
('IT Revolution Press'),
('John Wiley and Sons'),
('Manning Publications'),
('McGraw Hill Osborne Media'),
('Morgan Kaufmann'),
('No Starch Press'),
('O Reilly Media'),
('Oracle Press McGraw Hill'),
('Penguin Random House'),
('Prentice Hall'),
('Sams Publishing'),
('Springer '),
('Starbound Software'),
('The Pragmatic Bookshelf'),
('W W Norton and Company'),
('Wiley Publishing');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store`
--

CREATE TABLE `store` (
  `ID_book` varchar(20) NOT NULL,
  `book_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `store`
--

INSERT INTO `store` (`ID_book`, `book_count`) VALUES
('978-0071808552', 50),
('978-0123747310', 50),
('978-0132350884', 50),
('978-0134706054', 50),
('978-0321334204', 50),
('978-0321601919', 50),
('978-0321616951', 50),
('978-0321833891', 50),
('978-0321919168', 50),
('978-0393347777', 50),
('978-0596005407', 50),
('978-0985580135', 50),
('978-0985811751', 50),
('978-1118107535', 50),
('978-1118531645', 50),
('978-1118949528', 50),
('978-1118958506', 50),
('978-1119327639', 50),
('978-1119504214', 50),
('978-1119552222', 50),
('978-1119564416', 50),
('978-1138035454', 50),
('978-1305109919', 50),
('978-1341674632', 50),
('978-1430245128', 50),
('978-1430250597', 50),
('978-1461471370', 50),
('978-1466598645', 50),
('978-1484219953', 50),
('978-1484242340', 50),
('978-1491926307', 50),
('978-1491929124', 50),
('978-1491952962', 50),
('978-1491957660', 50),
('978-1491957661', 50),
('978-1492029038', 50),
('978-1492032649', 50),
('978-1492041139', 50),
('978-1492044635', 50),
('978-1492046813', 50),
('978-1492049111', 50),
('978-1498789378', 50),
('978-1523674635', 50),
('978-1530251193', 50),
('978-1541632632', 50),
('978-1541674636', 50),
('978-1544674636', 50),
('978-1544688636', 50),
('978-1592730041', 50),
('978-1593273897', 50),
('978-1593275846', 50),
('978-1593275907', 50),
('978-1593275990', 50),
('978-1617293290', 50),
('978-1617295119', 50),
('978-1634627223', 50),
('978-1648554659', 50),
('978-1783287314', 50),
('978-1788471156', 50),
('978-1838444659', 50),
('978-1838554659', 50),
('978-1838821654', 50),
('978-1942788003', 50),
('978-1942788294', 50),
('978-1942788331', 50),
('978-1942799321', 50),
('978-3319448846', 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typebook`
--

CREATE TABLE `typebook` (
  `name_typeBook` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `typebook`
--

INSERT INTO `typebook` (`name_typeBook`) VALUES
('Sách audio'),
('Sách bìa mềm'),
('Sách cứng'),
('Sách đặc biệt'),
('Sách đặt biệt'),
('Sách điện tử');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`ID_tacgia`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`ID_bill`);

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ID_Book`),
  ADD KEY `fk_name_category_book` (`name_category_book`),
  ADD KEY `fk_name_typeBook` (`name_typeBook`),
  ADD KEY `fk_name_publisher` (`name_publisher`),
  ADD KEY `fk_id_tacgia` (`ID_tacgia`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`name_category_book`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID_customer`);

--
-- Chỉ mục cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD KEY `fk_ID_bill` (`ID_bill`),
  ADD KEY `fk_ID_Book_detail` (`ID_Book`);

--
-- Chỉ mục cho bảng `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`name_publisher`);

--
-- Chỉ mục cho bảng `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`ID_book`);

--
-- Chỉ mục cho bảng `typebook`
--
ALTER TABLE `typebook`
  ADD PRIMARY KEY (`name_typeBook`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_ID_book` FOREIGN KEY (`ID_Book`) REFERENCES `store` (`ID_book`),
  ADD CONSTRAINT `fk_ID_tacgia` FOREIGN KEY (`ID_tacgia`) REFERENCES `authors` (`ID_tacgia`),
  ADD CONSTRAINT `fk_nameCategorybook` FOREIGN KEY (`name_category_book`) REFERENCES `category` (`name_category_book`),
  ADD CONSTRAINT `fk_name_publisher` FOREIGN KEY (`name_publisher`) REFERENCES `publishers` (`name_publisher`),
  ADD CONSTRAINT `fk_nametypebook` FOREIGN KEY (`name_typeBook`) REFERENCES `typebook` (`name_typeBook`);

--
-- Các ràng buộc cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `fk_ID_bill` FOREIGN KEY (`ID_bill`) REFERENCES `bill` (`ID_bill`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
