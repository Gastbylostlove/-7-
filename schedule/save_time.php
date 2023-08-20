<?php
include("connection.php"); // 데이터베이스 연결 파일을 include

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // HTML 폼에서 전송된 데이터 추출
    $startHour = $_POST["startHour"];
    $startMin = $_POST["startMin"];
    $endHour = $_POST["endHour"];
    $endMin = $_POST["endMin"];

    // 데이터베이스에 저장하는 SQL 쿼리 작성
    $sql = "INSERT INTO your_table_name (start_time, end_time) VALUES ('$startHour:$startMin', '$endHour:$endMin')";

    // 데이터베이스에 쿼리 실행
    if (mysqli_query($con, $sql)) {
        echo "데이터가 성공적으로 추가되었습니다.";
    } else {
        echo "데이터 삽입 중 오류 발생: " . mysqli_error($con);
    }

    mysqli_close($con); // 데이터베이스 연결 종료
} else {
    echo "잘못된 요청입니다.";
}
?>
