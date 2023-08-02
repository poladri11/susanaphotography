<main class="main-galeria-category">
    <div class="main-galeria-category-head">
        <h1><?php $currentCat['name'] = str_replace("_"," ", ucfirst($currentCat['name'])); echo str_replace("C3B1", "ñ", $currentCat['name']); ?></h1>
        <a href="/galeria">Volver</a>    
    </div>

    <div class="main-galeria-category-grid">

        <?php foreach($pics as $pic) { ?>
            <div class="main-galeria-category-grid-cat">
                <a target="_blank" href="<?php echo $pic['pathFotoFullres'] ?>">
                    <img data-srcset="<?php echo $pic['pathFoto'] ?>" class="lazy" src="/build/img/gallery/placeholder-image.png" alt="Foto de categoría <?php echo $currentCat['name'] ?>">
                </a>
            </div>
        <?php } ?>


    </div>
</main>