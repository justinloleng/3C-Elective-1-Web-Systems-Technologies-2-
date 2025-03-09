<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function insertForm()
    {
        return view('create');
    }

    public function insert(Request $request)
    {
        $name = $request->input('name');
        DB::insert("insert into students (name) VALUES(?)", [$name]);

        return redirect()->back()->with('success', 'Record inserted successfully.');
    }

    public function index()
    {
        $users = DB::select('SELECT * FROM students');
        return view('stud_view', compact('users'));
    }

    public function show($id)
    {
        $users = DB::select('select * from students where id = ?', [$id]);
        return view('stud_update', ['users' => $users]);
    }


    public function edit(Request $request, $id)
    {
        $name = $request->input('name');
        DB::update('update students set name = ? WHERE id = ?', [$name, $id]);

        return redirect()->route('stud_view')->with('success', 'Record updated successfully.');
    }

    public function destroy($id)
    {
        DB::delete('delete from students WHERE id = ?', [$id]);

        return redirect()->route('stud_view')->with('success', 'Record deleted successfully.');
    }
}
