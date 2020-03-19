<?php
include './scripts/includes/dbh.php';
session_start();

if (!isset($_SESSION['userid'])) {
    header('Location: Login/index.html');
}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


$id = $_GET['id'];

$query = "SELECT * FROM contracts WHERE contractId = $id";  
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result)

// echo $id;
?>

<style type="text/css">
    .page_header { border: none; color: white; }
    div.note {color: #333; font-style: italic; width: 100%;font-family: 'bebasregular', sans-serif;}
    div.body {font-family: 'bebasregular', sans-serif;}
   /* div.body table,tr,td{ border:solid 1px black;} */
   div.body .blank-line{border-bottom:dotted 1px black; display:block; width:270px;}
    .field {font-family: 'bebasbook', sans-serif;}
    ul.main { width: 95%; list-style-type: square; }
    ul.main li { padding-bottom: 2mm; }
    h1 { text-align: center; font-size: 20mm}
    h3 { text-align: center; font-size: 14mm}
    a { text-decoration: none; color: white;}

</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt">
    <page_header>
        <div class="page_header">
            <img src="images/page-header.png" alt="Bow and Arrow Films Contract" style="height: 44.5%;" >
        </div>
    </page_header>
    <page_footer>
        <!-- <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
                    <a href="https://myphpnotes.tk/">https://myphpnotes.tk</a>
                </td>
                <td style="width: 34%; text-align: center">
                    Page [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 33%; text-align: right">

                </td>
            </tr>
        </table> -->
    </page_footer>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="body" style="text-align: center; width: 100%; ">
        <table style="width:100%;text-align:left;">
            <tr>
                <td colspan="2">NAME {BRIDE}</td>
                <td colspan="3"  class="blank-line" ><span class="field"><?php echo $row['brideName'];?></span></td>
            </tr>

            <tr>
                <td colspan="2">NAME {GROOM}</td>
                <td colspan="3" class="blank-line"><span class="field"><?php echo $row['groomName'];?></span></td>
            </tr>

            <tr>
                <td colspan="2">ADDRESS</td>
                <td colspan="3" class="blank-line"><span class="field"><?php echo $row['address'];?></span></td>
            </tr>

            <tr>
                <td colspan="2">CONTACT #</td>
                <td class="blank-line"><span class="field"><?php echo $row['contactNumber'];?></span></td>
                <td colspan="2" class="blank-line">EMAIL <span class="field"><?php echo $row['email'];?></span></td>
            </tr>

            <tr>
                <td colspan="2">WEDDING DATE</td>
                <td colspan="3" class="blank-line"><span class="field"><?php echo date('F d, Y', strtotime($row['weddingDate']));?></span></td>
            </tr>

            <tr>
                <td colspan="2">PREPARATION LOCATION {BRIDE}</td>
                <td colspan="3" class="blank-line"><span class="field"><?php echo $row['bridePrepLoc'];?></span></td>
            </tr>


            <tr>
                <td colspan="2">PREPARATION LOCATION {GROOM}</td>
                <td colspan="3" class="blank-line"><span class="field"><?php echo $row['groomPrepLoc'];?></span></td>
            </tr>
            
            <tr>
                <td colspan="2">CEREMONY LOCATION</td>
                <td class="blank-line"><span class="field"><?php echo $row['ceremonyLocation'];?></span></td>
                <td colspan="2" class="blank-line">TIME</td>
            </tr>
            
            <tr>
                <td colspan="2">RECEPTION LOCATION </td>
                <td colspan="3" class="blank-line"><span class="field"><?php echo $row['receptionLocation'];?></span></td>
            </tr>

            <tr>
                <td colspan="2">PRE-NUP DATE</td>
                <td class="blank-line"><span class="field"><?php 
                    if ($row['prenupDate'] == '1990-01-01'){
                        $date_prenup = '';
                    }else {
                        $date_prenup = date('F d, Y', strtotime($row['prenupDate']));
                    }
                    echo $date_prenup;?></span></td>
                <td colspan="2" class="blank-line">PRE-NUP LOCATION</td>
            </tr>


            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>




        </table>
    </div>

</page>
