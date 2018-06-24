<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'bbdd.php';
if (isset($_POST['enviar'])) {
    extract($_POST);
    newTrainer($name, $pokeballs, $potions, 0);
} else {
    echo "<form action='' method='POST'>";
    echo "<p>Nombre: <input type='text' name='name' required></p>";
    echo "<p>Pokeballs: <input type='number' name='pokeballs' required></p>";
    echo "<p>Pociones: <input type='number' name='potions' required></p>";
    echo "<p><input type='submit' name='enviar' value='Alta entrenador'></p>";
    echo "</form>";
}