<?php
namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Http;
use App\Models\Doc\iprDoc;
use App\Services\loginSintaService;

class IprDocService
{
    public static function getAuthorIpr(Request $request) 
    {
        $http = new \GuzzleHttp\Client;		
        $token = loginSintaService::LoginSinta($request);
        // $data = ScopusDoc::all();
        // return $token;die;
        $baseUrl     = config('app.guzzle_test_url').'/v3/';
        $author = 'author';
        $ipr = 'ipr';
        // $endpoint = "authors";

        $env = 'dev';
        $uniq = '271071775';
        $type = 'nidn';
        $id = '0414098606';

        $url = "{$baseUrl}{$env}/{$uniq}/{$author}/{$ipr}/{$type}/{$id}";

        $users = $http->request('POST', $url, [
			'headers' => [
				'Authorization' => 	'Bearer '.$token					
			]
		]);

		//Untuk mendapatkan kode PP
		$data = json_decode($users->getBody(), true);
        $documents = $data['results']['documents']; 
        $author = $data['results']['authors'];
        // return $data;die;

        foreach ($documents as $full) {
            $create = iprDoc::updateorcreate([
                'id_ipr_doc' => $full['id'] ?? NULL,
                'id_author' => $author['author_id'] ?? NULL,
                'category' => $full['category'] ?? NULL,
                'requests_year' => $full['requests_year'] ?? NULL,
                'requests_number' => $full['requests_number'] ?? NULL,
                'title' => $full['title'] ?? NULL,
                'inventor' => $full['inventor'] ?? NULL,
                'patent_holder' => $full['patent_holder'] ?? NULL,
                'publication_date' => $full['publication_date'] ?? NULL,
                'publication_number' => $full['publication_number'] ?? NULL,
                'filing_date' => $full['filing_date'] ?? NULL,
                'reception_Date' => $full['reception_date'] ?? NULL,
                'registration_Date' => $full['registration_date'] ?? NULL,
                'registration_Number' => $full['registration_number'] ?? NULL
            ]);
        }
        return $data;
    }
}