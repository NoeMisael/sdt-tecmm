<header class="site-header">
    <div class="container-fluid">

        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="../../public/img/logo.png" alt="">
        </a>

        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
	            <span>toggle menu</span>
	        </button>

        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>

        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="../../public/img/avatar-2-64.png" alt="">
                        </button>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="#"><span
                                    class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                            <a class="dropdown-item" href="#"><span
                                    class="font-icon glyphicon glyphicon-question-sign"></span>Ayuda</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../Logout/logout.php"><span
                                    class="font-icon glyphicon glyphicon-log-out"></span>Cerrar sesión</a>
                        </div>
                    </div>
                </div>


                
                <div class="mobile-menu-right-overlay"></div>

                <input type="hidden" id="user_idx" value="<?php echo $_SESSION["id_user"] ?>">
                <input type="hidden" id="level" value="<?php echo $_SESSION["level"] ?>">


                <div class="dropdown dropdown-typical">
                    <a href="#" class="dropdown-toggle no-arr">
                        <span class="font-icon font-icon-home"></span>
                        <span class="lblclientenomx">
                            <?php ?>
                        </span>
                    </a>
                </div>

                <div class="dropdown dropdown-typical">
                    <a href="#" class="dropdown-toggle no-arr">
                        <span class="font-icon font-icon-users"></span>
                        <span class="lblcontactonomx"> &ensp;
                            <?php echo $_SESSION["nombre"] ?>
                        </span>
                        <span class="lblcontactonomx"> &ensp;
                            <?php echo $_SESSION["level"] ?>
                        </span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</header>