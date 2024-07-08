<?php

namespace App\Controllers;

use App\Models\Contracts;

class ContractsController
{

    private $model;

    public function __construct(Contracts $model)
    {
        $this->model = $model;
    }


    public function showContratos()
    {
        require __DIR__ . '/../Views/Contracts/Contracts.php';
    }

    public function getPropostasNovas()
    {
        return $this->model->getPropostasNovas();
    }

    public function getPropostasAceitas()
    {
        return $this->model->getPropostasAceitas();
    }

    public function getPropostasFeitas()
    {
        return $this->model->getPropostasFeitas();
    }

    public function recusarContract($idContract)
    {
        return $this->model->recusarContract($idContract);
    }

    public function aceitarContract($idContract)
    {
        return $this->model->aceitarContract($idContract);
    }

    //o guardarReview2 é para os enviados
    public function guardarReview($rating, $comentario, $id)
    {
        $result = $this->model->checkReviewExist($id);

        if ($result) {
            if (empty($rating) && empty($comentario)) 
            {
                $this->model->deleteReview($id);
            } else {
                $this->model->updateReview($rating, $comentario, $id);
            }
        } else {
            $this->model->guardarReview($rating, $comentario, $id);
        }
    }

}
