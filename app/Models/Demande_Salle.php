<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande_Salle extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'demande__salles';

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
    protected $fillable = [
                  'Club_id',
                  'Salle_id',
                  'date',
                  'Start',
                  'End'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the club for this model.
     *
     * @return App\Models\Club
     */
    public function club()
    {
        return $this->belongsTo('App\Models\Club','Club_id');
    }

    /**
     * Get the salle for this model.
     *
     * @return App\Models\Salle
     */
    public function salle()
    {
        return $this->belongsTo('App\Models\Salle','Salle_id');
    }



}
