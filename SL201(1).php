<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>預借紀錄SL201
        
    </title>
    <link href='https://unpkg.com/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src='https://unpkg.com/fullcalendar@5.11.3/main.min.js'></script>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/zh/thumb/d/da/Fu_Jen_Catholic_University_logo.svg/1200px-Fu_Jen_Catholic_University_logo.svg.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@600&display=swap">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #calendar-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="main">
        <h3 style="text-align: center; margin-top: 30px;">SL201</h3><br>
        <div class="alert1">
            <div>
                <p style="text-align: center;">當您點擊日曆中"預借紀錄"可以檢視當日預約的詳細資訊</li>
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
                    events: loadEventsFromLocalStorage(),
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

                function loadEventsFromLocalStorage() {
                    return JSON.parse(localStorage.getItem('events')) || [];
                }
            });
        </script>
    </div>
</body>

</html>