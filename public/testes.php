<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer Type Modal</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .RegisterModal1 .modal-content {
            text-align: center;
            max-width: 1000px;
            margin: auto;
        }

        .RegisterModal1 .modal-body .btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            text-align: center;
            height: 350px;
            /* Altura dos botões */
            padding: 20px;
            /* Adiciona um pouco de margem interna */
        }

        .RegisterModal1 .modal-body .btn img {
            height: 100px;
            margin-bottom: 10px;
        }

        .RegisterModal1 .btn-selected {
            background-color: #1E90FF;
            /* Reduzindo a opacidade do azul */
            border: none;
            /* Mudando a cor da borda para #1E90FF */
            color: #fff;
            box-shadow: 0px 5px 15px #1E90FF;
            /* Adicionando uma sombra com a cor #1E90FF */
        }

        .RegisterModal1 .btn-selected img {
            filter: invert(100%);
        }

        @media (min-width: 576px) {
            .RegisterModal1 .modal-body .btn {
                height: 300px;
            }
        }

        @media (min-width: 768px) {
            .RegisterModal1 .modal-body .btn {
                height: 270px;
            }
        }

        @media (min-width: 992px) {
            .RegisterModal1 .modal-body .btn {
                height: 250px;
            }
        }

        .RegisterModal1 .btn-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

<div class="RegisterModal1">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#freelancerModal">
        Open Modal
    </button>

    <!-- The Modal -->
    <div class="modal fade" id="freelancerModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Que tipo és?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <button class="w-100 btn btn-outline-secondary">
                                <div class="btn-content">
                                    <img src="./img/promotor.png" alt="Promotor">
                                    <h5>Promotor</h5>
                                    <p>Organiza eventos musicais.</p>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn w-100 btn-outline-secondary">
                                <div class="btn-content">
                                    <img src="./img/artist.png" alt="Artista">
                                    <h5>Artista</h5>
                                    <p>Dj/Cantor/Banda…</p>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button class="w-100 btn btn-outline-secondary">
                                <div class="btn-content">
                                    <img src="./img/booking agent.png" alt="Agentes de Booking">
                                    <h5>Agentes de Booking</h5>
                                    <p>Negocia contratos e datas de shows para artistas.</p>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-outline-secondary">
                                <div class="btn-content">
                                    <img src="./img/Booking Agency.png" alt="Agencia de Booking">
                                    <h5>Agencia de Booking</h5>
                                    <p>Representa artistas na negociação de oportunidades de trabalho.</p>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn w-100 btn-outline-secondary">
                                <div class="btn-content">
                                    <img src="./img/festival.png" alt="Festival">
                                    <h5>Evento</h5>
                                    <p>Evento com apresentações artísticas e musicais.</p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Continuar</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.btn').click(function() {
                $('.btn').removeClass('btn-selected');
                $(this).addClass('btn-selected');
                $(this).fadeOut(1000); // Adicionando animação de fadeOut
            });
        });
    </script>

</body>

</html>