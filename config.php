<!-- Конфигурация соединения с базой данных -->
 <?php
 // Конфигурационные переменные:
 $host = 'localhost';
 $login = 'root';
 $password = '';
 $database = 'Chat311';
 // Создание соединения:
 $connect = mysqli_connect($host, $login, $password, $database);
 // Проверка соединения:
 if (!$connect) {
    die("Ошибка соединения: ".mysqli_connect_error());
 }
 ?>

