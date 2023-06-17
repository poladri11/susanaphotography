<main class="admin-clases-add">

    <div class="admin-clases-add-head">
        <h1>Añadir clase</h1>
        <a href="/admin/clases">Volver</a>
    </div>

    <form method="post" enctype="multipart/form-data">

        <fieldset>
            <legend>Información</legend>

            <div class="admin-clases-add-field">
                <label style="display: block;" for="name">Nombre</label>
                <input type="text" name="name" required autocomplete="off" id="name">
            </div>
    
            <div class="admin-clases-add-field">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" cols="30" rows="10" style="resize: none;" id="descripcion"></textarea>
            </div>
        </fieldset>

        <fieldset>
            <legend>Precio</legend>

            
            <div class="admin-clases-add-field">
                <label style="display: block;" for="precio">Precio</label>
                <input type="number" name="precio" required id="precio">
            </div>
    
            <div class="admin-clases-add-field">
                <label for="descontado">Descontado</label>
                <input type="number" id="descontado" name="descontado">
            </div>

        </fieldset>

        <fieldset>
            <legend>Imagenes</legend>

            
            <div class="admin-clases-add-field">
                <label style="display: block;" for="imgAntes">Imagen del antes</label>
                <input type="file" name="imgAntes" required id="imgAntes">
            </div>
            
            <div class="admin-clases-add-field">
                <label style="display: block;" for="imgDespues">Imagen del después</label>
                <input type="file" name="imgDespues" required id="imgDespues">
            </div>
  

        </fieldset>

        <fieldset>
            <legend>Fechas</legend>

            
            <div style="display: flex; flex-direction: column;" class="admin-clases-add-field">
                <label style="display: block;" for="imgAntes">Fecha de inicio de la clase</label>

                <div class="dateClase">
                    <input type="date" name="inicio" id="inicio">
                    <input type="time" name="inicioHora" id="inicioHora">
                </div>
            </div>
            
            <div style="display: flex; flex-direction: column; margin-bottom: 2rem;" class="admin-clases-add-field">
                <label style="display: block;" for="imgDespues">Fecha de final de la clase</label>
                <div class="dateClase">
                    <input type="date" name="final" id="final">
                    <input type="time" name="finalHora" id="finalHora">
                </div>
            </div>
  

        </fieldset>

        <input type="submit" value="Añadir clase">

    </form>
</main>