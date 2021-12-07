<?php 

	Class Database{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db="knjigolovac"; 
		private $dblink;

		public function __construct(){
			try {	
				$this->dblink = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}
		
		public function vrati(){
    return $this->dblink;
}

public function insert(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['knjiga']) && isset($_POST['zanr']) && isset($_POST['autor'])) {
					if (!empty($_POST['knjiga']) && !empty($_POST['zanr']) && !empty($_POST['autor']) && !empty($_POST['izdavac'])) {
						
						echo $knjiga = $_POST['knjiga'];
						echo $zanr= $_POST['zanr'];
						echo $autor = $_POST['autor'];
						echo $izdavac = $_POST['izdavac'];
					
						$query = "INSERT INTO knjige(Naziv,Zanr,Autor,IzdavacID) VALUES ('$knjiga','$zanr','$autor','$izdavac')";
						if ($sql = $this->dblink->query($query)) {
							echo "<script>alert('Uspesno ste dodali novu knjigu!');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}else{
							echo "<script>alert('Neuspesno dodavanje');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}
					
					}else{
						echo "<script>alert('Unesite sve u odgovarajucem formatu!');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				}
			}
		}
		
?>