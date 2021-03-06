<?php ob_start(); ?>
<?php require "includes/loggedin.inc.php" ?>
<?php 
  require_once "includes/db.inc.php";
  $book_added = false;
  $error = false;
  if( count($_POST) > 0 ) {
	  if( !isset($_POST['title']) ) {
		  $error = "Please enter a book title";
	  } elseif( !isset($_POST['author']) ) {
		  $error = "Please enter the book's author.";
	  } elseif( !isset($_POST['ISBN']) || strlen( $_POST['ISBN'] ) < 10 || strlen( $_POST['ISBN'] ) > 13) {
		  $error = "Please enter a valid ISBN";
	  } elseif ($dbh = open_db() ) {
		  try{
			  $title = $_POST['title'];
			  $author = $_POST['author'];
			  $ISBN = $_POST['ISBN'];
        $price = $_POST['price'];
			
			  $stmt = $dbh->prepare("insert into books (ISBN, title, author, price) values (:ISBN, :title, :author, :price)");
		
			  $stmt->execute(array( ":ISBN" => $ISBN,
								    ":title" => $title,
								    ":author" => $author,
                    ":price" => $price));
			
			  $book_added = true;
              header("Location: http://{$_SERVER['SERVER_NAME']}/team13/inventory.php"); 
		  } catch (PDOException $e) {
			  $error = "Book was not added: " . $e->getMessage();
		  }
	  } else {
		  $error = "Error connecting to db";
	  }
	  if($error) 	echo $error;
  } 
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php include "includes/headmatter.inc.php" ?>
	<script src='js/booksearch.js'></script>
	<title>Compassion by the Book -- Add Book</title>
	<meta name="description" content="">
	<meta name="author" content="">
</head>
<body>

<div id="container">
	<?php include "includes/header.inc.php" ?>
	<div id="main" role="main">
		<div id='search'>
			<p>Add a book using Google Book search (Select the book to automatically fill out the form fields):</p>
			<form id='search-form'>
				<input type='search' name='q' id='search-query' placeholder="Title, Author, ISBN, etc" />
                <input type='hidden' name='printType' value='books' />
				<input type='submit' value='Search' id='search-button' />
			</form>
			<div id='search-results'></div>
		</div>
		<form action='addbook.php' method='post' id='add-book-form'>
            <a name='form'></a>
            <p>Fill out the book information manually:</p>
			<fieldset>
				<legend>Book Description</legend>
				<table>							
					<tr>
						<td>
							<label for="title">Title:&nbsp;</label>
						</td>
						<td>
							<input type="text" name="title" id="title" placeholder='Title' required maxlength='255' <?php if( isset($_POST['title']) ) { printf( "value='%s'", $_POST['title']); } ?>/>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="author">Author:&nbsp; </label>
						</td>
						<td>
							<input type="text" name="author" id="author" placeholder='Author' required maxlength='255' <?php if( isset($_POST['author']) ) { printf( "value='%s'", $_POST['author']); } ?>/>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="ISBN">ISBN:&nbsp;</label>
						</td>
						<td>
							<input type="text" name="ISBN" id="ISBN" placeholder="ISBN" required maxlength='13' <?php if( isset($_POST['ISBN']) ) { printf( "value='%s'", $_POST['ISBN']); } ?> />
						</td>
					</tr>
          <tr>
						<td>
							<label for="price">price:&nbsp;</label>
						</td>
						<td>
							<input type="text" name="price" id="price" placeholder="Price" required maxlength='13' <?php if( isset($_POST['price']) ) { printf( "value='%s'", $_POST['price']); } ?> />
						</td>
					</tr>
					<tr>
						<td>
							<label for="receipt">Email Receipt:&nbsp; </label>
						</td>
						<td>
							<input type="checkbox" name="receipt" id="receipt" value="yes" <?php if( isset($_POST['receipt']) ) { printf( "value='%s'", $_POST['receipt']); } ?>/>
						</td>
					</tr>
					
				</table>
				<p>
					<input type="Submit" value="Add Book" />
				</p>
			</fieldset>
		</form>
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
