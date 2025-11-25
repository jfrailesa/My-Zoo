<!DOCTYPE html>
<html>
<head>
    <title>zoo Details</title>
</head>
<body>
    <h1>zoo Details</h1>

    <p><strong>Name:</strong> {{ $zoo->name }}</p>
    <p><strong>Size:</strong> {{ $zoo->size }}</p>
    <p><strong>Location:</strong> {{ $zoo->location }}</p>

    <p>
        <a href="{{ route('zoos.edit', $zoo->id) }}">Edit</a> |
        <a href="{{ route('zoos.index') }}">Back to List</a>
    </p>
</body>
</html>
