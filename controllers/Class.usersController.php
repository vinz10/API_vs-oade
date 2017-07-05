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
        if (!$this->getLogin()) {
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
        if (!$this->getLogin()) {
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

        $this->getUser();

        // If no login
        if (!$this->getLogin()) {
            $this->redirect('', '');
            exit;
        }
    }

    /**
      // @method addUser()
      // @desc Method for adding a user
     */
    function addUser() {

        // Get data posted by the form
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        // Create the new user
        $user = new User(null, $username, $password);

        try {
            // Insert the user
            if ($user->existUser($username)) {
                $_SESSION['msg'] = MSG_USER_EXIST;
                $this->redirect('users', 'add');
            } elseif ($password != $confirmPassword) {
                $_SESSION['msg'] = MSG_PWD_ERROR;
                $this->redirect('users', 'add');
            } else {
                $user->insertUser();
                $_SESSION['msgSuccess'] = MSG_INSERT;
                $this->redirect('users', 'users');
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
      // @method modifUser()
      // @desc Method for the modification of a user
     */
    function modifUser() {

        // Get data posted by the form
        $username = $_POST['username'];
        $password = $_POST['password'];
        $idUser = intval($_GET['id']);

        // Create the new user
        $user = new User($idUser, $username, $password);

        try {
            // Update the user
            $user->updateUser($idUser);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        $_SESSION['msgSuccess'] = MSG_MODIF;
        $this->redirect('users', 'users');
    }

    /**
      // @method deleteUser()
      // @desc Method for deleting a user
     */
    function deleteUser() {

        // Get data posted by the form
        $idUser = intval($_GET['id']);

        try {
            if (!User::checkNbr()) {
                $_SESSION['msg'] = MSG_DELETE_USER_IMPOSSIBLE;
            } else {
                User::deleteUser($idUser);
                $_SESSION['msgSuccess'] = MSG_DELETE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        $this->redirect('users', 'users');
    }

    /**
      // @method getUser()
      // @desc Method that get the user if exists
     */
    private function getUser() {

        // Get the id of the user
        if (isset($_GET['id'])) {
            $idUser = intval($_GET['id']);
            if ($idUser != 0) {
                try {
                    $user = User::getUserById($idUser);
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }
                if ($user) {
                    $this->data['idUser'] = $user->getId();
                    $this->data['username'] = $user->getUsername();
                    $this->data['password'] = $user->getPassword();
                } else {
                    $this->redirect('error', 'http404');
                }
            }
        } else {
            $this->data['idUser'] = null;
            $this->data['username'] = null;
            $this->data['password'] = null;
        }
    }

    /**
      // @method getUsers()
      // @desc Method that get users from the DB
      // @return Users
     */
    public static function getUsers() {
        try {
            return User::getUsers();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
      // @method getUserById()
      // @desc Method that get a user by the idUser of the user from the DB
      // @param int $idUser
      // @return User
     */
    public static function getUserById($idUser) {
        try {
            return User::getUserById($idUser);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}