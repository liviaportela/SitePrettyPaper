<?php
session_start();

// Encerrar a sessão
session_destroy();

header("Location: login.php");

exit();