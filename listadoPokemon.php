<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'bbdd.php';
echo "<form action='' method='POST'>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>Nombre</td>";
echo "<td>Tipo</td>";
echo "<td>Habilidad</td>";
echo "<td>Ataque</td>";
echo "<td>Defensa</td>";
echo "<td>Velocidad</td>";
echo "<td>Vida</td>";
echo "<td>Nivel</td>";
echo "<td>Entrenador</td>";
echo "</tr>";
$pokemon = selectPokemonLevelLife();
while ($fila = mysqli_fetch_array($pokemon)) {
    extract($fila);
    echo "<tr>";
    echo "<td>$name</td>";
    echo "<td>$type</td>";
    echo "<td>$ability</td>";
    echo "<td>$attack</td>";
    echo "<td>$defense</td>";
    echo "<td>$speed</td>";
    echo "<td>$life</td>";
    echo "<td>$level</td>";
    echo "<td>$trainer</td>";
}

echo "</table>";
echo "</form>";
echo "<form action='index.php' method='POST'>";
echo "<input type='submit' value='Volver a la Home'>";
echo "</form>";