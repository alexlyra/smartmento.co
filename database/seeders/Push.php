<?php

namespace Database\Seeders;

use App\Models\System\Interests;
use App\Models\System\Role;
use App\Models\System\Segments;
use App\Models\Users\Interest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class Push extends Seeder {
    public function run () {
        $this->Roles();
        $this->Segments();
    }

    private function Roles () {
        $data = [
            'admin' => 'Administrador',
            'mentor' => 'Mentor',
            'mentee' => 'Mentee',
        ];

        foreach ($data as $tag => $name) {
            $role = Role::where('tag', Str::lower($tag))->count() > 0 ? Role::where('tag', $tag)->first() : new Role;
            $role->tag = Str::lower($tag);
            $role->name = $name;
            $role->save();
        }
    }

    private function Segments () {
        $data = [
            [
                'name' => 'Tecnologia',
                'interests' => [
                    'DevOps',
                    'Cloud',
                    'QA',
                    'Laravel',
                    'Python',
                    'MVC',
                    'Micro-Service',
                ],
            ],
            [
                'name' => 'Jurídico',
                'interests' => [
                    'LGPD',
                    'Vesting',
                    'Societário',
                    'DueDiligence',
                ],
            ],
            [
                'name' => 'Finanças',
                'interests' => [
                    'Fluxo de Caixa',
                    'DRE',
                    'Valuation',
                    'Capex-Opex',
                    'Business Plan',
                ],
            ],
            [
                'name' => 'Marketing',
                'interests' => [
                    'Growth',
                    'Analytics',
                    'Ads',
                    'Pricing',
                    'Pitch-Deck',
                ],
            ],
        ];

        foreach ($data as $segmento) {
            $seg = Segments::where('name', $segmento['name'])->count() > 0 ? Segments::where('name', $segmento['name'])->first() : new Segments();
            $seg->name = $segmento['name'];
            $seg->slug = Str::slug($segmento['name'], '-');
            $seg->save();

            foreach ($segmento['interests'] as $interesse) {
                $int = Interests::where('name', $interesse)->count() > 0 ? Interests::where('name', $interesse)->first() : new Interests();
                $int->segment_id = $seg->id;
                $int->name = $interesse;
                $int->slug = Str::slug($interesse, '-');
                $int->save();
            }
        }
    }
}
