<?php

require_once __DIR__ . "/Model/Comment.php";
require_once __DIR__ . "/Repository/CommentRepository.php";
require_once __DIR__ . "/GetConnection.php";

use Model\Comment;
use Repository\CommentRepositoryImpl;

$connection = getConnection();
$repository = new CommentRepositoryImpl($connection);

$comments = $repository->findAll();
var_dump($comments[0]);


$connection = null;