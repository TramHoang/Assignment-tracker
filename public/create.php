<?php
// Initialize the session
session_start();
// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {
	
    // include the config file that we created before
    require "../config.php"; 
    
    // this is called a try/catch statement 
	try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Get the contents of the form and store it in an array
        $new_work = array( 
            "title" => $_POST['title'], 
            "subject" => $_POST['subject'],
            "duedate" => $_POST['duedate'],
            "priority" => $_POST['priority'],
            "note" => $_POST['note'],
            
        );
        
        // THIRD: Turn the array into a SQL statement
        $sql = "INSERT INTO works (title, subject, duedate, priority, note) VALUES (:title, :subject, :duedate, :priority, :note)";        
        
        // FOURTH: Now write the SQL to the database
        $statement = $connection->prepare($sql);
        $statement->execute($new_work);
	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>

<!-- Below this line is the page contents-->

<!--Css for the form-->
<style>
.newfont{
    font-family: 'Lobster', cursive;
    text-align: center;
}
body{
        background-color: #e4c49b;
    }
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #d9ac73;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #c98837;
}

.container {
  border-radius: 5px;
  background-color: #e9d0af;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 15%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 85%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<!-- Show the noti if the content success-->
<?php include "templates/header.php"; ?>

<!--form to collect data for each artwork-->
    <h1 class="newfont">Adding the new task!</h1>
<div class="container">
    <form method="post">
        <div class="row">
            <div class="col-25">
                <label for="title">Title</label>
            </div>
            <div class="col-75">
                <input type="text" name="title" id="title">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="subject">Subject</label>
            </div>
            <div class="col-75">
                <input type="text" name="subject" id="subject">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="duedate">Due Date</label>
            </div>
            <div class="col-75">
                <input type="text" name="duedate" id="duedate">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="priority">Priority</label>
            </div>
            <div class="col-75">
                <input type="text" name="priority" id="priority">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="note">Note</label>
            </div>
            <div class="col-75">
                <input type="text" name="note" id="note">
            </div>
        </div>
        <div class="row" style="margin-top: 6px;">
            <input type="submit" name="submit" value="Submit">
        </div> 
    </form>        
</div>
<?php if (isset($_POST['submit']) && $statement) { ?>
<p>Work successfully added.</p>
<?php } ?>
<?php include "templates/footer.php"; ?>