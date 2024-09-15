<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Overzicht van Storingen</title>
    <a href="{{ route('malfunctions.create') }}">Nieuwe Storing Toevoegen</a>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #e2e8f0;
            padding: 10px;
            text-align: left;
        }

        tr.critical {
            background-color: #e53e3e;
            color: #fff;
        }

        tr.major {
            background-color: #dd6b20;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Overzicht van Storingen</h1>

    <table>
        <thead>
            <tr>
                <th>Datum van Storing</th>
                <th>Description van Storing</th>
                <th>Naam van de Machine</th>
                <th>Status van de Storing</th>
                <th>Naam van de Medewerker</th>
                <th>Edit<th>
            </tr>
        </thead>
        <tbody>
            @foreach($malfunctions as $malfunction)
                <tr class="{{ $malfunction->status->severity }}">
                    <td>{{ $malfunction->created_at }}</td>
                    <td>{{ $malfunction->description }}</td>
                    <td>{{ $malfunction->machine->name }}</td>
                    <td>{{ $malfunction->status->name }}</td>
                    <td>{{ optional($malfunction->user)->name }}</td>
                    <td>
                        <a href="{{ route('malfunctions.edit', $malfunction) }}">Aanpassen</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
