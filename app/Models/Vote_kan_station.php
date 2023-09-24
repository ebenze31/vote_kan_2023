<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote_kan_station extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vote_kan_stations';

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
    protected $fillable = ['name', 'phone', 'phone_2', 'province', 'amphoe', 'area', 'tambon', 'polling_station_at', 'user_id', 'name_user', 'amount_add_score', 'quantity_person'];

    
}
