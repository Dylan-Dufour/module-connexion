<?php
session_start();
$conn = new mysqli("localhost", "root", "", "moduleconnexion");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM utilisateurs WHERE login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["login"] = $user["login"];
        $_SESSION["prenom"] = $user["prenom"];
        $_SESSION["nom"] = $user["nom"];
        header("Location: index.php");
    } else {
        echo "Login ou mot de passe incorrect.";
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
    <title>Connexion</title>
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <form method="post">
            Login : <input type="text" name="login" required><br>
            Mot de passe : <input type="password" name="password" required><br>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
