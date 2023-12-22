

<!-- Modal -->
<div class="modal fade" id="modalCreateMessages" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Messages</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <input hidden type="text" id="acc_id" value="<?=$_SESSION['acc_id']?>" >
      <div class="modal-body">
      
      
      <textarea style="display:block;" name="messages" id="CreateMessagesTextArea" class="form-control" cols="10" rows="2"></textarea>
      
      <div class="input-group-prepend">
            <label for="create_fileInput" class="btn btn-primary">
                <i class="fa fa-paperclip"></i> &nbsp;
            </label>
            <input type="file" id="create_fileInput" class="form-control-file" style="display: none;">
    </div>

      </div>

      <span id="create_fileNameSpan"></span>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button disabled type="button" id="create_sendButton" class="btn btn-primary">Send messages</button>
            </div>
            
            <div id="create_fileDisplay" style="display: none;">
                <span id="create_fileName">Selected File: </span>
                <button id="create_removeFile" class="btn btn-danger">X</button>
            </div>

    </div>
  </div>
</div>
