<?php

use Utils\{App, Db, Articles};

function gerDataForArticles($query,$params): array|bool
{
    $db = App::get(Db::class);
    $documents = $db->query($query,$params)->find();//object|false
    if ($documents) {
        $ts = $documents['name'] ?? '';
        $knowledgeCode = $documents['fileName'] ?? "";
        return Articles::getArticle($ts, $knowledgeCode);
    }
    return false;
}
