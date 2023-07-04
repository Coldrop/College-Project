<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
    <!-- <link rel="icon" type="image/x-icon" href="images/logo.jpg"> Adds the icon to next to the title -->
    <link rel="stylesheet" href="styles/style.css"> <!--Links the style.css file to the HTML page-->
</head>
<body>


<article id="Bgg">

<?php
include ("header.inc");
?>
    
<form action="" method="post">
<table class = "styled-table" id = "manage" border="1px">
    <thead>
        <tr>
            <th>Field</th>
            <th>Input</th>
            <th>Confirm</th>
        </tr>
    </thead>
<tbody>
    <tr><th>Job Reference Number:</th>
        <td> <input type="text" name="reference_number" ></td>
    <td> <input type="submit" value="Show" name="Reference_button" id = "Reference_button">
</td>
</tr>
<tr><th>First Name:</th>
        <td> <input type="text" name="first_name" ></td>
    <td><input type="submit" value="Show" name="Firstname_button" id = "managebuttons">
</td>
</tr>
<tr><th>Last Name:</th>
        <td> <input type="text" name="last_name" ></td>
    <td> <input type="submit" value="Show" name="lastname_button" id = "managebuttons">
</td>
</tr>
<tr>
    <th>First Name:<br>Last Name:</th>
    <td><input type="text" name="b_first_name" ><br><input type="text" name="b_last_name" ></td>
    <td><input type="submit" value="Show" name="both_button" id = "managebuttons">
</tr>
<tr><th>Delete by Reference number:</th>
        <td> <input type="text" name="delete" ></td>
    <td> <input type="submit" value="Delete" name="Delete_button" id = "managebuttons">
</td>
</tr>

<tr><th>Update status by Reference number</th>
        <td> <input type="text" name="updateByReference" ></td>
    <td> <input type="submit" value="Update" name="Update_button"><br>
    <input type="radio" id="New" name="update" value="New">
    <label id="New1" for="New">New</label>
    <input type="radio" id="Current" name="update" value="Current">
    <label id="Current1" for="Current">Current</label>
    <input type="radio" id="Final" name="update" value="Final">
    <label id="Final1" for="Final">Final</label>
</td>
</tr>
<tr><th>Show all EOIs</th>
<td></td>
    <td>
<input type="submit" value="Show All EOIs" name="ShowAll" id = "managebuttons">
</td>
</tr>
<tr><th>Show all EOIs Descending</th>
<td></td>
    <td>
<input type="submit" value="Descending" name="Desc" id = "managebuttons">
</td>
<tr><th>Show all EOIs in Ascending</th>
<td></td>
<td>
<input type="submit" value="Ascending" name="Asce" id = "managebuttons">
</td>
</tr>
</tbody>
</table>
</form>
<br>
<br>
<br>
<?php 

//SHOW ALL
  if(isset($_POST['ShowAll'])){
     $name=$_POST['reference_number'];
     require_once ("settings.php");
        $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
);

if (!$conn) {
    echo "<p>Database connection failure</p>";
}else {
    $sql_table="eoi";
    $query = "select * from eoi";
    $result = mysqli_query($conn, $query);
    if (!$result){
        echo "<p>No data found!<p>";
    }else{
       #$query1 = "select * from eoi";
    #select * from eoi
    

        echo "<table border = \"1\">\n";
        echo "<tr>\n "
        ."<th scope = \"col\">EOInumber</th>\n "
        ."<th scope = \"col\">JobReferencenumber</th>\n "
        ."<th scope = \"col\">FirstName</th>\n "
        ."<th scope = \"col\">LastName</th>\n "
        ."<th scope = \"col\">Streetaddress</th>\n "
        ."<th scope = \"col\">Suburbtown</th>\n "
        ."<th scope = \"col\">State</th>\n "
        ."<th scope = \"col\">Postcode</th>\n "
        ."<th scope = \"col\">Emailaddress</th>\n "
        ."<th scope = \"col\">Phonenumber</th>\n "
        ."<th scope = \"col\">Skill1</th>\n "
        ."<th scope = \"col\">Skill2</th>\n "
        ."<th scope = \"col\">Skill3</th>\n "
        // ."<th scope = \"col\">Skill4</th>\n "
        // ."<th scope = \"col\">Skill5</th>\n "
        ."<th scope = \"col\">Otherskills</th>\n "
        ."<th scope = \"col\">Status</th>\n "
        ."</tr>\n ";
        
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>\n ";
            echo "<td>", $row["EOInumber"], "</td>\n ";
            echo "<td>", $row["reference_number"], "</td>\n ";
            echo "<td>", $row["first_name"], "</td>\n ";
            echo "<td>", $row["last_name"], "</td>\n ";
            echo "<td>", $row["street"], "</td>\n ";
            echo "<td>", $row["suburb_town"], "</td>\n ";
            echo "<td>", $row["state"], "</td>\n ";
            echo "<td>", $row["postcode"], "</td>\n ";
            echo "<td>", $row["email"], "</td>\n ";
            echo "<td>", $row["phone"], "</td>\n ";
            echo "<td>", $row["skill1"], "</td>\n ";
            echo "<td>", $row["skill2"], "</td>\n ";
            echo "<td>", $row["skill3"], "</td>\n ";
            // echo "<td>", $row["Skill4"], "</td>\n ";
            // echo "<td>", $row["Skill5"], "</td>\n ";
            echo "<td>", $row["other_skills"], "</td>\n ";
            echo "<td>", $row["Status"], "</td>\n ";
            echo "</tr>\n ";
        }
        echo "</table>\n ";
        mysqli_free_result($result);
    }
        mysqli_close($conn);
        
}
}

