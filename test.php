<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>預借紀錄SL200-1</title>
    <link href='https://unpkg.com/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src='https://unpkg.com/fullcalendar@5.11.3/main.min.js'></script>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="icon"
        href="https://upload.wikimedia.org/wikipedia/zh/thumb/d/da/Fu_Jen_Catholic_University_logo.svg/1200px-Fu_Jen_Catholic_University_logo.svg.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@600&display=swap">
</head>

<body>
    <div class="main">
        <style>
            body {
                margin: 0;
                padding: 0;
            }

            #calendar-container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }

            .alert1 {
                display: flex;
                align-items: center;
            }

            #editModal {
                color: rgba(0, 0, 0, 0.6);
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: linear-gradient(315deg, #ffffff 0%, rgb(215, 225, 224) 74%);
                border-radius: 10px;
                border: 1px solid #ccc;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                z-index: 1000;
            }

            #overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            .reservation-detail {
                margin-bottom: 10px;
            }
        </style>
    </div>

    <div class="main">
        <h3 style="text-align: center;margin-top: 30px;">SL200-1</h3><br>

        <div id="calendar" style="width: 800px; margin-left: 200px;"></div>
        <div id="overlay"></div>
    </div>

    <!-- 彈跳視窗查看預約資訊 -->
    <div id="editModal">
        <h3>預約詳情</h3>
        <div class="reservation-detail">
            <strong>姓名:</strong> <span id="reservationName"></span>
        </div>
        <div class="reservation-detail">
            <strong>G-mail:</strong> <span id="reservationEmail"></span>
        </div>
        <div class="reservation-detail">
            <strong>電話:</strong> <span id="reservationPhone"></span>
        </div>
        <div class="reservation-detail">
            <strong>預約日期:</strong> <span id="reservationDate"></span>
        </div>
        <div class="reservation-detail">
            <strong>預約時段:</strong> <span id="reservationTime"></span>
        </div>
        <button class="btn btn-primary text-uppercase disabled" style="background-color: #00000099; border:none;" type="button" id="cancelBtn">關閉</button>
    </div>

    <script>
        $(document).ready(function() {
            // 設置今天的日期最小值
            const today = new Date().toISOString().split('T')[0];
            $('#start').attr('min', today);
            $('#end').attr('min', today);

            const currentTime = new Date().toTimeString().split(' ')[0].substring(0, 5);
            $('#start-time').attr('min', currentTime);
            $('#end-time').attr('min', currentTime);

            function showReservationDetails(event) {
                // 顯示預約的詳細資訊
                $('#reservationName').text(event.title); // 預約者姓名
                $('#reservationEmail').text(event.extendedProps.email); // 預約者G-mail
                $('#reservationPhone').text(event.extendedProps.phone); // 預約者電話
                $('#reservationDate').text(event.start.toISOString().split('T')[0]); // 預約日期
                $('#reservationTime').text(event.start.toTimeString().slice(0, 5) + ' - ' + event.end.toTimeString().slice(0, 5)); // 預約時間範圍

                // 顯示彈跳視窗
                $('#editModal').show();
                $('#overlay').show();
            }

            $('#cancelBtn').click(function() {
                $('#editModal').hide();
                $('#overlay').hide();
            });

            // 使用 Fetch API 從後端獲取預約資料
            fetch('get_reservations.php')
                .then(response => response.json())
                .then(data => {
                    const calendarEl = document.getElementById('calendar');

                    const calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        events: data,
                        eventColor: '#378006',
                        eventTextColor: 'white',
                        eventClick: function(info) {
                            showReservationDetails(info.event); // 顯示預約詳情
                        },
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        }
                    });

                    calendar.render();
                })
                .catch(error => {
                    console.error('錯誤:', error);
                });
        });
    </script>

</body>

</html>