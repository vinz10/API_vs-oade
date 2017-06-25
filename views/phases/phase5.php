<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo PHASE5_TITLE; ?></title>
        
        <!-- Custom StyleSheet -->
        <link href="../css/bootstrap.css" rel="stylesheet" />
        <link href="../css/font-awesome.css" rel="stylesheet" />
        <link href="../css/custom.css" rel="stylesheet" />
        
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    
    <?php
    // Initialization of variables
    $msg = $this->vars['msg'];
    $msgSuccess = $this->vars['msgSuccess'];
    $login = $_SESSION ['login'];
    ?>
    
    <body>
        <div id="wrapper">
            
            <!-- Navigation TOP -->
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="adjust-nav"> 
                    
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <span class="logout-spn" >
                            <a href="<?php echo URL_DIR;?>" style="color:#fff;">VS-OADE</a>  
                        </span>
                    </div>
                    
                </div>  
            </div>
           
            <!-- Navigation LEFT -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">

                        <li>
                            <a href="<?php echo URL_DIR; ?>" ><i class="fa fa-desktop"></i><?php echo MENU_DASHBOARD; ?></a>
                        </li>

                        <li>
                            <a href="<?php echo URL_DIR . 'phases/phase1'; ?>"><i class="fa fa-question-circle"></i><?php echo MENU_PHASE1; ?></a>
                        </li>
                        
                        <li>
                            <a href="<?php echo URL_DIR . 'phases/phase2'; ?>"><i class="fa fa-signal"></i><?php echo MENU_PHASE2; ?></a>
                        </li>
                        
                        <li>
                            <a href="<?php echo URL_DIR . 'phases/phase3'; ?>"><i class="fa fa-exclamation-circle"></i><?php echo MENU_PHASE3; ?></a>
                        </li>
                        
                        <li>
                            <a href="<?php echo URL_DIR . 'phases/phase4'; ?>"><i class="fa fa-pencil"></i><?php echo MENU_PHASE4; ?></a>
                        </li>
                        
                        <li class="active-link">
                            <a href="<?php echo URL_DIR . 'phases/phase5'; ?>"><i class="fa fa-adjust"></i><?php echo MENU_PHASE5; ?></a>
                        </li>
                        
                        <li>
                            <a href="<?php echo URL_DIR . 'phases/phase6'; ?>"><i class="fa fa-plus-circle"></i><?php echo MENU_PHASE6; ?></a>
                        </li>
                        
                        <li>
                            <a href="<?php echo URL_DIR . 'users/users'; ?>"><i class="fa fa-users"></i><?php echo MENU_USERS; ?></a>
                        </li>
                        
                        <li>
                            <a href="<?php echo URL_DIR . 'settings/settings'; ?>"><i class="fa fa-gear"></i><?php echo MENU_SETTINGS; ?></a>
                        </li>

                        <li>
                            <a href="<?php echo URL_DIR . 'login/logout'; ?>"><i class="fa fa-sign-out"></i><?php echo MENU_LOGOUT; ?></a>
                        </li>
                                                
                    </ul>
                </div>
            </nav>
            
            <!-- USERS -->
            <div id="page-wrapper" >
                <div id="page-inner">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><?php echo PHASE5_PHASE5; ?></h2>   
                        </div>
                    </div> 
                    
                    <hr />
                    
                    <!-- Messages -->
                    
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2017 Vincent Bearpark - Travail Bachelor. All Rights Reserved
                </div>
            </div>
        </div>

        <!-- Custom JavaScript -->
        <script src="../js/jquery-1.10.2.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/custom.js"></script>
        
    </body>
    
    <?php
    // Unset variables
    unset($_SESSION['msg']);
    unset($_SESSION['msgSuccess']);
    ?>
    
</html>