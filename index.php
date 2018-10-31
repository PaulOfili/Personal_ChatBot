<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paul Ofili - HNGFun</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  
</head>
<body>
    <div class="cover">
        <div class = "cover-text">
            <div class = 'row'>
                <div class = 'col-sm-9' id = "name">
                    <span><?php echo $my_data['username'] ?> | HNG Internship 4.0</span>
                </div>            
            </div>
            <div id = "cover-head">        
                <h1>Hello There!!</h1>
                <span id = "time">
                    <?php date_default_timezone_set ("Africa/Lagos"); ?>
                    <?php echo date("F j, Y | g:i:s a");?>
                </span> 
            </div>
        </div>
    </div>

    <div class = "contain">
        <div class='row'>
            <div class='col-sm-6'>
                <h3>My Profile picture</h3><br>
                <img src='' class= 'rounded-circle'>
            </div>
                
            <div class='col-sm-6' id = 'bio'>
                <h2>A little bit about me </h2><br>
                <p>I am just a guy with lots of passion to code especially as a web developer. Really looking forward to this internship so as to improve on my existing skills and become a professional in it. View my profile in any of the links provided in the footer.</p>
                
            </div>
        </div>        
    </div>
    <div id="chatbody">
        <h1 >Paul's Chat Bot At Your Service ;)</h1>
        <div class="chatbox">
            <div class="chatlogs" id="chatlogs">
                <div class="chat bot row">
                    <div class="user-photo"></div>
                    <p class="chat-message">What's up! Name's Paul chat</p>
                </div>
                <div class="chat bot row">
                    <div class="user-photo"></div>
                    <p class="chat-message">I can answer loads of questions but it is highly recommended you train me first. To do so, just follow this sequence of commands. train: the question # the answer # password.</p>
                </div>
                <div class="chat bot row">
                    <div class="user-photo"></div>
                    <p class="chat-message">Password is usually 'password', so you are good to go.</p>
                </div>
                
                
            </div>

            <form class="chatform" id="chatform" method="post" action ="">
                <input type = "text" id = "message" name = "message"></input>
                <button id = "send" type = "submit" class = "btn btn-danger" name = "send">Send</button>
            </form>
        </div>
    </div>
    <footer id="foot">
        <span>Crafted with &hearts; in Lagos by Paul</span>
        <div id = "socialmedia">
            <a href="https://github.com/PaulOfili"><i class="fa fa-github"></i></a>
            <a href="https://twitter.com/paulofili42"><i class="fa fa-twitter"></i></a>
            <a href="https://www.linkedin.com/in/paul-ofili-227a2215b"><i class="fa fa-linkedin"></i></a>      
        </div>
    </footer>   
   
    <script src="js/jquery/jquery.min.js"></script>
    <!-- <script src=  "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="js/bootstrap/bootstrap.js"></script>
    <script src="js/script.js"></script>
    
</body>
</html>
