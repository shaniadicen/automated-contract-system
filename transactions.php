<?php
    include 'scripts/includes/header.inc.php';
//     if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
//     // last request was more than 30 minutes ago
//     session_unset();     // unset $_SESSION variable for the run-time
//     session_destroy();   // destroy session data in storage
// }
// $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>
<div class="container" style="margin-top:30px;">
    <table id="contracts-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="width:20px;"></th>
                <th>Bride</th>
                <th>Groom</th>
                <th>Total Amount</th>
                <th>Down Payment</th>
                <th>Remaining Balance</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require './scripts/includes/dbh.php';

            $stmt = $mysqli->prepare("SELECT * from contracts");
            $stmt->execute();
            $result = $stmt->get_result();
        
            while($row = $result->fetch_assoc()) {
                $bride = $row['brideName'];
                $groom = $row['groomName'];
                $totalAmount = $row['totalAmount'];
                $remainingBalance = $row['remainingBalance'];
                $downPayment = $row['downPayment'];
                $status = $row['status'];
                
                $status_a = null;

                if ($status == "unpaid"){
                    $status_a = "<a href='paid.php?id=".$row['contractId']."' class='btn-icon btn btn-lg'><ion-icon name='ios-checkmark-circle-outline'></ion-icon> </a>";
                    $status_color = "";
                }else if ($status == "paid"){
                    $status_a = "<a href='unpaid.php?id=".$row['contractId']."' class='btn btn-icon btn-lg'><ion-icon name='ios-close-circle-outline'></ion-icon> </a>";
                    $status_color = "#f6e58d";
                }
                echo <<<FRAG
                <tr style="background-color: $status_color"> 
                    <td style="text-align:center;"> $status_a</td>
                    <td>$bride</td>
                    <td>$groom</td>
                    <td> $totalAmount </td>
                    <td> $downPayment </td>
                    <td> $remainingBalance </td>
                    <td> $status </td>
                </tr>
FRAG;
            }
            
            ?>

        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th>Bride</th>
                <th>Groom</th>
                <th>Total Amount</th>
                <th>Down Payment</th>
                <th>Remaining Balance</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>

    


    <script>
    $(document).ready(function() {
        $('#contracts-table').DataTable({
            columnDefs: [{
                    width: 100,
                    targets: 0
                },
                {
                    "orderable": false,
                    "targets": 0
                }
            ]
        });
    });
    </script>
    <?php
   include 'scripts/includes/footer.inc.php';