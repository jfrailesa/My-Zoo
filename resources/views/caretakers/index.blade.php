<!DOCTYPE html>
<html>
<head>
    <title>All Caretakers</title>
</head>
<body>
    <h1>Caretaker Caretakers</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('caretakers.create') }}">➕ Add New Caretaker</a>
    <br><br>

    @if ($Caretakers->count() > 0)
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Id</th>
                <th>YearsofExp</th>
                <th>Actions</th>
            </tr>

            @foreach ($Caretakers as $Caretaker)
                <tr>
                    <td>{{ $Caretaker->id }}</td>
                    <td>{{ $Caretaker->name }}</td>
                    <td>{{ $Caretaker->yearsofexp }}</td>
                    <td>
                        <a href="{{ route('caretakers.show', $Caretaker->id) }}">View</a> |
                        <a href="{{ route('caretakers.edit', $Caretaker->id) }}">Edit</a> |
                        <form action="{{ route('caretakers.destroy', $Caretaker->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this Caretaker?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No Caretakers yet! <a href="{{ route('caretakers.create') }}">Add one</a>.</p>
    @endif
</body>
</html>
