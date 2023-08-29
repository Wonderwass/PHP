<?php if (isset($_SESSION['id'])) { ?>
    <nav>
        <a href="post.php">publier</a>
        <div class="profil">
            <img src="imgs/<?php echo $_SESSION["img"]; ?>" alt="profil">
        </div>
        <form method="post">
            <button class="logout" name="logout">Deconnexion</button>
        </form>
    </nav>
<?php } else { ?>
    <nav>
        <button><a href="connexion.php">Connexion</a></button>
    </nav>
<?php } ?>
<?php
if (isset($_POST['logout'])) {
    session_destroy();
    // header("Loaction: index_2.php");
    echo "<script>location.href = 'index_2.php'</script>";//pour rediriger vers la page
}
?>