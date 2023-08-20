<?php
$host = "localhost";
$username = "root";
$password = "1234fin!";
$database = "soho";

// MySQL 데이터베이스 연결
$conn = new mysqli($host, $username, $password, $database);

// 연결 확인
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
} else {
    echo "연결 성공!";
}
?>
