<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'performer',
        'album_name',
        'cover_image_url',
        'description',
        'year_of_release',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    // мутатор года
    public function setYearOfReleaseAttribute($value)
    {
        $this->attributes['year_of_release'] = Carbon::createFromFormat('Y', $value);
    }

    public function getYearOfReleaseAttribute($value)
    {
        return Carbon::parse($value)->format('Y');
    }
}
