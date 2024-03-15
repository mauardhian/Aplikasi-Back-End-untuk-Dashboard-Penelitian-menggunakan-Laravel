<?php

namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Http;
use App\Models\Doc\bookDoc;
use App\Services\loginSintaService;

class BookDocService
{
    public static function getAuthorBookDoc(Request $request) 
    {
        $http = new \GuzzleHttp\Client;		
        $token = loginSintaService::loginSinta($request);
        // $data = ScopusDoc::all();
        // return $token;die;
        $baseUrl     = config('app.guzzle_test_url').'/v3/';
        $author = 'author';
        $book = 'book';
        // $endpoint = "authors";

        $env = 'dev';
        $uniq = '271071775';
        $type = 'nidn';
        $id = '0414098606';

        $url = "{$baseUrl}{$env}/{$uniq}/{$author}/{$book}/{$type}/{$id}";

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
            $create = bookDoc::updateorcreate([
                'id_book_doc' => (int) $full['id'],
                'id_author'  =>  (int) $author['author_id'] ?? NULL,
                'category'  =>  $full['category'] ?? NULL,
                'isbn'  =>  (int) $full['isbn'] ?? NULL,
                'title'  =>   $full['title'] ?? NULL,
                'authors'  =>   $full['authors'] ?? NULL,
                'place'  =>   $full['place'] ?? NULL,
                'publisher'  =>   $full['publisher'] ?? NULL,
                'year'  =>  (int) $full['year'] ?? NULL
            ]);
        }
        return $data;

    }
}