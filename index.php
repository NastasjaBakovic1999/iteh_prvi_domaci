 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Moja knjižarica</title>
    <link rel="shortcut icon" type="image/jpg" href="book.png"/>
  </head>
  	<body style="background-image: url('knjizara.jpg'); background-repeat: no-repeat; background-position: center;background-size: cover;">
	<ul class="nav justify-content-end" style="background-color:rgba(0, 0, 0,0.6);">
 		<li class="nav-item">
    		<a class="nav-link active" href="knjizara.php" style="color:white">Knjižara</a>
  	</li>
	</ul>

	</div>
</nav>
    <div class="container" >
      <div class="row" >
        <div class="col-md-12 mt-5">
          <h1 class="text-center" style="color:white; font-weight:700; font-size:3rem">Dodaj u knjizaru</h1>
          <hr style="height: 2px;background-color: #89cff0; width: 60%; margin-left:225px;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto">

		     <?php
              include 'database.php';
             $database = new Database();
              $insert = $database->insert();
          ?>  

          <form name="form1"action="index.php" method="post" onsubmit="return validacija()" style="background-color: rgba(0, 0, 0, 0.3); padding:10px">
              <div class="form-group" style="color: white; font-weight:bold;">
              <label for="">Knjiga</label>
			   <input type="text" name="knjiga" class="form-control">
            </div> 
            
            <div class="form-group" style="color: white; font-weight:bold;">
              <label for="">Autor</label>
              <input type="text" name="autor" class="form-control">
            </div>
            <div class="form-group" style="color:white; font-weight:bold;">
			<label for="">Zanr</label>
             <input type="text" name="zanr" class="form-control">
				</div> 
				
			<div class="form-group"style="color:white; font-weight:bold;>
      <label for="izdavac" >Naziv izdavačke kuće</label>
      <span class="error"></span>
      <select class="form-control" id="IzdavacID" name="izdavac">
     <?php
      $dblink=$database->vrati();
	$upit="SELECT * FROM izdavac";
     $izdavac=$dblink->query($upit);?>
      
      <option disabled selected value>Odaberite izdavačku kuću: </option>
      <?php
       if(!empty($_POST['izdavac'])) {
      while($red=$izdavac->fetch_object()){?>
      <option <?php if($_POST['izdavac']==$red->ID){echo("selected");}?> value='<?php echo $red->ID; ?>' >
      <?php echo $red->NazivIK; ?></option>
      <?php
      }}else{
        while($red=$izdavac->fetch_object()){?>
      <option value='<?php echo $red->ID; ?>'>
      <?php echo $red->NazivIK; ?></option>
      <?php
      }}
      ?>
     
      </select>
    </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-primary" style="background-color:  #89cff0; font-weight:bold; border-color: white;">Dodaj</button>
            </div>
          </form>
        </div>
      </div>
    </div>

   <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
	

   </body>
</html>