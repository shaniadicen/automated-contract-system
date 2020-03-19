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
        <tbody id="contracts-tbody">
            <?php
            require './scripts/includes/dbh.php';

            $stmt = $mysqli->prepare("SELECT * from contracts");
            $stmt->execute();
            $result = $stmt->get_result();
        
            while($row = $result->fetch_assoc()) {
                $contractId = $row['contractId'];
                $bride = $row['brideName'];
                $groom = $row['groomName'];
                echo <<<FRAG
                <tr> 
                    <td style="text-align:center;"> 
                    <button type="button" name="edit" value="edit" id="$contractId" class="btn btn-xs edit_data btn-icon" ><ion-icon name='ios-create'></ion-icon></button>
         
                    <button type="button" name="view" value="view" id="$contractId" class="btn btn-xs view_data btn-icon" ><ion-icon name='ios-eye'></ion-icon></button>
                    <button type="button" name="delete" value="delete" id="$contractId" class="btn btn-xs delete_data btn-icon" ><ion-icon name='ios-trash'></ion-icon></button>
                    </td>
                    <td>$bride</td>
                    <td>$groom</td>
                    <td><a href="makepdf.php?id=$contractId">bowandarrowfilms_$bride-$groom.pdf</a></td>
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

    <!-- The view modal -->
    <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Client Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="employee_detail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!--The edit modal-->
    <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Client Information: Update</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form method="post" id="insert_form">
                        <label>Enter Bride Name</label>
                        <input type="text" name="brideName" id="brideName" class="form-control form-control-sm" data-validate="Please enter groom preparation location"/>
                        <br />
                        <label>Enter Groom Name</label>
                        <input type="text" name="groomName" id="groomName" class="form-control form-control-sm" />
                        <br />
                        <label>Enter Address</label>
                        <input type="text" name="address" id="address" class="form-control form-control-sm">
                        <br />

                        <div class="form-row">
                            <div class="col">
                                <label>Enter Contact Number</label>
                                <input type="text" name="contactNumber" id="contactNumber"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col">
                                <label>Enter Email</label>
                                <input type="text" name="email" id="email" class="form-control form-control-sm">
                            </div>
                        </div>
                        <label>Enter Wedding Date</label>
                        <input type="date" name="weddingDate" id="weddingDate" class="form-control form-control-sm">
                        <br>
                        <label>Enter Bride Preparation Location</label>
                        <input type="text" name="bridePrepLoc" id="bridePrepLoc" class="form-control form-control-sm">
                        <br />
                        <label>Enter Groom Preparation Location</label>
                        <input type="text" name="groomPrepLoc" id="groomPrepLoc" class="form-control form-control-sm">
                        <br />
                        <label>Enter Ceremony Location</label>
                        <input type="text" name="ceremonyLocation" id="ceremonyLocation" class="form-control form-control-sm">
                        <br />
                        <label>Enter Reception Location</label>
                        <input type="text" name="receptionLocation" id="receptionLocation" class="form-control form-control-sm">
                        <br />
                        <div class="form-row">
                            <div class="col">
                                <label>Enter Prenup Date</label>
                                <input type="date" name="prenupDate" id="prenupDate"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col">
                                <label>Enter Prenup Location</label>
                                <input type="text" name="prenupLocation" id="prenupLocation"
                                    class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label>Enter Total Amount</label>
                                <input type="text" name="totalAmount" id="totalAmount"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col">
                                <label> Down Payment</label>
                                <input type="text" name="downPayment" id="downPayment"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col">
                                <label> Remaining Balance</label>
                                <input type="text" name="remainingBalance" id="remainingBalance"
                                    class="form-control form-control-sm">
                            </div>
                        </div>

                        <input type="hidden" name="employee_id" id="employee_id" />
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-update" />


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('.view_data').click(function() {
            var employee_id = $(this).attr("id");
            $.ajax({
                url: "select.php",
                method: "post",
                data: {
                    employee_id: employee_id
                },
                success: function(data) {
                    $('#employee_detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#add').click(function() {
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
        $(document).on('click', '.edit_data', function() {
            var employee_id = $(this).attr("id");
            $.ajax({
                url: "fetch.php",
                method: "POST",
                data: {
                    employee_id: employee_id
                },
                dataType: "json",
                success: function(data) {
                    $('#brideName').val(data.brideName);
                    $('#groomName').val(data.groomName);
                    $('#address').val(data.address);
                    $('#contactNumber').val(data.contactNumber);
                    $('#email').val(data.email);
                    $('#weddingDate').val(data.weddingDate);
                    $('#bridePrepLoc').val(data.bridePrepLoc);
                    $('#groomPrepLoc').val(data.groomPrepLoc);
                    $('#ceremonyLocation').val(data.ceremonyLocation);
                    $('#receptionLocation').val(data.receptionLocation);
                    $('#prenupDate').val(data.prenupDate);
                    $('#prenupLocation').val(data.prenupLocation);
                    $('#totalAmount').val(data.totalAmount);
                    $('#downPayment').val(data.downPayment);
                    $('#remainingBalance').val(data.remainingBalance);
                    $('#status').val(data.status);
                    $('#employee_id').val(data.contractId);  
                    $('#insert').val("Update");

                    $('#add_data_Modal').modal('show');
                }
            });
        });

        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            if ($('#brideName').val() == "") {
                alert("Name is required");
            } else if ($('#groomName').val() == '') {
                alert("Address is required");
            } else if ($('#designation').val() == '') {
                alert("Designation is required");
            } else if ($('#age').val() == '') {
                alert("Age is required");
            } else {
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function() {
                        $('#insert').val("Inserting");
                    },
                    success: function(data) {
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        $('#contracts-tbody').html(data);
                    }
                });
            }
        });
        $(document).on('click', '.view_data', function() {
            var employee_id = $(this).attr("id");
            if (employee_id != '') {
                $.ajax({
                    url: "select.php",
                    method: "POST",
                    data: {
                        employee_id: employee_id
                    },
                    success: function(data) {
                        $('#employee_detail').html(data);
                        $('#dataModal').modal('show');
                    }
                });
            }
        });

        $(document).on('click', '.delete_data', function() {
            var employee_id = $(this).attr("id");
            var result = confirm("Want to delete?");

            if (result){
                if (employee_id != '') {
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: {
                        employee_id: employee_id
                    },
                    success: function(data) {
                        $('#add_data_Modal').modal('hide');
                        $('#contracts-tbody').html(data);
                    }
                });
            }
            }
         
        });

      

        $('#contracts-table').DataTable({
            columnDefs: [{
                    width: 100,
                    targets: 0
                },
                {
                    "orderable": false,
                    "targets": 0
                }
            ],
        });
    });
    </script>


    <?php
   include 'scripts/includes/footer.inc.php';