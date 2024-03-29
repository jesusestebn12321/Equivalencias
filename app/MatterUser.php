<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class MatterUser extends Model
{
	protected $table='matter_users';
    protected $fillable = ['id','slug','matter_id','user_id','type'];
   
   public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }
    public function matter(){
    	return $this->belongsTo(Matter::class,'matter_id');
    }
}
