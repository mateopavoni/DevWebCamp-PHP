<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Inicia sesión en DevWebCamp</p>

    <form class="formulario">
        <div class="formulario__campo">
            <label class="formulario__label" for="email">Email</label>
            <input class="formulario__input" type="email" id="email" placeholder="Tu email" name="email">
        </div>
        <div class="formulario__campo">
            <label class="formulario__label" for="password">Password</label>
            <input class="formulario__input" type="password" id="password" placeholder="Tu password" name="password">
        </div>
        <input class="formulario__submit" type="submit" value="Iniciar Sesión">
    </form>

    <div class="acciones">
        <a class="acciones__enlace" href="/registro">¿Aún no tienes una cuenta? Regístrate</a>
        <a class="acciones__enlace" href="/olvide">¿Olvidaste tu password?</a>
    </div>
</main>