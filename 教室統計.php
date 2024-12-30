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

        body {
            background-color: transparent;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        /* 調整月份欄寬度 */
        th.month-column,
        td.month-column {
            width: 120px;
        }
    </style>
</head>

<body>
    <canvas id="borrowChart" width="300" height="150"></canvas>
    <div style="margin-left: 100px; margin-top: 20px;">
        <p>每月預約次數：</p>
        <table id="statsTable">
            <tr>
                <th class="month-column">月份</th>
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
        document.addEventListener('DOMContentLoaded', function () {
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
                                color: '#000',
                                anchor: 'end',
                                align: 'top',
                                font: {
                                    weight: 'bold',
                                    size: 14
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: '預約次數'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: '月份'
                                }
                            }
                        }
                    },
                    plugins: [ChartDataLabels]
                });

                // 假設已經有一些手動填寫的數據（如SL200-3、SL201等）
                const manualData = {
                    "2024-09": {
                        "SL200-3": 0,
                        "SL201": 0,
                        "SL245": 2,
                        "SL246": 1,
                        "SL471": 2,
                        "LM200": 5,
                        "LM202": 3
                    },
                    "2024-10": {
                        "SL200-3": 2,
                        "SL201": 4,
                        "SL245": 3,
                        "SL246": 6,
                        "SL471": 0,
                        "LM200": 1,
                        "LM202": 4
                    },
                    "2024-11": {
                        "SL200-3": 0,
                        "SL201": 3,
                        "SL245": 2,
                        "SL246": 0,
                        "SL471": 1,
                        "LM200": 4,
                        "LM202": 2
                    },
                    "2024-12": {
                        "SL200-3": 1,
                        "SL201": 3,
                        "SL245": 2,
                        "SL246": 0,
                        "SL471": 0,
                        "LM200": 0,
                        "LM202": 3
                    },
                    "2025-01": {
                        "SL200-3": 5,
                        "SL201": 3,
                        "SL245": 2,
                        "SL246": 2,
                        "SL471": 0,
                        "LM200": 0,
                        "LM202": 1
                    },
                };

                // 渲染表格
                let tableHtml = '';
                labels.forEach(month => {
                    // SL200-1 來自資料庫，其他設備來自手動填寫數據
                    tableHtml += `<tr><td class="month-column">${month}</td>
        <td>${stats[month]['SL200-1']}</td>
        <td>${manualData[month]?.['SL200-3'] !== undefined ? manualData[month]['SL200-3'] : 'N/A'}</td>
        <td>${manualData[month]?.['SL201'] !== undefined ? manualData[month]['SL201'] : 'N/A'}</td>
        <td>${manualData[month]?.['SL245'] !== undefined ? manualData[month]['SL245'] : 'N/A'}</td>
        <td>${manualData[month]?.['SL246'] !== undefined ? manualData[month]['SL246'] : 'N/A'}</td>
        <td>${manualData[month]?.['SL471'] !== undefined ? manualData[month]['SL471'] : 'N/A'}</td>
        <td>${manualData[month]?.['LM200'] !== undefined ? manualData[month]['LM200'] : 'N/A'}</td>
        <td>${manualData[month]?.['LM202'] !== undefined ? manualData[month]['LM202'] : 'N/A'}</td></tr>`;
                });
                document.getElementById('statsTable').innerHTML += tableHtml;

            });
        }
    </script>
</body>

</html>