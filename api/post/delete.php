<?php

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  $database = new Database();
  $db = $database->connect();

  $post = new Post($db);

  // Pega os dados
  $data = json_decode(file_get_contents("php://input"));

  // Verifica id
  if (!empty($data->id)) {

    // Atribui o id
    $post->id = $data->id;

    // deleta post
    if($post->delete()) {
      http_response_code(200); // OK
      echo json_encode(['message' => 'Post Deletado com Sucesso']);
    } else {
      http_response_code(503); // Service Unavailable
      echo json_encode(['message' => 'Não foi possível deletar o post.']);
    }

  } else {
    // Erro id
    http_response_code(400);
    echo json_encode(['message' => 'Não foi possível deletar o post. ID não fornecido.']);
  }
?>