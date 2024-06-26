<?php

namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Http;
use App\Models\Doc\WosDoc;
use App\Services\loginSintaService;

class WosDocService
{
    public static function getAuthorWosDoc (Request $request)
    {
        $http = new \GuzzleHttp\Client;		
        $token = loginSintaService::LoginSinta($request);
        // $data = ScopusDoc::all();
        // return $token;die;
        $baseUrl     = config('app.guzzle_test_url').'/v3/';
        $author = 'author';
        $wos = 'wos';
        // $endpoint = "authors";

        $env = 'dev';
        $uniq = '271071775';
        $type = 'nidn';
        $id = '0414098606';

        $url = "{$baseUrl}{$env}/{$uniq}/{$author}/{$wos}/{$type}/{$id}";

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
            $create = WosDoc::updateorcreate(
            [
                'id_wos_doc' => (int) $full['id'] ?? NULL,
                'id_author' => (int) $author['author_id'] ?? NULL,
                'publons_id' => (int) $full['publons_id'] ?? NULL,
                'wos_id' => $full['wos_id'] ?? NULL,
                'doi' => $full['doi'] ?? NULL,
                'title' => $full['title'] ?? NULL,
                'first_author' => $full['first_author'] ?? NULL,
                'last_author' => $full['last_author'] ?? NULL,
                'authors' => $full['authors'] ?? NULL,
                'publish_date' => $full['publish_date'] ?? NULL,
                'journal_name' => $full['journal_name'] ?? NULL,
                'citation' => (int) $full['citation'] ?? NULL,
                'abstract' => $full['abstract'] ?? NULL,
                'publish_type' => $full['publish_type'] ?? NULL,
                'publish_year' => (int) $full['publish_year'] ?? NULL,
                'page_begin' => (int) $full['page_begin'] ?? NULL,
                'page_end' => (int) $full['page_end'] ?? NULL,
                'issn' => $full['issn'] ?? NULL,
                'eissn' => $full['eissn'] ?? NULL,
                'url' => $full['url'] ?? NULL,
            ]);

        }

        return $data;
    }
}