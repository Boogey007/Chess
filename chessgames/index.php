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
         body {
         padding-top:40px;
         }
         .welcome {
         padding: 40px 15px;
         text-align: center;
         }
         .section-examples h4 {font-family:sans-serif;}
      </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/chessboard-0.3.0.js"></script>
      <script src="js/chess.js"></script>
   </head>
   <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#"><img width="30px" height="30px" src="img/logo.png"></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
               <ul class="nav navbar-nav nav-pills">
                  <li><a href="#recent">Archive</a></li>
                  <li><a href="#about"></i>About</a></li>
                  <li><a href="#new">New</a></li>
                  <li><a href="Instructions.html">Instructions</a></li>
                  <li><a href="chess2.html">Rules</a></li>
               </ul>
               <form class="navbar-form navbar-left" style="display:none;" role="search">
                  <div class="form-group">
                     <input type="text" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-default">Search</button>
               </form>
            </div>
         </div>
      </nav>
      <div class="jumbotron">
         <div class="container">
            <h1 style="color:#0077ff">CHESS</h1>
         </div>
      </div>
      <div class="container">
      <h3>GAMES SAVED</h3>
         <div class="row">
            <div class="col-md-10">
               <table class="tabletable-hover">
                  <thead>
                     <tr>
                        <th style="width:200px">info</th>
                        <th style="width:80px;">White</th>
                        <th style="width:80px;">Black</th>
                        <th style="width:350px;padding-left:20px;" class="hidden-xs">Notation pgn</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        include 'database.php';
                        $pdo = Database::connect();
                        $sql = 'SELECT * FROM chessgames ORDER BY id ASC';
                         foreach ($pdo->query($sql) as $row) {
                         		echo '<tr>';
                          	echo '<td>'. $row['info'] . '<br><div>' . $row['date'] . '</div> <br><div class="text-center">' . $row['results'] . '</div> </td>';
                          	echo '<td><div id="player'.$row['white'].'-'.$row['id'].'">'. $row['white'] . '</div></td>';
                          	echo '<td><div id="player'.$row['black'].'-'.$row['id'].'">'. $row['black'] . '</div></td>';
                                  echo '<td style="font-family:monospace;padding:20px;" class="hidden-xs">'. $row['pgn'] . '</td>';
                          	echo '<td>';
                          	echo '<a class="btn btn-primary index-button" href="update.php?id='.$row['id'].'" style="margin-top:15%"><span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span> Play</a>';
                          	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                          echo '<br>';
                          	echo '<a class="btn btn-default index-button" href="delete.php?id='.$row['id'].'" style="margin-top:5%"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>';
                          	echo '</td>';
                          	echo '<td>';
                          	echo '<div id=board'.$row['id'] .' style="width:170px;padding:5px;"> </div>';
                                  echo '<script>';
                                  echo 'var position = "'.$row['fen'].'";';
                                  echo 'var board'.$row['id'].' = ChessBoard("board'.$row['id'].'",{position: position,  showNotation: false });';
                                  echo 'var chess = new Chess("'.$row['fen'].'");';
                                  echo 'if (chess.turn() === "b") {board'.$row['id'].'.flip();document.getElementById("player'.$row['black'].'-'.$row['id'].'").style.color = "#B0464C";document.getElementById("player'.$row['black'].'-'.$row['id'].'").style.fontWeight = "bolder";document.getElementById("player'.$row['black'].'-'.$row['id'].'").style.textTransform = "uppercase";};';
                                  echo 'if (chess.turn() === "w") {document.getElementById("player'.$row['white'].'-'.$row['id'].'").style.color = "#B0464C";document.getElementById("player'.$row['white'].'-'.$row['id'].'").style.fontWeight = "bolder";document.getElementById("player'.$row['white'].'-'.$row['id'].'").style.textTransform = "uppercase";};';
                                  echo '</script>';
                          	echo '</td>';
                          	echo '</tr>';
                        }
                        Database::disconnect();
                        ?>
                  </tbody>
                  <a id="recent"></a>
               </table>
            </div>
         </div>
         <a id="about"></a>
         <hr width="100%">
         <div class="row">
            <div class="col-md-4">
               <h2>About</h2>
               <p>
                  This chess game consists of the externals of our mini peoject 2 and new internals of php to work better with the database portion. 
                  Chess validation goes to the two very sophisticated libraries <a href="http://chessboardjs.com/">chessboard.js</a> 
                  and <a href="https://github.com/jhlywa/chess.js/">chess.js</a>
               </p>
            </div>
            <div class="col-md-5">
               <h3>Comments</h3>
               <p>
                  To start a challenge, select ‘New’. Then fill in the fields: info, blank name, white and black, and the PGN notation.
                  <br>Example: <code>1. e4</code>.
               </p>
               <br>
               <div class=text-center><a class="btn btn-lg btn-primary" href="#new">Start a challenge</a></div>
            </div>
         </div>
         <div class="row"style="margin-bottom:2%">
            <div class="col-md-4">
               <img style="width:96%;height:auto"  src="img/play.jpg" />
               <br>
               <h4>PGN?</h4>
               <p>
                  Portable Game Notation (PGN) is a plain text computer-processible format 
                  for recording chess games (both the moves and related data), supported by many chess programs.
               </p>
            </div>
            <div class="col-md-5">
               <h3>Notation PGN</h3>
               <p>  
                  For PGN, each move is represented with letters and numbers. This app uses English notation; it wants
                  say that K = king, Q = queen, B = bishop, N = knight, and R = rook (no capital letter indicates the pawn). 
                  From the chessboard, the bottom axes are alphabetical, side axes are numeric. Each shot is composed of a white and black movement
                  (in that order). Finally, there are some other notations, such as 'x' (which means, take) and '+' (which means, failure).
               </p>
            </div>
         </div>
         <div class="row">
            <a id="new"></a>
            <h2 style="padding-left:15px;">Create</h2>
            <h3 style="padding-left:15px;">Some openings:</h3>
         </div>
         <div class="row section-examples">
            <div class="col-md-3 text-center">
               <div id="boarde4" style="width: 200px; float: left; margin-right: 10px"></div>
               <br>
               <h4>1. e4</h4>
            </div>
            <div class="col-md-3 text-center">
               <div id="boardd4" style="width: 200px; float: left; margin-right: 10px"></div>
               <br>
               <h4>1. d4</h4>
            </div>
            <div class="col-md-3 text-center">
               <div id="boardNf3" style="width: 200px; float: left"></div>
               <br>
               <h4>1. Nf3</h4>
            </div>
         </div>
         <hr>
         <form action="create.php" method="post">
            <div class="row" style="margin-top:10px">
               <div class="col-md-3">
                  <label class="text-uppercas">info</label><br>
                  <input name="info" type="text"  class="form-control" placeholder="info" value="<?php echo !empty($info)?$info:'';?>">
                  <label class="text-uppercas">Notation pgn</label><br>
                  <input name="pgn" type="text"  class=" form-control" placeholder="Override Value" value="<?php echo !empty($pgn)?$pgn:'';?>">
               </div>
               <div class="col-md-3">
                  <label class="text-uppercas">White</label><br>
                  <input name="white" type="text" class="form-control" placeholder="White's Name" value="<?php echo !empty($white)?$white:'';?>">
                  <label class="text-uppercas">Black</label><br>
                  <input name="black" class=" form-control" type="text" placeholder="Black's Name" value="<?php echo !empty($black)?$black:'';?>">
                  <div style="display:none">
                     <label>comments</label><br>
                     <input name="comments" type="text" placeholder="comments" value="<?php echo !empty($comments)?$comments:'';?>">
                  </div>
               </div>
               <div class="col-md-3"><br>
                  <button type="submit" class="btn btn-lg btn-primary">LET THE BATTLE BEGIN</button>
               </div>
            </div>
         </form>
         <div class="row text-center">
            <hr>
         </div>
      </div>
      <script>
         var boarde4 = ChessBoard('boarde4', {
           position: 'rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1',
           showNotation: true
         });
         
         var boardd4 = ChessBoard('boardd4', {
           position: 'rnbqkbnr/pppppppp/8/8/3P4/8/PPP1PPPP/RNBQKBNR b KQkq d3 0 1',
           showNotation: true
         });
         
         var boardNf3 = ChessBoard('boardNf3', {
           position: 'rnbqkbnr/pppppppp/8/8/8/5N2/PPPPPPPP/RNBQKB1R b KQkq - 1 1',
           showNotation: true
         });
      </script>
   </body>
</html>