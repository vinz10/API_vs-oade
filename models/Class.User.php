<?php

/**
 * Class Town
 */
class User {
    private $username;
    private $password;
    private $idUser;
    
    /**
     * Constructor
     * @param string $username
     * @param string $password
     * @param int $idUser
     */
    public function __construct($idUser = null, $username, $password){
        $this->setId($idUser);
        $this->setUsername($username);
        $this->setPassword($password);
    }	
	
    /**
     * @return idUser
     */
    public function getId(){
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setId($idUser){
        $this->idUser = $idUser;
    }
	
    /**
     * @return username
     */
    public function getUsername(){
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username){
        $this->username = $username;
    }
	
    /**
     * @return password
     */
    public function getPassword(){
            return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password){
        $this->password = $password;
    }
	
    public static function connect($username, $password){
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        
        if(!$row) {
            return false;
        }

        return new User($row['idUser'], $row['username'], $row['password']);
    }
}