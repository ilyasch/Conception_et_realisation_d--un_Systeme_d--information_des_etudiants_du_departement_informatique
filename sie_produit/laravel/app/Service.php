<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Service extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'date_limite', 'type_demande','filiere'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Les associations des tables
     */
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function toDB($array){
        if(($array['email'] == Auth::user()->email) AND ($array['code'] == Auth::user()->siga ) ){
            $this->user()->associate(Auth::user());
            $this->date_limite = $array['dl'];
            $this->filiere = $array['filiere'];
            if ($array['type'] == 1)
                $this->type_demande = "attestaion";
            elseif ($array['type'] == 2)
                $this->type_demande = "relevé";
            else
                $this->type_demande = "attestaion et relevé";
            $this->push();
        }
    }
    public function getAbsences(){
        $liste_service =DB::table('services')->join('users', 'user_id', '=', 'users.id')
            ->get();
        //var_dump($liste_service);
        return $liste_service;
    }


}
