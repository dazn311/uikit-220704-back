<?php

if (!check_auth()) {
    redirect('/');
}

$title = "My Blog :: New document";
require_once VIEWS . '/documents/create.tpl.php';
