<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote_kan_score extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vote_kan_scores';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['vote_kan_stations_id', 'user_id', 'number_1', 'number_2', 'amphoe', 'last'];

    public function vote_kan_station(){
        return $this->belongsTo('App\Models\Vote_kan_station', 'vote_kan_stations_id' , 'id'); 
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id' , 'id'); 
    }
    
}
