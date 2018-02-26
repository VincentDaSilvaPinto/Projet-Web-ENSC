<?php
    try{
        $bdd= new PDO("mysql:host=localhost;dbname=ensc_ecommerce;charset=utf8","pierre","Skype31830",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } 
    catch(Exception $e)
    {
        die('Erreur fatale : ' . $e->getMessage());
    }
?>