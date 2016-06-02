<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleOne()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_one.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: exampletwo
     * This method handles what happens when you move to http://yourproject/home/exampletwo
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleTwo()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_two.php';
        require APP . 'view/_templates/footer.php';
    }

    public function login(){

        if (isset($_POST['admin_login'])){

            try{

                $credentials = array(
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                );

                $this->check($_POST);

                //redirect to home page
                header('location: ' . URL . 'home/index');

            } catch (Exception $e){
                $this->setFlash('error', $e->getMessage());
            }
        }

        //validate and create auth details
        require APP . 'view/home/login.php';
    }

    public function logout(){
        //unset the auth details
        Auth::remove();
        header('location: ' . URL . 'home/login');

    }

    private function check(array $credentials){

        $email = $credentials['email'];
        $password = $credentials['password'];

        //check if user exits
        $objUser = $this->model->findUser($email);

        if ($objUser == false){
            throw new Exception("Invalid email");
        }

        //check for password
        if( md5($password) != $objUser[0]->password ){
            throw new Exception("Incorrect password.");
        }

        //login this user now
        Auth::registerSession($objUser[0]);
        return true;
    }
}
