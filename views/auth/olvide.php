<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Recupera tu acceso a DevWebCamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form method="POST" action="/olvide" class="formulario">
        <div class="formulario__campo">
            <label class="formulario__label" for="email">Email</label>
            <input class="formulario__input" type="email" id="email" placeholder="Tu email" name="email">
        </div>
        <input class="formulario__submit" type="submit" value="Enviar instrucciones">
    </form>

    <div class="acciones">
        <a class="acciones__enlace" href="/registro">¿Aún no tienes una cuenta? Regístrate</a>
        <a class="acciones__enlace" href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
    </div>
</main>