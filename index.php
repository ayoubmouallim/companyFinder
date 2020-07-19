<?php
require_once "header.php";
require_once "includes/company.inc.php";
require "company.php";
 ?>
<?php  $cmp=new company; ?>
<div class="jumbotron">
        <h1 class="display-3">Find a Company</h1>
          <form action="company.php" methode="GET">
           <select name="category" class="form-control">
             <option value="0">Choose Category</option>
              <?php foreach($cmp->getCategories() as $category): ?>
                <option value="<?php echo $category["id"] ; ?> "><?php echo $category["name"] ; ?></option>
              <?php endforeach ; ?> 
           </select>
           <br>
           <button class="btn btn-lg btn-success" type="submit" name="find-submit">Find</button>
          </form>
 </div>
<?php 
 if(isset($_GET["find"])){
   if($_GET["id"] == -1){
    $companies=$cmp->getCompanies();
   
   }else {
    $companies=$cmp->getbyCategory($_GET["id"]);
    echo '<h3>' .$companies[0]["name"].' Companies </h3>';
   }
 }//else {  $companies=NULL;  }

?>

    <?php if(isset($companies)){
    foreach($companies as $company) {

       echo '<div class="card">
       <div class="card-header text-center">'.$company["company_title"].'</div>
       <div class="card-body">
       <p class="card-text ">'.$company["name"].'</p>
       <div class="row">
           <div classe="col-md-2">
              <svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
              </svg>
          </div>
          <div class="col-md-10">
             <p  class="card-text ">'.$company["company_mail"].'</p>
          </div>
       </div>
       <div class="row">
           <div classe="col-md-2">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-globe" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.018 7.5h2.49c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5zM2.255 4H4.09a9.266 9.266 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.024 7.024 0 0 0 2.255 4zM8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm-.5 1.077c-.67.204-1.335.82-1.887 1.855-.173.324-.33.682-.468 1.068H7.5V1.077zM7.5 5H4.847a12.5 12.5 0 0 0-.338 2.5H7.5V5zm1 2.5V5h2.653c.187.765.306 1.608.338 2.5H8.5zm-1 1H4.51a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm1 2.5V8.5h2.99a12.495 12.495 0 0 1-.337 2.5H8.5zm-1 1H5.145c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12zm-2.173 2.472a6.695 6.695 0 0 1-.597-.933A9.267 9.267 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM1.674 11H3.82a13.651 13.651 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm8.999 3.472A7.024 7.024 0 0 0 13.745 12h-1.834a9.278 9.278 0 0 1-.641 1.539 6.688 6.688 0 0 1-.597.933zM10.855 12H8.5v2.923c.67-.204 1.335-.82 1.887-1.855A7.98 7.98 0 0 0 10.855 12zm1.325-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm.312-3.5h2.49a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.91 4a9.277 9.277 0 0 0-.64-1.539 6.692 6.692 0 0 0-.597-.933A7.024 7.024 0 0 1 13.745 4h-1.834zm-1.055 0H8.5V1.077c.67.204 1.335.82 1.887 1.855.173.324.33.682.468 1.068z"/>
              </svg>
          </div>
          <div class="col-md-10">
             <p  class="card-text ">'.$company["company_website"].'</p>
          </div>
       </div>
       <div class="row">
       <div classe="col-md-2">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
          </svg>
      </div>
      <div class="col-md-10">
         <p  class="card-text ">'.$company["company_tel"].'</p>
      </div>
   </div>
         
       </div>
     </div> <br>';
     
    }}
    ?> 
     
    
      





















<?php
require "footer.php";

 ?>