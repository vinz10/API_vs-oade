<?php
/**
 * Class phasesController
 */
class phasesController extends Controller {

    /**
     // @method phase1()
     // @desc Method to load the page 'phase1.php'
     */
    function phase1() {
        
        // Init
        $this->init();
    }	
    
    /**
     // @method phase2()
     // @desc Method to load the page 'phase2.php'
     */
    function phase2() {
        
        // Init
        $this->init();
    }
    
    /**
     // @method phase3()
     // @desc Method to load the page 'phase3.php'
     */
    function phase3() {
        
        // Init
        $this->init();
    }
    
    /**
     // @method phase4()
     // @desc Method to load the page 'phase4.php'
     */
    function phase4() {
        
        // Init
        $this->init();
    }
    
    /**
     // @method phase5()
     // @desc Method to load the page 'phase5.php'
     */
    function phase5() {
        
        // Init
        $this->init();
    }
    
    /**
     // @method phase6()
     // @desc Method to load the page 'phase6.php'
     */
    function phase6() {
        
        // Init
        $this->init();
    }
    
    /**
     // @method init()
     // @desc Method that initializes variables and check login
     */
    private function init() {
        
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

