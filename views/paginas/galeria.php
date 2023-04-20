<main class="main-galeria">
    <div class="main-galeria-h1">
        <h1>Galería</h1>        
    </div>

    <div class="main-galeria-grid">

        <?php foreach($cats as $cat) { ?>
            
            <div class="main-galeria-grid-cat">
                <h2><a href="#"><?php echo $cat['name'] ?></a></h2>
                <a href="#">
                    <img src="<?php echo $cat['imagenPrinc'] ?>" alt="Foto de categoría <?php echo $cat['name']?>">
                </a>
            </div>

        <?php } ?>
        <div class="main-galeria-grid-cat">
            <h2><a href="#">Niños</a></h2>
            <a href="#">
                <img src="/build/img/bg/Bg-category.jpeg" alt="Foto de categoría niños">
            </a>
        </div>

        <div class="main-galeria-grid-cat">
            <h2><a href="galeria/halloween">Halloween</a></h2>
            <a href="galeria/halloween">
                <img src="/build/img/bg/Bg-image-index4.jpeg" alt="Foto de categoría Halloween">
            </a>
        </div>

        <div class="main-galeria-grid-cat">
            <h2><a href="#">Exteriores</a></h2>
            <a href="#">
                <img src="/build/img/bg/Bg-image-index4.webp" alt="Foto de categoría Exteriores">
            </a>
        </div>

        <div class="main-galeria-grid-cat">
            <h2><a href="#">Niños</a></h2>
            <a href="#">
                <img src="/build/img/bg/Bg-category.jpeg" alt="Foto de categoría niños">
            </a>
        </div>

        <div class="main-galeria-grid-cat">
            <h2><a href="#">Halloween</a></h2>
            <a href="#">
                <img src="/build/img/bg/Bg-image-index4.jpeg" alt="Foto de categoría Halloween">
            </a>
        </div>

        <div class="main-galeria-grid-cat">
            <h2><a href="#">Niños</a></h2>
            <a href="#">
                <img src="/build/img/bg/Bg-category.jpeg" alt="Foto de categoría niños">
            </a>
        </div>

        <div class="main-galeria-grid-cat">
            <h2><a href="galeria/halloween">Halloween</a></h2>
            <a href="galeria/halloween">
                <img src="/build/img/bg/Bg-image-index4.jpeg" alt="Foto de categoría Halloween">
            </a>
        </div>

        <div class="main-galeria-grid-cat">
            <h2><a href="#">Exteriores</a></h2>
            <a href="#">
                <img src="/build/img/bg/Bg-image-index4.webp" alt="Foto de categoría Exteriores">
            </a>
        </div>

        <div class="main-galeria-grid-cat">
            <h2><a href="#">Niños</a></h2>
            <a href="#">
                <img src="/build/img/bg/Bg-category.jpeg" alt="Foto de categoría niños">
            </a>
        </div>

        <div class="main-galeria-grid-cat">
            <h2><a href="#">Halloween</a></h2>
            <a href="#">
                <img src="/build/img/bg/Bg-image-index4.jpeg" alt="Foto de categoría Halloween">
            </a>
        </div>

    </div>
</main>