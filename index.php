<!DOCTYPE HTML>
<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
					integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="css/stylesheet.css"/>


		<title>To Do</title>
	</head>
	<body>

		<div id="container">
			<h1>To Do</h1>

			<ul id="tabs">
				<li id="todo_tab" class="selected"><a href="#">To Do</a></li>
			</ul>

			<div id="main">

				<div id="todo">
			  <?php

			  require 'db.php';
			  $db = new Db();
			  $query = "SELECT * FROM todo ORDER BY id asc";
			  $results = $db->mysql->query($query);

			  if($results->num_rows) {
				  while($row = $results->fetch_object()) {
					  $title = $row->title;
					  $description = $row->description;
					  $id = $row->id;

					  echo '<div class="item">';

					  $data = <<<EOD
<h4>$title</h4>
<p>$description</p>
<input type="hidden" name="id" id="id" value="$id" />

<div class="options">
	<a class="deleteEntryAnchor" href="delete.php?id=$id">D</a>
	<a class="editEntry" href="#">E</a>
</div>
EOD;
					  echo $data;
					  echo '</div>';
				  }
			  } else {
				  echo "<p>Please add an item.</p>";
			  }
			  ?>
				</div>

				<div id="addNewEntry">
					<div class="d-flex justify-content-center">
						<h2>Add New Entry</h2>
					</div>
					<form action="addItem.php" method="post">
						<p>
							<label for="title"> Title</label>
							<input type="text" name="title" id="title" class="input"/>
						</p>

						<p>
							<label for="description"> Description</label>
							<textarea name="description" id="description" rows="10" cols="35"></textarea>
						</p>
						<div class="d-flex justify-content-center">
							<p>
								<input type="submit" class="btn btn-info" name="addEntry" id="addEntry" value="Add New Entry"/>
							</p>
						</div>
					</form>
				</div>

			</div>
		</div>
		<!-- Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
						integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
						crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
						integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
						crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
						integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
						crossorigin="anonymous"></script>
		<!-- Ajax -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>

	</body>
</html>
