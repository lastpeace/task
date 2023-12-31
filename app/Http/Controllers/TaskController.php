<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'tasks' => Task::all(),
        ];

        return view('task.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'statuses' => Task::distinct()->get(['status'])
        ];
        return view('task.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'deskripsi' => 'required',
            'status' => 'required'
        ]);

        $task = Task::create(
            [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status
            ]
        );
        return redirect(route('task.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'task' => Task::find($id)
        ];

        return view('task.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'id' => $id,
            'task' => Task::find($id),
            'statuses' => Task::distinct()->get(['status'])
        ];
        return view('task.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        $request->validate([
            'judul' => 'required|string|max:50',
            'deskripsi' => 'required',
            'status' => 'required'
        ]);
        $task->judul = $request->judul;
        $task->deskripsi = $request->deskripsi;
        $task->status = $request->status;
        $task->save();
        return redirect(route('task.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect(route('task.index'));
    }

    public function completed()
    {
        $data = [
            'tasks' => Task::where('status', '=', 'Selesai')->get(),
        ];

        return view('task.list', $data);

    }
    public function incompleted()
    {
        $data = [
            'tasks' => Task::where('status', '=', 'Belum Kelar')->get(),
        ];

        return view('task.list', $data);

    }

    public function updateStatus(Request $request, string $id)
    {
        $data = [
            'status' => $request->input('status')
        ];
        task::where('id', $id)->update($data);
        return redirect()->to('task')->with('success', 'Berhasil Mengudpate Status');

    }
}