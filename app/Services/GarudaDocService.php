<?php

namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Http;
use App\Models\Doc\garudaDoc;
use App\Services\loginSintaService;

class GarudaDocService
{
    public static function getAuthorGarudaDoc(Request $request)
    {
        $http = new \GuzzleHttp\Client;		
        $token = LoginSintaService::LoginSinta($request);
        // $data = ScopusDoc::all();
        // return $token;die;
        $baseUrl     = config('app.guzzle_test_url').'/v3/';
        $author = 'author';
        $garuda = 'garuda';
        // $endpoint = "authors";

        $env = 'dev';
        $uniq = '271071775';
        $type = 'nidn';
        $id = '0414098606';

        $url = "{$baseUrl}{$env}/{$uniq}/{$author}/{$garuda}/{$type}/{$id}";

        $users = $http->request('POST', $url, [
			'headers' => [
				'Authorization' => 	'Bearer '.$token					
			]
		]);

		//Untuk mendapatkan kode PP
		$data = json_decode($users->getBody(), true);
        $author = $data['results']['authors'];
        $documents = $data['results']['documents'];
        
        return $data;die;

        foreach ($documents as $full) {
            $create = garudaDoc::updateorcreate(
                [                
                'id_garuda_doc' =>  (int) $full['id'] ?? NULL,
                'id_author' => (int) $author['author_id'],
                'author_order' => (int) $full['author_order'] ?? NULL,
                'accreditation' => (int) $full['accreditation'] ?? NULL,
                'title' => $full['title'] ?? NULL,
                'abstract' => $full['abstract'] ?? NULL,
                'publisher_name' => $full['publisher_name'] ?? NULL,
                'publish_date' => $full['publish_date'] ?? NULL,
                'publish_year' => (int) $full['publish_year'] ?? NULL,
                'doi' => $full['doi'] ?? NULL,
                'citation' => (int) $full['citation'] ?? NULL,
                'source' => $full['source'] ?? NULL,
                'source_issue' => $full['source_issue'] ?? NULL,
                'source_page' => $full['source_page'] ?? NULL,
                'url' => $full['url'] ?? NULL
            ]);
        }
        return $data;

    }
}