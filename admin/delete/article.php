<?php

require_once '../../src/function.php';

if (!user_is_admin()) header('Location: /');

if ($_GET && isset($_GET['id'])) {
    $article = articles_from_id($_GET['id']);
    if ($article) {
        articles_remove($_GET['id']);
    }
}

header('Location: /admin/');