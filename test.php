<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>預約行事曆</title>

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.3.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.3.0/dist/fullcalendar.min.js"></script>

</head>

<body>
    <div class="main">
        <h3 style="text-align: center; margin-top: 30px;">SL200-3</h3><br>
        <div class="alert1">
            <div>
                <p style="text-align: center;">當您點擊日曆中"預借紀錄"可以檢視當日預約的詳細資訊</p>
            </div>
        </div>
        <div id="calendar-container"></div>

        <!-- 預約資訊的模態框 -->
        <div class="modal fade" id="eventDetailsModal" tabindex="-1" role="dialog" aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventDetailsModalLabel">預借詳情</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="eventDetailsBody">
                        <!-- 預約詳情會顯示在這裡 -->
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar-container');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: function(info, successCallback, failureCallback) {
                        $.ajax({
                            url: 'get_reservations.php', // 從後端取得資料
                            dataType: 'json',
                            success: function(data) {
                                console.log("預約資料: ", data); // 檢查資料是否正確返回
                                var events = data.map(function(reservation) {
                                    return {
                                        title: reservation.name, // 預約名稱
                                        start: reservation.start_date + 'T' + reservation.start_time, // 預約開始時間
                                        end: reservation.end_date + 'T' + reservation.end_time, // 預約結束時間
                                        description: reservation.email, // 可選：顯示預約者的電子郵件
                                        phone: reservation.phone, // 可選：顯示預約者的電話
                                    };
                                });
                                successCallback(events); // 回傳事件數據
                            },
                            error: function(xhr, status, error) {
                                console.error("載入事件資料失敗: " + error); // 顯示錯誤訊息
                                failureCallback(error);
                            }
                        });
                    },
                    eventContent: function(arg) {
                        return {
                            html: `<div>${arg.event.extendedProps.name}</div>`
                        };
                    },
                    eventClick: function(info) {
                        // 顯示預約詳情
                        const {
                            name
                        } = info.event.extendedProps;
                        const {
                            start,
                            end
                        } = info.event;
                        const details = `
                            <strong>姓名:</strong> ${name}<br>
                            <strong>開始:</strong> ${start.toLocaleString()}<br>
                            <strong>結束:</strong> ${end.toLocaleString()}
                        `;
                        document.getElementById('eventDetailsBody').innerHTML = details;
                        $('#eventDetailsModal').modal('show');
                    },
                });

                calendar.render();
            });
        </script>
    </div>
</body>

</html>