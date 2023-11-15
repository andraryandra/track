<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey_Histories extends Model
{
    use HasFactory, UUID;
    protected $table = 'survey_histories';

    protected $fillable = [
        'id',
        'user_id',
        'survey_id',
        'click_date',
    ];

    public function survey()
    {
        return $this->belongsTo(\App\Models\Survey::class, 'survey_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
