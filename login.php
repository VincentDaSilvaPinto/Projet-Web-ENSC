<!doctype html>
<html>
    <!-- head -->
    <?php include_once("includes/head.php");?>
    <title>ENSC MarketPlace - Connexion</title>

    <!-- header -->
    <?php include_once("includes/menu.php");?>

    <!-- body -->
    <body>
        <div class="container" id="container_principal">
            <h2 class="text-center">Connexion</h2>

            <?php
            include_once("includes/connect.php");
            include_once("includes/functions.php");
            if(isset($_POST["login"]) && isset($_POST["password"]))
            {
                $login = formProtection($_POST["login"]);
                $password = formProtection($_POST["password"]);
                $MaRequete='SELECT nom, password, estAdmin FROM utilisateur where login = "'.$login.'" LIMIT 1;';
                $result= $bdd->query($MaRequete);
                if($result)
                {
                    $userPassword = "";
                    $nom = "";
                    while ($tuple = $result->fetch() )
                    {
                        $userPassword = $tuple["password"];
                        $_SESSION["nom"]=$tuple["nom"];
                        $_SESSION["estAdmin"] = $tuple["estAdmin"];
                    }
                    if($userPassword == $password)
                    {
                        $_SESSION["login"]=$login;
                        header("Location: index.php");
                    }
                } ?>
                <div class="alert alert-danger">
                    <strong>Erreur !</strong> Utilisateur non reconnu(e)
                </div>
                <?php
            }
            ?>

            <div class="well">
                <form class="form-signin form-horizontal" role="form" action="login.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <input type="text" name="login" class="form-control" placeholder="Entrez votre login" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Se connecter</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        </div>
    </body>

    <!-- footer -->
    <?php include_once("includes/footer.html");?>
</html>