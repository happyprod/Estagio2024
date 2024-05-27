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
            <div>
                <button onclick="semana()">
                    Semana
                </button>

                <button onclick="mes()">
                    Mês
                </button>

                <button onclick="ano()">
                    Ano
                </button>

                <button onclick="tudo()">
                    Tudo
                </button>
            </div>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        function semana() {
            
            
            
        }


        // Código PHP para obter os dados do banco de dados e processar
        <?php
        // Conexão com o banco de dados
        $servername = "localhost"; // Endereço do servidor MySQL
        $username = "root"; // Nome de usuário do MySQL
        $password = ""; // Senha do MySQL
        $database = "concertpulse"; // Nome do banco de dados
        $conn = new mysqli($servername, $username, $password, $database);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Consulta para obter os registros de likes da última semana
        $sql = "SELECT data, numero_likes FROM projects_stats_snapshot WHERE data >= DATE_SUB(CURDATE(), INTERVAL 1 week)";
        $result = $conn->query($sql);

        // Processamento dos dados para o gráfico
        $likes_data = array();
        while ($row = $result->fetch_assoc()) {
            $date = date("Y-m-d", strtotime($row['data']));
            if (!isset($likes_data[$date])) {
                $likes_data[$date] = 0;
            }
        
            $likes_data[$date] += $row['numero_likes'];
        }

        // Fechar conexão com o banco de dados
        $conn->close();
        ?>

        // Código JavaScript para o gráfico de linhas
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
                labels: <?php echo json_encode(array_keys($likes_data)); ?>, // Dias da semana
                datasets: [{
                    label: "Likes",
                    tension: 0.4,
                    borderWidth: 3,
                    borderColor: "#cb0c9f",
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: <?php echo json_encode(array_values($likes_data)); ?>, // Quantidade de likes por dia
                    maxBarThickness: 6
                }],
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