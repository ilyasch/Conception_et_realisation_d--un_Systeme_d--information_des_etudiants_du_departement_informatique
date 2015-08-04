<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model {

    protected $table = 'tags';

    protected $primaryKey = 'id';

    protected $fillable = ['tag'];

    public function fichiers()
    {
        return $this->belongsToMany('App\Fichier','fichier_tag', 'fichier_id', 'tag_id');
    }

    /**
     * Méthodes
     */
    public  function rechercher($text){
        //selectionner la tag à l input
        //TODO: rechercher par pls tags : soit par like ou express régulir
        $tags = DB::table('tags')->select(DB::raw('id,tag'))
            ->where('tag','LIKE', "{$text}")
            ->get();

        $id_tag = 0;
        foreach($tags as $tag) {
            //var_dump($tag);
            $id_tag = $tag->id;
        }
        //RECUPERE LES FICHIERS ASSOCIE au tags
            //$fichiers  =  $this->fichiers()->where('tag_id','=',$id)->get();
        $fichiers = DB::table('fichier_tag')->select(DB::raw('fichier_id'))
                                            ->where('tag_id','=',$id_tag)
                                            ->get();
        //var_dump($fichiers);
        return $fichiers;
    }

}
