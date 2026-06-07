<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (($_SESSION['user_role'] ?? null) !== 1) {
    header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=home");
    exit;
}

$categories = [
    1 => 'Bureau',
    2 => 'Lampadaire',
    3 => 'Suspension',
    4 => 'Murale',
    5 => 'Table',
    6 => 'LED',
    7 => 'Enfants',
];
?>

<?php require('models/add.php') ?>

<link rel="stylesheet" href="assests/css/add-product.css?v=<?= time() ?>">

<section class="add-page">

    <div class="add-card">

        <div class="add-card__header">
            <span class="add-card__badge">Admin</span>
            <h1 class="add-card__title">Ajouter un produit</h1>
            <p class="add-card__subtitle">Remplis les champs pour ajouter un article à la boutique.</p>
        </div>

        <?php if (isset($_SESSION['add_success'])): ?>
            <p class="add-card__msg add-card__msg--success"><?= htmlspecialchars($_SESSION['add_success']); unset($_SESSION['add_success']); ?></p>
        <?php endif; ?>
        <?php if (isset($_SESSION['add_error'])): ?>
            <p class="add-card__msg add-card__msg--error"><?= htmlspecialchars($_SESSION['add_error']); unset($_SESSION['add_error']); ?></p>
        <?php endif; ?>

        <form action="index.php?page=add-product" method="POST" class="add-form">

            <div class="add-form__row">
                <div class="add-form__group">
                    <label for="name">Nom du produit</label>
                    <input type="text" id="name" name="name" placeholder="Ex : Lampe Architecte" required>
                </div>
                <div class="add-form__group">
                    <label for="price">Prix (€)</label>
                    <input type="number" id="price" name="price" placeholder="Ex : 49.99" step="0.01" min="0" required>
                </div>
            </div>

            <div class="add-form__group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Décrivez le produit..." rows="3" required></textarea>
            </div>

            <div class="add-form__group">
                <label for="illustration">URL de l'image</label>
                <input type="url" id="illustration" name="illustration" placeholder="https://..." oninput="previewImage(this.value)">
                <div class="add-form__preview" id="imagePreview">
                    <img id="previewImg" src="" alt="" style="display:none;">
                    <span id="previewPlaceholder">L'aperçu apparaîtra ici</span>
                </div>
            </div>

            <div class="add-form__group">
                <label for="id_category">Catégorie</label>
                <select id="id_category" name="id_category" required>
                    <option value="" disabled selected>Choisir une catégorie</option>
                    <?php foreach ($categories as $id => $label): ?>
                        <option value="<?= $id ?>"><?= htmlspecialchars($label) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="add-form__actions">
                <a href="index.php?page=shop" class="add-form__cancel">Annuler</a>
                <button type="submit" class="add-form__submit">Ajouter le produit</button>
            </div>

        </form>
    </div>
</section>

<script>
function previewImage(url) {
    const img = document.getElementById('previewImg');
    const placeholder = document.getElementById('previewPlaceholder');
    if (url) {
        img.src = url;
        img.style.display = 'block';
        placeholder.style.display = 'none';
        img.onerror = () => {
            img.style.display = 'none';
            placeholder.style.display = 'block';
        };
    } else {
        img.style.display = 'none';
        placeholder.style.display = 'block';
    }
}
</script>
