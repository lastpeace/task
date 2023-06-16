<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Tugas Kuis Ammar</title>
</head>

<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4">Daftar Tugas</h1>
        <a href="{{ route('task.create') }}" class="text-blue-500 mt-4">Tambah Tugas</a>

        <table border="1" class="table-auto w-full">
            <th class="px-4 py-2">Judul</th>
            <th class="px-4 py-2">Deskripsi</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Aksi</th>
            @foreach ($tasks as $task)
                <tr>

                    <td class="border px-4 py-2">{{ $task->judul }}</td>
                    <td class="border px-4 py-2">{{ $task->deskripsi }}</td>
                    <td class="border px-4 py-2">{{ $task->status }}</td>
                    <td class="border px-4 py-2">
                        {{-- <a href="/tasks/show{{ $task->id }}" class="text-blue-500 mr-2">Detail</a> --}}
                        {{-- <a href="{{ route('task.edit') }}" class="text-yellow-500 mr-2">Edit</a> --}}

                        <a href="{{ route('task.destroy') }}" class="text-red-500 mr-2">Hapus</a>

                    </td>

                    <td></td>
                </tr>
            @endforeach
        </table>
</body>

</html>
