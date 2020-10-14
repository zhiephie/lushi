<?php

namespace Lushi\Models;

use Lushi\Model;

class Regency extends Model
{
    protected $source = 'regencies';

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}