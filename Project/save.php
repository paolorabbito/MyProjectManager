<?php 
include '../connect.php';

if(isset($_POST['save'])){
    $nome= $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $categoria = $_POST['categoria'];

    $query ="SELECT * FROM categorie WHERE nome = '$categoria'";
    $result = $mysql->query($query) or die($mysql->error);

    if(count($result)==1){
        $row = $result->fetch_assoc();
        $cat = $row['id'];
    }

    $sql = sprintf("INSERT INTO progetti (nome, descrizione, attivo, categoria)
            VALUES('$nome', '%s', 1, '$cat')", $mysql->real_escape_string($descrizione));

    $mysql->query($sql) or die($mysql->error);

    header("location: ../index.php");
}