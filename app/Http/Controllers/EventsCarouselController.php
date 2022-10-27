<?php

namespace App\Http\Controllers;

use App\Models\EventsCarousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function Symfony\Component\VarDumper\Dumper\esc;

class EventsCarouselController extends Controller
{
    // store
    public function store(Request $request)
    {
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'file_id' => ['array'],
        //         'file_id.*' => ['nullable'],
        //         'image' => ['array'],
        //         'image.*' => ['image', 'nullable']
        //     ]
        // );

        $file_ids = $request->file_id;
        $images = $request->image;

        if ($file_ids) {
            foreach ($file_ids as $order => $file_id) {
                $carousel_image = EventsCarousel::where('file_id', '=', $file_id)->first();
                if ($carousel_image === null) {
                    $images[$order]->store('events-carousel');
                    EventsCarousel::create([
                        'file_id' => $file_id,
                        'filename' => $images[$order]->hashName(),
                        'carousel_order' => $order
                    ]);
                } else {
                    $carousel_image->update(['carousel_order' => $order]);
                }
            }
            EventsCarousel::whereNotIn('file_id', array_values($file_ids))->delete();
        } else {
            EventsCarousel::truncate();
        }


        return redirect()->intended('/administration/events/carousel');
    }
}
