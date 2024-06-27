<?php

/*
O AuthController, por outro lado, é responsável por lidar com a autenticação e autorização de usuários na aplicação. Ele gerencia o processo de login, registro e logout de usuários, além de outras funcionalidades relacionadas à segurança e gerenciamento de contas de usuário. Suas responsabilidades podem incluir:

Autenticar usuários por meio de credenciais (nome de usuário, email, senha).
Criar novas contas de usuário.
Encerrar sessões de usuários (logout).
Redirecionar usuários após o login ou logout.
Gerenciar permissões e acessos dos usuários.
Exemplo de métodos em um AuthController:

login(): Exibe o formulário de login e processa as credenciais inseridas.
logout(): Encerra a sessão do usuário e redireciona para a página inicial.
register(): Exibe o formulário de registro e cria uma nova conta de usuário.
*/


namespace App\Controllers;

use App\Models\AccountListing;

class HomeController
{

    private $model;

    public function __construct(AccountListing $model)
    {
        $this->model = $model;
    }


    public function showHome()
    {
        require __DIR__ . '/../Views/Home/home.php';
    }


    public function contasSugeridas()
    {
    echo '
        <div class="p-3 shadow bg-white mx-auto border-radius-lg justify-content-center mt-4">
            <h6>Contas Sugeridas</h6>

            <div class="row mt-3">
                <div class="col-3 h-100 my-auto">
                    <img src="/public/img/fotos/14b5dd793d1dc687a4657997cd8e8db4.jpg" class="img-fluid rounded-circle" style="object-fit: cover; width: 40px; height: 40px; padding-right: 0px;">
                </div>
                <div class="col-6 p-2" style="margin-left: -0.5em;">
                    <p class="text-sm mb-1" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"> @happyprod19asdlkasmldkmaskldmlak </p>
                    <p class="text-xs mb-0" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"> Rúben Costa </p>
                </div>
                <div class="col-2 mx-auto my-auto">
                    <img src="/public/img/adicionar-amigo.png" style="cursor:pointer; width: 25px;" alt="" class="mx-auto my-auto">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-3 h-100 my-auto">
                    <img src="/public/img/fotos/14b5dd793d1dc687a4657997cd8e8db4.jpg" class="img-fluid rounded-circle" style="object-fit: cover; width: 40px; height: 40px; padding-right: 0px;">
                </div>
                <div class="col-6 p-2" style="margin-left: -0.5em;">
                    <p class="text-sm mb-1" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"> @happyprod19asdlkasmldkmaskldmlak </p>
                    <p class="text-xs mb-0" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"> Rúben Costa </p>
                </div>
                <div class="col-2 mx-auto my-auto">
                    <img src="/public/img/adicionar-amigo.png" style="cursor:pointer; width: 25px;" alt="" class="mx-auto my-auto">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-3 h-100 my-auto">
                    <img src="/public/img/fotos/14b5dd793d1dc687a4657997cd8e8db4.jpg" class="img-fluid rounded-circle" style="object-fit: cover; width: 40px; height: 40px; padding-right: 0px;">
                </div>
                <div class="col-6 p-2" style="margin-left: -0.5em;">
                    <p class="text-sm mb-1" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"> @happyprod19asdlkasmldkmaskldmlak </p>
                    <p class="text-xs mb-0" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"> Rúben Costa </p>
                </div>
                <div class="col-2 mx-auto my-auto">
                    <img src="/public/img/adicionar-amigo.png" style="cursor:pointer; width: 25px;" alt="" class="mx-auto my-auto">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-3 h-100 my-auto">
                    <img src="/public/img/fotos/14b5dd793d1dc687a4657997cd8e8db4.jpg" class="img-fluid rounded-circle" style="object-fit: cover; width: 40px; height: 40px; padding-right: 0px;">
                </div>
                <div class="col-6 p-2" style="margin-left: -0.5em;">
                    <p class="text-sm mb-1" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"> @happyprod19asdlkasmldkmaskldmlak </p>
                    <p class="text-xs mb-0" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"> Rúben Costa </p>
                </div>
                <div class="col-2 mx-auto my-auto">
                    <img src="/public/img/adicionar-amigo.png" style="cursor:pointer; width: 25px;" alt="" class="mx-auto my-auto">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-3 h-100 my-auto">
                    <img src="/public/img/fotos/14b5dd793d1dc687a4657997cd8e8db4.jpg" class="img-fluid rounded-circle" style="object-fit: cover; width: 40px; height: 40px; padding-right: 0px;">
                </div>
                <div class="col-6 p-2" style="margin-left: -0.5em;">
                    <p class="text-sm mb-1" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"> @happyprod19asdlkasmldkmaskldmlak </p>
                    <p class="text-xs mb-0" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"> Rúben Costa </p>
                </div>
                <div class="col-2 mx-auto my-auto">
                    <img src="/public/img/adicionar-amigo.png" style="cursor:pointer; width: 25px;" alt="" class="mx-auto my-auto">
                </div>
            </div>
        </div>';
    }

}
