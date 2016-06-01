<?php

class Model
{
    protected $_describe = array();

    protected $_table;

    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all songs from database
     */
    public function getAllServices()
    {
        $sql = "SELECT * FROM services";
        $query = $this->db->prepare($sql);
        $query->execute();

        $result = $query->fetchAll();
        $count = count($result);
        return array(
            'count' => $count,
            'data' => $result
        );
    }

    public function getAllCategory(){
        $sql = "SELECT * from portfolios where parent_id = 0 && type = 'album'";
        $query = $this->db->prepare($sql);
        $query->execute();

        $result = $query->fetchAll();
        $count = count($result);
        return array(
            'count' => $count,
            'data' => $result
        );
    }

    public function getAllAlbums(){

        $sql = "SELECT
                  p1.id, p1.parent_id, p1.title, p1.description, p1.image_url, p2.title as category
                FROM portfolios p1 JOIN portfolios p2 ON (p1.parent_id = p2.id)
                WHERE p1.type = 'album' && p1.parent_id != 0";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = $query->fetchAll();
        $count = count($result);
        return array(
            'count' => $count,
            'data' => $result
        );
    }

    protected function _describe(){
        if (!$this->_describe) {
            $this->_describe = array();
            $sql = 'DESCRIBE ' . $this->_table;
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach($result as $column) {
                array_push($this->_describe, $column['Field']);
            }
        }

        foreach ($this->_describe as $field) {
            $this->$field = null;
        }
    }

    public function save($data){
        $fields = [];
        $values = [];

        foreach($this->_describe as $field){
            if (isset($data[$field])){
                array_push($fields,$field);
                $values[":".$field] = $data[$field];
            }
        }

        try{
            $sql = "INSERT INTO " . $this->_table . " ( " . implode(',', $fields) . " ) VALUE ( " . implode(',', array_keys($values)) .")";
            $query = $this->db->prepare($sql);
            $parameters = $values;
            $query->execute($parameters);
        } catch (PDOException $e) {
            throw new Exception($e->getCode(),$e->getMessage());
        }
    }

    public function addAlbum($data){
        $this->_describe();
        $data['parent_id'] = (isset($data['category'])) ? $data['category'] : 0;
        $data['type'] = 'album';
        $data['date_created'] = date('Y-m-d h:i:s');

        try{
            $this->save($data);
            return;
        } catch(Exception $e){
            throw new Exception($e->getCode(),$e->getMessage());
        }
    }



    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addSong($artist, $track, $link)
    {
        $sql = "INSERT INTO song (artist, track, link) VALUES (:artist, :track, :link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }



    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteSong($song_id)
    {
        $sql = "DELETE FROM song WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a song from database
     */
    public function getSong($song_id)
    {
        $sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
    public function updateSong($artist, $track, $link, $song_id)
    {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/contact.php for more)
     */
    public function getAmountOfSongs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_songs;
    }

    public function setTable($name){
        $this->_table = $name;
    }

}
