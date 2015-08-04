<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password','verification_code','tel','cin','siga','groupe','ddn','is_verified'];

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
        return $this->hasMany('App\Fichier','user_id');
    }
    public function service(){
        return $this->hasMany('App\Service','user_id');
    }
    public function moduleInsc(){
        return $this->belongsToMany('App\Module',"inscriptions")->withTimestamps();
    }
    public function moduleEval(){
        return $this->belongsToMany('App\Module',"evaluations")->withTimestamps();
    }
    public function intervention(){
        return $this->belongsToMany('App\Intervention',"absences")->withTimestamps();
    }

    public function toDB($request){
        $error = false;
        switch($request['data']){
            case 'tel':  $this->tel = $request['name'];
                $this->save();
                break;
            case 'cin':  $this->cin = $request['name'];
                $this->save();
                break;
            case 'siga':  $this->siga = $request['name'];
                $this->save();
                break;
            case 'groupe':  $this->groupe = $request['name'];
                $this->save();
                break;
            case 'email':
                $ok = DB::table('users')
                    ->where('email', '=', $request['name'])
                    ->get();
                if(!$ok) {
                    $confirmation_code = str_random(30);
                    User::mailTo($request['name'], $confirmation_code);
                    $this->verification_code = $confirmation_code;
                    $this->email = $request['name'];
                    $this->is_verified = 0;
                    $this->save();
                }
                else $error = true;
                break;
        }
        return $error;
    }

    public static function mailTo($email,$code){
        //TODO : -> à la fin du projet : modifier "to" par $email and name....
        Mail::send('emails.verify', ['confirmation_code' => $code], function($message) {
            $message->to('ilyaschaoua@gmail.com', 'ilyas')
                ->subject('SIE : Verification de votre email');
        });
    }

    /**
     * Display a the chart for projects.
     * GET /Progression
     *
     * 1 - récuperer les modules et leur coeffe groupé par semestre pour l' étudiant authentifié
     * 2 - calculer la moyenne des modules
     * 3 - transmeter [semestre x ,moyenne x]
     *
     * @return Response
     */

    public function isAdmin_pfe(){
        if($this->email == 'admin_pfe@admin.com') return true;
        return false;
    }
    public function isAdmin_services(){
        if($this->email == 'admin_services@admin.com') return true;
        return false;
    }

    public function moyenneParSemestre(){
        $evals = DB::table('evaluations')->select(DB::raw('users_id,modules_id,note,coeffe,semestre,type,YEAR(created_at) as year'))
                                        ->where('users_id', $this->id)
                                        ->get();

        $moys3 = 0;
        $moys4 = 0;
        $moys5 = 0;
        $moys6 = 0;
        foreach ($evals as $eval) {
            //var_dump($eval);
            $note = $eval->note;
            $coeffe = $eval->coeffe;
            $type = $eval->type;
            $semestre = $eval->semestre;
            $year = $eval->year;
            if (date("Y") == $year AND $note != 99) {
                switch ($semestre) {
                    case 's3':
                        $cf=$cc=$tp=0;
                        switch($type){
                            case 'cf' : $cf = $note*$coeffe;
                                break;
                            case 'cc' : $cc = $note*$coeffe;
                                break;
                            case 'tp' : $tp = $note*coeffe;
                                break;
                        }
                        $moys3 = $moys3 + ($cf+$cc+$tp);
                        break;
                    case 's4':
                        $cf=$cc=$tp=0;
                        switch($type){
                            case 'cf' : $cf = $note*$coeffe;
                                break;
                            case 'cc' : $cc = $note*$coeffe;
                                break;
                            case 'tp' : $tp = $note*coeffe;
                                break;
                        }
                        $moys4 = $moys4 + ($cf+$cc+$tp);
                        break;
                    case 's5':
                        $cf=$cc=$tp=0;
                        switch($type){
                            case 'cf' : $cf = $note*$coeffe;
                                break;
                            case 'cc' : $cc = $note*$coeffe;
                                break;
                            case 'tp' : $tp = $note*coeffe;
                                break;
                        }
                        $moys5 = $moys5 + ($cf+$cc+$tp);
                        break;
                    case 's6':
                        $cf=$cc=$tp=0;
                        switch($type){
                            case 'cf' : $cf = $note*$coeffe;
                                break;
                            case 'cc' : $cc = $note*$coeffe;
                                break;
                            case 'tp' : $tp = $note*coeffe;
                                break;
                        }
                        $moys6 = $moys6 + ($cf+$cc+$tp);
                        break;
                }
            }
        }
        $res = ['s3' => User::verify($moys3),'s4' => User::verify($moys4),'s5' => User::verify($moys5),'s6' => User::verify($moys6)];
        //var_dump($res);
        return $res;
    }
    private static function verify($moy){
        if($moy > 0 AND $moy < 20){
        return $moy;
        }
        return 0;
    }

    public function courParSemestre(){
        $cours = DB::table('inscriptions')->select(DB::raw('users_id,modules_id,semestre,validation,groupe,YEAR(created_at) as year'))
            ->where('users_id', $this->id)
            ->get();
        $s3 = $s4 = $s5 = $s6 =array();
        foreach ($cours as $cour) {
            //var_dump($eval);
            $id_module = $cour->modules_id;
            $name = Module::find($id_module)->name;
            $semestre = $cour->semestre;
            $etat = $cour->validation;
            $annee = $cour->year;

            if (date("Y") == $annee) {
                switch ($semestre) {
                    case 's3':
                        $s3 = array_add($s3,$name,$etat);
                        break;
                    case 's4':
                        $s4 = array_add($s4,$name,$etat);
                        break;
                    case 's5':
                        $s5 = array_add($s5,$name,$etat);
                        break;
                    case 's6':
                        $s6 = array_add($s6,$name,$etat);
                        break;
                }
            }
        }
        $res = ['s3' => $s3,'s4' =>  $s4,'s5' => $s5,'s6' => $s6];
        //var_dump($res);
        return $res;
    }

    public function getAbsences(){
        $modPabs = array();
        $liste_interventionsAbs = DB::table('absences')->where('users_id',$this->id)->lists('interventions_id');
        foreach($liste_interventionsAbs as $item){
            $tab = User::getInfo($item);
            $nbabs = 1;
            foreach($tab as $heureTotal => $mod){
                // 2/3 <=> 60/90 <=> nombre seance * minutes / minutes dans la seance
                $seanceTotal = $heureTotal*2/3;
                if(!User::inA($mod,$modPabs)){
                     $modPabs = array_add($modPabs, $mod,$nbabs/$seanceTotal);
                }else{
                    $modPabs[$mod] +=  1 /$seanceTotal;
                }
            }
        }
        //var_dump($modPabs);
        return $modPabs;
    }
    public static function inA($key,$array){
        foreach($array as $k => $v){
            if($key == $k){
                return true;
            }
        }
        return false;
    }
    public static function getInfo($id_inter){
        $infos = DB::table('interventions')->select(DB::raw('modules_id, nombreHeure'))
            ->where('id', $id_inter)
            ->get();
        $res = array();
        foreach($infos as $info){
            $name = Module::find($info->modules_id)->name;
            $res = array_add($res,$info->nombreHeure,$name);
        }
        return $res;
    }
    public function inscris6(){
        $query = DB::table('inscriptions')->select(DB::raw('semestre'))
            ->where('users_id', $this->id)
            ->where('semestre','s6')
            ->get();
        if($query != null) return true;
        return false;
    }
    public static function rederiger(){
        return redirect()->route('errors');
    }

    public function upload($file){
                //Get File info
                $nom = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $storein =public_path() .'\fichier_img\\' . $nom;
                $local = '\fichier_img\\' . $nom;
                $data = File::get($file);
                File::put($storein, $data);
                //Store the file in data base
                $entry = new Fichier();
                $entry->toDB($this, $nom, $local, $extension,0);
    }


}
