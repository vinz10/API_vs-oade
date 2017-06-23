<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo LOGIN_TITLE; ?></title>
        
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
                            <a href="#"><i class="fa fa-table"></i><?php echo MENU_DATA; ?></a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-users"></i><?php echo MENU_USERS; ?></a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-gear"></i><?php echo MENU_SETTINGS; ?></a>
                        </li>

                        <li class="active-link">
                            <a href="<?php echo URL_DIR . 'login/login'; ?>"><i class="fa fa-sign-in"></i><?php echo MENU_LOGIN; ?></a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
            
            <!-- LOGIN -->
            <div id="page-wrapper" >
                <div id="page-inner">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><?php echo LOGIN_LOGIN; ?></h2>   
                        </div>
                    </div> 
                    
                    <hr />
                    
                    <!-- Messages -->
                    <div class="row">
                        <div class="col-lg-4 ">
                            <div class="alert alert-info">
                                <strong><?php echo MSG_INFO; ?></strong> <?php echo MSG_CONNECT; ?>
                            </div>
                            <?php 
                                if(!empty($msg)) :
                            ?>
                            <div class="alert alert-danger">
                                <strong><?php echo MSG_ERROR; ?></strong><?php echo ' ' . $msg; ?>
                            </div>
                            <?php 
                                endif;
                            ?>
                        </div>
                    </div>
                     
                    <!-- Login form -->
                    <form action="<?php echo URL_DIR . 'login/connection'; ?>" method="post">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="<?php echo LOGIN_USERNAME; ?>" />
                                </div>
                                <br />
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo LOGIN_PASSWORD; ?>" />
                                </div>
                                <br />
                                <input type="submit" name="Submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary" value="<?php echo MENU_LOGIN; ?>" />
                            </div>
                        </div>
                    </form>
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
    ?>
    
</html>
