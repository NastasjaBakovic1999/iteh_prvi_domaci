<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Izmena knjige</title>
  </head>
   <ul class="nav justify-content-end" style="background-color:rgba(255, 255, 255,0.4);">
  <li class="nav-item">
    <a class="nav-link active" href="index.php" style="color:black">Unos knjiga</a>
  </li>
   <li class="nav-item">
    <a class="nav-link active" href="knjizara.php" style="color:black">Knjizara</a>
  </li>
</ul>
  <body style="background-image: url('red.jpg'); height:100%;width:100%  background-repeat: no-repeat; background-position: center;background-size: cover;">
<div class="container" style="height:100%;width:100%">
		<div class="row">
		<div class="col-md-12 mt-5">
			<h1 class="text-center">Knjizara</h1>
			<hr style="height:1 px;color:black;background-color:black;">
		</div>
		</div>
		<div class="row">
			<div class="col-md-5 mx-auto">
			<?php
			include 'database.php';
			 $database = new Database();
			
			 $id = $_REQUEST['id'];
		     $row = $database->edit($id);
			
			if (isset($_POST['update'])) {
				if (isset($_POST['knjiga']) && isset($_POST['zanr']) && isset($_POST['autor'])) {
					if (!empty($_POST['knjiga']) && !empty($_POST['zanr']) && !empty($_POST['autor'])) {
						
						$data['id'] = $id;
						$data['Naziv'] = $_POST['knjiga'];
						$data['Zanr']= $_POST['zanr'];
						$data['Autor'] = $_POST['autor'];
						$data['IzdavacID'] = $_POST['izdavac'];
					
						$update = $database->update($data);
						
						if($update){
						echo "<script>alert('Uspesno ste apdejtovali stavku.');</script>";
						echo "<script>window.location.href = 'knjizara.php';</script>";
					}else{
						echo "<script>alert('Neuspesno!');</script>";
						echo "<script>window.location.href = 'knjizara.php';</script>";
					}
					}else {
						echo "<script>alert('Niste uneli sva polja');</script>";
						header("Location: edit.php?id=$id");
					}
				}
			}
				?>
				
				<form name="form1" action="" method="post" style="background-color:rgba(255, 255, 255,0.6); padding:5%">
              <div class="form-group" style="color:black; font-weight:bold;">
              <label for="">Knjiga</label>
			   <input type="text" name="knjiga" value="<?php echo $row['Naziv'];?>" class="form-control">
            </div> 
            
            <div class="form-group" style="color:#black; font-weight:bold;">
              <label for="">Autor</label>
              <input type="text" name="autor" value="<?php echo $row['Autor'];?>"class="form-control">
            </div>
            <div class="form-group" style="color:black; font-weight:bold;">
              <label for="">Zanr</label>
              <input type="text" name="zanr" value="<?php echo $row['Zanr'];?>" class="form-control">
            </div>
			
				<div class="form-group">
      <label for="izdavac" style="color:#white; font-weight:bold;">Izdavačka kuća</label>
      <select class="form-control" id="izdavac" value="<?php echo $row['IzdavacID'];?>" name="izdavac">
      
      </select>
    </div>
			
            <div class="form-group">
              <button type="submit" name="update" class="btn btn-primary" onclick="allnumeric(document.form1.knjigolovac)"style="background-color:#89cff0; margin-top:20px; font-weight:bold; border-color:white;">Izmeni</button>
            </div>
          </form>
		  </div>
		  </div>
	</div>
	<div class="podaci" style="margin:10%; margin-left:15%; background-color:rgba(255, 255, 255,0.7);padding:2%;text-align:center;
	border-radius:1%">
	<p>Odaberite izdavacku kucu za koju zelite da vidite podatke:</p>
	<form action=""> 
	<select name="customers" onchange="prikaziIK(this.value)">
	<option value="">Odaberite</option>
	<option value="2">Laguna</option>
	<option value="1">Vulkan</option>
	<option value="3">Finesa</option>
	</select>
	</form>
	<br>
	<div id="txtHint"> </div>
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
  	<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
  margin-left: auto;
  margin-right: auto;
}
th,td {
  padding: 5px;
}
</style>
   </body>
</html>