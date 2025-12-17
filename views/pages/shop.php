<?php 
session_start();
?>

<?php include('views/partials/_search.php') ?>

<div class="shop">
    <?php if (($_SESSION['user_role'] ?? null) === 1) { ?>
        <button><a href="index.php?page=add-product" class="btn">Ajouter</a></button>
    <?php } ?>
    
    <?php 
    $categories = [
        1 => 'Bureau',
        2 => 'Lampadaire',
        3 => 'Suspension',
        4 => 'Murale',
        5 => 'Table',
        6 => 'LED',
        7 => 'Enfants'
    ];

    foreach ($categories as $id_category => $name_category): ?>
        <h2 class="name_category"><?= htmlspecialchars($name_category) ?></h2>
        <div class="article">
            <?php include('models/item_display.php'); ?>
        </div>
    <?php endforeach; ?>
</div>
