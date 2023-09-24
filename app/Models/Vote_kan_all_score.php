<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote_kan_all_score extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vote_kan_all_scores';

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
    protected $fillable = ['name_amphoe', 'number_1', 'number_2', 'Amount_person'];

    
}
