<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\ContractsController;
use App\Models\Contracts;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// Verifica se foi recebido o parâmetro 'id_name' via POST
if (isset($_GET['var1'])) {

    $opcao = $_GET['var1'];


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $id_user = $_SESSION['user_id'];

    // Cria instâncias do modelo e do controlador
    $model = new Contracts($db);
    $controller = new ContractsController($model);

    if ($opcao == 1) {
        $data = $controller->getPropostasNovas();
    } else if ($opcao == 2) {
        $data = $controller->getPropostasAceitas();
    } else if ($opcao == 3) {
        $data = $controller->getPropostasFeitas();
    }


    $html = '
                <div class="border-top mt-1 w-100 mx-auto"></div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase w-15 text-secondary text-xxs font-weight-bolder opacity-7">Utilizador</th>
                                        <th class="text-uppercase w-10 text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Função</th>
                                        <th class="text-center w-10 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Assunto</th>
                                        <th class="text-center w-10 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
                                        <th class="text-center w-5 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PDF</th>
                                        <th class="text-center w-10 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                    </tr>
                                </thead>
                            <tbody>';
    foreach ($data as $row) {
        $picture = htmlspecialchars($row->picture);
        $name = htmlspecialchars($row->name);
        $id_name = htmlspecialchars($row->id_name);
        $identity = htmlspecialchars($row->identity);
        $subject = htmlspecialchars($row->subject);
        $date = htmlspecialchars($row->date);
        $file = htmlspecialchars($row->file);

        if (htmlspecialchars($row->id_sender) == $id_user) {
            $id = htmlspecialchars($row->id_receive);
        } else {
            $id = htmlspecialchars($row->id_sender);
        }
        $id_contract = htmlspecialchars($row->id);

        // Ensure the date is a valid string before formatting
        if (is_string($date)) {
            // Use strtotime to convert the date string to a timestamp (optional)
            // This can help handle various date formats, but might not be necessary
            // if your date is already in a consistent format.
            $timestamp = strtotime($date);

            // Format the date in the desired dd/mm/yyyy format
            $date = date("d/m/Y", $timestamp);  // Use forward slashes for consistency

        } else {
            // Handle the case where $date is not a string (e.g., null)
            echo 'Invalid date format';  // Or provide a more informative message
        }

        $onclickMostrarAssunto = "'" . $subject . "'";

        $onclickMostrarAssunto = 'onclick="mostrarAssunto(' . $onclickMostrarAssunto . ')"';


        if ($identity == 1) {
            $identity = "Promotor";
        } else if ($identity == 2) {
            $identity = "Artista";
        } else if ($identity == 3) {
            $identity = "Agente de Booking";
        } else if ($identity == 4) {
            $identity = "Agencia de booking";
        } else {
            $identity = "Evento";
        }

        $html .= '  
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="http://localhost/Estagio2024/public/users/' . $id . '/' . $picture . '" class="avatar avatar-sm me-3" alt="user1">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="utilizadores/' . $id . '.php"><h6 style="max-width: 20ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" class="mb-0 text-sm" >@' . $id_name . '</h6></a>
                                    <p style="max-width: 20ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" class="text-xs text-secondary mb-0">' . $name . '</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p style="max-width: 20ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" class="text-xs font-weight-bold mb-0">' . $identity . '</p>
                        </td>

                        <td class="align-middle text-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#assuntoContract" ' . $onclickMostrarAssunto . ' class="btn text-xxs p-2 ps-3 pe-3 my-auto text-xs bg-gradient-secondary opacity-7">Ver assunto</button>
                        </td>
                        <td class="align-middle text-center">
                            <span style="max-width: 10ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" class="text-secondary text-xs font-weight-bold">' . $date . '</span>
                        </td>
                        <td class="align-middle text-center text-secondary opacity-8">
                            <button onclick="downloadFile(\'' . $file . '\', ' . $id . ')" class="btn btn-link text-dark text-xs mb-0 px-0">
                                <i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF
                            </button>
                        </td>';
        if ($opcao == 1) {
            $html .= '
                            <td class="align-middle text-center">
                                <button type="button" onclick="estadoContract(' . $id_contract . ', 2)" class="btn text-xxs my-auto me-2 p-2 ps-3 pe-3 bg-gradient-danger opacity-8">Recusar</button>
                                <button type="button" onclick="estadoContract(' . $id_contract . ', 1)" class="btn text-xxs my-auto p-2 ps-3 pe-3 bg-gradient-success opacity-8">Aceitar</button>
                            </td>';
        } else if ($opcao == 3) {
            $estado = htmlspecialchars($row->state);

            if ($estado == 0) {
                $html .= '
                                <td class="align-middle text-center">
                                    <p class="my-auto text-info opacity-8"> Pendente </p>
                                </td>';
            } else if ($estado == 1) {
                $name2 = "'" . $id_name . "'";
                $html .= '
                                <td class="align-middle text-center">
                                        <button type="button" onclick="AvModalDataSend(' . $name2 . ', ' . $id . ')" data-bs-toggle="modal" data-bs-target="#avaliarModal" class="btn bg-gradient-success opacity-8 mt-3" data-bs-toggle="dropdown" aria-expanded="false">
                                            Aceite / Avaliar
                                        </button>
                                </td>';
            } else {
                $html .= '
                                <td class="align-middle text-center">
                                    <p class="my-auto text-danger opacity-8"> Recusado </p>
                                </td>';
            }
        } else if ($opcao == 2) {
            $estado = htmlspecialchars($row->state);

            if ($estado == 1) {
                $name2 = "'" . $id_name . "'";

                $html .= '
                                <td class="align-middle text-center">
                                        <button type="button" onclick="AvModalDataSend(' . $name2 . ', ' . $id . ')" data-bs-toggle="modal" data-bs-target="#avaliarModal" class="btn bg-gradient-success opacity-8 mt-3" data-bs-toggle="dropdown" aria-expanded="false">
                                            Avaliar
                                        </button>
                                </td>';
            }
        }
        $html .= '
                    </tr>
        ';
    }

    $html .= '</tbody>
            </table>
        </div>
    </div>';

    echo $html;
}
