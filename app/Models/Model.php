<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function getExternals()
    {
        $externals = [];

        return $externals;
    }
}
