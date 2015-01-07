//index.php
<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-12-09
 * Time: 09:50
 */
$useragentt=$_SERVER['HTTP_USER_AGENT'];
if (stristr($useragentt, "windows ce") || stristr($useragentt, "mobile") ){
    $DEVICE_TYPE="MOBILNY";
}
if (isset($DEVICE_TYPE) && $DEVICE_TYPE=="MOBILNY"){
    header('Location: mobilna.php');
    exit;
} else{
    header('Location: logowanie.php');
    exit;
}
?>

//kod odpowiadający za przekierowanie po logowaniu

<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-12-08
 * Time: 20:13
 */
session_start();
$message = "";
if (count($_POST) > 0) {
    if ($_POST["userName"] == "student") {
        if ($_POST["password"] == "zet") {
            $_SESSION["user_name"] = $_POST["userName"];
        } else {
            $message = "Niepoprawne hasło!";
        }
    } else {
        $message = "Niepoprawna nazwa użytkownika!";
    }
}
if (isset($_SESSION["user_name"])) {
    header('Location: formularz.php');
}

?>
