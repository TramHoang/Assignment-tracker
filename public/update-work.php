<?php 
    // include the config file that we created last week
    require "../config.php";
    require "common.php";
    // run when submit button is clicked
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
            //grab elements from form and set as varaible
            $work =[
              "id"         => $_POST['id'],
              "title" => $_POST['title'],
              "subject" => $_POST['subject'],
              "duedate" => $_POST['duedate'],
              "priority" => $_POST['priority'],
              "note" => $_POST['note'],
              "date"   => $_POST['date'],
            ];
            
            // create SQL statement
            $sql = "UPDATE `works` 
                    SET id = :id, 
                        title = :title, 
                        subject = :subject, 
                        duedate = :duedate, 
                        priority = :priority,
                        note = :note,
                        date = :date 
                    WHERE id = :id";
            //prepare sql statement
            $statement = $connection->prepare($sql);
            
            //execute sql statement
            $statement->execute($work);
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
    // GET data from DB
    //simple if/else statement to check if the id is available
    if (isset($_GET['id'])) {
        //yes the id exists 
        
        try {
            // standard db connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set if as variable
            $id = $_GET['id'];
            
            //select statement to get the right data
            $sql = "SELECT * FROM works WHERE id = :id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            //bind the id to the PDO id
            $statement->bindValue(':id', $id);
            
            // now execute the statement
            $statement->execute();
            
            // attach the sql statement to the new work variable so we can access it in the form
            $work = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } else {
        // no id, show error
        echo "No id - something went wrong";
        //exit;
    };
?>
<!--Content of the page-->
<!--Style of the page-->
<style>
body{
 background-color: #e4c49b;
    }
* {
  box-sizing: border-box;
}
.newfont{
    font-family: 'Lobster', cursive;
    text-align: center;
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
</style>
<?php include "templates/header.php"; ?>

<h1 class="newfont">Edit a work</h1>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p>Work successfully updated.</p>
<?php endif; ?>
<div class="container">
    <form method="post">
    <div class="row">
        <div class="col-25">
            <label for="id">ID</label>
        </div>
        <div class="col-75">
            <input type="text" name="id" id="id" value="<?php echo escape($work['id']); ?>" >
        </div>
    </div>
    <div class="row">
            <div class="col-25">
               <label for="title">Title</label>
            </div>
            <div class="col-75">
                <input type="text" name="title" id="title" value="<?php echo escape($work['title']); ?>" >
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="subject">Subject</label>
            </div>
            <div class="col-75">
                <input type="text" name="subject" id="subject" value="<?php echo escape($work['subject']); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="duedate">Due Date</label>
            </div>
            <div class="col-75">
                <input type="text" name="duedate" id="duedate" value="<?php echo escape($work['duedate']); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="priority">Priority</label>
            </div>
            <div class="col-75">
                <input type="text" name="priority" id="priority" value="<?php echo escape($work['priority']); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="note">Note</label>
            </div>
            <div class="col-75">
                <input type="text" name="note" id="note" value="<?php echo escape($work['note']); ?>">
            </div>
        </div>
        <div class="row" style="margin-top: 6px;">
            <input type="submit" name="submit" value="Save">
        </div> 
</form>

</div>
<?php include "templates/footer.php"; ?>