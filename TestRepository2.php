<?php

require_once __DIR__ . "/Model/Comment.php";
require_once __DIR__ . "/Repository/CommentRepository.php";
require_once __DIR__ . "/GetConnection.php";

use Model\Comment;
use Repository\CommentRepositoryImpl;

$connection = getConnection();
$repository = new CommentRepositoryImpl($connection);

$comment = $repository->findById(4);
var_dump($comment);

$comment2 = $repository->findById(5000); //null karena tidak ada
var_dump($comment2);


$connection = null;