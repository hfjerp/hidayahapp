<?php

namespace App\Http\Controllers;

use App\Models\HfFamilyMemberVoterId;
use Illuminate\Http\Request;

class HfFamilyMemberVoterIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HfFamilyMemberVoterId  $hfFamilyMemberVoterId
     * @return \Illuminate\Http\Response
     */
    public function show2($id)
    {
        $hfFamilyMemberVoterId=HfFamilyMemberVoterId::find($id);
        
        $hfFamilyMemberVoterId = HfFamilyMemberVoterId::where('family_member_id', $id)->first();
        $hfFamilyMemberVoterId['voter_id_card_img_url'] = url($hfFamilyMemberVoterId->voter_id_card_img_url);

       

        return response()->json($hfFamilyMemberVoterId);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HfFamilyMemberVoterId  $hfFamilyMemberVoterId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HfFamilyMemberVoterId $hfFamilyMemberVoterId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HfFamilyMemberVoterId  $hfFamilyMemberVoterId
     * @return \Illuminate\Http\Response
     */
    public function destroy(HfFamilyMemberVoterId $hfFamilyMemberVoterId)
    {
        //
    }
}
