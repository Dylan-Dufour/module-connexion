<?php
session_start();
$conn = new mysqli("localhost", "root", "", "moduleconnexion");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST["login"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    if ($password === $confirm) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $login, $prenom, $nom, $hash);
        $stmt->execute();
        header("Location: connexion.php"); // Redirection après inscription
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>    
        <!-- === STYLES CSS === -->
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/inscription.css">
    <link rel="stylesheet" href="./assets/css/connexion.css">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link rel="stylesheet" href="./assets/css/profil.css">

    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form method="post">
            Login : <input type="text" name="login" required><br>
            Prénom : <input type="text" name="prenom" required><br>
            Nom : <input type="text" name="nom" required><br>
            Mot de passe : <input type="password" name="password" required><br>
            Confirmer mot de passe : <input type="password" name="confirm" required><br>
            <button type="submit">S’inscrire</button>
        </form>
    </div>
</body>
</html>
