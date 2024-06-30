<?php

namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Http;
use App\Services\LoginSintaService;
use App\Models\daftar_jurnal;


class DaftarJurnalService
{
    public static function getDaftarJurnal(Request $request)
    {
        $http = new \GuzzleHttp\Client;		
        $token = LoginSintaService::LoginSinta($request);
        // $data = ScopusDoc::all();
        // return $token;die;
        $baseUrl     = config('app.guzzle_test_url').'/v3/';
        $author = 'author';
        $endpoint = 'journals';

        $env = 'dev';
        $uniq = '271071775';
        // $type = 'nidn';
        // $id = '0414098606';

        $url = "{$baseUrl}{$env}/{$uniq}/{$endpoint}";

        $users = $http->request('POST', $url, [
			'headers' => [
				'Authorization' => 	'Bearer '.$token					
			]
		]);

		//Untuk mendapatkan kode PP
		$data = json_decode($users->getBody(), true);
        $data = $data['results']['journals'];
        return $data;die;

        foreach ($data as $full) {
            $create = daftar_jurnal::updateorcreate(
            [
                'id_master' => $full['id'] ?? NULL,
                'accreditation' => $full['accreditation'] ?? NULL,
                'eissn' => $full['eissn'] ?? NULL,
                'pissn' => $full['pissn'] ?? NULL,
                'issn' => $full['issn'] ?? NULL,
                'title' => $full['title'] ?? NULL,
                'institution' => $full['institution'] ?? NULL,
                'publisher' => $full['publisher'] ?? NULL,
                'url_Journal' => $full['url_journal'] ?? NULL,
                'url_Contact' => $full['url_contact'] ?? NULL,
                'url_Editor' => $full['url_editor'] ?? NULL,
                'impact_3y' => $full['impact_3y'] ?? NULL
            ]);
        }

        return $data;


    }
}