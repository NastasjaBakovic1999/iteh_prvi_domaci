<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="pretraga.js"></script>
    <title>Knjižara</title>
  </head>
  <ul class="nav justify-content-end" style="background-color:rgba(255, 255, 255,0.6);">
  <li class="nav-item">
    <a class="nav-link active" href="index.php" style="color:black">Unos knjiga</a>
  </li>
 
</ul>
  <body style="background-image: url('red.jpg'); background-repeat: no-repeat; background-position: center;background-size: cover;">
  <div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<h1 class="text-center" style="color:black">Knjižara</h1>
			<hr style="height:1 px;color:black;background-color:black;">
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
		<table>
		<tr>
		<th>
			<p style="margin-right:50px; font-weight:bold;">Pronađite knjigu na osnovu žanra: </p> 
			<p> <span id="txtHint"></span> </p>
                 
            <input id="myInput" type="text" placeholder="Pretrazi.." onkeyup="showHint(this.value)" style="margin-bottom:5%">
            <br>
			</th>
		
			<th>
			
			<a class="nav-link" href="sortirajOpadajuce.php">
            <button type="submit" style="background-color:#89cff0; border-color:transparent"  name="nazad" class="btn btn-primary">Sortiraj opadajuce</button>
			</a>
			
			</th>
			
			<th>
			
			<a class="nav-link" href="sortirajRastucePisci.php">
			<button type="submit" style="background-color:#89cff0; border-color:transparent; margin-left=60%"  name="nazad" class="btn btn-primary">Sortiraj rastuce</button>
			</a>
			
			</th>
			</tr>
		
		</table>
		<table class="table" style="background-color:rgba(255, 255, 255,0.6);">
			<thead>
			
				<tr>
					<th>Redni broj</th>
					<th>Naziv</th>
					<th>Autor</th>
					<th>Zanr</th>
					<th>Izdavačka kuća</th>
					<th>Operacije</th>
				</tr>
			</thead>
			<tbody id="tabela">
	
			
			<?php
			include 'database.php';
			 $database = new Database();
			 $rows=$database->prikazSortiranjeRastuce();
			 $i=1;
			 if(!empty($rows)){
				 foreach($rows as $row){
					 
				
			?>
			
			<tr>
			<td><?php echo $i++ ?></td>
			<td><?php echo $row['Naziv'] ?></td>
			<td><?php echo $row['Autor']?></td>
			<td><?php echo $row['Zanr'] ?></td>
			<td><?php echo $row['NazivIK'] ?></td>
			<td>
			<a href="select.php?id=<?php echo $row['KnigaID']; ?>" class="badge badge-info">Prikaži detalje</a>
			<a href="delete.php?id=<?php echo $row['KnigaID']; ?>" class="badge badge-danger">Obriši</a>
			<a href="edit.php?id=<?php echo $row['KnigaID']; ?>" class="badge badge-success">Izmeni</a>
			</td>
			</tr>
			<?php
				 }
			} else{
				echo "Nema podataka";
			}
			?>
			</tbody>
		</table>
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
	
	<!--AJAX funkcija-->
	 <script>
          function showHint(str) {
          var xhttp;
          if (str.length == 0) { 
            document.getElementById("txtHint").innerHTML = "";
            return;
          }
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "ajaxPomoc.php?q="+str, true);
          xhttp.send();   
        }
    </script>
	<!--Pretraga po zanru-->
		 <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tabela tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
</script>
  </body>
</html>