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

        /* 設定教室欄等寬 */
        th,
        td {
            width: calc(100% / 9); /* 根據表格欄位數量調整 */
        }
    </style>
</head>

<body>
    <canvas id="borrowChart" width="300" height="150"></canvas>
    <div style="margin-left: 100px; margin-top: 20px;">
        <p>每月預約次數：</p>
        <table id="statsTable">
            <tr>
                <th class="month-column"></th>
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
                <td contenteditable="true">4</td>
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
                <td contenteditable="true">4</td>
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
                <td contenteditable="true">1</td>
                <td contenteditable="true">6</td>
            </tr>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            renderChart();

            const cells = document.querySelectorAll('#statsTable td[contenteditable="true"]');
            cells.forEach(cell => {
                cell.addEventListener('input', renderChart);
            });
        });

        const customColors = [
            'rgba(214, 163, 162, 0.6)',
            'rgba(190, 81, 77, 0.6)',
            'rgba(235, 149, 71, 0.6)',
            'rgba(245, 225, 130, 0.6)',
            'rgba(123, 164, 147, 0.6)',
            'rgba(141, 181, 193, 0.6)',
            'rgba(71, 107, 151, 0.6)',
            'rgba(127, 109, 163, 0.6)'
        ];

        function updateChart() {
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

            const rows = document.querySelectorAll('#statsTable tr');
            rows.forEach((row, index) => {
                if (index === 0) return;
                const cells = row.querySelectorAll('td');
                labels.push(cells[0].textContent);
                for (let i = 1; i < cells.length; i++) {
                    borrowCounts[Object.keys(borrowCounts)[i - 1]].push(parseInt(cells[i].textContent) || 0);
                }
            });

            const ctx = document.getElementById('borrowChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: Object.keys(borrowCounts).map((classroom, index) => {
                        return {
                            label: classroom,
                            data: borrowCounts[classroom],
                            backgroundColor: customColors[index],
                            borderColor: customColors[index].replace(/0.6\)/, '1)'),
                            borderWidth: 2
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

        function renderChart() {
            updateChart();
        }
    </script>
</body>

</html>
