<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySurvey extends Model
{
    use HasFactory, UUID;
    protected $fillable = [
        'name',
        'description',
        'icon',
    ];

    public function survey()
    {
        return $this->hasMany(Survey::class, 'category_id', 'id');
    }
}
