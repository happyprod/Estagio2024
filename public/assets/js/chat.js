let selectedUser = null;
var text = '';
var userLoaded;
var messagesString = null;

function loadOptions() {
    $.ajax({
        url: '../src/Views/Chat/chat.php',
        method: 'GET',
        data: { action: 'options', search: text },
        success: function (data) {
            $('#chat-options').html(data);
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
            if (messagesString != data)
            {
                $('#chat-box').html(data);
                messagesString = data;

                
            var objDiv = document.getElementById("scrollUser");
            if (objDiv) {
                objDiv.scrollTop = objDiv.scrollHeight;
            } else {
                console.log("Elemento com ID 'scroll' não encontrado.");
            }
            
            }

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


function load() {
    console.log(userLoaded);

    // Verifica se a função loadOptions já está sendo executada em intervalos
    if (!loadOptionsInterval) {
        loadOptions();
        loadOptionsInterval = setInterval(loadOptions, 1000);
    }

    if (selectedUser != null && !abrirMensagensInterval) {
        abrirMensagens(selectedUser);
        abrirMensagensInterval = setInterval(() => abrirMensagens(selectedUser), 1000);
    }
}


let loadOptionsInterval = null;
let abrirMensagensInterval = null;

// Inicializa a execução da função load
load();
setInterval(load, 1000);
