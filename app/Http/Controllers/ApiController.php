<?php

namespace App\Http\Controllers;

use App\Models\System\Interests;
use App\Models\System\Segments;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller {
    public function segments () {
        try {
            $segments = Segments::where('active', 1)->pluck('name', 'slug');
        } catch (Exception $error) {
            Log::critical($error->getMessage());
            return response()->json(['message' => $error->getMessage()], 500);
        }
        return response()->json(['segments' => $segments]);
    }

    public function interests (Request $request) {
        if (filledWithContent($request->all(), 'segmentId') || filledWithContent($request->all(), 'segmentSlug')) {
            if (filledWithContent($request->all(), 'segmentId')) {
                $segment = Segments::where('id', $request->segmentId)->where('active', 1)->first();
                if (!$segment) {
                    return response()->json(['interests' => new Collection([])]);
                }
                $interests = Interests::where('segment_id', $segment->id)->where('active', 1)->pluck('name', 'slug');
                return response()->json(['interests' => $interests]);
            } else if (filledWithContent($request->all(), 'segmentSlug')) {
                $segment = Segments::where('slug', $request->segmentSlug)->where('active', 1)->first();
                if (!$segment) {
                    return response()->json(['interests' => new Collection([])]);
                }

                $interests = Interests::where('segment_id', $segment->id)->where('active', 1)->pluck('name', 'slug');
                return response()->json(['interests' => $interests]);
            }
        }
    }
}
