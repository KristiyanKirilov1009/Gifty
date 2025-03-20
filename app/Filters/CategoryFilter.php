<?php
namespace App\Filters;

use Carbon\Carbon;

class CategoryFilter extends Filter
{
    protected $filters = [
        'search'
    ];

    /**
     * Filter the query by a given search
     *
     * @param array $search Comment
     *
     * @return mixed
     */
    protected function search($search)
    {
        if (!empty($search)) {
            $this->builder->where(
                function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('slug', 'like', '%' . $search . '%');
                }
            );
        }

        return $this->builder;
    }
}
