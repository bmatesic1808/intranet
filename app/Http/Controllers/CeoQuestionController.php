<?php

namespace App\Http\Controllers;

use App\Models\CeoQuestion;
use App\Models\CeoScore;
use Illuminate\Http\Request;

class CeoQuestionController extends Controller
{
    public function index()
    {
        $questionaires = CeoQuestion::orderByDesc('created_at')->paginate(5);

        return view('questionaire.ceo.index', compact('questionaires'));
    }

    public function show($id)
    {
        $questionaire = CeoQuestion::find($id);

        return view('questionaire.ceo.show', compact('questionaire'));
    }

    public function create()
    {
        return view('questionaire.ceo.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        CeoQuestion::create($request->all());

        $this->updateCeoScore($request);

        return redirect()->route('overview.index')->with('success', 'Success! You have sucessfully submited CEO Questionaire form.');
    }

    private function updateCeoScore(Request $request): void
    {
        $score = CeoScore::where('year', now()->year)->first();

        if (!$score) {
            $newScore = new CeoScore();
            $newScore->understanding = $request->understanding;
            $newScore->right_time_info = $request->right_time_info;
            $newScore->company_info_sharing = $request->company_info_sharing;
            $newScore->decisions = $request->decisions;
            $newScore->communication = $request->communication;
            $newScore->focus = $request->focus;
            $newScore->time_management = $request->time_management;
            $newScore->reviews = $request->reviews;
            $newScore->employee_autonomy = $request->employee_autonomy;
            $newScore->career = $request->career;
            $newScore->employe_ideas = $request->employe_ideas;
            $newScore->knowledge = $request->knowledge;
            $newScore->care = $request->care;
            $newScore->year = now()->year;
            $newScore->times_rated = 1;
            $newScore->save();
        } else {
            $score->understanding += $request->understanding;
            $score->right_time_info += $request->right_time_info;
            $score->company_info_sharing += $request->company_info_sharing;
            $score->decisions += $request->decisions;
            $score->communication += $request->communication;
            $score->focus += $request->focus;
            $score->time_management += $request->time_management;
            $score->reviews += $request->reviews;
            $score->employee_autonomy += $request->employee_autonomy;
            $score->career += $request->career;
            $score->employe_ideas += $request->employe_ideas;
            $score->knowledge += $request->knowledge;
            $score->care += $request->care;
            ++$score->times_rated;
            $score->update();
        }
    }
}
