<?php
require "core/init.php";

if (!$User->isLoged()) {
    session_destroy();    
    redirect("user.php");
}