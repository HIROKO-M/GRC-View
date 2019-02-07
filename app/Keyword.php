<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $table = 'keywords';
    
    protected $fillable = [
        'keyword', 
        'site_name', 
        'site_url',
        'check_date'
        ];
    
    public function gdatas()
    {
        return $this->hasMany(Gdata::class);
    }
}
