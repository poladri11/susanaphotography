<main class="main-galeria">
    <div class="main-galeria-h1">
        <h1>Galería</h1>        
    </div>

    <div class="main-galeria-grid">

        <?php foreach($cats as $cat) { ?>
            
            <div class="main-galeria-grid-cat">
                <h2><a href="/galeria/<?php echo str_replace("ñ", "C3B1", $cat['name']); ?>"><?php $name = str_replace("_"," ", ucfirst($cat['name'])); echo str_replace("C3B1", "ñ", $name);?></a></h2>
                <a href="/galeria/<?php  $cat['name'] = str_replace(" ","_", $cat['name']); echo str_replace("ñ", "C3B1", $cat['name']); ?>">
                    <img class="galeria-frontimg" data-imgloaded="<?php echo $cat['imagenPrinc'] ?>" src="/build/img/gallery/placeholder-image.png" alt="Foto de categoría <?php echo $cat['name']?>">
                </a>
            </div>

        <?php } ?>
        
    </div>
</main>