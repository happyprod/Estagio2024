<div class="col-12 col-xl-4">
    <div class="card h-100">
        <div class="card-header pb-0 p-3 d-flex justify-content-between">
            <h6 class="mb-0">Avaliações</h6>

            <?php

$ratings = $controller->getRatings($id);

if (count($ratings) != 0)
{
    echo '<!-- Button trigger modal -->
            <button type="button" class="btn btn-link btn-block pe-3 ps-0 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModalLong" style="margin-top: -0.3em;">
                Ver mais
            </button>';
}
                

            ?>
            
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Avaliações</h5>
                        <button type="button" class="btn-close text-dark" style="font-size: 1.5em; margin-top: -0.7em;" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <ul class="list-group">

                            <?php


                            // Verifica se a consulta retornou resultados
                            if (count($ratings) > 0) {  // Use PDO method to check rows
                                // Exibindo os dados encontrados
                                foreach ($ratings as $row) {

                                    // Exibir apenas os primeiros 5 registros
                                    $av_estrelas = $row["stars"];
                                    $av_comentario = $row["comentario"];

                                    // Texto original com quebras de linha
                                    $texto_original3 = $av_comentario;

                                    // Substituir \n por <br>
                                    $texto_formatado3 = nl2br(htmlspecialchars($texto_original3)); // Use nl2br para manter as quebras de linha e htmlspecialchars para escapar caracteres especiais HTML

                                    $av_data = $row["date"];
                                    $av_foto = $row["picture"];
                                    $av_nome = '@' . $row["name"];
                                    $av_user = $row["id"];

                                    // Obtém a extensão do arquivo em letras minúsculas
                                    $extension2 = strtolower(pathinfo($av_foto, PATHINFO_EXTENSION));

                                    // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
                                    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

                                    // Verifica se a extensão está na lista de extensões permitidas
                                    if (in_array($extension2, $allowed_extensions)) {
                                        $google_image2 = false;
                                    } else {
                                        $google_image2 = true;
                                    }


                                    echo '
                                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                                <div class="avatar me-3 d-flex justify-content-center mb-auto">
                                                <img ';

                                    if ($google_image2 == false) {
                                        echo 'src="http://localhost/Estagio2024/public/users/' . $av_user . '/' . $av_foto . '"';
                                    } else {
                                        echo 'src="' . $av_foto . '"';
                                    }
                                    echo ' alt="kal" class="border-radius-lg img-fluid shadow-sm" style="height: 50px; witdh: 50px;  object-fit: cover;">
                                            </div>
                                            <div
                                            class="d-flex align-items-start flex-column justify-content-center w-80">
                                            <h6 class="mb-0 text-md">' . $av_nome . '<span
                                            class="ms-1 date font-weight-light text-xxs">' . $av_data . '</span>
                                            </h6>
                                            <p class="mb-0 text-sm w-95 text-justify" id="texto">';
                                                // Dividir o texto em duas partes: curto e completo
                                                $texto_curto = substr($texto_formatado3, 0, 150); // Ajuste o comprimento do texto curto conforme necessário
                                                
                                                if ($texto_formatado3 != $texto_curto)
                                                {
                                                    echo '  <div class="text-container">
                                                                <span class="short-text text-justify" id="shortText">' . $texto_curto . '...</span>
                                                                <p class="more-text d-none text-justify" id="moreText">' . $texto_formatado3 . '</p>
                                                                <span class="text-primary" style="cursor: pointer;" onclick="toggleText(this)">Ver Mais</span>
                                                            </div>';
                                                } else {
                                                    echo '  <div class="text-container">
                                                                <p class="short-text" id="shortText">' . $texto_curto . '</p>
                                                            </div>';
                                                }
                                            echo '</p>
                                            </div>
                                            <h5 class="text-lg pe-4 me-3 ps-0 mb-0 ms-auto mt-3 mb-auto">' . $av_estrelas . '<i type="button"
                                            class="fa fa-star border-0 ms-1 text-sm position-absolute"
                                            style="background-color: rgba(255, 238, 0, 0); color: #ffcb0c; margin-top: 0.12em;"></i>
                                            </h5>
                                            </li>
                                        ';
                                }
                            } else {
                                echo '<p class="text-sm">Sem avaliações disponiveis.</p>';
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-3 pt-0">
            <ul class="list-group reviews">

                <?php


                $ratings = $controller->getRatingsAccounts($id);

                // Verifica se a consulta retornou resultados
                if (count($ratings) > 0) {  // Use PDO method to check rows
                    $count = 0;

                    // Exibindo os dados encontrados
                    foreach ($ratings as $row) {
                        // Exibir apenas os primeiros 5 registros
                        if ($count < 5) {
                            $av_estrelas = $row["stars"];
                            $av_comentario = $row["comentario"];
                            $av_foto = $row["picture"];
                            $av_nome = '@' . $row["name"];
                            $av_user = $row["id"];



                            // Obtém a extensão do arquivo em letras minúsculas
                            $extension2 = strtolower(pathinfo($av_foto, PATHINFO_EXTENSION));

                            // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
                            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

                            // Verifica se a extensão está na lista de extensões permitidas
                            if (in_array($extension2, $allowed_extensions)) {
                                $google_image2 = false;
                            } else {
                                $google_image2 = true;
                            }

                            echo '
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2" >
                                        <div class="avatar me-3">
                                            <img ';

                            if ($google_image2 == false) {
                                echo 'src="http://localhost/Estagio2024/public/users/' . $av_user . '/' . $av_foto . '"';
                            } else {
                                echo 'src="' . $av_foto . '"';
                            }
                            echo 'alt="kal"
                                            style="height: 50px; witdh: 50px; object-fit: cover;"    class="border-radius-lg img-fluid shadow-sm">
                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">' . $av_nome . '</h6>
                                            <p class="mb-0 text-xs comentario_avaliacao" style="width: 14em;">' . $av_comentario . '</p>
                                        </div>
                                        <h5 class="text-lg pe-4 me-3 ps-0 mb-0 ms-auto">' . $av_estrelas . '<i type="button"
                                                class="fa fa-star border-0 ms-1 text-sm position-absolute"
                                                style="background-color: rgba(255, 238, 0, 0); color: #ffcb0c; margin-top: 0.12em;"></i>
                                        </h5>
                                    </li>
                                    ';



                            $count++;
                        } else {
                            // Se já exibiu os 5 registros, interrompe o loop
                            break;
                        }
                    }
                } else {
                    echo '<p class="text-sm">Sem avaliações disponiveis.</p>';
                }



                ?>
            </ul>
        </div>
    </div>
</div>