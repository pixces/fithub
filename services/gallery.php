<?php
require_once(  __DIR__ . '/db.php');

//get list of all books from the books table
try {
    $query = " SELECT * FROM portfolios ORDER BY id ASC ";

    $stmt = Database::prepare($query);
    $stmt->execute();

    //list of books
    $items = $stmt->fetchAll(PDO::FETCH_OBJ);

    $itemList = array();

    foreach ($items as $item){
        $itemList[$item->id] = array(
            'ID' => $item->id,
            'src' => $item->image_url,
            'srct'=> 'thumb/tn_'.$item->image_url,
            'title' => $item->title,
        );

        if ($item->parent_id != 0){
            $itemList[$item->id]['albumID'] = $item->parent_id;
        }

        if ($item->type != 'image'){
            $itemList[$item->id]['kind'] = $item->type;
        }

    }

    header('Content-type: application/json');
    echo json_encode(array(
        'code' => 200,
        'status' => 'SUCCESS',
        'response' => array_values($itemList)
    ));

} catch(PDOException $e)  {
    echo $e->getMessage();
}


