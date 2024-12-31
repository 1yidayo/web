<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>預借教室SL200-1</title>
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

            #reservation-form {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                max-width: 800px;
                margin: 20px auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            #basic-info,
            #time-info {
                flex: 1;
            }

            #reservation-form label {
                display: block;
                margin-bottom: 5px;
            }

            #reservation-form input[type="text"],
            #reservation-form input[type="email"],
            #reservation-form input[type="tel"],
            #reservation-form input[type="date"],
            #reservation-form input[type="time"] {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            #reservation-form button {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
            }

            #reservation-form button:hover {
                background-color: #45a049;
            }

            .modal-body label {
                display: block;
                margin-top: 10px;
            }

            .modal-body input[type="date"],
            .modal-body input[type="time"] {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            .radio-group {
                display: flex;
                align-items: center;
            }

            .radio-group input {
                margin-right: 5px;
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
        </style>
    </div>

    <div class="main">
        <h3 style="text-align: center;margin-top: 30px;">SL200-1</h3><br>
        <div class="alert1">
            <div style="text-align: left; margin-left:300px">
                <h6>請詳細閱讀以下使用說明：</h6>
                <ul>
                    <p>請正確填入姓名、電話、gmail</p>
                    <p>當您點擊日曆中"已預約的名字"可以修改或刪除您的預約</p>
                    <p>若要進行"學期預借"的修改，建議直接刪除後在預約一次</p>
                </ul>
            </div>
            <div><img src="pic.png" alt="驚嘆號" style="width: 130px;height: 130px;vertical-align: middle;"></div>
        </div>

        <p style="text-align: center; margin-top: 40px;">
            <a class="reserve-button" data-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                點此預約
            </a>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body" style="background: transparent;">
                <form id="reservation-form" method="POST" action="insert3.php">
                    <div id="basic-info" style="margin-bottom: 90px;">
                        <label for="name">姓名:</label>
                        <input type="text" id="name" name="name" required>
                        <label for="email">G-mail:</label>
                        <input type="email" id="email" name="email" required>
                        <label for="phone">連絡電話:</label>
                        <input type="tel" id="phone" name="phone" required>
                        <label for="semester-reservation">學期預借:</label>
                        <div class="radio-group">
                            <input type="radio" id="semester-yes" name="semester_reservation" value="yes">
                            <label for="semester-yes">是</label>
                            <input type="radio" id="semester-no" name="semester_reservation" value="no" checked>
                            <label for="semester-no">否</label>
                        </div>
                        <p>(選擇當日日期即可)</p>
                    </div>
                    <div id="time-info">
                        <label for="start">預約開始日期:</label>
                        <input type="date" id="start" name="start_date" required>

                        <label for="start-time">預約開始時段:</label>
                        <input type="time" id="start-time" name="start_time" required>

                        <label for="end">預約結束日期:</label>
                        <input type="date" id="end" name="end_date" required>

                        <label for="end-time">預約結束時段:</label>
                        <input type="time" id="end-time" name="end_time" required>
                        <button type="submit">預約</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="calendar" style="width: 800px; margin-left: 150px;"></div>
        <div id="overlay"></div>
    </div>
    <!-- 彈跳視窗修改預約表單 -->
    <div id="editModal">
        <h3>修改預約時間</h3>
        <form id="editForm" action='update_delete_reservation.php'>
            <div style="margin: 10px">
                <label for="editStartDate">開始日期：</label>
                <input type="date" id="editStartDate" name="start_date" required><br>

                <label for="editStartTime">開始時間：</label>
                <input type="time" id="editStartTime" name="start_time" required><br>

                <label for="editEndDate">結束日期：</label>
                <input type="date" id="editEndDate" name="end_date" required><br>

                <label for="editEndTime">結束時間：</label>
                <input type="time" id="editEndTime" name="end_time" required><br>

                <input type="hidden" id="editId" name="id">
            </div>
            <button class="btn btn-primary text-uppercase disabled" style="background-color: #00000099; color:white; border: none" type="submit">更新預約時間</button>
            <button class="btn btn-primary text-uppercase disabled" style="background-color: #00000099; color:white; border: none" type="button" id="deleteBtn">刪除預約</button>
            <button class="btn btn-primary text-uppercase disabled" style="background-color: #00000099; color:white; border: none" type="button" id="cancelBtn">取消</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            const today = new Date().toISOString().split('T')[0];
            $('#start').attr('min', today);
            $('#end').attr('min', today);

            const currentTime = new Date().toTimeString().split(' ')[0].substring(0, 5);
            $('#start-time').attr('min', currentTime);
            $('#end-time').attr('min', currentTime);

            function showEditForm(event) {
                // 填充表單數據
                $('#editId').val(event.id); // 從事件中提取 ID
                $('#editStartDate').val(event.start.toISOString().split('T')[0]); // 日期格式處理
                $('#editStartTime').val(event.start.toTimeString().slice(0, 5)); // 時間格式處理
                $('#editEndDate').val(event.end.toISOString().split('T')[0]);
                $('#editEndTime').val(event.end.toTimeString().slice(0, 5));

                // 顯示彈跳視窗
                $('#editModal').show();
                $('#overlay').show();
            }

            $('#cancelBtn').click(function() {
                $('#editModal').hide();
                $('#overlay').hide();
            });

            $('#editForm').submit(function(e) {
                e.preventDefault();

                var formData = {
                    id: $('#editId').val(),
                    start_date: $('#editStartDate').val(),
                    start_time: $('#editStartTime').val(),
                    end_date: $('#editEndDate').val(),
                    end_time: $('#editEndTime').val(),
                    action: 'update' // 確保這裡的 action 設置為 update
                };

                $.post('update_delete_reservation.php', formData, function(response) {
                    alert(response);
                    location.reload(); // 刷新頁面
                });
            });

            $('#deleteBtn').click(function() {
                var id = $('#editId').val();

                if (confirm("您確定要刪除這個預約嗎？")) {
                    $.post('update_delete_reservation.php', {
                        id: id,
                        action: 'delete' // 設置為刪除操作
                    }, function(response) {
                        alert(response);
                        location.reload(); // 刷新頁面
                    });
                }
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
                            showEditForm(info.event); // 顯示修改表單
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