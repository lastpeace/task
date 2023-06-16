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
        <div class="flex space-x-4">
            <div>
                <a href="{{ route('task.create') }}" class="text-blue-500 mt-4">Tambah Tugas</a>
            </div>
            <div>
                <a href="{{ route('task.index') }}" class="text-blue-500 mt-4">Semua Tugas</a>
            </div>
            <div>
                <a href="{{ route('task.completed') }}" class="text-blue-500 mt-4">Tugas Selesai</a>
            </div>
            <div>
                <a href="{{ route('task.incompleted') }}" class="text-blue-500 mt-4">Tugas Belum selesai</a>
            </div>
        </div>
        <table border="1" class="table-auto w-full">
            <th class="px-4 py-2">Judul</th>
            <th class="px-4 py-2">Deskripsi</th>
            <th class="px-4 py-2">Status</th>
            <th colspan="3" class="px-4 py-2">Aksi</th>
            @foreach ($tasks as $task)
                <tr>

                    <td class="border px-4 py-2">{{ $task->judul }}</td>
                    <td class="border px-4 py-2">{{ $task->deskripsi }}</td>
                    <td class="border px-4 py-2">{{ $task->status }}</td>
                    <div class="col-end-6 text-md ">
                        <form class="my-1" action="{{ url('task/' . $task->id . '/status') }}" method="post">
                            @csrf
                            @method('PUT')
                            <select class="appearance-none bg-transparent" name="status" id="status">
                                <option class=" text-black" value="{{ $task->status }}">{{ $task->status }}
                                </option>
                                @if ($task->status == 'Belum Kelar')
                                    <option class=" text-black" value="Completed">Selesai</option>
                                @else
                                    <option class=" text-black" value="Incomplete">Belum Kelar</option>
                                @endif
                            </select>
                            <button class="m-auto bg-blue-700 hover:bg-blue-800 p-2 text-white rounded-lg"
                                type="submit" name="create" id='status'>Update
                            </button>
                        </form>
                    </div>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-4">
                            <div>
                                <a href="{{ route('task.show', $task) }}"
                                    class="bg-blue-500 text-white py-2.5 px-4 rounded-full shadow-md hover:bg-red-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1">Detail</a>
                            </div>
                            <div>
                                <a href="{{ route('task.edit', $task) }}"
                                    class="bg-yellow-500 text-white py-2.5 px-4 rounded-full shadow-md hover:bg-red-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1">Edit</a>
                            </div>
                            <div>
                                <form method='post' action="{{ route('task.destroy', $task->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button
                                        class="bg-red-500 text-white py-2.5 px-4 rounded-full shadow-md hover:bg-red-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>

                    <td></td>
                </tr>
            @endforeach
        </table>
</body>

</html>
