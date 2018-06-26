<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('bbdd.php');
if (isset($_POST["Batallar"])) {
    $pokemon1 = $_POST["pokemon1"];
    $pokemon2 = $_POST["pokemon2"];
    $trainer1 = $_POST["train1"];
    $trainer2 = $_POST["train2"];

    $poke1 = selectPokemonByName($pokemon1);
    $fila1 = mysqli_fetch_array($poke1);
    extract($fila1);
    $fuerza1 = $attack + 2 * $level;
    $vida1 = $life;
    $pok1 = $name;

    $poke2 = selectPokemonByName($pokemon2);
    $fila2 = mysqli_fetch_array($poke2);
    extract($fila2);
    $fuerza2 = $attack + 2 * $level;
    $vida2 = $life;
    $pok2 = $name;

    $result1 = $vida1 - $fuerza2;
    if ($result1 < 0) {
        $result1 = 0;
    }
    updateVida($pokemon1, $result1);
    echo "Vida $pok1: $result1.<br>";

    $result2 = $vida2 - $fuerza1;
    if ($result2 < 0) {
        $result2 = 0;
    }
    updateVida($pokemon2, $result2);
    echo "Vida $pok2: $result2.<br>";

    if ($result1 > $result2) {
        winner($pokemon1, $pokemon2, $pokemon1);
        updateLvl($pokemon1);
        update10pts($trainer1);
        update1pto($trainer2);
        echo "Gana $pokemon1!!";
    }
    if ($result2 > $result1) {
        winner($pokemon1, $pokemon2, $pokemon2);
        updateLvl($pokemon2);
        update10pts($trainer2);
        update1pto($trainer1);
        echo "Gana $pokemon2!!";
    }

    echo "<form action='index.php' method='post'>";
    echo "<input type='submit' value='Volver a la home'>";
    echo "</form>";
}