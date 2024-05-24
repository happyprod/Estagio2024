<?php /*
Ano
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Soft UI Dashboard by Creative Tim</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <style>
        .chart-container {
            width: 80%;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div class="col-lg-7">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <h6>Sales overview</h6>
                <p class="text-sm">
                    <i class="fa fa-arrow-up text-success"></i>
                    <span class="font-weight-bold">4% more</span> in 2021
                </p>
            </div>
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart-container">
                        <canvas id="line-chart-gradient" class="chart-canvas" height="300px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Core JS Files -->
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        // Código para o gráfico de linhas
        var ctx2 = document.getElementById("line-chart-gradient").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Mobile apps",
                        tension: 0.4,
                        borderWidth: 3,
                        borderColor: "#cb0c9f",
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6
                    },
                    {
                        label: "Websites",
                        tension: 0.4,
                        borderWidth: 3,
                        borderColor: "#3A416F",
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                animation: {
                    duration: 2000 // Aumenta a duração da animação para 2 segundos
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
</body>

</html> */
?>

<?php
/* 
Mes
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Soft UI Dashboard by Creative Tim</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <style>
    
        .chart-container {
            width: 80%;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div class="col-lg-7">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <h6>Sales overview</h6>
                <p class="text-sm">
                    <i class="fa fa-arrow-up text-success"></i>
                    <span class="font-weight-bold">4% more</span> in 2021
                </p>
            </div>
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart-container">
                        <canvas id="line-chart-gradient" class="chart-canvas" height="300px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        // Código para o gráfico de linhas
        var ctx2 = document.getElementById("line-chart-gradient").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7", "Day 8", "Day 9", "Day 10", "Day 11", "Day 12", "Day 13", "Day 14", "Day 15", "Day 16", "Day 17", "Day 18", "Day 19", "Day 20", "Day 21", "Day 22", "Day 23", "Day 24", "Day 25", "Day 26", "Day 27", "Day 28", "Day 29", "Day 30", "Day 31"],
                datasets: [{
                        label: "Mobile apps",
                        tension: 0.4,
                        borderWidth: 3,
                        borderColor: "#cb0c9f",
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150, 160, 170, 180, 190, 200, 190, 180, 170, 160, 150, 140, 130, 120, 110, 100, 90],
                        maxBarThickness: 6
                    },
                    {
                        label: "Websites",
                        tension: 0.4,
                        borderWidth: 3,
                        borderColor: "#3A416F",
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [8, 16, 24, 32, 40, 48, 56, 64, 72, 80, 88, 96, 104, 112, 120, 128, 136, 144, 152, 160, 152, 144, 136, 128, 120, 112, 104, 96, 88, 80, 72],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                animation: {
                    duration: 2000 // Aumenta a duração da animação para 2 segundos
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
</body>

</html>
*/?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Soft UI Dashboard by Creative Tim</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <style>
        /* Estilo adicional */
        .chart-container {
            width: 80%;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div class="col-lg-6">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <h6>Sales overview</h6>
                <p class="text-sm">
                    <i class="fa fa-arrow-up text-success"></i>
                    <span class="font-weight-bold">4% more</span> in 2021
                </p>
            </div>
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart justify-content-center d-flex">
                        <canvas id="line-chart-gradient" class="chart-canvas" height="300px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        // Código para o gráfico de linhas
        var ctx2 = document.getElementById("line-chart-gradient").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7"],
                datasets: [{
                        label: "Mobile apps",
                        tension: 0.4,
                        borderWidth: 3,
                        borderColor: "#cb0c9f",
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [50, 60, 70, 80, 90, 100, 110],
                        maxBarThickness: 6
                    },
                    {
                        label: "Websites",
                        tension: 0.4,
                        borderWidth: 3,
                        borderColor: "#3A416F",
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, 40, 50, 60, 70, 80, 90],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                animation: {
                    duration: 2000 // Aumenta a duração da animação para 2 segundos
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Soft UI Dashboard by Creative Tim</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <style>
        /* Estilo adicional */
        .chart-container {
            width: 80%;
            margin: 0 auto;
        }
        .btn-group {
            margin-bottom: 20px;
        }
        .btn-group button {
            background-color: #f0f0f0;
            border: none;
            color: black;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn-group button.active {
            background-color: #cb0c9f;
            color: white;
        }
    </style>
</head>

<body>

    <div class="btn-group">
        <button class="btn active" onclick="changeInterval('week')">Semana</button>
        <button class="btn" onclick="changeInterval('month')">Mês</button>
        <button class="btn" onclick="changeInterval('year')">Ano</button>
        <button class="btn" onclick="changeInterval('all')">Tudo</button>
    </div>

    <div class="col-lg-7">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <h6>Sales overview</h6>
                <p class="text-sm">
                    <i class="fa fa-arrow-up text-success"></i>
                    <span class="font-weight-bold">4% more</span> in 2021
                </p>
            </div>
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart-container">
                        <canvas id="line-chart-gradient" class="chart-canvas" height="300px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var chartData = {
            week: {
                labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7"],
                likes: [50, 60, 70, 80, 90, 100, 110]
            },
            month: {
                labels: ["Week 1", "Week 2", "Week 3", "Week 4"],
                likes: [70, 150, 250, 180]
            },
            year: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                likes: [300, 250, 400, 350, 500, 450, 550, 600, 650, 700, 750, 800]
            },
            all: {
                labels: ["All Time"],
                likes: [5000]
            }
        };

        var ctx2 = document.getElementById("line-chart-gradient").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        var myChart = new Chart(ctx2, {
            type: "line",
            data: {
                labels: chartData.week.labels,
                datasets: [{
                    label: "Likes",
                    tension: 0.4,
                    borderWidth: 3,
                    borderColor: "#cb0c9f",
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: chartData.week.likes,
                    maxBarThickness: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                animation: {
                    duration: 2000 // Aumenta a duração da animação para 2 segundos
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        function changeInterval(interval) {
            myChart.data.labels = chartData[interval].labels;
            myChart.data.datasets[0].data = chartData[interval].likes;
            myChart.update();
        }
    </script>
</body>

</html>
