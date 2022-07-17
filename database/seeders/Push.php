<?php

namespace Database\Seeders;

use App\Models\System\Segments;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class Push extends Seeder {
    public function run () {
        $this->Segments();
    }

    private function Segments () {
        $data = [
            'Inovação/Tecnologia',
            'Educação',
            'Negócio Social',
            'Segurança',
            'Entretenimento',
            'Saúde',
            'Gestão Empresarial',
            'Ambiente',
        ];

        foreach ($data as $segmento) {
            $seg = Segments::where('name', $segmento)->count() > 0 ? Segments::where('name', $segmento)->first() : new Segments();
            $seg->name = $segmento;
            $seg->slug = Str::slug($segmento, '-');
            $seg->save();
        }
    }
}
