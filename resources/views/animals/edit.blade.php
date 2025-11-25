<!DOCTYPE html>
<html>
<head>
    <title>Edit Animal</title>
</head>
<body>
    <h1>Edit Animal</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $animal->name) }}" required><br><br>

        <!-- Species -->
        <label>Species:</label>
        <input type="text" name="species" value="{{ old('species', $animal->species) }}" required><br><br>

        <!-- Zoo (one-to-many) -->
        <label>Zoo:</label>
        <select name="zoo_id">
            <option value="">-- None --</option>
            @foreach ($zoos as $zoo)
                <option value="{{ $zoo->id }}" {{ old('zoo_id', $selectedZoo) == $zoo->id ? 'selected' : '' }}>
                    {{ $zoo->name }}
                </option>
            @endforeach
        </select>
        <br><br>

        <!-- Medical History (one-to-one) -->
        <label>Medical History:</label>
        <select name="medical_history_id">
            <option value="">-- None --</option>
            @foreach ($medicalHistories as $mh)
                <option value="{{ $mh->id }}" {{ old('medical_history_id', $selectedMedicalHistory) == $mh->id ? 'selected' : '' }}>
                    {{ \Illuminate\Support\Str::limit($mh->description, 60) }}
                </option>
            @endforeach
        </select>
        <br><br>

        <!-- Caretakers (many-to-many) as checkboxes -->
        <label>Caretakers:</label><br>
        @foreach ($caretakers as $caretaker)
            <input type="checkbox" name="caretaker_ids[]"
                   value="{{ $caretaker->id }}"
                   {{ in_array($caretaker->id, (array)$selectedCaretakers) ? 'checked' : '' }}>
            {{ $caretaker->name }}<br>
        @endforeach
        <br>

        <button type="submit">Update Animal</button>
    </form>

    <p><a href="{{ route('animals.index') }}">← Back to All Animals</a></p>

</body>
</html>
