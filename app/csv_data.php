<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class csv_data extends Model
{
   protected $table = 'csv_datas';
    protected $fillable = ['csv_filename', 'csv_header', 'csv_data'];

}
