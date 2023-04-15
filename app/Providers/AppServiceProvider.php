<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        View::composer(['hamshs.forms.administrators.SciPlanListForAdmins',
            'hamshs.forms.administrators.RequestApplyingListForAdmins'],
            function ($view) {
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
                $view->with(['promotion_reqsForHeadDepartment_Coll' => $promotion_reqsForHeadDepartment_Coll,
                    'promotion_reqsForCollage' => $promotion_reqsForCollage]);

        });

    }
}
