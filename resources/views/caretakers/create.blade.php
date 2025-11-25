<!DOCTYPE html>
<html>
<head>
    <title>Add Caretaker</title>
</head>
<body>
    <h1>Add a New Caretaker</h1>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('caretakers.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Id:</label>
        <input type="number" name="id" required><br><br>

        <label>YearsofExp:</label>
        <input type="number" name="yearsofexp" required><br><br>

        <button type="submit">Add Caretaker</button>
    </form>

    <p><a href="{{ route('caretakers.index') }}">Back to All Caretakers</a></p>
</body>
</html>
