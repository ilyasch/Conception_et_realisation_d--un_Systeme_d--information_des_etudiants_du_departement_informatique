<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'enseignants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password','tel','cin','grade','matiere_de_specialite','ddn','is_verified'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Les associations des tables
     */
    public function fichier(){
        return $this->hasMany('App\Fichier','ens_id');
    }
    public function intervention(){
        return $this->hasMany('App\Intervention','ens_id');
    }



}
