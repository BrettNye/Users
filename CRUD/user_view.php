<?php
    require_once('./header.php');
?>  

<?php
    require_once('./user/user.php');

    $user = new user();
    $user->getUserByID(1);

    echo $user->getUsername();
    echo "<br />";
    echo $user->getFirstName();
    echo "<br />";
    echo $user->getLastName();
?>

<?php
    require_once('./footer.php');
?>  