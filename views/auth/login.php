<div class="contenedor login">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Iniciar sesión</p>
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
        <div id="mensajeAlerta">
            <!-- Aqui va el mensaje de alerta -->
        </div>
        <form id="loginForm" class="formulario" method="POST" action="/" novalidate>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" placeholder="Tu @Email" id="email" name="email" />
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" placeholder="Contraseña" id="password" name="password" />
            </div>
            <input class="boton" type="submit" value="Iniciar Sesion" />
        </form>
    </div>
    <div class="acciones">
        <a href="/crear">¿aun no tienes una cuenta? Obtener una</a>
        <a href="/olvide">¿Olvidaste tu cuenta?</a>
    </div>
    <!-- Contenedor -sm -->
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginForm');
        const mensajeAlerta = document.getElementById('mensajeAlerta');

        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();

            // Resetear errores
            mensajeAlerta.textContent = '';
            mensajeAlerta.classList.remove('error');

            // Validar email
            const email = document.getElementById('email').value;
            if (!email) {
                mostrarError('El email es obligatorio');
                return;
            }

            // Validar formato de email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                mostrarError('El email no es válido');
                return; 
            }

            // Validar contraseña
            const password = document.getElementById('password').value;
            if (!password) {
                mostrarError('La contraseña es obligatoria');
                return;
            }

            // Si todo está bien, enviar formulario
            loginForm.submit();
        });

        function mostrarError(mensaje) {
            mensajeAlerta.textContent = mensaje;
            mensajeAlerta.classList.add('error');
        }
    });
</script>