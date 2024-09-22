<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Project Wijzigen</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1c1c1c; /* Dark Black/Gray */
            color: #f1f1f1; /* Light Text for Contrast */
            padding: 20px;
            background-image: url('{{ asset('img/COD2.jpg') }}'); /* Correct image path */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ensures the form is centered vertically and horizontally */
        }
    
        form {
            background-color: rgba(28, 28, 28, 0.85); /* Slightly transparent black for form background */
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
        }
    
        h1 {
            color: #f1f1f1; /* Light font color */
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
            border-bottom: 2px solid #f1f1f1; /* Adds a subtle underline to the title */
            padding-bottom: 10px;
        }
    
        label {
            font-weight: bold;
            color: #f1f1f1;
            display: block;
            margin-bottom: 8px;
        }
    
        select, textarea, input[type="submit"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: none;
            border-radius: 5px;
            background-color: #2d2d2d; /* Dark input background */
            color: #f1f1f1; /* Light text color */
            font-size: 1rem;
        }
    
        select:focus, textarea:focus, button:focus {
            outline: none;
            border: 2px solid #f39c12; /* Focus color in gold */
        }
    
        textarea {
            height: 100px;
            resize: none;
        }
    
        button {
            background-color: #f39c12; /* Gold color for the button */
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    
        button:hover {
            background-color: #e67e22; /* Darker shade of gold on hover */
        }
    
        input[type="submit"] {
            background-color: #e74c3c; /* Red for submit button */
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    
        input[type="submit"]:hover {
            background-color: #c0392b; /* Darker red on hover */
        }
    </style>
</head>
<body>


    <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Project Wijzigen</h1>
    
        <!-- Tag Selection -->
        <label for="tag_id">Tag:</label>
        <select name="tag_id" id="tag_id">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ $tag->id == $project->tag_id ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
        <br>
    
        <!-- Display Current Image -->
        @if($project->image)
            <div>
                <label>Huidige Afbeelding:</label>
                <img src="{{ asset('img/' . $project->image) }}" alt="Project Image" style="width:200px; height:auto;">
            </div>
        @endif
    
        <label for="title">Titel:</label>
        <textarea name="title" id="title">{{ $project->title }}</textarea>
    
        <br>
    
        <label for="description">Beschrijving:</label>
        <textarea name="description" id="description">{{ $project->description }}</textarea>
    
        <br>
    
        <label for="image">Nieuwe Afbeelding:</label>
        <input type="file" name="image" id="image">
    
        <br>
    
        <button type="submit">Opslaan</button>
    </form>
    
    <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
        @csrf
        @method('DELETE')
    
        <label for="confirm">Type "{{ $project->title }}" to confirm:</label>
        <input type="text" name="confirm" id="confirm" required>
        
        @error('confirm')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    
        <button type="submit">Delete Project</button>
    </form>
    
    
    
    
    

</body>
</html>
