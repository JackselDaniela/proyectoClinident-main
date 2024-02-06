<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use App\Models\pieza;




class PiezaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pieza::create([
            'nom_pieza'      => 'p11',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Incisivo',
            'imagen'           => 'assets/img/boca/piezas/11pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/11.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/11.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p12',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Incisivo',
            'imagen'           => 'assets/img/boca/piezas/12pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/12.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/12.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p13',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Canino',
            'imagen'           => 'assets/img/boca/piezas/13pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/13.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/13.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p14',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Premolar',
            'imagen'           => 'assets/img/boca/piezas/14pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/14.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/14.png',

        ]);
        pieza::create([
            'nom_pieza'         => 'p15',
            'ubicacion'         => 'Maxilar Superior',
            'tipo'              => 'Premolar',
            'imagen'            => 'assets/img/boca/piezas/15pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/15.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/15.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p16',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Molar',
            'imagen'           => 'assets/img/boca/piezas/16pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/16.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/16.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p17',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Molar',
            'imagen'           => 'assets/img/boca/piezas/17pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/17.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/17.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p18',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Molar',
            'imagen'           => 'assets/img/boca/piezas/18pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/18.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/18.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p21',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Incisivo',
            'imagen'           => 'assets/img/boca/piezas/21pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/21.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/21.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p22',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Incisivo',
            'imagen'           => 'assets/img/boca/piezas/22pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/22.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/22.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p23',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Canino',
            'imagen'           => 'assets/img/boca/piezas/23pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/23.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/23.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p24',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Premolar',
            'imagen'           => 'assets/img/boca/piezas/24pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/24.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/24.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p25',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Premolar',
            'imagen'           => 'assets/img/boca/piezas/25pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/25.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/25.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p26',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Molar',
            'imagen'           => 'assets/img/boca/piezas/26pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/26.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/26.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p27',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Molar',
            'imagen'           => 'assets/img/boca/piezas/27pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/27.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/27.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p28',
            'ubicacion'      => 'Maxilar Superior',
            'tipo'           => 'Molar',
            'imagen'           => 'assets/img/boca/piezas/28pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/28.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/28.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p31',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Incisivo',
            'imagen'           => 'assets/img/boca/piezas/31pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/31.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/31.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p32',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Incisivo',
            'imagen'           => 'assets/img/boca/piezas/32pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/32.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/32.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p33',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Canino',
            'imagen'           => 'assets/img/boca/piezas/33pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/33.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/33.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p34',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Premolar',
            'imagen'           => 'assets/img/boca/piezas/34pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/34.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/34.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p35',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Premolar',
            'imagen'           => 'assets/img/boca/piezas/35pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/35.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/35.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p36',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Molar',
            'imagen'           => 'assets/img/boca/piezas/36pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/36.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/36.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p37',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Molar',
            'imagen'           => 'assets/img/boca/piezas/37pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/37.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/37.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p38',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Molar',
            'imagen'           => 'assets/img/boca/piezas/38pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/38.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/38.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p41',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Incisivo',
            'imagen'           => 'assets/img/boca/piezas/41pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/41.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/41.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p42',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Incisivo',
            'imagen'           => 'assets/img/boca/piezas/42pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/42.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/42.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p43',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Canino',
            'imagen'           => 'assets/img/boca/piezas/43pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/43.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/43.png',
        ]);
        pieza::create([
            'nom_pieza'      => 'p44',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Premolar',
            'imagen'           => 'assets/img/boca/piezas/44pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/44.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/44.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p45',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Premolar',
            'imagen'           => 'assets/img/boca/piezas/45pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/45.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/45.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p46',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Molar',
            'imagen'           => 'assets/img/boca/piezas/46pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/46.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/46.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p47',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Molar',
            'imagen'           => 'assets/img/boca/piezas/47pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/47.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/47.png',

        ]);
        pieza::create([
            'nom_pieza'      => 'p48',
            'ubicacion'      => 'Maxilar Inferior',
            'tipo'           => 'Molar',
            'imagen'           => 'assets/img/boca/piezas/48pieza.png',
            'imagenT'           => 'assets/img/boca/piezasProceso/1x/48.png',
            'imagenF'           => 'assets/img/boca/piezasFaltantes/1x/48.png',

        ]);
    }
}
