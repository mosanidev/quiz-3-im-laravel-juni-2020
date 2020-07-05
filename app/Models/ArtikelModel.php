<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ArtikelModel {
    public static function get_all() {
        $artikel = DB::table('artikel')->get();
        return $artikel;
    }

    public static function save($data) {
        $new_artikel = DB::table('artikel')->insert($data);
        return $new_artikel;
    }

    public static function find_by_id($id) {
        $artikel = DB::table('artikel')->where('id', $id)->first();
        return $artikel;
    } 

    public static function update($id, $request) {
        $slug = str_replace(' ','-',strtolower($request['judul']));

        $artikel_updated = DB::table('artikel')
                        ->where('id', $id)
                        ->update([
                            'judul' => $request['judul'],
                            'isi' => $request['isi'],
                            'slug' => $slug,
                            'tag' => $request['tag'],
                            'updated_at' => date("Y-m-d h:i:s")
                        ]);
        return $artikel_updated;
    }

    public static function destroy($id) {
        $deleted = DB::table('artikel')
                        ->where('id', $id)
                        ->delete();
        return $deleted;
    }
}