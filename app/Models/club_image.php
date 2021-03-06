<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class club_image extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'club_images';

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
                  'post_id',
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
     * Get the club for this model.
     *
     * @return App\Models\Club
     */
    public function club()
    {
        return $this->belongsTo('App\Models\Club','club_id');
    }



}
