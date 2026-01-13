<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Coloca tu nuevo password</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <?php if($token_valido) : ?>
    

    <form method="POST" action="/reestablecer" class="formulario">

        <div class="formulario__campo">
            <label class="formulario__label" for="password">Nuevo password</label>
            <input
                class="formulario__input"
                type="password"
                id="password"
                placeholder="Tu password"
                name="password"
            >
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="password2">Repetir password</label>
            <input
                class="formulario__input"
                type="password"
                id="password2"
                placeholder="Repite tu password"
                name="password2"
            >
        </div>

        <input class="formulario__submit" type="submit" value="Guardar nuevo password">
    </form>

    
    <?php endif; ?>

    <div class="acciones">
        <a class="acciones__enlace" href="/registro">¿Aún no tienes una cuenta? Regístrate</a>
        <a class="acciones__enlace" href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
    </div>

</main>
