<?php
include("config/database.php");
session_destroy();
header("LOCATION: index.php");
