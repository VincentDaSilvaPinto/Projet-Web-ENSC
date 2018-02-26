<hedaer>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fas fa-graduation-cap"></i> ENSC - MarketPlace</a>

            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-target">
                <?php
                if(isset($_SESSION["login"]) && $_SESSION["estAdmin"] == 1)
                {
                    echo "<ul class=\"nav navbar-nav\"><li><a href=\"add_product.php\">Ajouter un produit</a></li></ul>";
                }
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <?php
                        if(!isset($_SESSION["login"]))
                        {
                            ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user"></span> Non connecté <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div id="login">
                                        <form class="form-signin form-horizontal" role="form" action="login.php" method="post">
                                            <input type="text" name="login" class="form-control" placeholder="Entrez votre login" required autofocus>

                                            <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>

                                            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Se connecter</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> Bienvenue Mr <?php
                            echo $_SESSION["nom"];
                            ?>
                            <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="panier.php"><i class="fas fa-cart-arrow-down"></i>Panier</a></li>
                                <li><a href="panier.php">Mon compte</a></li>
                                <li><a href="logout.php">Se déconnecter</a></li>
                            </ul>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div><!-- /.container -->
    </nav>
    <br/><br/><br/>
</hedaer>