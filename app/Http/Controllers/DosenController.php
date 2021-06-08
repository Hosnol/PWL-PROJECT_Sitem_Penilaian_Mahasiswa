<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        $dosen = Dosen::paginate(5);

        if($cari){
            $dosen = dosen::where('nama','like','%'.$cari.'%')
            ->orwhere('nip','like','%'.$cari.'%')->paginate(5);
        }
        return view('index_dosen', ['dsn' => $dosen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_dosen');
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
            'nip' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'alamat' => 'required'
        ]);

        if($request->file('gambar')){
            $image_name = $request->file('gambar')->store('image','public');
        }else{
            $image_name= null;
        }

        $dosen = new dosen;
        $dosen->nip = $request->get('nip');
        $dosen->nama = $request->get('nama');
        $dosen->jk = $request->get('jk');
        $dosen->email =$request->get('email');
        $dosen->nohp =$request->get('nohp');
        $dosen->alamat =$request->get('alamat');
        $dosen->gambar = $image_name;
        $dosen->save();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan');
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
        $dosen = Dosen::find($id);
        return view('edit_dosen', compact('dosen'));
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
            'nip' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'alamat' => 'required'
        ]);

        $dosen = dosen::where('id',$id)->first();
        $dosen->nip = $request->get('nip');
        $dosen->nama = $request->get('nama');
        $dosen->jk = $request->get('jk');
        $dosen->email =$request->get('email');
        $dosen->nohp =$request->get('nohp');
        $dosen->alamat =$request->get('alamat');
        
        if($dosen->gambar && file_exists(storage_path('app/public/' . $dosen->gambar))){
            Storage::delete('public/' . $dosen->gambar);
        }
        $image_name = $request->file('gambar')->store('image', 'public');
        $dosen->gambar = $image_name;
        $dosen->save();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dosen::find($id)->delete();
        return redirect()->route('dosen.index')-> with('success', 'Data dosen berhasil dihapus');
    }

    public function profilDosen($id)
    {
        $dosen = dosen::where('user_id',$id)->first();
        return view('dosen.profil', ['dsn' => $dosen]);
    }
}
