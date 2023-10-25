<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Survey extends Model {
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'title', 'description', 'num_of_question', 'image',
    ];

    protected $casts = [
        'created_at' => 'date:d/m/Y',
        'updated_at' => 'date:d/m/Y',
        'expiry_date' => 'date:d/m/Y'
    ];

    public function getSlugOptions(): SlugOptions {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function questionRef(){
        return $this->hasMany(Question::class,'survey_id','id');
    }

    public function getQuestionValAttribute(){
        return empty($this->questionRef->question_text) ? '' : $this->questionRef->question_text;
    }
}
