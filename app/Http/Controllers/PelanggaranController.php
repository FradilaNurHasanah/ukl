<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pelanggaran;
use Auth;


class PelanggaranController extends Controller
{
    public function index() {
        $data = Pelanggaran::all();
        return response($data);
    }
    public function show($id){
        $data = Pelanggaran::where('id',$id)->get();
        return response ($data);
    }
    public function store (Request $request){
        try {
            $data = new Pelanggaran();
            $data->nama_pelanggaran = $request->input('nama_pelanggaran');
            $data->kategori = $request->input('kategori');
            $data->point = $request->input('point');
            $data->save();
            return response()->json([
                'status'    =>'1',
                'message'   =>'Tambah data pelanggaran berhasil'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Tambah data pelanggaran gagal'
            ]);
        }
    }
    public function update(Request $request, $id){
        try {
            $data = Pelanggaran::where('id',$id)->first();
            $data->nama_pelanggaran = $request->input('nama_pelanggaran');
            $data->kategori = $request->input('kategori');
            $data->point = $request->input('point');
            $data->save();

            return response()->json([
                'status'    => '1',
                'message'   => 'Ubah data pelanggaran berhasil'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Ubah data pelanggaran gagal'
            ]);
        }
    }
    public function destroy($id){
        try {
            $data = Pelanggaran::where('id',$id)->first();
            $data->delete();

            return response()->json([
                'status'    => '1',
                'message'   => 'Hapus data pelanggaran berhasil'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Hapus data pelanggaran gagal'
            ]);
        }
    }
}
