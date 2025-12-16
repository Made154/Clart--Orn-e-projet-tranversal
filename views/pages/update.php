<?php include('models/update-delete.php') ?>

	<h1>Mettre à jour le produit <?= $article['name'] ?></h1>

	<form method="post">
		<fieldset class="form_modif">
			<label>
				Nom
				<input
					name="name"
					placeholder="Nom du produit"
					autocomplete="name"
					value="<?= $article['name'] ?>" />
			</label>
			<label>
				Catégorie
				<input
					type="number"
					name="id_category"
					placeholder="ID"
					autocomplete="id_category"
					value="<?= $article['id_category'] ?>" />
			</label>
			<label>
				Description
				<input
					name="description"
					placeholder="description"
					autocomplete="description"
					value="<?= $article['description'] ?>" />
			</label>
			<label>
				illustration
				<input
					name="illustration"
					placeholder="illustration"
					autocomplete="illustration"
					value="<?= $article['illustration'] ?>" />
			</label>
			<label>
				new
				<input
					type="number"
					name="is_new"
					placeholder="ID"
					autocomplete="is_new"
					value="<?= $article['is_new'] ?>" />
			</label>
			<label>
				promo
				<input
					type="number"
					name="is_promo"
					placeholder="ID"
					autocomplete="is_promo"
					value="<?= $article['is_promo'] ?>" />
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
			<input
			type="submit"
			value="Mettre à jour" />
		</fieldset>
	</form>

	<form method="post">
		<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
		<input
			type="submit"
			class="outline secondary"
			value="Supprimer l'article" />
	</form>
