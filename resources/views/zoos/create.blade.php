<!DOCTYPE html>
<html>
<head>
    <title>Add zoo</title>
</head>
<body>
    <h1>Add a New zoo</h1>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('zoos.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Size:</label>
        <input type="number" name="size" required><br><br>

        <label>Location:</label>
        <input type="text" name="location" required><br><br>

        <button type="submit">Add zoo</button>
    </form>

    <p><a href="{{ route('zoos.index') }}">Back to All zoos</a></p>
</body>
</html>
