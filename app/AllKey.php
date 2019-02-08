<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllKey extends Model
{
    protected $table = 'csvdatas';
    
    protected $primaryKey = 'check_date' && 'grc_keyword';

}
