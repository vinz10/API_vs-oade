<?php
/**
 * Class usersController
 */
class usersController extends Controller {

    /**
     // @method users()
     // @desc Method to load the page 'users.php'
     */
    function users() {
        
        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['msgSuccess'] = isset($_SESSION['msgSuccess']) ? $_SESSION['msgSuccess'] : '';
        
        // If no login
        if(!$this->getLogin()){
            $this->redirect('', '');
            exit;
        } 
    }	
    
    /**
     // @method validatePhase0()
     // @desc Method for the validation of phase 0
     */
    function validatePhase0() {

        // Get data posted by the form
        $name = $_POST['name'];
        $description = $_POST['description'];
        $poLastname = $_POST['poLastname'];
        $poFirstname = $_POST['poFirstname'];
        
        // Get the town Id
        $login = $_SESSION ['login'];
        $townId = $login->getId();
        
        // Get the id of the project
        if (isset($_GET['id'])) {
            $idProject = intval($_GET['id']);
        }
        else {
            $idProject = null;
        }

        // Create the new project
        $project = new Project($idProject, $name, $description, $poLastname, $poFirstname, $townId);
        
        // Check if the name of the project already exists
        if ($project->existProject($idProject, $name, $townId)) {
            if ($idProject == null) {
                $_SESSION['msg'] = MSG_PROJECT_EXIST;
                $this->redirect('projects', 'phase0');
                
            }
            else {
                // Update the project
                $project->updateProject($idProject);
                $_SESSION['msgSuccess'] = MSG_MODIF;
                $this->redirect('projects', 'phase0?id=' . $idProject);
            }
        }
        else {
            // Save new project into the db
            $project->insertProject();
            $this->redirect('projects', 'projects');
        }
    }
}

