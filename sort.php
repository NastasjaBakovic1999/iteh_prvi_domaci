<?php  
 //sort.php  
 $connect = mysqli_connect("localhost", "root", "", "knjigolovac");  
 $output = '';  
 $order = $_POST["order"];  
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 $query = "SELECT k.KnigaID, k.Naziv,k.Autor,k.Zanr,i.NazivIK as NazivIK from knjige k join izdavac i on i.ID=k.IzdavacID ORDER BY k.KnigaID".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($connect, $query);  
 $output .= '  
 <table class="table table-bordered">  
      <tr>  
           <th><a class="column_sort" id="naziv" data-order="'.$order.'" href="#">Naziv</a></th>  
           <th><a class="column_sort" id="autor" data-order="'.$order.'" href="#">Autor</a></th>  
           <th><a class="column_sort" id="zanr" data-order="'.$order.'" href="#">Zanr</a></th>  
           <th><a class="column_sort" id="izdavac" data-order="'.$order.'" href="#">Izdavacka kuca</a></th>  
      </tr>  
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
      <tr>  
           <td>' . $row['Naziv'] . '</td>  
           <td>' . $row['Autor'] . '</td>  
           <td>' . $row['Zanr'] . '</td>  
           <td>' . $row['NazivIK'] . '</td>  
      </tr>  
      ';  
 }  
 $output .= '</table>';  
 echo $output;  
 ?>  
