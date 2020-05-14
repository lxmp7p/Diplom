<?php
    //сайты зачастую пишут в кодировке Unicode
    header("Content-type: text/html; charset=cp1251"); //задаем кодировку имен файлов, наш файл должен быть сохранен в той же, для облегчения

    $myname = 'manage.php'; //имя этого файла

    function find_and_replace($dir,$showfiles) {
      $new_dir = null;
      $dir_files = opendir($dir);
      while(false !== ($file = readdir($dir_files))) {
        if($file != '.' && $file != '..')
        $new_dir[] = $dir."/".$file;
      }
      if($new_dir) {
        foreach($new_dir as $check ) {
           $bn = basename($check).PHP_EOL; //получаю имя файла или папки
           if(($showfiles) && (is_file($check))) {
             echo '<li><a href="'.$myname.'?file='.$check.'">'.$bn.'</a>&nbsp;';
             echo date('Y-m-d',filemtime($check)).'&nbsp;';
             echo '<a href="'.$myname.'?file='.$check.'&action=delete" title="Удалить">X</a>';
             echo '</li>';
           }
           elseif(is_dir($check)) {
             echo '<li><a href="'.$myname.'?file='.$check.'">'.$bn.'</a>&nbsp;&nbsp;';
             echo '<a href="'.$myname.'?file='.$check.'&action=delete" title="Удалить">X</a>';
             echo '</li>';
             echo '<ul>';
             find_and_replace($check,$showfiles);
             echo '</ul>';
           }
        }
      }
    }

    $fp = dirname($_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF'].'/'); //путь к нашему файлу
    //какой файл
    if (array_key_exists("file", $_REQUEST))
     $file = $_REQUEST["file"];
      else $file = $fp;

    //что делать будем
    if (array_key_exists("action", $_REQUEST))
     $action = $_REQUEST["action"];
      else $action = 'show';

    echo '<a href="'.$myname.'">В НАЧАЛО</a><p>';
    echo '<a href="'.$myname.'?file='.((array_key_exists("file", $_REQUEST))?dirname($file):$file).'">ВВЕРХ</a><p>';

    if ($action == 'show') {
       if (file_exists($file)) {
            if (is_file($file)) {
            $contents=file_get_contents($file);
              $contents=nl2br(htmlspecialchars($contents));
            echo $contents; //выводим содержание
         } else { //иначе выводим содержимое папки и её подпапок
            echo '<ul>';
            find_and_replace($file,true);
            echo '</ul>';
         }
       } else {
         die($file.' не найдено!');
       }
    } else if ($action == 'delete') {
       if (file_exists($file)) {
            if (is_file($file)) {
              if (unlink($file)) echo 'Файл '.$file.' удален!';
            }
         else {
           if (deleteDir($file)) echo 'Дирректория '.$file.' удалена!';
           }
       } else {
         die('Файл '.$file.' не найден!');
       }
    }

 //удаляет папку со всем содержимым
 function deleteDir($dir) {
   if (substr($dir, strlen($dir)-1, 1) != '/')
       $dir .= '/';

   if ($handle = opendir($dir)) {
       while ($obj = readdir($handle)) {
           if ($obj != '.' && $obj != '..') {
               if (is_dir($dir.$obj)) {
                   if (!deleteDir($dir.$obj))
                      return false;
               }
               elseif (is_file($dir.$obj)) {
                   if (!unlink($dir.$obj))
                       return false;
               }
           }
       }
       closedir($handle);
       if (!@rmdir($dir))
           return false;
       return true;
   }
   return false;
 }
?>