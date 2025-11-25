<!DOCTYPE html>
<html>
<head>
    <title>Add Animal</title>
</head>
<body>
    <h1>Add a New Animal</h1>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('animals.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Species:</label>
        <input type="text" name="species" required><br><br>

        <button type="submit">Add Animal</button>
    </form>

    <p><a href="{{ route('animals.index') }}">Back to All Animals</a></p>
</body>
</html>
