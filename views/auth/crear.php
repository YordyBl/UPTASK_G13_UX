<div class="contenedor crear">
    <?php include_once __DIR__ .'/../templates/nombre-sitio.php';?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Crea tu cuenta en UpTask</p>
<<<<<<< HEAD
=======

>>>>>>> 03661e7df9dd0f38d07402c45179539b96a931c0
        <?php include_once __DIR__ .'/../templates/alertas.php';?>
        <form class="formulario" method='POST' action="/crear">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" 
                        placeholder="Tu nombre"    
                        id="nombre"
                        name="nombre"
<<<<<<< HEAD
                        value="<?php echo $usuario->nombre; ?>"/>
=======
                        value="<?php echo $usuario->nombre; ?>"
                        />
>>>>>>> 03661e7df9dd0f38d07402c45179539b96a931c0
            </div>

            <!-- Email -->
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" 
                        placeholder="Tu @Email"    
                        id="email"
                        name="email"
                        value="<?php echo $usuario->email; ?>"/>
            </div>

            <!-- Contraseña -->
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" 
                        placeholder="Contraseña"    
                        id="password"
                        name="password"/>
            </div>

            <!-- Repite Contraseña -->
            <div class="campo">
                <label for="password2">Repetir Password</label>
                <input type="password" 
                        placeholder="Repite tu password"    
                        id="password2"
                        name="password2"/>
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