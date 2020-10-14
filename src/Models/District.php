<?php

namespace Lushi\Models;

use Lushi\Model;

class District extends Model
{
    protected $source = 'districts';

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function villages()
    {
        return $this->hasMany(Village::class);
    }
}