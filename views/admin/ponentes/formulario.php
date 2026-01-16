<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>
    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Nombre</label>
        <input 
            class="formulario__input" 
            type="text" 
            id="nombre" 
            name="nombre" 
            placeholder="Nombre del ponente"
            value="<?php echo s($ponente?->nombre ?? ''); ?>"
        >
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Apellido</label>
        <input 
            class="formulario__input" 
            type="text" 
            id="apellido" 
            name="apellido" 
            placeholder="Apellido del ponente"
            value="<?php echo s($ponente?->nombre ?? ''); ?>"
        >
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">País</label>
        <input 
            class="formulario__input" 
            type="text" 
            id="pais" 
            name="pais" 
            placeholder="País del ponente"
            value="<?php echo s($ponente?->pais ?? ''); ?>"
        >
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Ciudad</label>
        <input 
            class="formulario__input" 
            type="text" 
            id="ciudad" 
            name="ciudad" 
            placeholder="Ciudad del ponente"
            value="<?php echo s($ponente?->ciudad ?? ''); ?>"
        >
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Imagen</label>
        <input 
            class="formulario__input formulario__input--file" 
            type="file" 
            id="imagen" 
            name="imagen" 
        >
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>
    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Áreas de experiencia (separadas por coma)</label>
        <input 
            class="formulario__input" 
            type="text" 
            id="tags_input" 
            placeholder="Node, Vue, React, PHP, Laravel, etc"
        >

        <div id="tags" class="formulario__listado"></div>
        <input type="hidden" name="tags" value="<?php echo s($ponente?->tags ?? ''); ?>">
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook-f"></i>
            </div>

            <input 
                class="formulario__input--sociales" 
                type="text" 
                name="redes[facebook]"
                placeholder="Facebook"
                value="<?php echo s($ponente?->redes['facebook'] ?? ''); ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>

            <input 
                class="formulario__input--sociales" 
                type="text" 
                name="redes[twitter]"
                placeholder="Twitter"
                value="<?php echo s($ponente?->redes['twitter'] ?? ''); ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>

            <input 
                class="formulario__input--sociales" 
                type="text" 
                name="redes[instagram]"
                placeholder="Instagram"
                value="<?php echo s($ponente?->redes['instagram'] ?? ''); ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>

            <input 
                class="formulario__input--sociales" 
                type="text" 
                name="redes[youtube]"
                placeholder="YouTube"
                value="<?php echo s($ponente?->redes['youtube'] ?? ''); ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>

            <input 
                class="formulario__input--sociales" 
                type="text" 
                name="redes[tiktok]"
                placeholder="Tiktok"
                value="<?php echo s($ponente?->redes['tiktok'] ?? ''); ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>

            <input 
                class="formulario__input--sociales" 
                type="text" 
                name="redes[github]"
                placeholder="Github"
                value="<?php echo s($ponente?->redes['github'] ?? ''); ?>"
            >
        </div>
    </div>


</fieldset>

