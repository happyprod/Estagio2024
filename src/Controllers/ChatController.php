<?php

/*
O ChatController é responsável por gerenciar bate-papos entre usuários, seja em mensagens privadas ou em salas de bate-papo. Ele permite que os usuários se comuniquem em tempo real. Exemplos de métodos incluem:

privateChat($userId): Inicia uma conversa privada com outro usuário.
groupChat($roomId): Participa de uma sala de bate-papo em grupo.
sendMessage($recipient, $message): Envia uma mensagem para um usuário ou sala de bate-papo.
*/



namespace App\Controllers;

use App\Models\Message;

class ChatController
{

    private $model;

    public function __construct(Message $model)
    {
        $this->model = $model;
    }


    public function showChat()
    {
        require __DIR__ . '/../Views/Chat/CaixaDeEntrada.php';
    }

    public function sendMessage($user, $message)
    {
        $this->model->sendMessage($user, $message);
    }

    public function saveView($user)
    {
        $this->model->saveView($user);
    }

    public function getOptions($search)
    {
        return $this->model->getOptions($search);
    }

    public function getChatTrade($id)
    {
        return $this->model->getChatTrade($id);
    }

    public function getViews($id)
    {
        return $this->model->getViews($id);
    }

    public function getLastChat($user)
    {
       return $this->model->getLastChat($user);
    }

    public function getMessages($user)
    {
        return $this->model->getMessages($user);
    }

}