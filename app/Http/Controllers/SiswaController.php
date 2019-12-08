<?php 

namespace App\Http\Controllers;
use App\Siswa;
use Auth;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index($limit = 10, $offset = 0)
    {
        $data["count"] = Siswa::count();
        $siswa = array();

        foreach (Siswa::take($limit)->skip($offset)->get() as $p) {
            $item = [
                "nis"           => $p->nis,
                "nama_siswa"    => $p->nama_siswa,
                "kelas"         => $p->kelas,
                "point"         => $p->points,
            ];

            array_push($siswa, $item);
        }
        $data["siswa"]  = $siswa;
        $data["status"] = 1;
        return response($data);
    }
    public function show($id)
    {
        $siswa = Siswa::where('id', $id)->get();

        $dataSiswa = array();
        foreach ($siswa as $p) {
            $item = [
                "id"            => $p->id,
                "nis"           => $p->nis,
                "nama_siswa"    => $p->nama_siswa,
                "kelas"         => $p->kelas,
                "point"         => $p->points,
            ];
            array_push($dataSiswa, $item);   
        }

        $data["dataSiswa"]  = $dataSiswa;
        $data["status"]     = 1;
        return response($data);
    }
    
    public function store (Request $request){
        try {
            $data = new Siswa();
            $data->nis = $request->input('nis');
            $data->nama_siswa = $request->input('nama_siswa');
            $data->kelas = $request->input('kelas');
            $data->save();
            return response()->json([
                'status'    =>'1',
                'message'   =>'Tambah data siswa berhasil'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Tambah data siswa gagal!'
            ]);
        }
    }
    public function update(Request $request, $id){
        try {
            $data = Siswa::where('id',$id)->first();
            $data->nis = $request->input('nis');
            $data->nama_siswa = $request->input('nama_siswa');
            $data->kelas = $request->input('kelas');
            $data->save();

            return response()->json([
                'status'    => '1',
                'message'   => 'Ubah data siswa berhasil'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Ubah data siswa gagal'
            ]);
        }
    }
    public function destroy($id){
        try {
            $data = Siswa::where('id',$id)->first();
            $data->delete();

            return response()->json([
                'status'    => '1',
                'message'   => 'Hapus data siswa berhasil'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Hapus data siswa gagal'
            ]);
        }
    }
}