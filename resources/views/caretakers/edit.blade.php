<!DOCTYPE html>
<html>
<head>
    <title>Edit Caretaker</title>
</head>
<body>
    <h1>Edit Caretaker</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('caretakers.update', $Caretaker->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $Caretaker->name) }}" required><br><br>

        <label>Id:</label>
        <input type="number" name="id" value="{{ old('id', $Caretaker->id) }}" required><br><br>

        <label>YearsofExp:</label>
        <input type="number" name="yearsofexp" value="{{ old('yearsofexp', $Caretaker->yearsofexp) }}" required><br><br>

        <button type="submit">Update Caretaker</button>
    </form>

    <p><a href="{{ route('caretakers.index') }}">← Back to All Caretakers</a></p>
</body>
</html>
