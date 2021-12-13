<?php
$conn = mysqli_connect('localhost', 'root', '', 'simpsons_database');

$jsonCharacter = file_get_contents("characters.json");
$characterData = json_decode($jsonCharacter, true);

echo "Hello from simpsons.php";
$characters = $_GET['characters'];

if (isset($characters)){
    foreach($characters as $character){
        foreach($characterData as $characterData){
            if($characterData['first_name']==$character){
                echo '
                <li class = "characters__itemContainer">
                    <div class = "characters__item">
                        <img src="'.$characterData['image_url'].'" alt = "image" class = "characters__image">
                        <div class = "characters__info">
                            <h2 class = "characters__name">
                                '.$characterData['first_name'].' '.$characterData['last_name'].'
                            </h2>
                            <div class = "characters__age">
                                <b>age</b> '.$characterData['age'].'
                            </div>
                            <div class = "characters__occupation">
                                <b>occupation</b> '.$characterData['occupation'].'
                            </div>
                            <div class = "characters__voiced_by">
                                <b>voiced by</b> '.$characterData['voiced_by'].'
                            </div>
                        </div>
                    </div>
                </li>
            ';            }
        }
    }
}


/*
function addItem($name,$family){
    foreach($family as $member){
        if($name == $member['first_name']){
            echo '
                <li class = "characters__itemContainer">
                    <div class = "characters__item">
                        <img src="'.$member['image_url'].'" alt = "image" class = "characters__image">
                        <div class = "characters__info">
                            <h2 class = "characters__name">
                                '.$member['first_name'].' '.$member['last_name'].'
                            </h2>
                            <div class = "characters__age">
                                <b>age</b> '.$member['age'].'
                            </div>
                            <div class = "characters__occupation">
                                <b>occupation</b> '.$member['occupation'].'
                            </div>
                            <div class = "characters__voiced_by">
                                <b>voiced by</b> '.$member['voiced_by'].'
                            </div>
                        </div>
                    </div>
                </li>
            ';
        }
    }
}*/