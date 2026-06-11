<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

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

    $selected_category = $_GET['category'] ?? null;

    foreach ($categories as $id_category => $name_category):

        if ($selected_category && $selected_category != $id_category) {
            continue;
        }
?>
        <h2 class="name_category"><?= htmlspecialchars($name_category) ?></h2>
        <div class="article">
            <?php include('models/item_display.php'); ?>
        </div>
    <?php endforeach; ?>
</div>
