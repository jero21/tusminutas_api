<?php

namespace App\Exports;

use App\Models\Minuta;
use App\Exports\Sheets\MinutaPorComidaSheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MinutaExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $id_minuta;

    public function __construct($id_minuta) {
    	$this->id_minuta = $id_minuta;
    }

    public function sheets(): array {

    	$sheets = [];

    	$excel = Minuta::where('id', $this->id_minuta)->first();
    	$comidas = (array) json_decode($excel->comidas, true);

    	foreach ($comidas as $key => $comida) {
    		$sheets[] = new MinutaPorComidaSheet($comida, $this->id_minuta);
    	}

    	return $sheets;
    }
}
