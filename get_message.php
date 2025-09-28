<?php
// get_messages.php
include 'config.php';

$sql = "SELECT username, message, created_at FROM messages ORDER BY created_at ASC";
$result = mysqli_query($connect, $sql);

if (!$result) {
    die("Ошибка запроса: " . mysqli_error($connect));
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="message">';
        echo '<div class="message-header">';
        echo '<span class="username">' . htmlspecialchars($row['username']) . '</span>';
        echo '<span class="timestamp">' . date('H:i:s', strtotime($row['created_at'])) . '</span>';
        echo '</div>';
        echo '<div class="message-text">' . htmlspecialchars($row['message']) . '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="no-messages">Пока нет сообщений. Будьте первым!</div>';
}

mysqli_close($connect);
?>