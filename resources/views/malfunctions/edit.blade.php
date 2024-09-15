<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Storing Wijzigen</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        form {
            background-color: #fff;
            padding: 20px;
            width: 300px;
        }

        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;

            box-sizing: border-box;
        }

    </style>
</head>
<body>
    <h1>Storing Wijzigen</h1>

    <form method="POST" action="{{ route('malfunctions.update', $malfunction) }}">
        @csrf
        @method('PUT')

        <label for="machine_id">Machine:</label>
        <select name="machine_id" id="machine_id">
            @foreach($machines as $machine)
                <option value="{{ $machine->id }}" {{ $machine->id == $malfunction->machine_id ? 'selected' : '' }}>
                    {{ $machine->name }}
                </option>
            @endforeach
        </select>

        <br>

        <label for="status_id">Status:</label>
        <select name="status_id" id="status_id">
            @foreach($statuses as $status)
                <option value="{{ $status->id }}" {{ $status->id == $malfunction->status_id ? 'selected' : '' }}>
                    {{ $status->name }}
                </option>
            @endforeach
        </select>

        <br>

        <label for="user_id">Medewerker:</label>
        <select name="user_id" id="user_id">
            <option value="" selected>Selecteer Medewerker</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $malfunction->user_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        <br>

        <label for="description">Beschrijving:</label>
        <textarea name="description" id="description">{{ $malfunction->description }}</textarea>

        <br>

        <label for="date_finished">Datum Afgehandeld:</label>
        <input type="datetime-local" name="date_finished" value="{{ $malfunction->date_finished ? $malfunction->date_finished->format('Y-m-d\TH:i') : '' }}">

        <br>

        <button type="submit">Opslaan</button>
    </form>
    
    <form method="post" action="{{ route('malfunctions.destroy', $malfunction) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Storing</button>
    </form>
    

</body>
</html>
