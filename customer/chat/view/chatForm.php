<?php 





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $account_id=$_GET["account_id"];

    $session_acc_id=$_SESSION["acc_id"];

}


?>




<div class="page-wrapper">


<div  class="content" id="chatMessages">
 <div class="col-lg-12">
<div class="row chat-window">

<div class="col-lg-5 col-xl-4 chat-cont-left">




<div hidden class=" card mb-sm-3 mb-md-0 contacts_card flex-fill">
<div class="card-header chat-search">
<div class="input-group">
<div class="input-group-prepend">
<span class="search_btn"><i class="fas fa-search"></i></span>
</div>
<input type="text" id="searchInput" placeholder="Search" class="form-control search-chat rounded-pill">

</div>
</div>




<div class="card-body contacts_body chat-users-list chat-scroll">
<a href="javascript:void(0);" class="media d-flex active">
<div class="media-img-wrap flex-shrink-0">
<div class="avatar avatar-away">
<img src="assets/img/customer/customer1.jpg" alt="User Image" class="avatar-img rounded-circle">
</div>
</div>


<div class="media-body flex-grow-1">
<div>
<div class="user-name"><!-- default---></div>
<div class="user-last-chat"><!-- default---></div>
</div>
<div>
<div class="last-chat-time"><!-- default---></div>
<div class="badge badge-success badge-pill"><!-- default---></div>
</div>
</div>
</a>


</div>
</div>
</div>




















<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>





<!-- <div hidden class="card mb-sm-3 mb-md-0 contacts_card flex-fill">--->


<div class="#"  id="viewChat">

<button hidden class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalCreateMessages">Create messages</button>
   
    <input hidden type="text" value="<?= $session_acc_id ?>" id="account_id">

    <div class="card mb-0">
    <div class="card-header msg_head">
    <div class="d-flex bd-highlight">
    <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
    <i hidden class="fas fa-chevron-left"></i>
    </a>
    
    
    <div class="img_cont">
        
    <img hidden id="system_logo" style="background-color:rgb(96, 0, 0) !important; border-color:rgb(96, 0, 0);" class="rounded-circle user_img" src="../upload_system/<?= $db_system_logo?>" alt="">
    </div>
    
    
    
    <div class="user_info">
    <span><strong id="system_name"><?= $db_system_name?></strong></span>
              
    <p class="mb-0">Messages</p>
    </div>
    </div>
    </div>
    <div class="card-body msg_card_body chat-scroll">
    <ul class="list-unstyled" id="messageList">
    <li class="media sent d-flex">
    <div class="avatar flex-shrink-0">
    <img src="assets/img/customer/customer5.jpg" alt="User Image" class="avatar-img rounded-circle">
    </div>


    <div class="media-body flex-grow-1">
    <div class="msg-box">
    <div>
    <p>Hello. What can I do for you?</p>
    <ul class="chat-msg-info">
    <li>
    <div class="chat-time">
    <span>8:30 AM</span>
    </div>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </li>






    <li class="media received d-flex">
        
    <div class="avatar flex-shrink-0">
    <img src="assets/img/customer/profile2.jpg" alt="User Image" class="avatar-img rounded-circle">
    </div>
    <div class="media-body flex-grow-1">



    <div class="msg-box">
    <div>
    <p>I'm just looking around.</p>
    <p>Will you tell me something about yourself?</p>
    <ul class="chat-msg-info">
    <li>
    <div class="chat-time">
    <span>8:35 AM</span>
    </div>
    </li>
    </ul>
    </div>
    </div>






    <li class="media sent d-flex">
    <div class="avatar flex-shrink-0">
    <img src="assets/img/customer/customer5.jpg" alt="User Image" class="avatar-img rounded-circle">
    </div>
    <div class="media-body flex-grow-1">

    
    <div class="msg-box">
    <div>
    <div class="chat-msg-attachments">
    <div class="chat-attachment">

    <img src="assets/img/product/product15.jpg" alt="Attachment">

    <a href="" class="chat-attach-download">
    <i class="fas fa-download"></i>
    </a>
    
    </div>
    </div>
    <ul class="chat-msg-info">
    <li>
    <div class="chat-time">
    <span>8:50 AM</span>
    </div>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </li>





    <li class="chat-date">Today</li>


    <li class="media received d-flex">
    <div class="avatar flex-shrink-0">
    <img src="assets/img/customer/profile2.jpg" alt="User Image" class="avatar-img rounded-circle">
    </div>
    <div class="media-body flex-grow-1">
    <div class="msg-box">
    <div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
    <ul class="chat-msg-info">
    <li>
    <div class="chat-time">
    <span>10:17 AM</span>
    </div>
    </li>
    <li><a href="javascript:void(0);">Edit</a></li>
    </ul>
    </div>
    </div>
    </div>
    </li>






    <li class="media received d-flex">
    <div class="avatar flex-shrink-0">
    <img src="assets/img/customer/profile2.jpg" alt="User Image" class="avatar-img rounded-circle">
    </div>
    <div class="media-body flex-grow-1">
    <div class="msg-box">
    <div>
    <div class="msg-typing">
    <span></span>
    <span></span>
    <span></span>
    </div>
    </div>
    </div>
    </div>
    </li>

    </ul>
    </div>


<?php include "chat/view/chatFooter.php"; ?>




<!-- Bootstrap CSS -->
<!---<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->

<!-- jQuery -->

<script src='chat/javascript/createMessages.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

