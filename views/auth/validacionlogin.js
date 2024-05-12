function validarFormulario() {
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();
  const alertasDiv = document.getElementById("alertas-js");
  
  // Limpiar alertas previas
  alertasDiv.innerHTML = "";

  // Validar campos
  if (email === "") {
      mostrarAlerta("El email es obligatorio", "error");
      return;
  }

  if (password === "") {
      mostrarAlerta("La contraseña es obligatoria", "error");
      return;
  }

  // Envío del formulario si pasa las validaciones
  document.getElementById("login-form").submit();
}

function mostrarAlerta(mensaje, tipo) {
  const alertaDiv = document.createElement("div");
  alertaDiv.classList.add("alerta", tipo);
  alertaDiv.textContent = mensaje;
  document.getElementById("alertas-js").appendChild(alertaDiv);
}