<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="eventCounts"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar-container');
            var eventCountPerMonth = {};

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
                const events = JSON.parse(localStorage.getItem('events')) || [];
                countEventsPerMonth(events);
                return events;
            }

            function countEventsPerMonth(events) {
                events.forEach(event => {
                    const month = new Date(event.start).toLocaleString('default', {
                        month: 'long',
                        year: 'numeric'
                    });
                    if (!eventCountPerMonth[month]) {
                        eventCountPerMonth[month] = 0
                    }
                    eventCountPerMonth[month]++;
                });
                displayEventCounts();
            }

            function displayEventCounts() {
                const countContainer = document.getElementById('eventCounts');
                countContainer.innerHTML = '';
                for (const month in eventCountPerMonth) {
                    countContainer.innerHTML += `<div>${month}: ${eventCountPerMonth[month]} 次借用</div>`;
                }
            }
        });
    </script>
</body>

</html>