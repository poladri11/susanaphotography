<main class="main__edit-gal">
    <form method="POST" enctype="multipart/form-data">
        <div class="main__edit-gal-head">
            <a class="main__edit-gal-head-back" href="/admin/galeria">Volver</a>
            <div class="main__edit-gal-head-imgPrin">
                <h1>Imagen principal de la categoría:</h1>
                <div class="main__edit-gal-head-name">
                    <input class="main__edit-gal-head-input" disabled type="text" name="nameCat" id="nameCat" value="<?php echo $galeriaDats['name'] ?>">
                    <img class="main__edit-gal-head-img" src="/build/img/svgs/edit1.svg" alt="Icono de editar">
                </div>
                <div class="main__edit-gal-head-input">
                    <label for="fotoCat">Cambiar foto de la categoría:</label>
                    <input type="file" name="fotoCat" id="fotoCat">
                </div>
                <img src="<?php echo $galeriaDats['imagenPrinc'] ?>" alt="Foto principal de la categoría <?php echo $galeriaDats['name'] ?>">
            </div>
        </div>
        <div class="main__edit-gal-body">
            <h2>Imagenes en la categoría: <?php echo $galeriaDats['name'] ?></h2>

            <div class="main__edit-gal-body-field">
                <label for="imgInCats">Añadir imágenes:</label>
                <input type="file" name="imgInCats[]" id="imgInCats" multiple>
            </div>

            <div class="main__edit-gal-body-images-cont">
                <div class="main__edit-gal-body-images-div">
                    <input type="checkbox" name="imgRemoveCats[]" id="imgRemoveCats[]" class="checkboxRemoveFotoCat" value="/build/img/gallery/halloween/halloween1.jpg">
                    <svg style="position: absolute; left: 5px; top: 5px; background: #000000a3; border-radius: 10px;" width="36px" height="36px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="pathBasura" d="M5 6.77273H9.2M19 6.77273H14.8M9.2 6.77273V5.5C9.2 4.94772 9.64772 4.5 10.2 4.5H13.8C14.3523 4.5 14.8 4.94772 14.8 5.5V6.77273M9.2 6.77273H14.8M6.4 8.59091V15.8636C6.4 17.5778 6.4 18.4349 6.94673 18.9675C7.49347 19.5 8.37342 19.5 10.1333 19.5H13.8667C15.6266 19.5 16.5065 19.5 17.0533 18.9675C17.6 18.4349 17.6 17.5778 17.6 15.8636V8.59091M9.2 10.4091V15.8636M12 10.4091V15.8636M14.8 10.4091V15.8636" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <img src="/build/img/gallery/halloween/halloween1.jpeg" alt="Foto halloween">
                </div>
                <div class="main__edit-gal-body-images-div">
                    <input type="checkbox" name="imgRemoveCats[]" id="imgRemoveCats[]" class="checkboxRemoveFotoCat" value="/build/img/gallery/halloween/halloween2.jpg">
                    <svg style="position: absolute; left: 5px; top: 5px; background: #000000a3; border-radius: 10px;" width="36px" height="36px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="pathBasura" d="M5 6.77273H9.2M19 6.77273H14.8M9.2 6.77273V5.5C9.2 4.94772 9.64772 4.5 10.2 4.5H13.8C14.3523 4.5 14.8 4.94772 14.8 5.5V6.77273M9.2 6.77273H14.8M6.4 8.59091V15.8636C6.4 17.5778 6.4 18.4349 6.94673 18.9675C7.49347 19.5 8.37342 19.5 10.1333 19.5H13.8667C15.6266 19.5 16.5065 19.5 17.0533 18.9675C17.6 18.4349 17.6 17.5778 17.6 15.8636V8.59091M9.2 10.4091V15.8636M12 10.4091V15.8636M14.8 10.4091V15.8636" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <img src="/build/img/gallery/halloween/halloween2.jpeg" alt="Foto halloween">
                </div>
                <div class="main__edit-gal-body-images-div">
                    <input type="checkbox" name="imgRemoveCats[]" id="imgRemoveCats[]" class="checkboxRemoveFotoCat" value="/build/img/gallery/halloween/halloween3.jpg">
                    <svg style="position: absolute; left: 5px; top: 5px; background: #000000a3; border-radius: 10px;" width="36px" height="36px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="pathBasura" d="M5 6.77273H9.2M19 6.77273H14.8M9.2 6.77273V5.5C9.2 4.94772 9.64772 4.5 10.2 4.5H13.8C14.3523 4.5 14.8 4.94772 14.8 5.5V6.77273M9.2 6.77273H14.8M6.4 8.59091V15.8636C6.4 17.5778 6.4 18.4349 6.94673 18.9675C7.49347 19.5 8.37342 19.5 10.1333 19.5H13.8667C15.6266 19.5 16.5065 19.5 17.0533 18.9675C17.6 18.4349 17.6 17.5778 17.6 15.8636V8.59091M9.2 10.4091V15.8636M12 10.4091V15.8636M14.8 10.4091V15.8636" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <img src="/build/img/gallery/halloween/halloween3.jpeg" alt="Foto halloween">
                </div>
                <div class="main__edit-gal-body-images-div">
                    <input type="checkbox" name="imgRemoveCats[]" id="imgRemoveCats[]" class="checkboxRemoveFotoCat" value="/build/img/gallery/halloween/halloween4.jpg">
                    <svg style="position: absolute; left: 5px; top: 5px; background: #000000a3; border-radius: 10px;" width="36px" height="36px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="pathBasura" d="M5 6.77273H9.2M19 6.77273H14.8M9.2 6.77273V5.5C9.2 4.94772 9.64772 4.5 10.2 4.5H13.8C14.3523 4.5 14.8 4.94772 14.8 5.5V6.77273M9.2 6.77273H14.8M6.4 8.59091V15.8636C6.4 17.5778 6.4 18.4349 6.94673 18.9675C7.49347 19.5 8.37342 19.5 10.1333 19.5H13.8667C15.6266 19.5 16.5065 19.5 17.0533 18.9675C17.6 18.4349 17.6 17.5778 17.6 15.8636V8.59091M9.2 10.4091V15.8636M12 10.4091V15.8636M14.8 10.4091V15.8636" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <img src="/build/img/gallery/halloween/halloween4.jpeg" alt="Foto halloween">
                </div>
                <div class="main__edit-gal-body-images-div">
                    <input type="checkbox" name="imgRemoveCats[]" id="imgRemoveCats[]" class="checkboxRemoveFotoCat" value="/build/img/gallery/halloween/halloween5.jpg">
                    <svg style="position: absolute; left: 5px; top: 5px; background: #000000a3; border-radius: 10px;" width="36px" height="36px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="pathBasura" d="M5 6.77273H9.2M19 6.77273H14.8M9.2 6.77273V5.5C9.2 4.94772 9.64772 4.5 10.2 4.5H13.8C14.3523 4.5 14.8 4.94772 14.8 5.5V6.77273M9.2 6.77273H14.8M6.4 8.59091V15.8636C6.4 17.5778 6.4 18.4349 6.94673 18.9675C7.49347 19.5 8.37342 19.5 10.1333 19.5H13.8667C15.6266 19.5 16.5065 19.5 17.0533 18.9675C17.6 18.4349 17.6 17.5778 17.6 15.8636V8.59091M9.2 10.4091V15.8636M12 10.4091V15.8636M14.8 10.4091V15.8636" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <img src="/build/img/gallery/halloween/halloween5.jpeg" alt="Foto halloween">
                </div>
            </div>

            <input type="submit" value="Actualizar">
        </div>
    </form>
</main>