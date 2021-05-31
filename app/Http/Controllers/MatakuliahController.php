<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        $mk = Matakuliah::paginate(5);

        if($cari){
            $mk= Matakuliah::where('nama_matkul','like','%'.$cari.'%')->paginate(5);
        }
        return view('index_matakuliah',['mk' => $mk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_matkul' => 'required',
            'sks' => 'required',
            'jam' => 'required'
        ]);

        Matakuliah::create($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mk = Matakuliah::find($id);
        return view('edit_matakuliah', compact('mk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matkul' => 'required',
            'sks' => 'required',
            'jam' => 'required'
        ]);

        $mk= Matakuliah::find($id);
        $mk->update($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matakuliah::find($id)->delete();
        return redirect()->route('matakuliah.index')-> with('success', 'Matakuliah berhasil dihapus');
    }
}
