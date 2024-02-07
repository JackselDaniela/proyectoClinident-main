# Insumo

- nombre
- descripción
- codigo
- elaboracion
- vencimiento
- serial
- tipo

# Carga

- codigo
- cantidad
- insumo_id
- usuario_id

# Salida

- cantidad
- paciente_diagnostico_id
- insumo_id


Insumo, es un insumo (duuh)

Carga sería lo que se registra cuando ingresan nuevos insumos

Salida es un tabla relacional que relaciona un insumo con un determinado tratamiento en el que se usa (en realidad la tabla serían paciente_diagnostico, a través de ella se relaciona con el tratamiento), además de poseer un campo para que la cantidad de dicho insumo que se usa
