<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Nieuw Project Aanmaken</title>
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
                background-image: url('{{ asset('img/CODCR.webp') }}'); /* Correct image path */
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

            input[type="text"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 16px;
                border: none;
                border-radius: 5px;
                background-color: #2d2d2d; /* Dark input background */
                color: #f1f1f1; /* Light text color */
                font-size: 1rem;
            }

            input[type="text"]:focus {
                outline: none;
                border: 2px solid #f39c12; /* Focus color in gold */
            }

        </style>
    </head>
        <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
            @csrf
            <h1>Project Aanmaken</h1>
    
            <!-- Tag Selection -->
            <label for="tag_id">Tag:</label>
            <select name="tag_id" id="tag_id">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ old('tag_id') == $tag->id ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
    
            @error('tag_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
    
            <br>
    
            <!-- Title -->
            <label for="title">Titel:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            
            @error('title')
                <div style="color: red;">{{ $message }}</div>
            @enderror
    
            <br>
    
            <!-- Image -->
            <label for="image">Afbeelding:</label>
            <input type="file" name="image" id="image">
            
            @error('image')
                <div style="color: red;">{{ $message }}</div>
            @enderror
    
            <br>
    
            <!-- Description -->
            <label for="description">Beschrijving:</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            
            @error('description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
    
            <br>
    
            <button type="submit">Opslaan</button>
        </form>
    
    </body>
</html>
