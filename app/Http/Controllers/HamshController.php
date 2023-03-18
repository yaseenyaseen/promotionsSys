<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Hamsh;
use App\Models\Paper;
use App\Models\proreq;
use App\Models\RequestApplying;
use App\Models\SciPlan;
use App\Models\selectData;
use App\Models\PromotionReq;
use App\Models\College;

//use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;
use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use App\Models\User;

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


        $reqs = proreq::where('user_id', Auth::user()->id)->get();
        /* latest('upload_time')->first()*/

        $reqsos = proreq::where('user_id', Auth::user()->id)->latest('created_at')->first();// Q/ last promotion request only
        $proreq_id = $reqsos->id;
        /*        dd(Auth::user()->id);*/
        /*        dd($reqsos);*/
        /*        return $proreq_id;*/
        $reqcolls = College::where('id', Auth::user()->college_id)->get();// Q/ last promotion request only

        $Hams = Hamsh::all();


        $Forms = Form::all();

        return view('hamshs.index', compact('reqs', 'reqsos', 'Hams', 'Forms', 'reqcolls'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        /* hamshs.index return view('hamshs.forms.sciplan',compact('reqs','reqsos','Hams','Forms','reqcolls'))
            ->with('i', (request()->input('page', 1) - 1) * 5); /*add 'blogs'*/

    }

    public function sciplanindex(User $user_id)
    {
        $user = User::find($user_id)[1];
        $PromotionReqUser = PromotionReq::where('user_id', $user->id)
            ->latest('created_at')->first();
        $SciPlan = SciPlan::where('promotionReqs_id', $PromotionReqUser->id)
            ->get()->first();
        $papers = Paper::where('promotionReqs_id', $PromotionReqUser->id)->get();
        return view('hamshs.forms.sciplan',
            compact('SciPlan', 'papers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


        //todo the above 'SciPlan' variable should be changed to Hamshs of Sciplan.
        //todo below code should be deleted, firsty, comment the code, then delete it.
        // todo From Hussien:
        // get thier role
        // if head dep get dep id
        // if asses dean get dep ids for the college
        // get users for the dep id(s)
        /*     $a = Auth::user()->getRoleNames();
             if (count($a) > 0) {
                 if ($a->contains('HeadDepartment_Coll')) {
                     $promotion_reqsForHeadDepartment_Coll = DB::table('users as s')
                         ->select('s.*', 'a.*')
                         ->join('promotion_reqs as a',
                             's.id', '=', 'a.user_id')
                         ->leftJoin('promotion_reqs as a1', function ($join) {
                             $join->on('a.user_id', '=', 'a1.user_id')
                                 ->whereRaw(DB::raw('a.created_at < a1.created_at'));
                         })
                         ->whereNull('a1.user_id')
                         ->where('department_id', Auth::user()->department_id)
                         ->get();

                     // add $SciPlan to the view by compact.
                     /*return view('hamshs.forms.administrators.HeadDepsciplan',
                         compact('promotion_reqsForHeadDepartment_Coll'))
                         ->with('i', (request()->input('page', 1) - 1) * 5);*/
        /*                return view('hamshs.forms.sciplan',
                            compact('promotion_reqsForHeadDepartment_Coll', 'SciPlan','papers'))
                            ->with('i', (request()->input('page', 1) - 1) * 5);
                    } elseif ($a->contains('Coll_ResearchPlan_Officer')) {
                        $promotion_reqsForColl_ResearchPlan_Officer = DB::table('users as s')
                            ->select('s.*', 'a.*')
                            ->join('promotion_reqs as a',
                                's.id', '=', 'a.user_id')
                            ->leftJoin('promotion_reqs as a1', function ($join) {
                                $join->on('a.user_id', '=', 'a1.user_id')
                                    ->whereRaw(DB::raw('a.created_at < a1.created_at'));
                            })
                            ->whereNull('a1.user_id')
                            ->where('college_id', Auth::user()->college_id)
                            ->get();
                        //  dd($promotion_reqsForColl_ResearchPlan_Officer);
                        return view('hamshs.forms.sciplan',
                            compact('promotion_reqsForColl_ResearchPlan_Officer', 'SciPlan','papers'))
                            ->with('i', (request()->input('page', 1) - 1) * 5);

                        /*return view('hamshs.forms.administrators.HeadDepsciplan',
                            compact('promotion_reqsForColl_ResearchPlan_Officer'))
                            ->with('i', (request()->input('page', 1) - 1) * 5);*/
        /*   }
           // todo from Friday:
           /*
            * add applicant role scinario:
            */
        /*elseif ($a->contains('Applicant')) {
             // todo following quereies should be moved to the top of this method.

             return view('hamshs.forms.sciplan',
                 compact('SciPlan','papers'))
                 ->with('i', (request()->input('page', 1) - 1) * 5);

             /*return view('hamshs.forms.administrators.HeadDepsciplan',
                 compact('promotion_reqsForColl_ResearchPlan_Officer'))
                 ->with('i', (request()->input('page', 1) - 1) * 5);*/
        /*
            }
        }
        $promotion_reqsForHeadDepartment_Coll = DB::table('users as s')
            ->select('s.*', 'a.*')
            ->join('promotion_reqs as a',
                's.id', '=', 'a.user_id')
            ->leftJoin('promotion_reqs as a1', function ($join) {
                $join->on('a.user_id', '=', 'a1.user_id')
                    ->whereRaw(DB::raw('a.created_at < a1.created_at'));
            })
            ->whereNull('a1.user_id')
            ->where('department_id', Auth::user()->department_id)
            ->get();
        // $reqs = PromotionReq::where('user_id', Auth::user()->id)->get();
        $reqsos = PromotionReq::where('user_id', Auth::user()->id)->latest('created_at')->first();// Q/ last promotion request only
        $reqcolls = College::where('id', Auth::user()->college_id)->get();// Q/ last promotion request only
        $Hams = Hamsh::all();
        $Forms = Form::all();
        return view('hamshs.forms.sciplan', compact('promotion_reqsForHeadDepartment_Coll', 'reqsos', 'Hams', 'Forms', 'reqcolls'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
*/
    }

    public function sciplanlistindex()
    {
        // dd($reqs);
        /*   dd(Auth::user()->roles);*/
        //  dd(Role::get());
        //  dd(Auth::user()->getRoleNames());
        /*       dd(Auth::user->hasRole('HeadDepartment_Coll')) ;*/

        /* @role('HeadDepartment_Coll')
         *
         *
         * @endrole
         */
        $a = Auth::user()->getRoleNames();
        if (count($a) > 0) {
            if ($a->contains('HeadDepartment_Coll')) {
                /*$usersId = DB::table("users")
                    ->where('department_id', Auth::user()->department_id)
                    ->select('id')->distinct()->get()->map(function ($item){return get_object_vars($item);
                    });*/
                /*dd($usersId);*/
                /*  $data = DB::table('promotion_reqs')
                                     ->leftJoin('users', 'promotion_reqs.user_id', '=', 'users.id')
                                     ->select('promotion_reqs.*','users.name',DB::raw('min(promotion_reqs.created_at)'))
                                     ->groupBy('promotion_reqs.user_id')
                                     ->latest()
                                     ->get();
                                 dd($data);*/
                /*                $reqList = PromotionReq::where('user_id', $usersId[0])->orderBy('created_at', 'desc')->first();*/
                /*     foreach ($usersId as $id) {
                         /*                    $reqList = $reqList->concat( PromotionReq::where('user_id', $id)->orderBy('created_at', 'desc')->first());*/
                //  $reqList =  PromotionReq::where('user_id', $id)->latest('created_at')->first();
                /*dd($reqList);
            }

            dd($reqList);

     */       // add for each user loop return latest promotion_reqs
                //->where('promotion_reqs.created_at', latest()->first())->get();
                /*return $reqs;*/


                /*
                request all promotion requests and users using join
                $reqs = DB::table("users")
                    ->join('promotion_reqs', 'promotion_reqs.user_id', '=', 'users.id')
                    ->where('department_id', Auth::user()->department_id)
                    ->get();
                dd($reqs);
                */

                /*  use unique: this return latest promotion request
                $reqs = DB::table("users")
                      ->join('promotion_reqs', 'promotion_reqs.user_id', '=', 'users.id')
                      ->where('department_id', Auth::user()->department_id)
                      ->orderBy('promotion_reqs.created_at', 'desc')->get()->unique('promotion_reqs.user_id');
                     // ->get();
                  dd($reqs);*/

                /* return all recent (latest) promotions requests of indiviual users But not of one department
                 $allRowsNeeded = DB::table("promotion_reqs as s")
                      ->select('s.*')
                      ->leftJoin("promotion_reqs as s1", function ($join) {
                          $join->on('s.user_id', '=', 's1.user_id');
                          $join->on('s.created_at', '<', 's1.created_at');
                      })
                      ->whereNull('s1.user_id')
                      ->get();
                  dd($allRowsNeeded);*/
                /*
                   $allRowsNeeded = DB::table('users as s')
                       ->select('s.*','a.*')
                           ->join('promotion_reqs as a',
                               's.id', '=', 'a.user_id')
                          ->leftJoin('promotion_reqs as a1', function ($join){
                              $join->on('a.user_id', '=', 'a1.user_id')
                                  ->whereRaw(DB::raw('a.created_at < a1.created_at'));
                          })
                       ->whereNull('a1.user_id')
                      ->where('department_id', Auth::user()->department_id)
                    //  ->leftJoin("promotion_reqs as s1", function ($join) {
                      //     $join->on('promotion_reqs.user_id', '=', 's1.user_id');
                        //   $join->on('promotion_reqs.created_at', '<', 's1.created_at');
                       //})
                       //->whereNull('s1.user_id')

                       ->get();
                   dd($allRowsNeeded);
                */
                /*
                join('promotion_reqs', 'promotion_reqs.user_id', '=', 'users.id')
                    ->where('department_id', Auth::user()->department_id)
                    ->orderBy('promotion_reqs.created_at', 'desc')
                    // ->leftJoin("promotion_reqs as s1", function ($join) {
                      //    $join->on('promotion_reqs.user_id', '=', 's1.user_id');
                        //  $join->on('promotion_reqs.created_at', '<', 's1.created_at');
                    //  })
                      //->whereNull('s1.user_id')
                    ->get();
                dd($allRowsNeeded);
*/
                // use groupBy and other equery testings
                /*    $reqs = DB::table("users")
                        ->join('promotion_reqs', 'promotion_reqs.user_id', '=', 'users.id')
                        ->where('department_id', Auth::user()->department_id)
                        ->orderBy('promotion_reqs.created_at', 'desc')
                        //->limit(1)
                        //->orderByDesc('promotion_reqs.created_at')
                        // ->selectRaw('*, MAX(promotion_reqs.created_at)')
                        //->latest('promotion_reqs.created_at')

                        // ->select('promotion_reqs.*','promotion_reqs.user_id',DB::raw('(promotion_reqs.created_at)'))
                        //  ->latest('promotion_reqs.created_at')->get();
                        //->groupBy('promotion_reqs.user_id')
                        //->latest()
                        ->get();
                    dd($reqs);*/
//todo to optimise the following code:
// merege two variable names into one variable name
// "$promotion_reqsForHeadDepartment_Coll" and "$promotion_reqsForCollage
// then in "SciPlanListForAdmins.blade.php" view make one loop only.
                $promotion_reqsForHeadDepartment_Coll = DB::table('users as s')
                    ->select('s.*', 'a.*')
                    ->join('promotion_reqs as a',
                        's.id', '=', 'a.user_id')
                    ->leftJoin('promotion_reqs as a1', function ($join) {
                        $join->on('a.user_id', '=', 'a1.user_id')
                            ->whereRaw(DB::raw('a.created_at < a1.created_at'));
                    })
                    ->whereNull('a1.user_id')
                    ->where('department_id', Auth::user()->department_id)
                    ->get();
                return view('hamshs.forms.administrators.SciPlanListForAdmins',
                    compact('promotion_reqsForHeadDepartment_Coll'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);

            } elseif ($a->contains('Coll_ResearchPlan_Officer')) {
                $promotion_reqsForCollage = DB::table('users as s')
                    ->select('s.*', 'a.*')
                    ->join('promotion_reqs as a',
                        's.id', '=', 'a.user_id')
                    ->leftJoin('promotion_reqs as a1', function ($join) {
                        $join->on('a.user_id', '=', 'a1.user_id')
                            ->whereRaw(DB::raw('a.created_at < a1.created_at'));
                    })
                    ->whereNull('a1.user_id')
                    ->where('college_id', Auth::user()->college_id)
                    ->get();
                return view('hamshs.forms.administrators.SciPlanListForAdmins',
                    compact('promotion_reqsForCollage'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
            }
        }
        /*  //$reqs = PromotionReq::where('user_id',Auth::user()->id)->get();
          $reqsos = PromotionReq::where('user_id', Auth::user()->id)->latest('created_at')->first();// Q/ last promotion request only
          $reqcolls = College::where('id', Auth::user()->college_id)->get();// Q/ last promotion request only
          $Hams = Hamsh::all();
          $Forms = Form::all();
          return view('hamshs.forms.sciplan', compact('reqs', 'reqsos', 'Hams', 'Forms', 'reqcolls'))
              ->with('i', (request()->input('page', 1) - 1) * 5);*/
    }

    public function requestApplyingindex(User $user_id)
    {
      /*  public function sciplanindex(User $user_id)
    {*/
        $user = User::find($user_id)[1];
        $PromotionReqUser = PromotionReq::where('user_id', $user->id)
            ->latest('created_at')->first();
      /*  $SciPlan = SciPlan::where('promotionReqs_id', $PromotionReqUser->id)
            ->get()->first();*/
$request_applying= RequestApplying::where('promotionReqs_id',$PromotionReqUser->id)->get()->first();
        $papers = Paper::where('promotionReqs_id', $PromotionReqUser->id)->get();
        return view('hamshs.forms.PromReq_submissionForm.requestApplying',
            compact( 'request_applying','papers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    /*}*/
        //following code is old version of this method
       /* $reqs = proreq::where('user_id', Auth::user()->id)->get();
        $reqsos = proreq::where('user_id', Auth::user()->id)->latest('created_at')->first();// Q/ last promotion request only
        $reqcolls = College::where('id', Auth::user()->college_id)->get();// Q/ last promotion request only
        $Hams = Hamsh::all();
        $Forms = Form::all();
        return view('hamshs.PromReq_submissionForm.sciplan', compact('reqs', 'reqsos', 'Hams', 'Forms', 'reqcolls'))
            ->with('i', (request()->input('page', 1) - 1) * 5);*/

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


    public function createRequestApplyingHamsh()
    {
        //
        return view('hamshs.forms.PromReq_submissionForm.createRequestApplyingHamsh');

    }
    public function createsciplanForm()
    {
        //todo: find papers of the user.and compact it
        $PromotionReqUser = PromotionReq::where('user_id', Auth::user()->id)
            ->latest('created_at')->first();
        //$papers = Paper::where('promotionReqs_id', $PromotionReqUser->id)->get();
        return $this->returnViewCreateForm($PromotionReqUser->id, null);
        /*        return view('hamshs.forms.createform');*/

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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


        selectData::create($request->all()); //alaa destroye
        /*        proreq::create($request->all());*/
        /*        return auth()->user()->id;*/
        /*        return $request->sci_title;*/
        /*return  $selectData_id=selectData::latest()->id();*/
        /* $form = Form::find($form_id)[0];*/
        /*        $reqsos = proreq::where('user_id',Auth::user()->id)-> latest('created_at')->first();// Q/ last promotion request only*/


       $selectData_id = selectData::latest('created_at')->value('id'); // alaa destroye

        $proreq = PromotionReq::create([
            'user_id' => auth()->user()->id,
          'promotion' => $selectData_id, // alaa destroye  promotion has promotion id while $selectData table has promotion name
           // 'promotion' => $sci_title, // promotion has promotion id while $selectData table has promotion name
            'status' => 0,
        ]);
        //change the route to NewApplicantionBoard

        /*  return redirect()->route('sciplan',)
              ->with('success','Blog created successfully.');*/
        /*$blogs = Hamsh::latest()->paginate(5);
        /*$ProReqs = proreq::all();*/
        /*$data = array('list' => DB::table('pro_reqs')->get());*/


        $reqs = proreq::where('user_id', Auth::user()->id)->get();
        /* latest('upload_time')->first()*/

        $reqsos = proreq::where('user_id', Auth::user()->id)->latest('created_at')->first();// Q/ last promotion request only
        $proreq_id = $reqsos->id;
        /*        return $proreq_id;*/
        $reqcolls = College::where('id', Auth::user()->college_id)->get();// Q/ last promotion request only

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

        return redirect()->route('NewApplicationBoard', compact('reqsos', 'Hams', 'Forms', 'reqcolls'))
            ->with('success', 'Blog created successfully.');


    }

    /**
     * Add a store function to a new table
     */
    public function storef(Request $request)
    {

        //below code is the new coding for the storf method.
        $request->validate([]);
        Paper::create($request->all());
        $HForm_id = Paper::latest('created_at')->value('id');//HFrorm means the hamsh form.

        $HForm = Paper::find($HForm_id);

        $reqsos = PromotionReq::where('user_id', Auth::user()->id)->latest('created_at')->first();// Q/ last promotion request only
        $proreq_id = $reqsos->id;

        $HForm->promotionReqs_id = $proreq_id;

        $HForm->save();
        return redirect()->route('createpapersdata')
            ->with('success', 'Hamsh created successfully.');
        //todo: consider the below code of edit form: //
        //        // $hamsh = Hamsh::find($Ham_id)[0];
        //        $hamsh = $Ham_id;
        //        // $Hams = SciPlan::where('user_id', $user_id)->get();//HFrorm means the hamsh form.
        //
        //        return view('hamshs.forms.editHamshsciplan', compact('hamsh'));

    }

    public function storefH(Request $request)
    {
        // steps adding table content at 15 Feb 23.

        /*      delete the Hamsh::create.
                  Applicant_Id*/
        $request->validate([]);
        SciPlan::create($request->all());
        $HForm_id = SciPlan::latest('created_at')->value('id');//HFrorm means the hamsh form.
        $HForm = SciPlan::find($HForm_id);

        $reqsos = PromotionReq::where('user_id', Auth::user()->id)->latest('created_at')->first();// Q/ last promotion request only
        $proreq_id = $reqsos->id;
        /*  $Hamsh = Hamsh::create($request->all());//
          $Hamsh_id = Hamsh::latest('created_at')->value('id');
          $Hamsh = Hamsh::find($Hamsh_id);*/
        $HForm->promotionReqs_id = $proreq_id;
        $HForm->Applicant_createdAt = Carbon::now();

        $HForm->Applicant_Id = Auth::user()->id;
        /*   'Sci_Dep_Id'
         'Sci_Dep_createdAt'*/
        $HForm->Sci_Dep_createdAt = Carbon::now();

        $HForm->save();
        return redirect()->route('hamshs.forms.sciplanindex', Auth::user()->id)
            ->with('success', 'Hamsh created successfully.');
    }
    public function storeReqApplyingHamsh(Request $request)
    {
        // steps adding table content at 15 Feb 23.

        /*      delete the Hamsh::create.
                  Applicant_Id*/
        $request->validate([]);
        //SciPlan::create($request->all());
        RequestApplying::create($request->all());
        $HForm_id = RequestApplying::latest('created_at')->value('id');//HFrorm means the hamsh form of RequestApplying.
        $HForm = RequestApplying::find($HForm_id);

        $reqsos = PromotionReq::where('user_id', Auth::user()->id)->latest('created_at')->first();// Q/ last promotion request only
        $proreq_id = $reqsos->id;

        $HForm->promotionReqs_id = $proreq_id;
        $HForm->Applicant_createdAt = Carbon::now();

        $HForm->Applicant_Id = Auth::user()->id;
        // check below timestamp is it correct? as it seems it is not store the correct time of head department.
        $HForm->Sci_Dep_createdAt = Carbon::now();

        $HForm->save();
        return redirect()->route('requestApplyingindex', Auth::user()->id)
            ->with('success', 'Hamsh created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Hamsh $hamsh
     * @return \Illuminate\Http\Response
     */
    public function showHamsh(SciPlan $Ham_id)
    {
        //
        $hamsh = $Ham_id;
        return view('hamshs.forms.showHamshsciplan', compact('hamsh'));
    }

    public function show2(Form $form_id)
    {
        //
        $form = Form::find($form_id)[0];
        return view('hamshs.forms.show', compact('form'));
    }

    public function showUser(User $user_id)
    {
        $user = User::find($user_id)[1];
        //  dd($user->id);

        /* $Hams = Hamsh::all();
         $reqs = proreq::where('user_id', Auth::user()->id)->get();
        */
        $PromoId = PromotionReq::where('user_id', $user->id)
            ->latest('created_at')->first();
        $SciPlan = SciPlan::where('promotionReqs_id', $PromoId->id)
            ->get()->first();//HFrorm means the hamsh form.
        //$SciPlan = SciPlan::where('promotionReqs_id', $PromoId->id)->get();//HFrorm means the hamsh form.
        /*dd($PromotionReq);*/
        //$Hams = SciPlan::where('promotionReqs_id', $PromotionReq->id)->get();//HFrorm means the hamsh form.
        // $HForm = SciPlan::find($HForm_id);
        // $Hams= PromotionReq;

        /*return view('hamshs.forms.sciplan', compact('user',
           'SciPlan'
        ))
            ->with('i', (request()->input('page', 1) - 1) * 5);*/

        return redirect()->route('hamshs.forms.sciplanindex', compact('SciPlan'))
            ->with('success', 'The Head department choose a specific user Scientific plan successfully');

        //  return view('admin.user.show', compact('user', 'roles', 'userHasRoles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Hamsh $hamsh
     * @return \Illuminate\Http\Response
     */
    /*public function edit2(Form $form_id)
    {
        $form = Form::find($form_id)[0];
        //
        return view('hamshs.forms.edit', compact('form'));

    }*/
   /* public function edit2(Paper $selected_paperId)
    {

        $spaper = Paper::find($selected_paperId)[0];
        //
        return view('hamshs.forms.createform', compact('spaper'));

    }*/

    public function editPaper(Request $request) {
        $selectedOptionId = $request->input('selected_option');
        $selectedPaper = Paper::find($selectedOptionId);
        //todo: how to delete following lines to find papers and make this
        // method call (the method of call createform blade in this controller)
        // method
        $PromotionReqUser = PromotionReq::where('user_id', Auth::user()->id)
            ->latest('created_at')->first();
        //$papers = Paper::where('promotionReqs_id', $PromotionReqUser->id)->get();
        return $this->returnViewCreateForm($PromotionReqUser->id, $selectedPaper);
//        return view('hamshs.forms.createform', ['option' => $selectedOption],
//        compact('papers'));
    }


    public function editHamshsciplan(SciPlan $Ham_id)
    {
        //
        // $hamsh = Hamsh::find($Ham_id)[0];
        $hamsh = $Ham_id;
        // $Hams = SciPlan::where('user_id', $user_id)->get();//HFrorm means the hamsh form.

        return view('hamshs.forms.editHamshsciplan', compact('hamsh'));
    }

    public function fillOutPaper(User $user_id)
    {
        //
        // $hamsh = Hamsh::find($Ham_id)[0];
        $hamsh = $Ham_id;
        // $Hams = SciPlan::where('user_id', $user_id)->get();//HFrorm means the hamsh form.

        return view('hamshs.forms.editHamshsciplan', compact('hamsh'));
    }

    public function edit(Hamsh $hamsh)
    {
        //
        return view('hamshs.edit', compact('hamsh'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hamsh $hamsh
     * @return \Illuminate\Http\Response
     */
   /* public function update2(Request $request, Form $form_id)
    {
        $form = Form::find($form_id)[0];
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $form->update($request->all());

        return redirect()->route('hamshs.forms.sciplanindex')
            ->with('success', 'The Scientific plan Form is updated successfully');
    }*/
    public function updatePaper(Request $request) {
        $optionId = $request->input('option_id');
        $option = Paper::find($optionId);
       // $option->paper_title = $request->input('paper_title');
       // $option->publish_date = $request->input('publish_date'); it does not work with date as with below singuleAuther.
        //$option->singleAuther = $request->input('singleAuther');
        $option->update($request->all());

        $option->singleAuther = $request->has('singleAuther');
        $option->Ispubished = $request->has('Ispubished');
        $option->takenFromStdut_thesis = $request->has('takenFromStdut_thesis');
        $option->exact_specialization = $request->has('exact_specialization');
        $option->general_specialization = $request->has('general_specialization');
        $option->Is_paper_fromApplTheses = $request->has('Is_paper_fromApplTheses');
        $option->Is_paperRelated_CoAuther = $request->has('Is_paperRelated_CoAuther');
        $option->Is_paper_AppSuperlTheses = $request->has('Is_paper_AppSuperlTheses');
        $option->Is_paperRelated_CoAuther_Sup = $request->has('Is_paperRelated_CoAuther_Sup');
        $option->Is_paper_CoSuperTheses = $request->has('Is_paper_CoSuperTheses');
        $option->Is_paperRelated_CoSuper = $request->has('Is_paperRelated_CoSuper');
        $option->Is_paper_CoTheses = $request->has('Is_paper_CoTheses');
        $option->Is_paperRelated_CoTheses = $request->has('Is_paperRelated_CoTheses');
        $option->Is_paper_OldProm = $request->has('Is_paper_OldProm');
        $option->Is_paperRelated_CoAuther_OldProm = $request->has('Is_paperRelated_CoAuther_OldProm');
        $option->Is_paper_From_Others = $request->has('Is_paper_From_Others');
        $option->Is_paperRelated_CoAuther_From_Others = $request->has('Is_paperRelated_CoAuther_From_Others');
        $option->sabbaticalLeave = $request->has('sabbaticalLeave');
        $option->supportedPaper = $request->has('supportedPaper');
        $option->Is_suppPaper_In_SciPlan = $request->has('Is_suppPaper_In_SciPlan');


        $option->save();

         return redirect()->route('NewApplicationBoard')
             ->with('success', 'The Scientific plan Form is updated successfully');
/*        return redirect()->back()->with('success', 'Option updated successfully');*/
    }


    public function updateHamshsciplan(Request $request, SciPlan $hamsh_id)
    {

        // $hamsh = SciPlan::find($hamsh_id)[0];
        $hamsh = $hamsh_id;

        $request->validate([
            'Applicant_hamsh' => 'required',
            // 'description' => 'required',
        ]);
        $hamsh->Sci_Dep_Id = Auth::user()->id;
        $hamsh->Sci_Dep_createdAt = Carbon::now();
        $hamsh->update($request->all());
        $hamsh->official_Id = Auth::user()->id;
        $hamsh->official_createdAt = Carbon::now();
        $hamsh->update($request->all());
        $SciPlan = $hamsh;
        $PromotionReq = PromotionReq::where('id', $SciPlan->promotionReqs_id)->latest('created_at')->first();
        $user_id = $PromotionReq->user_id;
        return redirect()->route('hamshs.forms.sciplanindex', compact('user_id'))
            ->with('success', 'The Head department choose a specific user Scientific plan successfully');

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
            ->with('success', 'Blog updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Hamsh $hamsh
     * @return \Illuminate\Http\Response
     */
    public function destroyHamshsciplan(Hamsh $hamsh)
    {
        //
        $hamsh->delete();

        return redirect()->route('hamshs.forms.sciplanindex')
            ->with('success', 'Hamshs deleted successfully');
    }

    public function destroy(Hamsh $hamsh)
    {
        //
        $hamsh->delete();

        return redirect()->route('hamshs.index')
            ->with('success', 'Blogs deleted successfully');
    }

    public function destroy2(Form $form_id)
    {
        //
        $form = Form::find($form_id)[0];

        $form->delete();

        return redirect()->route('hamshs.forms.sciplanindex')
            ->with('success', 'Form of Scientific plan is deleted successfully');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function returnViewCreateForm($id, $selectedPaper=null)
    {
        $papers = Paper::where('promotionReqs_id', $id)->get();
        return view('hamshs.forms.createform',
            compact('papers', 'selectedPaper')) // how the option hold a selected paper? as in method definition = null
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
