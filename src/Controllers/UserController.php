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

        // Exibe os dados recebidos para debug
        echo "Nome do Evento: " . htmlspecialchars($nomeEvento) . "<br>";
        echo "Identificação do Evento: " . htmlspecialchars($identificacaoEvento) . "<br>";
        echo "Descrição: " . htmlspecialchars($descricao) . "<br>";
        echo "Data: " . htmlspecialchars($data) . "<br>";
        echo "Empresa de Booking: " . htmlspecialchars($empresaBooking) . "<br>";
        echo "Localização: " . htmlspecialchars($localizacao) . "<br>";
        echo "switchBooking: " . htmlspecialchars($switchBooking) . "<br>";
        echo "switchEvento: " . htmlspecialchars($switchEvento) . "<br>";

        // Verificar se os campos obrigatórios estão vazios
        if (empty($localizacao)) {
            $switchLocal = 0;
        }

        if (empty($empresaBooking)) {
            $switchBooking = 0;
        }

        if (empty($identificacaoEvento)) {
            $switchEvento = 0;
        }

        // Verificar se a data está dentro dos últimos 50 anos e não ultrapassa a data atual
        $dataAtual = strtotime(date('Y-m-d'));
        $dataLimite = strtotime('-50 years');
        $dataEvento = strtotime($data);

        if (!empty($data) && ($dataEvento >= $dataLimite && $dataEvento <= $dataAtual)) {
            // Verificar se o evento e o booking existem
            $eventoExiste = false;
            $bookingExiste = false;

            if ($switchBooking == 1) {
                $bookingExiste = $this->model->verificarBooking($empresaBooking);
                echo 'Executou o switchBooking<br>';
                echo 'Resultado de verificarBooking: ' . ($bookingExiste ? '1' : '0') . '<br>';
            } else {
                $bookingExiste = true;
            }

            if ($switchEvento == 1) {
                $eventoExiste = $this->model->verificarEvento($nomeEvento);
                echo 'Executou o switchEvento<br>';
                echo 'Resultado de verificarEvento: ' . ($eventoExiste ? '1' : '0') . '<br>';
            } else {
                $eventoExiste = true;
            }

            echo 'bookingExiste: ' . ($bookingExiste ? '1' : '0') . '<br>';
            echo 'eventoExiste: ' . ($eventoExiste ? '1' : '0') . '<br>';

            if ($eventoExiste && $bookingExiste) {
                // Inserir no banco de dados
                $dadosEvento = array (
                    'nomeEvento' => $nomeEvento,
                    'identificacaoEvento' => $identificacaoEvento,
                    'descricao' => $descricao,
                    'data' => $data,
                    'empresaBooking' => $empresaBooking,
                    'localizacao' => $localizacao,
                    'switchEvento' => $eventoExiste ? '1' : '0',
                    'switchData' => $switchData,
                    'switchBooking' => $bookingExiste ? '1' : '0',
                    'switchLocal' => $switchLocal,
                    'switchCollabs' => $switchCollabs,
                    'id_projeto' => $id_projeto
                );

                $this->model->inserirEvento($dadosEvento);
                echo 'Evento inserido com sucesso<br>';
            } else {
                echo 'Evento';
            }
        } else {
            echo 'Erro: Data inválida<br>';
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

    public function getEstatisticasProjeto($p_id)
    {
        return $this->model->getEstatisticasProjeto($p_id);
    }

    public function getUsersComplete($pesquisa)
    {
        return $this->model->getUsersComplete($pesquisa);
    }

    public function getEventUsersComplete($pesquisa)
    {
        return $this->model->getEventUsersComplete($pesquisa);
    }

    public function getEditarPrivacy($p_id)
    {
        return $this->model->getEditarPrivacy($p_id);
    }


    public function editarPrivacidade()
    {
        // Ler dados enviados via POST
        $id_projeto = $_POST['id_projeto'];
        $projetos = $_POST['projetos'];
        $gostos = $_POST['gostos'];
        $comentarios = $_POST['comentarios'];
        
        if($projetos == 3)
        {
            $gostos = 6;
            $comentarios = 9;
        }

        // Inserir no banco de dados
        $dadosEvento = array(
            'id_projeto' => $id_projeto,
            'projetos' => $projetos,
            'gostos' => $gostos,
            'comentarios' => $comentarios
        );

        $this->model->editarPrivacidade($dadosEvento);
        
    }


    
    public function apagarProjeto()
    {
        // Ler dados enviados via POST
        $id_projeto = $_POST['id_projeto'];

        $this->model->apagarProjeto($id_projeto);
        
    }



}
