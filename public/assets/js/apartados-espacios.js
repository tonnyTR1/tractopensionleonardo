/**
 * Utilidades para el CRUD de Espacios Apartados
 * Uso: Facilita operaciones AJAX sin recargar la página
 */

class ApartarEspacioCRUD {
    constructor(baseUrl = '/') {
        this.baseUrl = baseUrl;
        this.apiUrl = baseUrl + 'api/apartados-espacios.php';
    }

    /**
     * Obtener todos los espacios
     */
    async obtenerTodos() {
        try {
            const response = await fetch(this.apiUrl + '?action=getAll');
            return await response.json();
        } catch (error) {
            console.error('Error al obtener espacios:', error);
            return { success: false, error: error.message };
        }
    }

    /**
     * Obtener un espacio por ID
     */
    async obtenerPorId(id) {
        try {
            const response = await fetch(this.apiUrl + '?action=getById&id=' + id);
            return await response.json();
        } catch (error) {
            console.error('Error al obtener espacio:', error);
            return { success: false, error: error.message };
        }
    }

    /**
     * Crear nuevo espacio
     */
    async crear(datos) {
        try {
            const response = await fetch(this.apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'create',
                    data: datos
                })
            });
            return await response.json();
        } catch (error) {
            console.error('Error al crear:', error);
            return { success: false, error: error.message };
        }
    }

    /**
     * Actualizar espacio
     */
    async actualizar(id, datos) {
        try {
            const response = await fetch(this.apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'update',
                    id: id,
                    data: datos
                })
            });
            return await response.json();
        } catch (error) {
            console.error('Error al actualizar:', error);
            return { success: false, error: error.message };
        }
    }

    /**
     * Eliminar espacio
     */
    async eliminar(id) {
        try {
            const response = await fetch(this.apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'delete',
                    id: id
                })
            });
            return await response.json();
        } catch (error) {
            console.error('Error al eliminar:', error);
            return { success: false, error: error.message };
        }
    }

    /**
     * Obtener siguiente folio
     */
    async getSiguienteFolio() {
        try {
            const response = await fetch(this.apiUrl + '?action=getSiguienteFolio');
            const data = await response.json();
            return data.folio || '#0001';
        } catch (error) {
            console.error('Error al obtener folio:', error);
            return '#0001';
        }
    }

    /**
     * Buscar espacios por estado
     */
    async buscarPorEstado(estado) {
        try {
            const response = await fetch(this.apiUrl + '?action=searchByStatus&status=' + estado);
            return await response.json();
        } catch (error) {
            console.error('Error al buscar:', error);
            return { success: false, error: error.message };
        }
    }
}

// Ejemplo de uso:
/*
const crud = new ApartarEspacioCRUD('/tracto-pension/');

// Obtener todos
crud.obtenerTodos().then(data => {
    console.log('Espacios:', data);
});

// Crear
crud.crear({
    folio: '#0001',
    usuario_id: 1,
    estado: 'en_espera',
    observaciones: 'Test'
}).then(result => {
    console.log('Resultado:', result);
});

// Actualizar
crud.actualizar(1, {
    estado: 'confirmado',
    observaciones: 'Actualizado'
}).then(result => {
    console.log('Actualizado:', result);
});

// Eliminar
crud.eliminar(1).then(result => {
    console.log('Eliminado:', result);
});
*/
