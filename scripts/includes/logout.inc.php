<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    session_write_close();
    header('Location: ../../Login/index.html');
    exit;