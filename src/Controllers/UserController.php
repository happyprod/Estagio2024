<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function show($userId)
    {
        require __DIR__ . '/../Views/Users/Perfil.php';
    }

    public function showEditar()
    {
        require __DIR__ . '/../Views/Users/editarPerfil.php';
    }

    public function getEditarImagens($count, $p_id)
    {
        return $this->model->getEditarImagens($count, $p_id);
    }


    public function inserirEvento()
    {
        $switchEvento = isset($_POST['switchEvento']) && $_POST['switchEvento'] == 'true' ? 1 : 0;
        $switchData = isset($_POST['switchData']) && $_POST['switchData'] == 'true' ? 1 : 0;
        $switchBooking = isset($_POST['switchBooking']) && $_POST['switchBooking'] == 'true' ? 1 : 0;
        $switchLocal = isset($_POST['switchLocal']) && $_POST['switchLocal'] == 'true' ? 1 : 0;
        $switchCollabs = isset($_POST['switchCollabs']) && $_POST['switchCollabs'] == 'true' ? 1 : 0;

        $id_projeto = $_POST['id_projeto'] ?? '';

        // Outros dados
        $nomeEvento = $_POST['nomeEvento'] ?? '';
        $identificacaoEvento = $_POST['identificacaoEvento'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $data = $_POST['data'] ?? '';
        $empresaBooking = $_POST['empresaBooking'] ?? '';
        $localizacao = $_POST['localizacao'] ?? '';
        $arrayC_idName = isset($_POST['arrayC_idName']) ? json_decode($_POST['arrayC_idName'], true) : [];

        // Verificar se os campos obrigatórios estão vazios
        if (empty($localizacao)) {
            $switchLocal = 0;
        }
        if (empty($empresaBooking)) {
            $switchBooking = 0;
        }
        if (empty($nomeEvento) || empty($identificacaoEvento)) {
            $switchEvento = 0;
        }

        // Verificar se a data está dentro dos últimos 50 anos e não ultrapassa a data atual
        $dataAtual = strtotime(date('Y-m-d'));
        $dataLimite = strtotime('-50 years');

        if (!empty($data) && ($data < $dataLimite || $data > $dataAtual)) {
            // Verificar se o evento e o booking existem
            $eventoExiste = true;
            $bookingExiste = true;

            if ($switchBooking == 1) {
                $bookingExiste = $this->model->verificarBooking($empresaBooking);
            }

            if ($switchEvento == 1) {
                $eventoExiste = $this->model->verificarEvento($nomeEvento);
            }

            if ($eventoExiste && $bookingExiste) {
                // Inserir no banco de dados
                $dadosEvento = array(
                    'nomeEvento' => $nomeEvento,
                    'identificacaoEvento' => $identificacaoEvento,
                    'descricao' => $descricao,
                    'data' => $data,
                    'empresaBooking' => $empresaBooking,
                    'localizacao' => $localizacao,
                    'switchEvento' => $switchEvento,
                    'switchData' => $switchData,
                    'switchBooking' => $switchBooking,
                    'switchLocal' => $switchLocal,
                    'switchCollabs' => $switchCollabs,
                    'id_projeto' => $id_projeto
                );

                $this->model->inserirEvento($dadosEvento);
            } else {
                echo ('Evento');
            }
        } else {
            echo ('Data');
        }
    }





    public function getEditarInfoProjects($count, $p_id)
    {
        return $this->model->getEditarInfoProjects($count, $p_id);
    }

    public function getEditarInfoProjectsCollabs($count, $p_id)
    {
        return $this->model->getEditarInfoProjectsCollabs($count, $p_id);
    }
    public function getBookingUsersComplete($pesquisa)
    {
        return $this->model->getBookingUsersComplete($pesquisa);
    }

    public function getUsersComplete($pesquisa)
    {
        return $this->model->getUsersComplete($pesquisa);
    }

    public function getEventUsersComplete($pesquisa)
    {
        return $this->model->getEventUsersComplete($pesquisa);
    }
}
