<?php
 function getDatabaseSanPham($category)
 {
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bookdatabase";

// Tạo kết nối MySQLi
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Kiểm tra kết nối MySQLi
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

// lấy dữ liệu từ database
try {
  // Tạo kết nối PDO
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Truy vấn dữ liệu từ bảng sản phẩm
  
  $stmt = $pdo->query("SELECT 
    ID_Book, name_book,
    CONCAT(ROUND(discount * 100, 2), '%') AS discount_percentage,
    buyPrice,
    salePrice,
    year_publish,
    link ,
    status
FROM 
    bookdatabase.book 
WHERE 
    name_category_book = '$category';
");
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $products;
} catch (PDOException $e) {
  echo 'Kết nối không thành công: ' . $e->getMessage();
}

// Đóng kết nối MySQLi (không cần thiết nếu chỉ dùng PDO)
$conn->close();
 }


function getConnect(){
  $servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bookdatabase";

// Tạo kết nối MySQLi
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Kiểm tra kết nối MySQLi
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}
return $conn;

}

function getproductNewFromDatabase(){
  $servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bookdatabase";

// Tạo kết nối MySQLi
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Kiểm tra kết nối MySQLi
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

// lấy dữ liệu từ database
try {
  // Tạo kết nối PDO
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Truy vấn dữ liệu từ bảng sản phẩm
  
  $stmt = $pdo->query("SELECT 
  ID_Book, 
  name_book,
  CONCAT(ROUND(discount * 100, 2), '%') AS discount_percentage,
  buyPrice,
  salePrice,
  year_publish,
  link 
FROM 
  bookdatabase.book 
WHERE 
  year_publish BETWEEN 2022 AND 2024"
);
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $products;
} catch (PDOException $e) {
  echo 'Kết nối không thành công: ' . $e->getMessage();
}

// Đóng kết nối MySQLi (không cần thiết nếu chỉ dùng PDO)
$conn->close();
}
?>
