<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'bbdd.php';
if (isset($_POST['obtener'])) {
    $entrenador = $_POST['trainer'];
    $pociones = $_POST['potions'];
    $select = selectTrainerByName($entrenador);
    $fila = mysqli_fetch_array($select);
    extract($fila);
    $puntosFinal = 10 * $pociones;
    if ($points > $puntosFinal) {
        updatePociones($puntosFinal, $pociones, $entrenador);
    } else {
        $select = selectTrainerByName($entrenador);
        $fila = mysqli_fetch_array($select);
        extract($fila);
        $faltan = $puntosFinal - $points;
        echo "A $entrenador que tiene $points puntos, le faltan $faltan puntos para obtener $pociones pociones";
        echo "<form action='index.php' method='POST'>";
        echo "<input type='submit' value='Volver a la home'>";
        echo "</form>";
    }
} else {
    echo "<form action='' method='POST'>";
    echo "Seleccionar Entrenador: ";
    echo "<select name='trainer'>";
    $trainer = selectTrainer();
    while ($fila = mysqli_fetch_array($trainer)) {
        extract ($fila);
        echo "<option value='$name'>$name. Pociones: $potions. Puntos: $points</option>";
    }
    echo "</select>";
    echo "Introducit numero de pociones: <input type='number' name='potions'>";
    echo "<input type='submit' value='Obtener pociones' name='obtener'>";
    echo "</form>";
}