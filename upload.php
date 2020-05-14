<?php
   // Конфигурация
      $allowed_filetypes = array('.jpg','.gif','.bmp','.png', '.docx', 'jpeg', 'webp',); // разрешенные типы файлов
      $max_filesize = 524288; // максимальный размер файла в байтах (0.5MB).
      $upload_path = "C:\\Apache24\htdocs\\"; // папка для загрузки файлов на сервере (папка 'files').
 
   $filename = $_FILES['userfile']['name']; // получить имя файла с расширением.
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // получить расширение файла.
 
   // проверить допустимость файла, если не разрешено, то вызвать функцию DIE и вывести сообщение пользователю.
   if(!in_array($ext,$allowed_filetypes))
       die('Вы пытаетесь загрузить неразрешенный тип файла.');
 
   // проверка размера файла, если превышает, то DIE и сообщение пользователю.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
      die('Вы пытаетесь загрузить слишком большой файл.');
 
   // проверка возможности загрузки в указанный каталог, если нет, то DIE и информация юзеру.
   if(!is_writable($upload_path))
      die('Вы не можете загрузить в указанную папку; смените CHMOD на 777.');
 
   // загрузка файла в указанную папку.
   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename)) 
         echo 'Ваш файл успешно загружен. Вернуться ' ?> <a href='web_console.php'> назад </a> <?php  ; 

?>