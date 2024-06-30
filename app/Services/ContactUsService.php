<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ContactUs;

class ProductService{

    public function getAllContactUs(){
        try {

            $contactus = ContactUs::all();

            return response()->json(
                [
                    'message' => 'contact us retrieved successfully',
                    'status' => true,
                    'data' => $contactus
                ]
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'message' => 'Failed to retrieve contact us',
                    'status' => false,
                    'error' => $e->getMessage(),
                ], 200
            );
        }
    }

    public function insertContactUs(Request $request){

        try{
            $request->validate([
                'input_date'                        =>  'required',
                'sender_name'                       =>  'required',
                'Sender_institution'                =>  'required',
                'contact_number'                    =>  'required',
                'type'                              =>  'required',
                'Subyek'                            =>  'required',
                'Content'                           =>  'required',
                'id_Grant_collaborator_category'    =>  'required',
                'status'                            =>  'required'
            ]);


            ContactUs::create([
                'input_date'                        => $request->input_date,
                'sender_name'                       => $request->sender_name,
                'Sender_institution'                => $request->Sender_institution,
                'contact_number'                    => $request->contact_number,
                'type'                              => $request->type,
                'Subyek'                            => $request->Subyek,
                'Content'                           => $request->Content,
                'id_Grant_collaborator_category'    => $request->id_Grant_collaborator_category,
                'status'                            => $request->status
            ]);

            return response()->json([
                'message' => 'contact us added successfully',
                'status' => true,
            ],200);

        } catch (\Throwable $e){
            return response()->json([
                'message' => 'failed to add the contact us',
                'status' => false,
                'error' => $e->getMessage()], 500);
        }
    }

    public static function updateContactUs(Request $request,$id){
        try
        {
            $request->validate([
                'input_date'                        =>  'required',
                'sender_name'                       =>  'required',
                'Sender_institution'                =>  'required',
                'contact_number'                    =>  'required',
                'type'                              =>  'required',
                'Subyek'                            =>  'required',
                'Content'                           =>  'required',
                'id_Grant_collaborator_category'    =>  'required',
                'status'                            =>  'required'
            ]);

            $contactus = ContactUs::findOrFail($id);
            $contactus->update([
                'input_date'                        => $request->input_date,
                'sender_name'                       => $request->sender_name,
                'Sender_institution'                => $request->Sender_institution,
                'contact_number'                    => $request->contact_number,
                'type'                              => $request->type,
                'Subyek'                            => $request->Subyek,
                'Content'                           => $request->Content,
                'id_Grant_collaborator_category'    => $request->id_Grant_collaborator_category,
                'status'                            => $request->status
            ]);

            return response()->json([
                'message' => 'contact us updated successfully',
                'status' => true,
            ],200);

        } catch (\Throwable $e)
        {
            return response()->json([
                'message' => 'failed to update the contact us',
                'status' => false,
                'error' => $e->getMessage()], 500);
        }
    }

    public static function deleteContactUs($id)
    {
        try {
            $contactus = ContactUs::findOrFail($id);
            $contactus->delete();
            return response()->json([
                'message' => 'contact us deleted successfully',
                'status' => true,
            ], 202);
        } catch (\Throwable $e){
            return response()->json([
                'message' => 'failed to delete the contact us',
                'status' => false,
                'error' => $e->getMessage()], 404);
        }
    }

}