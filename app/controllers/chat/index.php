<?php

if (isset($_SESSION['user'])) {
    require_once VIEWS . '/chat/index.tpl.php';
} else {
    require_once VIEWS . '/chat/index.tpl.php';
}
