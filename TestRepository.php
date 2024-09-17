<?php

/*
Tidak ada kode SQL Script sama sekali DI bussiness logic
*/


require_once __DIR__ . "/Model/Comment.php";
require_once __DIR__ . "/Repository/CommentRepository.php";
require_once __DIR__ . "/GetConnection.php";

use Model\Comment;
use Repository\CommentRepositoryImpl;

$connection = getConnection();
$repository = new CommentRepositoryImpl($connection);

$comment = new Comment(email: "ahmad", comment: "testrepo");
$newComment = $repository->insert($comment);

var_dump($newComment);
echo $newComment->getId() . $newComment->getEmail() . $newComment->getComment() . PHP_EOL;

$connection = null;