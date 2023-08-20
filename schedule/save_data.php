<?php
include("connection.php"); // 데이터베이스 연결 파일을 include

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 클라이언트에서 전송된 데이터 추출
    $name = $_POST["name"];
    $phoneNumber = $_POST["phoneNumber"];
    $hourlyRate = $_POST["hourlyRate"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];

    // INSERT 쿼리 작성
    $sql = "INSERT INTO employees (name, phone, hourly, start, end) VALUES ('$name', '$phoneNumber', '$hourlyRate', '$startTime', '$endTime')";

    // 데이터베이스 쿼리 실행
    if (mysqli_query($con, $sql)) {
        echo "데이터가 성공적으로 추가되었습니다.";
    } else {
        echo "데이터 삽입 중 오류 발생: " . mysqli_error($con);
    }
} else {
    // POST 요청이 아닌 경우 또는 잘못된 요청인 경우 에러 응답을 보낼 수 있습니다.
    // 예를 들어, HTTP 상태 코드 400 (Bad Request)와 함께 에러 메시지를 보낼 수 있습니다.
    header('HTTP/1.1 400 Bad Request');
    echo "잘못된 요청입니다.";
}

mysqli_close($con); // 데이터베이스 연결 종료
?>
