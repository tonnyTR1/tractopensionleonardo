<?php
//Sirve para obligar a PHP a que respete rigurosamente los tipos de datos 
// definidas estrictamente en las funciones.
declare(strict_types=1);
define('APP_ROOT', __DIR__);
define('APP_LOG_FILE', __DIR__ . '/logs/app.log');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

/**
 * Función global para escapar HTML y prevenir XSS.
 */
function e(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function logger(string $mensaje): void
{
    $logDirectory = dirname(APP_LOG_FILE);
    if (!is_dir($logDirectory)) {
        mkdir($logDirectory, 0775, true);
    }

    // Formateamos el mensaje con fecha, hora y un salto de línea (PHP_EOL)
    $fecha = date('Y-m-d H:i:s');
    $contenido = "[$fecha] " . $mensaje . PHP_EOL;

    // El parámetro '3' indica que escribiremos en un archivo específico
    error_log($contenido, 3, APP_LOG_FILE);
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function csrf_input(): string
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

function verify_csrf_token(): void
{
    $token = $_POST['csrf_token'] ?? '';
    if (!is_string($token) || !hash_equals(csrf_token(), $token)) {
        logger('Intento de solicitud con CSRF inválido.');
        abort(403, 'Solicitud no autorizada.');
    }
}

function redirect(string $location): void
{
    header('Location: ' . $location);
    exit;
}

function abort(int $statusCode, string $message = ''): void
{
    http_response_code($statusCode);

    switch ($statusCode) {
        case 403:
            echo $message !== '' ? e($message) : 'Acceso denegado.';
            break;
        case 404:
            require APP_ROOT . '/views/errors/404.php';
            break;
        default:
            require APP_ROOT . '/views/errors/500.php';
            break;
    }

    exit;
}
