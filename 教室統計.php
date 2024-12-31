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
            <tr>
                <td class="month-column">2024-09</td>
                <td contenteditable="true">6</td>
                <td contenteditable="true">0</td>
                <td contenteditable="true">0</td>
                <td contenteditable="true">2</td>
                <td contenteditable="true">1</td>
                <td contenteditable="true">2</td>
                <td contenteditable="true">5</td>
                <td contenteditable="true">3</td>
            </tr>
            <tr>
                <td class="month-column">2024-10</td>
                <td contenteditable="true">4</td>
                <td contenteditable="true">2</td>
                <td contenteditable="true">4</td>
                <td contenteditable="true">3</td>
                <td contenteditable="true">5</td>
                <td contenteditable="true">0</td>
                <td contenteditable="true">1</td>
                <td contenteditable="true">4</td>
            </tr>
            <tr>
                <td class="month-column">2024-11</td>
                <td contenteditable="true">4</td>
                <td contenteditable="true">0</td>
                <td contenteditable="true">3</td>
                <td contenteditable="true">2</td>
                <td contenteditable="true">0</td>
                <td contenteditable="true">1</td>
                <td contenteditable="true">4</td>
                <td contenteditable="true">2</td>
            </tr>
            <tr>
                <td class="month-column">2024-12</td>
                <td contenteditable="true">5</td>
                <td contenteditable="true">1</td>
                <td contenteditable="true">3</td>
                <td contenteditable="true">2</td>
                <td contenteditable="true">0</td>
                <td contenteditable="true">0</td>
                <td contenteditable="true">0</td>
                <td contenteditable="true">3</td>
            </tr>
            <tr>
                <td class="month-column">2025-01</td>
                <td contenteditable="true">1</td>
                <td contenteditable="true">5</td>
                <td contenteditable="true">3</td>
                <td contenteditable="true">2</td>
                <td contenteditable="true">2</td>
                <td contenteditable="true">0</td>
                <td contenteditable="true">0</td>
                <td contenteditable="true">1</td>
            </tr>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 初始渲染圖表
            renderChart();

            // 監聽表格內數據變動
            const cells = document.querySelectorAll('#statsTable td[contenteditable="true"]');
            cells.forEach(cell => {
                cell.addEventListener('input', renderChart); // 每次數據變更後更新圖表
            });
        });

        // 定義自訂顏色的數組
        const customColors = [
            '#FF5733', // SL200-1
            '#33FF57', // SL200-3
            '#3357FF', // SL201
            '#FF33A1', // SL245
            '#A1FF33', // SL246
            '#33A1FF', // SL471
            '#A133FF', // LM200
            '#FF33D9' // LM202
        ];

        // 更新圖表的函數
        function updateChart() {
            // 讀取表格中的數據
            const labels = [];
            const borrowCounts = {
                "SL200-1": [],
                "SL200-3": [],
                "SL201": [],
                "SL245": [],
                "SL246": [],
                "SL471": [],
                "LM200": [],
                "LM202": []
            };

            // 解析表格中的數據
            const rows = document.querySelectorAll('#statsTable tr');
            rows.forEach((row, index) => {
                if (index === 0) return; // 跳過標題行
                const cells = row.querySelectorAll('td');
                labels.push(cells[0].textContent); // 取得月份

                // 取得每個教室的數據
                for (let i = 1; i < cells.length; i++) {
                    borrowCounts[Object.keys(borrowCounts)[i - 1]].push(parseInt(cells[i].textContent) || 0);
                }
            });

            // 渲染圖表
            const ctx = document.getElementById('borrowChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: Object.keys(borrowCounts).map((classroom, index) => {
                        return {
                            label: classroom,
                            data: borrowCounts[classroom],
                            backgroundColor: customColors[index], // 使用自訂顏色
                            borderColor: 'rgba(0, 0, 0, 0.1)',
                            borderWidth: 1
                        };
                    })
                },
                options: {
                    responsive: true,
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
                        x: {
                            title: {
                                display: true,
                                text: '月份'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: '預約次數'
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        }

        // 初始渲染圖表
        function renderChart() {
            updateChart();
        }
    </script>
</body>

</html>