document.addEventListener("DOMContentLoaded", function() {
    const input = document.getElementById("nombreProyecto");
    const formCrearProyecto = document.getElementById("formCrearProyecto");
    const alerta = document.getElementById("mensajeAlerta");
    const agregarProyecto = document.getElementById("proyecto");
    const modalEliminar = document.getElementById("modalEliminar");
    const confirmarEliminarBtn = document.getElementById("confirmarEliminar");
    const cancelarEliminarBtn = document.getElementById("cancelarEliminar");
    const noTareas = document.getElementById("noTareas");
    let contador = 0;
  
    formCrearProyecto.addEventListener("submit", function(e) {
      e.preventDefault();
  
      const text = input.value.trim();
  
      if (text === "") {
        mostrarAlerta("El nombre es obligatorio", "error");
        return;
      }
  
      const proyectoDiv = document.createElement("div");
      proyectoDiv.classList.add("list-proyect");
      proyectoDiv.innerHTML = `
        <h4>${text}</h4>
        <button class="btn-delete">X</button>
      `;
  
      agregarProyecto.appendChild(proyectoDiv);
      input.value = "";
      noTareas.classList.add("no-tareas");
      contador++;
    });
  
    agregarProyecto.addEventListener("click", function(e) {
      if (e.target.classList.contains("btn-delete")) {
        modalEliminar.style.display = "block";
  
        confirmarEliminarBtn.addEventListener("click", function() {
          const item = e.target.parentElement;
          agregarProyecto.removeChild(item);
          modalEliminar.style.display = "none";
          contador--;
  
          if (contador === 0) {
            noTareas.classList.remove("no-tareas");
          }
        });
  
        cancelarEliminarBtn.addEventListener("click", function() {
          modalEliminar.style.display = "none";
        });
      }
    });
  
    function mostrarAlerta(mensaje, tipo) {
      alerta.textContent = mensaje;
      alerta.className = `alerta ${tipo}`;
    }
  });
  