<?php

namespace App\Http\Controllers\Reports;

use App\Exports\ClaimsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SummaryRequest;
use App\Models\Claim;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SummaryReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        return view('summaryReport.index', compact('regions'));
    }

    public function report(SummaryRequest $request)
    {
        $validated = $request->validated();
        $claims = $this->getData($validated);

        $powers = $claims->sum('power');

        return view('summaryReport.show', compact('claims', 'powers', 'validated'));
    }

    public function export(SummaryRequest $request)
    {
        $validated = $request->validated();

        $claims = $this->getData($validated);
        $powers = $claims->sum('power');

        return Excel::download(new ClaimsExport($claims, $powers, $validated), 'claims_summary.xlsx');
    }

    private function getData($validated = [])
    {
        $user_id = Auth::user()->id;
        if($validated['step']){
            if($validated['step'] == 1){
                $query = Claim::whereBetween('reg_date', [$validated['sday'], $validated['eday']])->where('status', '>=', 4)->andWhere('status', '!=', 6);
            }elseif($validated['step'] == 2){
                $query = Claim::whereBetween('created_at', [Carbon::parse($validated['sday'])->startOfDay(), Carbon::parse($validated['eday'])->endOfDay()])->where('status', '<', 4);
            }
        }else{
            $query = Claim::whereBetween('created_at', [Carbon::parse($validated['sday'])->startOfDay(), Carbon::parse($validated['eday'])->endOfDay()])->where('status', '!=', 6);
        }


        if($validated['type']){
            $query->where('type', $validated['type']);
        }

        if($validated['power']){
            $query->where('power', '>=' ,$validated['power']);
        }

        if($validated['region'] && Auth::user()->region_id == 12){
            $query->whereHas('user', function($q) use($validated){
                $q->where('region_id', $validated['region']);
            });
        }else{
            $query->where('user_id', $user_id);
        }


        return $query->get();
    }
}
