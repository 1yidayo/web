<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>輔仁大學教室預借系統</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../123.css">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/zh/thumb/d/da/Fu_Jen_Catholic_University_logo.svg/1200px-Fu_Jen_Catholic_University_logo.svg.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@550&display=swap">
</head>

<body>
    <header>
        <div class="headergrid">
            <div style="margin-top: 20px; margin-left: 30px;">
                <h1 style="color: black;">輔仁大學教室預借系統</h1>
                <!-- Nav Item - User Information -->
            </div>
            <div style="margin-top: 20px; margin-left: 30px;">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="text-align: right;">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-size: 16px;">使用者登入/註冊</span>
                    <i class="fa-regular fa-user"></i>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <div id="login-block" style="text-align: center;">
                        <button type="button" class="custom-button" onclick="window.location.href='登入.php'">登入</button><br>
                        <button type="button" class="custom-button" onclick="window.location.href='註冊.php'" style="margin-top: 10px;">註冊</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <div class="nav">
            <div class="sidebar">
                <ul><a href="首頁.php"><img class="img" src="https://cdn3.iconfinder.com/data/icons/fluent-regular-24px-vol-4/24/ic_fluent_home_24_regular-64.png"> 首頁</img></a></ul>
                <ul><a href="教室預約使用.php"><img class="img" src="https://cdn4.iconfinder.com/data/icons/user-interface-937/24/20.clock_time_watch_date_ui-64.png"> 預約教室使用</img></a></ul>
                <ul><a href="教室預約紀錄.php"><img class="img" src="https://cdn2.iconfinder.com/data/icons/school-set-5/512/6-64.png"> 教室預約紀錄</img></a></ul>
                <ul><a href="帳號管理.php"><img class="img" src="https://cdn1.iconfinder.com/data/icons/carbon-design-system-vol-3/32/cloud--service-management-64.png"></img> 帳號管理</a></ul>
                <ul><a href="教室統計功能.php"><img class="img" src="https://cdn-icons-png.flaticon.com/128/6850/6850740.png"></img>教室統計</a></ul>
                <ul><a href="校內資源.php"><img class="img" src="https://cdn0.iconfinder.com/data/icons/miscellaneous-4-bold/64/atomizing_nuclear_atomic_core_connect-64.png"> 校內資源</img></a></ul>
                <ul><a href="評分反饋.php"><img class="img" src="https://cdn3.iconfinder.com/data/icons/linecons-free-vector-icons-pack/32/mail-64.png"> 評分反饋</img></a></ul>
            </div>
        </div>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            #calendar-container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }

            #reservation-form {
                max-width: 800px;
                margin: 20px auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                display: flex;
                gap: 20px;
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
        </style>
        <div class="main">
            <h3 style="text-align: center;margin-top: 30px;">SL201</h3>
            <div class="alert1">
                <div>
                    <p style="text-align: center;">當您點擊日曆中"空白區塊"可以檢視當日的預約時間</li>
                </div>
            </div>



            <div id="calendar-container"></div>


            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar-container');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        events: loadEventsFromLocalStorage(),
                        eventContent: function(arg) {
                            return {
                                html: `<div>${arg.event.extendedProps.name}</div>`
                            };
                        },
                        eventClick: function(info) {
                            $('#editEventModal').modal('show');
                            window.selectedEvent = info.event;
                            document.getElementById('edit-start').value = info.event.start.toISOString().split('T')[0];
                            document.getElementById('edit-start-time').value = info.event.start.toISOString().split('T')[1].substring(0, 5);
                            document.getElementById('edit-end').value = info.event.end.toISOString().split('T')[0];
                            document.getElementById('edit-end-time').value = info.event.end.toISOString().split('T')[1].substring(0, 5);
                        },
                        dateClick: function(info) {
                            var clickedDate = info.date;
                            var events = calendar.getEvents();
                            var message = '';
                            var hasEvents = false;

                            events.forEach(function(event) {
                                var eventStartDate = event.start;
                                var eventEndDate = event.end;

                                if (isSameDay(clickedDate, eventStartDate) || isSameDay(clickedDate, eventEndDate) || (clickedDate > eventStartDate && clickedDate < eventEndDate)) {
                                    var startTime = eventStartDate.toLocaleString([], {
                                        year: 'numeric',
                                        month: '2-digit',
                                        day: '2-digit',
                                        hour: '2-digit',
                                        minute: '2-digit'
                                    });
                                    var endTime = eventEndDate.toLocaleString([], {
                                        year: 'numeric',
                                        month: '2-digit',
                                        day: '2-digit',
                                        hour: '2-digit',
                                        minute: '2-digit'
                                    });

                                    message += `${event.extendedProps.name}: ${startTime} ~ ${endTime}\n`;
                                    hasEvents = true;
                                }
                            });

                            if (hasEvents) {
                                alert('所選日期的預約有:\n' + message);
                            } else {
                                alert('所選日期沒有預約');
                            }
                        },
                    });

                    calendar.render();

                    document.getElementById('reservation-form').addEventListener('submit', function(event) {
                        event.preventDefault();

                        const name = document.getElementById('name').value;
                        const startDate = document.getElementById('start').value;
                        const startTime = document.getElementById('start-time').value;
                        const endDate = document.getElementById('end').value;
                        const endTime = document.getElementById('end-time').value;

                        // 將日期時間轉換為 JavaScript 的 Date 物件
                        const startDateTime = new Date(startDate + 'T' + startTime);
                        const endDateTime = new Date(endDate + 'T' + endTime);

                        // 取得現在的日期時間
                        const now = new Date();

                        // 比較預約的開始時間是否早於現在的時間
                        if (startDateTime < now || endDateTime < now) {
                            alert('您無法預約過去的時間，請重新選擇預約時間。');
                            return;
                        }

                        const eventTitle = `預約時段: ${startTime} - ${endTime}`;

                        const newEvent = {
                            id: String(Date.now()),
                            title: eventTitle,
                            start: startDateTime,
                            end: endDateTime,
                            allDay: false,
                            extendedProps: {
                                name: name
                            }
                        };

                        calendar.addEvent(newEvent);
                        saveEventToLocalStorage(newEvent);
                        alert('預約已成功添加！');

                        document.getElementById('reservation-form').reset();
                    });

                    document.getElementById('save-changes').addEventListener('click', function() {
                        const newStartDate = document.getElementById('edit-start').value;
                        const newStartTime = document.getElementById('edit-start-time').value;
                        const newEndDate = document.getElementById('edit-end').value;
                        const newEndTime = document.getElementById('edit-end-time').value;

                        const newStartDateTime = new Date(newStartDate + 'T' + newStartTime);
                        const newEndDateTime = new Date(newEndDate + 'T' + newEndTime);

                        window.selectedEvent.setStart(newStartDateTime);
                        window.selectedEvent.setEnd(newEndDateTime);
                        window.selectedEvent.setProp('title', `預約時段: ${newStartTime} - ${newEndTime}`);
                        updateEventInLocalStorage(window.selectedEvent);
                        alert('預約已成功更新！');
                        $('#editEventModal').modal('hide');
                    });

                    document.getElementById('cancel-reservation').addEventListener('click', function() {
                        if (confirm('確定要取消此預約嗎？')) {
                            var eventId = window.selectedEvent.id;
                            window.selectedEvent.remove();
                            removeEventFromLocalStorage(eventId);
                            alert('預約已成功取消！');
                            $('#editEventModal').modal('hide');
                        }
                    });

                    function loadEventsFromLocalStorage() {
                        return JSON.parse(localStorage.getItem('events-instrument5')) || [];
                    }

                    function saveEventToLocalStorage(event) {
                        const events = loadEventsFromLocalStorage();
                        events.push(event);
                        localStorage.setItem('events-instrument5', JSON.stringify(events));
                    }

                    function updateEventInLocalStorage(event) {
                        const events = loadEventsFromLocalStorage();
                        const index = events.findIndex(e => e.id === event.id);
                        if (index !== -1) {
                            events[index] = event;
                            localStorage.setItem('events-instrument5', JSON.stringify(events));
                        }
                    }

                    function removeEventFromLocalStorage(eventId) {
                        const events = loadEventsFromLocalStorage();
                        const filteredEvents = events.filter(event => event.id !== eventId);
                        localStorage.setItem('events-instrument5', JSON.stringify(filteredEvents));
                    }

                    function isSameDay(date1, date2) {
                        return date1.getFullYear() === date2.getFullYear() &&
                            date1.getMonth() === date2.getMonth() &&
                            date1.getDate() === date2.getDate();
                    }
                });
            </script>
        </div>
    </div>



    <footer>
        <div class="copy-right">2024 © 輔仁大學 研究資源整合發展中心
            <br>建議使用 Chrome / Safari / Firefox瀏覽
        </div>
        <div class="copy-right">
            <i class="fa-solid fa-location-dot"></i> 地址：242062 新北市新莊區中正路 510 號 天主教輔仁大學
            <br><i class="fa-solid fa-phone"></i>電話：(02) 29052000
            <br><i class="fa-solid fa-envelope"></i>信箱：<a href="mailto:pubwww@mail.fju.edu.tw">pubwww@mail.fju.edu.tw</a>
        </div>
        <a href="#top" id="gototop"><span>返回頂端</span></a>
    </footer>
</body>

</html>