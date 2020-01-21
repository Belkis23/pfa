<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'etudiants';

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
                  'prenom',
                  'cin',
                  'telephone',
                  'adresse',
                  'classe_id',
                  'email',
                  'password',
                  'photo'
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
     * Get the classe for this model.
     *
     * @return App\Models\Classe
     */
    public function classe()
    {
        return $this->belongsTo('App\Models\Classe','classe_id');
    }



}
