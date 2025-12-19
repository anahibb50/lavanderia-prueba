# Enlace GIT
https://github.com/anahibb50/lavanderia-prueba.git

# 1. Tabla

**Nombre de la tabla:** pedidos

## Campos:

| Campo | Tipo | ¿Obligatorio? |
|-------|------|---------------|
| id | integer (auto-increment) | Sí |
| nombre_cliente | string (100) | Sí |
| telefono_cliente | string (10) | Sí |
| servicio | string | Sí |
| cantidad | integer | Sí |
| estado | string | Sí |
| created_at | timestamp | No |
| updated_at | timestamp | No |

# 2. Estados

En los estados dentro de la lavandería puse como predeterminados
1. Lavado
2. Listo
3. Recogido

En el estado también se encuentra el Eliminado pero este solo se pone al momento de eliminar

# 3. ¿Se puede eliminar registros?

Los registros de los pedidos de lavandería solo son borrados pero de manera lógica, es decir que solo se cambia el estado 
más no se eliminan de la base de datos

Esto se hace así debido a que en caso de que haya un reclamo se puede ver el pedido y corroborar la información en caso de reclamo

# 4. Reglas
Al momento de crear se crea por defecto en estado lavado ya que es la entrada del pedido, no se puede poner como listo u otro nombre
