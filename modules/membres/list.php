<?php

require_once '../../config/db.php';

$req = $bdd->query("SELECT * FROM membres");
$membres = $req->fetchAll();
?>