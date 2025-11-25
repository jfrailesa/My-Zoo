<!DOCTYPE html>
<html>
<head>
    <title>MedicalHistory Details</title>
</head>
<body>
    <h1>MedicalHistory Details</h1>

    <p><strong>lastcheckup:</strong> {{ $MedicalHistory->lastcheckup }}</p>
    <p><strong>description:</strong> {{ $MedicalHistory->description }}</p>

    <p>
        <a href="{{ route('MedicalHistorys.edit', $MedicalHistory->id) }}">Edit</a> |
        <a href="{{ route('MedicalHistorys.index') }}">Back to List</a>
    </p>
</body>
</html>
