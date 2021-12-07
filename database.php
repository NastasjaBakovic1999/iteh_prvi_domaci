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
		public function fetch(){
			$data=null; 
			$query = "SELECT k.KnigaID, k.Naziv,k.Autor,k.Zanr,i.NazivIK as NazivIK from knjige k join izdavac i on i.ID=k.IzdavacID";
			if($sql = $this->dblink->query($query)){
				while ($row = mysqli_fetch_assoc($sql)){
					$data[]=$row;
				}
			}
			return $data;
		}
		
			public function delete($id){
			$query = "DELETE from knjige WHERE KnigaID='$id'";
			if($sql = $this->dblink->query($query)){
				return true;
			}
			else return false;
		}

			public function vratiZanr(){
    		$data=null;
    		$query="select Zanr from knjige";
    
   		 	if($sql=$this->dblink->query($query)){
    		while($row=mysqli_fetch_assoc($sql)){
   	 		$data[]=$row;
    			} 
    			}
    			return  $data;
    			}

				public function edit($id){
			$data = null;
			$query = "SELECT * from knjige WHERE KnigaID='$id'";
			if($sql = $this->dblink->query($query)){
				while ($row = $sql -> fetch_assoc()){
					$data =$row;
				}
			}
			return $data; 
		}
		
		public function update($data){
			$query = "UPDATE knjige SET Naziv='$data[Naziv]', Zanr='$data[Zanr]',Autor='$data[Autor]', IzdavacID='$data[IzdavacID]' WHERE KnigaID='$data[id]'";
			if($sql = $this->dblink->query($query)){
				return true;
			}else {
				return false;
			}
		}	

		public function prikazSortiranjeRastuce(){
    $data=null;
    $query="SELECT k.KnigaID, k.Naziv,k.Autor,k.Zanr,i.NazivIK as NazivIK 
			from knjige k join izdavac i on i.ID=k.IzdavacID order by k.Naziv asc";
    if($sql=$this->dblink->query($query)){
    while($row=mysqli_fetch_assoc($sql)){
    $data[]=$row;
    }   
    }
    return  $data;
}
?>
