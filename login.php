<?php
require("secure.php");
require("who.php");
session_start(); //��������� ������
$mes = "Enter login & pass";
$page = $_POST["page"];

/**
 * ����� ��� �����������
 * @author ������ ������ ox2.ru
 */
class AuthClass {
    private $_login = "admin"; //������������� �����
    private $_password = "08970102"; //������������� ������

    /**
     * ���������, ����������� ������������ ��� ���
     * ���������� true ���� �����������, ����� false
     * @return boolean
     */
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //���� ������ ����������
            return $_SESSION["is_auth"]; //���������� �������� ���������� ������ is_auth (������ true ���� �����������, false ���� �� �����������)
        }
        else return false; //������������ �� �����������, �.�. ���������� is_auth �� �������
    }

    /**
     * ����������� ������������
     * @param string $login
     * @param string $passwors
     */
    public function auth($login, $passwors) {
        if ($login == $this->_login && $passwors == $this->_password) { //���� ����� � ������ ������� ���������
            $_SESSION["is_auth"] = true; //������ ������������ ��������������
            $_SESSION["login"] = $login; //���������� � ������ ����� ������������
            return true;
        }
        else { //����� � ������ �� �������
            $_SESSION["is_auth"] = false;
            return false;
        }
    }

    /**
     * ����� ���������� ����� ��������������� ������������
     */
    public function getLogin() {
        if ($this->isAuth()) { //���� ������������ �����������
            return $_SESSION["login"]; //���������� �����, ������� ������� � ������
        }
    }


    public function out() {
        $_SESSION = array(); //������� ������
        session_destroy(); //����������
    }
}

$auth = new AuthClass();

if (isset($_POST["login"]) && isset($_POST["password"])) { //���� ����� � ������ ���� ����������
    if (!$auth->auth($_POST["login"], $_POST["password"])) { //���� ����� � ������ ������ �� ���������
        //echo "Invalid password!";
        require("whobad.php");//запись плохих паролей в ipbad.txt
        $mes = "Invalid password";//сообщение для странички
        $conf = AttCount($conf);

        WriteConfigAttack($conf);
    }
}



if (isset($_GET["is_exit"])) { //���� ������ ������ ������
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //�������
        header("Location: ?is_exit=0"); //�������� ����� ������
    }
}

?>

<?php 
if ($auth->isAuth()) { // ���� ������������ �����������, ������������:  
    
   //Открываем нужную страничку 
    if ($page == "t1")
    {
        
        include('test.php');
        
        echo "Hello, " . $auth->getLogin() ;
        echo "<br/><br/><a href='?is_exit=1'>Logout</a>"; //���������� ������ ������
    }
    else if ($page == "t2")
    {
        include('test2.php');
        
        echo "Hello, " . $auth->getLogin() ;
        echo "<br/><br/><a href='?is_exit=1'>Logout</a>";
    }
    else
    {
        echo "Not found";
        echo "<br/><br/><a href='?is_exit=1'>Logout</a>";
        var_dump($_POST["page"]);
    }
//$homepage = file_get_contents('index.php');
//echo $homepage;
} 
else { //���� �� �����������, ���������� ����� ����� ������ � ������
?>

    <link rel="stylesheet" href="st.css" type="text/css"/>
    <div id="login">
        <form action="" method="post">
            <h1>[ <?php echo $mes ?> ]</h1>
            <input name="login" type="text" placeholder="username" value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // ��������� ���� �� ��������� ?>"/>
            <input name="password" type="password" placeholder="passcode" />
            <select class="btn" name="page" id="selectID">

<option value="t1">Test1</option>

<option value="t2">Test2</option>

<option value="t3">Test3</option>

</select>
            <input class="btn"  type="submit" value="OK"/>

        </form>
    </div>
    <div id="credit">
        <a href="">&copy;</a>
    </div>

<?php 
} 
?>