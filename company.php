<?php

 
 if(isset($_GET["find-submit"])){
  require "includes/company.inc.php";
  require "includes/db.inc.php";

  $category=isset($_GET["category"]) ? $_GET["category"] : null;
  $cmp = new company;
    if($category)
    {
        
       header("location: index.php?find=bycategory&id=".$category["id"]) ;

    }else 
    {
     
       header("location:index.php?find=allcategory&id=-1");
    }




 }
 else{
    //header("location: index.php");
 }
 
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 ?>