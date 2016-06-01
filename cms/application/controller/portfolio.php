<?php

/**
 * Class Songs
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Portfolio extends Controller
{

    public function index()
    {

        // get all albumCategory
        $categories = $this->model->getAllCategory();

        //get all albums with all details
        $albums = $this->model->getAllAlbums();

        //load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/portfolio/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addAlbum()
    {
        //reached here without tyhe form submission
        if (!isset($_POST['submit_add_album'])){
            // where to go after song has been added
            $this->setFlash("error", "Form not submitted properly.");
            header('location: ' . URL . 'portfolio/index');
        }

        try{
            $data = $_POST;

            if (!$_FILES['image']['tmp_name'] || $_FILES['image']['error'] > 0) {
                $this->setFlash("error", "Image not uploaded properly. Cannot proceed.");
                header('location: ' . URL . 'portfolio/index');
                exit;
            }

            //now process this image
            $uploadFilename = Helper::uploadImage($_FILES['image']);
            if ($uploadFilename == true) {
                $data['image_url'] = $uploadFilename;
            } else {
                $this->setFlash("error", "Image not uploaded properly. Cannot proceed.");
                header('location: ' . URL . 'portfolio/index');
                exit;
            }

            //TODO: get this by reflection
            //once model class and corresponding classes are
            //panned out
            $this->model->setTable('portfolios');

            //save all this data
            $this->model->addAlbum($data);

            // where to go after song has been added
            $this->setFlash("success", "Successfully added new Album.");
            header('location: ' . URL . 'portfolio/index');

        } catch(Exception $e){
            //log errors
            $this->setFlash("error", $e->getMessage());
            header('location: ' . URL . 'portfolio/index');
        }
    }

    public function album($id){

        require APP . 'view/_templates/header.php';
        require APP . 'view/portfolio/index.php';
        require APP . 'view/_templates/footer.php';

    }

}
