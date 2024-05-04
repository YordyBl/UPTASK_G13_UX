<div class="contenedor olvide">
    <?php include_once __DIR__ .'/../templates/nombre-sitio.php';?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Recupera tu Acceso Uptask</p>
        <form class="formulario" method='POST' action="/olvide">
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" 
                        placeholder="Tu @Email"    
                        id="email"
                        name="email"/>
            </div>

            <input class="boton" type="submit" value="Enviar"/>
        </form>
    </div> 
    <div class="acciones">
      <a href="/">¿Ya tienes una cuenta? Inicia sesión</a> 
        <a href="/crear">¿Aun no tienes una cuenta? Obtener una</a>

    </div>
    <!-- Contenedor -sm -->


</div>