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
}
