<?php

namespace App\Services\UserService;

use App\Models\System\Interests;
use App\Models\System\Segments;
use App\Models\User;
use App\Models\Users\CustomParameter as Custom;
use App\Models\Users\Interest;
use App\Models\Users\Segment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserManager {
    public function setPrice (int $userId, array $data) {
        if (filledWithContent($data, 'priceType', ['type' => 'string', 'in' => ['paid', 'free']])) {
            $type = new Custom();
            $type->user_id = $userId;
            $type->type = 'price';
            $type->key = "mentor:pricing";
            $content = [
                'type' => "{$data['priceType']}",
                'price' => filledWithContent($data, 'price') ? doubleval($data['price']) : 0.0,
                'per' => filledWithContent($data, 'pricePer', ['type' => 'string', 'in' => ['hour', 'class']]) ? Str::lower($data['pricePer']) : 'hour',
                'face-to-face' => filledWithContent($data, 'inPerson', ['type' => 'boolean']) ? ($data['inPerson'] === true || $data['inPerson'] === 'true' ? true : false) : false,
            ];
            $type->content = $content;
            $type->save();
            return true;
        }
        return false;
    }

    public function setSegmentsAndInterests (User $user, array $segments) {
        foreach ($segments as $keySegments => $s) {
            if (Segments::where('slug', Str::lower($s['slug']))->count() <= 0) {
                $segment = new Segments();
                $segment->name = $s['name'];
                $segment->slug = Str::lower($s['slug']);
                $segment->save();
            } else {
                $segment = Segments::where('slug', Str::lower($s['slug']))->first();
            }

            $userSegment = new Segment();
            $userSegment->user_id = $user->id;
            $userSegment->segment_id = $segment->id;
            $userSegment->save();

            foreach ($s['interests'] as $slug => $name) {
                if (Interests::where('slug', Str::lower($slug))->where('segment_id', $segment->id)->count() <= 0) {
                    $interests = new Interests();
                    $interests->segment_id = $segment->id;
                    $interests->name = $name;
                    $interests->slug = Str::lower($slug);
                    $interests->save();
                } else {
                    $interests = Interests::where('slug', Str::lower($slug))->where('segment_id', $segment->id)->first();
                }

                $userInterests = new Interest();
                $userInterests->user_id = $user->id;
                $userInterests->interest_id = $interests->id;
                $userInterests->save();
            }
        }
    }
}

?>