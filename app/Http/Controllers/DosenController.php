<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Mahasiswa;
use App\Models\User;
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
        $user = User::all();
        return view('create_dosen',['user'=>$user]);
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

        $user = new User;
        $user->id = $request->get('user');

        $dosen->user()->associate($user);
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
        $Mahasiswa = Mahasiswa::find($id);
        $matkul = Matakuliah::all();
        return view('dosen.profil-mahasiswa',['Mahasiswa'=>$Mahasiswa, 'matkul'=>$matkul]);
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
        $user = User::all();
        return view('edit_dosen', compact('dosen', 'user'));
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

        $user = new User;
        $user->id = $request->get('user');

        $dosen->user()->associate($user);
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

    public function tampilMahasiswa(Request $request){
        $cari = $request->get('cari');
        $mhs = Mahasiswa::with('kelas')->paginate(5);

        if($cari){
            $mhs = Mahasiswa::with('kelas')->where('nama','like','%'.$cari.'%')
            ->orWhere('nim','like','%'.$cari.'%')->paginate(5);
        }

        return view('dosen.tampil-mahasiswa', ['mhs'=>$mhs]);
    }

    public function AddNilai(Request $request, $id)
    {
        $Mahasiswa = Mahasiswa::find($id);
        if($Mahasiswa->matakuliah()->where('matakuliah_id',$request->matakuliah)->exists()){
            return redirect()->route('dosen.profil-mahasiswa',$id)-> with('error', 'Nilai matakuliah sudah ada!!');
        }
        $Mahasiswa->matakuliah()->attach($request->matakuliah, ['nilai' => $request->nilai]);

        return redirect()->route('dosen.profil-mahasiswa',$id)-> with('success', 'Nilai berhasil ditambahkan');
    }

    public function DeleteNilai($id, $matakuliah_id)
    {
        $Mahasiswa = Mahasiswa::find($id);
        $Mahasiswa->matakuliah()->detach($matakuliah_id);
        return redirect()->back()-> with('success', 'Nilai berhasil dihapus');
    }
}
