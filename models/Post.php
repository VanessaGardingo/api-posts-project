<?php

  class Post{
    private $conn;
    private $table = 'posts';
    
    public $id;
    public $title;
    public $content;
    public $created_at;
    
    public function __construct($db){
      $this->conn = $db;
    }

    public function create() {
      $query = 'INSERT INTO ' . $this->table . ' SET title = :title, content = :content';
      $stmt = $this->conn->prepare($query);

      $this->title = htmlspecialchars(strip_tags($this->title));
      $this->content = htmlspecialchars(strip_tags($this->content));

      $stmt->bindParam(':title', $this->title);
      $stmt->bindParam(':content', $this->content);

      if($stmt->execute()) {
        return true;
      }
      return false;
    }

    public function read() {
      $query = 'SELECT id, title, content, created_at FROM ' . $this->table . ' ORDER BY created_at DESC';
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }

    public function read_one() {
      $query = 'SELECT id, title, content, created_at FROM ' . $this->table . ' WHERE id = ? LIMIT 1';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(1, $this->id);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if($row) {
        $this->title = $row['title'];
        $this->content = $row['content'];
        $this->created_at = $row['created_at'];
        return true;
      }
      return false;
    }

    public function update() {

      $query = 'UPDATE ' . $this->table . '
                SET
                  title = :title,
                  content = :content
                WHERE
                  id = :id';

      $stmt = $this->conn->prepare($query);

      $this->title = htmlspecialchars(strip_tags($this->title));
      $this->content = htmlspecialchars(strip_tags($this->content));
      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(':title', $this->title);
      $stmt->bindParam(':content', $this->content);
      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()) {
        return true;
      }

      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    //Deleta post
    public function delete() {

      $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

      $stmt = $this->conn->prepare($query);

      // Limpa o ID
      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(':id', $this->id);

      // Executa
      if($stmt->execute()) {
        return true;
      }
      return false;
    }
  }
?>