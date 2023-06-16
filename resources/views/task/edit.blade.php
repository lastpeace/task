<!DOCTYPE html>
<html>

<head>
    <title>Edit Tugas</title>
</head>

<body>
    <h1>Edit Tugas</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <p>{{$id}}</p>
    <form action="{{route('task.update',$id) }} " method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $task->judul) }}" required>
        </div>
        <div>
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $task->deskripsi) }}</textarea>
        </div>
        <div>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Belum selesai"{{ old('status', $task->status) === 'Belum selesai' ? ' selected' : '' }}>
                    Belum selesai</option>
                <option value="Selesai"{{ old('status', $task->status) === 'Selesai' ? ' selected' : '' }}>Selesai
                </option>
            </select>
        </div>
        <button type="submit">Update Tugas</button>
    </form>

    <a href="{{ route('task.index') }} ">Batal</a>
</body>

</html>
