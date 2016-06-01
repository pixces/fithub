<?php

/**
 * Class Services
 * List all services and do basic CRUD
 */

class Services extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        //getting list of all Services and their details
        $services = $this->model->getAllServices();

        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/services/index.php';
        require APP . 'view/_templates/footer.php';
    }


}
