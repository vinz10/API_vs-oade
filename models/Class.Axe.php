<?php
/**
 * Class Axe
 */
class Axe {
    private $idAxe;
    private $nameFR;
    private $nameDE;
    
    /**
     * Constructor
     * @param int $idAxe
     * @param string $nameFR
     * @param string $nameDE
     */
    public function __construct($idAxe = null, $nameFR, $nameDE){
        $this->setId($idAxe);
        $this->setNameFR($nameFR);
        $this->setNameDE($nameDE);
    }	
	
    /**
     * @return idAxe
     */
    public function getId(){
        return $this->idAxe;
    }

    /**
     * @param int $idAxe
     */
    public function setId($idAxe){
        $this->idAxe = $idAxe;
    }
	
    /**
     * @return nameFR
     */
    public function getNameFR(){
        return $this->nameFR;
    }

    /**
     * @param string $nameFR
     */
    public function setNameFR($nameFR){
        $this->nameFR = $nameFR;
    }
	
    /**
     * @return nameDE
     */
    public function getNameDE(){
            return $this->nameDE;
    }

    /**
     * @param string $nameDE
     */
    public function setNameDE($nameDE){
        $this->nameDE = $nameDE;
    }
    
    /**
     // @method getAxes()
     // @desc Method that get axes from the DB
     // @return Axes
     */
    public static function getAxes() {
        
        $query = "SELECT * FROM axes;";      
        $result = SqlConnection::getInstance()->selectDB($query);
        $Axes = array();
        $rows = $result->fetchAll();

        foreach($rows as $row) {
            $axe = new Axe($row['idAxe'], $row['nameFR'], $row['nameDE']);
                
            $Axes[] = $axe;
        }

        return $Axes;
    }
    
    /**
     // @method getAxeById()
     // @desc Method that get an axe by the id of the axe from the DB
     // @param int $idAxe
     // @return Axe
     */
    public static function getAxeById($idAxe){
        $query = "SELECT * FROM axes WHERE idAxe='$idAxe';";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        
        if(!$row) {
            return false;
        }

        return new Axe($row['idAxe'], $row['nameFR'], $row['nameDE']);
    }
}