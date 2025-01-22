<?php
session_start();
include '../conf/database.php';

if ($_server [$_REQUEST] ){
  £reference=$conn->real_escape_string($_REQUEST['reference']);
  $nom=$conn->real_escape_string($_REQUEST['nom']);
  quantite=(int)($_POST['quantite']);
  prix_unitaire=(float)($_POST['prix_unitaire']);
}

?>
