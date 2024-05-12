<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
</head>
<?php include_once __DIR__ . '/header-dashboard.php' ?>

<body>
  <div class="contenedor-sm">
    <div id="mensajeAlerta">
      <!-- Aqui va el mensaje de alerta -->
    </div>
    <form class="formulario">
      <div class="campo">
        <input type="text" placeholder="NOMBRE DE PROYECTO">
        <button class="boton btn-add">CREAR</button>
      </div>

    </form>

    <div class="proyect-container" id="proyecto">

    </div>
    <div class="empty">
      <p>No tienes tareas pendientes.</p>
    </div>
  </div>
  <div id="modalEliminar" class="modal">
    <div class="modal-contenido">
      <p>¿Estás seguro de que deseas eliminar este proyecto?</p>
      <button id="confirmarEliminar">Confirmar</button>
      <button id="cancelarEliminar">Cancelar</button>
    </div>
  </div>
  
  <script>
    const input = document.querySelector("input");
    const addBtn = document.querySelector(".btn-add");
    const empty = document.querySelector(".empty");
    const alertas = document.getElementById("mensajeAlerta");
    const agregarProyecto=document.getElementById("proyecto")
    const modalEliminar = document.getElementById("modalEliminar");
    const confirmarEliminarBtn = document.getElementById("confirmarEliminar");
    const cancelarEliminarBtn = document.getElementById("cancelarEliminar");

    addBtn.addEventListener("click", (e) => {
      e.preventDefault();

      const text = input.value;
      var contador=0;
      if (text !== "") {
        const proyect = document.createElement("h4");
        proyect.textContent = text;
        alertas.className="";
        alertas.textContent="";
        proyect.appendChild(addDeleteBtn());
        agregarProyecto.appendChild(proyect);
        input.value = "";
        empty.style.display = "none";
      } else {
        alertas.textContent = "El nombre es obligatorio";
        alertas.classList.add("alerta", "error");
      }
    });

    function addDeleteBtn() {
      const deleteBtn = document.createElement("button");

      deleteBtn.textContent = "X";
      deleteBtn.className = "btn-delete";

      deleteBtn.addEventListener("click", (e) => {
        // Mostrar el modal de confirmación
        modalEliminar.style.display = "block";

        // Listener para el botón de confirmar eliminación
        confirmarEliminarBtn.addEventListener("click", () => {
          const item = e.target.parentElement;
          agregarProyecto.removeChild(item);
          modalEliminar.style.display = "none";
          const items = document.querySelectorAll("h4")
          console.log(items.length)
          if (items.length === 0) {
            empty.style.display = "block";
          }
        });

        // Listener para el botón de cancelar
        cancelarEliminarBtn.addEventListener("click", () => {
          modalEliminar.style.display = "none";
        });
      });

      return deleteBtn;
    }
  </script>

</body>
<?php include_once __DIR__ . '/fotter-dashboard.php' ?>

</html>