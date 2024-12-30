<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class DataPegawaiOperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dtPegawai = Pegawai::paginate(14);
    
        if ($request->hasFile('image_path')) {
            $request->file('image_path')->move('fotopegawai/', $request->file('image_path')->getClientOriginalName());
            $dtPegawai->image_path = $request->file('image_path')->getClientOriginalName();
            $dtPegawai->save();
        }
    
        return view('data_pegawai_operator', compact('dtPegawai'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buat_data_pegawai_operator');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data sebelum menyimpan
        $validated = $request->validate([
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20',
            'tmpt_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'tmt' => 'required|date',
            'pendidikan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'jenis_kelamin' => 'required|string|max:10',
            'nik' => 'required|string|max:20',
            'jabatan' => 'required|string|max:255',
            'status_kawin' => 'required|string|max:10',
            'no_tlp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            
        ]);
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images/pegawai', 'public');
        }
        Pegawai::create([
            'image_path' => $imagePath,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tmpt_lahir' => $request->tmpt_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'tmt' => $request->tmt,
            'pendidikan' => $request->pendidikan,
            'tahun' => $request->tahun,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'jabatan' => $request->jabatan,
            'status_kawin' => $request->status_kawin,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
        ]);
        return redirect()->route('data_pegawai_operator')->with('success', 'Data pegawai berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::findOrFail($id); // Cari pegawai berdasarkan id
        return view('info_datapeg_operator', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peg = Pegawai::findOrFail($id);

        // Kirim data pegawai ke view
        return view('edit_data_pegawai_operator', compact('peg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peg = Pegawai::findOrFail($id); // Cari pegawai berdasarkan ID
        $peg->update($request->all());  // Update data pegawai

        return redirect('data_pegawai_operator')->with('tost_success', 'Data Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function search(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->input('search');
            // Gunakan paginate() untuk paginasi
            $dtPegawai = Pegawai::where('nama', 'LIKE', '%' . $search . '%')
                ->orWhere('jabatan', 'LIKE', '%' . $search . '%')
                ->paginate(10); // Tampilkan 10 data per halaman
        } else {
            $dtPegawai = Pegawai::paginate(10); // Tampilkan 10 data per halaman
        }
    
        return view('data_pegawai_operator', ['dtPegawai' => $dtPegawai]);
    }
    
}

