# Gestión de Insumos:

Consiste en el manejo del inventario de los insumos e equipos utilizados en la clinica.

Deben registrarse los diferentes insumos que utiliza la clinica, y debe haber un inventario de insumos. Se plantea un CRUD de insumos.

La salida de los insumos del inventario se produce cuando un tratamiento pasa de "En espera" a "En proceso" o "Terminado". Al momento de cambiar el estado se selecciona cuales insumos se utilizarán, la cantidad de cada uno, y se "gastan" dichos insumos.

La entrada de los insumos se realiza mediante la pagina de inventario, simplemente seleccionando el insumo que está ingresando, y la cantidad que ingresa. Se plantea un CRUD de "inventario".

También deben registrarse los equipos, se plantea un CRUD de equipos, y compartirá inventario con los insumos.

La entrada de equipos médicos se produce igual que los insumos, en la página de inventario seleccionando equipos y cantidad que ingresa.

La salida de equipos del inventario es temporal. Cuando un tratamiento requiera de ciertos equipos, se deben marcar estos "En uso". Dichos equipos también deberán marcarse como "Disponibles" nuevamente después, y serán reintegrados al inventario.

También se enviarán notificaciones a los usuarios cuando haya bajo stock de algún insumo o equipo.
