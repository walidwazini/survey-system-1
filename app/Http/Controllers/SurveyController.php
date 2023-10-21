<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSurveyRequest;
use App\Http\Resources\SurveyResource;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller {
  public function index(Request $request) {

    $user = $request->user();

    $allSurveys = SurveyController::
      where("user_id", $user->id)
      ->orderBy("created_at", "desc")
      ->paginate(10);

    return response()->json([
      'message' => 'success',
      'data' => SurveyResource::collection($allSurveys),
    ]);
  }

}
