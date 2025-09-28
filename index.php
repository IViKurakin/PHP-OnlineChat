<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Online Chat P311</title>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <h1>Чат группы П311</h1>
        </div>
        <div class="chat-messages" id="chatMessages">
            <!-- Блок приёма сообщений (стенка) -->
            <?php include 'get_message.php'; ?>
        </div>
        <div class="chat-input">
            <!-- Форма для отправки сообщений -->
            <form method="POST" action="send_message.php" id="messageForm">
                <input type="text" name="username" placeholder="Укажите ваше имя" required>
                <textarea name="message" placeholder="Введите сюда своё сообщение" required></textarea>
                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>

    <script>
        // Автообновление каждые 2 сек.
        setInterval(function() {
        let chatMessages = document.getElementById('chatMessages');
        let xhr = new XMLHttpRequest();
        xhr.open('GET','get_message.php',true);
        xhr.onload = function() {
            if (xhr.status == 200) {
                chatMessages.innerHTML = xhr.responseText;
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        }
        xhr.send();
        }, 2000);
        // Автопрокрутка к новым сообщениям
        document.getElementById('chatMessages').scrollTop = document.getElementById('chatMessages').scrollHeight;
    </script>

</body>
</html>