# web-services
An API endpoint is a digital location where an API receives requests about a specific resource on its server. In APIs, an endpoint is typically a uniform resource locator (URL) that provides the location of a resource on the server.

# endPoints
Es necesario definir cada endpoint para cada tabla (todas las que tengas que consumas una api).

Los endpoins llevan una estrcutuctura definida de ulr por 2 palabras:
- [api](#api).
- [version (v-1, v-2, etc)](#version (v-1, v-2, etc)).

Es importante que las url que consuman api esten conformadas por estas premisas, como parte de la estructura para consumir apis de forma correcta.

```plain
                  http://www.myapi.com/api/v-1/<endopoint>
```

<!--EndPoint para Tareas-->
En este caso para la tabla de tareas quedaria algo asi:
```plain
-GET    - > http://www.myapi.com/api/v-1/tareas (obtener todas las tareas)
-GET    - > http://www.myapi.com/api/v-1/tareas/byid/{id} (obtener tareas por id)
-GET    - > http://www.myapi.com/api/v-1/tareas/byuser/{idUser} (obtener tareas por usuario)
-POST   - > http://www.myapi.com/api/v-1/tareas (registrar tareas)
-PUT    - > http://www.myapi.com/api/v-1/tareas/{id} (modificar una tarea espeficica)
-DELETE - > http://www.myapi.com/api/v-1/tareas/{id} (eliminar una tarea especifica)
```

<!--EndPoint para Tareas-->
Para la tabla de usuarios quedaria  asi:
```plain
-GET    - > http://www.myapi.com/api/v-1/usuarios (obtener todas los usuarios)
-GET    - > http://www.myapi.com/api/v-1/usuarios/byid/{id} (obtener usuarios por id)
-POST   - > http://www.myapi.com/api/v-1/usuarios (registrar usuarios)
-PUT    - > http://www.myapi.com/api/v-1/usuarios/{id} (modificar una usuario espeficico)
-DELETE - > http://www.myapi.com/api/v-1/usuarios/{id} (eliminar una usuario especifico)
```
