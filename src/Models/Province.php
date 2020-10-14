<?php

namespace Lushi\Models;

use Lushi\Model;

class Province extends Model
{
    protected $source = 'provinces';

    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }
}