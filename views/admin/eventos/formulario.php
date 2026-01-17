<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información del evento</legend>
    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre del evento</label>
        <input
            type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre del evento"
            value="<?php echo $evento->nombre ?? ''; ?>"
        >
    </div>
    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción del evento</label>
        <textarea
            class="formulario__input formulario__input--textarea"
            id="descripcion"
            name="descripcion"
            placeholder="Descripción del evento"
            rows="8"
        ><?php echo $evento->descripcion ?? ''; ?></textarea>
    </div>
</fieldset>