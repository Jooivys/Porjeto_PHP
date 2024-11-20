<?php
include_once("templates/topo.php"); // incluio o topo do site

if (empty($_SERVER["QUERY_STRING"])) {
    $var = "inicio.php"; // se o usuario não escolheu nada, vai ir para esse arquivo
    include_once($var);
} else {
    $pg = $_GET['pg'];
    include_once("$pg.php");
}

include_once("templates/rodape.php");



    