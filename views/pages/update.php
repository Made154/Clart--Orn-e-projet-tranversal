<?php include('models/update-delete.php') ?>

<h1>Mettre à jour le produit <?= $article['name'] ?></h1>

<form method="post">
	<fieldset class="grid">
		<label>
			Nom
			<input
				name="name"
				placeholder="Nom du produit"
				autocomplete="name"
				value="<?= $article['name'] ?>" />
		</label>
		<label>
			Prix
			<input
				type="number"
				name="price"
				placeholder="€"
				autocomplete="price"
				value="<?= $article['price'] ?>" />
		</label>
	</fieldset>
	<input
		type="submit"
		value="Mettre à jour" />
</form>

<form method="post">
	<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
	<input
		type="submit"
		class="outline secondary"
		value="Supprimer l'article" />
</form>