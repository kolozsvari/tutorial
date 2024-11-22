<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeszController extends Controller
{
    public function teszt()
{
    $names = [
        'Traza', 'Beep', 'Zsó', 'Musla',
        'D3n', 'Nekokota', 'Nhilerion'
    ];
    $randomNameKey = array_rand($names, 1);
    $randomName = $names[$randomNameKey];

    return view('teszt', compact('randomName'));
}
}
