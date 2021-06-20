<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        $jadwal = Jadwal::paginate(5);

        if($cari){
            $jadwal = Jadwal::where('hari','like','%'.$cari.'%')->paginate(5);
        }

        return view('index_jadwal',['jadwal'=>$jadwal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $matkul = Matakuliah::all();
        $dosen = Dosen::all();
        return view('create_jadwal',['kelas'=>$kelas, 'matkul'=> $matkul, 'dosen' =>$dosen]);
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
            'hari' => 'required',
            'kelas' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'matakuliah' => 'required',
            'dosen' => 'required',
        ]);

        $jadwal = new Jadwal;
        $jadwal->hari= $request->get('hari');
        $jadwal->jam_mulai = $request->get('jam_mulai');
        $jadwal->jam_selesai = $request->get('jam_selesai');
        $jadwal->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $jadwal->kelas()->associate($kelas);
        $jadwal->save();

        $matkul = new Matakuliah;
        $matkul->id = $request->get('matakuliah');

        $jadwal->matakuliah()->associate($matkul);
        $jadwal->save();

        $dosen = new Dosen;
        $dosen->id = $request->get('dosen');

        $jadwal->dosen()->associate($dosen);
        $jadwal->save();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = Jadwal::where('kelas_id',$id)->get();
        return view('mahasiswa.jadwal_kuliah',['jadwal'=>$jadwal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwal::where('id', $id)->first();
        $kelas = Kelas::all();
        $matkul = Matakuliah::all();
        $dosen = Dosen::all();
        return view('edit_jadwal', compact('jadwal','kelas','matkul','dosen'));
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
            'hari' => 'required',
            'kelas' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'matakuliah' => 'required',
            'dosen' => 'required',
        ]);

        $jadwal = Jadwal::where('id', $id)->first();
        $jadwal->hari= $request->get('hari');
        $jadwal->jam_mulai = $request->get('jam_mulai');
        $jadwal->jam_selesai = $request->get('jam_selesai');
        $jadwal->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $jadwal->kelas()->associate($kelas);
        $jadwal->save();

        $matkul = new Matakuliah;
        $matkul->id = $request->get('matakuliah');

        $jadwal->matakuliah()->associate($matkul);
        $jadwal->save();

        $dosen = new Dosen;
        $dosen->id = $request->get('dosen');

        $jadwal->dosen()->associate($dosen);
        $jadwal->save();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::find($id)->delete();
        return redirect()->route('jadwal.index')-> with('success', 'Jadwal berhasil dihapus');
    }
}
