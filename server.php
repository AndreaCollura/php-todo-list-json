<?php 

$shoppingList = file_get_contents('./store.json');

$shopListPhp = json_decode($shoppingList, true);



if(isset($_POST['newListEle'])){

    $newListEle = [
        "text" => $_POST['newListEle'],
        "done" =>   false     /* $_POST['done'] */
    ];
    
    $newListEle = $_POST['newListEle'];
    array_push($shopListPhp, $newListEle);

    file_put_contents('./store.json', json_encode($shopListPhp));

    

} elseif (isset($_POST['updateElem'])) {

    $index = $_POST['updateElem'];
    $shopListPhp[$index]['done'] = !$shopListPhp[$index]['done'];
    file_put_contents('./store.json', json_encode($shopListPhp));

}elseif (isset($_POST['deleteElem'])) {

    $index = $_POST['deleteElem'];
    array_splice($shopListPhp, $index, 1);
    file_put_contents('./store.json', json_encode($shopListPhp));

} 



header('Content-Type: application/json');

echo json_encode($shopListPhp); 

