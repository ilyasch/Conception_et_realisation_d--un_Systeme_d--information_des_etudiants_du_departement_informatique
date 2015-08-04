<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

	//
    protected $table = 'modules';
    protected $primaryKey = 'id';
    protected $fillable = array('name','option','semestre');


    public function userInsc(){
        return $this->belongsToMany('App\User',"inscriptions")->withTimestamps();
    }
    public function userEval(){
        return $this->belongsToMany('App\User',"evaluations")->withTimestamps();
    }
    public function intervention(){
        return $this->hasMany('App\Intervention');
    }
    public function module(){
        return $this->belongsToMany('App\Module',"module_module");
    }

    public static function convertir($sem){
    $value0 = str_contains($sem,'s3');
        if($value0){ $sem = 'Semestre 3';
        return $sem;}

    $value1 = str_contains($sem,'s4');
    if($value1){ $sem = 'Semestre 4';
    return $sem;}

    $value2 = str_contains($sem,'s5');
    if($value2){ $sem = 'Semestre 5';
    return $sem;}

    $value3 = str_contains($sem,'s6');
    if($value3) {$sem = 'Semestre 6';
    return $sem;}

    }
}
