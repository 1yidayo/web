<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>預借教室SL201</title>
    <link href='https://unpkg.com/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
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

            .collapse {
                background-color: red;
            }

            #calendar-container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }

            #reservation-form {
                display: grid;
                /* 使用 grid */
                grid-template-columns: 1fr 1fr;
                /* 定義兩列 */
                gap: 20px;
                /* 添加間距 */
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
                /* 使用 flexbox */
                align-items: center;
                /* 垂直居中對齊 */
            }

            .radio-group input {
                margin-right: 5px;
                /* 添加右邊距以增加間距 */
            }

            .alert1 {
                display: flex;
                /* 使用 flexbox */
                align-items: center;
                /* 垂直居中對齊 */
            }
        </style>
        <div class="main">
            <h3 style="text-align: center;margin-top: 30px;">SL201</h3><br>
            <div class="alert1">
                <div style="text-align: left; margin-left:300px">
                    <h6>請詳細閱讀以下使用說明：</h6>
                    <ul>
                        <p>請正確填入姓名、電話、gmail</p>
                        <p>當您點擊日曆中"已預約的名字"可以修改或刪除您的預約</p>
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
                <div class="card card-body" style="background-color: #d7e1e0;">
                    <form id="reservation-form" style="background-color: #d7e1e0;">
                        <div id="basic-info" style="margin-bottom: 90px;">
                            <label for="name">姓名:</label>
                            <input type="text" id="name" name="name" required>
                            <label for="email">G-mail:</label>
                            <input type="email" id="email" name="email" required>
                            <label for="phone">連絡電話:</label>
                            <input type="tel" id="phone" name="phone" required>
                            <label for="semester-reservation">學期預借:</label>
                            <div class="radio-group">
                                <input type="radio" id="semester-yes" name="semester-reservation" value="yes">
                                <label for="semester-yes">是</label>
                                <input type="radio" id="semester-no" name="semester-reservation" value="no" checked>
                                <label for="semester-no">否</label>
                            </div>
                            <p>(選擇當日日期即可)</p>
                        </div>
                        <div id="time-info">
                            <label for="start">預約開始日期:</label>
                            <input type="date" id="start" name="start" required>
                            <label for="start-time">預約開始時段:</label>
                            <input type="time" id="start-time" name="start-time" required>
                            <label for="end">預約結束日期:</label>
                            <input type="date" id="end" name="end" required>
                            <label for="end-time">預約結束時段:</label>
                            <input type="time" id="end-time" name="end-time" required>
                            <button type="submit">預約</button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="calendar-container"></div>

            <!-- 修改事件的模態框 -->
            <div class="modal fade" id="editEventModal" tabindex="-1" role="dialog"
                aria-labelledby="editEventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editEventModalLabel">更改預約</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="edit-start">新的開始日期:</label>
                            <input type="date" id="edit-start" name="edit-start" required>
                            <label for="edit-start-time">新的開始時段:</label>
                            <input type="time" id="edit-start-time" name="edit-start-time" required>
                            <label for="edit-end">新的結束日期:</label>
                            <input type="date" id="edit-end" name="edit-end" required>
                            <label for="edit-end-time">新的結束時段:</label>
                            <input type="time" id="edit-end-time" name="edit-end-time" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">返回</button>
                            <button type="button" id="save-changes" class="btn btn-primary">保存更改</button>
                            <button type="button" id="cancel-reservation" class="btn btn-danger">取消預約</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const today = new Date();
                    const maxDate = new Date();
                    maxDate.setDate(today.getDate() + 30);

                    // 格式化日期（YYYY-MM-DD）以符合 input[type="date"] 的格式
                    const formatDate = (date) => {
                        const year = date.getFullYear();
                        const month = String(date.getMonth() + 1).padStart(2, '0');
                        const day = String(date.getDate()).padStart(2, '0');
                        return `${year}-${month}-${day}`;
                    };

                    const startInput = document.getElementById("start");
                    const endInput = document.getElementById("end");

                    // 設定開始和結束日期的 min 和 max 值
                    startInput.min = formatDate(today);
                    startInput.max = formatDate(maxDate);
                    endInput.min = formatDate(today);
                    endInput.max = formatDate(maxDate);

                    // 當開始日期改變時，自動更新結束日期的最小值
                    startInput.addEventListener("change", function () {
                        endInput.min = this.value;
                    });
                });
                
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
                        const semesterReservation = document.querySelector('input[name="semester-reservation"]:checked').value;

                        // Check if semester reservation is selected
                        if (semesterReservation === 'yes') {
                            const semesterStart = new Date('2024-09-02'); // 學期開始日期
                            const semesterEnd = new Date('2025-01-04'); // 學期結束日期
                            const semesterId = String(Date.now() + Math.random()); // Unique ID for semester

                            const startDateTime = new Date(startDate + 'T' + startTime); // 用戶選擇的開始日期時間

                            // 計算所選日期相對於學期開始的偏移
                            const startDayOfWeek = startDateTime.getDay(); // 用戶選擇的日期是星期幾
                            const semesterStartDayOfWeek = semesterStart.getDay(); // 學期開始的星期幾
                            const offset = startDayOfWeek - semesterStartDayOfWeek; // 計算偏移量

                            // 循環添加每週事件，直到學期結束
                            for (let date = new Date(semesterStart); date <= semesterEnd; date.setDate(date.getDate() + 7)) {
                                const eventDate = new Date(date); // 每週的日期
                                eventDate.setDate(eventDate.getDate() + offset); // 根據偏移調整日期
                                eventDate.setHours(startDateTime.getHours(), startDateTime.getMinutes()); // 設定時間

                                if (eventDate <= semesterEnd) { // 確保不超過學期結束日期
                                    const newEvent = {
                                        id: String(Date.now() + Math.random()), // Unique ID for each event
                                        title: `學期預約: ${startTime} - ${endTime}`,
                                        start: eventDate,
                                        end: new Date(eventDate.getTime() + (endTime.split(':')[0] * 60 + endTime.split(':')[1] * 1 - (startTime.split(':')[0] * 60 + startTime.split(':')[1] * 1)) * 60 * 1000), // 計算結束時間
                                        allDay: false,
                                        extendedProps: {
                                            name: name,
                                            semesterId: semesterId // Attach semesterId
                                        }
                                    };

                                    calendar.addEvent(newEvent);
                                    saveEventToLocalStorage(newEvent);
                                }
                            }
                            alert('學期預約已成功添加！');
                        } else {
                            // Normal reservation handling
                            const startDateTime = new Date(startDate + 'T' + startTime);
                            const endDateTime = new Date(endDate + 'T' + endTime);

                            // Ensure the time is in the future
                            const now = new Date();
                            if (startDateTime < now || endDateTime < now) {
                                alert('您無法預約過去的時間，請重新選擇預約時間。');
                                return;
                            }

                            const newEvent = {
                                id: String(Date.now()),
                                title: `預約時段: ${startTime} - ${endTime}`,
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
                        }

                        document.getElementById('reservation-form').reset();
                    });


                    document.getElementById('save-changes').addEventListener('click', function() {
                        const newStartDate = document.getElementById('edit-start').value;
                        const newStartTime = document.getElementById('edit-start-time').value;
                        const newEndDate = document.getElementById('edit-end').value;
                        const newEndTime = document.getElementById('edit-end-time').value;

                        const newStartDateTime = new Date(newStartDate + 'T' + newStartTime);
                        const newEndDateTime = new Date(newEndDate + 'T' + newEndTime);

                        const semesterId = window.selectedEvent.extendedProps.semesterId;

                        // 獲取所有相關事件
                        const events = calendar.getEvents().filter(event => event.extendedProps.semesterId === semesterId);

                        if (events.length === 0) {
                            alert('未找到相關的學期預約。');
                            $('#editEventModal').modal('hide');
                            return;
                        }

                        let updatesMade = false; // 追蹤是否有更新

                        // 更新每個事件
                        events.forEach(event => {
                            // 計算事件的偏移天數
                            const originalStart = event.start;
                            const daysOffset = Math.round((originalStart - window.selectedEvent.start) / (1000 * 60 * 60 * 24));

                            const updatedStart = new Date(newStartDateTime);
                            updatedStart.setDate(updatedStart.getDate() + daysOffset);

                            const updatedEnd = new Date(newEndDateTime);
                            updatedEnd.setDate(updatedEnd.getDate() + daysOffset);

                            // 檢查事件是否需要更新
                            if (event.start.getTime() !== updatedStart.getTime() || event.end.getTime() !== updatedEnd.getTime()) {
                                // 更新事件
                                event.setStart(updatedStart);
                                event.setEnd(updatedEnd);
                                event.setProp('title', `學期預約: ${updatedStart.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})} - ${updatedEnd.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}`);
                                updatesMade = true; // 標記為已更新

                                // 更新 local storage
                                updateEventInLocalStorage(event);
                            }
                        });

                        // 僅在有更新時顯示提示
                        if (updatesMade) {
                            alert('預約已成功更新！');
                        } else {
                            alert('沒有任何變更。');
                        }
                        $('#editEventModal').modal('hide');
                    });

                    $('#editEventModal').modal('hide');
                });




                document.getElementById('cancel-reservation').addEventListener('click', function() {
                    if (confirm('確定要取消此預約嗎？')) {
                        var eventId = window.selectedEvent.id;
                        var semesterId = window.selectedEvent.extendedProps.semesterId;

                        // 刪除所選的特定事件
                        window.selectedEvent.remove(); // 立即從日曆中刪除
                        removeEventFromLocalStorage(eventId); // 從 localStorage 刪除

                        // 刪除所有與該學期相關的事件
                        if (semesterId) {
                            const events = loadEventsFromLocalStorage();
                            const filteredEvents = events.filter(event => event.extendedProps.semesterId !== semesterId);
                            localStorage.setItem('events-instrument3', JSON.stringify(filteredEvents));

                            // 從日曆中刪除所有相關事件
                            const relatedEvents = calendar.getEvents().filter(event => event.extendedProps.semesterId === semesterId);
                            relatedEvents.forEach(event => {
                                event.remove(); // 從日曆刪除
                            });
                        }

                        alert('預約已成功取消！');
                        $('#editEventModal').modal('hide');

                        calendar.render(); // 可能需要在所有事件刪除後強制重新渲染


                        // 清空選定的事件，避免重複操作
                        window.selectedEvent = null;



                    }
                });






                function loadEventsFromLocalStorage() {
                    return JSON.parse(localStorage.getItem('events-instrument3')) || [];
                }

                function saveEventToLocalStorage(event) {
                    const events = loadEventsFromLocalStorage();
                    events.push(event);
                    localStorage.setItem('events-instrument3', JSON.stringify(events));
                }

                function updateEventInLocalStorage(event) {
                    const events = loadEventsFromLocalStorage();
                    const index = events.findIndex(e => e.id === event.id);
                    if (index !== -1) {
                        events[index] = event.toPlainObject();
                        localStorage.setItem('events-instrument3', JSON.stringify(events));
                    }
                }

                function removeEventFromLocalStorage(eventId) {
                    const events = loadEventsFromLocalStorage();
                    const filteredEvents = events.filter(event => event.id !== eventId);
                    localStorage.setItem('events-instrument3', JSON.stringify(filteredEvents));
                }

                function isSameDay(date1, date2) {
                    return date1.getFullYear() === date2.getFullYear() &&
                        date1.getMonth() === date2.getMonth() &&
                        date1.getDate() === date2.getDate();
                }
            </script>
        </div>
    </div>

</body>

</html>