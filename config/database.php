<?php
/**
 * Clase para la gestión de la conexión a la Base de Datos
 * PSR-12: La llave de apertura de la clase va en la línea siguiente.
 */
class Database
{
    // Propiedad privada para guardar la instancia de PDO
    private ?PDO $pdo = null;

    /**
     * Constructor de la clase
     * PSR-12: Visibilidad (public) siempre declarada.
     */
    public function __construct()
    {
        $envPath = APP_ROOT . '/env.local.php';

        if (!file_exists($envPath)) {
            $legacyPath = APP_ROOT . '/env.php';
            if (file_exists($legacyPath)) {
                $envPath = $legacyPath;
            } else {
                logger('No se encontró un archivo de configuración de base de datos.');
                die('Error interno del servidor.');
            }
        }

        $env = require $envPath;

        $dsn = "mysql:host=" . $env['DB_HOST'] . ";dbname=" . $env['DB_NAME'] . ";charset=" . $env['DB_CHARSET'];
        
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $env['DB_USER'], $env['DB_PASS'], $options);
        } catch (PDOException $e) {
            logger('Error de conexión a base de datos: ' . $e->getMessage());
            die("Error interno del servidor.");
        }
    }

    /**
     * Retorna la instancia de la conexión
     */
    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
