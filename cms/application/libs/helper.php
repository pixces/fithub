<?php

class Helper
{
    /**
     * debugPDO
     *
     * Shows the emulated SQL query in a PDO statement. What it does is just extremely simple, but powerful:
     * It combines the raw query and the placeholders. For sure not really perfect (as PDO is more complex than just
     * combining raw query and arguments), but it does the job.
     * 
     * @author Panique
     * @param string $raw_sql
     * @param array $parameters
     * @return string
     */
    static public function debugPDO($raw_sql, $parameters) {

        $keys = array();
        $values = $parameters;

        foreach ($parameters as $key => $value) {

            // check if named parameters (':param') or anonymous parameters ('?') are used
            if (is_string($key)) {
                $keys[] = '/' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }

            // bring parameter into human-readable format
            if (is_string($value)) {
                $values[$key] = "'" . $value . "'";
            } elseif (is_array($value)) {
                $values[$key] = implode(',', $value);
            } elseif (is_null($value)) {
                $values[$key] = 'NULL';
            }
        }

        /*
        echo "<br> [DEBUG] Keys:<pre>";
        print_r($keys);
        
        echo "\n[DEBUG] Values: ";
        print_r($values);
        echo "</pre>";
        */
        
        $raw_sql = preg_replace($keys, $values, $raw_sql, 1, $count);

        return $raw_sql;
    }


    /**
     * Function to upload a image.
     * @static
     * @param $file
     * @return bool|string
     */
    public static function uploadImage($file)
    {

        $dir_dest = ROOT . "../images/portfolio/";
        $dir_thumb = ROOT . "../images/portfolio/thumb/";

        #create new names of the uploaded image file
        $imageName = strtolower($file['name']); // Get the name of the file (including file extension).
        $imgFname = substr($imageName, 0, strpos($imageName, '.'));
        $imageExt = substr($imageName, strpos($imageName, '.'), strlen($imageName) - 1); // Get the extension from the filename.

        $baseImgName = str_replace(" ","_",$imgFname);

        if (file_exists($dir_dest . $baseImgName . $imageExt)) {
            $baseImgName = str_replace(" ","_",$imgFname) . rand(0, 999);
        }

        $thumb = "tn_".$baseImgName;

        //$name300px = "300px" . $baseImgName;
        //$name125px = "125px" . $baseImgName;

        #now upload the image and resize
        $handle = new upload($file);

        if ($handle->uploaded) {

            //upload the main file to the server first
            $handle->file_new_name_body = $baseImgName;
            $handle->Process($dir_dest);

            #main file created
            if (!$handle->processed) {

                //this should throw exception
                echo $handle->log;
                echo '  Error creating main file: ' . $handle->error . '';
                return false;
            }

            // yes, the file is on the server
            // below are some example settings which can be used if the uploaded file is an image.
            $handle->file_new_name_body = $thumb;
            $handle->image_resize       = true;
            $handle->image_ratio_crop   = 'T';
            $handle->image_y = 271;
            $handle->image_x = 281;

            $handle->Process($dir_thumb);

            #file created for 300px
            if (!$handle->processed) {

                //this should throw exception
                echo $handle->log;
                echo '  Error creating thumb image file: ' . $handle->error . '';
                return false;
            }
            // we delete the temporary files
            $handle->Clean();
            return $baseImgName . strtolower($imageExt);
        }
        //this should throw exception
        echo "Cannot upload" . var_export($_FILES, true);
        return false;
    }

}