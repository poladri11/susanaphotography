<main class="main__admin-g-add">
    <div class="main__admin-g-add-head">
        <h1>Añadir categoría</h1>
        <a href="/admin/galeria">Volver</a>
    </div>

    <div class="main__admin-g-add-body">
        <form class="form__add-c" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información de la categoría</legend>

                <div class="form__add-c-field">
                    <input type="text" name="name" id="name" required>
                    <label for="name">Nombre </label>
                </div>

                <div class="form__add-c-field form__add-c-field-file">
                    <label for="imagenPrinc">Imagen principal</label>
                    <input type="file" name="imagenPrinc" id="imagenPrinc">
                </div>

                

                <input class="add-cat" type="submit" value="Añadir">

            </fieldset>
        </form>
    </div>
</main>