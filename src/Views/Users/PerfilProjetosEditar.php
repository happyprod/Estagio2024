<?php 
echo '
<div class="col-md-12 mt-2">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary btn-sm w-100 d-flex justify-content-center text-center mb-0" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">
        Alterar Projeto
    </button>


    <!-- Modal -->
    <div class="modal fade" id="menu' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">' . $p_nome . ' - Alterar</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100" data-bs-toggle="modal" onclick="alterarImageContainer(imageContainer' . $count . ')" data-bs-target="#alterarimagens' . $count . '">
                                Alterar Imagens
                            </button>
                        </div>

                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100" data-bs-toggle="modal" data-bs-target="#exampleModalMessage3">
                                Alterar Informações
                            </button>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100" data-bs-toggle="modal" data-bs-target="#exampleModalMessage2">
                                Ver Estatisticas
                            </button>
                        </div>

                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100" data-bs-toggle="modal" onclick="showProject(' . $count . ')" data-bs-target="#splitModal' . $count . '">
                                Privacidade
                            </button>
                        </div>

                        <div class="row d-flex justify-content-center mx-auto">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-danger btn-block mb-3 w-100" data-bs-toggle="modal" data-bs-target="#exampleModalMessage3">
                                Apagar Projeto
                            </button>
                        </div>

                        <div class="modal-footer" style="height: 4em;">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalMessage2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nome do asd - Alterar</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="card mb-3">
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="line-chart" class="chart-canvas" height="300px"></canvas>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary btn-block" data-bs-toggle="modal" data-bs-target="#exampleModalMessage1">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="splitModal' . $count . '" tabindex="-1" data-target="privacidade' . $count . '" aria-labelledby="splitModalLabel" data-bs-keyboard="false" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">' . $p_nome . ' - Privacidade </h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>


                <div class="modal-body" style="padding: 0px;">
                    <div class="modalcompletoprivacidade">
                        <div class="row h-100">
                            <div class="col-4">
                                <div class="left-pane w-100 h-100 mx-auto">
                                    <div class="radio-input">
                                        <div id="DivProjeto' . $count . '" onclick="showProject(' . $count . ')">
                                            <input type="radio" id="value-1" name="value-radio" value="value-3">
                                            <label for="value-1">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABsUlEQVR4nO2YMUvDQBTHf4rYRaWzfgHBCn4FNycVByfdBaud3B0FP4KCs7uD7iLtoNZJVweVdhHUxcUnB6/lCE2a2ti7hPvDg0vukbzf+ydHchDkr0rAHlAHvjTMeAeYICeaA5qAxMQ1UCYHTjS14EdgDZjWWAeedO4KGMNj7VsQvbpetmBW8VgNLdI4EacNzTnHY31qkeZRitNMwvvjS9Ad9JHrQiWAROS64xIcich1xyU4EpHrjkueHDka4v5egUgCjDcg70A7Ze6BryAvwBIwD7z2yW0Diz6C3AOz1nUqQCsFRCXijFOQS+tjdBlYSICJQnTmD12DnFq/yFvAtxbXCyYOQiyYkYP8WF00qum5Xp0378xD5Pjtj+5nCmK6vq35xo2TmLyWdt5oPMEJcQHyAaxo7hRw0Se/nZETkjXImeaZFeou5c2NA5tDOiH/8WgdA88ZFCWuQVwGAQT3LkihHSnpJnbD2sQ246rO5QbkNiEpaS6Nm1lI0oIM1Y2igIgHgesCAggRRzq78XkP6kUBqRYFZHKAz26fY+B/CF+jK+PMLnCT0wUgKCgoKIiR6xep8tEcHYPuTwAAAABJRU5ErkJggg==" alt="Ícone Projeto">
                                                Projeto
                                            </label>
                                        </div>

                                        <div id="DivGostos' . $count . '" onclick="showLikes(' . $count . ')">
                                            <input type="radio" id="value-2" name="value-radio" value="value-2">
                                            <label for="value-2">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC3UlEQVR4nO2azUtUYRTGfwR1py81NA2iEipoU7tqWVBoQZFL003rQFKJVu1aqSVFQbQKXPQHVFO5dRESrctRIUr7IK2W+VG+8cIRZLpz575fdy7iAw8Mzp3nPY/vO+eec+7ABtYvdgEdwBBQBCaAn8CiUL9+L+/pay4BDeQEEdANjAJ/AGVI/ZmXQJdoZY6tQD/w2SL4SpwFeoFCVibOA9MeDZRzCmgPaUBv/b2ABso5IjvvFS3A2wxNKOEboNmXiVbZblUjTkoMTtgtaVTVmNPAHlsThRodJ5VwzKxS9MMcBK/KeN8mxaqcsi2tCb19pRwErCpwKu1Nsz8HwaoqvJZmN2ZzEKiqwplqX/zuHASpUvJykpFRC8HfwB3gOLAdqJdaaSzm2jF5r16uPQEMAwsW675I6idMS3Fd/R6toLcJ6AP+Cvvkb3E4BnwxXHsZqIsT6zAUWpL/aDVcFVbDSQnOJIaLcUK3DUUe4x8jhjEMxokUDUXOBjDSbhjD0ziRSUORxgBGmgxj0AXtf5g3FNkSwEhkGMNcnMiiocihAEYOG8aw4MOITqe+cd2HkR+GIjrvb/NoYgfwzTCG73FCNhXvTY9Gblmsrwd+zulXyQ3slAcTZyxuhqpS+h2yENL8CuxzMHHQImMq4YCPEqW82dlrYeIA8MFh3Qtxog2W89tVlgzHNkeAjw7rLVUqGjVeOQgrOSKnU5g4B/xyXOt50gJdjuKruf1Kwho3HHdeCTuzanV1s7V5jfZO4Ikn7U9pSqReT4tpvgb2S9/ic4LfQwoUPM965yxbWZVQ8Uah+oKsuGLTBz3IQeCqjHexQCSDY5UTjrv0QE05eqzQgiNaLdpgnyxJKeMFzTU6ZuPysCnIw9CVjEw8Cv3svS3wUZsINGqKRSSj/RmPBnTZ0VOrX0BEMhUvWnZ4y1LFdgYaL1mhTmaxeoz5TPrp+TU/qtGv30l7OiBNkS4kN7Au8Q+VNlCnUHu31AAAAABJRU5ErkJggg==" alt="Ícone Contagem de Gostos">
                                                Contagem de Gostos
                                            </label>
                                        </div>

                                        <div id="DivComentarios' . $count . '" onclick="showComments(' . $count . ')">
                                            <input type="radio" id="value-3" name="value-radio" value="value-3">
                                            <label for="value-3">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACL0lEQVR4nO2ZT0sVYRTGf2UIgUEZKJnQIvsAgpVb/QgS4ndwr3RbZf4p3BgVfQMFLRHvyp3fQEt3RX8o6IbmptRrmyMDZxEXbnNm5tyZ98I88Gwu3HOe8877nvPMO1CiRAkPXASGgQrwFtgHjoC/yiP97Q3wELiv/ykc/cAC8B2QhPwGzAM3ixB+HXgNnKUQ3sg68Arozkv8BHDoILyRB8B4K4Vf0lWXFvOl5nLFZaCag3hRbmpOF3QA6zmKF2XV60nksW2kCV94HFgpmA/Siu/WzlB0AYfatttq60jWrdTvNKS8WE86sRdiAkZ+phM/dKqP+l/OuSRtM87bdOGPKzE5v1oN4LDhkVZa8AQeGfLeswSzBCqK05YCipi6YuSapYD9AIRKE763FPDLEOgDsAg8deKixozLGw3WWFj6/238ccc4D2Jxagg0EHIBNeMWmtGu4MEnwEevLbTX7od4JQCh0oSrlgKmAxAqWQbZoCGQ1cxZTJok4JClgAtqnLzMXJxJEyPNZg7tMB5mzmrSxMDZBItGj3Ee5MU60EdCfApAuCifJxU/EIBoUf4EriUtYDIA4aIcIwU2AxAuwFIa8VHn+B2A+Graq8WRAMRvZLncfRZAx+kgA3YKEl5Le2AbcWJM+FkHTFbhp7rqV3HCdpNEf7Q7Tf7zRtYLPAa+pPQ2s8ANnHEL2AKOgV09E6MG7xO52ClgWV88fujqnulFwTu9Foks8d1QPrOWKEGb4xws8HXGpqFIIgAAAABJRU5ErkJggg==" alt="Ícone Gostos">
                                                Comentarios
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-8" style="padding-left: 0px;">
                                <div class="right-pane w-100 h-100 mx-auto" style="padding-left: 0px;" id="rightPaneContent' . $count . '">
                                    <!-- Conteúdo dinâmico será carregado aqui -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                    <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#menu' . $count . '" onclick="guardarprivacidade()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalMessage3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Informações</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body ">


                    <form action="">

                        <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Nome do evento</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tomorrowland" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <div class="row" style="height: 2em;">
                                        <div class="col-10">
                                            <div class="form-group">
                                                <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Identificação do
                                                    Evento</label>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                        <input type="text" class="form-control" placeholder="TomorrowlandOfficial" aria-label="TomorrowlandOfficial" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="title" style="font-size: 16px;" for="exampleFormControlTextarea1">Descrição</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 295px;"></textarea>
                        </div>


                        <div class="row" style="margin-top: 2em;">
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-10">
                                            <label class="title" style="font-size: 16px;" for="exampleFormControlTextarea1">Data</label>
                                        </div>

                                        <div class="col-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                    <input class="form-control" type="date" value="2018-11-23" id="example-date-input">
                                </div>
                            </div>

                            <div class="col-6">

                                <div class="form-group">
                                    <div class="row" style="height: 2.1em;">
                                        <div class="col-10">
                                            <div class="form-group">
                                                <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Empresa de Booking</label>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                        <input type="text" class="form-control" placeholder="TomorrowlandOfficial" aria-label="TomorrowlandOfficial" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- promotores envolvidos, uma caixa de texto onde sera possivel escrever o @ do promotor e em baixo será possivel ver as pessoas com um @ semelhante, caso nao exista será exibido alguma mensagem de erro-->

                        <!-- Localização -->


                        <div class="border-top mt-4 w-85 mx-auto" style="opacity: 50%; margin-bottom: 2.2em;">
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="">
                                    <div class="row" style="height: 2.1em;">

                                        <div class="col-10">
                                            <div class="form-group">
                                                <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Localização</label>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" id="endereco" class="form-control mb-1" placeholder="Digite o endereço...">
                                    <div id="mapa" class="mt-3 rounded" style="height: 300px;"></div>
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="row" style="height: 1.975em;">

                                    <div class="col-10">
                                        <div class="form-group">
                                            <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Colaboradores</label>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        </div>
                                    </div>
                                </div>


                                <div class="input-group mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                        <input type="text" class="form-control" placeholder="Promotor/Organizador" aria-label="Promotor/Organizador" aria-describedby="button-addon2" id="email" name="email" style="border-radius: 0em !important;" list="emails">
                                        <datalist id="emails"></datalist>
                                        <button class="btn btn-outline-primary mb-0" type="button" id="btnAdicionar">Adicionar</button>
                                    </div>

                                </div>


                                <div class="row d-none" id="boxcomnomes">
                                    <div class="col-xl-12 mb-3 mb-lg-5">
                                        <div class="card">
                                            <div id="listaNomes" class="overflow-auto p-3" style="max-height: 300px;">
                                                <!-- Lista de nomes e emails adicionados -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>



                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                    <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#menu' . $count . '" onclick="guardarimagens()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="alterarimagens' . $count . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">' . $p_nome . ' - Alterar Imagens</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">


                <div class="row sortable-list" id="imageContainer' . $count . '">';


                    if (count($result2) > 0) { // Use PDO method to check rows

                    foreach ($result2 as $row2) {

                    $pi_imagem = $row2["image"];
                    $ordem = $row2['ordem'];
                    echo '
                    <div class="col-4 mb-3 imageContainer' . $count . '" data-id="' . $ordem . '">
                        <a class="delete-image" data-id="' . $ordem . '">
                            <i class="position-absolute mt-2 p-1 bg-danger rounded-circle" style="opacity: 77.5%; margin-left: 12.5em;">
                                <svg style="width: 2em; height: 2em; color: white;" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 32 32">
                                    <path d="M 15 4 C 14.476563 4 13.941406 4.183594 13.5625 4.5625 C 13.183594 4.941406 13 5.476563 13 6 L 13 7 L 7 7 L 7 9 L 8 9 L 8 25 C 8 26.644531 9.355469 28 11 28 L 23 28 C 24.644531 28 26 26.644531 26 25 L 26 9 L 27 9 L 27 7 L 21 7 L 21 6 C 21 5.476563 20.816406 4.941406 20.4375 4.5625 C 20.058594 4.183594 19.523438 4 19 4 Z M 15 6 L 19 6 L 19 7 L 15 7 Z M 10 9 L 24 9 L 24 25 C 24 25.554688 23.554688 26 23 26 L 11 26 C 10.445313 26 10 25.554688 10 25 Z M 12 12 L 12 23 L 14 23 L 14 12 Z M 16 12 L 16 23 L 18 23 L 18 12 Z M 20 12 L 20 23 L 22 23 L 22 12 Z" fill="rgb(255, 255, 255)"></path>
                                </svg>
                            </i>
                        </a>
                        <img src="http://localhost/redes/public/users/' . $id . '/' . $pi_imagem . '" class="ui-state-default d-block rounded" style="width:240px; height: 180px;" alt="...">
                    </div>';
                    }
                    }

                    echo '

                    <div class="col-4 mb-3 fixed-item" id="fixedItem" style="width:263px; height: 180px;">
                        <label for="fileInput" class="w-100 h-100">
                            <div class="card card-plain w-100 h-100 border">
                                <div class="card-body d-flex flex-column justify-content-center text-center" style="width:100%; height: 100%;">
                                    <i class="fa fa-plus text-secondary mb-3" aria-hidden="true"></i>
                                    <h5 class=" text-secondary"> Adicionar Imagem </h5>
                                </div>
                            </div>
                        </label>
                        <input id="fileInput" type="file" style="display: none;">
                    </div>



                </div>


                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                    <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#exampleModalMessage1" onclick="guardarimagens()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>';