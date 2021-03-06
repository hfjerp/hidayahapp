<?php

use App\Http\Controllers\AnalyticController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeniedController;
use App\Http\Controllers\HfVisitorGcController;
use App\Http\Controllers\HfMemberSubjectEvaluationController;
use App\Http\Controllers\HfRolesController;
use App\Http\Controllers\HfMemberSkillEvaluationController;
use App\Http\Controllers\HfMemberValuesEvaluationsController;
use App\Http\Controllers\HfAssessMarksController;
use App\Http\Controllers\HfFamilyMemberAadharController;
use App\Http\Controllers\HfFamilyMemberSeniorCitizenController;
use App\Http\Controllers\HfSkillListsController;
use App\Http\Controllers\HfValueListsController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\HfFamilyMemberLabourController;
use App\Http\Controllers\HfFamilyMemberHealthController;
use App\Http\Controllers\HfFamilyMemberBankController;
use App\Http\Controllers\HfFamilyMemberVoterIdController;
use App\Http\Controllers\HfEduAssessController;
use App\Http\Controllers\HfUsersController;
use App\Http\Controllers\HfJamathController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HfFamilyMemberHealthSupportController;
use App\Http\Controllers\HfContactTypeController;
use App\Http\Controllers\HfDistrictController;
use App\Http\Controllers\HfFamilyMemberAcademySupportController;
use App\Http\Controllers\HfFamilyController;
use App\Http\Controllers\HfFamilyMemberAcademyMajorController;
use App\Http\Controllers\HfFamilyMemberOccupationSupportController;
use App\Http\Controllers\HfFamilyMemberAcademyRelController;
use App\Http\Controllers\HfFamilyMemberController;
use App\Http\Controllers\HfFamilyMemberPrioritySupportController;
use App\Http\Controllers\HfFamilyMemberController2;
use App\Http\Controllers\HfFamilyReportController;
use App\Http\Controllers\HfLanguageController;
use App\Http\Controllers\HfAicuSubjectsController;
use App\Http\Controllers\HfReligionController;
use App\Http\Controllers\HfContactController;
use App\Http\Controllers\HfShelterController;
use App\Http\Controllers\HfStateController;
use App\Http\Controllers\HfTalukController;
use App\Http\Controllers\UpdateFamilyController;
use App\Http\Controllers\HfFamilyFoodController;
use App\Http\Controllers\MixController;
use App\Http\Controllers\RationCardTypeController;
use App\Models\Denied;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

],
    function ($router) {

        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    }
);

