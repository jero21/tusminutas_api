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
    private $custom_head;

	public function __construct($comida, $id_minuta) {
		$this->comida = $comida;
		$this->id_minuta = $id_minuta;
        $this->custom_head = [
            'id',
            'nombre',
            'grupo',
            'subgrupo',
            'porcentaje_perdida',
            'origen',
            'gramos',
            'porcion',
            'humedad',
            'energia',
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
            'calcio',
            'fosforo',
            'hierro',
            'sodio',
            'potasio',
            'magnesio',
            'yodo',
            'zinc',
            'manganeso',
            'selenio',
            'cobre',
        ];
	}


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        foreach($this->comida['alimentos'] as $comida_alimento) {
            $alimentos = [];
            foreach($this->custom_head as $custom) {
                logger($custom);
                $property = [
                    $custom => $comida_alimento[$custom]
                ];
                $alimentos[] = $property;
            }

            $comida_alimento = $alimentos;

        }
        return collect($this->comida['alimentos']);
    }

    public function title(): string {
        return $this->comida['nombre'];
    }

    public function headings(): array {
        return $this->custom_head;
    }
}
