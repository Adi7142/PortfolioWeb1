<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Nieuwe Storing Aanmaken</title>
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
    <form method="POST" action="{{ route('malfunctions.store') }}">
        @csrf

        <label for="machine_id">Machine:</label>
        <select name="machine_id" id="machine_id">
            @foreach($machines as $machine)
                <option value="{{ $machine->id }}">{{ $machine->name }}</option>
            @endforeach
        </select>

        <br>

        <label for="status_id">Status:</label>
        <select name="status_id" id="status_id">
            @foreach($statuses as $status)
                <option value="{{ $status->id }}">{{ $status->name }}</option>
            @endforeach
        </select>

        <br>

        <label for="user_id">Medewerker:</label>
        <select name="user_id" id="user_id">
            <option value="" selected>Selecteer Medewerker</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <br>

        <label for="description">Beschrijving:</label>
        <textarea name="description" id="description"></textarea>

        <br>

        <button type="submit">Opslaan</button>
    </form>
</html>
