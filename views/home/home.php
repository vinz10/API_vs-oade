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
    } else {
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
                            <a href="<?php echo URL_DIR; ?>" style="color:#fff;">VS-OADE</a>  
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

                        <li>
                            <a href="<?php echo URL_DIR . 'phases/phase5'; ?>"><i class="fa fa-adjust"></i><?php echo MENU_PHASE5; ?></a>
                        </li>

                        <li>
                            <a href="<?php echo URL_DIR . 'phases/phase6'; ?>"><i class="fa fa-plus-circle"></i><?php echo MENU_PHASE6; ?></a>
                        </li>

                        <li>
                            <a href="<?php echo URL_DIR . 'axes/axes'; ?>"><i class="fa fa-list"></i><?php echo MENU_AXES; ?></a>
                        </li>

                        <li>
                            <a href="<?php echo URL_DIR . 'users/users'; ?>"><i class="fa fa-users"></i><?php echo MENU_USERS; ?></a>
                        </li>

                        <li>
                            <a href="<?php echo URL_DIR . 'settings/settings'; ?>"><i class="fa fa-gear"></i><?php echo MENU_SETTINGS; ?></a>
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

            <!-- DASHBOARD -->
            <div id="page-wrapper" >
                <div id="page-inner">

                    <div class="row">
                        <div class="col-lg-12">
                            <h2><i class="fa fa-desktop"></i> <?php echo HOME_DASHBOARD; ?></h2>   
                        </div>
                    </div>              

                    <hr />

                    <!-- Messages -->
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

                    <!-- DASHBOARD -->
                    <div class="row text-center pad-top">

                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">                       
                            <div class="div-square">
                                <a href="<?php echo URL_DIR . 'phases/phase1'; ?>" >
                                    <i class="fa fa-question-circle fa-5x"></i>
                                    <h4><?php echo MENU_PHASE1; ?></h4>
                                </a>
                            </div>
                        </div> 

                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">                       
                            <div class="div-square">
                                <a href="<?php echo URL_DIR . 'phases/phase2'; ?>" >
                                    <i class="fa fa-signal fa-5x"></i>
                                    <h4><?php echo MENU_PHASE2; ?></h4>
                                </a>
                            </div>
                        </div> 

                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">                       
                            <div class="div-square">
                                <a href="<?php echo URL_DIR . 'phases/phase3'; ?>" >
                                    <i class="fa fa-exclamation-circle fa-5x"></i>
                                    <h4><?php echo MENU_PHASE3; ?></h4>
                                </a>
                            </div>
                        </div> 

                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">                       
                            <div class="div-square">
                                <a href="<?php echo URL_DIR . 'phases/phase4'; ?>" >
                                    <i class="fa fa-pencil fa-5x"></i>
                                    <h4><?php echo MENU_PHASE4; ?></h4>
                                </a>
                            </div>
                        </div> 

                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">                       
                            <div class="div-square">
                                <a href="<?php echo URL_DIR . 'phases/phase5'; ?>" >
                                    <i class="fa fa-adjust fa-5x"></i>
                                    <h4><?php echo MENU_PHASE5; ?></h4>
                                </a>
                            </div>
                        </div> 

                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">                       
                            <div class="div-square">
                                <a href="<?php echo URL_DIR . 'phases/phase6'; ?>" >
                                    <i class="fa fa-plus-circle fa-5x"></i>
                                    <h4><?php echo MENU_PHASE6; ?></h4>
                                </a>
                            </div>
                        </div> 
                    </div>

                    <div class="row text-center pad-top">

                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                            <div class="div-square">
                                <a href="<?php echo URL_DIR . 'axes/axes'; ?>" >
                                    <i class="fa fa-list fa-5x"></i>
                                    <h4><?php echo MENU_AXES; ?></h4>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                            <div class="div-square">
                                <a href="<?php echo URL_DIR . 'users/users'; ?>" >
                                    <i class="fa fa-users fa-5x"></i>
                                    <h4><?php echo MENU_USERS; ?></h4>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                            <div class="div-square">
                                <a href="<?php echo URL_DIR . 'settings/settings'; ?>" >
                                    <i class="fa fa-gear fa-5x"></i>
                                    <h4><?php echo MENU_SETTINGS; ?></h4>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                            <div class="div-square">
                                <?php if ($login) : ?>
                                    <a href="<?php echo URL_DIR . 'login/logout'; ?>" >
                                        <i class="fa fa-sign-out fa-5x"></i>
                                        <h4><?php echo MENU_LOGOUT; ?></h4>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php echo URL_DIR . 'login/login'; ?>" >
                                        <i class="fa fa-sign-in fa-5x"></i>
                                        <h4><?php echo MENU_LOGIN; ?></h4>
                                    </a>
                                <?php endif; ?>
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