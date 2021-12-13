<?php
$conn = mysqli_connect('localhost', 'root', '', 'simpsons_database');

$jsonCharacter = file_get_contents("characters.json");
$characterData = json_decode($jsonCharacter, true);

echo "Hello from simpsons.php";
$characters = $_GET['characters'];

if (isset($characters)){
    foreach($characters as $character){
        createDiv($characterData[strtolower($character)]);
    }
}

function createDiv($item){
    echo '
        <li class = "characters__itemContainer">
            <div class = "characters__item">
                <img class="characters__image" src="'.$item['image_url'].'" alt = "image" class = "characters__image">
                <div class = "characters__info">
                    <h2 class = "characters__name characters__attribute">
                        '.$item['first_name'].' '.$item['last_name'].'
                    </h2>
                    <div class = "characters__age characters__attribute">
                        <b>age</b> '.$item['age'].'
                    </div>
                    <div class = "characters__occupation characters__attribute">
                        <b>occupation</b> '.$item['occupation'].'
                    </div>
                    <div class = "characters__voiced_by characters__attribute">
                        <b>voiced by</b> '.$item['voiced_by'].'
                    </div>
                </div>
            </div>
        </li>
    ';  
}