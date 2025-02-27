<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClaimRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\DocsRequest;
use App\Models\Claim;
use App\Models\Comment;
use App\Models\ConnectPoint;
use App\Models\Docs;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;


class ClaimController extends Controller
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

    public function index()
    {
        $claims = Claim::byRegion($this->region_id, $this->user_id)->latest()->paginate(10);
        $newClaims = Claim::byRegion($this->region_id, $this->user_id)->where('status', 2)->count();
        $closedClaims = Claim::byRegion($this->region_id, $this->user_id)->where('status', 4)->count();
        return view('claim.index', compact('claims', 'newClaims', 'closedClaims'));
    }

    public function allClaims()
    {
        $claims = Claim::byRegion($this->region_id, $this->user_id)->orderBy('updated_at', 'desc')->paginate(10);
        return view('claim.allClaims', compact('claims'));
    }

    public function create()
    {
        return view('claim.create');
    }

    public function store(ClaimRequest $request)
    {
        $validated = $request->validated();
        $FileUpload = new FileController();

        $user_id = auth()->id();
        $user = User::find($user_id)->with('region')->first();
        $region_id = $user->region->id;

        $connect = ConnectPoint::create([
            'pc' => $validated['pc'],
            'vl' => $validated['vl'],
            'tp' => $validated['tp'],
        ]);

        $connect->save();

        $query = Claim::create([
            'full_name' => $validated['full_name'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'power' => $validated['power'],
            'connect_id' => $connect->id,
            'user_id' => $user_id,
            'status' => 2 ,
            'type' => $validated['type'],

        ]);

        $query->save();

        $files = [];

        if($request->hasFile('claim')){
            $files['claim'] = $FileUpload->upload($request->file('claim'), $region_id, $user_id, (string) $query->id);
        }

        if($request->hasFile('questionnaire')){
            $files['questionnaire'] = $FileUpload->upload($request->file('questionnaire'), $region_id, $user_id, (string) $query->id);
        }

        if($request->hasFile('cal_power')){
            $files['cal_power'] = $FileUpload->upload($request->file('cal_power'), $region_id, $user_id, (string) $query->id);
        }

        if($request->hasFile('CTD')){
            $files['CTD'] = $FileUpload->upload($request->file('CTD'), $region_id, $user_id, (string) $query->id);
        }

        $create = Docs::create([
            'claim_id' => $query->id,
            'claim' => $files['claim'],
            'questionnaire' => $files['questionnaire'],
            'cal_power' => $files['cal_power'],
            'CTD' => $files['CTD'],
            'tech_offer' => "",
            'OCD' => "",
            'tech_condition' => "",
        ]);
        if($create->id){
            return redirect()->route('claim.show', $query->id);
        }else{
            return redirect()->back()->withErrors(['error' => "Что-то пошло не так попробуйте позже"]);
        }
    }

    /**
     * @throws AuthorizationException
     */
    public function show(Claim $claim)
    {
        $this->authorize('view', $claim);
        return view('claim.show', compact('claim'));
    }

    public function stepTwo(Claim $claim)
    {
        $this->authorize('view', $claim);
        return view('claim.stepTwo', compact('claim'));
    }

    public function stepOne(Claim $claim)
    {
        $this->authorize('update', $claim);
        return view('claim.stepOne', compact('claim'));
    }

    public function stepOneUpdate(Claim $claim, CommentRequest $request)
    {

        $this->authorize('view', $claim);
        $validated = $request->validated();

        $claim->update([
            'status' => 1,
            'last_edit_user' => $this->user_id,
        ]);

        Comment::create([
            'claim_id' => $claim->id,
            'user_id' => $this->user_id,
            'content' => $validated['comment'],
        ]);

        return redirect()->route('dashboard')->with('success', "Заявка #$claim->id отправленна на доработку");
    }

    public function stepTwoUpdate(Claim $claim, DocsRequest $request)
    {
        $this->authorize('update', $claim);
        $FileUpload = new FileController();

        $validated = $request->validated();

        $claim->update([
            'status' => 3,
            'last_edit_user' => $this->user_id,
        ]);

        if($request->hasFile('tech_offer')){
            $files['tech_offer'] = $FileUpload->loadMore($request->file('tech_offer'), (string) $claim->docs->claim);
        }
        if($request->hasFile('OCD')){
            $files['OCD'] = $FileUpload->loadMore($request->file('OCD'), (string) $claim->docs->claim);
        }


        $claim->docs()->update([
            'tech_offer' => $files['tech_offer'],
            'OCD' => $files['OCD'],
        ]);

        return redirect()->route('dashboard')->with('success', "Заявка #$claim->id отправленна на согласования");
    }

    public function stepThree(Claim $claim)
    {
        $this->authorize('view', $claim);
        return view('claim.stepThree', compact('claim'));
    }

    public function stepThreeUpdate(Claim $claim, DocsRequest $request)
    {
        $this->authorize('threeStep', $claim);
        $FileUpload = new FileController();

        $validated = $request->validated();

        $claim->update([
            'status' => 4,
            'last_edit_user' => $this->user_id,
        ]);

        if($request->hasFile('tech_condition')){
            $files['tech_condition'] = $FileUpload->loadMore($request->file('tech_condition'), (string) $claim->docs->claim);
        }


        $claim->docs()->update([
            'tech_condition' => $files['tech_condition'],
        ]);

        return redirect()->route('dashboard')->with('success', "Заявка #$claim->id одобрен");
    }

    public function update(Claim $claim, ClaimRequest $request)
    {
        $this->authorize('update', $claim);
        $FileUpload = new FileController();

        $data = $request->validated();

        $files = array();

        try {
            foreach ($request->allFiles() as $key => $file) {
                $files[$key] = $FileUpload->loadMore($request->file($key), (string) $claim->docs->claim);
                $FileUpload->destroy($claim->docs->$key);
                $claim->docs()->update([$key => $files[$key]]);
            }

            if(!$claim->docs->tech_offer && !$claim->docs->OCD){
                $status = 2;
            }else{
                $status = 3;
            }
            $claim->update([
                'status' => $status,
                'last_edit_user' => $this->user_id,
            ]);
            $claim->connection()->update([
                'pc' => $data['pc'],
                'vl' => $data['vl'],
                'tp' => $data['tp'],
            ]);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

        return redirect()->route('dashboard')->with(['success' => "Заявка #$claim->id исправлена и отправлена на согласования"]);

    }
    public function destroy(Claim $claim)
    {

    }
}
