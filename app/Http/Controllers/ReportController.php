<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('report.index', compact('reports'));
    }

    public function create()
    {
        return view('report.create');
    }
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->back();
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'string',
            'description' => 'string',
        ]);

        \App\Models\Report::create($data);

        return redirect()->back();
    }

    public function show(Report $report)
    {
        return view('report.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $report->update($request->all());
        return redirect()->back();
    }
}
