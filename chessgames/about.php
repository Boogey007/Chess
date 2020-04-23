<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"  >
    <link rel="icon" href="img/favicon.ico">

    <title>Chess</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
      body {
        padding-top: 50px;
      }
      .welcomehelp {
        padding: 40px 15px;
      }
      .btn-primary {
        background-color: #0077ff;
                 border-color: e8e8e8;
      }
      .btn-primary:hover {
        background-color: #e8e8e8;
        color: black;
        border-color: black;
      }
    </style>

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
            <li><a href="index.php">Archive</a></li>
            <li  class="active"><a href="#about">About</a></li>
            <li><a href="create.php">New</a></li>
            <li><a href="Instructions.html">Instructions</a></li>
            <li><a href="chess2.html">Rules</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
<div class="row welcomehelp">
  <div class="col-md-3 col-md-offset-1"><br><br>  
  <h2>About</h2>
  </div>
  <div class="col-md-4">  
  <img style="width:200px;height:auto;margin-left:25%;" src="img/play.jpg" />
  </div>

</div>
<div class="row">
  <div class="col-md-4 col-md-offset-1">
<div class="panel panel-default">
  <div class="panel-body">
          <p>
            This is a database that can be used by anyone. It's for slow games, 
            like snails, and private games. The chess software uses two very refined libraries
            <a href="http://chessboardjs.com/">chessboard.js</a> for the chessboard and
            <a href="https://github.com/jhlywa/chess.js/">chess.js</a>
            for validation of moves.
          </p>

        <h4>How to play</h4>
          <p>To start a challenge, select 'New'. Then fill in the fields: info, white name, 
          black name, and PGN notation.
          For example: <code>1. e4</code>.
          </p>
  </div>
</div>

  </div>
  <div class="col-md-4">
<div class="panel panel-default">

  <div class="panel-body">
        <h4>Notation PGN</h4>
        <p>  
          For PGN, each move is represented with letters and numbers. This app uses English notation; it wants
          say that K = king, Q = queen, B = bishop, N = knight, and R = rook (no capital letter indicates the pawn). 
          From the chessboard, the bottom axes are alphabetical, side axes are numeric. Each shot is composed of a white and black movement
          (in that order). Finally, there are some other notations, such as 'x' (which means, take) and '+' (which means, failure).
        </p>
  </div>
</div>

  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

