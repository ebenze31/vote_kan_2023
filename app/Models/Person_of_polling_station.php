<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person_of_polling_station extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'person_of_polling_stations';

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
    protected $fillable = ['amphoe', 'tambon', 'polling_station_at', 'quantity_person'];

    
}
