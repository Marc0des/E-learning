<?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");


 ?>
<?php include("conn.php"); ?>
<!-- Mauna  ANG HEADER -->
<?php include("includes/header.php"); ?>      


<div class="app-main">
<!-- sidebar dito  -->
<?php include("includes/sidebar.php"); ?>

<!-- Condition If na click  -->
<?php 
   @$page = $_GET['page'];


   if($page != '')
  {
    if($page == "manage-file")
    {
      include("pages/manage-file.php");
    }
     else if($page == "exam")
     {
       include("pages/exam.php");
     }
     else if($page == "result")
     {
       include("pages/result.php");
     }
     else if($page == "myscores")
     {
       include("pages/myscores.php");
     }
     
   }
   // Else ang home page mo display
   else
   {
     include("pages/home.php"); 
   }

   ?> 




<!-- FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>


