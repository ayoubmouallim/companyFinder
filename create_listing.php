

<?php

if(isset($_POST["submit-add"]))
{

    require "includes/company.inc.php";
    require "includes/db.inc.php";

    $data=array();
    $data["name"]=$_POST["company"];
    $data["sector_id"]=$_POST["sector_id"];
    $data["sector"]=$_POST["sector"];
    $data["website"]=$_POST["website"];
    $data["address"]=$_POST["address"];
    $data["number"]=$_POST["number"];
    $data["email"]=$_POST["email"];
    $data["city"]=$_POST["city"];

    $cmp = new company;

    if(empty($data["name"]) ||  empty($data["sector_id"]) ||  empty($data["sector"]) ||  empty($data["website"]) ||  empty($data["address"]) ||  empty($data["number"]) ||  empty($data["email"]) ||  empty($data["city"])){

        header("location: addcompany.php?error=emptyFields");
    }
    else{
        $cmp->addCompany($data);
        header("location: addcompany.php?error=success");

    }

}else{
    header("location: index.php");

}



?>