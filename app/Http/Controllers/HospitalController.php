<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Checkup;
use Session;
use Auth;
use App\Http\Requests\HospitalValidation;
class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->userType == 'medic'){
            $usersSelect = User::all()->where('userType', 'patient')->pluck('name', 'id');
            $userWithCheckup = User::with('checkups')->where('userType', 'patient')->paginate();

            $countCheckups = 0;
            foreach($userWithCheckup->all() as $key => $item){
                $countCheckups = sizeof($userWithCheckup[$key]['checkups']);
            }
            return view('checkout.checkoutForm', compact('usersSelect', 'userWithCheckup', 'countCheckups'));
        }else{
            return view('checkout.checkoutPatientView');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(HospitalValidation $request)
    {
        //Validate with a specific http request :P
        $validated = $request->validate([
            
                    ]);
        $data = $request->all();

        $checkup = Checkup::create([
            'user_id'=> $data['user_id'],
            'checkouted_at'=> $data['date'],
            'height'=> $data['height'],
            'weight'=> $data['weight'],
            'blood_pressure'=> $data['pressure'],
            'glucose_level'=>$data['glicouse'],
            'ldl'=>$data['cholesterol_bad'],
            'hdl'=>$data['cholesterol_good'],
            'observation'=>$data['observation'],
        ]);
        if($checkup){
            return redirect()->back()->with('success', 'Enviado com Sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checkup = Checkup::find($id);
        $userWithCheckup = User::with('checkups')->where('id', $checkup->user_id)->get();
        return view('checkout.checkoutShow', compact('userWithCheckup', 'checkup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checkup = Checkup::find($id);
        $usersSelect = User::all()->where('userType', 'patient')->pluck('name', 'id');
        $patient = User::with('checkups')->where('id', $checkup->user_id)->get();
        return view('checkout.checkoutFormEdit', compact('id', 'usersSelect', 'patient', 'checkup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $checkup = Checkup::find($id);
        $checkup->update($data);
        if($checkup){
            return redirect()->back()->with('success', 'Atualizado com sucesso!!!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteCheckup = Checkup::find($id);
        $deleteCheckup->delete();
        return redirect()->back();
    }
}
