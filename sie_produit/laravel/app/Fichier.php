<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichier extends Model {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fichiers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'path', 'type','visible'];

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

    public function enseignant(){
        return $this->belongsTo('App\Enseignant','ens_id');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    /**
     * Les Méthodes pour manipuler
     */
    //TODO : une seul méthode avec un paramètre de plus : visibile
    public function toDB($user,$nom,$url,$extension,$visible){
        $this->name = $nom;
        $this->path = $url;
        $this->visible = $visible;
        $this->type = $extension;
        //TODO : add null à la place de 1 for ens
        $ens = Enseignant::where('id', '=',1)->firstOrFail();
        $this->user()->associate($user);
        $this->enseignant()->associate($ens);
        $this->push();
    }
}
