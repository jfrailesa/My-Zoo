<!DOCTYPE html>
<html>
<head>
    <title>All MedicalHistorys</title>
</head>
<body>
    <h1>MedicalHistory MedicalHistorys</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('MedicalHistorys.create') }}">➕ Add New MedicalHistory</a>
    <br><br>

    @if ($MedicalHistorys->count() > 0)
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>lastcheckup</th>
                <th>description</th>
                
            </tr>

            @foreach ($MedicalHistorys as $MedicalHistory)
                <tr>
                    <td>{{ $MedicalHistory->id }}</td>
                    <td>{{ $MedicalHistory->lastcheckup }}</td>
                    <td>{{ $MedicalHistory->description }}</td>
                    
                    <td>
                        <a href="{{ route('MedicalHistorys.show', $MedicalHistory->id) }}">View</a> |
                        <a href="{{ route('MedicalHistorys.edit', $MedicalHistory->id) }}">Edit</a> |
                        <form action="{{ route('MedicalHistorys.destroy', $MedicalHistory->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this MedicalHistory?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No MedicalHistorys yet! <a href="{{ route('MedicalHistorys.create') }}">Add one</a>.</p>
    @endif
</body>
</html>
