<div class="contenedor login">
    <?php include_once __DIR__ .'/../templates/nombre-sitio.php';?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Iniciar sesión</p>

        <?php include_once __DIR__ .'/../templates/alertas.php';?>
        <form class="formulario" method='POST' action="/" novalidate>

            <div class="campo">
                <label for="email">Email</label>
                <input type="email" 
                        placeholder="Tu @Email"    
                        id="email"
                        name="email"/>
            </div>
            
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" 
                        placeholder="Contraseña"    
                        id="password"
                        name="password"/>
            </div>
            <input class="boton" type="submit" value="Iniciar Sesion" onclick="validacionlogin()"/>
        </form>
    </div> 
    <div class="acciones">
        <a href="/crear">¿aun no tienes una cuenta? Obtener una</a>
        <a href="/olvide">¿Olvidaste tu cuenta?</a>
    </div>
    <!-- Contenedor -sm -->
<script src="./validacionlogin.js"></script>
</div>