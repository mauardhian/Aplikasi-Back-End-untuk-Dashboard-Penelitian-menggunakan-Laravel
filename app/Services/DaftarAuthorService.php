<?php

namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Services\loginSintaService;
use App\Models\SintaDaftarAuthor;

class DaftarAuthorService
{
    public static function GetDaftarAuthor(Request $request)
    {
        $http = new \GuzzleHttp\Client;		
        $token = loginSintaService::LoginSinta($request);

        $baseUrl = config('app.guzzle_test_url') . '/v3/';
        $endpoint = 'authors';
        $env = 'dev';
        $uniq = '271071775';
        $url = "{$baseUrl}{$env}/{$uniq}/{$endpoint}";

        $users = $http->request('POST', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token					
            ]
        ]);

        $data = json_decode($users->getBody(), true);
        $authors = $data['results']['authors'];
        
        foreach ($authors as $full) {
            SintaDaftarAuthor::updateOrCreate(
            [
                'id_master' => $full['id'] ?? NULL,
                'NIDN' => $full['NIDN'] ?? NULL,
                'fullname' => $full['fullname'] ?? NULL,
                'country' => $full['country'] ?? NULL,
                'academic_grade_raw' => $full['academic_grade_raw'] ?? NULL,
                'academic_grade' => $full['academic_grade'] ?? NULL,
                'gelar_depan' => $full['gelar_depan'] ?? NULL,
                'gelar_belakang' => $full['gelar_belakang'] ?? NULL,
                'last_education' => $full['last_education'] ?? NULL,
                'sinta_score_v2_overall' => (int) $full['sinta_score_v2_overall'] ?? NULL,
                'sinta_score_v2_3year' => (int) $full['sinta_score_v2_3year'] ?? NULL,
                'sinta_score_v3_overall' => (int) $full['sinta_score_v3_overall'] ?? NULL,
                'sinta_score_v3_3year' => (int) $full['sinta_score_v3_3year'] ?? NULL,
                'affiliation_score_v3_overall' => (int) $full['affiliation_score_v3_overall'] ?? NULL,
                'affiliation_score_v3_3year' => (int) $full['affiliation_score_v3_3year'] ?? NULL,
            ]);
        }

        return $data;
    }

    public static function getPaginateDaftarAuthor()
    {
        $perPage = 10; // Jumlah item per halaman
        $authors = SintaDaftarAuthor::paginate($perPage);

        return $authors;
    }
}
