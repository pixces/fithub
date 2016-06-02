<?php

class Auth{

    /**
     * @return bool
     */
    public static function isAuthenticated(){
        $identity = self::getIdentity();
        if ($identity){
            return true;
        } else {
            return false;
        }

    }

    private static function getIdentity(){
        $identity = isset($_SESSION['auth']) ? $_SESSION['auth'] : false;
        return $identity;
    }


    /**
     * Auth user by Id
     *
     * @param $id
     * @return bool
     * @throws Exception
     */
    public function authenticateUserById($id){

        $objUser = Users::findFirstById($id);
        if ($objUser == false) {
            throw new Exception('The user does not exist');
        }
        $this->checkUserFlags($objUser);
        $this->registerSession($objUser);
        return true;
    }


    /**
     * Get the entity related to the active user
     */
    public function getUser(){
        $identity = $this->getIdentity();

        if (isset($identity['id'])) {

            $objUser = Users::findFirstById($identity['id']);
            if ($objUser == false) {
                throw new Exception('The user does not exist');
            }

            return $objUser;
        }

        return false;
    }


    /**
     * function to register user
     * TODO: generate other params if required
     *
     * @param $user
     */
    public static function registerSession($user)
    {
        $_SESSION['auth'] = array(
                'id'   => $user->id,
                'name' => $user->name,
                'email' => $user->username
        );
    }

    /**
     * Method to remove the user Identity
     * and all related cookies for Remember Me
     */
    public static function remove(){
       unset($_SESSION['auth']);
    }



}