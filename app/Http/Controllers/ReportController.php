<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        if($sort != 'asc' && $sort != 'desc'){
            $sort = 'desc';
        }

        $status = $request->input('status');
        
        $query = Report::where('user_id', Auth::id());
        
        if($status && $status != 'all'){
            $query->where('status_id', $status);
        }
        
        $reports = $query->orderBy('created_at', $sort)->paginate(3);
        $statuses = Status::all();
        
        return view('report.index', compact('reports', 'statuses', 'sort', 'status'));
    }
    
    public function create()
    {
        return view('report.create');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|string',
            'description' => 'required|string',
        ]);
        
        $data['user_id'] = Auth::user()->id;
        $data['status_id'] = 1;

        Report::create($data);

        return redirect()->route('report.index');
    }
    
    public function show(Report $report)
    {
        if (Auth::user()->id != $report->user_id) {
            abort(403, 'У вас нет прав на просмотр этой записи.');
        }
        
        return view('report.show', compact('report'));
    }
    
    public function edit(Report $report)
    {
        if (Auth::user()->id != $report->user_id) {
            abort(403, 'У вас нет прав на редактирование этой записи.');
        }
        
        return view('report.edit', compact('report'));
    }
    public function update(Request $request, Report $report)
    {
        if (Auth::user()->id != $report->user_id) {
            abort(403, 'У вас нет прав на редактирование этой записи.');
        }
        $data = $request->validate([
            'number' => 'string',
            'description' => 'string',
        ]);
        $report->update($data);
        return redirect()->route('report.index');
    }
    public function destroy(Report $report)
    {
        if (Auth::user()->id != $report->user_id) {
            abort(403, 'У вас нет прав на удаление этой записи.');
        }
        $report->delete();
        return redirect()->route('report.index');
    }
}