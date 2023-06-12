<?php

namespace App\Http\Controllers;

use App\Models\FirstAid;
use Illuminate\Http\Request;

class FirstAidController extends Controller
{
    public function data_firstaid()
    {
        $firstaid = FirstAid::get();

        return view('FirstAid.index', compact('firstaid'));
    }

    public function read_firstaid($id)
    {
        $firstaid = FirstAid::where('id', $id)->first();

        return view('FirstAid.read', compact('firstaid'));
    }

    public function edit_firstaid($id)
    {
        $firstaid = FirstAid::where('id', $id)->first();

        return view('FirstAid.edit', compact('firstaid'));
    }

    public function update_firstaid(Request $request, $id)
    {
        $firstaid = FirstAid::where('id', $id)->first();

        $firstaid->first_aid = $request->first_aid;
        if ($request->file('medicine_image1')) {
            $baseUrl = url('/');
            $firstaid->medicine_image1 = $baseUrl . '/storage/' . $request->file('medicine_image1')->store('medicine-image');
        }
        if ($request->file('medicine_image2')) {
            $baseUrl = url('/');
            $firstaid->medicine_image2 = $baseUrl . '/storage/' . $request->file('medicine_image2')->store('medicine-image');
        }
        if ($request->file('medicine_image3')) {
            $baseUrl = url('/');
            $firstaid->medicine_image3 = $baseUrl . '/storage/' . $request->file('medicine_image3')->store('medicine-image');
        }
        if ($request->file('medicine_image4')) {
            $baseUrl = url('/');
            $firstaid->medicine_image4 = $baseUrl . '/storage/' . $request->file('medicine_image4')->store('medicine-image');
        }
        if ($request->file('medicine_image5')) {
            $baseUrl = url('/');
            $firstaid->medicine_image5 = $baseUrl . '/storage/' . $request->file('medicine_image5')->store('medicine-image');
        }

        $firstaid->update();

        return redirect('/firstaid');
    }
}
