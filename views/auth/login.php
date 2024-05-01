<div class="contenedor">
    <h1>UpTask</h1>
    <p class="tagline">Administra tus tareas y proyectos</p>
    <p>Grupo 4</p>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Iniciar sesión</p>
        <form class="formulario" method='POST' action="/">
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
            <input class="boton" type="submit" value="Iniciar Sesion"/>
        </form>
    </div> 
    <div class="acciones">
        <a href="/crear">¿aun no tienes una cuenta? Obtener una</a>
        <a href="/olvide">¿Olvidaste tu cuenta?</a>
    </div>
    <!-- Contenedor -sm -->


</div>