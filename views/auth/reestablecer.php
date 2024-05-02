<div class="contenedor restablecer">
    <h1 class="uptask">UpTask</h1>
    <?php include_once __DIR__ .'/../templates/nombre-sitio.php';?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Coloca tu nuevo password</p>
        <form class="formulario" method='POST' action="/reestablecer">
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" 
                        placeholder="Contraseña"    
                        id="password"
                        name="password"/>
            </div>
            <input class="boton" type="submit" value="Guardar password"/>
        </form>
    </div> 
    <div class="acciones">
        <a href="/crear">¿aun no tienes una cuenta? Obtener una</a>
        <a href="/olvide">¿Olvidaste tu cuenta?</a>
    </div>
    <!-- Contenedor -sm -->


</div>