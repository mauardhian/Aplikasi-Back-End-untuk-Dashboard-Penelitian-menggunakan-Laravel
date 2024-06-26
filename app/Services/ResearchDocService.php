<?php

namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Doc\ResearchDoc;
use App\Services\loginSintaService;

class ResearchDocService
{
    public static function getAuthorResearchDoc(Request $request) 
    {
        $http = new \GuzzleHttp\Client;		
        $token = loginSintaService::LoginSinta($request);

        $baseUrl = config('app.guzzle_test_url') . '/v3/';
        $author = 'author';
        $research = 'research';

        $env = 'dev';
        $uniq = '271071775';
        $type = 'nidn';
        $id = '0414098606';

        $url = "{$baseUrl}{$env}/{$uniq}/{$author}/{$research}/{$type}/{$id}";

        $users = $http->request('POST', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token					
            ]
        ]);

        $data = json_decode($users->getBody(), true);
        $documents = $data['results']['documents'];
        
        foreach ($documents as $full) {
            ResearchDoc::updateOrCreate(
            [
                'id_research' => (int) $full['id'] ?? NULL,
                'id_author' => (int) $full['id'] ?? NULL,
                'id_member_research' => (int) $full['id'] ?? NULL,
                'leader' => (int) $full['id'] ?? NULL,
                'leader_Nidn' => (int) $full['id'] ?? NULL,
                'title' => $full['title'] ?? NULL,
                'first_Proposed_Year' => (int) $full['first_Proposed_Year'] ?? NULL,
                'proposed_Year' => (int) $full['proposed_Year'] ?? NULL,
                'implementation_Year' => (int) $full['implementation_Year'] ?? NULL,
                'focus' => $full['focus'] ?? NULL,
                'funds_Approved' => (int) $full['funds_Approved'] ?? NULL,
                'scheme' => $full['scheme'] ?? NULL,
                'abbrev' => $full['abbrev'] ?? NULL,
                'partner_leader_name' => $full['partner_leader_name'] ?? NULL,
                'partner_member1' => $full['partner_member1'] ?? NULL,
                'partner_member2' => $full['partner_member2'] ?? NULL,
                'partner_member3' => $full['partner_member3'] ?? NULL,
                'partner_member4' => $full['partner_member4'] ?? NULL,
                'student_thesis_title' => $full['student_thesis_title'] ?? NULL,
                'subject_title' => $full['subject_title'] ?? NULL,
                'funds_total' => (int) $full['funds_total'] ?? NULL,
                'funds_category' => $full['funds_category'] ?? NULL,
                'tkt' => (int) $full['tkt'] ?? NULL,
                'sdgs_id' => (int) $full['sdgs_id'] ?? NULL
            ]);
        }

        return $data;
    }

    public static function getPaginateResearchDoc()
    {
        $perPage = 10; // Jumlah item per halaman
        $researchDocs = ResearchDoc::paginate($perPage);

        return $researchDocs;
    }
}
