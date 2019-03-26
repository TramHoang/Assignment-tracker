<?php 
// this code will only execute after the submit button is clicked
	
    // include the config file that we created before
    require "../config.php"; 
    
    // this is called a try/catch statement 
	try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM works";
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();
	} catch(PDOException $error) {
        // if there is an error, tell us what it is
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
<h1 class="newfont">List of the works</h1>
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
            <th>Date</th>
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
            <td class="task" style="width:14%"><?php echo $row['date']; ?></td>
        </tr>
    </tbody>
</table>

<?php 
            // this willoutput all the data from the array
            //echo '<pre>'; var_dump($row); 
        ?>
<?php }; //close the foreach 
?>



<?php include "templates/footer.php"; ?>