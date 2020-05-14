   <?php
        mysql_connect ("localhost", "root","");//пишите свои настройки
        mysql_select_db("test") or die (mysql_error());//и свою бд
        mysql_query('SET character_set_database = utf8'); 
        mysql_query ("SET NAMES 'utf8'");
        error_reporting(E_ALL); 
        ini_set("display_errors", 1);
        if(isset($_POST['submit'])) {
        //проверяем, нет ли у нас пользователя с таким логином
        $query = mysql_query("SELECT COUNT(user_id) 
                FROM users WHERE 
                user_login='".mysql_real_escape_string($_POST['login'])."'");
        if(mysql_result($query, 0) > 0)  {
                        $error = "Пользователь с таким логином уже есть";
           }
                        // Если нет, то добавляем нового пользователя
          if(!isset($error) )   {
                $login = mysql_real_escape_string(trim(htmlspecialchars($_POST['login'])));
                // Убираем пробелы и хешируем пароль
                $password = md5(trim($_POST['password']));
                mysql_query("INSERT INTO users 
                SET user_login='".$login."', user_password='".$password."'");
                echo 'Вы успешно зарегистрировались с логином - '.$login;
                exit();
        }  else   {
        // если есть такой логин, то говорим об этом
                 echo $error;
                }
        }
        //по умолчанию данные будут отправляться на этот же файл
        print <<< html
        <form method="POST">
                Логин <input name="login" type="text"><br>
                Пароль <input name="password" type="password"><br>
                <input name="submit" type="submit" value="Зарегистрироваться">
        </form>
   html;
   ?>