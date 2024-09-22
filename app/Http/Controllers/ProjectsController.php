<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\project;
use App\Models\tag;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
{
    $projects = Project::with('tag') // Eager load 'tag' relationship
        ->orderBy('created_at')
        ->get();
    
    return view('projects.index', compact('projects'));
}


    public function create()
    {
        
        $tags = tag::all();
        $users = User::all();
        return view('projects.create', compact('tags', 'users'));
    }
    public function edit(project $project)
    {
        $tags = tag::all();
        $users = User::all();
        return view('projects.edit', compact('project', 'tags',  'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
        ]);

        // Store only the filename
    $imageFile = $request->file('image');
    $imageName = $imageFile->getClientOriginalName(); // Get original filename
    $imageFile->move(public_path('img'), $imageName); // Move image to 'public/img'

    // Store project with image filename
    project::create([
        'tag_id' => $request->input('tag_id'),
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'image' => $imageName, // Save only the filename
    ]);

        return redirect()->route('projects.index')->with('success', 'project created successfully.');
    }

    public function update(Request $request, Project $project)
    {
        // Validate the request
        $request->validate([
            'tag_id' => 'required|exists:tags,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048', // Allow empty if no new image
        ]);
    
        // Update the project details
        $project->tag_id = $request->input('tag_id');
        $project->title = $request->input('title');
        $project->description = $request->input('description');

        // Handle image update
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = $imageFile->getClientOriginalName(); // Get original filename
            $imageFile->move(public_path('img'), $imageName); // Move image to 'public/img'
            $project->image = $imageName; // Save only the filename
        }
        
        
        $project->save();
    
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }
    

    public function destroy(Request $request, Project $project)
{
    // Validate the confirmation input
    $request->validate([
        'confirm' => 'required|in:' . $project->title,
    ], [
        'confirm.in' => 'The confirmation text does not match the project title.',
    ]);

    // Delete the project if validation passes
    $project->delete();

    return redirect()->route('projects.index')->with('success', 'Project successfully deleted!');
}


}


