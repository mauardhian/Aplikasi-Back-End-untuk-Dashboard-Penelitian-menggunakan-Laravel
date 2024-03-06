<?php

namespace App\Http\Controllers;

use App\Models\daftar_afiliasi;
use App\Models\daftar_jurnal;
use App\Models\Doc\googleDoc;
use App\Models\Doc\iprDoc;
use App\Models\Doc\ScopusDoc;
use App\Models\Sinta_Daftar_Author;
use App\Models\Doc\WosDoc;
use App\Models\Doc\garudaDoc;
use App\Models\Doc\bookDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use League\CommonMark\Node\Block\Document;


class ReadController extends Controller
{
    public function loginSinta() {
        $theUrl     = config('app.guzzle_test_url').'/consumer/login';
        $response= Http::post($theUrl, [
                        'username'=> 'TELKOM-U',
                        'password'=>  '2023TELKomJoinAp1Sint@'
                   ]);

        $token = json_decode($response->getBody(), true);
        $token = $token['token'];
        return $token;
    }

    public function getScopusDoc() 
    {
        $http = new \GuzzleHttp\Client;		
        $token = $this->loginSinta();
        // $data = ScopusDoc::all();
        // return $token;die;
        $baseUrl     = config('app.guzzle_test_url').'/v3/';
        $endpoint = "authors";

        $env = 'dev';
        $uniq = '271071775';

        $url = "{$baseUrl}{$env}/{$uniq}/{$endpoint}";

        $users = $http->request('POST', $url, [
			'headers' => [
				'Authorization' => 	'Bearer '.$token					
			]
		]);
		
		//Untuk mendapatkan kode PP
		$data = json_decode($users->getBody(), true);
        $data = $data['results']['authors'];

        foreach ($data as $full) {
            $create = ScopusDoc::create([
                'id_author' => $full['id'],
            ]);
            // $create = ScopusDoc::create([
            //     'id_author' => $full['id']
            // ]);
            // $post = Post::updateOrCreate(
            //     ['title' => 'Existing Post'], // Search criteria
            //     ['content' => 'Updated content'] // Values to set or update
            // );

        }

        // return response()->json([
        //     'status' => 'success',
        //     'messages' => 'berhasil di tambah',
        // ],200);
        
        return $data;
    }

