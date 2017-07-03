<?php
/**
 * Class axesController
 */
class axesController extends Controller {

    /**
     // @method axes()
     // @desc Method to load the page 'axes.php'
     */
    function axes() {
        
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
     // @method add()
     // @desc Method to load the page 'add.php'
     */
    function add() {
        
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
     // @method edit()
     // @desc Method to load the page 'edit.php'
     */
    function edit() {
        
        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['msgSuccess'] = isset($_SESSION['msgSuccess']) ? $_SESSION['msgSuccess'] : '';
        
        $this->getAxe();
        
        // If no login
        if(!$this->getLogin()){
            $this->redirect('', '');
            exit;
        } 
    }	
    
    /**
     // @method addAxe()
     // @desc Method for adding an axe
     */
    function addAxe() {

        // Get data posted by the form
        $nameFR = $_POST['nameFR'];
        $nameDE = $_POST['nameDE'];

        // Create the new axe
        $axe = new Axe(null, $nameFR, $nameDE);
        
        $nbrAxes = count(Axe::getAxes());
        
        // Insert the axe
        if ($nbrAxes < 6) {
            if ($axe->existAxe($nameFR, $nameDE)) {
                $_SESSION['msg'] = MSG_AXE_EXIST;
                $this->redirect('axes', 'add');
            } else {
                $axe->insertAxe();
                $_SESSION['msgSuccess'] = MSG_INSERT;
                $this->redirect('axes', 'axes');
            }
        }
        else {
            $_SESSION['msg'] = MSG_TOTAL_AXE;
            $this->redirect('axes', 'axes');
        }
    }
    
    /**
     // @method modifAxe()
     // @desc Method for the modification of an axe
     */
    function modifAxe() {

        // Get data posted by the form
        $nameFR = $_POST['nameFR'];
        $nameDE = $_POST['nameDE'];
        $idAxe = intval($_GET['id']);

        // Create the new axe
        $axe = new Axe($idAxe, $nameFR, $nameDE);
        
        // Update the axe
        $axe->updateAxe($idAxe);
        $_SESSION['msgSuccess'] = MSG_MODIF;
        $this->redirect('axes', 'axes');
    }
    
    /**
     // @method deleteAxe()
     // @desc Method for deleting an axe
     */
    function deleteAxe() {

        // Get data posted by the form
        $idAxe = intval($_GET['id']);
        
        if (Axe::checkLinks($idAxe)) {
            $_SESSION['msg'] = MSG_DELETE_AXE_IMPOSSIBLE;
        }
        else {
            Axe::deleteAxe($idAxe);
            $_SESSION['msgSuccess'] = MSG_DELETE;
        }
        
        $this->redirect('axes', 'axes');
    }
    
    /**
    // @method getAxe()
    // @desc Method that get the axe if exists
    */
    private function getAxe() {
        
        // Get the id of the axe
        if (isset($_GET['id'])) {
            $idAxe = intval($_GET['id']);
            if ($idAxe != 0) {
                $axe = Axe::getAxeById($idAxe);
                if($axe){
                    $this->data['idAxe'] = $axe->getId();
                    $this->data['nameFR'] = $axe->getNameFR();
                    $this->data['nameDE'] = $axe->getNameDE();
                }
                else {
                    $this->redirect('error', 'http404');
                }
            }
        }
        else {
            $this->data['idAxe'] = null;
            $this->data['nameFR'] = null;
            $this->data['nameDE'] = null;
        }
    }
    
    /**
     // @method getAxes()
     // @desc Method that get axes from the DB
     // @return Axes
     */
    public static function getAxes() {
        return Axe::getAxes();
    }
    
    /**
     // @method getAxeById()
     // @desc Method that get an axe by the id of the axe from the DB
     // @param int $idAxe
     // @return Axe
     */
    public static function getAxeById($idAxe) {
        return Axe::getAxeById($idAxe);
    }
}

