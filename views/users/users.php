<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo USERS_TITLE; ?></title>

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
    $lang = $_SESSION['lang'];
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
                        <a href="<?php echo URL_DIR . 'login/logout'; ?>" style="color:#fff;"><i class="fa fa-sign-out"></i> <?php echo HOME_LOGOUT; ?></a>
                    </span>

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

                        <li>
                            <a href="<?php echo URL_DIR . 'phases/phase5'; ?>"><i class="fa fa-adjust"></i><?php echo MENU_PHASE5; ?></a>
                        </li>

                        <li>
                            <a href="<?php echo URL_DIR . 'phases/phase6'; ?>"><i class="fa fa-plus-circle"></i><?php echo MENU_PHASE6; ?></a>
                        </li>

                        <li>
                            <a href="<?php echo URL_DIR . 'axes/axes'; ?>"><i class="fa fa-list"></i><?php echo MENU_AXES; ?></a>
                        </li>

                        <li class="active-link">
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
                            <h2><i class="fa fa-users"></i> <?php echo USERS_USERS; ?></h2>   
                        </div>
                    </div> 

                    <hr />

                    <!-- Messages -->
                    <?php if (!empty($msgSuccess)) : ?>
                        <div class="members wow agileits w3layouts slideInLeft">
                            <div class="alert agileits w3layouts alert-success" role="alert">
                                <strong><?php echo MSG_SUCCESS; ?></strong> <?php echo ' ' . $msgSuccess; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($msg)) : ?>
                        <div class="members wow agileits w3layouts slideInLeft">
                            <div class="alert agileits w3layouts alert-danger" role="alert">
                                <strong><?php echo MSG_ERROR; ?></strong> <?php echo ' ' . $msg; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- USERS -->
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion">

                            <?php
                            $users = usersController::getUsers();
                            $nbrUsers = count($users);
                            $i = 0;

                            foreach ($users as $user): $i++;
                                ?>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="<?php echo '#collapse' . $i; ?>" class="collapsed"><?php echo USERS_USER . ' ' . $i . ' <i class="fa fa-plus"></i> <i class="fa fa-pencil"></i> <i class="fa fa-ban"></i>'; ?></a>
                                        </h4>
                                    </div>

                                        <?php if ($i == 1) : ?>
                                        <div id="<?php echo 'collapse' . $i; ?>" class="panel-collapse in" style="height: auto;">
                                        <?php else : ?>
                                        <div id="<?php echo 'collapse' . $i; ?>" class="panel-collapse collapse" style="height: auto;">
                                        <?php endif; ?>
                                            <div class="panel-body">
                                                <?php
                                                echo '<b>' . USERS_USERNAME . '</b>: ' . $user->getUsername() . '<br/>';
                                                echo '<b>' . USERS_PASSWORD . '</b>: ' . $user->getPassword() . '<hr/>';
                                                ?>
                                                <a href="<?php echo URL_DIR . 'users/add'; ?>" class="btn btn-success"><?php echo PHASE1_ADD; ?></a>
                                                <a href="<?php echo URL_DIR . 'users/edit?id=' . $user->getId(); ?>" class="btn btn-warning"><?php echo PHASE1_EDIT; ?></a>
                                                <a href="<?php echo URL_DIR . 'users/deleteUser?id=' . $user->getId(); ?>" class="btn btn-danger"><?php echo PHASE1_DELETE; ?></a>
                                            </div>
                                        </div>     
                                    </div>
                                <?php endforeach; ?>    
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