<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Salario estimado</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/perfil.css">
    <script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>
</head>

<body>

    <section class="menu">
        <ul>
            <a href="">
                <li>
                    Pagina Principal
                </li>
            </a>
            <span></span>

            <a href="">
                <li>
                    Horarios
                </li>
            </a>
            <span></span>

            <a href="">
                <li>
                    Estimativa de salario
                </li>
            </a>
            <span></span>

            <a href="">
                <li>
                    Area de serviço perto de si
                </li>
            </a>
            <span></span>

            <a href="">
                <li>
                    Descanso
                </li>
            </a>
            <span></span>

            <a href="">
                <li>
                    Planear uma rota
                </li>
            </a>
            <span></span>

            <a href="">
                <li>
                    Estatisticas
                </li>
            </a>
            <span></span>

            <a href="">
                <li>
                    Perfil
                </li>
            </a>
            <span></span>

            <a href="">
                <li>
                    Amigos
                </li>
            </a>
            <span></span>

            <a href="">
                <li>
                    Suporte
                </li>
            </a>

        </ul>
    </section>

    <section class="perfil">

        <div class="exibirperfil">

            <span id="bgexibirperfil"></span>
            <?php
            session_start();
            $email = $_COOKIE['email'];

            $servername = "localhost";
            $database = "yazaki_p1";
            $username = "root";
            $password = "";

            $conn = mysqli_connect($servername, $username, $password, $database);


            $query = "SELECT nome, fotop, ativacao_data, datalimite, descricao FROM login WHERE email = '$email'";
            $result = mysqli_query($conn, $query);

            // verifique se a consulta teve sucesso
            if ($result) {
                // percorra todos os resultados da consulta e adicione-os à combobox
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<img src='" . $row['fotop'] . "'>";
                    echo "<h1>" . $row['nome'] . "</h1>";

                    if ($row['descricao'] == "") {
                        $descricao = "Sem descrição...";
                    } else {
                        $descricao = $row['descricao'];
                    }

                    echo "<h3> Descrição </h3>";
                    echo "<p> " . $descricao . " </p>";
                    echo "<h5> Data de ativação: " . $row['ativacao_data'] . "</h5>";
                    echo "<h5> Data de renovação: " . $row['datalimite'] . "</h5>";
                }
            }
            ?>
        </div>

        <div class="botoes">

            <button class="open-button1" onclick="openForm1()">Alterar palavra-passe</button>
            <button class="open-button2" onclick="openForm2()">Editar perfil</button>
            <button class="open-button3" onclick="openForm3()">Excluir o plano</button>
            <button class="open-button4" onclick="openForm4()">Exlcuir conta</button>



            <div class="form-popup1" id="myForm1">
                <form action="./pop_ups/perfil_pop1.php" method="POST" autocomplete="off" class="form-container1">
                    <h1>Alterar palavra passe</h1>
                    <label for="current-password"><b>Palavra-passe atual</b></label>
                    <input type="password" placeholder="Digite a palavra-passe atual" class="current-password" name="current-password" required>
                    <p>Caso tenha feito login com conta email, digite "email".</p>

                    <label for="new-password"><b>Nova palavra passe</b></label>
                    <input type="password" placeholder="Digite a nova palavra-passe" name="new-password" required>

                    <label for="confirm-password"><b>Digite a palavra passe nova outra vez  </b></label>
                    <input type="password" placeholder="Repita a nova palavra-passe" name="confirm-password" required>

                    <button type="button" class="btn cancel1" onclick="closeForm1()">Cancelar</button>
                    <button type="submit" class="btn1">Salvar</button>
                </form>
            </div>


            <div class="form-popup2" id="myForm2">
                <form action="./pop_ups/perfil_pop2.php" method="POST" autocomplete="off" class="form-container2">
                    <h1>O que pretende alterar?</h1>
                    <label for="name"><b>Nome</b></label>
                    <input type="text" placeholder="Digite o seu nome" name="name">

                    <label for="description"><b>Descrição</b></label>
                    <input type="text" placeholder="Digite a descrição do seu perfil" name="description">

                    <label for="profile-pic"><b>Foto de Perfil</b></label>
                    <input type="file" name="profile-pic">


                    <button type="button" class="btn cancel2" onclick="closeForm2()">Cancelar</button>
                    <button type="submit" class="btn2">Salvar</button>
                    <p>Altere apenas o que deseja mudar</p>

                </form>
            </div>

            <div class="form-popup3" id="myForm3">
                <form action="./pop_ups/perfil_pop3.php" method="POST" autocomplete="off" class="form-container3">
                    <div id="confirmacao3">
                        <h1>Deseja excluir o seu plano?</h1>
                        <p>Esta ação é irreversível, por favor leia <a href="">os riscos da sua conta</a> antes de
                            proceder à exclusão.</p>
                        <button type="button" class="btn3" onclick="prosseguirForm3()">Salvar</button>
                        <button type="button" class="btn cancel3" onclick="closeForm3()">Cancelar</button>
                    </div>

                    <div id="finish3">
                        <label id="passatual" for="passatual"><b>Palavra-passe</b></label>
                        <input type="text" placeholder="Digite a palavra-passe" name="passatual" required>
                        <button type="submit" id="submit" class="btn3">Remover plano</button>
                        <button type="button" id="cancel3" class="btn cancel3" onclick="closeForm3()">Cancelar</button>
                        <p>Caso tenha feito login com a conta email, digite "email".</p>
                    </div>
                </form>
            </div>

            <div class="form-popup4" id="myForm4">
                <form action="./pop_ups/perfil_pop4.php" method="POST" autocomplete="off" class="form-container4">
                    <div id="confirmacao4">
                        <h1>Deseja excluir a sua conta?</h1>
                        <p>Esta ação é irreversível, por favor leia <a href="">os riscos da sua conta</a> antes de
                            proceder à exclusão.</p>
                        <button type="button" class="btn4" onclick="prosseguirForm4()">Salvar</button>
                        <button type="button" class="btn cancel4" onclick="closeForm4()">Cancelar</button>
                    </div>

                    <div id="finish4">
                        <label id="passatual" for="passatual"><b>Palavra-passe</b></label>
                        <input type="text" placeholder="Digite a palavra-passe" name="passatual" required>
                        <button type="submit" id="submit4" class="btn4">Remover conta</button>
                        <button type="button" id="cancel4" class="btn cancel4" onclick="closeForm4()">Cancelar</button>
                        <p>Caso tenha feito login com a conta email, digite "email".</p>
                    </div>
                </form>
            </div>
    </section>

    <script>
        function openForm1() {
            document.getElementById("myForm1").style.display = "flex";
        }

        function closeForm1() {
            document.getElementById("myForm1").style.display = "none";
        }

        function openForm2() {
            document.getElementById("myForm2").style.display = "flex";
        }

        function closeForm2() {
            document.getElementById("myForm2").style.display = "none";
        }

        function openForm3() {
            document.getElementById("myForm3").style.display = "flex";
            document.getElementById("confirmacao3").style.display = "block";
            document.getElementById("finish3").style.display = "none";
        }

        function closeForm3() {
            document.getElementById("myForm3").style.display = "none";
        }

        function prosseguirForm3() {
            document.getElementById("confirmacao3").style.display = "none";
            document.getElementById("finish3").style.display = "flex";
        }

        function openForm4() {
            document.getElementById("myForm4").style.display = "flex";
            document.getElementById("confirmacao4").style.display = "block";
            document.getElementById("finish4").style.display = "none";
        }

        function closeForm4() {
            document.getElementById("myForm4").style.display = "none";
        }

        function prosseguirForm4() {
            document.getElementById("confirmacao4").style.display = "none";
            document.getElementById("finish4").style.display = "flex";
        }
    </script>


</body>

</html>