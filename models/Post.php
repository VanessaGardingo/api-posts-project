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
  }
?>