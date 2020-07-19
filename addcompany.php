<?php
require_once "header.php";
require_once "includes/company.inc.php";
require "company.php";
 ?>
<?php  $cmp=new company; ?>

      <h2 class="text-center">Add Company</h2>
      <?php 
          if(isset($_GET["error"]))
          {
            if($_GET["error"] == "emptyFields")    echo '<p style="color:red">there is an empty fields</p> ';
            else if($_GET["error"] == "success") { echo '<p style="color:green">company has been added</p> '; }
            
          }
      ?>
      <form action="create_listing.php" method="post">
          <div class="form-group"><label>Company</label> <input type="text" class="form-control" name="company"> </div>
          <div class="form-group"><label>Sector</label>
             <select type="text" class="form-control" name="sector_id"> 
                <option value="0">Choose Category</option>
                <?php foreach($cmp->getCategories() as $category): ?>
                <option value="<?php echo $category["id"] ; ?> "><?php echo $category["name"] ; ?></option>
                <?php endforeach ; ?> 
             </select>
          </div>
          <div class="form-group"><label>Website</label> <input type="text" class="form-control" name="website"> </div>
          <div class="form-group"><label>Address</label> <input type="text" class="form-control" name="address"> </div>
          <div class="form-group"><label>Email</label> <input type="text" class="form-control" name="email"> </div>
          <div class="form-group"><label>Phone number</label> <input type="text" class="form-control" name="number"> </div>
          <div class="form-group"><label>City</label> <input type="text" class="form-control" name="city"> </div>
          <div class="form-group"><label>sector</label> <input type="text" class="form-control" name="sector"> </div>
          <button class="btn btn-lg btn-success" type="submit" name="submit-add">submit</button>
      
      </form>




<?php
require "footer.php";
 ?>