<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo EDIT_TITLE; ?></title>
        
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
    $phase = $this->vars['phase'];
    $question = new Question($this->data ['idQuestion'], $this->data ['questionNo'], $this->data ['questionFR'], 
            $this->data ['questionCommentFR'], $this->data ['questionDE'], $this->data ['questionCommentDE'], $this->data ['axes_idAxe']);	
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
                            <a href="<?php echo URL_DIR;?>" style="color:#fff;">VS-OADE</a>  
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
            
            <!-- SURVEY -->
            <div id="page-wrapper" >
                <div id="page-inner">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><?php echo EDIT_EDIT; ?></h2>   
                        </div>
                    </div> 
                    
                    <hr />
                    
                    <!-- Messages -->
                    
                    <!-- EDIT -->
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php echo PHASE1_QUESTION . ' ' . $question->getQuestionNo(); ?>
                            </div>
                            <form action="<?php echo URL_DIR . 'phases/modifQuestion?id=' . $question->getId() . '&phase=' . $phase; ?>" method="post">
                                <div class="panel-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-question-circle"></i><?php echo ' ' . SETTINGS_FRENCH; ?></span>
                                        <input type="text" name="questionFR" id="questionFR" class="form-control" required="required" placeholder="<?php echo PHASE1_QUESTION; ?>" 
                                            value="<?php echo $question->getQuestionFR(); ?>"/>
                                    </div>
                                    <br />
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-question-circle"></i><?php echo ' ' . SETTINGS_GERMAN; ?></i></span>
                                        <input type="text" name="questionDE" id="questionDE" class="form-control" required="required" placeholder="<?php echo PHASE1_QUESTION; ?>" 
                                            value="<?php echo $question->getQuestionDE(); ?>"/>
                                    </div>
                                    <hr />
                                    <?php echo '<b>' . PHASE1_COMMENT . '</b><br/>'; ?>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-comment"></i><?php echo ' ' . SETTINGS_FRENCH; ?></span>
                                        <?php if ($phase == 2) : ?>
                                            <input type="text" name="questionCommentFR" id="questionCommentFR" class="form-control" required="required" placeholder="<?php echo PHASE1_COMMENT; ?>" 
                                                value="<?php echo $question->getQuestionCommentFR(); ?>"/>
                                        <?php else : ?>
                                            <input type="text" name="questionCommentFR" id="questionCommentFR" class="form-control" placeholder="<?php echo PHASE1_COMMENT; ?>" 
                                                value="<?php echo $question->getQuestionCommentFR(); ?>"/>
                                        <?php endif; ?>
                                    </div>
                                    <br />
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-comment"></i><?php echo ' ' . SETTINGS_GERMAN; ?></i></span>
                                        <?php if ($phase == 2) : ?>
                                            <input type="text" name="questionCommentDE" id="questionCommentDE" class="form-control" required="required" placeholder="<?php echo PHASE1_COMMENT; ?>" 
                                                value="<?php echo $question->getQuestionCommentDE(); ?>"/>
                                        <?php else : ?>
                                            <input type="text" name="questionCommentDE" id="questionCommentDE" class="form-control" placeholder="<?php echo PHASE1_COMMENT; ?>" 
                                                value="<?php echo $question->getQuestionCommentDE(); ?>"/>
                                        <?php endif; ?>
                                    </div>
                                    <hr />
                                    <?php if ($question->getAxeId()) : ?>
                                        <?php echo '<i class="fa fa-list"></i> <b>' . EDIT_AXE . '</b><br/>'; ?>
                                        <div class="input-group">   
                                            <?php 
                                            $axes = axesController::getAxes();

                                            foreach ($axes as $axe) {
                                                if($axe->getId() == $question->getAxeId()) {
                                                    if ($lang == 'fr') {
                                                        echo '<input type="radio" name="axe" value="' . $axe->getId() . '" checked="checked"> ' . $axe->getNameFR() . '<br>';
                                                    }
                                                    else {
                                                        echo '<input type="radio" name="axe" value="' . $axe->getId() . '" checked="checked"> ' . $axe->getNameDE() . '<br>';
                                                    }     
                                                }
                                                else {
                                                    if ($lang == 'fr') {
                                                        echo '<input type="radio" name="axe" value="' . $axe->getId() . '"> ' . $axe->getNameFR() . '<br>';
                                                    }
                                                    else {
                                                        echo '<input type="radio" name="axe" value="' . $axe->getId() . '"> ' . $axe->getNameDE() . '<br>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                        <hr/>
                                    <?php endif; ?>
                                    <input type="submit" name="Submit" class="btn btn-warning" value="<?php echo PHASE1_EDIT; ?>" />
                                </div>
                            </form>
                        </div>
                    </div>
                    
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
    unset($_SESSION['noQuestion']);
    ?>
    
</html>