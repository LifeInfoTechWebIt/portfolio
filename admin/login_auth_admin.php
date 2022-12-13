<?php
session_start();

if (!isset($_SESSION['admin_login_id'])) {
    header("location: ./index.php");
}
