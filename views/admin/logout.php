<?php

require('views/assets/php/essentials.php');

session_start();
session_destroy();
redirect('index.php');

