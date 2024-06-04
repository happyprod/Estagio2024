<?php

/*
O UserController é responsável por lidar com operações relacionadas aos usuários, como exibir perfis de usuário, editar informações de perfil, gerenciar amigos ou seguidores, e muito mais. Exemplos de métodos incluem:

profile($userId): Exibe o perfil de um usuário específico.
editProfile(): Exibe e processa o formulário de edição de perfil.
friends(): Exibe a lista de amigos ou seguidores de um usuário.
*/

namespace App\Controllers;

class UserController
{
    public function show($userId) {

        require __DIR__ . '/../Views/Users/Perfil.php';

    }


    public function showEditar()
    {
        require __DIR__ . '/../Views/Users/editarPerfil.php';
    }


}
