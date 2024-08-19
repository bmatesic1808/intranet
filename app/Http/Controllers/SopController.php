<?php

namespace App\Http\Controllers;

use App\Models\Sop;
use App\Models\SopCategory;
use Illuminate\Http\Request;

class SopController extends Controller
{
    public function index()
    {
        return view('sop.index', [
            'articles' => Sop::orderBy('created_at', 'DESC')->take(10)->get()
        ]);
    }

    public function create()
    {
        return view('sop.create', [
            'categories' => SopCategory::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'sop_category_id' => 'required|integer'
        ]);

        Sop::create($request->all());

        return redirect(route('sop.index'));
    }

    public function show($id)
    {
        return view('sop.show', [
            'sop' => Sop::where('id', $id)->with('sopCategory')->first()
        ]);
    }

    public function edit($id)
    {
        return view('sop.edit', [
            'sop' => Sop::findOrFail($id),
            'categories' => SopCategory::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'sop_category_id' => 'required|integer'
        ]);

        Sop::whereId($id)->update($request->except(['_token', '_method' ]));

        return redirect(route('sop.index'));
    }
}
