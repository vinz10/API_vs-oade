<?php
// Initialization of variables
$msg = $this->vars['msg'];
$msgSuccess = $this->vars['msgSuccess'];
$title = LOGIN_TITLE;
$towns = loginController::getAllTowns();

// Template CSS
ob_start();
?>

<div class="success-msg">
    <?php echo $msgSuccess; ?>
</div>

<div class="error-msg">
    <?php echo $msg; ?>
</div>


<form action="<?php echo URL_DIR . 'login/connection'; ?>" method="post">
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1><?php echo LOGIN; ?></h1>	
            </div>

            <div class="login-form">
                <div class="control-group">
                    <label for="login-name"><?php echo TOWNNAME; ?></label>
                    <select name="townName" id="townName">
                        <?php
                        foreach ($towns as $town) {
                            echo '<option value=' . $town->getTownName() . '>' . $town->getTownName() . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="control-group">
                    <label for="login-pass"><?php echo PASSWORD; ?></label>
                    <input type="password" name="password" id="login-pass"/>	
                </div>

                <input type="submit" name="Submit" value="<?php echo LOGIN; ?>"/>
            </div>		
        </div>	
    </div>	
</form>

<?php
// Unset variables
unset($_SESSION['msg']);
unset($_SESSION['msgSuccess']);

// Template CSS
$content = ob_get_clean();
require 'views/template.php';
