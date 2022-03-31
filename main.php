<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <title>Assignment 6 </title>
    <style>
      #id{
        width: 30%;
        padding: 12px 20px;
        margin: 8px 0;
        margin-left:40px;
        box-sizing: border-box; 
      }
      #name{
        width: 30%;
        padding: 12px 20px;
        margin: 8px 0;
        margin-left:20px;
        box-sizing: border-box;
      }
      #email{
        width: 30%;
        padding: 12px 20px;
        margin: 8px 0;
        margin-left:90px;
        box-sizing: border-box;
      }
      #department{
          width: 30%;
          padding: 12px 20px;
          margin: 8px 0;
          margin-left:50px;
          box-sizing: border-box;
    }
      #salary{
        width: 30%;
        padding: 12px 20px;
        margin: 8px 0;
        margin-left:85px;
        box-sizing: border-box;
      }
      #button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        margin-left:250px;
        margin-top:50px;
     }

     #button:hover {
        background-color: #555555;
        color: white;
     }

    </style>
  </head>
<body>

    <form action="" method="post">
        <div>
        <label for = "name" >Name</label>
        <input type="number" name="id"  id="id" placeholder = "id" />
    </div>
    <div>
        <label for = "name" >Employee Name</label>
        <input type="text" name="employeeName" id="name" placeholder="name"/> 
    </div>
    <div>
        <label for = "name" >Employee Email</label>
        <input type="email" name="email" id="email" placeholder = "email" >
    </div>
    <div>
        <label for = "name" >Employee Department</label>
        <input type="text" name="dpt" id="department" placeholder = "department" />
    </div>
    <div>
        <label for = "name" >Employee Salary</label>
        <input type="number" name="salary" id="salary"  placeholder = "salary" />
    </div>
    
         <input type="submit" id= "button" name ="submit" value = "Add"/>
    </form>
    <h1>Employee Information</h1>
<table border="2">
	  <tr>
	     <td>Employee ID</td>
		 <td>Employee Name</td>
		 <td>Employee Department</td>
         <td>Employee Email</td>
         <td>Employee Salary</td>
	  </tr>
<?php
    if (isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['employeeName'];
        $email = $_POST['email'];
        $dept = $_POST['dpt'];
        $salary = $_POST['salary'];
        


      // Create a connection
      $link = mysqli_connect("localhost","root","","phpassignment6");
      // Die if connection was not successful
      if (!$link)
      {
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else
      { 
       
        $s = "INSERT INTO assignment6 VALUES ('$id', '$name', '$email', '$dept','$salary');";
        mysqli_query($link, $s);
        $sq="SELECT * from assignment6";
        $result = mysqli_query($link, $sq);
        while($row=mysqli_fetch_row($result))
        {
             echo"<tr>";
             echo"<td>$row[0]</td>";
             echo"<td>$row[1]</td>";
             echo"<td>$row[2]</td>";
             echo"<td>$row[3]</td>";
             echo"<td>$row[4]</td>";
             echo"</tr>";
        }

      }

    }

    
?>

</table>
    
  </body>
</html>

