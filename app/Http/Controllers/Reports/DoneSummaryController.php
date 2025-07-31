<?php

namespace App\Http\Controllers\Reports;

use App\Exports\ClaimsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SummaryRequest;
use App\Models\Claim;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DoneSummaryController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        return view('doneSummary.index', compact('regions'));
    }

    public function report(SummaryRequest $request)
    {
        $validated = $request->validated();
        $claims = $this->getData($validated);

        $powers = $claims->sum('power');

        return view('doneSummary.show', compact('claims', 'powers', 'validated'));
    }

    public function export(SummaryRequest $request)
    {
        $validated = $request->validated();

        $claims = $this->getData($validated);
        $powers = $claims->sum('power');

        return Excel::download(new ClaimsExport($claims, $powers, $validated), 'claims_done.xlsx');
    }

    private function getData($validated = [])
    {
        $user_id = Auth::user()->id;
        if($validated['step']){
            $query = Claim::whereBetween('reg_date', [$validated['sday'], $validated['eday']])->where('status', 5);
        }else{
            $query = Claim::whereBetween('created_at', [Carbon::parse($validated['sday'])->startOfDay(), Carbon::parse($validated['eday'])->endOfDay()])->where('status', '!=', 6);
        }


        if($validated['type']){
            $query->where('type', $validated['type']);
        }

        if($validated['powerMin'] && $validated['powerMax']){
            $query->whereBetween('power', [$validated['powerMin'], $validated['powerMax']]);
        }

        if($validated['region'] && Auth::user()->region_id == 12){
            $query->whereHas('user', function($q) use($validated){
                $q->where('region_id', $validated['region']);
            });
        }elseif(Auth::user()->region_id != 12){
            $query->where('user_id', $user_id);
        }

        #dd($query->toSql());
        return $query->get();
    }
}
