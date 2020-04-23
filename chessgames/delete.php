<?php
	require 'database.php';
	$id = 0;

	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];

		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM chessgames WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
		header("Location: index.php");

	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
          <a class="navbar-brand" href="index.php"><img width="30px" height="30px" src="img/logo.png"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav nav-pills">
            <li><a href="index.php">Archive</a></li>
            <li><a href="#about"></i>About</a></li>
            <li><a href="#new">New</a></li>
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

    <div class="container">
    			<div>
    				<div class="row text-center" style="margin-top:5%;">
		    			<h3 style="margin-top:50px;">Are you Sure?</h3>
		    		</div><br>
	    			<form class="text-center form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger" style="padding:20px;">Sure</button>
						  <a class="btn btn-primary btn-lg" style="padding:20px;" href="index.php">Nah</a>
						</div>
					</form>
				</div>

    </div>
  </body>
</html>
