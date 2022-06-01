<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    use HasFactory;
    protected $table="accountings";
    protected $guarded = [];
   // protected $fillable=["user_id"];
    public function users()
    {
        return   $this->belongsTo(User::class,"user_id");
    }


}