if(isset($_POST['Asce'])){
    // $name=$_POST['EOInumber'];
    require_once ("settings.php");
       $conn = @mysqli_connect($host,
       $user,
       $pwd,
       $sql_db
);

if (!$conn) {
   echo "<p>Database connection failure</p>";
}else {
   $sql_table="eoi";
   $query = "select * from eoi order by EOInumber Asc";
   $result = mysqli_query($conn, $query);
   if (!$result){
       echo "<p>No data found!<p>";
   }else{
      #$query1 = "select * from eoi";
   #select * from eoi
   

       echo "<table border = \"1\">\n";
       echo "<tr>\n "
       ."<th scope = \"col\">EOInumber</th>\n "
       ."<th scope = \"col\">JobReferencenumber</th>\n "
       ."<th scope = \"col\">FirstName</th>\n "
       ."<th scope = \"col\">LastName</th>\n "
       ."<th scope = \"col\">Streetaddress</th>\n "
       ."<th scope = \"col\">Suburbtown</th>\n "
       ."<th scope = \"col\">State</th>\n "
       ."<th scope = \"col\">Postcode</th>\n "
       ."<th scope = \"col\">Emailaddress</th>\n "
       ."<th scope = \"col\">Phonenumber</th>\n "
       ."<th scope = \"col\">Skill1</th>\n "
       ."<th scope = \"col\">Skill2</th>\n "
       ."<th scope = \"col\">Skill3</th>\n "
       // ."<th scope = \"col\">Skill4</th>\n "
       // ."<th scope = \"col\">Skill5</th>\n "
       ."<th scope = \"col\">Otherskills</th>\n "
       ."<th scope = \"col\">Status</th>\n "
       ."</tr>\n ";
       
       while ($row = mysqli_fetch_assoc($result)){
           echo "<tr>\n ";
           echo "<td>", $row["EOInumber"], "</td>\n ";
           echo "<td>", $row["reference_number"], "</td>\n ";
           echo "<td>", $row["first_name"], "</td>\n ";
           echo "<td>", $row["last_name"], "</td>\n ";
           echo "<td>", $row["street"], "</td>\n ";
           echo "<td>", $row["suburb_town"], "</td>\n ";
           echo "<td>", $row["state"], "</td>\n ";
           echo "<td>", $row["postcode"], "</td>\n ";
           echo "<td>", $row["email"], "</td>\n ";
           echo "<td>", $row["phone"], "</td>\n ";
           echo "<td>", $row["skill1"], "</td>\n ";
           echo "<td>", $row["skill2"], "</td>\n ";
           echo "<td>", $row["skill3"], "</td>\n ";
           // echo "<td>", $row["Skill4"], "</td>\n ";
           // echo "<td>", $row["Skill5"], "</td>\n ";
           echo "<td>", $row["other_skills"], "</td>\n ";
           echo "<td>", $row["Status"], "</td>\n ";
           echo "</tr>\n ";
       }
       echo "</table>\n ";
       mysqli_free_result($result);
   }
       mysqli_close($conn);
       
}
}
if(isset($_POST['Desc'])){
    // $name=$_POST['EOInumber'];
    require_once ("settings.php");
       $conn = @mysqli_connect($host,
       $user,
       $pwd,
       $sql_db
);

if (!$conn) {
   echo "<p>Database connection failure</p>";
}else {
   $sql_table="eoi";
   $query = "select * from eoi order by EOInumber Desc";
   $result = mysqli_query($conn, $query);
   if (!$result){
       echo "<p>No data found!<p>";
   }else{
      #$query1 = "select * from eoi";
   #select * from eoi
   

       echo "<table border = \"1\">\n";
       echo "<tr>\n "
       ."<th scope = \"col\">EOInumber</th>\n "
       ."<th scope = \"col\">JobReferencenumber</th>\n "
       ."<th scope = \"col\">FirstName</th>\n "
       ."<th scope = \"col\">LastName</th>\n "
       ."<th scope = \"col\">Streetaddress</th>\n "
       ."<th scope = \"col\">Suburbtown</th>\n "
       ."<th scope = \"col\">State</th>\n "
       ."<th scope = \"col\">Postcode</th>\n "
       ."<th scope = \"col\">Emailaddress</th>\n "
       ."<th scope = \"col\">Phonenumber</th>\n "
       ."<th scope = \"col\">Skill1</th>\n "
       ."<th scope = \"col\">Skill2</th>\n "
       ."<th scope = \"col\">Skill3</th>\n "
       // ."<th scope = \"col\">Skill4</th>\n "
       // ."<th scope = \"col\">Skill5</th>\n "
       ."<th scope = \"col\">Otherskills</th>\n "
       ."<th scope = \"col\">Status</th>\n "
       ."</tr>\n ";
       
       while ($row = mysqli_fetch_assoc($result)){
           echo "<tr>\n ";
           echo "<td>", $row["EOInumber"], "</td>\n ";
           echo "<td>", $row["reference_number"], "</td>\n ";
           echo "<td>", $row["first_name"], "</td>\n ";
           echo "<td>", $row["last_name"], "</td>\n ";
           echo "<td>", $row["street"], "</td>\n ";
           echo "<td>", $row["suburb_town"], "</td>\n ";
           echo "<td>", $row["state"], "</td>\n ";
           echo "<td>", $row["postcode"], "</td>\n ";
           echo "<td>", $row["email"], "</td>\n ";
           echo "<td>", $row["phone"], "</td>\n ";
           echo "<td>", $row["skill1"], "</td>\n ";
           echo "<td>", $row["skill2"], "</td>\n ";
           echo "<td>", $row["skill3"], "</td>\n ";
           // echo "<td>", $row["Skill4"], "</td>\n ";
           // echo "<td>", $row["Skill5"], "</td>\n ";
           echo "<td>", $row["other_skills"], "</td>\n ";
           echo "<td>", $row["Status"], "</td>\n ";
           echo "</tr>\n ";
       }
       echo "</table>\n ";
       mysqli_free_result($result);
   }
       mysqli_close($conn);
       
   
}
}
//Show by reference number
    if(isset($_POST['Reference_button'])){
        $name=$_POST['reference_number'];
        
         require_once ("settings.php");
           $conn = @mysqli_connect($host,
           $user,
           $pwd,
           $sql_db
   );
   
   if (!$conn) {
       echo "<p>Database connection failure</p>";
   }
   else if ($_POST['reference_number'] == "")
   {
        echo "Please provide a reference number";
   }
   else {

       $ref = $_POST['reference_number'];
       $sql_table="eoi";
       $sql = "select * from eoi where reference_number = '$ref'";

       $result = mysqli_query($conn, $sql);
       $count = mysqli_num_rows($result);
       
       if (!$result){
           echo "<p>No data found! ", $sql, "<p>";
       }
       else if ($count == 0)
      {
        echo "<p>No records found for this reference number! <p>";
      }
       else{
          #$query1 = "select * from eoi";
       #select * from eoi
       
   
       echo "<table border = \"1\">\n";
       echo "<tr>\n "
       ."<th scope = \"col\">EOInumber</th>\n "
       ."<th scope = \"col\">JobReferencenumber</th>\n "
       ."<th scope = \"col\">FirstName</th>\n "
       ."<th scope = \"col\">LastName</th>\n "
       ."<th scope = \"col\">Streetaddress</th>\n "
       ."<th scope = \"col\">Suburbtown</th>\n "
       ."<th scope = \"col\">State</th>\n "
       ."<th scope = \"col\">Postcode</th>\n "
       ."<th scope = \"col\">Emailaddress</th>\n "
       ."<th scope = \"col\">Phonenumber</th>\n "
       ."<th scope = \"col\">Skill1</th>\n "
       ."<th scope = \"col\">Skill2</th>\n "
       ."<th scope = \"col\">Skill3</th>\n "
       // ."<th scope = \"col\">Skill4</th>\n "
       // ."<th scope = \"col\">Skill5</th>\n "
       ."<th scope = \"col\">Otherskills</th>\n "
       ."<th scope = \"col\">Status</th>\n "
       ."</tr>\n ";
       
       while ($row = mysqli_fetch_assoc($result)){
           echo "<tr>\n ";
           echo "<td>", $row["EOInumber"], "</td>\n ";
           echo "<td>", $row["reference_number"], "</td>\n ";
           echo "<td>", $row["first_name"], "</td>\n ";
           echo "<td>", $row["last_name"], "</td>\n ";
           echo "<td>", $row["street"], "</td>\n ";
           echo "<td>", $row["suburb_town"], "</td>\n ";
           echo "<td>", $row["state"], "</td>\n ";
           echo "<td>", $row["postcode"], "</td>\n ";
           echo "<td>", $row["email"], "</td>\n ";
           echo "<td>", $row["phone"], "</td>\n ";
           echo "<td>", $row["skill1"], "</td>\n ";
           echo "<td>", $row["skill2"], "</td>\n ";
           echo "<td>", $row["skill3"], "</td>\n ";
           // echo "<td>", $row["Skill4"], "</td>\n ";
           // echo "<td>", $row["Skill5"], "</td>\n ";
           echo "<td>", $row["other_skills"], "</td>\n ";
           echo "<td>", $row["Status"], "</td>\n ";
           echo "</tr>\n ";
            //    $row = mysqli_fetch_assoc($result);
           }
           echo "</table>\n ";
           mysqli_free_result($result);
       }
           mysqli_close($conn);
    }
}

       if(isset($_POST['Firstname_button'])){
        $name=$_POST['first_name'];
        require_once ("settings.php");
           $conn = @mysqli_connect($host,
           $user,
           $pwd,
           $sql_db
   );
   
   if (!$conn) {
       echo "<p>Database connection failure</p>";
   }else {
    $fname = $_POST['first_name'];
    $sql_table="eoi";
    $query2 = "select * from eoi where first_name like '$fname'";
       $result = mysqli_query($conn, $query2);
       if (!$result){
           echo "<p>No data found! ", $query2, "<p>";
       }else{
          #$query1 = "select * from eoi";
       #select * from eoi
       
   
       echo "<table border = \"1\">\n";
       echo "<tr>\n "
       ."<th scope = \"col\">EOInumber</th>\n "
       ."<th scope = \"col\">JobReferencenumber</th>\n "
       ."<th scope = \"col\">FirstName</th>\n "
       ."<th scope = \"col\">LastName</th>\n "
       ."<th scope = \"col\">Streetaddress</th>\n "
       ."<th scope = \"col\">Suburbtown</th>\n "
       ."<th scope = \"col\">State</th>\n "
       ."<th scope = \"col\">Postcode</th>\n "
       ."<th scope = \"col\">Emailaddress</th>\n "
       ."<th scope = \"col\">Phonenumber</th>\n "
       ."<th scope = \"col\">Skill1</th>\n "
       ."<th scope = \"col\">Skill2</th>\n "
       ."<th scope = \"col\">Skill3</th>\n "
       // ."<th scope = \"col\">Skill4</th>\n "
       // ."<th scope = \"col\">Skill5</th>\n "
       ."<th scope = \"col\">Otherskills</th>\n "
       ."<th scope = \"col\">Status</th>\n "
       ."</tr>\n ";
       
       while ($row = mysqli_fetch_assoc($result)){
           echo "<tr>\n ";
           echo "<td>", $row["EOInumber"], "</td>\n ";
           echo "<td>", $row["reference_number"], "</td>\n ";
           echo "<td>", $row["first_name"], "</td>\n ";
           echo "<td>", $row["last_name"], "</td>\n ";
           echo "<td>", $row["street"], "</td>\n ";
           echo "<td>", $row["suburb_town"], "</td>\n ";
           echo "<td>", $row["state"], "</td>\n ";
           echo "<td>", $row["postcode"], "</td>\n ";
           echo "<td>", $row["email"], "</td>\n ";
           echo "<td>", $row["phone"], "</td>\n ";
           echo "<td>", $row["skill1"], "</td>\n ";
           echo "<td>", $row["skill2"], "</td>\n ";
           echo "<td>", $row["skill3"], "</td>\n ";
           // echo "<td>", $row["Skill4"], "</td>\n ";
           // echo "<td>", $row["Skill5"], "</td>\n ";
           echo "<td>", $row["other_skills"], "</td>\n ";
           echo "<td>", $row["Status"], "</td>\n ";
           echo "</tr>\n ";
           }
           echo "</table>\n ";
           mysqli_free_result($result);
       }
           mysqli_close($conn);
     }
}

       if(isset($_POST['lastname_button'])){
        $name=$_POST['last_name'];
        
        require_once ("settings.php");
           $conn = @mysqli_connect($host,
           $user,
           $pwd,
           $sql_db
   );
   
   if (!$conn) {
       echo "<p>Database connection failure</p>";
   }else {
    $last_name = $_POST['last_name'];
    $sql_table="eoi";
    $query3 = "select * from eoi where last_name like '$last_name'";
       $result = mysqli_query($conn, $query3);
       if (!$result){
           echo "<p>No data found! ", $query3, "<p>";
       }else{
          #$query1 = "select * from eoi";
       #select * from eoi
       
       echo "<table border = \"1\">\n";
       echo "<tr>\n "
       ."<th scope = \"col\">EOInumber</th>\n "
       ."<th scope = \"col\">JobReferencenumber</th>\n "
       ."<th scope = \"col\">FirstName</th>\n "
       ."<th scope = \"col\">LastName</th>\n "
       ."<th scope = \"col\">Streetaddress</th>\n "
       ."<th scope = \"col\">Suburbtown</th>\n "
       ."<th scope = \"col\">State</th>\n "
       ."<th scope = \"col\">Postcode</th>\n "
       ."<th scope = \"col\">Emailaddress</th>\n "
       ."<th scope = \"col\">Phonenumber</th>\n "
       ."<th scope = \"col\">Skill1</th>\n "
       ."<th scope = \"col\">Skill2</th>\n "
       ."<th scope = \"col\">Skill3</th>\n "
       // ."<th scope = \"col\">Skill4</th>\n "
       // ."<th scope = \"col\">Skill5</th>\n "
       ."<th scope = \"col\">Otherskills</th>\n "
       ."<th scope = \"col\">Status</th>\n "
       ."</tr>\n ";
       
       while ($row = mysqli_fetch_assoc($result)){
           echo "<tr>\n ";
           echo "<td>", $row["EOInumber"], "</td>\n ";
           echo "<td>", $row["reference_number"], "</td>\n ";
           echo "<td>", $row["first_name"], "</td>\n ";
           echo "<td>", $row["last_name"], "</td>\n ";
           echo "<td>", $row["street"], "</td>\n ";
           echo "<td>", $row["suburb_town"], "</td>\n ";
           echo "<td>", $row["state"], "</td>\n ";
           echo "<td>", $row["postcode"], "</td>\n ";
           echo "<td>", $row["email"], "</td>\n ";
           echo "<td>", $row["phone"], "</td>\n ";
           echo "<td>", $row["skill1"], "</td>\n ";
           echo "<td>", $row["skill2"], "</td>\n ";
           echo "<td>", $row["skill3"], "</td>\n ";
           // echo "<td>", $row["Skill4"], "</td>\n ";
           // echo "<td>", $row["Skill5"], "</td>\n ";
           echo "<td>", $row["other_skills"], "</td>\n ";
           echo "<td>", $row["Status"], "</td>\n ";
           echo "</tr>\n ";
           }
           echo "</table>\n ";
           mysqli_free_result($result);
       }
           mysqli_close($conn);
           
       
   }
       
       }
       
       if(isset($_POST['both_button'])){
        $firstname=$_POST['b_first_name'];
        $lastname=$_POST['b_last_name'];
        require_once ("settings.php");
           $conn = @mysqli_connect($host,
           $user,
           $pwd,
           $sql_db
   );
   
   if (!$conn) {
       echo "<p>Database connection failure</p>";
   }else {
    $fname = $_POST['b_first_name'];
    $lname = $_POST['b_last_name'];
    $sql_table="eoi";
    $query4 = "select * from eoi where first_name like '$fname' and last_name like '$lname'";
       $result = mysqli_query($conn, $query4);
       if (!$result){
           echo "<p>No data found! ", $query4, "<p>";
       }else{
          #$query1 = "select * from eoi";
       #select * from eoi
       
       echo "<table border = \"1\">\n";
       echo "<tr>\n "
       ."<th scope = \"col\">EOInumber</th>\n "
       ."<th scope = \"col\">JobReferencenumber</th>\n "
       ."<th scope = \"col\">FirstName</th>\n "
       ."<th scope = \"col\">LastName</th>\n "
       ."<th scope = \"col\">Streetaddress</th>\n "
       ."<th scope = \"col\">Suburbtown</th>\n "
       ."<th scope = \"col\">State</th>\n "
       ."<th scope = \"col\">Postcode</th>\n "
       ."<th scope = \"col\">Emailaddress</th>\n "
       ."<th scope = \"col\">Phonenumber</th>\n "
       ."<th scope = \"col\">Skill1</th>\n "
       ."<th scope = \"col\">Skill2</th>\n "
       ."<th scope = \"col\">Skill3</th>\n "
       // ."<th scope = \"col\">Skill4</th>\n "
       // ."<th scope = \"col\">Skill5</th>\n "
       ."<th scope = \"col\">Otherskills</th>\n "
       ."<th scope = \"col\">Status</th>\n "
       ."</tr>\n ";
       
       while ($row = mysqli_fetch_assoc($result)){
           echo "<tr>\n ";
           echo "<td>", $row["EOInumber"], "</td>\n ";
           echo "<td>", $row["reference_number"], "</td>\n ";
           echo "<td>", $row["first_name"], "</td>\n ";
           echo "<td>", $row["last_name"], "</td>\n ";
           echo "<td>", $row["street"], "</td>\n ";
           echo "<td>", $row["suburb_town"], "</td>\n ";
           echo "<td>", $row["state"], "</td>\n ";
           echo "<td>", $row["postcode"], "</td>\n ";
           echo "<td>", $row["email"], "</td>\n ";
           echo "<td>", $row["phone"], "</td>\n ";
           echo "<td>", $row["skill1"], "</td>\n ";
           echo "<td>", $row["skill2"], "</td>\n ";
           echo "<td>", $row["skill3"], "</td>\n ";
           // echo "<td>", $row["Skill4"], "</td>\n ";
           // echo "<td>", $row["Skill5"], "</td>\n ";
           echo "<td>", $row["other_skills"], "</td>\n ";
           echo "<td>", $row["Status"], "</td>\n ";
           echo "</tr>\n ";
           }
           echo "</table>\n ";
           mysqli_free_result($result);
       }
           mysqli_close($conn);
     }
}

