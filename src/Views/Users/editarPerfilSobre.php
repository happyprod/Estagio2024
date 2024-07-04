<div class="form-group" id="ver_sobre">
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" id="cover-photo-container"
        <?php if ($fotodecapa == null) {
            echo 'style="background-image: url(\'../../public/assets/img/curved-images/curved0.jpg\'); background-position-y: 50%;"';
        } else {
            echo 'style="background-image: url(\'http://localhost/Estagio2024/public/users/' . $id . '/' . $fotodecapa . ' \'); background-position-y: 50%;"';
        } ?>>
        <div class="cover-overlay w-100" onclick="uploadCoverImage()">
            <img id="nome_arquivo" src="http://localhost/Estagio2024/public/users/<?php echo $id . '/' . $fotodecapa; ?>" alt="cover_image" class="img-fluid w-100" style="height: 300px; object-fit: cover; cursor: pointer;" />
            <div class="cover-mask text-light d-flex justify-content-center flex-column text-center">
                <h4 style="color: white;">Carregue para Alterar a Imagem</h4>
            </div>
        </div>
    </div>
    <div class="row gx-4 mx-4 mt-n7">
        <div class="col-auto">
            <div class="position-relative">
                <div class="profile-overlay" onclick="uploadProfileImage()">
                    <img id="profile-image" <?php
                        $extension = strtolower(pathinfo($fotodeperfil, PATHINFO_EXTENSION));
                        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
                        if (in_array($extension, $allowed_extensions)) {
                            $google_image = false;
                        } else {
                            $google_image = true;
                        }
                        if ($google_image == false) {
                            echo 'src="http://localhost/Estagio2024/public/users/' . $id . '/' . $fotodeperfil . '"';
                        } else {
                            echo 'src="' . $fotodeperfil . '"';
                        }
                    ?> alt="profile_image" style="height: 150px; width: 150px; object-fit: cover; cursor: pointer;" class="img-fluid border-radius-lg shadow-sm" />
                    <div class="profile-mask text-light d-flex justify-content-center flex-column border-radius-lg text-center">
                        <h4 style="color: white;">Alterar Imagem</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <input type="file" id="coverFileInput" style="display:none;" onchange="displaySelectedImage(event, 'nome_arquivo')" />
    <input type="file" id="profileFileInput" style="display:none;" onchange="displaySelectedImage(event, 'profile-image')" />

    <div class="border-top w-85 mx-auto" style="margin-top: 2.5em; margin-bottom: 2.5em;"></div>


    <div class="ms-1 row">
        <div class="col-12 col-xl-6">
            <div class="card h-100 p-3 mb-2">
                <label for="example-text-input" class="col-auto col-form-label">Nome</label>
                <input class="form-control mb-4" type="text" placeholder="Simão Cruz" value="<?php echo $nome; ?>" id="TXTnome">

                <label for="example-text-input" class="col-auto col-form-label">Número</label>
                <input class="form-control mb-4" type="text" placeholder="913 123 123" value="<?php echo $numero; ?>"  id="TXTnumero">

                <label for="example-text-input" class="col-auto col-form-label">Email</label>
                <input class="form-control mb-4" type="text" placeholder="utilizador@gmail.com" value="<?php echo $email; ?>" id="TXTemail">

                <label for="example-text-input" class="col-auto col-form-label">Localização</label>
                <input class="form-control mb-4" type="text" placeholder="Amadora, Portugal" value="<?php echo $localizacao; ?>" id="TXTlocalizacao">

                <label for="example-text-input" class="col-auto col-form-label">Descrição</label>
                <textarea class="form-control" id="TXTdescricao" rows="3" placeholder="Escreva aqui a sua descrição." style="height: 22.5em; overflow-y: scroll; resize: none;"><?php echo $sobre; ?> </textarea>

            </div>
        </div>


        <div class="container-fluid col-6 col-xl-6">
            <div class="col-6 col-xl-12">
                <div class="card p-3">

                    <div class="row align-items-center form-group">
                        <label for="example-text-input" class="col-auto col-form-label">Youtube</label>
                        <div class="col">
                            <div class="form-check form-switch float-end">
                                <input class="form-check-input" type="checkbox" id="yt_switch" <?php echo $yt_check;?>>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3">www.youtube.com/@</span>
                            <input type="text" class="form-control" placeholder="Utilizador" value="<?php echo $youtube; ?>" id="youtube" aria-describedby="basic-addon3">
                        </div>
                    </div>

                    <div class="row align-items-center form-group">
                        <label for="example-text-input" class="col-auto col-form-label">Instagram</label>
                        <div class="col">
                            <div class="form-check form-switch float-end">
                                <input class="form-check-input" type="checkbox" id="ig_switch" <?php echo $ig_check;?>>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3">www.instagram.com/</span>
                            <input type="text" class="form-control" placeholder="Utilizador" value="<?php echo $instagram; ?>" id="instagram" aria-describedby="basic-addon3">
                        </div>
                    </div>

                    <div class="row align-items-center form-group">
                        <label for="example-text-input" class="col-auto col-form-label">Tiktok</label>
                        <div class="col">
                            <div class="form-check form-switch float-end">
                                <input class="form-check-input" type="checkbox" id="tiktok_switch" <?php echo $tiktok_check;?>>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3">www.tiktok.com/@</span>
                            <input type="text" class="form-control" placeholder="Utilizador" value="<?php echo $tiktok; ?>" id="tiktok" aria-describedby="basic-addon3">
                        </div>
                    </div>



                    <div class="row align-items-center form-group">
                        <label for="example-text-input" class="col-auto col-form-label">Blog Pessoal</label>
                        <div class="col">
                            <div class="form-check form-switch float-end">
                                <input class="form-check-input" type="checkbox" id="blog_switch" <?php echo $blog_check;?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="blog" value="<?php echo $blog; ?>" placeholder="www.exemplo.com">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="margin-top: 2em; width: 55%;">
            <div class="card card-body blur shadow-blur overflow-hidden">
                <div class="row mt-2">

                    <div class="col-6 text-center">
                        <a href="utilizadores/<?php echo $_SESSION['user_id'];?>.php" class="btn bg-gradient-danger w-90">Voltar</a>
                    </div>
                    <div class="col-6 text-center">
                        <button type="button" onclick="guardarEditarPerfil()" class="btn bg-gradient-success w-90">Confirmar</button>
                    </div>
                    <div style="margin-right: 4em;">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>