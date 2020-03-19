<?php  
require 'scripts/includes/dbh.php';
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM contracts WHERE contractId = '".$_POST["employee_id"]."'ORDER BY contractId desc";  
      $result = mysqli_query($mysqli, $query);
   
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="view-table">';  
      while($row = mysqli_fetch_array($result))  
      {  
          $package = null;
          $package .= '<ul class="list-group">';
        if(trim($row["sde"]) == "yes"){
            $package = "<li class='list-group-item'>Same Day Edit Wedding Video With Aerial Cinematography</li>";
    
        }
        if($row["full"] == "yes"){
           $package .= "<li class='list-group-item'>Full Wedding Video With Bow & Arrow Films Flashdrive</li>";
       }
       if($row["pre"] == "yes"){
            $package .= "<li class='list-group-item'>Pre Wedding Film With Aerial Cinematography</li>";
        }
        if($row["outoftown"] == "yes"){
            $package .= "<li class='list-group-item'>Out of Town<br>";
        }
                     $output .= '  
                <tr>  
                     <td width="30%"><label>{Bride} Name</label></td>  
                     <td width="70%">'.$row["brideName"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>{Groom} Name</label></td>  
                     <td width="70%">'.$row["groomName"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Address</label></td>  
                     <td width="70%">'.$row["address"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Contact Number</label></td>  
                     <td width="70%">'.$row["contactNumber"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Email</label></td>  
                     <td width="70%">'.$row["email"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Wedding Date</label></td>  
                    <td width="70%">'.$row["weddingDate"].'</td>  
                </tr>  
                <tr>  
                        <td width="30%"><label>{Bride} Preparation Location</label></td>  
                        <td width="70%">'.$row["bridePrepLoc"].'</td>  
                </tr>  
                <tr>  
                        <td width="30%"><label>{Groom} Preparation Location</label></td>  
                        <td width="70%">'.$row["groomPrepLoc"].'</td>  
                </tr>  
                <tr>  
                        <td width="30%"><label>Ceremony Location</label></td>  
                        <td width="70%">'.$row["ceremonyLocation"].'</td>  
                </tr>  
                <tr>  
                        <td width="30%"><label>Reception Location</label></td>  
                        <td width="70%">'.$row["receptionLocation"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Prenup Date</label></td>  
                    <td width="70%">'.$row["prenupDate"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>Prenup Location</label></td>  
                    <td width="70%">'.$row["prenupLocation"].'</td>  
                </tr> 

                <tr>  
                    <td width="30%"><label>Total Amount</label></td>  
                    <td width="70%">'.$row["totalAmount"].' </td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>Down Payment</label></td>  
                    <td width="70%">'.$row["downPayment"].'</td>  
                </tr>   
                <tr>  
                    <td width="30%"><label>Remaining Balance</label></td>  
                    <td width="70%">'.$row["remainingBalance"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>Status</label></td>  
                    <td width="70%">'.$row["status"].'</td>  
                </tr> 

                <tr>  
                    <td width="30%"><label>Remarks</label></td>  
                    <td width="70%">'.$row["remarks"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>Package</label></td>  
                    <td width="70%">'.$package.'</td>  
                </tr>   
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>