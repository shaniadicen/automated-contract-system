<?php
require './scripts/includes/dbh.php';
if (!empty($_POST)) {
    $output = '';
    $message = '';

    if ($_POST["employee_id"] != '') {
        $query = "
           DELETE FROM contracts
            WHERE contractId='" . $_POST["employee_id"] . "'";
        $message = 'Data Deleted';
    } 
     
//    $resultq =  mysqli_query($mysqli, $query);
    if(mysqli_query($mysqli, $query))  
    {          
       
        $stmt = $mysqli->prepare("SELECT * from contracts ORDER BY contractId desc");
        $stmt->execute();
        $result = $stmt->get_result();
           
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
