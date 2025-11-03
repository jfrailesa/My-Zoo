<!DOCTYPE html>
<html>
<head>
    <title>Animal Details</title>
</head>
<body>
    <h1>Animal Details</h1>

    <p><strong>Name:</strong> {{ $animal->name }}</p>
    <p><strong>Species:</strong> {{ $animal->species }}</p>

    <p>
        <a href="{{ route('animals.edit', $animal->id) }}">Edit</a> |
        <a href="{{ route('animals.index') }}">Back to List</a>
    </p>
</body>
</html>
