<?php

namespace App\Services;
use App\Models\Accounting;

class AccountingService{

    public  function accountIndex($id){
        $accounting= Accounting::where("user_id",$id)->paginate(10);
        return view("auth.create",[
            "accountings"=>$accounting

        ]);

    }
    public function accountMulti($req,$id){
        $data=$req->validated();
        $data["user_id"]= $id;
        return $data;
    }


}
