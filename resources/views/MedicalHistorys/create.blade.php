<!DOCTYPE html>
<html>
<head>
    <title>Add MedicalHistory</title>
</head>
<body>
    <h1>Add a New MedicalHistory</h1>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('MedicalHistorys.store') }}" method="POST">
        @csrf
        <label>Last Checkup:</label>
        <input type="date" name="lastcheckup" required><br><br>

        <label>Description:</label>
        <input type="text" name="description" required><br><br>

        <button type="submit">Add MedicalHistory</button>
    </form>

    <p><a href="{{ route('MedicalHistorys.index') }}">Back to All MedicalHistorys</a></p>
</body>
</html>
