<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manufacturers extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'capital',
        'found_at',
        'national',
        'created_at',
        'updated_at'
    ];
    public function catalogs(){
        return $this->hasMany("App\Models\catalogs", 'mid');
    }
    public function delete()
    {
        $this->catalogs()->delete();
        return parent::delete();
    }
    public function scopeAllnational($query)
    {
        $query->select('national')->groupBy('national');
    }
    public function scopenational($query, $pos)
    {
        $query->where('national', '=', $pos)->orderBy('national');
    }
    public function scopeSenior($query)
    {
        $query->where('capital', '>', 90)
            ->orderBy('capital');
    }
}
