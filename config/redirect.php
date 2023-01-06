<?php
session_start();

if (!isset($_SESSION['email'])) {
    $path = route('');
    header("Location: $path");
}