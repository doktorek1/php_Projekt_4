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

//strona logowania  

<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-12-08
 * Time: 20:58
 */
session_start();
$message = "";
if (!isset($_SESSION["user_name"])) {
    header('Location: logowanie.php');
} else {
    foreach ($_POST as $key => $value){
        $_SESSION[$key] = $value;
    }
}
?>

<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-12-08
 * Time: 20:58
 */
session_start();
$message = "";
if (!isset($_SESSION["user_name"])) {
    header('Location: logowanie.php');
} else {
    foreach ($_POST as $key => $value){
        $_SESSION[$key] = $value;
    }
}

?>

//ten kod przekierowuje na wersję mobilną

<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-12-09
 * Time: 09:26
 */
session_start();
$message = "";
if (count($_POST) > 0) {
    if ($_POST["userName"] == "student") {
        if ($_POST["password"] == "zet")
            $_SESSION["user_name"] = $_POST["userName"];
         else
            $message = "Niepoprawne hasło!";

    }
    else
        $message = "Niepoprawna nazwa użytkownika!";

}
if (isset($_SESSION["user_name"]))
    header('Location: mobile_form.php');
?>

//działania na zmiennych sesyjnych

<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-12-08
 * Time: 22:39
 */
session_start();

$_SESSION['imie'] = $_POST['firstname'];
$_SESSION['nazwisko'] = $_POST['surname'];
$_SESSION['data_urodzenia'] = $_POST['birth_date'];
$_SESSION['pesel'] = $_POST['pesel'];
$_SESSION['wiek'] = $_POST['age'];
$_SESSION['plec'] = $_POST['plec'];
$_SESSION['kierunek'] = $_POST['answer'];
$_SESSION['plik'] = $_POST['myFile'];
$_SESSION['komentarz'] = $_POST['tekst'];
header('Location: dane.php');

//oraz ich wypisywanie

     <?php

                session_start();
                echo "Imię: <b>" . $_SESSION['imie']."</b>";
                echo "<br />";
                echo "Nazwisko: <b>" . $_SESSION['nazwisko']."</b>";
                echo "<br />";
                echo "Data urodzenia: <b>" . $_SESSION['data_urodzenia']."</b>";
                echo "<br />";
                echo "PESEL: <b>" . $_SESSION['pesel']."</b>";
                echo "<br />";
                echo "Wiek: <b>" . $_SESSION['wiek']."</b>";
                echo "<br />";
                echo "Płeć: <b>" . $_SESSION['plec']."</b>";
                echo "<br />";
                echo "Kierunek: <b>" . $_SESSION['kierunek']."</b>";
                echo "<br />";
                echo "Plik: <b>" . $_SESSION['plik']."</b>";
                echo "<br />";
                echo "Tekst: <b>" . $_SESSION['komentarz']."</b>";
                echo "<br />";

                ?>
//skrypt dokonujący wylogowania

<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2014-12-08
 * Time: 22:01
 */

session_destroy();
session_start();
unset($_SESSION['user_name']);
$useragentt=$_SERVER['HTTP_USER_AGENT'];
if (stristr($useragentt, "windows ce") || stristr($useragentt, "mobile") ){
    $DEVICE_TYPE="MOBILNY";
}
if (isset($DEVICE_TYPE) && $DEVICE_TYPE=="MOBILNY"){
    header('Location: mobilna.php');
    exit;
} else {
    header("Location: logowanie.php");
    exit;
}
?>
