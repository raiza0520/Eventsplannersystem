<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Package extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $guarded = [];

    protected $dates = ['deleted_at'];
    
    protected $casts = [
        'addons' => 'object',
        'customize' => 'object',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('packages')->singleFile();
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
