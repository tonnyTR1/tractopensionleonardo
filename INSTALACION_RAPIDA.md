# ⚡ Instalación Rápida del CRUD

## Paso 1: Ejecutar SQL
Copia y ejecuta en tu gestor de BD:

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

## Paso 2: Acceder
```
http://localhost/tractopension/index.php?menu=apartarespacio
```

## ✅ Listo
El CRUD está funcional. Los siguientes archivos fueron creados/modificados:

```
✅ models/ApartarEspacio.php
✅ controllers/ApartarEspacio.php
✅ views/ApartarEspacioview.php
✅ api/apartados-espacios.php (API REST)
✅ public/assets/js/apartados-espacios.js (Utilidades JS)
✅ index.php (modificado)
✅ CRUD_DOCUMENTACION.md (documentación completa)
```

## 🎯 Operaciones Disponibles

- **CREATE** ➕ Crear nuevo espacio
- **READ** 📖 Ver todos los espacios
- **UPDATE** ✏️ Editar un espacio
- **DELETE** 🗑️ Eliminar un espacio

## 🔍 Características

- ✅ Interfaz moderna y responsive
- ✅ Validación de datos
- ✅ Protección CSRF
- ✅ Escapado de HTML (XSS)
- ✅ Prepared Statements (SQL Injection)
- ✅ Manejo de errores
- ✅ Generación automática de folios
- ✅ Estados personalizables
- ✅ Modal de confirmación
- ✅ Mensajes de éxito/error

## 🚀 Próximos Pasos

1. Personaliza los estados según tus necesidades
2. Agrega validaciones adicionales
3. Integra con emails
4. Implementa filtros de búsqueda
5. Agrega paginación

## 📖 Documentación Completa
Ver: `CRUD_DOCUMENTACION.md`

## 🆘 Problemas

Si la tabla no aparece:
1. Verifica conexión a BD
2. Revisa `logs/app.log`
3. Ejecuta el SQL manualmente

¡Listo para usar! 🎉
