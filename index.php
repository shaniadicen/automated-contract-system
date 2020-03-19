<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bow and Arrow Films</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/icon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <!--===============================================================================================-->

    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">

    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>


</head>

<body>
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" method="POST" action="scripts/submit.php">
                <span class="contact100-form-title">
                    <img src="images/icons/icon.png" width="120" height="120" alt="Bow and Arrow Films" />
                </span>


                <div class="confirmation-box">
                    <?php
                        if (isset($_GET['status'])){
                            if ($_GET['status'] == "success"){
                                echo "<span class='confirmation-success'>Success! Contract Form Submitted.</span>";
                            }
                        }
                    ?>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Please enter bride name">
                    <input class="input100" type="text" name="brideName" placeholder="{Bride} Name" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Please enter groom name">
                    <input class="input100" type="text" name="groomName" placeholder="{Groom} Name" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Please enter address">
                    <input class="input100" type="text" name="address" placeholder="Address" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Please enter phone">
                    <input class="input100" type="text" name="contactNumber" placeholder="Contact Number" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Please enter your email: e@a.x">
                    <input class="input100" type="text" name="email" placeholder="E-mail" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Please enter wedding date">
                    <input class="input100" type="text" onfocus="(this.type='date')" onblur="(this.type='text')"
                        name="weddingDate" placeholder="Wedding Date" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Please enter bride preparation location">
                    <input class="input100" type="text" name="bridePrepLoc"
                        placeholder="{Bride} Preparation Location" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Please enter groom preparation location">
                    <input class="input100" type="text" name="groomPrepLoc"
                        placeholder="{Groom} Preparation Location" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Please enter ceremony location">
                    <input class="input100" type="text" name="ceremonyLoc" placeholder="Ceremony Location" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Please enter reception location">
                    <input class="input100" type="text" name="receptionLoc" placeholder="Reception Location" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100">
                    <input class="input100" type="text" onfocus="(this.type='date')" onblur="(this.type='text')"
                        name="prenupDate" placeholder="Prenup Date" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100">
                    <input class="input100" type="text" name="prenupLoc" placeholder="Prenup Location" />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100">
                    <div class="form-check checkboxes">

                        <span class="packages">{Packages}</span>
                        <br>
                        <input type="checkbox" name="sde" value="sde" class="form-check-input"
                            onclick="var input = document.getElementById('full'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />
                        <label>Same Day Edit Wedding Video With Aerial Cinematography <span
                                class="price">{P40,000}</span></label>
                        <div class="checkbox-child">
                            <input type="checkbox" name="full" id="full" value="full" class="form-check-input"
                                disabled="disabled" />
                            <label>Full Wedding Video With Bow & Arrow Films Flashdrive <span
                                    class="price">{P5,000}</span></label>
                        </div>
                        <input type="checkbox" name="pre" value="pre" class="form-check-input" />
                        <label>Pre-wedding Film With Aerial Cinematography <span class="price">{P20,000}</span></label>
                        <br>
                        <input type="checkbox" name="outoftown" value="outoftown" class="form-check-input" />
                        <label>Out of Town </label>
                    </div>
                </div>

                <div class="wrap-input100">
                    <textarea class="input100" name="remarks" placeholder="Your Remarks" maxlength="1024"></textarea>
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" name="submit-button">
                        <span>
                            <i class="fa fa-paper-plane-o m-r-6" aria-hidden="true" size="large"></i>
                            Submit
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <footer>
        <a href="./contracts.php">
            <ion-icon name="ios-heart"></ion-icon>
        </a>
    </footer>
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->

</body>

</html>