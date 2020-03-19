<?php

// session_start();

if (empty($_SESSION['count'])) {
   $_SESSION['count'] = 1;
} else {
   $_SESSION['count']++;
}



?>

<p>
Hello visitor, you have seen this page <?php echo $_SESSION['userid']; ?> times.
</p>
<p>
The session ID is <?php echo session_id(); ?>.
</p>


