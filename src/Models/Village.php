<?php

namespace Lushi\Models;

use Lushi\Model;

class Village extends Model
{
    protected $source = 'villages';

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}