<?php
namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Http;
use App\Models\Doc\googleDoc;
use App\Services\loginSintaService;

class GoogleDocService
{
    public static function getAuthorGoogle(Request $request) 
    {
        $http = new \GuzzleHttp\Client;		
        $token = loginSintaService::LoginSinta($request);
        // $data = ScopusDoc::all();
        // return $token;die;
        $baseUrl     = config('app.guzzle_test_url').'/v3/';
        $author = 'author';
        $google = 'google';
        // $endpoint = "authors";

        $env = 'dev';
        $uniq = '271071775';
        $type = 'nidn';
        $id = '0414098606';

        $url = "{$baseUrl}{$env}/{$uniq}/{$author}/{$google}/{$type}/{$id}";

        $users = $http->request('POST', $url, [
			'headers' => [
				'Authorization' => 	'Bearer '.$token					
			]
		]);

		//Untuk mendapatkan kode PP
		$data = json_decode($users->getBody(), true);
        $documents = $data['results']['documents'];
        $author = $data['results']['authors'];
        
        return $data;die;

        foreach ($documents as $full) {
            $create = googleDoc::updateorcreate(
            [
                'id_googlescholar' => (int) $full['id'],
                'id_author' => (int) $author['author_id'],
                'title' => $full['title'],
                'abstract' => $full['abstract'],
                'authors' => $full['authors'],
                'journal_Name' => $full['journal_name'],
                'publish_Year' => (int) $full['publish_year'],
                'citation' => (int) $full['citation'],
                'url' => $full['url']
            ]);
        }

        return $data;

    }
}