<!DOCTYPE html>
<html>
<head>
    <title>Edit zoo</title>
</head>
<body>
    <h1>Edit zoo</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('zoos.update', $zoo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $zoo->name) }}" required><br><br>

        <label>Size:</label>
        <input type="number" name="size" value="{{ old('size', $zoo->size) }}" required><br><br>

        <label>Name:</label>
        <input type="text" name="location" value="{{ old('location', $zoo->location) }}" required><br><br>

        <button type="submit">Update zoo</button>
    </form>

    <p><a href="{{ route('zoos.index') }}">← Back to All zoos</a></p>
</body>
</html>
