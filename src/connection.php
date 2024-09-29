<?php
function execute($sql_str){
    $servername = "mysql-db"; // Имя контейнера с MySQL
    $username = "testuser";   // Имя пользователя MySQL
    $password = "testpassword"; // Пароль пользователя
    $dbname = "testdb";        // Имя базы данных
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Установим режим ошибки PDO на исключение
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $stmt = $conn->prepare($sql_str);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// $stmt = $pdo->prepare('SELECT id, name, parent_id FROM categories');
// $stmt->execute();
// $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
