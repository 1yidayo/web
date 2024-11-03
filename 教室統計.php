<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教室使用統計圖表</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="borrowChart" width="300" height="150"></canvas>
    <div id="classroomStats" style="margin-top: 20px;"></div>
    <div>
        <p>教室借用次數：</p>
        <table style="border: solid 1px black;width:800px;height:400px;">
            <tr>
                <th>教室</th>
                <th>1月</th>
                <th>2月</th>
                <th>3月</th>
                <th>4月</th>
                <th>5月</th>
                <th>6月</th>
                <th>7月</th>
                <th>8月</th>
                <th>9月</th>
                <th>10月</th>
                <th>11月</th>
                <th>12月</th>
            </tr>
            <tr>
                <td>SL200-1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>SL200-3</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>SL201</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>SL245</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>SL246</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>SL471</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>LM200</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>LM202</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            renderChart();
        });

        function loadEventsFromLocalStorage() {
            const eventsKeys = [
                'events',
                'events-instrument2',
                'events-instrument3',
                'events-instrument4',
                'events-instrument5',
                'events-instrument6',
                'events-instrument7',
                'events-instrument8'
            ];
            let allEvents = [];

            eventsKeys.forEach(key => {
                const events = JSON.parse(localStorage.getItem(key)) || [];
                allEvents = allEvents.concat(events);
            });

            return allEvents;
        }

        function processData(events) {
            const borrowCounts = {};
            const classrooms = ['SL200-1', 'SL200-3', 'SL201', 'SL245', 'SL246', 'SL471', 'LM200', 'LM202'];

            // 初始化橫軸的月份範圍
            const startMonth = new Date(2024, 8); // 2024年9月
            const endMonth = new Date(2025, 0); // 2025年1月
            let currentMonth = startMonth;

            while (currentMonth <= endMonth) {
                const yearMonth = `${currentMonth.getFullYear()}-${(currentMonth.getMonth() + 1).toString().padStart(2, '0')}`;
                borrowCounts[yearMonth] = {
                    total: 0,
                    classrooms: classrooms.reduce((acc, room) => {
                        acc[room] = 0;
                        return acc;
                    }, {})
                };
                currentMonth.setMonth(currentMonth.getMonth() + 1);
            }

            events.forEach(event => {
                const date = new Date(event.start);
                const yearMonth = `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}`;
                const classroom = event.extendedProps.name;

                if (borrowCounts[yearMonth]) {
                    borrowCounts[yearMonth].total++;
                    if (borrowCounts[yearMonth].classrooms[classroom] !== undefined) {
                        borrowCounts[yearMonth].classrooms[classroom]++;
                    }
                }
            });

            return borrowCounts;
        }

        function renderChart() {
            const events = loadEventsFromLocalStorage();
            const processedData = processData(events);
            const labels = Object.keys(processedData);

            const totalCounts = labels.map(label => processedData[label].total);
            const classroomCounts = {};

            // 統計每間教室的借用次數
            const classrooms = ['SL200-1', 'SL200-3', 'SL201', 'SL245', 'SL246', 'SL471', 'LM200', 'LM202'];
            classrooms.forEach(classroom => {
                classroomCounts[classroom] = labels.map(label => processedData[label].classrooms[classroom]);
            });

            const ctx = document.getElementById('borrowChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '總借用次數',
                        data: totalCounts,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // 顯示每間教室的借用次數
            let statsHtml = '<h3>教室借用次數</h3><ul>';
            classrooms.forEach(classroom => {
                const total = classroomCounts[classroom].reduce((a, b) => a + b, 0); // 計算每間教室的總借用次數
                statsHtml += `<p>${classroom}: ${total} 次</p>`;
            });
            statsHtml += '</ul>';
            document.getElementById('classroomStats').innerHTML = statsHtml;
        }
    </script>
</body>

</html>