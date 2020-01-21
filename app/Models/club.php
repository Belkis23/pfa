<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class club extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clubs';

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
                  'name',
                  'etudiant_id',
                  'photo',
                  'mombre'
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
     * Get the etudiant for this model.
     *
     * @return App\Models\Etudiant
     */
    public function etudiant()
    {
        return $this->belongsTo('App\Models\Etudiant','etudiant_id');
    }



}
