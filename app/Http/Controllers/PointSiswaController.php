<?php 

namespace App\Http\Controllers;

use App\PointSiswa;
use Illuminate\Http\Request;

class PointSiswaController extends Controller 
{
    public function index($limit = 10, $offset = 0)
    {
        $data["count"] = PointSiswa::count();
        $point = array();

        foreach (PointSiswa::take($limit)->skip($offset)->get() as $p) {
            $item = [
                "id"                => $p->id,
                "id_siswa"          => $p->id_siswa,
                "id_pelanggaran"    => $p->id_pelanggaran,
                "tanggal"           => $p->tanggal,
                "keterangan"        => $p->keterangan,
                "point_siswa"       => $p->pelanggarans->point,
                "kategori"          => $p->pelanggarans->kategori,
            ];

            array_push($point, $item);
        }
        $data["point"]  = $point;
        $data["status"] = 1;
        return response($data);
    }

    public function store(Request $request)
    {
        $point_siswa = new PointSiswa([
            'id_siswa'         => $request->id_siswa,
            'id_pelanggaran'   => $request->id_pelanggaran,
            'tanggal'          => now(),
            'keterangan'       => $request->keterangan,
        ]);

        $point_siswa->save();
        return response($point_siswa);
    }

    public function show($id)
    {
        $point = PointSiswa::where('id', $id)->get();

        $point_siswa = array();
        foreach ($point as $p) {
            $item = [
                "id"              => $p->id,
                "id_siswa"        => $p->id_siswa,
                "id_pelanggaran"  => $p->id_pelanggaran,
                "tanggal"         => $p->tanggal,
                "keterangan"      => $p->keterangan,
                "point_siswa"      => $p->pelanggarans->point,
                "kategori"        => $p->pelanggarans->kategori,
            ];
            array_push($point_siswa, $item);
        }

        $data["pointSiswa"] = $point_siswa;
        $data["status"] = 1;
        return response($data);
    }

    public function detail($id)
    {
        $point = PointSiswa::where('id_siswa', $id)->get();

        $point_siswa = array();
        foreach ($point as $p) {
            $item = [
                "id"              => $p->id,
                "id_siswa"        => $p->id_siswa,
                "id_pelanggaran"  => $p->id_pelanggaran,
                "tanggal"         => $p->tanggal,
                "keterangan"      => $p->keterangan,
                "point_siswa"     => $p->pelanggarans->point,
                "kategori"        => $p->pelanggarans->kategori,
            ];
            array_push($point_siswa, $item);
        }

        $data["pointSiswa"] = $point_siswa;
        $data["status"] = 1;
        return response($data);

    }

    public function update( $id, Request $request)
    {
        $point = PointSiswa::where('id', $id)->first();

        $point->id_siswa = $request->id_siswa;
        $point->id_pelanggaran = $request->id_pelanggaran;
        $point->keterangan = $request->keterangan;
        $point->updated_at = now()->timestamp;

        $point->save();

        return response($point);
    }

    public function destroy($id)
    {
        $poin = PointSiswa::where('id', $id)->first();

        $poin->delete();

        return response()->json([
          'status'  => '1',
          'message' => 'Delete Data Berhasil'
        ]);
    }
}