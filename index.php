<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simpsons Archives</title>
    <link rel="stylesheet" href="style.css">
    <?php
        $json = file_get_contents('characters.json');
        $familyMember = json_decode($json, true);
    ?>
</head>
<body>
    <header id="masthead" class="site-header layout-container">
        <img 
            class="site-header__logo" 
            src="images/logo.svg" 
            alt="Logo"
        >
    </header>

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <div id="main" class="site-main">
                <div class="form__container layout-container">
                    <div class="form__row layout-row">
                        <div class="form__itemsContainer">

                            <div class="form__imageContainer">
                                <img 
                                    src="images/simpsons.jpg" 
                                    alt="Simpsons" class="form__image">
                            </div>

                            <div class="form__card">

                                <h3 class="form__heading">
                                    Select characters to show
                                </h3>

                                <form method="get">

                                    <ul class="form__items">
                                        <li class="form__item">
                                            <label for="homer">
                                                Homer Simpson
                                            </label>
                                            <input 
                                                id="homer" 
                                                type="checkbox" 
                                                name="homer" 
                                            >                
                                            <?php 
                                                if(isset($_GET['homer'])){
                                                    addMember('Homer',$familyMember);
                                                } 
                                            ?>                 
                                        </li>
                                        <li class="form__item">
                                            <label for="marge">
                                                Marge Simpson
                                            </label>
                                            <input 
                                                id="marge" 
                                                type="checkbox" 
                                                name="marge"
                                            >               
                                            <?php 
                                                if(isset($_GET['marge'])){
                                                    addMember('Marge',$familyMember);
                                                } 
                                            ?>                 
                                        </li>
                                        <li class="form__item">
                                            <label for="bart">
                                                Bart Simpson
                                            </label>
                                            <input 
                                                id="bart" 
                                                type="checkbox" 
                                                name="bart"
                                            >              
                                            <?php 
                                                if(isset($_GET['bart'])){
                                                    addMember('Bart',$familyMember);
                                                } 
                                            ?>                  
                                        </li>
                                        <li class="form__item">
                                            <label for="lisa">
                                                Lisa Simpson                                                
                                            </label>
                                            <input 
                                                id="lisa" 
                                                type="checkbox" 
                                                name="lisa"
                                            >              
                                            <?php 
                                                if(isset($_GET['lisa'])){
                                                    addMember('Lisa',$familyMember);
                                                } 
                                            ?>                  
                                        </li>
                                        <li class="form__item">
                                            <label for="maggie">
                                                Maggie Simpson 
                                            </label>
                                            <input 
                                                id="maggie" 
                                                type="checkbox" 
                                                name="maggie"
                                            >
                                            <?php 
                                                if(isset($_GET['maggie'])){
                                                    addMember('Maggie',$familyMember);
                                                } 
                                            ?>                                
                                        </li>
                                        <li class="form__item">
                                            <label for="moe">
                                                Moe 
                                            </label>
                                            <input 
                                                id="moe" 
                                                type="checkbox" 
                                                name="moe"
                                            >  
                                            <?php 
                                                if(isset($_GET['moe'])){
                                                    addMember('Moe',$familyMember);
                                                } 
                                            ?>                              
                                        </li>
                                    </ul>

                                    <input class="form__button" type="submit" value="Show Characters">

                                </form>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="characters__container layout-container">
                    <div class="characters__row layout-row">
                        <ul class="characters__items">
                            <?php include "simpsons.php" ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
<?php

function addMember($name,$family){
    addItem($name,$family);
}

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
}
?>
