<?php

namespace App\Http\Controllers;

use App\Models\HfFamilyMemberRelMajor;
use Illuminate\Http\Request;

class HfFamilyMemberAcademyRelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majorList = HfFamilyMemberRelMajor::all();

        return response()->json($majorList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $Relmajor = HfFamilyMemberRelMajor::create(['name'=>$request->name]);
            return response()->json($Relmajor);
        } catch (\Throwable $th) {
            return response()->json(['msg'=>"Dublicate Entry"],500);
        }
        // return response();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HfFamilyMemberAcademyMajor  $hfFamilyMemberAcademyMajor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $Relmajor=HfFamilyMemberRelMajor::find($id);
       

        return response()->json($Relmajor, 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HfFamilyMemberAcademyMajor  $hfFamilyMemberAcademyMajor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $role->update($request->all());
        // alert("reeeeee");
        $Relmajor=HfFamilyMemberRelMajor::find($id);
        $Relmajor->update([
            'name'=> $request->name,
        ]);
        // $role -> name=$request->input('name');
        // $role->update();
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HfFamilyMemberAcademyMajor  $hfFamilyMemberAcademyMajor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $role->delete();
        $res=HfFamilyMemberRelMajor::where('id',$id)->delete();
        return response()->json([$id]);
    }
}
