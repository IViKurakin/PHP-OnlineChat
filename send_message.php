<?php
// send_message.php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $message = trim($_POST['message']);
    
    // Базовая валидация
    if (!empty($username) && !empty($message)) {
        // Защита от XSS
        $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
        
        // Подготовка запроса
        $sql = "INSERT INTO messages (username, message) VALUES (?, ?)";
        $stmt = mysqli_prepare($connect, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $username, $message);
            
            if (mysqli_stmt_execute($stmt)) {
                // Сообщение успешно отправлено
            } else {
                echo "Ошибка: " . mysqli_error($connect);
            }
            
            mysqli_stmt_close($stmt);
        }
    }
}

// Перенаправление обратно на главную страницу
header('Location: index.php');
exit();
?>