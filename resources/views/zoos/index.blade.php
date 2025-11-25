<!DOCTYPE html>
<html>
<head>
    <title>All zoos</title>
</head>
<body>
    <h1>Zoo zoos</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('zoos.create') }}">➕ Add New zoo</a>
    <br><br>

    @if ($zoos->count() > 0)
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Size</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>

            @foreach ($zoos as $zoo)
                <tr>
                    <td>{{ $zoo->id }}</td>
                    <td>{{ $zoo->name }}</td>
                    <td>{{ $zoo->size }}</td>
                    <td>{{ $zoo->location }}</td>
                    <td>
                        <a href="{{ route('zoos.show', $zoo->id) }}">View</a> |
                        <a href="{{ route('zoos.edit', $zoo->id) }}">Edit</a> |
                        <form action="{{ route('zoos.destroy', $zoo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this zoo?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No zoos yet! <a href="{{ route('zoos.create') }}">Add one</a>.</p>
    @endif
</body>
</html>
