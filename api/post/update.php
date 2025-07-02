<?php

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  $database = new Database();
  $db = $database->connect();

  $post = new Post($db);

  // Pega os dados enviados
  $data = json_decode(file_get_contents("php://input"));

  // Verifica dados
  if (!empty($data->id) && !empty($data->title) && !empty($data->content)) {

    // dados
    $post->id = $data->id;
    $post->title = $data->title;
    $post->content = $data->content;

    // atualiza
    if($post->update()) {

      http_response_code(200); 
      echo json_encode(['message' => 'Post Atualizado com Sucesso']);
    } else {
 
      http_response_code(503); 
      echo json_encode(['message' => 'Não foi possível atualizar o post.']);
    }

  } else {
    http_response_code(400);
    echo json_encode(['message' => 'Não foi possível atualizar o post. Dados incompletos. Forneça id, title e content.']);
  }
?>