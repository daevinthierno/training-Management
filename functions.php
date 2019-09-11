<?php
include 'include/config.php';
    function deleteData($conn)
    {
    	if(isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query("DELETE FROM employee WHERE empID = $id");
        $_SESSION['msg'] = "Recorde Deleted";

     
    }
}
    function EditData($conn)
    {    
    	$name ='';
    	$matricule = '';
    	$enterprise = '';
        if (isset($_GET['edit']))
         {
           $id = $_GET['edit'];
           $editstate = true;
           $result = mysqli_query( "SELECT * FROM employee AS e, enterprise AS en  WHERE empID = $id AND 
           	e.enterpriseID = en.enterpriseID ");
           $row= mysqli_fetch_array($result);
           $name = $row['empname'];
    	$matricule = $row['matricule'];
    	$enterprise = $row['enterprisename'];
           
       }
    }
    function updateTabeRecords($conn)
    {
    	if(isset($_POST['update'])){
        
        $matricule = ($_POST['matricule']);
        $name = ($_POST['name']);
        $enterprice = ($_POST['enterprice']);
         mysqli_query("UPDATE employee SET matricule='$matricule',empname='$name', WHERE empID =$id");
        $_SESSION['msg'] = "Records Updated Updated";
            }
    }
?>


