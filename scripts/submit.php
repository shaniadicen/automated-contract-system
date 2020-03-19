<?php


if (isset($_POST['submit-button'])) {
    require './includes/dbh.php';
    $brideName = trim($_POST['brideName']);
    $groomName = trim($_POST['groomName']);
    $address = trim($_POST['address']);
    $contactNumber = trim($_POST['contactNumber']);
    $email = trim($_POST['email']);
    $weddingDate = trim($_POST['weddingDate']);
    $bridePrepLoc = trim($_POST['bridePrepLoc']);
    $groomPrepLoc = trim($_POST['groomPrepLoc']);
    $ceremonyLoc = trim($_POST['ceremonyLoc']);
    $receptionLoc = trim($_POST['receptionLoc']);
    $prenupDate = trim($_POST['prenupDate']);
    $prenupLocation = trim($_POST['prenupLocation']);
    $sde = trim($_POST['sde']);
    $full = trim($_POST['full']);
    $pre = trim($_POST['pre']);
    $outoftown = trim($_POST['outoftown']);
    $remarks = trim($_POST['remarks']);

    $sde_pointer = "no";
    $full_pointer = "no";
    $pre_pointer = "no";
    $out_pointer = "no";

    if ($sde != null) {
        $sde_pointer = "yes";
    }

    if ($full != null) {
        $full_pointer = "yes";
    }

    if ($pre != null) {
        $pre_pointer = "yes";
    }

    if ($outoftown != null) {
        $out_pointer = "yes";
    }

    if ($prenupDate == null) {
        $prenupDate = null;
    }

    if ($prenupLocation == null) {
        $prenupLocation = null;
    }

    if ($remarks == null) {
        $remarks = null;
    }

    $stmt = $mysqli->prepare("INSERT INTO `contracts` (`contractId`,`brideName`, `groomName`, `address`, `contactNumber`, `email`, `weddingDate`, `bridePrepLoc`, `groomPrepLoc`, `ceremonyLocation`, `receptionLocation`, `prenupDate`, `prenupLocation`, `remarks`, `sde`,`full`,`pre`,`outoftown`,`createDate`) VALUES (null,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP);");
    $stmt->bind_param("sssssssssssssssss", $brideName, $groomName, $address, $contactNumber, $email, $weddingDate, $bridePrepLoc, $groomPrepLoc, $ceremonyLoc, $receptionLoc, $prenupDate, $prenupLocation, $remarks, $sde_pointer, $full_pointer, $pre_pointer, $out_pointer);
    
    if($stmt->execute()){
        sendEmail($email);
        echo ("Error description: " . mysqli_error($mysqli));

        $stmt->close();
        header('Location: ../index.php?status=success');
    }else{
        header('Location: ../index.php?status=fail');

    }
    

} else {
    header('Location: ../../index.php?status=error');
    exit();
}

function sendEmail($email)
{
    $to = "$email";
    $subject = 'Bow & Arrow Films: Confirmation Email';
    $message = 'This is a test';
    $headers = "From: Bow & Arrow Films <shaniadicendev@gmail.com>\r\n";
    $headers .= "Reply-To: shaniadicendev@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    $result = mail($to, $subject, $message, $headers);
    var_dump($result);
    echo "Email Success";

}