if(isset($_POST['Delete_button'])){
    $name=$_POST['delete'];
    require_once ("settings.php");
       $conn = @mysqli_connect($host,
       $user,
       $pwd,
       $sql_db
);

if (!$conn) {
   echo "<p>Database connection failure</p>";
}
else if ($_POST['delete'] == "")
{
    echo "Please provide a reference number";
}
else {
$del = $_POST['delete'];
$sql_table="eoi";
$query4 = "delete from eoi where reference_number = '$del'";
$result = mysqli_query($conn, $query4);
   if (!$result){
       echo "<p>No data found! ", $query4, "<p>";
   }else{
      #$query1 = "select * from eoi";
   #select * from eoi
        if($del = ""){
            echo "Please enter valid Job Application Number";
        }
        else{
           
       echo "<table border = \"1\">\n";
    
            if ($result){
                echo "Successfully deleted record!";
            }
    
    }
       echo "</table>\n ";
    //    mysqli_free_result($result);
   }
       mysqli_close($conn);

   
}
   
   }
   if(isset($_POST['Update_button'])){
    $name=$_POST['updateByReference'];
    require_once ("settings.php");
       $conn = @mysqli_connect($host,
       $user,
       $pwd,
       $sql_db
);

if (!$conn) {
   echo "<p>Database connection failure</p>";
}
else if ($_POST['updateByReference'] == "")
{
    echo "Please provide a reference number!";
}
else {
    $status = $_POST['update'];
    $ref = $_POST['updateByReference'];
    $sql_table="eoi";
    $query5 = "update eoi set Status = '$status' where reference_number = '$ref'";
    $result = mysqli_query($conn, $query5);
    //  $count = mysqli_num_rows($result);
   if (!$result){
       echo "<p>No data found! ", $query5, "<p>";
   }


   else{
     

       echo "<table border = \"1\">\n";
    
       if ($result){
        echo "Successfully updated record.";
        
       }
    
       echo "</table>\n ";
       
   }
       mysqli_close($conn);
       
   
}
   
   }



echo "<br>";
echo "<br>";
echo "<br>";


 ?>
</article>
</body>
</html>

<?php
    include ("footer.inc")
?>    
