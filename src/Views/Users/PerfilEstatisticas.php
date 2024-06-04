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

                        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
                        $sql_shows = "SELECT COUNT(*) as shows FROM projects WHERE id_founder = ?";
                        $stmt_shows = $db->prepare($sql_shows);
                        $stmt_shows->execute([$id]);
                        $row_shows = $stmt_shows->fetch(PDO::FETCH_ASSOC);

                        $shows = $row_shows["shows"];

                        echo $shows;

                        ?>
                    </h5>
                    <h5 class="text-sm text-lg" style="margin-top: 0.55em;">Projects</h5>
                </div>
                <div class="d-flex flex-column align-items-center w-50 text-center">

                    <h5 class="text-lg" style="margin-left: -1em;"> <?php



                                                                    // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
                                                                    $sql_avg_rating = "SELECT AVG(stars) as avg_stars FROM rating WHERE id_receive = ?";
                                                                    $stmt_avg_rating = $db->prepare($sql_avg_rating);
                                                                    $stmt_avg_rating->execute([$id]);
                                                                    $row_avg_rating = $stmt_avg_rating->fetch(PDO::FETCH_ASSOC);
                                                                    $valor = $row_avg_rating["avg_stars"];
                                                                    $numero_arredondado = round($valor, 1); // arredonda para 12.35
                                                                    echo $numero_arredondado;

                                                                    ?> <button type="button" class="btn-tooltip fa fa-star border-0 text-sm position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" <?php

                                                                                                                                                                                                                // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
                                                                                                                                                                                                                $sql_ratings = "SELECT COUNT(*) as ratings FROM rating WHERE id_receive = ?";
                                                                                                                                                                                                                $stmt_ratings = $db->prepare($sql_ratings);
                                                                                                                                                                                                                $stmt_ratings->execute([$id]);
                                                                                                                                                                                                                $row_ratings = $stmt_ratings->fetch(PDO::FETCH_ASSOC);
                                                                                                                                                                                                                $rating = $row_ratings["ratings"];
                                                                                                                                                                                                                echo 'title="' . $rating . ' Reviews"';

                                                                                                                                                                                                                ?> title="(233 Reviews)" data-container="body" data-animation="true" style="background-color: rgba(255, 238, 0, 0); color: #ffcb0c; margin-top: 0.12em;"></button>
                    </h5>
                    <h5 class="text-sm mt-0 text-md">Avaliação</h5>
                    <p class="text-sm"></p>

                </div>
            </div>

            <div class="border-top my-1 w-85  mx-auto"></div>


            <div class="d-flex justify-content-between w-100 mt-3">
                <div class="d-flex flex-column align-items-center w-50 text-center">
                    <h5 class="mb-0 text-lg"> <?php


                                                // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
                                                $sql_follows = "SELECT COUNT(*) as following FROM follows WHERE id_user = ?";
                                                $stmt_follows = $db->prepare($sql_follows);
                                                $stmt_follows->execute([$id]);
                                                $row_avg_rating = $stmt_follows->fetch(PDO::FETCH_ASSOC);
                                                $following = $row_avg_rating["following"];

                                                echo $following;
                                                ?> </h5>
                    <h5 class="text-sm mt-1 text-lg">A seguir</h5>
                </div>
                <div class="d-flex flex-column align-items-center w-50 text-center">
                    <h5 class="mb-0 text-lg"> <?php



                                                // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
                                                $sql_follows = "SELECT COUNT(*) as following FROM follows WHERE id_followed = ?";
                                                $stmt_follows = $db->prepare($sql_follows);
                                                $stmt_follows->execute([$id]);
                                                $row_avg_rating = $stmt_follows->fetch(PDO::FETCH_ASSOC);
                                                $following = $row_avg_rating["following"];
                                                echo $following;


                                                ?></h5>
                    <h5 class="text-sm mt-1 text-md">Seguidores</h5>
                </div>
            </div>

            <?php

            if ($session_id != $id) {
                echo '<button type="button"
                                    class="btn btn-primary btn-md d-flex justify-content-center mx-auto w-90 mt-5">Seguir</button>
                                <button type="button"
                                    class="btn btn-secondary btn-md d-flex justify-content-center mx-auto w-90">Guardar
                                    Perfil</button>';
            }
            ?>




        </div>

    </div>
</div>