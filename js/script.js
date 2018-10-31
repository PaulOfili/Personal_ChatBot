$(document).ready(function() {
            
            $("#chatform").submit(function(e) {
                 //return false;
                 e.preventDefault();
                 
                var chatlogs = $('#chatlogs');
                var message = $('#message').val();
                $('#message').val("");

                if(message.trim() ==''){
                    var messageBody = 
                    "<div class='chat bot row'><div class='user-photo'></div><p class='chat-message'>Input something...anything</p> </div>";

                    chatlogs.html(chatlogs.html()+messageBody);
                    
                    $("#chatlogs").scrollTop($("#chatlogs")[0].scrollHeight);

                   // return;
                }

                else if(message.trim() !='')
                {
                var messageBody = "<div class='chat self row'><div class='user-photo'></div><p class='chat-message'>" + message + "</p> </div>";

                chatlogs.html(chatlogs.html()+messageBody);    
                $("#chatlogs").scrollTop($("#chatlogs")[0].scrollHeight);
              

                $.ajax 
                ({
                    type: "POST",
                    url: "chatApi.php",   
                    data: 
                    { 
                        message: message
                    },
                    dataType: "json",
                    success: function(data) { 
                        
                            // console.log(data.status);
                            

                            // if(data.status==1){
                                var messageBody = "<div class='chat bot row'><div class='user-photo'></div><p class='chat-message'>" +data.reply+ "</p></div>";
        
                            chatlogs.html(chatlogs.html()+messageBody);
                            
                            $("#chatlogs").scrollTop($("#chatlogs")[0].scrollHeight);
                                                
                        
                    }
                });
                }
            
            });
        });