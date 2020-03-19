<?php
require './scripts/includes/dbh.php';
if (!empty($_POST)) {
    $output = '';
    $message = '';
    $brideName = mysqli_real_escape_string($mysqli, $_POST["brideName"]);
    $groomName = mysqli_real_escape_string($mysqli, $_POST["groomName"]);
    $address = mysqli_real_escape_string($mysqli, $_POST["address"]);
    $contactNumber = mysqli_real_escape_string($mysqli, $_POST["contactNumber"]);
    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
    $weddingDate = mysqli_real_escape_string($mysqli, $_POST["weddingDate"]);
    $bridePrepLoc = mysqli_real_escape_string($mysqli, $_POST["bridePrepLoc"]);
    $groomPrepLoc = mysqli_real_escape_string($mysqli, $_POST["groomPrepLoc"]);
    $ceremonyLocation = mysqli_real_escape_string($mysqli, $_POST["ceremonyLocation"]);
    $receptionLocation = mysqli_real_escape_string($mysqli, $_POST["receptionLocation"]);
    $prenupDate = mysqli_real_escape_string($mysqli, trim($_POST["prenupDate"]));
    $prenupLocation = mysqli_real_escape_string($mysqli, $_POST["prenupLocation"]);
    $totalAmount = mysqli_real_escape_string($mysqli, $_POST["totalAmount"]);
    $downPayment = mysqli_real_escape_string($mysqli, $_POST["downPayment"]);
    $remainingBalance = mysqli_real_escape_string($mysqli, $_POST["remainingBalance"]);

    if ($prenupDate == null){
        $prenupDate_ = '1990-01-01';
    }else{
        $prenupDate_ = $prenupDate ;
    }


    if ($totalAmount == null){
        $totalAmount_ = '0';
    }else{
        $totalAmount_ = $totalAmount ;
    }

    if ($downPayment == null){
        $downPayment_ = '0';
    }else{
        $downPayment_ = $downPayment ;
    }

    if ($remainingBalance == null){
        $remainingBalance_ = '0';
    }else{
        $remainingBalance_ = $remainingBalance ;
    }

    echo $status;
    if ($_POST["employee_id"] != '') {
        $query = "
           UPDATE contracts
           SET brideName='$brideName',
           groomName='$groomName',
           address='$address',
           contactNumber = '$contactNumber',
           email = '$email',
           weddingDate='$weddingDate',
           bridePrepLoc='$bridePrepLoc',
           groomPrepLoc = '$groomPrepLoc',
           ceremonyLocation = '$ceremonyLocation',
           receptionLocation='$receptionLocation',
           prenupDate='$prenupDate_',
           prenupLocation = '$prenupLocation',
           totalAmount = '$totalAmount_',
           downPayment='$downPayment_',
           remainingBalance='$remainingBalance_'
            WHERE contractId='" . $_POST["employee_id"] . "'";
        $message = 'Data Updated';
    } 
    else  
    {  
         $query = "  
         INSERT INTO tbl_employee(name, address, gender, designation, age)  
         VALUES('$name', '$address', '$gender', '$designation', '$age');  
         ";  
         $message = 'Data Inserted'; 
          
    }  
   $resultq =  mysqli_query($mysqli, $query);
    // echo 'ERROR: '. mysqli_error($mysqli);
    if(mysqli_query($mysqli, $query))  
    {          
       
        $stmt = $mysqli->prepare("SELECT * from contracts ORDER BY contractId desc");
        $stmt->execute();
        $result = $stmt->get_result();
         $contractId = $row['contractId'];
                $bride = $row['brideName'];
                $groom = $row['groomName'];

           
         while($row = mysqli_fetch_array($result))  
         {   $contractId = $row['contractId'];
            $bride = $row['brideName'];
            $groom = $row['groomName'];
            $output .= <<<FRAG
            <tr> 
                <td style="text-align:center;">
                <button type="button" name="edit" value="edit" id="$contractId" class="btn btn-xs edit_data btn-icon" ><ion-icon name='ios-create'></ion-icon></button>
         
                <button type="button" name="view" value="view" id="$contractId" class="btn btn-xs view_data btn-icon" ><ion-icon name='ios-eye'></ion-icon></button>
                <button type="button" name="delete" value="delete" id="$contractId" class="btn btn-xs delete_data btn-icon" ><ion-icon name='ios-trash'></ion-icon></button>

                </td>
                <td>$bride</td>
                <td>$groom</td>
                <td>bowandarrowfilms_$bride-$groom.pdf</td>
            </tr>
FRAG;
         }  
        
    }  
    echo $output;  
}  
?>
