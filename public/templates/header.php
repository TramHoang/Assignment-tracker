<?php session_start();?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="tracker" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Tracker</title>
    <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
<style>
    
/*Menu bar*/
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #d9ac73;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: firebrick;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover{
   font-style:oblique;     
}

.dropdown:hover .dropbtn {
  background-color: #c98837;
  font-style: normal;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #d9ac73;
  width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: firebrick;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #c98837}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>

<body>
        <ul>
        <li class="dropdown" style="top:0px;">
            <a href="read.php" class="dropbtn" style="font-family: 'Tangerine', serif; font-size: 48px; width: 160px;">AST</a>
            <div class ="dropdown-content">
                <a href="read.php">List of works</a>
                <a href="create.php">Add your works</a>
                <a href="update.php">Update your works</a>
                <a href="delete.php">Delete your works</a>
            </div>
        </li>
<!--        <li><p>Hi, <b><?php echo htmlspecialchars($data["username"]); ?></b>. Welcome to our site.</p></li>-->
        <li style="float:right;font-size:20px; min-width: 48px;"><a href="logout.php">Logout</a></li>
    </ul>
    