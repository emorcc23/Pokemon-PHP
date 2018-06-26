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
echo "<td>Ganador</td>";
echo "<td>Victorias</td>";
$batalla = selectRankingBatalla();
while ($fila = mysqli_fetch_array($batalla)) {
    extract ($fila);
    echo "<tr>";
    echo "<td>$winner</td>";
    echo "<td>$victory</td>";
    echo "</tr>";
}
echo "</table>";
echo "</form>";
echo "<form action='index.php' method='POST'>";
echo "<input type='submit' value='Volver a la home'>";
echo "</form>";