<?php

namespace App\Exports\Sheets;

use App\Models\Minuta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MinutaPorComidaSheet implements FromCollection, WithTitle, WithHeadings
{

	private $comida;
	private $id_minuta;

	public function __construct($comida, $id_minuta) {
		$this->comida = $comida;
		$this->id_minuta = $id_minuta;
	}


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->comida['alimentos']);
    }

    public function title(): string {
        return $this->comida['nombre'];
    }

    public function headings(): array {
        return [
        	'#',
           	'nombre',
            'grupo',
            'subgrupo',
            'porcentaje_perdida',
            'origen',
            'gramos',
            'porcion',
            'humedad',
            'energía',
            'proteinas',
            'carbohidratos',
            'grasas_totales',
            'fibra',
            'a_grasos_sat',
            'a_grasos_monosat',
            'a_grasos_polisat',
            'a_g_omega6',
            'a_g_omega3',
            'a_g_trans',
            'colesterol',
            'tiamina',
            'riboflavina',
            'niacina',
            'vit_b6',
            'vit_b12',
            'acido_folico',
            'acido_pantotenico',
            'biotina',
            'vit_c',
            'vit_a',
            'vit_e',
            'vit_d',
            'vit_k',
            'calsio',
            'fosforo',
            'hierro',
            'sodio',
            'potasio',
            'magnecio',
            'yodo',
            'zinc',
            'manganeso',
            'selenio',
            'cobre',
        ];
    }
}
