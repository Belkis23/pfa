<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';

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
                  'section_id',
                  'neveau'
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
     * Get the section for this model.
     *
     * @return App\Models\Section
     */
    public function section()
    {
        return $this->belongsTo('App\Models\Section','section_id');
    }



}
