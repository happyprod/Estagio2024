<div class="row">

    <div class="col-12 col-xl-4">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-5">Estatisticas Principais</h6>

                <?php
                if ($session_id == $id) {
                    echo '<div class="d-flex justify-content-between w-100 mt-7">                                    ';
                } else {
                    echo '<div class="d-flex justify-content-between w-100 mt-3">';
                }
                ?>



                <div class="d-flex flex-column align-items-center w-50 text-center">
                    <h5 class="mb-0 text-lg">

                        <?php

                        $row_shows = $controller->getShowsQuantidade($id);

                        $shows = $row_shows["shows"];

                        echo $shows;
                        ?>
                    </h5>
                    <h5 class="text-sm text-lg" style="margin-top: 0.55em;">Projects</h5>
                </div>
                <div class="d-flex flex-column align-items-center w-50 text-center">

                    <h5 class="text-lg" style="margin-left: -1em;">
                        <?php

                        $numero_arredondado = $controller->getavgStars($id);

                        echo $numero_arredondado;

                        ?>

                        <button type="button" class="btn-tooltip fa fa-star border-0 text-sm position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" title="
                        <?php
                            $reviews = $controller->getReviewsNumber($id);
                            echo $reviews;
                        ?> Reviews" data-container="body" data-animation="true" style="background-color: rgba(255, 238, 0, 0); color: #ffcb0c; margin-top: 0.12em;"></button>
                    </h5>
                    <h5 class="text-sm mt-0 text-md">Avaliação</h5>
                    <p class="text-sm"></p>

                </div>
            </div>

            <div class="border-top my-1 w-85  mx-auto"></div>


            <div class="d-flex justify-content-between w-100 mt-3">
                <!-- Div que dispara o modal -->
                <div class="d-flex flex-column align-items-center w-50 text-center" onclick="getFollowingsList1(<?php echo $id;?>)" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#followingModal">
                    <h5 class="mb-0 text-lg">
                        <?php
                            $following = $controller->getFollowsQuantidade($id);
                            echo $following;
                        ?>
                    </h5>
                    <h5 class="text-sm mt-1 text-lg">A seguir</h5>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="followingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $nome; ?> - A Seguir</h5>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-header">
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="SearchBarFollowings" placeholder='Digite a Identificação do utilizador' aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-primary mb-0" onclick="getFollowingsList2(<?php echo $id;?>)" type="button" id="button-addon2">Procurar</button>
                                </div>
                            </div>
                            <div class="overflow-auto modal-body" id="getFollowingsList" style="height: 400px;">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column align-items-center w-50 text-center" onclick="getFollowersList1(<?php echo $id;?>)" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#followersModal">
                    <h5 id="followAccount" class="mb-0 text-lg">
                        <?php

                            $following = $controller->getFollowingsQuantidade($id);

                            echo $following;

                        ?>
                    </h5>
                    <h5 class="text-sm mt-1 text-md">Seguidores</h5>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="followersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $nome; ?> - Seguidores</h5>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-header">
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="SearchBarFollowers" placeholder='Digite a Identificação do utilizador' aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-primary mb-0" onclick="getFollowersList2(<?php echo $id;?>)" type="button" id="button-addon2">Procurar</button>
                                </div>
                            </div>
                            <div class="overflow-auto modal-body" id="getFollowersList" style="height: 400px;">
                                

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php
                if ($session_id != $id) {
                    echo '<button type="button" onclick="follow(' . $id . ')" id="followButtons" class="btn btn-primary btn-md d-flex justify-content-center mx-auto w-90 mt-5">';
                    $verificar_follow = $controller->verificarFollow($id);
                    if (!$verificar_follow == true) {
                        echo 'Seguir</button>';
                    } else {
                        echo 'Deixar de Seguir</button>';
                    }
                    echo '  
                    <button type="button" class="btn btn-secondary btn-md d-flex justify-content-center mx-auto w-90" data-bs-toggle="modal" data-bs-target="#contract">Contratar</button>';
                }
            ?>


        </div>
    </div>
</div>