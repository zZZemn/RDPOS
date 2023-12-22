$(document).ready(function () {

    //var acc_id = $('#acc_id');
    var CreateMessagesTextArea = $('#CreateMessagesTextArea');
    var create_fileInput = $('#create_fileInput');
    var create_sendButton = $('#create_sendButton');
    var create_fileDisplay = $('#create_fileDisplay');
    var create_fileName = $('#create_fileName');
    var create_removeFile = $('#create_removeFile');

    function updateSendButton() {
        if (CreateMessagesTextArea.val() || create_fileInput[0].files.length > 0) {
            create_sendButton.removeAttr('disabled');
        } else {
            create_sendButton.attr('disabled', 'disabled');
        }
    }

    CreateMessagesTextArea.on('input', function() {
        updateSendButton();
    });

    create_fileInput.on('change', function() {

        console.log("hoy hoy hoy")

        updateSendButton();
        var selectedFile = create_fileInput[0].files[0];
        if (selectedFile) {
            create_fileName.text('Selected File: ' + selectedFile.name);
            create_fileDisplay.show();
        }
    });

    create_removeFile.on('click', function() {
        create_fileInput.val('');
        create_fileName.text('');
        create_fileDisplay.hide();
        updateSendButton();
    });

    $('#create_sendButton').on('click', function () {
        var message = CreateMessagesTextArea.val();
        
        // Get the account_id from the URL
        const urlParams = new URLSearchParams(window.location.search);
        var account_id = urlParams.get('account_id'); //mess_sender_id

        var file = create_fileInput[0].files[0]; //mess_content
        var formData = new FormData();
        
        formData.append('account_id', account_id);

        if (message) {
            formData.append('message', message);
        }
        if (file) {
            formData.append('file', file);
        }

        $.ajax({
            url: 'chat/controller/insertMessage.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log('Data sent successfully');
               // console.log(account_id);
                // Handle success, if needed

                console.log(response);
                $('#CreateMessagesTextArea').val("");


                create_fileInput.val('');
                create_fileName.text('');
                create_fileDisplay.hide();
            },
            error: function (xhr, status, error) {
                console.error(error);
                // Handle errors, if any
            }
        });

    });

    updateSendButton();
});
