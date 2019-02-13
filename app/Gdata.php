<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gdata extends Model
{
    protected $table = 'impdatas';
    
    public $timestamps = true;
    

    protected $fillable = [
        'check_date',
        'grc_site_name', 
        'grc_site_url', 
        'grc_keyword', 
        'y_rank', 
        'y_change', 
        'y_count', 
        'y_url', 
        
        ];
    

}
