<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>S</b>TP</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Sports</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        
        <!-- Notifications: style can be found in dropdown.less -->
        
        <!-- Tasks: style can be found in dropdown.less -->
        
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="assets/dist/img/user.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="assets/dist/img/user.png" class="img-circle" alt="User Image">
              <p>
                <?php echo $_SESSION['username']; ?>
                
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <!-- <div class="pull-left">
                <a href="?page=change-password" class="btn btn-default btn-flat">Ganti Password</a>
              </div> -->
              <div class="pull-right">
                <a href="" data-url="?page=logout" class="btn btn-default btn-flat confirm_logout">Keluar</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <!-- <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li> -->
      </ul>
    </div>
  </nav>
</header>