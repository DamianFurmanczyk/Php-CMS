<?php
    require('functions.php');
    session_start();
    
    session_destroy();
    session_start();
    flash('Wylogowano', 'info', '../public_html/index.php');