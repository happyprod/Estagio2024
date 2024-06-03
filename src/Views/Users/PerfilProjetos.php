<div class="col-12 mt-4">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-1">Projects</h6>
                        <p class="text-sm">Um pouco sobre o meu trabalho</p>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">



                            <?php

                            $count = 1;

                            // Consulta SQL para obter os dados desejados
                            $sql = "SELECT * FROM projects WHERE id_founder = $id";

                            $result = mysqli_query($conn, $sql);

                            // Verifica se a consulta retornou resultados
                            if (mysqli_num_rows($result) > 0) {
                                // Exibindo os dados encontrados
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $p_id = $row["id"];
                                    $p_nome = $row["nome"];
                                    $p_imagem = $row["imagem"];
                                    $p_sinopse = $row["sinopse"];
                                    $p_descricao = $row["descricao"];
                                    $p_local = $row["local"];
                                    $p_data = $row["data"];


                                    // Texto original com quebras de linha
                                    $texto_original2 = $p_descricao;

                                    // Substituir \n por <br>
                                    $texto_formatado2 = nl2br(htmlspecialchars($texto_original2)); // Use nl2br para manter as quebras de linha e htmlspecialchars para escapar caracteres especiais HTML
                            

                                    // Consulta SQL para obter os dados desejados
                                    $sql2 = "SELECT * FROM projects_images WHERE id_project = $p_id";

                                    $result2 = mysqli_query($conn, $sql2);

                                    $totalRows = mysqli_num_rows($result2);


                                    echo '
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                        
                                    <div class="card card-blog card-plain">
                                        <div class="position-relative">
                                            <a class="d-block shadow-xl border-radius-xl">
                                                <img src="' . $p_imagem . '" alt="img-blur-shadow"
                                                    class="img-fluid shadow rounded-sm border-radius-xl w-100" style="height: 12.5vw;">
                                            </a>
                                        </div>
                                        <div class="card-body px-1 pb-0">
                                            <p class="text-gradient text-dark mb-2 text-sm">' . $p_local . '</p>
                                                <h5>
                                                    ' . $p_nome . '
                                                </h5>
                                                <p class="mb-4 text-sm" style="height: 63px;">
                                                ' . $p_sinopse . '
                                            </p>

                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="w-100">
                                                    <button type="button"
                                                        class="btn btn-outline-primary btn-sm w-100 d-flex justify-content-center text-center mb-0"
                                                        data-bs-toggle="modal" data-bs-target="#modal-default' . $count . '">Ver
                                                        Mais</button>

                                                        
                                                    <div class="modal fade" id="modal-default' . $count . '" tabindex="-1"
                                                    role="dialog" aria-labelledby="modal-default' . $count . '"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">

                                                        <div class="modal-body">

                                                        <div class="row">
                                                            <div class="mx-auto">
                                                                
                                                            <!-- Main Carousel -->
    <div id="carousel' . $count . '" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">';

                                    if (mysqli_num_rows($result2) > 0) {
                                        $isActive = true; // For setting the first item as active
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            $pi_imagem = $row2["image"];

                                            echo '
                                                        <div class="carousel-item ' . ($isActive ? 'active' : '') . '">
                                                            <img src="' . $pi_imagem . '" class="d-block rounded" class="d-block rounded"
                                                            style="margin-left: 2.5%; width:95%; height: 25em;" alt="...">
                                                        </div>';

                                            $isActive = false; // Set to false after the first item
                                        }
                                    }

                                    echo '
                                                                    </div>
                                                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel' . $count . '" data-bs-slide="prev">
                                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                        <span class="visually-hidden">Previous</span>
                                                                    </button>
                                                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel' . $count . '" data-bs-slide="next">
                                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                        <span class="visually-hidden">Next</span>
                                                                    </button>
                                                                </div>

                                                                <div class="text-justify mt-4"
                                                                style="width: 95%; margin-left: 2.5%;">
                                                                <h1 class="title">' . $p_nome . '</h1>
                                                                <p>' . $texto_formatado2 . '</p>

                                                                <div
                                                                    class="mt-4 d-inline-flex align-items-center text-dark">
                                                                    <i class="mb-0 ni ni-send me-2"></i>

                                                                    <dt class="mb-0 me-2">País:
                                                                    </dt>
                                                                    <p class="mb-0 me-2">' . $p_local . '</p>
                                                                </div>
                                                                <br>
                                                                <div
                                                                    class="mt-2 mb-4 d-inline-flex align-items-center text-dark">
                                                                    <i
                                                                        class="mb-0 ni ni-watch-time me-2"></i>

                                                                    <dt class="mb-0 me-2"> Data: </dt>
                                                                    <p class="mb-0 me-2">' . $p_data . '</p>
                                                                </div>

                                                            </div>


                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                                
                                        ';


                                    if ($count % 4 == 0) {
                                        echo '<span class="w-100 mt-5"></span>';
                                    }

                                    $count++;



                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>