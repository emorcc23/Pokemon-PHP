<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('bbdd.php');
if (isset($_POST["enviar"])) {
    $trainer1 = $_POST["trainer1"];
    $trainer2 = $_POST["trainer2"];
    echo "Entrenador 1: " . $trainer1;
    echo "<form action = 'batallaR.php' method = 'POST'>";
    echo "<input type='hidden' name='train1' value='$trainer1'>";
    echo "Pokemon: <select name='pokemon1'>";
    $pokemon1 = selectPokemonByTrainer($trainer1);
    while ($fila = mysqli_fetch_array($pokemon1)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
    }
    echo "</select></br>";
    echo "Entrenador 2: " . $trainer2;
    echo "<br>";
    echo "<form action='' method='POST'>";
    echo "<input type='hidden' name='train2' value='$trainer2'>";
    echo "Pokemon: <select name='pokemon2'>";
    $pokemon2 = selectPokemonByTrainer($trainer2);
    while ($fila = mysqli_fetch_array($pokemon2)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
    }
    echo "</select></br>";
    echo "<input type='submit' name='Batallar' value='Empezar Batalla'><br>";
    echo "</form>";
} else {
    echo "<form action='' method='POST'>";
    echo "Entrenador 1: <select name='trainer1'>";
    $entrenador1 = selectTrainer();
    while ($fila = mysqli_fetch_array($entrenador1)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
    }
    echo "</select><br>";
    echo "Entrenador2: <select name='trainer2'>";
    $entrenador2 = selectTrainer();
    while ($fila = mysqli_fetch_array($entrenador2)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
    }
    echo "</select><br>";
    echo "<input type='submit' name='enviar' value='Escoger'><br>";
    echo "</form>";
}