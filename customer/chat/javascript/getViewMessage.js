$(document).ready(function() {
    var account_id = $("#account_id").val(); // Default value
    var pollInterval = 1000; // Polling interval in milliseconds (e.g., every 5 seconds)



    function retrieveViewMessages(accountId) {
        $.ajax({
            url: 'chat/controller/getViewMessage.php',
            type: 'GET',
            data: { account_id: accountId },
            dataType: 'json',
            success: function(data) {
                var chatBody = $('#messageList');
                chatBody.empty();



                

                
               
                        console.log(account_id)
                  //  console.log(data[0].Reciever_image)  

              //    console.log(data[0].Reciever_fullname);
                    
                data.forEach(function(message) {

                  
                    console.log(message)

                    var formattedTime = formatTimeTo12HourFormat(message.mess_date);
                    var imagePathReciever = '../upload_system/empty.png';
                    if (message.Reciever_image !== '') {
                        imagePathReciever = '../upload_img/' + message.Reciever_image;
                    }

                    var imagePath = '../upload_system/empty.png';
                    if (message.emp_image !== '') {
                        imagePath = '../upload_img/' + message.emp_image;
                    }

                
                    var messageHtml = '<li class="media ';
                    messageHtml += (message.mess_sender_id == account_id) ? 'sent d-flex">' : 'received d-flex">';
                    messageHtml += '<div class="avatar flex-shrink-0">';
                    messageHtml += '<img src="' + imagePath + '" alt="User Image" class="avatar-img rounded-circle">';
                    messageHtml += '</div>';
                    messageHtml += '<div class="media-body flex-grow-1">';
                    messageHtml += '<div class="msg-box"><div>';

                    if (message.mess_type === 'image') {
                        messageHtml += '<div class="chat-msg-attachments">';
                        messageHtml += '<div class="chat-attachment">';
                        messageHtml += '<img src="../upload_message/' + message.mess_content + '" alt="Attachment">';
                         messageHtml += '<a href="../upload_message/' + message.mess_content + '" class="chat-attach-download" id="downloadLink" download>';
                        messageHtml += '<i class="fas fa-download"></i>';
                        messageHtml += '</a>';
                        messageHtml += '</div>';
                        messageHtml += '</div>';
                    } else if (message.mess_type === 'audio') {
                        messageHtml += '<div  class="chat-msg-attachments">';
                        messageHtml += '<div class="chat-attachment audio-attachment">';
                        messageHtml += '<audio style="width:100px;" controls class="audio-player">';
                        messageHtml += '<source src="../upload_message/' + message.mess_content + '" type="audio/mpeg">';
                        messageHtml += 'Your browser does not support the audio element.';
                        messageHtml += '</audio>';
                        messageHtml += '<a href="../upload_message/' + message.mess_content + '" class="chat-attach-download" id="downloadLink" download>';
                        messageHtml += '<i class="fas fa-download"></i>';
                        messageHtml += '</a>';
                        messageHtml += '</div>';
                        messageHtml += '</div>';
                    } else if (message.mess_type === 'document') {
                       // Extracting file extension
                       const fileName = message.mess_content.split('.')[0]; // Extract file name without extension
                       const fileExtension = message.mess_content.split('.').pop();
                       
                       // Determine icon and color based on file extension
                       let iconClass = 'fas'; // Default icon class for files
                       let iconColor = 'black'; // Default color
                       
                       // Define specific icons and colors for certain file types
                       if (fileExtension === 'pdf') {
                           iconClass = 'fas fa-file-pdf'; // Change to PDF icon class
                           iconColor = 'red'; // Change to the desired color for PDF files
                       } else if (fileExtension === 'docx' || fileExtension === 'doc') {
                           iconClass = 'fas fa-file-word'; // Change to Word document icon class
                           iconColor = 'blue'; // Change to the desired color for Word documents
                       }
                       // Add more conditions for other file types if needed
                       
                       messageHtml += `
                       <div class="chat-msg-attachments">
                           <div class="chat-attachment" style="display: flex; align-items: center;">
                               <i class="${iconClass}" style="font-size:24px; margin-right: 10px; color: ${iconColor};"></i>
                               <p style="margin-right: 10px; ">${fileName}.${fileExtension}</p>
                               <a href="../upload_message/${message.mess_content}" class="chat-attach-download" id="downloadLink">
                                   <i class="fas fa-download"></i>
                               </a>
                           </div>
                       </div>
                       `;
                       

                    } else {
                        messageHtml += '<p>(' + message.acc_type + ')</p>';
                        messageHtml += '<p>' + message.mess_content + '</p>';
                    }

                    messageHtml += '<ul class="chat-msg-info"><li>';
                    messageHtml += '<div class="chat-time"><span>' + formattedTime + '</span></div>';
                    messageHtml += '</li></ul></div></div></div></li>';

                    chatBody.append(messageHtml);
                });

           
           /*
                chatBody.on('click', '.chat-attach-download', function(e) {
                    e.preventDefault();
                    var downloadLink = $(this).attr('href');
                    var hiddenAnchor = document.createElement('a');
                    hiddenAnchor.href = downloadLink;
                    hiddenAnchor.download = '';
                    document.body.appendChild(hiddenAnchor);
                    hiddenAnchor.click();
                    document.body.removeChild(hiddenAnchor);
                });
                */
            },
            error: function(xhr, status, error) {
                console.log("XHR Status: " + xhr.status);
                console.log("Status: " + status);
                console.log("Error: " + error);
            },
            complete: function() {
                // After each Ajax request is complete, set up the next polling request
                setTimeout(function() {
                    retrieveViewMessages(account_id);
                }, pollInterval);
            }
        });
    }

 

        
    retrieveViewMessages(account_id);

    // Click event for the .changeChatView elements
    $('#chatMessages .contacts_body').on('click', '.changeChatView', function() {
        var clickedAccountID = $(this).data("account_id"); // Get the clicked account_id
         account_id = clickedAccountID; // Update the account_id based on the clicked element

        // Retrieve and render messages based on the updated account_id
        retrieveViewMessages(account_id);
    });
});
