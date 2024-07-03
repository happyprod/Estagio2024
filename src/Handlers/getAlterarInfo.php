<?php

require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\UserController;
use App\Models\User;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// Cria instâncias do modelo e do controlador
$model = new User($db);
$controller = new UserController($model);

// Verifica se as variáveis foram passadas na requisição
if (isset($_GET['var1']) && isset($_GET['var2']) && isset($_GET['var3'])) {
    // Recupera os valores das variáveis   ...... configurar o js 
    $count = $_GET['var1'];
    $id = $_GET['var2'];
    $p_id = $_GET['var3'];
} else {
    // Se as variáveis não foram passadas, retorne um erro ou uma mensagem adequada
    echo "Erro: Variáveis não foram passadas na requisição.";
}


function verificarcheck($coluna)
{
    if ($coluna == 1)
    {
        $active = 'checked=""';
    } else {
        $active = '';
    }

    return $active;
}

// Obtém os dados
$data = $controller->getEditarInfoProjects($count, $p_id);
$data2 = $controller->getEditarInfoProjectsCollabs($count, $p_id);


$collabshtml = ''; // Mova esta linha para fora do loop foreach

foreach ($data2 as $row2) {
    $c_nome = htmlspecialchars($row2->name);
    $c_picture = htmlspecialchars($row2->picture);
    $c_idName = htmlspecialchars($row2->idName);

    // Remova a declaração de $collabshtml daqui

    $collabshtml .= '  
                <li class="list-group-item pt-0 pb-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <img src="' . $c_picture . '" alt="" class="avatar rounded-circle my-auto" style="width: 45px; height: 45px;">
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0 text-sm">' . $c_nome . '</h6>
                            <p class="mb-0 text-muted text-xs" id="idNameUser" >' . $c_idName . '</p>
                        </div>
                        <div class="flex-shrink-0 text-end">
                            <button class="btn btn-xxs my-auto btn-danger" onclick="removerNome(this, event)">Remover</button>
                        </div>
                    </div>
                </li>';

                echo '<script>
                numUsuarios++; 
                console.log("tao aqui " + numUsuarios + "ok");
                </script>';
}



// Gera o HTML
$html = '';
foreach ($data as $row) {
    $p_nome = htmlspecialchars($row->nome);
    $p_local = htmlspecialchars($row->local);
    $p_data = htmlspecialchars($row->data);
    $p_descricao = htmlspecialchars($row->descricao);
    $p_booking = htmlspecialchars($row->Booking);
    $p_evento = htmlspecialchars($row->Event);   
    

    $html .= '  
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Nome do evento</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="' . $p_nome . '" placeholder="' . $p_nome . '" required>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <div class="row" style="height: 2em;">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Identificação do
                                Evento</label>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" id="eventoInput" placeholder="' . $p_evento . '" value="' . $p_evento . '" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        </div>

        <div class="form-group">
        <label class="title" style="font-size: 16px;" for="exampleFormControlTextarea1">Descrição</label>
        <textarea placeholder="Adicione a descrição do seu projeto." class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 295px;">' . $p_descricao . '</textarea>
        </div>

        <div class="row" style="margin-top: 2em;">
        <div class="col-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label class="title" style="font-size: 16px;" for="exampleFormControlTextarea1">Data</label>
                    </div>
                </div>
                <input class="form-control" type="date" value="' . $p_data . '" id="example-date-input">
            </div>
        </div>

        <div class="col-6">

            <div class="form-group">
                <div class="row" style="height: 2.1em;">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Empresa de Booking</label>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" id="bookinginput" value="' . $p_booking . '" placeholder="sonssemtransito" aria-label="TomorrowlandOfficial" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        </div>

        <!-- promotores envolvidos, uma caixa de texto onde sera possivel escrever o @ do promotor e em baixo será possivel ver as pessoas com um @ semelhante, caso nao exista será exibido alguma mensagem de erro-->

        <!-- Localização -->


        <div class="border-top mt-4 w-85 mx-auto" style="opacity: 50%; margin-bottom: 2.2em;">
        </div>

        <div class="row mt-3">
        <div class="col-6">
            <div class="">
                <div class="row" style="height: 2.1em;">

                    <div class="col-12">
                        <div class="form-group">
                            <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Localização</label>
                        </div>
                    </div>
                </div>
                <input type="text" id="endereco" class="form-control mb-1" value="' . $p_local . '" placeholder="Lisboa">
                <div id="mapa" class="mt-3 rounded" style="height: 300px;"></div>
            </div>
        </div>

        <div class="col-6">
            <div class="row" style="height: 1.975em;">
                <div class="col-12">
                    <div class="form-group">
                        <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Colaboradores</label>
                    </div>
                </div>
            </div>


            <div class="input-group mb-3">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Promotor/Organizador" oninput="colaboradoresComplete()" aria-label="Promotor/Organizador" aria-describedby="button-addon2" id="email" name="email" style="border-radius: 0em !important;" list="emails">
                    <datalist id="emails"></datalist>                    
                    <button class="btn btn-outline-primary mb-0" type="button" id="btnAdicionar">Adicionar</button>
                </div>
            </div>


            <div class="row" id="boxcomnomes">
                <div class="col-xl-12 mb-3 mb-lg-5">
                    <div class="card">
                        <div id="listaNomes" class="overflow-auto p-3" style="max-height: 300px;">' . $collabshtml . '
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
';
}


// Retorna o HTML
echo $html;

if ($collabshtml == '') {
    echo '
    <script> 
        document.getElementById("boxcomnomes").classList.add("d-none");
    </script>';
}

