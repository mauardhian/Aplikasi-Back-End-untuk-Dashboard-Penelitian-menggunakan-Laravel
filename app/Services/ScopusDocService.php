<?php

namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Http;
use App\Models\Doc\ScopusDoc;
use App\Services\loginSintaService;


class ScopusDocService
{
    public static function getAuthorScopusDoc(Request $request) 
    {
        $http = new \GuzzleHttp\Client;		
        $token = LoginSintaService::loginSinta($request);
        // $data = ScopusDoc::all();
        // return $token;die;
        $baseUrl     = config('app.guzzle_test_url').'/v3/';
        $author = 'author';
        $scopus = 'scopus';
        // $endpoint = "authors";

        $env = 'dev';
        $uniq = '271071775';
        $type = 'nidn';
        $id = '0414098606';

        $url = "{$baseUrl}{$env}/{$uniq}/{$author}/{$scopus}/{$type}/{$id}";

        $users = $http->request('POST', $url, [
			'headers' => [
				'Authorization' => 	'Bearer '.$token					
			]
		]);

		//Untuk mendapatkan kode PP
		$data = json_decode($users->getBody(), true);
        $documents = $data['results']['documents'];
        $author =  $data['results']['authors'];

        return $data;

        foreach ($documents as $scopus) {
            $create = ScopusDoc::updateorcreate(
            [
                'id_scopus_doc' =>  $scopus['id'] ,
                'id_author' => (int) $author['author_id'] , //integer diluar range int
                'quartile' => (int) $scopus['quartile'] ,
                'title' => $scopus['title'] ,
                'publication_name' => $scopus['publication_name'] ,
                'creator' => $scopus['creator'] ,
                'Page' => (int) $scopus['page'] ,
                'issn' => (int) $scopus['issn'] ,
                'volume' => (int) $scopus['volume'] ,
                'cover_date' => $scopus['cover_date'] ,
                'cover_display_date' => $scopus['cover_display_date'] ,
                'doi' => $scopus['doi'] ,
                'citedby_count' => (int) $scopus['citedby_count'] ,
                'aggregation_type' => $scopus['aggregation_type'] ,
                'url' => $scopus['url'],
            ]
            );
        }
        return $data;
    }
}