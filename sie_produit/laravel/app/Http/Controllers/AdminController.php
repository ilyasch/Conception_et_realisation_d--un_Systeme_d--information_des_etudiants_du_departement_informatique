<?php namespace App\Http\Controllers;

use App\Enseignant;
use App\Fichier;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Service;
use App\Tag;
use App\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use PhpParser\Node\Scalar\MagicConst\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $rows = $_POST['nombre'];
        for ($i=1; $i<=$rows;$i++) {
            //$_POST['nom1'.$i];
            //$_POST['nom2'.$i];
            $id = 0;
            $ens = "";
            if (isset($_POST['id' . $i])){
                $id = $_POST['id' . $i];
                $ens = $_POST['ens' . $i];
                DB::table('pfe')
                    ->where('id', $id)
                    ->update(array('ens' => $ens));
            }
        }
        //print
        $pfes = DB::table('pfe')->select(DB::raw('id,nom1,nom2,code1,code2,email1,email2,ens,YEAR(created_at) as year'))
            ->where('ens','!=','no')
            ->get();

        $tab = array();
        foreach($pfes as $pfe){
            if(date("Y") == $pfe->year){
                $info[0] = $pfe->nom1;
                $info[1] = $pfe->nom2;
                $info[2] = $pfe->ens;
                $info[3] = $pfe->code1;
                $info[4] = $pfe->code2;
                $info[5] = $pfe->email1;
                $info[6] = $pfe->email2;
                $tab = array_add($tab,$pfe->id,$info);
            }
        }
            $view = \Illuminate\Support\Facades\View::make('includes.print_pfe')->with('res' ,$tab);
            $name = 'pfe_le_'.date("Y-m-d-s");
            $pdf = App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
            $pdf->loadHTML($view)->save(public_path()."/pfe_storage/$name.pdf");
            return $pdf->stream();
    }
	/**
	 * Display the specified resource.
	 */
	public function show()
	{
        $pfes = DB::table('pfe')->select(DB::raw('id,nom1,nom2,YEAR(created_at) as year'))
            ->where('ens', 'no')
            ->get();
        $nmb =0;
        $tab = array();
        foreach($pfes as $pfe){
            if(date("Y") == $pfe->year){
                $nom[0] = $pfe->nom1;
                $nom[1] = $pfe->nom2;
                $tab = array_add($tab,$pfe->id,$nom);
                $nmb++;
            }
        }
        $enss = DB::table('enseignants')->lists('name');

        return view('includes.affecter',compact('tab','enss','nmb'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function serv()
    {
        $service = new Service();
        $user = $service->getAbsences();

        $view = \Illuminate\Support\Facades\View::make('includes.admin_services',compact('user'));

        $pdf = App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
        $pdf->loadHTML($view);
        return $pdf->stream();
    }



    public function form(){
        $entries = Fichier::all();
        return view('includes.upload',compact('entries'));
    }

    public function upload(){
        //Store file OnUpload
        if (\Illuminate\Support\Facades\Request::hasFile('filefield')) {
            try {
                //Get File info
                $file = \Illuminate\Support\Facades\Request::file('filefield');
                $nom = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $url = $file->getFilename() . Auth::user()->name .'.'.$extension;
                $storein =public_path() .'\store\\' . $nom;
                $local = '\store\\' . $nom;
                $data = \Illuminate\Support\Facades\File::get($file);
                \Illuminate\Support\Facades\File::put($storein, $data);

                //Store the file in data base
                $entry = new Fichier();
                $entry->toDB(Auth::user(), $nom, $local, $extension,1);

                //creata a tag => associate au tag to fichier
                $keys = $_POST['keys'];
                if($find = Tag::find(1)->where('tag',$keys)->first()){
                    $entry->tags()->save($find);
                }else {
                    $tag = new Tag(array('tag' => $keys));
                    $entry->tags()->save($tag);
                }
            }catch(FileException $e){
                Response::json(array('filelink' => 'upload_file' . $entry->nom . '--' . $e));
            }

            //Excel handle
            /*
            if(isset($_POST['Excel'])){
                Excel::load($storein, function ($reader) {
                    $result = $reader->get();

                    foreach ($result as $key => $value) {
                        echo $value->id . '--';
                        echo $value->nom . '--';
                        $note = ($value->cc * 0.25) + ($value->tp * 0.25) + ($value->cf * 0.5);
                        echo $note . '<br>';
                    }
                });
            }*/
            return redirect('upload');
        }
    }
    public function images(){
        return view('includes.get_image');
    }
    public function userToFichier(){
        $email = Input::get('email');
        $etd = User::where('email',$email)->first();
        $fichier = Fichier::where('user_id',$etd->id)->first();
        $path = $fichier->path;
        return view('includes.get_image',compact('path'));
    }


}
