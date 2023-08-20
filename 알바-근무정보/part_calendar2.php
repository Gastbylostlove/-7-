<?php
include("connection.php");

$events = array();

if ($con) {
  $sql = "SELECT title, start, end, backgroundColor FROM events WHERE calendar_type = 'part_timejob2'";
  $result = mysqli_query($con, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          $events[] = $row;
      }
  }

  mysqli_close($con);
}
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <link href="../lib/main.css" rel="stylesheet" />
    <script src="../lib/main.js"></script>
    <script src="../lib/locales/ko.js"></script>
    <!--<script src="schedule.html"></script>-->
    <link rel="stylesheet" href="part_calendar_style.css" />
    <script src="scroll.js"></script>
    <!-- <script src="part_calendar.js"></script> -->

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var colorMapping = {}; // 내용별로 색상을 저장할 객체
        var predefinedColors = ["#E8FFCE", "#FFF9C8", "#FFD9A2"]; // 초기에 정해진 색상 목록
        var currentColorIndex = 0; // 현재 사용 중인 색상 인덱스

        function getRandomColor() {
          var letters = "0123456789ABCDEF";
          var color = "#";
          for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
          }
          return color;
        }

        function getNextColor() {
          if (currentColorIndex < predefinedColors.length) {
            return predefinedColors[currentColorIndex++];
          } else {
            return getRandomColor();
          }
        }

        var calendarEl = document.getElementById("calendar");

        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay",
          },
          minTime: "10:00:00",
          maxTime: "24:00:00",
          locale: "ko",
          initialDate: "2023-08-12",
          navLinks: true, // can click day/week names to navigate views
          selectable: true,
          selectMirror: true,
          select: function (arg) {
            var title = prompt("일정 입력:");

            if (title) {
              var backgroundColor;
              if (!colorMapping[title]) {
                backgroundColor = getNextColor(); // 다음 색상 가져오기
                colorMapping[title] = backgroundColor; // 색상 매핑
              } else {
                backgroundColor = colorMapping[title]; // 이미 매핑된 색상 가져오기
              }

              calendar.addEvent({
                title: title,
                start: arg.start,
                end: arg.end,
                allDay: arg.allDay,
                backgroundColor: backgroundColor, // 이벤트에 배경색 지정
              });
            }

            calendar.unselect();
          },

          eventClick: function (arg) {
            var confirmDelete = confirm("일정을 삭제하시겠습니까?");
            if (confirmDelete) {
              arg.event.remove(); // 이벤트 삭제
            }
          },

          editable: true,
          dayMaxEvents: true, // allow "more" link when too many events
          events: <?php echo json_encode($events); ?>
        });

        calendar.render();
      });
    </script>
    <style>
      body {
        margin: 40px 10px;
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
      }

      #calendar {
        max-width: 1100px;
        margin: 0 auto;
      }
    </style>
  </head>
  <body>
    <!-- 페이지 이름 -->
    <div class="상단바">
      <div class="화살표" onclick="location.href='../알바-홈/part-timer-home.html'" style="border: none; background: none;">
        <img src="화살표.svg" alt="화살표" />
      </div>        
      <div class="title">근무정보</div>
      <div class="menu">
        <img src="menu.svg" alt="menu" />
      </div>
    </div>

    <!-- 달력 -->
    <div id="calendar"></div>

    <!-- 오늘자 날짜 출력 -->
    <div class="today">
      <script>
        var options = { month: "numeric", day: "numeric", weekday: "long" };
        date = new Date().toLocaleDateString("ko-KR", options);
        document.write(date);
      </script>
    </div>

    <!-- 오늘자 날짜로 TO DO LIST   -->
    <div class="schedule_list">
      <div class="list-1">
        <div class="time">13:00 - 19:00</div>
        <div class="where">파워레인저 식당</div>
      </div>
    </div>

   <div class = button>
   <button onclick="location.href='time_change.php'">근무변경</button>
   </div>
  </body>
</html>
