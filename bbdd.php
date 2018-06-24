<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Conectar con la base de datos
function conectar($database) {
    $c = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido establecer conexión con la base de datos");
    return $c;
}

//Desconectar con la base de datos
function desconectar($conexion) {
    mysqli_close($conexion);
}

//Inserts
function newTrainer($name, $pokeballs, $potions, $points) {
    $c = conectar("stukemon");
    $insert = "insert into trainer values('$name',$pokeballs,$potions,$points)";
    if (mysqli_query($c, $insert)) {
        echo "Entrenador dado de alta";
        header("refresh:3;url=index.php");
    } else {
        echo mysqli_error($c);
    }
    desconectar($c);
}

function newPokemon($name, $type, $ability, $attack, $defense, $speed, $life, $level, $trainer) {
    $c = conectar("stukemon");
    $insert = "insert into pokemon values('$name','$type','$ability', $attack, $defense, $speed, $life, $level,'$trainer')";
    if (mysqli_query($c, $insert)) {
        echo "Pokemon dado de alta";
        header("refresh:3;url=index.php");
    } else {
        echo mysqli_error($c);
    }
    desconectar($c);
}

function winner($pokemon1, $pokemon2, $winner) {
    $c = conectar("stukemon");
    $insert = "insert into battle(pokemon1, pokemon2, winner) values ('$pokemon1','$pokemon2','$winner')";
    mysqli_query($c, $insert);
    desconectar($c);
}

//Selects

function selectTrainer() {
    $c = conectar("stukemon");
    $query = "select * from trainer;";
    $resultado = mysqli_query($c, $query);
    desconectar($c);
    return $resultado;
}

function selectTrainerPociones() {
    $c = conectar("stukemon");
    $query = "select name from trainer where potions>0 and name in (select trainer from pokemon);";
    $resultado = mysqli_query($c, $query);
    desconectar($c);
    return $resultado;
}

function selectTrainerRanking() {
    $c = conectar("stukemon");
    $query = "select * from trainer order by points desc;";
    $resultado = mysqli_query($c, $query);
    desconectar($c);
    return $resultado;
}

function selectTrainerByName($name) {
    $c = conectar("stukemon");
    $query = "select * from trainer where name='$name';";
    $resultado = mysqli_query($c, $query);
    desconectar($c);
    return $resultado;
}

function selectPokemonByTrainer($trainer) {
    $c = conectar("stukemon");
    $query = "select * from pokemon where trainer='$trainer';";
    $resultado = mysqli_query($c, $query);
    desconectar($c);
    return $resultado;
}

function selectPokemonByName($pokemon) {
    $c = conectar("stukemon");
    $query = "select * from pokemon where name='$pokemon';";
    $resultado = mysqli_query($c, $query);
    desconectar($c);
    return $resultado;
}

function selectPokemonLevelLife() {
    $c = conectar("stukemon");
    $query = "select * from pokemon order by level desc, life desc;";
    $resultado = mysqli_query($c, $query);
    desconectar($c);
    return $resultado;
}

function selectRankingBatalla() {
    $c = conectar("stukemon");
    $select = "select winner, count(*) as victory from battle group by winner order by victory desc;";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

//UPDATES

function updateLvl($name) { //Subida de nivel del pokemon
    $c = conectar("stukemon");
    $update = "update pokemon set level = level + 1 where name='" . $name . "'";
    mysqli_query($c, $update);
    desconectar($c);
}

function update10pts($name) { //Puntos entrenador ganador
    $c = conectar("stukemon");
    $update = "update trainer set points = points + 10 where name='" . $name . "'";
    mysqli_query($c, $update);
    desconectar($c);
}

function update1pto($name) { //Puntos entrenador perdedor
    $c = conectar("stukemon");
    $update = "update trainer set points = points + 1 where name='" . $name . "'";
    mysqli_query($c, $update);
    desconectar($c);
}

function updateVida($name, $life) {
    $c = conectar("stukemon");
    $select = "update pokemon set life = " . $life . " where name='" . $name . "'";
    mysqli_query($c, $select);
    desconectar($c);
}

function modificarpociones($name) {
    $c = conectar("stukemon");
    $update = "update trainer set potions=potions-1 where name='$name'";
    if (mysqli_query($c, $update)) {
        echo "Pociones actualizadas<br>";
    } else {
        echo mysqli_error($c);
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' value='Volver a la home'>";
        echo "</form>";
    }
    desconectar($c);
}

function modificarvidapokemon($pokemon) {
    $c = conectar("stukemon");
    $update = "update pokemon set life=life+50 where name='$pokemon'";
    if (mysqli_query($c, $update)) {
        echo "Vida modificada<br>";
        header("refresh:3;url=index.php");
    } else {
        echo mysqli_error($c);
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' value='Volver a la home'>";
        echo "</form>";
    }
    desconectar($c);
}

function updatePociones($puntosFinal, $pociones, $name) {
    $c = conectar("stukemon");
    $update = "update trainer set points=points-$puntosFinal, potions=potions+$pociones where name='$name'";
    if (mysqli_query($c, $update)) {
        echo "Puntos y pociones actualizados<br>";
        header("refresh:3;url=index.php");
    } else {
        echo mysqli_error($c);
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' value='Volver a la home'>";
        echo "</form>";
    }
    desconectar($c);
}
