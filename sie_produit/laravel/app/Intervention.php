<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model {

	//

    protected $table = 'interventions';
    protected $primaryKey = 'id';
    protected $fillable = array('type','nombreHeure');

    /**
     * Associations
     */

    public function user(){
        return $this->belongsToMany('App\User',"absences")->withTimestamps();
    }
    public function enseignant(){
        return $this->belongsTo('App\Enseignant');
    }
    public function module(){
        return $this->belongsTo('App\Module');
    }
}
