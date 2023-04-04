<?php

    $apiToken = "";
    $update = json_decode(file_get_contents("php://input"), TRUE);
    $chat_id = $update['message']['chat']['id'];
    $user_id = $update['message']['from']['id'];
    $message_id = $update["message"]["message_id"];
    $topic =  $update['message']['reply_to_message']['forum_topic_created']['name'];
    $your_filtered_topic = "Announcements";
    $result = strcmp($your_filtered_topic, $topic);
    $del_link="https://api.telegram.org/bot".$apiToken."/deleteMessage?chat_id=$chat_id&message_id=".$message_id;

    $chat_member = json_decode(file_get_contents("https://api.telegram.org/bot".$apiToken."/getChatMember?chat_id=$chat_id&user_id=$user_id"), true);

    if ($chat_member['result']['status'] == 'administrator' || $chat_member['result']['status'] == 'creator') {
        
    } else {
    // User is not an admin or owner, do something 
    if( $result == 0){
        file_get_contents($del_link); 
    }
}

?>