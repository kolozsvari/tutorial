<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Name;
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

    return view('pages.teszt', compact('randomName'));
}

public function names()
{
        $names = Name::all();
        return view('pages.names', compact('names'));
}

public function namesCreate($family,$name)
{
    $nameRecord = new Name();
    $nameRecord->name = $name;
    $nameRecord->family_id = $family;
    $nameRecord->save();

    return $nameRecord->id;
}

public function familyCreate($name)
{
    $familyRecord = new Family();
    $familyRecord->surname = $name;
   
    $familyRecord->save();

    return $familyRecord->id;
}

public function deleteName(Request $request)
{
    $name = Name::find($request->input('id'));
    $name->delete();

    return "ok";
}

public function manageSurname()
{
    $names = Family::all();
    return view('pages.surname', compact('names'));
}

public function deleteSurname(Request $request)
{
    $name = Family::find($request->input('id'));
    $name->delete();

    return "ok";
}
public function newSurname(Request $request)
{
    $familyRecord = new Family();
    $familyRecord->surname = $request->input('inputFamily');
    $familyRecord->save();

    return redirect("/names/manage/surname");
}
}