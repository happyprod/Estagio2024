<div class="d-none w-90 mx-auto" id="ver_perfil">
            <div class="row mt-4">
                <div class="col-12 col-xl-7">
                    <?php
                    if ($fotodecapa == null) {
                        echo '<img src="../public/assets/img/curved-images/curved0.jpg" class="w-100 border-radius-lg img-fluid shadow-sm"';
                    } else {
                        echo '<img src="./' . $fotodecapa . '" class="w-100 border-radius-lg img-fluid shadow-sm"';
                    }
                    ?>>

                    <button type="button" class="btn bg-gradient-primary mt-3 w-100">Alterar foto de
                        capa</button>
                </div>


                <div class="col-12 col-xl-1">
                </div>

                <div class="col-12 col-xl-4">
                    <div class="position-relative">
                        <img <?php

                                // Obtém a extensão do arquivo em letras minúsculas
                                $extension = strtolower(pathinfo($fotodeperfil, PATHINFO_EXTENSION));

                                // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
                                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

                                // Verifica se a extensão está na lista de extensões permitidas
                                if (in_array($extension, $allowed_extensions)) {
                                    $google_image = false;
                                } else {
                                    $google_image = true;
                                }


                                if ($google_image == false) {
                                    echo 'src="../public/utilizador/' . $id . '/' . $fotodeperfil . '"';
                                } else {
                                    echo 'src="' . $fotodeperfil . '"';
                                }
                                ?> alt="profile_image" class="w-100 border-radius-lg img-fluid shadow-sm">
                    </div>

                    <button type="button" class="btn bg-gradient-primary mt-3 w-100">Alterar foto de Perfil
                    </button>
                </div>
            </div>
        </div>
