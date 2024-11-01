<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教室使用頻率圖表</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="usageChart" width="400" height="200"></canvas>

    <script>
        // 模擬從本地存儲加載的事件
        function loadEventsFromLocalStorage() {
            // 這裡可以用真實數據，以下是範例數據
            return [
                { start: '2024-10-01T10:00:00', extendedProps: { name: '預約 A' } },
                { start: '2024-10-01T12:00:00', extendedProps: { name: '預約 B' } },
                { start: '2024-10-02T14:00:00', extendedProps: { name: '預約 C' } },
                { start: '2024-10-01T16:00:00', extendedProps: { name: '預約 D' } },
                { start: '2024-10-03T09:00:00', extendedProps: { name: '預約 E' } },
            ];
        }

        // 畫圖表的函數
        function drawUsageChart(events) {
            const usageData = {};

            events.forEach(event => {
                const startDate = new Date(event.start).toLocaleDateString();
                usageData[startDate] = (usageData[startDate] || 0) + 1;
            });

            const labels = Object.keys(usageData);
            const data = Object.values(usageData);

            const ctx = document.getElementById('usageChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '教室使用頻率',
                        data: data,
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
        }

        const events = loadEventsFromLocalStorage();
        drawUsageChart(events);
    </script>
</body>

</html>
