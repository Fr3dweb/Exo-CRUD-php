<?php
session_start();

include 'model/Media.php';
include 'model/Type.php';
include 'model/User.php';

include 'security/auth.php';

include 'service/bdd.php';
include 'service/flash_messages.php';

include 'router.php';
