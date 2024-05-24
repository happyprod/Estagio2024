function handleCredentialResponse(response) {
    const data = jwt_decode(response.credential);
    console.log(data);

    // Envia o email e a imagem para o arquivo PHP
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./google_login.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    
    xhr.send("email=" + data.email + "&picture=" + data.picture + "&name=" + data.name);
    window.location.href = "./index.php"; //redireciona
}

window.onload = function () {
    google.accounts.id.initialize({
        client_id: "137280578788-inmbk0b6jb8o6gvd7miach0ot4fblhsh.apps.googleusercontent.com",
        callback: handleCredentialResponse
    });
    google.accounts.id.renderButton(
        document.getElementById("buttonDiv"),
        { 
            theme: "outline", 
            size: "large",
            type: "standard",
            shape: "rectangular",
            theme: "outline",
            text: "signin",
            size: "large",
            locale: "pt-PT",
            logo_alignment: "center",
            width: "400"
        }  // customization attributes
    );
    google.accounts.id.prompt(); // also display the One Tap dialog
}