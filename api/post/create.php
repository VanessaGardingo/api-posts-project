<?php

  header('Access-Control-Allow-Origin: *'); 
  header('Content-Type: application/json'); 
  header('Access-Control-Allow-Methods: POST'); 
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  $database = new Database();
  $db = $database->connect();
  $post = new Post($db);
  $data = json_decode(file_get_contents("php://input"));

  if(!empty($data->title) && !empty($data->content)) {
    $post->title = $data->title;
    $post->content = $data->content;

    if($post->create()) {
      http_response_code(201);
      echo json_encode(['message' => 'Post Criado com Sucesso']);
    } 

    else {
      http_response_code(503);
      echo json_encode(['message' => 'Não foi possível criar o post.']);
    }
  } 

  else {
    http_response_code(400);
    echo json_encode(['message' => 'Não foi possível criar o post. Dados incompletos.']);
  }
?>