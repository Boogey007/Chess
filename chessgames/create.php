<?php

    require 'database.php';

    if ( !empty($_POST)) {
        $infoError = null;
        $whiteError = null;
        $blackError = null;
        $pgnError = null;
        $commentsError = null;

        $info = $_POST['info'];
        $white = $_POST['white'];
        $black = $_POST['black'];
        $pgn = $_POST['pgn'];
        $comments = $_POST['comments'];
        $mydate = getdate();
        echo   $mydate;
    $date = $mydate[year] . '.' . $mydate[mon] . '.' .  $mydate[mday] ;
    $fen = 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1';
    $results = '';

        $valid = true;
        if (empty($info)) {
            $infoError = 'Please enter date, or other information';
            $valid = false;
        }

        if (empty($white)) {
            $whiteError = 'who is white?';
            $valid = false;
        }

        if (empty($black)) {
            $blackError = 'who is black?';
            $valid = false;
        }
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO chessgames (info, white, black ,pgn ,comments ,date ,fen ,results ) values (?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            // TO avoid them sql hackers lol
            $q->execute(array(htmlspecialchars($info),
                              htmlspecialchars($white),htmlspecialchars($black),
                              htmlspecialchars($pgn),
                              htmlspecialchars($comments),
                              htmlspecialchars($date),
                              htmlspecialchars($fen),
                              htmlspecialchars($results)));
            Database::disconnect();
            header("Location:index.php#recent");
        }
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"  >
    <meta name="author" content="Fenimore Love">
    <link rel="icon" href="img/favicon.ico">

    <title>Chess</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/chessboard-0.3.0.css">
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Poiret+One|Quicksand&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <style>
    </style>
  </head>
  <body><div class=text-center>
  You must fill in the 'info', 'white', and 'black' fields before continuing.<br>
<a href="index.php#new">Return</a></div></body>
</html>
