<?php


/*
Step 2 : Membuat Repository
Disini kita membuat kontrak function yg kita butuhkan untuk pengolahan data ke database
jadi hubungan dengan database tidak dilakukan di bussiness logic di repository pattern
*/

namespace Repository {

  use Model\Comment;
    use PDO;

  interface CommentRepository
  {
    function insert(Comment $comment): Comment;

    function findById(int $id): ?Comment; // null kalau tidak ditemukan dengan id tidak ada

    function findAll(): array;
  }

/*
Step 3 : Membuat RepositoryIMPL  
Disinilah kode yg berhubungan langsung dengan database
*/

   class CommentRepositoryImpl implements CommentRepository
   {

    public function __construct(private PDO $connection) 
    {

    }

    function insert(Comment $comment): Comment
    {
      $sql = "INSERT INTO comments(email, comment) VALUES (?, ?)";
      $statement = $this->connection->prepare($sql);
      $statement->execute([$comment->getEmail(), $comment->getComment()]);
      
      $id = $this->connection->lastInsertId();
      $comment->setId($id);

      return $comment; //kembalikan lagi. tadinya id kan null
    }
    
    function findById(int $id): ?Comment
    {
      $sql = "SELECT id, email, comment FROM comments WHERE id = ?";
      $statement = $this->connection->prepare($sql);
      $statement->execute([$id]);

      // foreach ($statement as $row) {
      //   $comment = new Comment();
      //   $comment->setId($row['id']);
      //   $comment->setEmail($row['email']);
      //   $comment->setComment($row['comment']);
      // }

      if ($row = $statement->fetch()) {
        return new Comment(
          id: $row['id'],
          email: $row['email'],
          comment: $row['comment']
        );
      } else {
        return null;
      }
    }

    function findAll(): array
    {
      $sql = "SELECT * FROM comments";
      $statement = $this->connection->query($sql);

      $array = [];

      while ($row = $statement->fetch()) {
        $array[] = new Comment(
          id: $row['id'],
          email: $row['email'],
          comment: $row['comment'],
        );
      }

      return $array;
    }
   }
}