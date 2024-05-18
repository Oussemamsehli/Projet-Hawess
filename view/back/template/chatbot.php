<?php

// Get JSON data from the request body
$data = json_decode(file_get_contents('php://input'), true);

// Define the responses array
$responses = array(
    "Bonjour" => "Bonjour ! Comment puis-je vous aider ?",
    "hello"=>"HI!,how can i help you ? ",
    "Comment ça va ?" => "Je suis un programme, je ne ressens pas les émotions, mais merci de demander !",
    "Quel est ton nom ?" => "Je suis un chatbot.",
    "je veux passer une reclamation"=>"passer votre reclamation",
     "je veux contactez le responsable"=>"veuillez envoyer un email à HAWESS@gmail.com"
);


$user_question = $data["question"];


$bot_response = isset($responses[$user_question]) ? $responses[$user_question] : "Désolé, je ne comprends pas. Pouvez-vous reformuler votre question ?";


header('Content-Type: application/json');
echo json_encode(array("answer" => $bot_response));

?>