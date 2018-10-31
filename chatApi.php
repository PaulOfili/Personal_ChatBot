<?php 
    // if(!defined('DB_USER')){
    require_once("config.php");
    // }
    global $connect;
    $connect = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    //check connection
    if(!$connect){
        die("Connection failed  " . mysqli_connect_error() );
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){              

        // mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        function validate($data) {
            $data = stripslashes(strip_tags(str_replace(array ('(', ')'), '' , $data)));
            $data = preg_replace('([\s]+)', ' ', trim($data));
            $data = preg_replace("([?.])", "", $data);
            return $data;
        }  

        $message = validate(($_POST['message']));

        $queAns = explode(":", $message);

        if(strtolower(trim($queAns[0]))==="train") {
            
            $queAnsNew = explode("#", $queAns[1]);

            if (count($queAnsNew) >= 3){
                $que = $ans =$pass = "";

                $que = strtolower(str_replace("'","''",trim($queAnsNew[0])));
                $ans = str_replace("'","''",trim($queAnsNew[1]));
                $pass = strtolower(trim($queAnsNew[2]));
                if ($pass === "password"){
                        
                    $query1 = "INSERT INTO chatbot (id, question, answer)  VALUES (NULL, '$que', '$ans')";
            
                    $result1 = mysqli_query($connect, $query1);
                    
                    //check if successful
                    if ($result1){
                        
                        echo json_encode(['status' => 1, 'reply' => 'Thanks for that. Now, I have gotten better, no smarter']);
                            // echo $text;
                                
                    } else{
                        echo json_encode(['status' => 2, 'reply' => 'Failure, please try again']);
                    }
            
                } else{
                    echo json_encode(['status' => 3, 'reply' => 'Wrong password, input password']);
                }

            } else {
                echo json_encode(['status' => 4, 'reply' => 'Sequence not complete']);
            }        
        }
        
        else if (strtolower($message)==="--help"||strtolower($message)==="help"){
            echo json_encode(['status' => 5, 'reply' => 'Hey there, name is Paul and I Would love to help.']);
        }

        else if (strtolower($message)==="aboutbot"||strtolower($message)==="about"){
            echo json_encode(['status' => 6, 'reply' => 'Sequence not complete']);
        }
        else {
            $message = strtolower(str_replace("'","''",$message));
            $query2 = "SELECT * FROM chatbot WHERE question LIKE '".$message."'";
            $result2 = mysqli_query($connect, $query2);

            if(mysqli_num_rows($result2)> 0) {
                $i = 0;
                    while($rows = mysqli_fetch_assoc($result2)) {
                        $replies[$i] = $rows['answer'];
                    $i=$i+1;
                    }
                //$rows = mysqli_fetch_assoc($result2)['answer'];
                $reply_index = rand(0, (count($replies) - 1));
                $reply = $replies[$reply_index];
                $reply = ucfirst($reply);
                echo json_encode(['status' => 7, 'reply' => $reply]);

            } else {
                echo json_encode(['status' => 8, 'reply' => "Not sure I understand that which means I need training. I wanna be of better help to you! To train, do this, train: the question # the answer # password . Password is 'password'. Can't wait to learn from you"]);
            }
        } 
    }

    

?>