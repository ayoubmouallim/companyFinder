 <?php


    require_once "db.inc.php";  
     
 
class company{

  // to get companies from db
   public function  getCompanies()
   {
    global $conn ;
    $sql="SELECT companies.* , categories.name  FROM companies INNER JOIN categories  ON companies.category_id = categories.id ";
    $stmt=mysqli_stmt_init($conn);  
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        echo "there is a problem";
        exit();
    }else
    {
       mysqli_stmt_execute($stmt);
       $result=mysqli_stmt_get_result($stmt);
       if(!$row=mysqli_fetch_all($result,MYSQLI_ASSOC))
       {
        echo "there is an error";
        
       }else{
           return $row;
       }

    }

   }

   // get companies by selected category
  public  function getbyCategory($category )
   {     
       
          global $conn ;
          $sql="SELECT *  FROM companies INNER JOIN categories  ON companies.category_id = categories.id where categories.id=$category ";
          $stmt=mysqli_stmt_init($conn);  
          if(!mysqli_stmt_prepare($stmt,$sql))
         {
           echo "there is a problem";
           exit();
         } else
         {
            
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if(!$row=mysqli_fetch_all($result,MYSQLI_ASSOC))
           {
            echo "there is an error";
           
            }else{
              return $row;
           }
   
         }
      

   } 

    //  function to get categories from db
  public function getCategories()
  {
      global $conn ;
      $sql="SELECT * FROM categories  ";
      $stmt=mysqli_stmt_init($conn);  
      if(!mysqli_stmt_prepare($stmt,$sql))
      {
          echo "there is a problem";
          exit();
      }else
      {
         mysqli_stmt_execute($stmt);
         $result=mysqli_stmt_get_result($stmt);
         if(!$row=mysqli_fetch_all($result,MYSQLI_ASSOC))
         {
          echo "there is an error";
          
         }else{
             return $row;
         }
  
      }
    }
      // add company 
      
     public function addCompany($data)
  {
      global $conn ;
      $sql="INSERT INTO companies (category_id,company_title,company_website,company_tel,company_address,company_sector,company_mail,company_city) values (?,?,?,?,?,?,?,?) ";
      $stmt=mysqli_stmt_init($conn);  
      if(!mysqli_stmt_prepare($stmt,$sql))
      {
          echo "there is a problem";
       
          exit();
      }else
      {
        mysqli_stmt_bind_param($stmt,'isssssss',$data["sector_id"],$data["name"],$data["website"],$data["number"],$data["address"], $data["sector"], $data["email"],$data["city"]); 
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
        mysqli_close();

      
      }
    
  }

}

//$cmp = new company;
//var_dump($cmp->getCategories());

