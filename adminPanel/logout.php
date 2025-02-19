<?php
session_start();
session_destroy();
    header('Location: '.$baseUrl.'../admin-panel-login');
    exit;
?>