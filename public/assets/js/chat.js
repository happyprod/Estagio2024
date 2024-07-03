let selectedUser = null;
var text = '';
var autoScroll = true;

function loadOptions() {
    $.ajax({
        url: '../src/Views/Chat/chat.php',
        method: 'GET',
        data: { action: 'options', search: text },
        success: function (data) {
            $('#chat-options').html(data);
            $('#chat-options').scrollTop($('#chat-options')[0].scrollHeight); // Rolagem automática para o final

        }
    });
}

function abrirMensagens(id) {
    selectedUser = id;
    document.getElementById('mensagemInput').classList.remove('d-none');
    loadMessages(selectedUser);
}

function loadMessages(user) {
    $.ajax({
        url: '../src/Views/Chat/chat.php',
        method: 'GET',
        data: { action: 'loadMessages', user: user },
        success: function (data) {
            if (autoScroll) {
                $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
            }
            $('#chat-box').html(data);

        }
    });
}

function searchChat() {
    text = document.getElementById('searchChat').value;

    console.log(text);
}

function sendMessage() {
    var user = selectedUser;
    var message = $('#message').val();
    if (user && message) {
        $.ajax({
            url: '../src/Views/Chat/chat.php',
            method: 'POST',
            data: { action: 'send', user: user, message: message },
            success: function (data) {
                $('#message').val("");
                loadMessages(user);
                loadOptions();
            }
        });
    }
}

// Função de envio de mensagem
function enter() {
    const message = document.getElementById('message').value;
    sendMessage();
    // Aqui você pode adicionar o código para realmente enviar a mensagem
}

// Adiciona um ouvinte de evento para o campo de entrada
document.getElementById('message').addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        sendMessage();
    }
});

$('#chat-box').on('scroll', function () {
    if ($('#chat-box').scrollTop() <= 0) {
        autoScroll = false;
    } else if ($('#chat-box').scrollTop() + $('#chat-box').innerHeight() >= $('#chat-box')[0].scrollHeight - 10) {
        autoScroll = true;
    } else {
        autoScroll = false;
    }
});

$(document).ready(function () {
    setInterval(loadOptions, 1000);
    loadOptions();
});

