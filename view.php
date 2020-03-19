<?php
    include 'scripts/includes/header.inc.php';
?>

<div class="container" style="margin-top:30px;">
    <table id="contracts-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th></th>

                <th>Bride</th>
                <th>Groom</th>
                <th>PDF</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require './scripts/includes/dbh.php';

            $stmt = $mysqli->prepare("SELECT * from contracts");
            $stmt->execute();
            $result = $stmt->get_result();
         
            // if ($result->num_rows === 0) {
               
            // }

        
            while($row = $result->fetch_assoc()) {
                $contractId = $row['contractId'];
                $bride = $row['brideName'];
                $groom = $row['groomName'];
                echo <<<FRAG
                <tr> 
                    <td>
                        <a href=""><ion-icon name='ios-create'></ion-icon></a>
                        <a href="view.php?contractId=$contractId"><ion-icon name='ios-eye'></ion-icon></a>
                    </td>
                    <td>$bride</td>
                    <td>$groom</td>
                    <td>bowandarrowfilms_$bride-$groom.pdf</td>
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
                <th>PDF</th>

            </tr>
        </tfoot>
    </table>

    <script>
    $(document).ready(function() {
        $('#contracts-table').DataTable({
            columnDefs: [{
                width: 90,
                targets: 0
            },
            { "orderable": false, "targets": 0 }],
        });
    });
    </script>

  
    <?php
   include 'scripts/includes/footer.inc.php';