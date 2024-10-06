<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hämta och filtrera formulärdata
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validera data
    $errors = [];
    if (empty($name)) {
        $errors[] = "Namn är obligatoriskt.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Ogiltig e-postadress.";
    }
    if (empty($message)) {
        $errors[] = "Meddelande är obligatoriskt.";
    }

    // Om det inte finns några fel, skicka meddelandet
    if (empty($errors)) {
        // Här kan du lägga till koden för att skicka e-post eller spara meddelandet i databasen.
        // Exempelvis:
        // mail($to, $subject, $message, $headers);
        echo "<p>Tack för ditt meddelande, vi hör av oss snart!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Lägg till din CSS-fil -->
    <title>Kontakta Oss</title>
</head>
<body>
    <section class="contact">
        <div class="contact-container">
            <h2>Kontakta Oss</h2>
            <p>Vi ser fram emot att höra från dig!</p>

            <?php if (!empty($errors)): ?>
                <div class="error-messages">
                    <?php foreach ($errors as $error): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="post" action="">
                <div class="form-group">
                    <label for="name">Namn:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">E-post:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Meddelande:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Skicka Meddelande</button>
            </form>
        </div>
    </section>
</body>
</html>
