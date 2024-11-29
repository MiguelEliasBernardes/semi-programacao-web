<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::all();
        return view('coaches.index', compact('coaches'));
    }

    public function create()
    {
        return view('coaches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'power' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $coaches = new Coach();
        $coaches->name = $request->name;
        $coaches->type = $request->type;
        $coaches->power = $request->power;
        $coaches->image = 'images/'.$imageName;
        $coaches->save();

        Coach::create($request->all());
        return redirect('coaches')->with('success', 'Coach created successfully.');
    }

    public function edit($id)
    {
        $coaches = Coach::findOrFail($id);
        return view('coaches.edit', compact('coaches'));
    }

    public function update(Request $request, $id)
    {

        $coaches = new Coach();
        $coaches->name = $request->name;
        $coaches->type = $request->type;
        $coaches->power = $request->power;

        if(!is_null($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $coaches->image = 'images/'.$imageName;
        }
        $coaches->save();



        $coaches = Coach::findOrFail($id);
        $coaches->update($request->all());
        return redirect('coaches')->with('success', 'Coach updated successfully.');
    }

    public function destroy($id)
    {
        $coaches = Coach::findOrFail($id);
        $coaches->delete();
        return redirect('coaches')->with('success', 'Coach deleted successfully.');
    }
}
