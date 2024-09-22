<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Portfolio</title>
    <a href="{{ route('projects.create') }}">Nieuw Project Toevoegen</a>

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
    background-image: url('img/callODB6.webp');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
}

h1 {
    text-align: center;
    font-size: 2rem;
    font-weight: normal;
    margin-bottom: 30px;
    color: #f1f1f1; /* Light Gray/White for headings */
}

a {
    text-decoration: none;
    color: #1c1c1c; /* Dark for contrast */
    background-color: #ffa500; /* Deep Yellow/Orange */
    border: 1px solid #ffa500;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 0.95rem;
    display: inline-block;
    transition: background-color 0.3s ease, color 0.3s ease;
}

a:hover {
    border-color: #cc8400;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #2c2c2c; /* Slightly lighter black/gray for table */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    border-radius: 4px;
    overflow: hidden;
}

th, td {
    padding: 15px;
    text-align: left;
    font-size: 0.95rem;
}

th {
    font-weight: bold;
    background-color: #333; /* Darker Gray */
    color: #ffffff; /* White Text for Contrast */
    text-transform: uppercase;
    border-bottom: 2px solid #ffa500; /* Orange border */
}

td {
    border-bottom: 1px solid #444; /* Dark Gray border */
}

tr:nth-child(even) {
    background-color: #242424; /* Slightly lighter dark rows */
}

tr:hover {
    background-color: #000000; /* Slight hover effect */
}

td a {
    font-weight: bold;
}

td a:hover {
    text-decoration: underline;
    color: #ffa500; /* Darker orange on hover */
}

/* Responsive design for smaller screens */
@media (max-width: 768px) {
    table, thead, tbody, th, td, tr {
        display: block;
    }

    tr {
        margin-bottom: 15px;
    }

    th, td {
        text-align: right;
        padding-left: 50%;
        position: relative;
    }

    th::before, td::before {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-weight: bold;
        content: attr(data-label);
    }

    th, td {
        padding: 10px;
    }
}

</style>
</head>

<body>
    <h1>Overzicht van Projecten</h1>

    <table>
        <thead>
            <tr>
                <th>tag</th>
                <th>image</th>
                <th>Titel</th>
                <th>description</th>
                <th>Edit<th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <td>{{ $project->tag->name }}</td>
                <td>
                    <!-- Display the image -->
                    <img src="{{ asset('img/' . $project->image) }}" alt="Project Image" style="width:100px; height:auto;">
                </td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->description }}</td>
                <div>
                    <td>
                        <a href="{{ route('projects.edit', $project->id) }}">Aanpassen</a>
                    </td>
                </div>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
