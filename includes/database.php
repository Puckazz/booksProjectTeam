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
    quantity_sold,
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

//hàm xử lí quên mật khẩu update token

function update_reset_token($email,$table, $data){
  
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
  
  $stmt = $pdo->query("
  UPDATE `bookdatabase`.`$table` SET `reset_token` = '$data' WHERE (`email` = '$email');
");
$stmt->execute();
  if($stmt->rowCount() > 0) {
    return true;

  }
} catch (PDOException $e) {
  echo 'update failed ' . $e->getMessage();
  return false;
}

// Đóng kết nối MySQLi (không cần thiết nếu chỉ dùng PDO)
$conn->close();
}

//function update password token
function update_password($token, $table, $data){
  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "bookdatabase";

  try {
      // Tạo kết nối PDO
      $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Truy vấn cập nhật mật khẩu
      $stmt = $pdo->prepare("UPDATE `$table` SET `password_customer` = :password WHERE `reset_token` = :token");
      $stmt->bindParam(':password', $data);
      $stmt->bindParam(':token', $token);
      $stmt->execute();

      if($stmt->rowCount() > 0) {
        echo "hello";
          return true;
      }
  } catch (PDOException $e) {
      echo 'Update failed: ' . $e->getMessage();
      return false;
  }
}