    public function getDaftarAuthor()
    {
        $http = new \GuzzleHttp\Client;		
        $token = $this->loginSinta();
        // $data = ScopusDoc::all();
        // return $token;die;
        $baseUrl     = config('app.guzzle_test_url').'/v3/';
        $author = 'author';
        $endpoint = 'authors';

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
        $data = $data['results']['authors'];
        
        // return $data;die;

        foreach ($data as $full) {
            $criteria = [
                'id_master' => $full['id'] ?? NULL
            ];
            $create = Sinta_Daftar_Author::updateorcreate($criteria,
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

    public function getDaftarJurnal()
    {
        $http = new \GuzzleHttp\Client;		
        $token = $this->loginSinta();
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
        // return $data;die;

        foreach ($data as $full) {
            $criteria = [
                'id_master' => $full['id'] ?? NULL
            ];
            $create = daftar_jurnal::updateorcreate($criteria,
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

    public function getDaftarAfiliasi(string $token)
    {
        $http = new \GuzzleHttp\Client;		
        $token = $this->loginSinta();
        // $data = ScopusDoc::all();
        // return $token;die;
        $baseUrl     = config('app.guzzle_test_url').'/v3/';
        $endpoint = "affiliations";

        $env = 'dev';
        $uniq = '271071775';

        $url = "{$baseUrl}{$env}/{$uniq}/{$endpoint}";

        $users = $http->request('POST', $url, [
			'headers' => [
				'Authorization' => 	'Bearer '.$token					
			]
		]);
		
		//Untuk mendapatkan kode PP
		$data = json_decode($users->getBody(), true);
        $data = $data['results']['authors'];

        return $data;die;

        foreach ($author as $full) {
            $create = daftar_afiliasi::create([
                'id_Afiliasi' => $full['id'] ?? NULL,
                'id_master' => $full['id'] ?? NULL,
                'code_Pddikti' => $full['id'] ?? NULL,
                'name' => $full['id'] ?? NULL,
                'abbreviaton' => $full['id'] ?? NULL,
                'country' => $full['id'] ?? NULL,
                'korwil_Scope' => $full['id'] ?? NULL,
                'lidikti_Scope' => $full['id'] ?? NULL,
                'website' => $full['id'] ?? NULL,
                'description' => $full['id'] ?? NULL,
                'sinta_score_v2_overall' => $full['id'] ?? NULL,
                'sinta_score_v2_3year' => $full['id'] ?? NULL,
                'sinta_score_v2_productivity_overall' => $full['id'] ?? NULL,
                'sinta_score_v2_productivity_3year' => $full['id'] ?? NULL,
                'sinta_score_v3_overall' => $full['id'] ?? NULL,
                'sinta_score_v3_3year' => $full['id'] ?? NULL,
                'sinta_score_v3_productivity_overall' => $full['id'] ?? NULL,
                'sinta_score_v3_productivity_3year' => $full['id'] ?? NULL
            ]);

        }

    }

    public function getAuthorScopusDoc() 
    {
        $http = new \GuzzleHttp\Client;		
        $token = $this->loginSinta();
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

        // return $data;die;

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

    public function getAuthorWosDoc() 
    {
        $http = new \GuzzleHttp\Client;		
        $token = $this->loginSinta();
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

        // return $data;die;

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

    public function getAuthorGaruda() 
    {
        $http = new \GuzzleHttp\Client;		
        $token = $this->loginSinta();
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
        
        // return $data;die;

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

    public function getAuthorGoogle() 
    {
        $http = new \GuzzleHttp\Client;		
        $token = $this->loginSinta();
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
        
        // return $data;die;

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

    public function getAuthorResearch() 
    {
        $http = new \GuzzleHttp\Client;		
        $token = $this->loginSinta();
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
            $create = googleDoc::updateorcreate(
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

    public function getAuthorIpr() 
    {
        $http = new \GuzzleHttp\Client;		
        $token = $this->loginSinta();
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

    public function getAuthorBookDoc() 
    {
        $http = new \GuzzleHttp\Client;		
        $token = $this->loginSinta();
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
        
        // return $data;die;

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

    public function getAuthorComServiceDoc() 
    {
        $http = new \GuzzleHttp\Client;		
        $token = $this->loginSinta();
        // $data = ScopusDoc::all();
        // return $token;die;
        $baseUrl     = config('app.guzzle_test_url').'/v3/';
        $author = 'author';
        $service = 'service';
        // $endpoint = "authors";

        $env = 'dev';
        $uniq = '271071775';
        $type = 'nidn';
        $id = '0414098606';

        $url = "{$baseUrl}{$env}/{$uniq}/{$author}/{$service}/{$type}/{$id}";

        $users = $http->request('POST', $url, [
			'headers' => [
				'Authorization' => 	'Bearer '.$token					
			]
		]);

		//Untuk mendapatkan kode PP
		$data = json_decode($users->getBody(), true);
        // $data = $data['results']['documents'];    
        
        return $data;die;

    }

    // public function getAfiliasiScopusDoc() 
    // {
    //     $http = new \GuzzleHttp\Client;		
    //     $token = $this->loginSinta();
    //     // $data = ScopusDoc::all();
    //     // return $token;die;
    //     $baseUrl     = config('app.guzzle_test_url').'/v3/';
    //     $affiliation = 'affiliation';
    //     $scopus = 'scopus';
    //     // $endpoint = "authors";

    //     $env = 'dev';
    //     $uniq = '271071775';
    //     $type = 'kodept';
    //     $id = '041057';

    //     $url = "{$baseUrl}{$env}/{$uniq}/{$affiliation}/{$scopus}/{$type}/{$id}";

    //     $users = $http->request('POST', $url, [
	// 		'headers' => [
	// 			'Authorization' => 	'Bearer '.$token					
	// 		]
	// 	]);

	// 	//Untuk mendapatkan kode PP
	// 	$data = json_decode($users->getBody(), true);
    //     $data = $data['results'];    
        
    //     return $data;die;

    // }
}
