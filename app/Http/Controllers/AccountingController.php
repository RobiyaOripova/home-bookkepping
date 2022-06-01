<?php

namespace App\Http\Controllers;
use App\Models\Accounting;
use App\Models\User;
use App\Http\Requests\AccountingRequest;

use App\Services\AccountingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=auth()->user()->id;
        $first=new AccountingService();
        $data=$first->accountIndex($id);
        return $data;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {


        return view("auth.profile");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function help($r){
        $id=auth()->user()->id;
        $first=new AccountingService();
        $data= $first->accountMulti($r,$id);
        return $data;

    }
    public function store(AccountingRequest $request)
    {

        $data=$this->help($request);
        Accounting::create($data);
        return redirect()->route("table-show");


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Accounting $accounting)
    {
        return view("auth.edit",[
            "accountings"=>$accounting
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountingRequest $request, Accounting $accounting)
    {

        $data=$this->help($request);
        $accounting->update($data);
        return redirect()->route("table-show");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accounting $accounting)
    {
        $accounting->delete();
        return redirect()->route("table-show");

    }

}