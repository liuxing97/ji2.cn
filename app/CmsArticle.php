<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsArticle extends Model
{
    //
    public function archiveName(){
        return $this -> belongsTo('App\CmsArchive','archive','id');
    }
}
