<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'bbdd.php';
if (isset($_POST['enviar'])) {
    echo "<form action='mejorarvida.php' method='POST'>";
    $enviar = $_POST['enviar'];
    $nombre = $_POST['trainer'];
    echo "<input type='hidden' value='$nombre' name='entrenador'>";
    echo "Selecciona cual es tu pokemon: ";
    echo "<select name='pokemon'>";
    $nombre2 = selectPokemonByTrainer($nombre);
    while ($fila = mysqli_fetch_array($nombre2)) {
        extract($fila);
        echo "<option value='$name'>$name. Vida: $life</option>";
    }
    echo "</select>";
    echo "<input type='submit' value='Seleccionar pokemon' name='enviar2'>";
    echo "</form>";
} else if (isset ($_POST['enviar2'])) {
    $entre = $_POST['entrenador'];
    $pokemon = $_POST['pokemon'];
    modificarpociones($entre);
    modificarvidapokemon($pokemon);
} else {
    echo "<form action='mejorarVida.php' method='POST'>";
    echo "Selecciona entrenador: ";
    echo "<select name='trainer'>";
    $nombres = selectTrainerPociones();
    while ($fila = mysqli_fetch_array($nombres)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
    }
    echo "</select>";
    echo "<input type='submit' value='Seleccionar entrenador' name='enviar'>";
    echo "</form>";
}