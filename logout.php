<?php
require "core/init.php";

if ($User->isLoged()) {
    session_destroy();
    header("location: index.php");
}