// resource api's
Route::apiResource('hfRoles', HfRolesController::class );
Route::put('hfmarksss/{id}', [HfAssessMarksController::class,'store'] );
Route::put('hfedumarksss/{id}', [HfEduAssessController::class,'store'] );
Route::put('hfedumarkss/{id}', [HfEduAssessController::class,'update2'] );
Route::put('hfvalues/{id}', [HfMemberValuesEvaluationsController::class,'store'] );
Route::put('hfSkills/{id}', [HfMemberSkillEvaluationController::class,'store'] );
Route::get('AssessLineGraph/{id}', [HfAssessMarksController::class,'AssessLineGraph'] );
Route::get('AicuLineChart/{id}/{year}', [HfAssessMarksController::class,'AicuLineChart'] );
Route::get('AicuCurveChart/{id}', [HfAssessMarksController::class,'AicuCurveChart'] );
Route::get('AicuTableChart/{id}/{year}', [HfAssessMarksController::class,'AicuTableChart'] );
Route::get('SkillTableChart/{id}/{year}', [HfMemberSkillEvaluationController::class,'SkillTableChart'] );
Route::get('ValueTableChart/{id}/{year}', [HfMemberValuesEvaluationsController::class,'ValueTableChart'] );
Route::put('updateaicu/{id}', [HfAssessMarksController::class,'updateaicu'] );
Route::put('updateskillmark/{id}', [HfMemberSkillEvaluationController::class,'updateskillmark'] );
Route::put('updatevaluemark/{id}', [HfMemberValuesEvaluationsController::class,'updatevaluemark'] );
Route::get('AicuTableCurveChart/{id}/{year}', [HfAssessMarksController::class,'AicuTableCurveChart'] );
Route::get('getAllAicuMarks/{id}', [HfAssessMarksController::class,'getAllAicuMarks'] );
Route::get('EduAssessLineGraph/{id}', [HfEduAssessController::class,'EduAssessLineGraph'] );
Route::get('EduAssessLineGraph2/{id}', [HfEduAssessController::class,'EduAssessLineGraph2'] );
Route::apiResource('hfUsers', HfUsersController::class );
Route::apiResource('hfJamaths', HfJamathController::class );
Route::delete('hfJamathsdelete/{id}', [HfJamathController::class,'destroy2'] );
Route::apiResource('hfContactTypes', HfContactTypeController::class );
Route::apiResource('hfContactnew', HfContactController::class );
Route::GET('hfContactnew2/{id}', [HfContactController::class,'show2'] );
Route::apiResource('hffoods', HfFamilyFoodController::class );
Route::apiResource('hfShelters', HfShelterController::class );
Route::apiResource('hfLanguages', HfLanguageController::class );
Route::apiResource('hfAicuSubj', HfAicuSubjectsController::class );
Route::apiResource('hfReligions', HfReligionController::class );
Route::apiResource('hfSkills', HfSkillListsController::class );
Route::apiResource('hfvalue', HfValueListsController::class );
Route::apiResource('hffamilies', HfFamilyController::class);
Route::apiResource('gcvisitor', HfVisitorGcController::class);
Route::get('gcvisitorlist', [HfVisitorGcController::class,'gcvisitorlist']);
Route::post('hffamiliesMR', [HfFamilyController::class,'mrstore']);
Route::post('hffamiliesGC', [HfFamilyController::class,'gcstore']);
Route::GET('getbyjamathffamilies/{id}', [UpdateFamilyController::class,'show3']);
Route::GET('getbymrfamilies/{id}', [UpdateFamilyController::class,'show44']);
Route::GET('getbygcfamilies/{id}', [UpdateFamilyController::class,'show55']);
Route::GET('getbyjamathffamiliesbyid/{id}', [UpdateFamilyController::class,'showjamfam']);
Route::GET('getbyjamathbpl/{id}', [UpdateFamilyController::class,'bplshow']);
Route::GET('getbyjamathbplMR/{id}', [UpdateFamilyController::class,'bplshowmr']);
Route::GET('getbyjamathbplGC/{id}', [UpdateFamilyController::class,'bplshowgc']);
Route::GET('getbyallbpl', [UpdateFamilyController::class,'sabplshow']);
Route::GET('allfamshow', [UpdateFamilyController::class,'allfamshow']);
Route::GET('test/{id}', [UpdateFamilyController::class,'show2']);
Route::PUT('test/{id}', [UpdateFamilyController::class,'update']);
Route::post('FamUpdate', [UpdateFamilyController::class,'FamUpdate']);
Route::post('FamUpdateMR', [UpdateFamilyController::class,'FamUpdateMR']);
Route::GET('getjamname/{id}', [HfFamilyReportController::class,'showjamath']);
Route::get('jamtall/{id}', [HfFamilyReportController::class, 'jamtal']);
Route::get('jamtaldis/{id}', [HfFamilyReportController::class, 'jamtaldis']);
Route::apiResource('hfedusupport', HfFamilyMemberAcademySupportController::class);
Route::get('hfaadhar/{id}', [HfFamilyMemberAadharController::class,'show2']);
Route::get('hfvoter/{id}', [HfFamilyMemberVoterIdController::class,'show2']);
Route::get('hfmemberbank/{id}', [HfFamilyMemberBankController::class,'show2']);
Route::get('hfmembersenior/{id}', [HfFamilyMemberSeniorCitizenController::class,'show2']);
Route::get('hfmemberhealth/{id}', [HfFamilyMemberHealthController::class,'show2']);
Route::get('hfmemberlabour/{id}', [HfFamilyMemberLabourController::class,'show2']);
Route::apiResource('hfselfsupport', HfFamilyMemberOccupationSupportController::class);
Route::apiResource('hfpriorsupport', HfFamilyMemberPrioritySupportController::class);
Route::apiResource('hfhealsupport', HfFamilyMemberHealthSupportController::class);
// shshhshhshhhshshshh
Route::apiResource('family-members', HfFamilyMemberController::class);
Route::GET('DashMemList/{id}', [HfFamilyMemberController::class,'DashMemList']);
Route::GET('DashMemListMR/{id}', [HfFamilyMemberController::class,'DashMemListMR']);
Route::GET('DashMemListGC/{id}', [HfFamilyMemberController::class,'DashMemListGC']);
Route::GET('SADashMemList', [HfFamilyMemberController::class,'SADashMemList']);
Route::GET('SADashMemhealthlist', [HfFamilyMemberController::class,'SADashMemhealthlist']);
Route::GET('SADashMemocclist', [HfFamilyMemberController::class,'SADashMemocclist']);
Route::GET('SADashMemacalist', [HfFamilyMemberController::class,'SADashMemacalist']);
Route::GET('family-membersedit/{id}',[HfFamilyMemberController::class,'edit']);
Route::post('updatememform',[HfFamilyMemberController::class,'updatememform']);
Route::apiResource('family-members2', HfFamilyMemberController2::class);
Route::GET('family-members22/{id}', [HfFamilyMemberController2::class,'show']);
Route::GET('family-members222/{id}', [HfFamilyMemberController2::class,'show2']);


Route::GET('family-dash-members22/{id}', [HfFamilyMemberController2::class,'dashshow']);
Route::GET('family-dash-members22MR/{id}', [HfFamilyMemberController2::class,'dashshow777']);
Route::GET('family-dash-members22GC/{id}', [HfFamilyMemberController2::class,'dashshow888']);
Route::GET('family-dash-members222/{id}', [HfFamilyMemberController2::class,'dashshow2']);
Route::GET('family-dash-membersMR/{id}', [HfFamilyMemberController2::class,'dashshow333']);
Route::GET('family-dash-membersGC/{id}', [HfFamilyMemberController2::class,'dashshow444']);
Route::GET('SAfamily-dash-members22', [HfFamilyMemberController2::class,'sadashshow']);
Route::GET('SAfamily-dash-members222', [HfFamilyMemberController2::class,'sadashshow2']);

