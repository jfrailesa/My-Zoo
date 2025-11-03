<!DOCTYPE html>
<html>
<head>
    <title>All Animals</title>
</head>
<body>
    <h1>Zoo Animals</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('animals.create') }}">➕ Add New Animal</a>
    <br><br>

    @if ($animals->count() > 0)
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Species</th>
                <th>Actions</th>
            </tr>

            @foreach ($animals as $animal)
                <tr>
                    <td>{{ $animal->id }}</td>
                    <td>{{ $animal->name }}</td>
                    <td>{{ $animal->species }}</td>
                    <td>
                        <a href="{{ route('animals.show', $animal->id) }}">View</a> |
                        <a href="{{ route('animals.edit', $animal->id) }}">Edit</a> |
                        <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this animal?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No animals yet! <a href="{{ route('animals.create') }}">Add one</a>.</p>
    @endif
</body>
</html>
