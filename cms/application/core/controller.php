<?php

class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * @var null Model
     */
    public $model = null;

    protected $controller;

    protected $action;

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     * @param $controller
     * @param $action
     */
    function __construct($controller, $action)
    {
        $this->controller = $controller;
        $this->action = $action;

        $this->openDatabaseConnection();
        $this->loadModel();

        if (!Auth::isAuthenticated()){
            if (( $this->controller != 'home' ) || (!in_array($this->action,array('login','logout'))))
            {
                header('location: ' . URL . 'home/login');
            }
        } else {
            if ($this->action == 'login'){
                header('location: ' . URL . 'home/index');
            }
        }
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    /**
     * Loads the "model".
     * @return object model
     */
    public function loadModel($name = 'model')
    {
        $classPath = 'model/'.strtolower($name).".php";
        $name = ucwords(strtolower($name));
        require APP . $classPath;
        // create new "model" (and pass the database connection)
        $this->model = new $name($this->db);
    }

    public function setFlash($level,$message){
        return;
    }

    public function getFlash($level = null){

    }

    public function hasFlash($level){

    }
}
