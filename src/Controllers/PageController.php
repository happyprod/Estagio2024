<?php
/*
O PageController é responsável por lidar com as páginas estáticas ou dinâmicas da aplicação que não estão diretamente relacionadas à autenticação ou autorização de usuários. Ele geralmente lida com a exibição de conteúdo informativo, como páginas "Sobre nós", "Contato", "FAQ", entre outras. Suas responsabilidades podem incluir:

Exibir informações estáticas sobre a empresa, produto ou serviço.
Processar e exibir formulários de contato.
Responder a consultas de páginas informativas.
Exemplo de métodos em um PageController:

about(): Mostra a página "Sobre nós".
contact(): Exibe o formulário de contato.
Outros métodos para exibir outras páginas informativas.
*/
namespace App\Controllers;

class PageController
{
    public function show($profileId)
    {
        // Remove a extensão .php, se presente, do número do perfil
        $profileId = str_replace('.php', '', $profileId);

        // Agora você pode usar $profileId normalmente, por exemplo:
        echo "Página de Perfil do Usuário: $profileId";
    }
}
