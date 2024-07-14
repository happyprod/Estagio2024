<?php

$instagram_url = $row_infos["Instagram"];
$instagram_url = 'https://www.instagram.com/' . $instagram_url . '/';

$youtube_url = $row_infos["Youtube"];
$youtube_url = 'https://www.youtube.com/' . $youtube_url;

$tiktok_url = $row_infos["Tiktok"];
$tiktok_url = 'https://www.tiktok.com/@' . $tiktok_url;

$blog_url = $row_infos["Blog"];

$instagram_on = $row_infos["Active_Instagram"];
$youtube_on = $row_infos["Active_Youtube"];
$tiktok_on = $row_infos["Active_Tiktok"];
$blog_on = $row_infos["Active_Blog"];


// Verificar se o URL não começa com 'http://' ou 'https://', e adicioná-lo se necessário
if (!preg_match("~^(?:f|ht)tps?://~i", $blog_url)) {
    $blog_url = 'http://' . $blog_url;
}

?>

<div class="col-12 col-xl-4">
    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center w-100 justify-content-between">
                    <h6 class="mb-0">Sobre</h6>
                    <?php if ($sobre != '') {
                        echo '<button type="button" id="verMaisBtn" onclick="openModal()" class="btn btn-link btn-block pe-3 ps-0 mb-0" data-bs-toggle="modal" data-bs-target="#modal-vermais" style="display: block;">
                        Ver mais
                    </button>';
                    }
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-vermais" tabindex="-1" role="dialog" aria-labelledby="modalVerMaisTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalVerMaisTitle">Sobre</h5>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="d-flex justify-content-center text-center">
                                        <div class="text-center mt-4">
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
                                                        echo 'src="http://localhost/ConcertPulse/public/users/' . $id . '/' . $fotodeperfil . '"';
                                                    } else {
                                                        echo 'src="' . $fotodeperfil . '"';
                                                    }
                                                    ?> alt="profile_image" style="width: 150px; height: 150px; object-fit: cover;" class="border-radius-lg img-fluid shadow-sm mb-3">

                                            <div class="mb-3">
                                                <h5 class="mb-1">
                                                    <?php echo $nome; ?>
                                                </h5>
                                                <p class="mb-0 font-weight-bold text-sm">
                                                    <?php echo $identidade; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-body p-3">
                                        <p class="text-sm text-justify">
                                            <?php
                                            // Texto original com quebras de linha
                                            $texto_original = $sobre;

                                            // Substituir \n por <br>
                                            $texto_formatado = nl2br(htmlspecialchars($texto_original)); // Use nl2br para manter as quebras de linha e htmlspecialchars para escapar caracteres especiais HTML

                                            // Exibir o texto formatado
                                            if ($texto_formatado != '') {
                                                echo $texto_formatado;
                                            } else {
                                                echo 'Não sabemos muito sobre ' . $nome . ' mas acreditamos seja uma boa pessoa!';
                                            }
                                            ?>
                                        </p>

                                        <ul class="list-group " style="margin-top: 4em;">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                                <strong class="text-dark">Nome:</strong>
                                                &nbsp; 
                                                <?php 
                                                    echo $helper->validateAbout($nome);
                                                ?>
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm">
                                                <strong class="text-dark">Número:</strong> &nbsp;
                                                <?php
                                                    echo $helper->validateAbout($numero);
                                                ?>
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm">
                                                <strong class="text-dark">Email:</strong> &nbsp;
                                                <?php
                                                    echo $helper->validateAbout($email);
                                                ?>
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm">
                                                <strong class="text-dark">País:</strong>
                                                &nbsp;
                                                <?php
                                                    echo $helper->validateAbout($localizacao);
                                                ?>
                                            </li>
                                            <li class="list-group-item border-0 ps-0 pb-0">
                                                <strong class="text-dark text-sm">Redes Sociais:</strong> &nbsp;

                                                <?php
                                                if (($tiktok_on == 0 || $tiktok_url == null) && ($instagram_on == 0 || $instagram_url == null) && ($youtube_on == 0 || $youtube_url == null) && ($blog_on == 0 || $blog_url == null)) {
                                                    echo '<p class="d-inline text-sm">Não especificado</p>';
                                                } else {
                                                    if ($instagram_url != null && $instagram_on == 1) {
                                                        echo '<a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="' . $instagram_url . '" target="_blank"> <i class="fab fa-instagram fa-lg"></i></a>';
                                                    }

                                                    if ($youtube_url != null && $youtube_on == 1) {
                                                        echo '<a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="' . $youtube_url . '" target="_blank"> <i class="fab fa-youtube fa-lg"></i></a>';
                                                    }

                                                    if ($tiktok_url != null && $tiktok_on == 1) {
                                                        echo '<a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="' . $tiktok_url . '" target="_blank"> <i class="fab fa-tiktok fa-lg"></i></a>';
                                                    }

                                                    if ($blog_url != null && $blog_on == 1) {
                                                        echo '<a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="' . $blog_url . '" target="_blank"> <i class="fa fa-window-restore fa-lg"></i></a>';
                                                    }
                                                }
                                                ?>

                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <div id="textoDiv" style="height: 8.15em; overflow: hidden;">
                <p class="text-sm text-justify">
                    <?php
                    // Texto original com quebras de linha
                    $texto_original = $sobre;

                    // Substituir \n por <br> e escapar caracteres especiais HTML
                    $texto_formatado = nl2br(htmlspecialchars($texto_original));

                    // Remover espaços em branco do início e do final da string
                    $texto_sem_espacos = trim($texto_formatado);

                    // Exibir o texto formatado
                    if ($texto_sem_espacos != '') {
                        echo $texto_formatado;
                    } else {
                        echo 'Não sabemos muito sobre @' . $nome . ' mas acreditamos que seja uma boa pessoa!';
                    }

                    ?>
                </p>
            </div>

            <ul class="list-group " style="margin-top: 1em;">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nome:</strong>
                    &nbsp; <?php echo $nome; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Número:</strong>
                    &nbsp; 
                    <?php
                        echo $helper->validateAbout($numero);
                    ?>
                </li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong>
                    &nbsp;
                    <?php
                        echo $helper->validateAbout($email); 
                    ?>
                </li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Localização:</strong>
                    &nbsp;
                    <?php
                        echo $helper->validateAbout($localizacao);
                    ?>
                </li>
                <li class="list-group-item border-0 ps-0 pb-0">
                    <strong class="text-dark text-sm">Redes Sociais:</strong> &nbsp;

                    <?php
                    if (($tiktok_on == 0 || $tiktok_url == null) && ($instagram_on == 0 || $instagram_url == null) && ($youtube_on == 0 || $youtube_url == null) && ($blog_on == 0 || $blog_url == null)) {
                        echo '<p class="d-inline text-sm">Não especificado</p>';
                    } else {
                        if ($instagram_url != null && $instagram_on == 1) {
                            echo '<a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="' . $instagram_url . '" target="_blank"> <i class="fab fa-instagram fa-lg"></i></a>';
                        }

                        if ($youtube_url != null && $youtube_on == 1) {
                            echo '<a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="' . $youtube_url . '" target="_blank"> <i class="fab fa-youtube fa-lg"></i></a>';
                        }

                        if ($tiktok_url != null && $tiktok_on == 1) {
                            echo '<a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="' . $tiktok_url . '" target="_blank"> <i class="fab fa-tiktok fa-lg"></i></a>';
                        }

                        if ($blog_url != null && $blog_on == 1) {
                            echo '<a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="' . $blog_url . '" target="_blank"> <i class="fa fa-window-restore fa-lg"></i></a>';
                        }
                    }
                    ?>

                </li>
            </ul>
        </div>
    </div>
</div>