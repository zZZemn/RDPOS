
<link rel="stylesheet" href="view/home/styles.css">


<nav  class="sb-topnav navbar navbar-expand " style="background-color:#600000;"
 >
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="home.php">

            <img src="../upload_system/<?php echo htmlspecialchars($db_system_logo); ?>" alt="" width="50" height="40">
                <strong style="color:white;"><?php echo htmlspecialchars($db_system_name); ?></strong>
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            <!-- Navbar-->
           
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if ($db_emp_image) { ?>
                            <img src="../upload_img/<?php echo htmlspecialchars($db_emp_image); ?>" alt="" width="35" height="30" style="border-radius: 50%;">
                        <?php } else { ?>
                            <img src="../upload_system/empty.png" alt="" width="35" height="30">
                        <?php } ?>
                        
                      </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!"> <?php echo ucfirst(htmlspecialchars($db_acc_fname." ".$db_acc_lname)); ?></a></li>
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="backend/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

       



        
<script src="js/sidebar.js"></script>


