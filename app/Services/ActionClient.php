<?php

namespace App\Services;

use App\Models\Guest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActionClient extends Service
{
    public function make($request): Model|Builder
    {
        $phone = preg_replace('![^0-9]+!', '', $request->tel);
        $birthday = new Carbon($request->birthday);

        return Guest::create([
            'name' => $request->name,
            'tel' => $phone,
            'email' => $request->email,
            'birthday' => $birthday->format('Y-m-d'),
        ]);
    }
}
