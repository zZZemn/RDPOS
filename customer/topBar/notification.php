

<link rel="stylesheet" href="assets/plugins/icons/feather/feather.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<li class="nav-item dropdown">
<a class="dropdown-toggle nav-link togglerSeen" data-bs-toggle="dropdown"><!--temporary tinanggal ko ang togglerSeen ililipat sa view chat messages nasa productlist/toglerAjax.js ang togler-->
<img src="assets/img/icons/mail.svg" alt="img" style="width:25px;"> 


<span style="display:none;"   class="noti_number badge rounded-pill" style="background-color:red;" ></span>
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span class="notification-title">Messages </span><!--- Notifications-->
<!----<a href="javascript:void(0)" class="clear-noti"> Clear All </a>--->
</div>

<div class="noti-content">
<ul class="notification-list">

<div id='loadNotificationAct'>

</div>


</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="activities.php">View all Messages</a>
</div>
</div>
</li>
<script src='productlist/controller/toglerAjax.js'></script>



<script src='view/view/js/function.js'></script>
<script src='controller/javascript/searchAjax.js'></script>




<script src="assets/js/feather.min.js"></script>