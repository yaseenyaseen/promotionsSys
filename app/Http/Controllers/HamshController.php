<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Hamsh;
use App\Models\proreq;
use App\Models\selectData;
use App\Models\College;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;

class HamshController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*$blogs = Hamsh::latest()->paginate(5);
        /*$ProReqs = proreq::all();*/
        /*$data = array('list' => DB::table('pro_reqs')->get());*/


        $reqs = proreq::where('user_id',Auth::user()->id)->get();
       /* latest('upload_time')->first()*/

        $reqsos = proreq::where('user_id',Auth::user()->id)-> latest('created_at')->first();// Q/ last promotion request only
        $proreq_id = $reqsos->id;
/*        dd(Auth::user()->id);*/
/*        dd($reqsos);*/
/*        return $proreq_id;*/
        $reqcolls = College::where('id',Auth::user()->college_id)-> get();// Q/ last promotion request only

        $Hams = Hamsh::all();


        $Forms = Form::all();

        return view('hamshs.index',compact('reqs','reqsos','Hams','Forms','reqcolls'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        /* hamshs.index return view('hamshs.forms.sciplan',compact('reqs','reqsos','Hams','Forms','reqcolls'))
            ->with('i', (request()->input('page', 1) - 1) * 5); /*add 'blogs'*/

    }

    public function sciplanindex()
    {
        $reqs = proreq::where('user_id',Auth::user()->id)->get();
        $reqsos = proreq::where('user_id',Auth::user()->id)-> latest('created_at')->first();// Q/ last promotion request only
        $reqcolls = College::where('id',Auth::user()->college_id)-> get();// Q/ last promotion request only
        $Hams = Hamsh::all();
        $Forms = Form::all();
        return view('hamshs.forms.sciplan',compact('reqs','reqsos','Hams','Forms','reqcolls'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hamshs.create');

    }

    public function createsciplanHamsh()
    {
        //
        return view('hamshs.forms.createHamshsciplan');

    }
    public function createsciplanForm()
    {
        //
        return view('hamshs.forms.createform');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
           /* 'title' => 'required',
            'Sci_plan_Applicant' => 'required',
            'Sci_plan_Coll_Sci_Affairs' => 'required',
            'Sci_plan_Coll_Dean_Assis' => 'required',
            'Sci_plan_presidency_office' => 'required',
            'Sci_plan_Sci_Affairs_President_University_Assistant' => 'required',
            'Sci_plan_presidency_Academic_Promotions_Affairs' => 'required',
           'description' => 'required',*/
        ]);
/*        $proreq_id = proreq::latest('created_at')->value('id');*/
        /*Pro_req_id fill this varible of hamsh table*/


        selectData::create($request->all());
/*        proreq::create($request->all());*/
        /*        return auth()->user()->id;*/
        /*        return $request->sci_title;*/
        /*return  $selectData_id=selectData::latest()->id();*/
        /* $form = Form::find($form_id)[0];*/
/*        $reqsos = proreq::where('user_id',Auth::user()->id)-> latest('created_at')->first();// Q/ last promotion request only*/


       $selectData_id = selectData::latest('created_at')->value('id');
        $proreq = proreq::create([
            'user_id' => auth()->user()->id,
            'selectData_id' => $selectData_id,
            'completed' => 0,
        ]);
        //change the route to NewApplicantionBoard

      /*  return redirect()->route('sciplan',)
            ->with('success','Blog created successfully.');*/
        /*$blogs = Hamsh::latest()->paginate(5);
        /*$ProReqs = proreq::all();*/
        /*$data = array('list' => DB::table('pro_reqs')->get());*/


        $reqs = proreq::where('user_id',Auth::user()->id)->get();
        /* latest('upload_time')->first()*/

        $reqsos = proreq::where('user_id',Auth::user()->id)-> latest('created_at')->first();// Q/ last promotion request only
        $proreq_id = $reqsos->id;
        /*        return $proreq_id;*/
        $reqcolls = College::where('id',Auth::user()->college_id)-> get();// Q/ last promotion request only

        $Hams = Hamsh::all();


        $Forms = Form::all();

        /*return view('hamshs.index',compact('reqs','reqsos','Hams','Forms','reqcolls'))
            ->with('i', (request()->input('page', 1) - 1) * 5); */

       /* return view('hamshs.forms.sciplan',compact('reqs','reqsos','Hams','Forms','reqcolls'))
            ->with('i', (request()->input('page', 1) - 1) * 5); /*add 'blogs'*/


        /*return view('hamshs.forms.sciplan',compact('reqsos','Hams','Forms','reqcolls'))
            ->with('i', (request()->input('page', 1) - 1) * 5);*/
       /* return redirect()->route('sciplan',compact('reqsos', 'Forms','reqcolls'))
            ->with('success','Blog created successfully.');*/

        return redirect()->route('NewApplicationBoard',compact('reqsos','Hams','Forms','reqcolls'))
            ->with('success','Blog created successfully.');


    }
    /**
     * Add a store function to a new table
     */
    public function storef(Request $request)
    {
        //
        $request->validate([
        ]);

        Form::create($request->all());
        $Form_id = Form::latest('created_at')->value('id');
        $Form = Form::find($Form_id);
        $reqsos = proreq::where('user_id',Auth::user()->id)-> latest('created_at')->first();// Q/ last promotion request only
        $proreq_id = $reqsos->id;
        $Form->proreq_id = $proreq_id;
        $Form->save();
        return redirect()->route('hamshs.forms.sciplanindex')
            ->with('success','Form created successfully.');
    }
    public function storefH(Request $request)
    {
        $request->validate([]);
        $reqsos = proreq::where('user_id',Auth::user()->id)-> latest('created_at')->first();// Q/ last promotion request only
        $proreq_id = $reqsos->id;
        $Hamsh = Hamsh::create($request->all());
        $Hamsh_id = Hamsh::latest('created_at')->value('id');
        $Hamsh = Hamsh::find($Hamsh_id);
        $Hamsh->proreq_id = $proreq_id;
        $Hamsh->save();
        return redirect()->route('hamshs.forms.sciplanindex')
            ->with('success','Hamsh created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hamsh  $hamsh
     * @return \Illuminate\Http\Response
     */
    public function showHamsh(Hamsh $Ham_id)
    {
        //
        $hamsh = Hamsh::find($Ham_id)[0];
        return view('hamshs.forms.showHamshsciplan',compact('hamsh'));
    }
    public function show2( Form $form_id)
    {
        //
        $form = Form::find($form_id)[0];
        return view('hamshs.forms.show',compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hamsh  $hamsh
     * @return \Illuminate\Http\Response
     */
    public function edit2(Form $form_id)
    {
        $form = Form::find($form_id)[0];
        //
        return view('hamshs.forms.edit',compact('form'));

    }

    public function editHamshsciplan(Hamsh $Ham_id)
    {
        //
        $hamsh = Hamsh::find($Ham_id)[0];

        return view('hamshs.forms.editHamshsciplan',compact('hamsh'));
    }
   public function edit(Hamsh $hamsh)
    {
        //
        return view('hamshs.edit',compact('hamsh'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hamsh  $hamsh
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request, Form $form_id)
    {
        $form = Form::find($form_id)[0];
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $form->update($request->all());

        return redirect()->route('hamshs.forms.sciplanindex')
            ->with('success','The Scientific plan Form is updated successfully');
    }
    public function updateHamshsciplan(Request $request, Hamsh $hamsh_id)
    {

        $hamsh = Hamsh::find($hamsh_id)[0];
       $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $hamsh->update($request->all());

        return redirect()->route('hamshs.forms.sciplanindex')
            ->with('success','The Scientific plan Hamsh is updated successfully');
    }



    public function update(Request $request, Hamsh $hamsh)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $hamsh->update($request->all());

        return redirect()->route('hamshs.index')
            ->with('success','Blog updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hamsh  $hamsh
     * @return \Illuminate\Http\Response
     */
    public function destroyHamshsciplan(Hamsh $hamsh)
    {
        //
        $hamsh->delete();

        return redirect()->route('hamshs.forms.sciplanindex')
            ->with('success','Hamshs deleted successfully');
    }

    public function destroy(Hamsh $hamsh)
    {
        //
        $hamsh->delete();

        return redirect()->route('hamshs.index')
            ->with('success','Blogs deleted successfully');
    }
    public function destroy2(Form $form_id)
    {
        //
        $form = Form::find($form_id)[0];

        $form->delete();

        return redirect()->route('hamshs.forms.sciplanindex')
            ->with('success','Form of Scientific plan is deleted successfully');
    }


}
