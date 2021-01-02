function validar() {
    const usuario = document.getElementById('usuario').value;
    const pass = document.getElementById('pass').value;

    if (usuario === "ILOVEPETS" && pass === "m4sc0t4") {
        alert("Bienvenido Doctor@");
        window.location.href = "php/read.php";
        return false;
    } else {
        alert("Credenciales incorrectas, ingrese datos correctos");
    }
}