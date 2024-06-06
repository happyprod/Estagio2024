<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    private $model;

    public function __construct(User $model) {
        $this->model = $model;
    }

    public function show($userId) {
        require __DIR__ . '/../Views/Users/Perfil.php';
    }

    public function showEditar() {
        require __DIR__ . '/../Views/Users/editarPerfil.php';
    }

    public function getEditarImagens($count, $p_id) {
        return $this->model->getEditarImagens($count, $p_id);
    }
}