<?php

namespace App\Models;

use Database\Factories\MakerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Maker extends Model
{
    use HasFactory;
    protected $table = 'makers';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];
    public function models(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }
    public function maker(): BelongsTo
    {
        return $this->belongsTo(Maker::class, 'maker_id');
    }

}
