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

                $result = $controller->getProjects($id);

                // Verifica se a consulta retornou resultados
                if (!empty($result)) {  // Verifica se $result não está vazio

                    // Exibindo os dados encontrados
                    foreach ($result as $row) {
                        $p_id = $row["id"];
                        $p_nome = $row["nome"];
                        $p_userId = $row["Event"];
                        $p_bookingUserId = $row["Booking"];
                        $p_imagem = $row["imagem"];
                        $p_sinopse = $row["sinopse"];
                        $p_descricao = $row["descricao"];
                        $p_local = $row["local"];
                        $p_data = $row["data"];
                        $p_like = $controller->getVerifyUserLike($p_id);

                        //$p_comments;
                        //$p_userlike;


                        // Converte a string de data para um objeto DateTime
                        $date = new DateTime($p_data);

                        // Formata a data no formato desejado
                        $p_data = $date->format('d/m/Y');

                        // Texto original com quebras de linha
                        $texto_original2 = $p_descricao;

                        // Substituir \n por <br>
                        $texto_formatado2 = nl2br(htmlspecialchars($texto_original2)); // Use nl2br para manter as quebras de linha e htmlspecialchars para escapar caracteres especiais HTML

                        $p_bookingUserName = $controller->getAccountByDirectory($p_bookingUserId);

                        $comentarios = $controller->getCommentsByProject($p_id);

                        if ($p_bookingUserName) {
                            $p_bookingUserName = $p_bookingUserName['name'];
                        }



                        echo '
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        
                    <div class="card card-blog card-plain">
                        <div class="position-relative">
                            <a class="d-block shadow-xl border-radius-xl">
                                <img src="http://localhost/redes/public/users/' . $id . '/' . $p_imagem . '" alt="img-blur-shadow"
                                    class="img-fluid shadow rounded-sm border-radius-xl w-100" style="object-fit: cover; background-position-y: 50%; height: 12.5vw;">
                            </a>
                        </div>
                        <div class="card-body px-1 pb-0">
                            <p class="text-gradient text-dark mb-2 text-sm">' . $p_local . '</p>';

                        if ($p_local != "") {
                            echo '<div style="height: 95px;">';
                        } else {
                            echo '<div style="height: 116px;">';
                        }

                        echo '
                                <h5>
                                    ' . $p_nome . '
                                </h5>
                                <p class="mb-4 text-sm text-justify" style="height: 40px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"">
                                ' . $p_descricao . '
                            </p>
                        </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="w-100">
                                    <button type="button"
                                        class="btn bg-gradient-primary btn-sm w-100 d-flex justify-content-center text-center mb-0"
                                        data-bs-toggle="modal" onclick="updateDataProjetos(' . $p_id . ', ' . $count . ')" data-bs-target="#modal-default' . $count . '">Ver
                                        Mais</button>

                                        ';

                        include('../src/Views/Users/PerfilProjetosEditar.php');



                        echo '
                                    
                                    <div class="modal fade" id="modal-default' . $count . '" tabindex="-1"
                                    role="dialog" aria-labelledby="modal-default' . $count . '"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">

                                        <div class="modal-body p-0" style="height: 550px;" id="projectContainer' . $count . '">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>';


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