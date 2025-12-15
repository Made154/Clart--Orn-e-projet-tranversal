<?php include('views/partials/_search.php') ?>

    <h2 class=name_category>Bureau</h2><a href="index.php?page=add-product">Ajouter</a>
        <div class=article>
            <?php 
                $id_category = 1;
                include('models/item_display.php') 
            ?>
        </div>
    <h2 class=name_category>Lampadaire</h2>
        <div class=article>
            <?php 
                $id_category = 2;
                include('models/item_display.php') 
            ?>
        </div>
    <h2 class=name_category>Suspension</h2>
        <div class=article>
        <?php 
                $id_category = 3;
                include('models/item_display.php') 
            ?>
        </div>
    <h2 class=name_category>Murale</h2>
        <div class=article>
            <?php 
                $id_category = 4;
                include('models/item_display.php') 
            ?>
        </div>
    <h2 class=name_category>Table</h2>
        <div class=article>
            <?php 
                $id_category = 5;
                include('models/item_display.php') 
            ?>
        </div>
    <h2 class=name_category>LED</h2>
        <div class=article>
            <?php 
                $id_category = 6;
                include('models/item_display.php') 
            ?>
        </div>
    <h2 class=name_category>Enfants</h2>
        <div class=article>
            <?php 
                $id_category = 7;
                include('models/item_display.php') 
            ?>
        </div>