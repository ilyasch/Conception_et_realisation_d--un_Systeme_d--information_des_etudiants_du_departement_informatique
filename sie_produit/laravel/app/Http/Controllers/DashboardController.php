<?php namespace App\Http\Controllers;

use App\Enseignant;
use App\Fichier;

use App\Http\Requests\PfeFormRequest;
use App\Http\Requests\ProfileFormRequest;
use App\Http\Requests\ServiceFormRequest;
use App\Module;
use App\Service;
use App\Tag;
use App\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use \Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class DashboardController extends Controller {


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Fonctions de Base
     */
    public function lister(){
        $entries = Fichier::where('visible','!=',0)->get();
        return view('includes.telecharger',compact('entries'));
    }

    public function profile(){
        return view('includes.profile_form');
    }

    public function profile_store(ProfileFormRequest $request)
    {
        $user = Auth::user();
        if ($user->email == $request->email) {
            $error = $user->toDB($request->all());
            if($error == false){
                return redirect()->route('/')->with('message', 'Vos modification seront bientôt enregistrer!');
            }else
                return redirect()->route('profile')->with('message', 'Vous ne pouvez pas avoir deux emails');
        }else
            return redirect()->route('profile')->with('message', 'Vos modifications sont incorrects veuillez essayer à nouveau ');
    }

    public function services(){
        return view('includes.attestation_form');
    }
    public function services_store(ServiceFormRequest $request){
        $service = new Service();
        $service->toDB($request->all());
        return redirect()->route('/')->with('message', 'Vos modifications sont enregistrées avec succès ');
    }

    public function emploi(){
        return view('includes.emploi',compact('link'));
    }
    public function getEmploi($id){
        $file= public_path(). "/emplois/".$id.".pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, $id.'.pdf', $headers);
    }

    public function prog(){
        $user = Auth::user();
        $data['semPmoy'] = $user->moyenneParSemestre();
        return view('includes.prog')->with($data);
    }
    public function rechercher(){
        $tag = new Tag();
        $fichiers = $tag->rechercher($_POST['rechercher']);
        //var_dump($fichiers);
        $res = array();
        foreach($fichiers as $fich){
            $id_fichier = $fich->fichier_id;
            $name = Fichier::find($id_fichier)->name;
            $path = Fichier::find($id_fichier)->path;
            $res[$name] = ['path' => $path];
        }
        //var_dump($res);
        return view('includes.recherche',compact('res'));

    }
    public function courParSemestre(){
        $user = Auth::user();
        $semPcour = $user->courParSemestre();

        $etd = User::count();
        $fich = Fichier::count();
        $ens = Enseignant::count();
        $mod = Module::count();


        return view('welcome',compact('semPcour'))->with('etd',$etd)->with('fich',$fich)->with('ens',$ens)->with('mod',$mod);
    }
    public function absences(){
        //il faur que : users_id and interventios_id and timestamp be primaries
            $user = Auth::user();
            $x = $user->getAbsences();
            return view('includes.absences',compact('x'));
    }
    public function pfe(){
        return view('includes.pfe_form');
    }


    public function pfe_post(PfeFormRequest $request){

        $nom1 = $request->get('InputName');
        $code1 = $request->get('Inputcode');
        $email1 = $request->get('Inputemail');

        $nom2 = $request->get('Inputbinome');
        $code2 = $request->get('Inputcodebinome');
        $email2 = $request->get('Inputemailbinome');

        $ok1 = User::where('email',$email1)->where('siga',$code1)->first();
        $ok2 = User::where('email',$email2)->where('siga',$code2)->first();

        if($ok1 != null AND $ok2 != null){
            $id = DB::table('pfe')->insertGetId(
                array('nom1' => $nom1, 'code1' => $code1, 'email1' => $email1, 'nom2' => $nom2, 'code2' => $code2, 'email2' => $email2)
            );
            if ($id){
                $view = View::make('includes.print')->with('nom1', $nom1)
                    ->with('code1', $code1)
                    ->with('email1', $email1)
                    ->with('nom2', $nom2)
                    ->with('code2', $code2)
                    ->with('email2', $email2)
                    ->with('cin1', $ok1->cin)
                    ->with('cin2', $ok2->cin);
                $pdf = App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
                $pdf->loadHTML($view);
                return $pdf->stream();
            }
        }else{
            return redirect()->route('/')->with('error', 'Vos codes et e-amils ne figurent pas dans la base de données!');
        }
    }


}
