<?php
require_once __DIR__ . '/../core/Database.php';

class Auto {
    private const NOMBRE_CLASE = 'Auto';
    
    public $Id;
    public $Marca;
    public $Modelo;
    public $Rodado;
    public $CantidadCambios;
    public $Color;
    public $Precio;

    public function __construct() {
        // Constructor vacío para que FETCH_CLASS funcione correctamente
    }

    /**
     * Obtener todas las personas desde la BD
     * Usando FETCH_CLASS para mapear automáticamente a objetos Persona (ORM)
     */
    public static function obtenerTodas() {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT Id, Marca, Modelo, Rodado, CantidadCambios, Color, Precio FROM autos ORDER BY id DESC');
            $stmt->execute();
            
            // PDO mapea automáticamente las columnas a las propiedades de la clase
            return $stmt->fetchAll(PDO::FETCH_CLASS, self::NOMBRE_CLASE);
        } catch (PDOException $e) {
            error_log("Error al obtener autos: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtener una persona por ID
     * Usando FETCH_CLASS para mapear automáticamente a objeto Persona (ORM)
     */
    public static function obtenerPorId($Id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT Id, Marca, Modelo, Rodado, CantidadCambios, Color, Precio FROM autos WHERE id = :id');
            $stmt->execute([':id' => $Id]);
            
            // PDO mapea automáticamente las columnas a las propiedades de la clase
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::NOMBRE_CLASE);
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Error al obtener auto: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Agregar una nueva persona
     */
    public static function agregar($Marca, $Modelo, $Rodado, $CantidadCambios, $Color, $Precio) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('INSERT INTO autos (Marca, Modelo, Rodado, CantidadCambios, Color, Precio) VALUES (:marca, :modelo, :rodado, :cantidadCambios, :color, :precio)');
            
            return $stmt->execute([
                ':marca' => $marca,
                ':rodado' => $rodado,
                ':cantidadCambios' => $cantidadCambios,
                ':color' => $color,
                ':precio' => $precio
            ]);
        } catch (PDOException $e) {
            error_log("Error al agregar auto: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Editar una persona existente
     */
    public static function editar($Id, $Marca, $Rodado, $CantidadCambios, $Color, $Precio) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('UPDATE autos SET marca = :marca, modelo = :modelo, rodado = :rodado, rodado = :cantidadCambios = cantidadCambios, color = :color, precio = :precio WHERE id = :id');
            
            return $stmt->execute([
                 ':marca' => $marca,
                ':rodado' => $rodado,
                ':cantidadCambios' => $cantidadCambios,
                ':color' => $color,
                ':precio' => $precio
            ]);
        } catch (PDOException $e) {
            error_log("Error al editar auto: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Eliminar una persona
     */
    public static function eliminar($id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('DELETE FROM autos WHERE id = :id');
            
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log("Error al eliminar auto: " . $e->getMessage());
            return false;
        }
    }
}
?>
