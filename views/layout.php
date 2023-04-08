<?php

    $auth = $_SESSION['auth'] ?? false;

    include 'templates/header.php';
?>


<?php echo $contenido; ?>
    
<?php
    include 'templates/footer.php';
?>