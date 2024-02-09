<?php

namespace Database\Seeders;

use App\Models\Consumo;
use App\Models\diagnostico;
use App\Models\estatus_tratamiento;
use App\Models\Operacion;
use App\Models\paciente;
use App\Models\paciente_diagnostico;
use App\Models\pieza;
use App\Models\registrar_tratamiento;
use App\Models\Insumo;
use Illuminate\Database\Seeder;

class ConsumoSeeder extends Seeder
{
    public $datos;
    public $insumos;

    public function __construct()
    {
        $this->insumos = Insumo::where('tipo', 'Consumible')->get();

        $this->datos = [
            'pacientes_id' => paciente::first()->id,
            'diagnosticos_id' => diagnostico::first()->id,
            'piezas_id' => pieza::first()->id,
            'registrar_tratamientos_id' => registrar_tratamiento::first()->id,
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proceso = $this->crearDiagnostico('En Proceso');
        $terminado = $this->crearDiagnostico('Terminado');

        $this->crearConsumos($proceso);
        $this->crearConsumos($terminado);
    }

    public function crearDiagnostico(string $estatus): paciente_diagnostico
    {
        $id = estatus_tratamiento::firstWhere('estatus', $estatus)->id;

        return paciente_diagnostico::create([
            ...$this->datos,
            'estatus_tratamientos_id' => $id,
        ]);
    }

    public function crearConsumos(paciente_diagnostico $diagnostico): void
    {
        $this->insumos->map(function ($insumo) use ($diagnostico) {
            $operacion = Operacion::create([
                'cantidad' => -3,
                'insumo_id' => $insumo->id,
            ]);

            Consumo::create([
                'paciente_diagnostico_id' => $diagnostico->id,
                'operacion_id' => $operacion->id,
            ]);
        });
    }
}
