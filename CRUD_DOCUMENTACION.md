# 📋 CRUD de Espacios Apartados - Tracto Pensión

## Descripción
CRUD completo (Create, Read, Update, Delete) para la gestión de espacios apartados en la aplicación Tracto Pensión. Implementado con arquitectura MVC siguiendo los estándares de seguridad y buenas prácticas.

---

## 🚀 Instalación

### 1. **Crear la tabla en la base de datos**

Ejecuta el siguiente SQL en tu gestor de base de datos (PHPMyAdmin, MySQL Workbench, etc.):

```sql
CREATE TABLE IF NOT EXISTS apartados_espacios (
    id_apartado INT AUTO_INCREMENT PRIMARY KEY,
    folio VARCHAR(20) NOT NULL UNIQUE,
    usuario_id INT NOT NULL,
    estado VARCHAR(50) NOT NULL DEFAULT 'en_espera',
    observaciones TEXT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

**O utiliza el archivo SQL:**
- Ubicación: `bases de datos/crear_tabla_espacios.sql`
- Importalo en tu gestor de BD

### 2. **Verificar archivos creados**

El CRUD incluye los siguientes archivos:

```
✅ models/ApartarEspacio.php          - Modelo con métodos CRUD
✅ controllers/ApartarEspacio.php     - Controlador de lógica
✅ views/ApartarEspacioview.php       - Vista con formulario e interfaz
✅ index.php (modificado)             - Carga del CRUD
✅ bases de datos/crear_tabla_espacios.sql - Script SQL
```

---

## 📚 Estructura del CRUD

### **Modelo** (`models/ApartarEspacio.php`)
Métodos disponibles:

```php
// Obtener todos los espacios
$model->getAll() : array

// Obtener un espacio por ID
$model->getById(int $id) : ?array

// Crear nuevo espacio
$model->create(array $data) : bool

// Actualizar espacio
$model->update(int $id, array $data) : bool

// Eliminar espacio
$model->delete(int $id) : bool

// Obtener siguiente folio
$model->getSiguienteFolio() : string
```

### **Controlador** (`controllers/ApartarEspacio.php`)
Métodos disponibles:

```php
// Obtener todos los espacios
$controller->obtenerTodos() : array

// Obtener por ID
$controller->obtenerPorId(int $id) : ?array

// Crear
$controller->crear(array $datos) : array

// Actualizar
$controller->actualizar(int $id, array $datos) : array

// Eliminar
$controller->eliminar(int $id) : array

// Procesar formulario POST
$controller->procesarFormulario() : void
```

---

## 🎨 Características de la Vista

### **Panel Izquierdo - Formulario**
- ✅ Crear nuevo espacio
- ✅ Editar espacio existente
- ✅ Generación automática de folio
- ✅ Selector de estados (En Espera, Confirmado, Cancelado, Completado)
- ✅ Campo de observaciones

### **Panel Derecho - Tabla**
- ✅ Listado de todos los espacios
- ✅ Mostrar estados con badges de colores
- ✅ Editar registros
- ✅ Eliminar con confirmación
- ✅ Mostrar fecha de creación

### **Mensajes y Alertas**
- ✅ Alertas de éxito/error
- ✅ Validación en cliente y servidor
- ✅ Protección CSRF

---

## 🔒 Seguridad

El CRUD implementa las siguientes medidas de seguridad:

1. **Validación CSRF**
   - Token CSRF en todos los formularios
   - Verificación antes de procesar cambios

2. **Escapado de HTML**
   - Función `e()` para prevenir XSS
   - Sanitización de datos en salidas

3. **Prepared Statements**
   - Uso de PDO preparadas
   - Prevención de inyección SQL

4. **Validación de datos**
   - Campos requeridos
   - Validaciones en controlador

---

## 💻 Uso

### **Acceder al CRUD**
```
http://tu-dominio.com/index.php?menu=apartarespacio
```

### **Crear nuevo espacio**
1. Completa el formulario de la izquierda
2. El folio se genera automáticamente
3. Selecciona un estado
4. Haz clic en "Guardar"

### **Editar un espacio**
1. Haz clic en el icono ✏️ (lápiz) en la tabla
2. Se cargará el formulario con los datos
3. Modifica los datos necesarios
4. Haz clic en "Actualizar"

### **Eliminar un espacio**
1. Haz clic en el icono 🗑️ (basura) en la tabla
2. Se abrirá un modal de confirmación
3. Confirma la eliminación

---

## 📊 Campos de la tabla

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id_apartado` | INT | ID único (PK, Auto-incremento) |
| `folio` | VARCHAR(20) | Folio único del apartado |
| `usuario_id` | INT | ID del usuario |
| `estado` | VARCHAR(50) | Estado actual (en_espera, confirmado, etc) |
| `observaciones` | TEXT | Notas adicionales |
| `fecha_creacion` | TIMESTAMP | Fecha de creación |
| `fecha_actualizacion` | TIMESTAMP | Última actualización |

---

## 📝 Estados disponibles

- 🔵 **en_espera** - Aguardando confirmación
- 🟡 **confirmado** - Confirmado
- 🟢 **completado** - Completado
- 🔴 **cancelado** - Cancelado

---

## 🐛 Solución de problemas

### Tabla no se crea
- Verifica la conexión a la base de datos en `config/database.php`
- Comprueba que el usuario de BD tenga permisos para crear tablas
- Ejecuta el SQL manualmente

### El formulario no guarda
- Verifica que el token CSRF sea correcto
- Comprueba los logs en `logs/app.log`
- Asegúrate de que la tabla está creada

### No aparecen los espacios guardados
- Actualiza la página (F5)
- Verifica en la BD con phpMyAdmin
- Revisa los logs de error

---

## 🔄 Flujo de datos

```
Usuario
  ↓
Vista (ApartarEspacioview.php)
  ↓
Controlador (ApartarEspacioController)
  ↓
Modelo (ApartarEspacioModel)
  ↓
Base de Datos (apartados_espacios)
  ↓
Respuesta al usuario
```

---

## 📱 Responsive Design

El CRUD es totalmente responsive:
- ✅ Tablet
- ✅ Mobile
- ✅ Desktop

---

## 🎯 Próximas mejoras sugeridas

1. Agregar paginación
2. Filtro por estado
3. Búsqueda por folio
4. Exportar a PDF/Excel
5. Historial de cambios
6. Adjuntar documentos
7. Notificaciones por correo
8. Validación más estricta

---

## 📞 Soporte

Para reportar problemas o sugerencias, revisa:
- Logs: `logs/app.log`
- Documentación: Este archivo
- Código comentado en los archivos

---

## 📄 Licencia

Tracto Pensión © 2026

Desarrollado para ITSSMT
