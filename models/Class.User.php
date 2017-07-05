<?php

/**
 * Class User
 */
class User {

    private $idUser;
    private $username;
    private $password;

    /**
     * Constructor
     * @param int $idUser
     * @param string $username
     * @param string $password
     */
    public function __construct($idUser = null, $username, $password) {
        $this->setId($idUser);
        $this->setUsername($username);
        $this->setPassword($password);
    }

    /**
     * @return idUser
     */
    public function getId() {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setId($idUser) {
        $this->idUser = $idUser;
    }

    /**
     * @return username
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @return password
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
      // @method connect()
      // @desc Method that connect a user by the username and password
      // @param string $username
      // @param string $password
      // @return User
     */
    public static function connect($username, $password) {
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();

        if (!$row) {
            return false;
        }

        return new User($row['idUser'], $row['username'], $row['password']);
    }

    /**
      // @method getUsers()
      // @desc Method that get users from the DB
      // @return Users
     */
    public static function getUsers() {

        $query = "SELECT * FROM users;";
        $result = SqlConnection::getInstance()->selectDB($query);
        $Users = array();
        $rows = $result->fetchAll();

        foreach ($rows as $row) {
            $user = new User($row['idUser'], $row['username'], $row['password']);

            $Users[] = $user;
        }

        return $Users;
    }

    /**
      // @method getUserById()
      // @desc Method that get a user by the idUser from the DB
      // @param int $idUser
      // @return User
     */
    public static function getUserById($idUser) {
        $query = "SELECT * FROM users WHERE idUser='$idUser';";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();

        if (!$row) {
            return false;
        }

        return new User($row['idUser'], $row['username'], $row['password']);
    }

    /**
      // @method insertUser()
      // @desc Method that insert a new User into the DB
      // @return PDOStatement
     */
    public function insertUser() {

        $sql = SqlConnection::getInstance();

        $query = "INSERT into users(username, password) VALUES(";
        $query .= $sql->getConn()->quote($this->username) . ', ';
        $query .= $sql->getConn()->quote($this->password) . ');';

        return $sql->executeQuery($query);
    }

    /**
      // @method updateUser()
      // @desc Method that update a user into the DB by the idUser
      // @param int $idUser
      // @return PDOStatement
     */
    public function updateUser($idUser) {

        $sql = SqlConnection::getInstance();

        $query = 'UPDATE users SET username = ' . $sql->getConn()->quote($this->username);
        $query .= ', password = ' . $sql->getConn()->quote($this->password) . ' WHERE idUser = ' . $idUser . ';';

        return $sql->executeQuery($query);
    }

    /**
      // @method deleteUser()
      // @desc Method that delete a user by the idUser
      // @param int $idUser
     */
    public static function deleteUser($idUser) {

        $query = "DELETE FROM users WHERE idUser='$idUser'";

        return SqlConnection::getInstance()->deleteDB($query);
    }

    /**
      // @method existUser()
      // @desc Method that check if a user already exists by the username
      // @param string $username
      // @return boolean
     */
    public static function existUser($username) {

        $sql = SqlConnection::getInstance();

        $query = "SELECT * FROM users WHERE username='$username';";

        $result = $sql->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        return true;
    }

    /**
      // @method checkNbr()
      // @desc Method that check the amount of users in the DB
      // @return boolean
     */
    public static function checkNbr() {

        $query = "SELECT * FROM users;";
        $result = SqlConnection::getInstance()->selectDB($query);
        $rows = $result->fetchAll();

        if (!$rows[1]) {
            return false;
        }

        return true;
    }

}