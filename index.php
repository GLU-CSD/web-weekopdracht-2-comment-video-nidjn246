<?php
include "config.php";
include "reactions.php";

$getReactions = Reactions::getReactions();
//uncomment de volgende regel om te kijken hoe de array van je reactions eruit ziet
// echo "<pre>".var_dump($getReactions)."</pre>";

if(!empty($_POST)){

    $postArray = [
        'name' =>  $_POST["naam"],
        'email' => $_POST["email"],
        'message' => $_POST["commentaar"]
    ];

    $setReaction = Reactions::setReaction($postArray);

    if(isset($setReaction['error']) && $setReaction['error'] != ''){
       echo "Error: you forgot to put your name in. Or your email is not valid";
    }

    else {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube remake</title>
    <link rel="stylesheet" href="/web-weekopdracht-2-comment-video-nidjn246/assets/css/style.css">
    <div class="kaas">
</head>
<body id="Body">
<iframe width="560" height="315" src="https://www.youtube.com/embed/Oxq8yQAtJlE?si=lsfPl0grMnBLuXTd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>    
    <h2>Send a comment</h2>
<div>
    <div>

    <form action="" method="POST">
        
    Name: <input id="formfield" type="text" name="naam" value="">
        
    </div>
    
    <div>
        
        Email: <input id="formfield" type="text" name="email" value="">
    </div>
    </div>

    <textarea id = "formfield" name="commentaar" cols="26" rows="5"></textarea>
   <div>
    <input id="formfield" type="submit" value="Verstuur">
    </div>
    </form>

    <div id="commentword">
        <?php
    echo "Comments:"
  
?>

    </div>

    <div id="comments">
        <?php
    foreach($getReactions as $reaction){
    echo $reaction['name'] . ':<br>' . $reaction['message'] . "<br> <br>"; 
  }
?>
    </div>
    </div>
</body>
</div>
<?php

?>
</html>

<?php
$con->close();
?>