Route::apiResource('family-reports',HfFamilyReportController::class);
Route::apiResource('hfAcademy-majors', HfFamilyMemberAcademyMajorController::class);
Route::apiResource('hfRel-majors', HfFamilyMemberAcademyRelController::class);
Route::apiResource('access-denied',DeniedController::class);
Route::post('access-deniednew/{id}/{jam}',[DeniedController::class,'deniednewstore']);
Route::delete('access-denieddelete/{id}/{jam}',[DeniedController::class,'destroy']);
Route::apiResource('state',HfStateController::class);
Route::apiResource('district',HfDistrictController::class);
Route::apiResource('taluk',HfTalukController::class);

// api's
Route::post('upload', [FileUploadController::class, 'upload'] );
Route::get('files', [FileUploadController::class, 'files'] );
Route::get('rationCardTypes', [RationCardTypeController::class, 'index']);
Route::get('shelterTypes', [MixController::class, 'shelterTypeList']);
Route::get('shelterOwnerships', [MixController::class, 'shelterOwnershipList']);
Route::get('analytics',[AnalyticController::class, 'dashboard']);
Route::get('analytics2/{id}',[AnalyticController::class, 'dashboard2']);
Route::get('analytics41',[AnalyticController::class, 'dashboard41']);
Route::get('analytics51',[AnalyticController::class, 'dashboard51']);
Route::get('analytics61',[AnalyticController::class, 'dashboard61']);
Route::get('analytics3/{id}',[AnalyticController::class, 'dashboard3']);
Route::post('addmemskillevamarks/{id}',[HfMemberSkillEvaluationController::class, 'store']);
Route::post('addmemvaluesevamarks/{id}',[HfMemberValuesEvaluationsController::class, 'store']);
Route::get('SkillAssessLineGraph/{id}/{year}',[HfMemberSkillEvaluationController::class, 'SkillAssessLineGraph']);
Route::get('ValueAssessLineGraph/{id}/{year}',[HfMemberValuesEvaluationsController::class, 'ValueAssessLineGraph']);
Route::get('ComSkillAssesspie/{id}/{year}',[HfMemberSkillEvaluationController::class, 'ComSkillAssesspie']);
Route::get('TeamSkillAssesspie/{id}/{year}',[HfMemberSkillEvaluationController::class, 'TeamSkillAssesspie']);
Route::get('IniSkillAssesspie/{id}/{year}',[HfMemberSkillEvaluationController::class, 'IniSkillAssesspie']);
Route::get('LeaSkillAssesspie/{id}/{year}',[HfMemberSkillEvaluationController::class, 'LeaSkillAssesspie']);
Route::get('PlanSkillAssesspie/{id}/{year}',[HfMemberSkillEvaluationController::class, 'PlanSkillAssesspie']);



Route::get('PatienceAssesspie/{id}/{year}',[HfMemberValuesEvaluationsController::class, 'PatienceAssesspie']);
Route::get('SimplicityAssesspie/{id}/{year}',[HfMemberValuesEvaluationsController::class, 'SimplicityAssesspie']);
Route::get('DisciplineAssesspie/{id}/{year}',[HfMemberValuesEvaluationsController::class, 'DisciplineAssesspie']);
Route::get('HonestyAssesspie/{id}/{year}',[HfMemberValuesEvaluationsController::class, 'HonestyAssesspie']);
Route::get('ConfidenceAssesspie/{id}/{year}',[HfMemberValuesEvaluationsController::class, 'ConfidenceAssesspie']);


Route::get('state-district/{id}', [HfStateController::class, 'districts']);
Route::get('state-districtall', [HfStateController::class, 'districtsall']);
Route::get('filter-state-district', [HfStateController::class, 'filterdistricts']);
Route::get('district-taluk/{id}', [HfDistrictController::class, 'taluks']);
Route::get('district-talukall', [HfDistrictController::class, 'taluksall']);
Route::get('filter-district-taluk', [HfDistrictController::class, 'filtertaluks']);
Route::get('taluk-jamath/{id}', [HfJamathController::class, 'jamaths']);
Route::get('filter-taluk-jamath', [HfStateController::class, 'filterjamaths']);


Route::get('user-list/{id}', [HfUsersController::class, 'userList']);
Route::post('denied-access-list/', [DeniedController::class, 'deniedAccess']);
Route::get('denied-access-list-SA/{id}', [DeniedController::class, 'deniedAccessSA']);
Route::post('hfsubjectmarks/{id}', [HfMemberSubjectEvaluationController::class, 'store']);


// api of module category//
Route::post('add-module', [ModuleController::class, 'store']);
Route::delete('delete-modules/{id}', [ModuleController::class, 'destroy']);
Route::get('edit-data-modules/{id}', [ModuleController::class, 'edit']);
Route::put('update-module/{id}', [ModuleController::class, 'update']);
Route::get('get-modules', [ModuleController::class, 'index']);