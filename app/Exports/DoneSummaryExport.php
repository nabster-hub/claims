<?php

namespace App\Exports;

use App\Models\Claim;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class DoneSummaryExport implements FromView
{
    protected $claims;
    protected $powers;
    protected $validated;

    public function __construct($claims, $powers, $validated)
    {
        $this->claims = $claims;
        $this->powers = $powers;
        $this->validated = $validated;
    }

    public function view(): View
    {
        return view('doneSummary.excel', [
            'claims' => $this->claims,
            'powers' => $this->powers,
            'validated' => $this->validated,
        ]);
    }
}
