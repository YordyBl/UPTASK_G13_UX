<div class="contenedor crear">
    <h1 class="uptask">UpTask</h1>
    <?php include_once __DIR__ .'/../templates/nombre-sitio.php';?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Crea tu cuenta en UpTask</p>
        <form class="formulario" method='POST' action="/">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" 
                        placeholder="Tu nombre"    
                        id="nombre"
                        name="nombre"/>
            </div>
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
            <div class="campo">
                <label for="password2">Repetir Password</label>
                <input type="password" 
                        placeholder="Repite tu password"    
                        id="password2"
                        name="password"/>
            </div>
            <input class="boton" type="submit" value="Crear cuenta"/>
        </form>
    </div> 
    <div class="acciones">
        <a href="/">¿Ya tienes cuenta? Iniciar sesión</a>
        <a href="/olvide">¿Olvidaste tu cuenta?</a>
    </div>
    <!-- Contenedor -sm -->


</div>