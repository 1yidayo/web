<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>每月預約次數統計圖表</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 800px;
            height: 400px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <canvas id="borrowChart" width="300" height="150"></canvas>
    <div style="margin-left: 100px;margin-top: 20px;">
        <p>每月預約次數：</p>
        <table id="statsTable">
            <tr>
                <th></th>
                <th>SL200-1</th>
                <th>SL200-3</th>
                <th>SL201</th>
                <th>SL245</th>
                <th>SL246</th>
                <th>SL471</th>
                <th>LM200</th>
                <th>LM202</th>
            </tr>
            <!-- 預約次數表格將由 JavaScript 動態填充 -->
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            renderChart();
        });

        // 從伺服器載入每月預約次數統計資料
        function loadStatsFromServer() {
            return fetch('get_stats.php') // PHP 服務端腳本的 URL
                .then(response => response.json()) // 假設服務端返回的是 JSON 格式
                .then(data => data) // 這裡 data 就是從資料庫拿到的預約資料
                .catch(error => {
                    console.error('Error loading stats from server:', error);
                    return {}; // 如果發生錯誤，返回空物件
                });
        }

        // 渲染圖表和表格
        function renderChart() {
            loadStatsFromServer().then(stats => {
                const labels = Object.keys(stats); // 取得月份
                const borrowCounts = Object.values(stats); // 取得每月借用次數

                // 渲染圖表
                const ctx = document.getElementById('borrowChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '每月預約次數',
                            data: borrowCounts,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            datalabels: {
                                color: '#000', // 設置標籤顏色
                                anchor: 'end', // 設置標籤位置
                                align: 'top', // 設置標籤顯示在條形圖的上方
                                font: {
                                    weight: 'bold', // 設置標籤字體粗細
                                    size: 14 // 設置標籤字體大小
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: '預約次數' // 顯示縱軸標題
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: '月份' // 顯示橫軸標題
                                }
                            }
                        }
                    },
                    plugins: [ChartDataLabels] // 激活數據標籤插件
                });

                // 渲染表格
                let tableHtml = '';
                labels.forEach(month => {
                    tableHtml += `<tr><td>${month}</td><td>${stats[month]}</td></tr>`;
                });
                document.getElementById('statsTable').innerHTML += tableHtml;
            });
        }
    </script>
</body>

</html>