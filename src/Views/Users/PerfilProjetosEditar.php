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
                            <button type="button" id="update-button" class="btn bg-gradient-success btn-block mb-3 w-100" data-bs-toggle="modal" onclick="alterarImageContainer(imageContainer' . $count . '); updateData(' . $count . ', ' . $id . ', ' . $p_id . ')" data-bs-target="#alterarimagens' . $count . '">
                                Alterar Imagens
                            </button>
                        </div>

                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100" data-bs-toggle="modal" onclick="updateDataInfo(' . $count . ', ' . $id . ', ' . $p_id . ')" data-bs-target="#modalAlterarInfo' . $count . '">
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
                            <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100" data-bs-toggle="modal" onclick="updatePrivacy(' . $count . ', ' . $p_id . ')" data-bs-target="#splitModal' . $count . '">
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
                    <div id="alterarprivacidade' . $count . '" class="modalcompletoprivacidade">

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                    <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#menu' . $count . '" onclick="guardarPrivacidade(' . $p_id . ', ' . $count . ')">Confirmar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalAlterarInfo' . $count . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Informações</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body ">


                <div id="alterarInfo' . $count . '">
                                

                </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                    <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#menu' . $count . '" onclick="guardarSobre(' . $p_id . ')">Confirmar</button>
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

                <div class="row sortable-list" id="imageContainer' . $count . '">
                    <!-- conteudo dinamico será exibido aquim -->
                </div>

            <div class="modal-footer">
                <button type="button" onclick="verificarOArray()" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#exampleModalMessage1" onclick="guardarImagens(' . $count . ')">Confirmar</button>
            </div>
        </div>
    </div>
    </div>
</div>';
