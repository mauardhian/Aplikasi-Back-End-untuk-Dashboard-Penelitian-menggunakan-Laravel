<?php
namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Http;
use App\Models\Doc\ResearchDoc;
use App\Services\loginSintaService;

class ResearchDocService
{
    public static function getAuthorResearchDoc(Request $request) 
    {
        $http = new \GuzzleHttp\Client;		
        $token = LoginSintaService::LoginSinta($request);
        // $data = ScopusDoc::all();
        // return $token;die;
        $baseUrl     = config('app.guzzle_test_url').'/v3/';
        $author = 'author';
        $research= 'research';
        // $endpoint = "authors";

        $env = 'dev';
        $uniq = '271071775';
        $type = 'nidn';
        $id = '0414098606';

        $url = "{$baseUrl}{$env}/{$uniq}/{$author}/{$research}/{$type}/{$id}";

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
            $criteria = [
                'id_research' => (int) $full['id'] ?? NULL
            ];
            $create = ResearchDoc::updateorcreate(
            [
                'id_author' => (int) $full['id'] ?? NULL,
                'id_member_research' => (int) $full['id'] ?? NULL,
                'leader' => (int) $full['id'] ?? NULL,
                'leader_Nidn' => (int) $full['id'] ?? NULL,
                'title' => (int) $full['id'] ?? NULL,
                'first_Proposed_Year' => (int) $full['id'] ?? NULL,
                'proposed_Year' => (int) $full['id'] ?? NULL,
                'implementation_Year' => (int) $full['id'] ?? NULL,
                'focus' => (int) $full['id'] ?? NULL,
                'funds_Approved' => (int) $full['id'] ?? NULL,
                'scheme' => (int) $full['id'] ?? NULL,
                'abbrev' => (int) $full['id'] ?? NULL,
                'partner_leader_name' => (int) $full['id'] ?? NULL,
                'partner_member1' => (int) $full['id'] ?? NULL,
                'partner_member2' => (int) $full['id'] ?? NULL,
                'partner_member3' => (int) $full['id'] ?? NULL,
                'partner_member4' => (int) $full['id'] ?? NULL,
                'student_thesis_title' => (int) $full['id'] ?? NULL,
                'subject_title' => (int) $full['id'] ?? NULL,
                'funds_total' => (int) $full['id'] ?? NULL,
                'funds_category' => (int) $full['id'] ?? NULL,
                'tkt' => (int) $full['id'] ?? NULL,
                'sdgs_id' => (int) $full['id'] ?? NULL
            ]);
        }

        return $data;

    }
}