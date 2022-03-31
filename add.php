<!doctype html>
<html lang="en">
<head>
   
    <title>Assignment 6 </title>
    
  <link rel="stylesheet" href="Css.css">
   
  </head>
<body>

    <form action="" method="post">
      <div>
    <label for = "name" >Employee ID</label>
        <input type="number" name="id"  id="id" placeholder = "Employee ID" />
</div>
<div>
        <label for = "name" >Employee Name</label>
        <input type="text" name="employeeName" id="name" placeholder="Employee name"/> 
</div>
<div>
        <label for = "name" >Employee Email</label>
        <input type="email" name="email" id="email" placeholder = "Email" >
</div>
<div>
        <label for = "name" >Employee Department</label>
        <input type="text" name="dpt" id="department" placeholder ="Department" />
</div>
<div>
        <label for = "name" >Employee Salary</label>
        <input type="number" name="salary" id="salary"  placeholder = "Employee Salary" />
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
        


      $link = mysqli_connect("localhost","root","","phpassignment6");
      $select = mysqli_query($link, "SELECT * FROM assignment6 WHERE emp_email = '".$_POST['email']."'");
      if(mysqli_num_rows($select)) {
          exit('This email address is already used!');
      }
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

