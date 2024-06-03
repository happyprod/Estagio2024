<div class="col-12 col-xl-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3 d-flex justify-content-between">
                        <h6 class="mb-0">Avaliações</h6>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-link btn-block pe-3 ps-0 mb-0" data-bs-toggle="modal"
                            data-bs-target="#exampleModalLong" style="margin-top: -0.3em;">
                            Ver mais
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Avaliações</h5>
                                        <button type="button" class="btn-close text-dark"
                                            style="font-size: 1.5em; margin-top: -0.7em;" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <ul class="list-group">




                                            <?php

                                            // Consulta SQL para obter os dados desejados
                                            $sql = "SELECT r.stars, r.date, r.comentario, a.picture, a.name 
        FROM rating AS r
        INNER JOIN accounts AS a ON r.id_send = a.id
        WHERE r.id_receive = $id";

                                            $result2 = mysqli_query($conn, $sql);

                                            // Verifica se a consulta retornou resultados
                                            if (mysqli_num_rows($result2) > 0) {
                                                // Exibindo os dados encontrados
                                                while ($row = mysqli_fetch_assoc($result2)) {

                                                    // Exibir apenas os primeiros 5 registros
                                                    $av_estrelas = $row["stars"];
                                                    $av_comentario = $row["comentario"];

                                                    // Texto original com quebras de linha
                                                    $texto_original3 = $av_comentario;

                                                    // Substituir \n por <br>
                                                    $texto_formatado3 = nl2br(htmlspecialchars($texto_original3)); // Use nl2br para manter as quebras de linha e htmlspecialchars para escapar caracteres especiais HTML
                                            

                                                    $av_data = $row["date"];
                                                    $av_foto = $row["picture"];
                                                    $av_nome = $row["name"];



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
                                                        echo 'src="../../utilizador/' . $id . '/' . $av_foto . '"';
                                                    } else {
                                                        echo 'src="' . $av_foto . '"';
                                                    }
                                                    echo ' alt="kal" class="border-radius-lg shadow" style="width: 3em;">
</div>
<div
class="d-flex align-items-start flex-column justify-content-center">
<h6 class="mb-0 text-sm">' . $av_nome . '<span
class="ms-1 date font-weight-light text-xs">' . $av_data . '</span>
</h6>
<p class="mb-0 text-sm w-95 text-justify">' . $texto_formatado3 . '</p>
</div>
<h5 class="text-lg pe-4 me-3 ps-0 mb-0 ms-auto">' . $av_estrelas . '<i type="button"
class="fa fa-star border-0 ms-1 text-sm position-absolute"
style="background-color: rgba(255, 238, 0, 0); color: #ffcb0c; margin-top: 0.12em;"></i>
</h5>
</li>



';





                                                }

                                            } else {
                                                echo "Nenhum resultado encontrado.";
                                            }



                                            ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-3" style="margin-top: -1em;">
                        <ul class="list-group">


                            <?php

                            // Consulta SQL para obter os dados desejados
                            $sql = "SELECT r.stars, r.comentario, a.picture, a.name 
                                        FROM rating AS r
                                        INNER JOIN accounts AS a ON r.id_send = a.id
                                        WHERE r.id_receive = $id";

                            $result = mysqli_query($conn, $sql);

                            // Verifica se a consulta retornou resultados
                            if (mysqli_num_rows($result) > 0) {
                                $count = 0;
                                // Exibindo os dados encontrados
                                while ($row = mysqli_fetch_assoc($result)) {

                                    // Exibir apenas os primeiros 5 registros
                                    if ($count < 5) {
                                        $av_estrelas = $row["stars"];
                                        $av_comentario = $row["comentario"];
                                        $av_foto = $row["picture"];
                                        $av_nome = $row["name"];



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
                                        <div class="avatar me-3">
                                            <img ';

                                        if ($google_image2 == false) {
                                            echo 'src="../../utilizador/' . $id . '/' . $av_foto . '"';
                                        } else {
                                            echo 'src="' . $av_foto . '"';
                                        }
                                        echo 'alt="kal"
                                                class="border-radius-lg shadow">
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
                                echo "Nenhum resultado encontrado.";
                            }



                            ?>



                        </ul>
                    </div>
                </div>
            </div>
