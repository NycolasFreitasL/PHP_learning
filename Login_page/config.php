<?php
// Dados do banco
$host = 'localhost';      // servidor do banco
$db   = "usuarios_db";      // nome do banco
$user = 'root';           // usuário do MySQL
$pass = '';               // senha do MySQL

// DSN (Data Source Name) - é a “string de conexão”
$dsn = "mysql:host=$host;dbname=$db";

// Opções de conexão seguras
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // mostra erros do banco
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // retorna resultados como array associativo
    PDO::ATTR_EMULATE_PREPARES   => false,                  // evita SQL Injection
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo "Conexão realizada com sucesso!";
} catch (\PDOException $e) {
    // Se der erro, o script para e mostra a mensagem
    die("Falha na conexão: " . $e->getMessage());
}
?>
