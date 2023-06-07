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
        if ($request->file('medicine_image6')) {
            $baseUrl = url('/');
            $firstaid->medicine_image6 = $baseUrl . '/storage/' . $request->file('medicine_image6')->store('medicine-image');
        }
        if ($request->file('medicine_image7')) {
            $baseUrl = url('/');
            $firstaid->medicine_image7 = $baseUrl . '/storage/' . $request->file('medicine_image7')->store('medicine-image');
        }
        if ($request->file('medicine_image8')) {
            $baseUrl = url('/');
            $firstaid->medicine_image8 = $baseUrl . '/storage/' . $request->file('medicine_image8')->store('medicine-image');
        }
        if ($request->file('medicine_image9')) {
            $baseUrl = url('/');
            $firstaid->medicine_image9 = $baseUrl . '/storage/' . $request->file('medicine_image9')->store('medicine-image');
        }
        if ($request->file('medicine_image10')) {
            $baseUrl = url('/');
            $firstaid->medicine_image10 = $baseUrl . '/storage/' . $request->file('medicine_image10')->store('medicine-image');
        }
        if ($request->file('medicine_image11')) {
            $baseUrl = url('/');
            $firstaid->medicine_image11 = $baseUrl . '/storage/' . $request->file('medicine_image11')->store('medicine-image');
        }
        if ($request->file('medicine_image12')) {
            $baseUrl = url('/');
            $firstaid->medicine_image12 = $baseUrl . '/storage/' . $request->file('medicine_image12')->store('medicine-image');
        }
        if ($request->file('medicine_image13')) {
            $baseUrl = url('/');
            $firstaid->medicine_image13 = $baseUrl . '/storage/' . $request->file('medicine_image13')->store('medicine-image');
        }
        if ($request->file('medicine_image14')) {
            $baseUrl = url('/');
            $firstaid->medicine_image14 = $baseUrl . '/storage/' . $request->file('medicine_image14')->store('medicine-image');
        }
        if ($request->file('medicine_image15')) {
            $baseUrl = url('/');
            $firstaid->medicine_image15 = $baseUrl . '/storage/' . $request->file('medicine_image15')->store('medicine-image');
        }

        $firstaid->update();

        return redirect('/firstaid');
    }
}
