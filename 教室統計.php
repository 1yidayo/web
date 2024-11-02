<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教室使用統計圖表</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <label for="year-select">選擇年份:</label>
    <select id="year-select">
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <!-- 可以根據需要添加更多年份 -->
    </select>

    <label for="month-select">選擇月份:</label>
    <select id="month-select">
        <option value="01">一月</option>
        <option value="02">二月</option>
        <option value="03">三月</option>
        <option value="04">四月</option>
        <option value="05">五月</option>
        <option value="06">六月</option>
        <option value="07">七月</option>
        <option value="08">八月</option>
        <option value="09">九月</option>
        <option value="10">十月</option>
        <option value="11">十一月</option>
        <option value="12">十二月</option>
    </select>
    <button id="generate-chart">生成統計圖</button>
    <canvas id="usageChart" width="300" height="150"></canvas>

    <script>

        function loadMultipleEventsFromLocalStorage() {
            const eventsKeys = ['events', 'events-instrument2', 'events-instrument3', 'events-instrument4', 'events-instrument5', 'events-instrument6', 'events-instrument7', 'events-instrument8'];
            let allEvents = [];

            eventsKeys.forEach(key => {
                const events = JSON.parse(localStorage.getItem(key)) || [];
                allEvents = allEvents.concat(events);
            });

            return allEvents;


        }

        document.getElementById('generate-chart').addEventListener('click', function() {
            const selectedMonth = document.getElementById('month-select').value;
            if (!selectedMonth) {
                alert('請選擇一個月份');
                return;
            }

            const events = loadMultipleEventsFromLocalStorage(); // 載入所有事件
            const roomNames = ['SL200-1', 'SL200-3', 'SL201', 'SL245', 'SL246', 'SL471', 'LM200', 'LM202'];
            const usageCount = Array(roomNames.length).fill(0); // 初始化使用次數為 0

            // 計算所選月份的每個教室使用次數
            events.forEach(event => {
                const startDate = new Date(event.start);
                const eventMonth = `${startDate.getFullYear()}-${String(startDate.getMonth() + 1).padStart(2, '0')}`; // 格式 YYYY-MM

                if (eventMonth === selectedMonth) {
                    const roomNumber = event.extendedProps.room; // 假設事件中有房間號碼
                    const index = roomNames.indexOf(roomNumber); // 獲取房間名稱對應的索引
                    if (index !== -1) {
                        usageCount[index]++; // 計算對應教室的使用次數
                    }
                }
            });

            // 準備圖表數據
            const labels = roomNames; // 標籤為教室名稱
            const data = usageCount; // 使用次數數據

            // 繪製圖表
            const ctx = document.getElementById('usageChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '教室使用次數',
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

        });
    </script>
</body>

</html>