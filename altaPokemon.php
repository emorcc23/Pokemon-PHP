<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'bbdd.php';
if (isset($_POST['enviar'])) {
    extract($_POST);
    newPokemon($name, $type, $ability, $attack, $defense, $speed, $life, 0, $trainer);
} else {
    echo "<form action='' method='POST'>";
    echo "<p>Nombre: <input type='text' name='name' required></p>";
    echo "<p>Tipo: <input type='text' name='type' required></p>";
    echo "<p>Habilidad: <input type='text' name='ability' required></p>"; 
    echo "<p>Ataque: <input type='number' name='attack' required></p>";
    echo "<p>Defensa: <input type='number' name='defense' required></p>";
    echo "<p>Velocidad: <input type='number' name='speed' required></p>";
    echo "<p>Vida: <input type='number' name='life' required></p>";
    $datos = selectTrainer();
    echo "<p>Entrenador: <select name='trainer' required>";
    while ($fila = mysqli_fetch_array($datos)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
    }
    echo "</select></p>";
    echo "<p><input type='submit' name='enviar' value='Alta Pokemon'></p>";
    echo "</form>";
}