
<div class="header-left active" style="background-color:#600000;">


    <a id="system_name" href="home.php" class="logo">
        <h1 style="color:white;"><?= $db_system_name?></h1>
       
    </a>


    
    <a id="mobile_search">
    <input id="searchInputNew_mobile" type="text" placeholder="Search product Here..." style="display: block; margin: 0 auto; width: 60%; border-radius:5px; max-width: 300px; padding: 8px; position: fixed; z-index: 9999; top: 10px; left: 50%; transform: translateX(-50%);">
    <div id="suggestionsContainer_mobile" style="position: fixed; top: 70px; width: 100%;">
        <!-- Content -->
    </div>
    </a>




    <a href="home.php" class="logo-small">
        <img src="../upload_system/<?= $db_system_logo ?>" style="width:40px;" alt="">
    </a>
    <a id="toggle_btn" href="javascript:void(0);"></a>
</div>

<a id="mobile_btn" class="mobile_btn" href="#sidebar">
    <span class="bar-icon">
        <span style="background-color:white;"></span>
        <span style="background-color:white;"></span>
        <span style="background-color:white;"></span>
    </span>
</a>























<script>
    // JavaScript to hide/show the h2 tag based on screen size
    function toggleHeader() {
        var systemName = document.getElementById('system_name');
        if (window.innerWidth <= 768) {
            systemName.style.display = 'none'; // Hide on mobile view
        } else {
            systemName.style.display = 'block'; // Show on larger screens
        }
    }

    // Initial check and event listener for screen resize
    toggleHeader();
    window.addEventListener('resize', toggleHeader);


    function toggleMobileSearch() {
        var mobileSearch = document.getElementById('mobile_search');
        
        if (window.innerWidth <= 768) {
            mobileSearch.style.display = 'block'; // Show on mobile view
        } else {
            mobileSearch.style.display = 'none'; // Hide on larger screens
        }
    }

    // Initial check and event listener for screen resize
    toggleMobileSearch();
    window.addEventListener('resize', toggleMobileSearch);
</script>
