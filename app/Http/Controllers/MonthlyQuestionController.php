<?php

namespace App\Http\Controllers;

use App\Models\MonthlyQuestion;
use App\Models\MonthlyScore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MonthlyQuestionController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $monthlyQuestions = MonthlyQuestion::where('user_id', $id)->orderByDesc('created_at')->get();

        return view('questionaire.monthly.index', compact('user', 'monthlyQuestions'));
    }

    public function analytics()
    {
        $questionaires = MonthlyQuestion::with('user')->orderByDesc('created_at')->paginate(10);

        return view('questionaire.monthly.analytics', compact('questionaires'));
    }

    public function show($id)
    {
        $questionaire = MonthlyQuestion::find($id);

        return view('questionaire.monthly.show', compact('questionaire'));
    }

    public function edit(Request $request)
    {
        $questionaire = MonthlyQuestion::find($request->questionaireId);

        return view('questionaire.monthly.edit', compact('questionaire'));
    }

    public function create()
    {
        return view('questionaire.monthly.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'last_month_score' => 'required',
            'bad_experiences' => 'required',
            'good_experiences' => 'required',
            'job_improvement' => 'required',
            'biggest_win' => 'required',
            'nextmonth_goal' => 'required',
            'goal_blocker' => 'required',
            'month_education' => 'required',
            'ceo_help' => 'required',
            'ceo_question' => 'required',
        ],
        [
            'bad_experiences.required' => 'Odgovor na pitanje o negativnim iskustavima je obvezan.',
            'good_experiences.required' => 'Odgovor na pitanje o pozitivnim iskustvima je obvezan.',
            'job_improvement.required' => 'Odgovor na pitanje o unaprijeđenju posla je obvezan.',
            'biggest_win.required' => 'Odgovor na pitanje o Biggest winu je obvezan.',
            'nextmonth_goal.required' => 'Odgovor na pitanje o cilju za idući mjesec je obvezan.',
            'goal_blocker.required' => 'Odgovor na pitanje o eventualnim problemima je obvezan.',
            'month_education.required' => 'Odgovor na pitanje o edukacijama je obvezan.',
            'ceo_help.required' => 'Odgovor na pitanje o CEO pomoći je obvezan.',
            'ceo_question.required' => 'Pitanje za CEO je obvezno.',
        ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        MonthlyQuestion::create($request->all());

        $this->updateMonthlyScore($request);

        return redirect()->route('overview.index')->with('success', 'Success! You have sucessfully submited Monthly Questionaire form.');
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'last_month_score' => 'required',
            'bad_experiences' => 'required',
            'good_experiences' => 'required',
            'job_improvement' => 'required',
            'biggest_win' => 'required',
            'nextmonth_goal' => 'required',
            'goal_blocker' => 'required',
            'month_education' => 'required',
            'ceo_help' => 'required',
            'ceo_question' => 'required',
        ],
            [
                'bad_experiences.required' => 'Odgovor na pitanje o negativnim iskustavima je obvezan.',
                'good_experiences.required' => 'Odgovor na pitanje o pozitivnim iskustvima je obvezan.',
                'job_improvement.required' => 'Odgovor na pitanje o unaprijeđenju posla je obvezan.',
                'biggest_win.required' => 'Odgovor na pitanje o Biggest winu je obvezan.',
                'nextmonth_goal.required' => 'Odgovor na pitanje o cilju za idući mjesec je obvezan.',
                'goal_blocker.required' => 'Odgovor na pitanje o eventualnim problemima je obvezan.',
                'month_education.required' => 'Odgovor na pitanje o edukacijama je obvezan.',
                'ceo_help.required' => 'Odgovor na pitanje o CEO pomoći je obvezan.',
                'ceo_question.required' => 'Pitanje za CEO je obvezno.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $monthly = MonthlyQuestion::findOrFail($id);
        $rememberOldScore = $monthly->last_month_score;

        if ($request->has('last_month_score')) {
            $monthly->last_month_score = $request->last_month_score;
        }

        if ($request->has('bad_experiences')) {
            $monthly->bad_experiences = $request->bad_experiences;
        }

        if ($request->has('good_experiences')) {
            $monthly->good_experiences = $request->good_experiences;
        }

        if ($request->has('job_improvement')) {
            $monthly->job_improvement = $request->job_improvement;
        }

        if ($request->has('biggest_win')) {
            $monthly->biggest_win = $request->biggest_win;
        }

        if ($request->has('nextmonth_goal')) {
            $monthly->nextmonth_goal = $request->nextmonth_goal;
        }

        if ($request->has('goal_blocker')) {
            $monthly->goal_blocker = $request->goal_blocker;
        }

        if ($request->has('month_education')) {
            $monthly->month_education = $request->month_education;
        }

        if ($request->has('ceo_help')) {
            $monthly->ceo_help = $request->ceo_help;
        }

        if ($request->has('ceo_question')) {
            $monthly->ceo_question = $request->ceo_question;
        }

        $monthly->update();

        $this->updateMonthlyScoreByEmployee($monthly, $rememberOldScore);

        return redirect()->route('monthly.my.archive')->with('success', 'Success! You have sucessfully updated Monthly Questionaire.');
    }

    private function updateMonthlyScoreByEmployee($monthly, $oldScore): void
    {
        $score = MonthlyScore::where('year', $monthly->created_at->year)->where('month', $monthly->created_at->month)->first();
        $score->score -= $oldScore;
        $score->score += $monthly->last_month_score;
        $score->update();
    }

    private function updateMonthlyScore(Request $request): void
    {
        $score = MonthlyScore::where('year', now()->year)->where('month', now()->month)->first();

        if (!$score) {
            $newScore = new MonthlyScore();
            $newScore->score = $request->last_month_score;
            $newScore->month = now()->month;
            $newScore->year = now()->year;
            $newScore->times_rated = 1;
            $newScore->save();
        } else {
            $score->score += $request->last_month_score;
            ++$score->times_rated;
            $score->update();
        }
    }

    public function showMyArchive()
    {
        $myQuestionaires = MonthlyQuestion::where('user_id', auth()->id())->orderByDesc('created_at')->get();

        return view('questionaire.monthly.my-archive', compact('myQuestionaires'));
    }
}
