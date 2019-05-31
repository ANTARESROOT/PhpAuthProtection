<?php
require("secure.php");
session_start(); //Запускаем сессии
 
/** 
 * Класс для авторизации
 * @author дизайн студия ox2.ru 
 */ 
class AuthClass {
    private $_login = "admin"; //Устанавливаем логин
    private $_password = "08970102"; //Устанавливаем пароль
 
    /**
     * Проверяет, авторизован пользователь или нет
     * Возвращает true если авторизован, иначе false
     * @return boolean 
     */
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //Если сессия существует
            return $_SESSION["is_auth"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
        }
        else return false; //Пользователь не авторизован, т.к. переменная is_auth не создана
    }
     
    /**
     * Авторизация пользователя
     * @param string $login
     * @param string $passwors 
     */
    public function auth($login, $passwors) {
        if ($login == $this->_login && $passwors == $this->_password) { //Если логин и пароль введены правильно
            $_SESSION["is_auth"] = true; //Делаем пользователя авторизованным
            $_SESSION["login"] = $login; //Записываем в сессию логин пользователя
            return true;
        }
        else { //Логин и пароль не подошел
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }
     
    /**
     * Метод возвращает логин авторизованного пользователя 
     */
    public function getLogin() {
        if ($this->isAuth()) { //Если пользователь авторизован
            return $_SESSION["login"]; //Возвращаем логин, который записан в сессию
        }
    }
     
     
    public function out() {
        $_SESSION = array(); //Очищаем сессию
        session_destroy(); //Уничтожаем
    }
}
 
$auth = new AuthClass();
 
if (isset($_POST["login"]) && isset($_POST["password"])) { //Если логин и пароль были отправлены
    if (!$auth->auth($_POST["login"], $_POST["password"])) { //Если логин и пароль введен не правильно
        echo "Invalid password!";
$conf = AttCount($conf);

WriteConfigAttack($conf);
    }
}
 
if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //Выходим
        header("Location: ?is_exit=0"); //Редирект после выхода
    }
}
 
?>

<?php 
if ($auth->isAuth()) { // Если пользователь авторизован, приветствуем:  
    
include('strah.php');
echo "Hello, " . $auth->getLogin() ;
    echo "<br/><br/><a href='?is_exit=1'>Logout</a>"; //Показываем кнопку выхода
//$homepage = file_get_contents('index.php');
//echo $homepage;
} 
else { //Если не авторизован, показываем форму ввода логина и пароля
?>

<form method="post" action="">
    Login: <input type="text" name="login"
    value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // Заполняем поле по умолчанию ?>" />
    <br/>
    Passwd: <input type="password" name="password" value="" /><br/>
    <input type="submit" value="OK" />
</form>

<?php 
} 
?>