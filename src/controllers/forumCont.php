<?php

// ce controller servira a gérer les sujets et les questions
require_once __DIR__ . './../models/autoload.php';


function getViewForum () {
    $topics = new Topics();
    $data = $topics->getTopics();
    require_once __DIR__.'./../views/forumView.php';

}

function getViewThisSubject ($id) {
    $topics = new Topics();
    $data = $topics->getThisTopics($id);
    require_once __DIR__.'./../views/thisForumView.php';

}