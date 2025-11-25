<!DOCTYPE html>
<html>
<head>
    <title>Animal Details</title>
</head>
<body>
    <h1>Animal Details</h1>

    <!-- Basic info -->
    <p><strong>Name:</strong> {{ $animal->name }}</p>
    <p><strong>Species:</strong> {{ $animal->species }}</p>

    <!-- Zoo (one-to-many) -->
    <p>
        <strong>Zoo:</strong>
        {{ $animal->zoo ? $animal->zoo->name : 'No zoo assigned' }}
    </p>

    <!-- Medical History (one-to-one) -->
    <p>
        <strong>Medical History:</strong><br>
        @if($animal->medicalHistory)
            Last Checkup: {{ $animal->medicalHistory->lastcheckup }}<br>
            Description: {{ $animal->medicalHistory->description }}
        @else
            No medical history recorded
        @endif
    </p>

    <!-- Caretakers (many-to-many) -->
    <p>
        <strong>Caretakers:</strong>
        @if($animal->caretakers && $animal->caretakers->count() > 0)
            <ul>
                @foreach($animal->caretakers as $caretaker)
                    <li>{{ $caretaker->name }}</li>
                @endforeach
            </ul>
        @else
            No caretakers assigned
        @endif
    </p>

    <!-- Links -->
    <p>
        <a href="{{ route('animals.edit', $animal->id) }}">Edit</a> |
        <a href="{{ route('animals.index') }}">Back to List</a>
    </p>
</body>
</html>
