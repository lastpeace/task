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
    <h1>{{ $task->judul }}</h1>
    <p>{{ $task->deskripsi }}</p>
    <p>{{ $task->status }}</p>

    <div class="text-end mt-1">
        <a
            class="bg-red-500 text-white py-2.5 px-4 rounded-full shadow-md hover:bg-red-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1"href="{{ route('task.index') }}">Back</a>

    </div>
</body>

</html>
