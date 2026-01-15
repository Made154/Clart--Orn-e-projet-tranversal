<div class="info-services-square">
    <nav class="info-services-Placement">
	    <a href="index.php?page=home" class="info-services-Nom_boutique">Clarté Ornée</a>
    </nav>
</div>

<?php include ('models/send_contact.php') ?>

<section class="cadre-info-services">

    <div class="bloc-info-services">
        <div class="bloc-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d176.741062244013!2d-0.5603127566834009!3d44.86520596255661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd55288b8a573049%3A0xed97b0103081ecaf!2sEPSI%20-%20Ecole%20d%E2%80%99ing%C3%A9nierie%20informatique%20-%20Bordeaux!5e0!3m2!1sfr!2sfr!4v1765898954644!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="contact-container">
            <h2>Contactez-nous</h2>
            <p>Une question, un conseil ou un message ? Notre équipe vous répond rapidement.</p>


           
            <form action="" method="POST" class="contact-form">
                <input type="email" name="email" placeholder="Votre email" required>
                <textarea name="message" rows="5" placeholder="Votre message" required></textarea>
                <button type="submit" name="send_message">Envoyer le message</button>
            </form>

            <?php if (!empty($confirmationMessage)): ?>
                 <p class="confirmation-message"><?= htmlspecialchars($confirmationMessage) ?></p>
            <?php endif; ?>

        </div>
</section>
