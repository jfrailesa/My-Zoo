<!DOCTYPE html>
<html>
<head>
    <title>caretaker Details</title>
</head>
<body>
    <h1>caretaker Details</h1>

    <p><strong>Name:</strong> {{ $caretaker->name }}</p>
    <p><strong>Id:</strong> {{ $caretaker->id }}</p>
    <p><strong>YearsofExp:</strong> {{ $caretaker->yearsofexp }}</p>

    <p>
        <a href="{{ route('caretakers.edit', $caretaker->id) }}">Edit</a> |
        <a href="{{ route('caretakers.index') }}">Back to List</a>
    </p>
</body>
</html>
