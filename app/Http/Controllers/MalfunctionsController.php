<?php

namespace App\Http\Controllers;

use App\Models\Malfunction;
use App\Models\Machine;
use App\Models\Status;
use App\Models\User;

use Illuminate\Http\Request;

class MalfunctionsController extends Controller
{
    public function index()
{
    $malfunctions = Malfunction::whereNull('finished_at')
        ->orderBy('created_at')
        ->get();

    return view('malfunctions.index', compact('malfunctions'));
}
    public function create()
    {
        $machines = Machine::all();
        $statuses = Status::all();
        $users = User::all();
        return view('malfunctions.create', compact('machines', 'statuses', 'users'));
    }

    public function edit(Malfunction $malfunction)
    {
        $machines = Machine::all();
        $statuses = Status::all();
        $users = User::all();
        return view('malfunctions.edit', compact('malfunction', 'machines', 'statuses','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'machine_id' => 'required',
            'status_id' => 'required',
            'description' => 'required',
        ]);

        Malfunction::create($request->all());

        return redirect()->route('malfunctions.index')->with('success', 'Malfunction created successfully.');
    }

    public function update(Request $request, Malfunction $malfunction)
    {
        $request->validate([
            'machine_id' => 'required',
            'status_id' => 'required',
            'description' => 'required',
        ]);

        $malfunction->update($request->all());

        return redirect()->route('malfunctions.index')->with('success', 'Malfunction updated successfully.');
    }

    public function destroy(Malfunction $malfunction)
{
    $malfunction->delete();

    return redirect()->route('malfunctions.index')->with('success', 'Malfunction successfully deleted!');
}

}
