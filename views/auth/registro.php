<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Registrate en DevWebCamp</p>

    <?php
        require_once __DIR__ . "/../templates/alertas.php";
    ?>

    <form class="formulario" method="POST" action="/registro">
        <div class="formulario__campo">
            <label class="formulario__label" for="nombre">Nombre</label>
            <input class="formulario__input" type="text" id="nombre" placeholder="Tu nombre" name="nombre"
            value="<?php echo $usuario->nombre;?>">
        </div>
        <div class="formulario__campo">
            <label class="formulario__label" for="apellido">Apellido</label>
            <input class="formulario__input" type="text" id="apellido" placeholder="Tu apellido" name="apellido"
            value="<?php echo $usuario->apellido;?>">
        </div>
        <div class="formulario__campo">
            <label class="formulario__label" for="email">Email</label>
            <input class="formulario__input" type="email" id="email" placeholder="Tu email" name="email"
            value="<?php echo $usuario->email;?>">
        </div>
        <div class="formulario__campo">
            <label class="formulario__label" for="password">Password</label>
            <input class="formulario__input" type="password" id="password" placeholder="Tu password" name="password">
        </div>
        <div class="formulario__campo">
            <label class="formulario__label" for="password2">Repetir password</label>
            <input class="formulario__input" type="password" id="password2" placeholder="Repite tu password" name="password2">
        </div>
        <input class="formulario__submit" type="submit" value="Crear cuenta">
    </form>

    <div class="acciones">
        <a class="acciones__enlace" href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a class="acciones__enlace" href="/olvide">¿Olvidaste tu password?</a>
    </div>
</main>