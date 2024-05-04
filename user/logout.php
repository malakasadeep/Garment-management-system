<?php
session_start();

session_destroy();

header("Location: /Online_Recipe_Management_System");
?>