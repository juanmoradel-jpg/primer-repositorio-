<?php
    $favoritos=["minecraf","zelda","mario bro","fifa","free fire","pou","terrari","efollboll"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>mi primera web de juan</title>
        <h1>los mejores juegos en mi opinion</h1>
    </head>
    <body>
        <ul> 
            <?php foreach ($favoritos as $juegos) { ?>
                <li><?php echo $juegos; ?></li>
            <?php } ?>
        </ul>
    </body>
</html>
