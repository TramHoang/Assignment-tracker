<?php 
    // include the config file 
    require "../config.php";
    require "common.php";
    // This code will only run if the delete button is clicked
    if (isset($_GET["id"])) {
	    // this is called a try/catch statement 
        try {
            // define database connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set id variable
            $id = $_GET["id"];
            
            // Create the SQL 
            $sql = "DELETE FROM works WHERE id = :id";
            // Prepare the SQL
            $statement = $connection->prepare($sql);
            
            // bind the id to the PDO
            $statement->bindValue(':id', $id);
            
            // execute the statement
            $statement->execute();
            // Success message
            $success = "Work successfully deleted";
        } catch(PDOException $error) {
            // if there is an error, tell us what it is
            echo $sql . "<br>" . $error->getMessage();
        }
    };
    // This code runs on page load
    try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM works";
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
?>
<!-- Show the noti if the content success-->
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
    table{
        width: 100%;
        margin: 30px auto;
        border-collapse: collapse;
    }
    tr{
        border-bottom: 1px solid #cbcbcb;
    }
    th{
        font-size: 19px;
        color: firebrick;
        background-color: #d9ac73;
    }
    td{
        background-color: antiquewhite;
    }
    th,td{
        border:none;
        height: 30px;
        padding: 2px;
    }
    .task{
        text-align: center;
        height: 40px;
    }
    .edit{
        text-align: center;
    }
    .edit a{
        padding: 1px 6px;
        border-radius: 3px;
        text-decoration: none;
    }
    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
</style>
<?php include "templates/header.php"; ?>

<h1 class="newfont">Delete your works</h1>

<?php if ($success) echo $success; ?>

<!-- This is a loop, which will loop through each result in the array -->
<?php foreach($result as $row) { ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Subject</th>
            <th>Due Date</th>
            <th>Priority</th>
            <th>Note</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="task" style="width:5%"><?php echo $row['id']; ?></td>
            <td class="task" style="width:14%"><?php echo $row['title']; ?></td>
            <td class="task" style="width:14%"><?php echo $row['subject']; ?></td>
            <td class="task" style="width:14%"><?php echo $row['duedate']; ?></td>
            <td class="task" style="width:14%"><?php echo $row['priority']; ?></td>
            <td class="task"><?php echo $row['note']; ?></td>
            <td class="edit" style="width:10%"><a href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a></td>
        </tr>
    </tbody>
</table>
<?php }; //close the foreach
?>



<?php include "templates/footer.php"; ?>