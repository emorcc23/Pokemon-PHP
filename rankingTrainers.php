<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'bbdd.php';
echo "<form action='' method='POST'>";
echo'<table border="1">';
echo "<tr>";
echo "<td>Nombre</td>";
echo "<td>Puntos</td>";
echo "<td>Pokeballs</td>";
echo "<td>Pociones</td>";
echo "</tr>";
$trainer = selectTrainerRanking();
while ($fila = mysqli_fetch_array($trainer)) {
    extract($fila);
    echo "<tr>";
    echo "<td>$name</td>";
    echo "<td>$points</td>";
    echo "<td>$pokeballs</td>";
    echo "<td>$potions</td>";
    echo "</tr>";
}
echo'</table>';
echo "</form>";
echo "<form action='index.php' method='post'>";
echo "<input type='submit' value='Volver a la home'>";
echo "</form>";