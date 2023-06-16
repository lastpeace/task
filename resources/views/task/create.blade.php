<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Tugas Kuis Ammar</title>
</head>


<div class="container mx-auto">
    <div class="p-8">
        <form action=" {{ route('task.store') }} " method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="block font-medium text-md" for="nama_kandidat">Judul</label>
                <input class="placeholder:italic rounded-full h-7 w-full" type="text" name="judul"
                    placeholder="Masukkan Judul">
            </div>
            <div>
                <label class="block font-medium text-md" for="deskripsi">Deskripsi</label>
                <textarea class="rounded-[30px] w-full placeholder:italic" name="deskripsi" id="deskripsi" cols="30" rows="10"
                    placeholder="Masukkan Deskripsi"></textarea>
            </div>
            <div>
                <label class="block font-medium text-md" for="status">Status</label>
                <!-- Ini mau bikin semacam select yang isinya pilihan status : selesai/belum seelasi ?-->
                <select name="status">
                    <option value="Selesai">Selesai</option>
                    <option value="Belum Kelar">Belum Kelar</option>
                </select>
                <div>
                </div>
            </div>
            @if ($errors->any())
                <div class="text-red-500 text-sm">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="text-end mt-1">
                <a
                    class="bg-red-500 text-white py-2.5 px-4 rounded-full shadow-md hover:bg-red-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1"href="{{ route('task.index') }}">Back</a>
                <input
                    class="bg-green-500 text-white p-2.5 rounded-full shadow-md hover:bg-green-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1"
                    type="submit" name="create">
            </div>
        </form>
    </div>
</div>
