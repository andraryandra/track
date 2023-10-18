<?php

namespace App\Models;

use App\Traits\UUID;
use App\Models\CategorySurvey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory, UUID;
    protected $casts = [
        'polygon' => 'array'
    ];

    protected $fillable = [
        'category_id',
        'name',
        'latitude',
        'longitude',
        'link_survey',
        'polygon',
        'description',
        'poin',
    ];

    public function categori()
    {
        return $this->belongsTo(CategorySurvey::class, 'category_id');
    }
}
