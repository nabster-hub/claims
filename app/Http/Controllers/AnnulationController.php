<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class AnnulationController extends Controller
{
    use AuthorizesRequests;
    private int $user_id;
    private int $region_id;

    public function __construct()
    {
        $user = auth()->user();
        $this->user_id = $user->id;
        $this->region_id = $user->region_id;
    }
    public function show(int $id)
    {
        $claim = Claim::findOrFail($id);

        return view('claim.annulationList', compact('claim'));
    }

    public function update(Request $request)
    {
       $vaildated = $request->validate([
            'claim' => 'required|integer|exists:claims,id',
            'comment' => 'required|string',
        ]);
        //dd($request);
        try{
            $claim = Claim::findOrFail($vaildated['claim']);
            $claim->update([
                'status' => 6,
            ]);
            Comment::create([
               'claim_id' => $vaildated['claim'],
               'user_id' => $this->user_id,
               'content' => $vaildated['comment'],
            ]);
        }catch (\Exception $exception){
            throw new $exception;
        }

        return redirect()->route('dashboard')->with('success', "Заявка #$claim->id аннулирована!");
    }
}
