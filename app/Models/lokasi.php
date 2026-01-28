<?php

namespace App\Models;
use App\Models\Event;

use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    protected $table = 'lokasi'; 
    protected $fillable = ['nama_lokasi'];

   public function events()
{
    return $this->hasMany(Event::class);
}
}
