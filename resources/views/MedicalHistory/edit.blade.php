<!DOCTYPE html>
<html>
<head>
    <title>Edit MedicalHistory</title>
</head>
<body>
    <h1>Edit MedicalHistory</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('MedicalHistorys.update', $MedicalHistory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="date" name="lastcheckup" value="{{ old('name', $MedicalHistory->lastcheckup) }}" required><br><br>

        <label>Name:</label>
        <input type="text" name="description" value="{{ old('location', $MedicalHistory->description) }}" required><br><br>

        <button type="submit">Update MedicalHistory</button>
    </form>

    <p><a href="{{ route('MedicalHistorys.index') }}">← Back to All MedicalHistorys</a></p>
</body>
</html>
