// Conectar á API
(function() {
    emailjs.init("aPqbtlvNXwRoWuk-2");
  })();
  
  // Faça o envio da mensagem usando o EmailJS
  function sendMessage(subject, body, email, numero) {
    emailjs.send("service_xcyducf", "template_rjax5ti", {
      "subject": subject,
      "body": body,
      "email": email,
      "numero": numero

    }).then(function() {
      console.log("Mensagem enviada com sucesso!");
    }, function(error) {
      console.log("Erro ao enviar mensagem: " + error);
    });
  }
  
  // Manipula o envio do formulário
  function handleFormSubmit(event) {
    // Previne o envio do formulário
    event.preventDefault();
  
    // Obtém os valores de assunto e corpo da mensagem do formulário
    var subject = document.getElementById("subject").value;
    var body = document.getElementById("body").value;
    var email = document.getElementById("email").value;
    var numero = document.getElementById("numero").value;
  
    // Envia a mensagem
    sendMessage(subject, body, email, numero);
  }

  // Adiciona um manipulador de evento de envio de formulário
  function addFormEventHandler() {
    var form = document.getElementById("form");
    form.addEventListener("submit", handleFormSubmit);
  }
  
  // Executa a função quando a página é carregada
  window.addEventListener("load", addFormEventHandler);
  