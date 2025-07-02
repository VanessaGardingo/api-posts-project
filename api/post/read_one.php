<?php

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  $database = new Database();
  $db = $database->connect();

  $post = new Post($db);

  $post->id = isset($_GET['id']) ? $_GET['id'] : die();


  if($post->read_one()) {

    $post_arr = array(
      'id' => $post->id,
      'title' => $post->title,
      'content' => $post->content,
      'created_at' => $post->created_at
    );

    http_response_code(200);
    echo json_encode($post_arr);

  } else {
    http_response_code(404);
    echo json_encode(['message' => 'Post não encontrado.']);
  }
?>