<!doctype html>
<html>
    <!-- head -->
    <?php include_once("includes/head.php");?>
    <title>ENSC MarketPlace - Ajouter un produit</title>

    <!-- header -->
    <?php include_once("includes/menu.php");?>

    <!-- body -->
    <body>
        <div class="container" id="container_principal">
            <h1>Ajouter un produit</h1>
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="add_product.php" method="post">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nom</label>
                    <div class="col-sm-6">
                        <input type="text" name="titre" value="" class="form-control" placeholder="Entrez le nom du produit" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Catégorie</label>
                    <div class="col-sm-6">
                        <select name="categorie" size="1">
                            <option selected="-1">-- Séléctionner une catégorie --</option>
                            <?php

                            include_once("includes/connect.php");
                            $MaRequete="SELECT nom FROM categorie";
                            $result= $bdd->query($MaRequete);
                            while ($tuple = $result->fetch() )
                            {
                                echo "<option>".$tuple['nom']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Courte description</label>
                    <div class="col-sm-6">
                        <textarea name="shortDescription" class="form-control" placeholder="Entrez la description qui s'affichera dans la liste de tout les produits." required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Longue description</label>
                    <div class="col-sm-6">
                        <textarea name="longDescription" class="form-control" rows="6" placeholder="Entrez la description qui s'affichera dans la fiche produit." required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Prix</label>
                    <div class="col-sm-4">
                        <input type="number" name="prix" value="" class="form-control" placeholder="Entrez le prix du produit" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Image</label>
                    <div class="col-sm-4">
                        <input type="file" name="image" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-save"></span> Enregistrer</button>
                    </div>
                </div>
            </form>
            <?php
            if(isset($_POST["titre"]) && isset($_POST["shortDescription"]) && isset($_POST["longDescription"]) && isset($_POST["director"]) && isset($_POST["year"]) && (isset($_FILES["image"]) OR $_FILES["image"]['error'] < 1))
            {
                include_once("includes/connect.php");
                include_once("includes/functions.php");
                $titre = formProtection($_POST["titre"]);
                $shortDescription = formProtection($_POST["shortDescription"]);
                $longDescription = formProtection($_POST["longDescription"]);
                $categorie = formProtection($_POST["categorie"]);
                $prix = formProtection($_POST["prix"]);
                $MaRequete="SELECT titre FROM produit WHERE titre=\"".$titre."\";";
                $result= $bdd->query($MaRequete);
                if(!$result)
                {
                    echo "<div class=\"alert alert-danger\">Ce produit est déjà présent...</div>";
                }
                else
                {
                    $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
                    $MaRequete="INSERT INTO produit(titre, //description_long, mov_description_short, mov_director, mov_year, mov_image) VALUES(\"$titre\",\"$longDescription\",\"$shortDescription\",\"$director\", $year, \"$titre.$extension_upload\");";
                    $result= $bdd->query($MaRequete);
                    $nom = "images/{$titre}.{$extension_upload}";
                    $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);
                    echo "<div class=\"alert alert-success\">Ajout effectué !</div>";
                }

            }
            ?>
        </div>
    </body>

    <!-- footer -->
    <?php include_once("includes/footer.html");?>
</html>