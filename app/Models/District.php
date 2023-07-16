<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';
    protected $fillable = ['id', 'name_uz'];
    public $timestamps = false;

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function polyclinics()
    {
        return $this->hasMany(Polyclinic::class);
    }
}
