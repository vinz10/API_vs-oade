<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo HOME_TITLE; ?></title>
        
        <!-- Custom StyleSheet -->
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/font-awesome.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
        
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    
    <?php
    $connect = $this->getLogin();
    if ($connect) {
        $login = $_SESSION ['login'];
    } 
    else {
        $login = null;
    }
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

                    <span class="logout-spn" >
                        <?php if ($login) : ?>
                            <a href="<?php echo URL_DIR . 'login/logout'; ?>" style="color:#fff;"><i class="fa fa-sign-out"></i> <?php echo HOME_LOGOUT; ?></a>
                        <?php else : ?>
                            <a href="<?php echo URL_DIR . 'login/login'; ?>" style="color:#fff;"><i class="fa fa-sign-in"></i> <?php echo HOME_LOGIN; ?></a> 
                        <?php endif; ?>
                    </span>
                    
                </div>  
            </div>        
            
            <!-- Navigation LEFT -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">

                        <li class="active-link">
                            <a href="<?php echo URL_DIR; ?>" ><i class="fa fa-desktop"></i><?php echo MENU_DASHBOARD; ?></a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-table"></i><?php echo MENU_DATA; ?></a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-users"></i><?php echo MENU_USERS; ?></a>
                        </li>

                        <li>
                            <?php if ($login) : ?>
                                <a href="<?php echo URL_DIR . 'login/logout'; ?>"><i class="fa fa-sign-out"></i><?php echo MENU_LOGOUT; ?></a>
                            <?php else : ?>
                                <a href="<?php echo URL_DIR . 'login/login'; ?>"><i class="fa fa-sign-in"></i><?php echo MENU_LOGIN; ?></a>
                            <?php endif; ?>
                        </li>
                        
                    </ul>
                </div>
            </nav>
            
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><?php echo HOME_DASHBOARD; ?></h2>   
                        </div>
                    </div>              
                    <!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-lg-12 ">
                            <?php if ($login) : ?>
                                <div class="alert alert-success">
                                    <strong><?php echo HOME_WELCOME . ' ' . $login->getUsername() . '!'; ?></strong>
                                </div>
                            <?php else : ?>
                                <div class="alert alert-info">
                                    <strong><?php echo MSG_INFO; ?></strong> <?php echo MSG_CONNECT; ?>
                                </div>
                            <?php endif; ?>
                            </div>
                    </div>
                    <!-- /. ROW  --> 
                    <div class="row text-center pad-top">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-circle-o-notch fa-5x"></i>
                                    <h4>Check Data</h4>
                                </a>
                            </div>


                        </div> 

                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-envelope-o fa-5x"></i>
                                    <h4>Mail Box</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-lightbulb-o fa-5x"></i>
                                    <h4>New Issues</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-users fa-5x"></i>
                                    <h4>See Users</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-key fa-5x"></i>
                                    <h4>Admin </h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-comments-o fa-5x"></i>
                                    <h4>Support</h4>
                                </a>
                            </div>


                        </div>
                    </div>
                    <!-- /. ROW  --> 
                    <div class="row text-center pad-top">

                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-clipboard fa-5x"></i>
                                    <h4>All Docs</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-gear fa-5x"></i>
                                    <h4>Settings</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-wechat fa-5x"></i>
                                    <h4>Live Talk</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-bell-o fa-5x"></i>
                                    <h4>Notifications </h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-rocket fa-5x"></i>
                                    <h4>Launch</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-user fa-5x"></i>
                                    <h4>Register User</h4>
                                </a>
                            </div>


                        </div> 
                    </div>   
                    <!-- /. ROW  -->    
                    <div class="row text-center pad-top">


                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-envelope-o fa-5x"></i>
                                    <h4>Mail Box</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-lightbulb-o fa-5x"></i>
                                    <h4>New Issues</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-users fa-5x"></i>
                                    <h4>See Users</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-key fa-5x"></i>
                                    <h4>Admin </h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="#" >
                                    <i class="fa fa-comments-o fa-5x"></i>
                                    <h4>Support</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-circle-o-notch fa-5x"></i>
                                    <h4>Check Data</h4>
                                </a>
                            </div>


                        </div>
                    </div>
                    <!-- /. ROW  -->  
                    <div class="row text-center pad-top">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-rocket fa-5x"></i>
                                    <h4>Launch</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-clipboard fa-5x"></i>
                                    <h4>All Docs</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-gear fa-5x"></i>
                                    <h4>Settings</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-wechat fa-5x"></i>
                                    <h4>Live Talk</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-bell-o fa-5x"></i>
                                    <h4>Notifications </h4>
                                </a>
                            </div>


                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-user fa-5x"></i>
                                    <h4>Register User</h4>
                                </a>
                            </div>


                        </div> 
                    </div>   
                    <!-- /. ROW  -->  
                    <div class="row text-center pad-top">



                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-lightbulb-o fa-5x"></i>
                                    <h4>New Issues</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-users fa-5x"></i>
                                    <h4>See Users</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-key fa-5x"></i>
                                    <h4>Admin </h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-comments-o fa-5x"></i>
                                    <h4>Support</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-circle-o-notch fa-5x"></i>
                                    <h4>Check Data</h4>
                                </a>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <div class="div-square">
                                <a href="blank.html" >
                                    <i class="fa fa-envelope-o fa-5x"></i>
                                    <h4>Mail Box</h4>
                                </a>
                            </div>


                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        
        <div class="footer">
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2017 Vincent Bearpark - Travail Bachelor. All Rights Reserved
                </div>
            </div>
        </div>

        <!-- Custom JavaScript -->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>
        
    </body>
</html>
