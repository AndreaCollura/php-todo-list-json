<?php 

$shoppingList = file_get_contents('./store.json');

$shopListPhp = json_decode($shoppingList, true);



if(isset($_POST['newListEle'])){
    $newListEle = $_POST['newListEle'];
    array_push($shopListPhp, $newListEle);

    file_put_contents('./store.json', json_encode($shopListPhp));

} 


header('Content-Type: application/json');

echo json_encode($shopListPhp); 

