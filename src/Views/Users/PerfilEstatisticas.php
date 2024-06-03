
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

                                    // Get shows count
                                    $sql_shows = "SELECT COUNT(*) as shows FROM projects WHERE id_founder = ?";
                                    $stmt_shows = $conn->prepare($sql_shows);
                                    $stmt_shows->bind_param("i", $id);
                                    $stmt_shows->execute();
                                    $result_shows = $stmt_shows->get_result();
                                    $row_shows = $result_shows->fetch_assoc();
                                    $shows = $row_shows["shows"];

                                    echo $shows;

                                    ?>
                                </h5>
                                <h5 class="text-sm text-lg" style="margin-top: 0.55em;">Projects</h5>
                            </div>
                            <div class="d-flex flex-column align-items-center w-50 text-center">

                                <h5 class="text-lg" style="margin-left: -1em;"> <?php

                                // Get average rating
                                $sql_avg_rating = "SELECT AVG(stars) as avg_stars FROM rating WHERE id_receive = ?";
                                $stmt_avg_rating = $conn->prepare($sql_avg_rating);
                                $stmt_avg_rating->bind_param("i", $id);
                                $stmt_avg_rating->execute();
                                $result_avg_rating = $stmt_avg_rating->get_result();
                                $row_avg_rating = $result_avg_rating->fetch_assoc();
                                $valor = $row_avg_rating["avg_stars"];

                                $numero_arredondado = round($valor, 1); // arredonda para 12.35
                                
                                echo $numero_arredondado;

                                ?> <button type="button"
                                        class="btn-tooltip fa fa-star border-0 text-sm position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top" <?php

                                        // Get ratings count
                                        $sql_ratings = "SELECT COUNT(*) as ratings FROM rating WHERE id_receive = ?";
                                        $stmt_ratings = $conn->prepare($sql_ratings);
                                        $stmt_ratings->bind_param("i", $id);
                                        $stmt_ratings->execute();
                                        $result_ratings = $stmt_ratings->get_result();
                                        $row_ratings = $result_ratings->fetch_assoc();
                                        $rating = $row_ratings["ratings"];

                                        echo 'title="' . $rating . ' Reviews"';

                                        ?>title="(233 Reviews)"
                                        data-container="body" data-animation="true"
                                        style="background-color: rgba(255, 238, 0, 0); color: #ffcb0c; margin-top: 0.12em;"></button>
                                </h5>
                                <h5 class="text-sm mt-0 text-md">Avaliação</h5>
                                <p class="text-sm"></p>

                            </div>
                        </div>

                        <div class="border-top my-1 w-85  mx-auto"></div>


                        <div class="d-flex justify-content-between w-100 mt-3">
                            <div class="d-flex flex-column align-items-center w-50 text-center">
                                <h5 class="mb-0 text-lg"> <?php

                                // Get follows count
                                $sql_follows = "SELECT COUNT(*) as following FROM follows WHERE id_user = ?";
                                $stmt_follows = $conn->prepare($sql_follows);
                                $stmt_follows->bind_param("i", $id);
                                $stmt_follows->execute();
                                $result_follows = $stmt_follows->get_result();
                                $row_follows = $result_follows->fetch_assoc();
                                $following = $row_follows["following"];

                                echo $following;
                                ?> </h5>
                                <h5 class="text-sm mt-1 text-lg">A seguir</h5>
                            </div>
                            <div class="d-flex flex-column align-items-center w-50 text-center">
                                <h5 class="mb-0 text-lg"> <?php

                                // Get follows count
                                $sql_follows = "SELECT COUNT(*) as following FROM follows WHERE id_followed = ?";
                                $stmt_follows = $conn->prepare($sql_follows);
                                $stmt_follows->bind_param("i", $id);
                                $stmt_follows->execute();
                                $result_follows = $stmt_follows->get_result();
                                $row_follows = $result_follows->fetch_assoc();
                                $following = $row_follows["following"];

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