# Gestión de insumos:

Consiste en el manejo del invetario de los insumos utilizados en la clinica.

Deben registrarse los diferentes insumos que utiliza la clinica, y debe manejarse el inventario de cada insumo por separado. Se plantea un CRUD de insumos.

Existen dos tipos de insumos: consumibles y no consumibles (recuerdame la palabra xd). 

La salida de los insumos del inventario se produce cuando un tratamiento pasa de "En espera" a "En proceso". Al momento de registrar el tratamiento se selecciona cuales insumos se utilizarán en que cantidad cada uno, y tras el cambio de estado se "gastan" dichos insumos.

El "gasto" de los insumos depende de su tipo. En el caso de consumibles, el gasto es permanente, y deben reponerse los insumos. Por otro lado, los insumos no consumibles salen del inventario temporalmente cuando son usados en un tratamiento, y cuando dicho tratamiento se marca como "Terminado", vuelven a ser integrados al inventario.

Por otro lado, la entrada de los insumos se realiza mediante la pagina de inventario, simplemente seleccionando el insumo que está ingresando, y la cantidad que ingresa. Se plantea un CRUD de "inventario".
