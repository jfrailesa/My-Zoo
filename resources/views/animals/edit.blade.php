<!DOCTYPE html>
<html>
<head>
    <title>Edit Animal</title>
</head>
<body>
    <h1>Edit Animal</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $animal->name) }}" required><br><br>

        <label>Species:</label>
        <input type="text" name="species" value="{{ old('species', $animal->species) }}" required><br><br>

        <button type="submit">Update Animal</button>
    </form>

    <p><a href="{{ route('animals.index') }}">← Back to All Animals</a></p>
</body>
</html>
