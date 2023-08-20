<?php
error_reporting(E_ALL); // 모든 오류 표시
ini_set('display_errors', 1); // 오류를 화면에 출력
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST 요청에서 변경할 데이터 및 이벤트 식별을 가져옵니다.
    $event_id = $_POST["event_id"];
    $start_hour = $_POST["start_hour"];
    $start_minute = $_POST["start_minute"];
    $end_hour = $_POST["end_hour"];
    $end_minute = $_POST["end_minute"];

    if ($con) {
        // 변경된 데이터를 기반으로 UPDATE 쿼리를 작성하여 데이터를 업데이트합니다.
        // 시간 형식을 Y-m-d H:i:s로 맞춰줍니다.
        $start_time = $_POST["event_date"] . " " . $start_hour . ":" . $start_minute . ":00";
        $end_time = $_POST["event_date"] . " " . $end_hour . ":" . $end_minute . ":00";
        $start_time = mysqli_real_escape_string($con, $start_time);
        $end_time = mysqli_real_escape_string($con, $end_time);

        $sql = "UPDATE events SET start = '$start_time', end = '$end_time' WHERE id = '$event_id' AND calendar_type = 'part_timejob'";
    
        // 쿼리 실행
        $result = mysqli_query($con, $sql);
    
        if ($result) {
            // 업데이트 성공 시 리디렉션을 수행하기 전에 다음과 같이 JavaScript로 리디렉션을 수행합니다.
            echo '<script>window.location.href = "part_calendar2.php";</script>';
            exit; // 스크립트 실행 중지
        } else {
            // 업데이트 실패 시 오류 메시지 출력
            echo "Error updating data: " . mysqli_error($con);
        }
    
        mysqli_close($con);
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>new_employee</title>
    <link rel="stylesheet" href="time_change.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <div class=main>
        <!-- 나가기 버튼 -->
        <div class=close>
            <div class="나가기">
                <button onclick="goBack()">
                    <img src="x.svg" alt="나가기" />
                </button>
            </div>
        </div>
        <!-- 신청완료 사진 -->
        <div class="container2">
            <div class="story-container">
                <div class="content">
                    <div class="img-container">
                        <a href=""><img src="check.svg" alt="신청완료" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container1">
            <div class="title">근무변경</div>
        </div>

        <div class='change_shop_tag'>
            <select class="change_shop">
                <option value="shop">사업장 변경</option>
                <option value="shop1">파워레인저 식당</option>
                <option value="shop2">한이음 카페</option>
            </select>
        </div>


        <form method="post" action="time_change.php">
        <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
        <input type="hidden" name="event_date" value="<?php echo $event_date; ?>">


       
        <!-- 근로자 유형 체크 -->
        <div class="내용">

            <!-- 근무 변경선택 -->
            <div class="checkbox">

            <div class="date1">
                <input type="date" name="event_date" required>
            </div>
                <!-- 시간 선택 -->
                <div class="select_time">
                    <div class="시작">
                        <select class="start_hour" id="start_hour" name="start_hour">
                            <option value="hour0">0</option>
                            <option value="hour1">1</option>
                            <option value="hour2">2</option>
                            <option value="hour3">3</option>
                            <option value="hour4">4</option>
                            <option value="hour5">5</option>
                            <option value="hour6">6</option>
                            <option value="hour7">7</option>
                            <option value="hour8">8</option>
                            <option value="hour9">9</option>
                            <option value="hour10">10</option>
                            <option value="hour11">11</option>
                            <option value="hour12">12</option>
                            <option value="hour13">13</option>
                            <option value="hour14">14</option>
                            <option value="hour15">15</option>
                            <option value="hour16">16</option>
                            <option value="hour17">17</option>
                            <option value="hour18">18</option>
                            <option value="hour19">19</option>
                            <option value="hour20">20</option>
                            <option value="hour21">21</option>
                            <option value="hour22">22</option>
                            <option value="hour23">23</option>
                        </select>
                        <span>:</span>
                        <select class="start_min" id="start_minute" name="start_minute">
                            <option value="min0">00</option>
                            <option value="min1">1</option>
                            <option value="min2">2</option>
                            <option value="min3">3</option>
                            <option value="min4">4</option>
                            <option value="min5">5</option>
                            <option value="min6">6</option>
                            <option value="min7">7</option>
                            <option value="min8">8</option>
                            <option value="min9">9</option>
                            <option value="min10">10</option>
                            <option value="min11">11</option>
                            <option value="min12">12</option>
                            <option value="min13">13</option>
                            <option value="min14">14</option>
                            <option value="min15">15</option>
                            <option value="min16">16</option>
                            <option value="min17">17</option>
                            <option value="min18">18</option>
                            <option value="min19">19</option>
                            <option value="min20">20</option>
                            <option value="min21">21</option>
                            <option value="min22">22</option>
                            <option value="min23">23</option>
                            <option value="min24">24</option>
                            <option value="min25">25</option>
                            <option value="min26">26</option>
                            <option value="min27">27</option>
                            <option value="min28">28</option>
                            <option value="min29">29</option>
                            <option value="min30">30</option>
                            <option value="min31">31</option>
                            <option value="min32">32</option>
                            <option value="min33">33</option>
                            <option value="min34">34</option>
                            <option value="min35">35</option>
                            <option value="min36">36</option>
                            <option value="min37">37</option>
                            <option value="min38">38</option>
                            <option value="min39">39</option>
                            <option value="min40">40</option>
                            <option value="min41">41</option>
                            <option value="min42">42</option>
                            <option value="min43">43</option>
                            <option value="min44">44</option>
                            <option value="min45">45</option>
                            <option value="min46">46</option>
                            <option value="min47">47</option>
                            <option value="min48">48</option>
                            <option value="min49">49</option>
                            <option value="min50">50</option>
                            <option value="min51">51</option>
                            <option value="min52">52</option>
                            <option value="min53">53</option>
                            <option value="min54">54</option>
                            <option value="min55">55</option>
                            <option value="min56">56</option>
                            <option value="min57">57</option>
                            <option value="min58">58</option>
                            <option value="min59">59</option>
                        </select>
                        <span>부터</span>
                    </div>
                    <div class="끝">
                        <br>
                        <select class="end_hour" id="end_hour" name="end_hour">
                            <option value="hour0">0</option>
                            <option value="hour1">1</option>
                            <option value="hour2">2</option>
                            <option value="hour3">3</option>
                            <option value="hour4">4</option>
                            <option value="hour5">5</option>
                            <option value="hour6">6</option>
                            <option value="hour7">7</option>
                            <option value="hour8">8</option>
                            <option value="hour9">9</option>
                            <option value="hour10">10</option>
                            <option value="hour11">11</option>
                            <option value="hour12">12</option>
                            <option value="hour13">13</option>
                            <option value="hour14">14</option>
                            <option value="hour15">15</option>
                            <option value="hour16">16</option>
                            <option value="hour17">17</option>
                            <option value="hour18">18</option>
                            <option value="hour19">19</option>
                            <option value="hour20">20</option>
                            <option value="hour21">21</option>
                            <option value="hour22">22</option>
                            <option value="hour23">23</option>
                        </select>
                        <span>:</span>
                        <select class="end_min" id="end_minute" name="end_minute">
                            <option value="min0">00</option>
                            <option value="min1">1</option>
                            <option value="min2">2</option>
                            <option value="min3">3</option>
                            <option value="min4">4</option>
                            <option value="min5">5</option>
                            <option value="min6">6</option>
                            <option value="min7">7</option>
                            <option value="min8">8</option>
                            <option value="min9">9</option>
                            <option value="min10">10</option>
                            <option value="min11">11</option>
                            <option value="min12">12</option>
                            <option value="min13">13</option>
                            <option value="min14">14</option>
                            <option value="min15">15</option>
                            <option value="min16">16</option>
                            <option value="min17">17</option>
                            <option value="min18">18</option>
                            <option value="min19">19</option>
                            <option value="min20">20</option>
                            <option value="min21">21</option>
                            <option value="min22">22</option>
                            <option value="min23">23</option>
                            <option value="min24">24</option>
                            <option value="min25">25</option>
                            <option value="min26">26</option>
                            <option value="min27">27</option>
                            <option value="min28">28</option>
                            <option value="min29">29</option>
                            <option value="min30">30</option>
                            <option value="min31">31</option>
                            <option value="min32">32</option>
                            <option value="min33">33</option>
                            <option value="min34">34</option>
                            <option value="min35">35</option>
                            <option value="min36">36</option>
                            <option value="min37">37</option>
                            <option value="min38">38</option>
                            <option value="min39">39</option>
                            <option value="min40">40</option>
                            <option value="min41">41</option>
                            <option value="min42">42</option>
                            <option value="min43">43</option>
                            <option value="min44">44</option>
                            <option value="min45">45</option>
                            <option value="min46">46</option>
                            <option value="min47">47</option>
                            <option value="min48">48</option>
                            <option value="min49">49</option>
                            <option value="min50">50</option>
                            <option value="min51">51</option>
                            <option value="min52">52</option>
                            <option value="min53">53</option>
                            <option value="min54">54</option>
                            <option value="min55">55</option>
                            <option value="min56">56</option>
                            <option value="min57">57</option>
                            <option value="min58">58</option>
                            <option value="min59">59</option>
                        </select>
                        <span>까지</span>
                    </div>
                    </br>
                </div>
            </div>
            
            <div class="change-person-container">
                <select class="change_person">
                    <option value="change">근무자 변경</option>
                    <option value="change1">이현준</option>
                    <option value="change2">곽두팔</option>
                    <option value="change3">이진규</option>
                    <option value="change4">고태윤</option>
                    <option value="change5">유영곤</option>
                </select>
                <span>으로 변경합니다.</span>
            </div>
        

        </div>
        <!-- 저장 버튼 -->
        <div class="저장">
            <div class="저장-box">
                <div class="text">
                    <button onclick="location.href='part_calendar2.php'">
                        확인
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script src="time_change.js"></script>
    </div>

</body>




</html>