<?php
namespace App\Filters;

use Carbon\Carbon;

class UserFilter extends Filter
{
    protected $filters = [
        'search',
        'role',
        'city',
        'from',
        'to',
        'phone',
        'birthday_from',
        'birthday_to',
        'gender',
        'active'
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
                    $query->where('email', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%');
                }
            );
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given search
     *
     * @param string $level User level
     *
     * @return mixed
     */
    protected function role($level)
    {
        if ($level) {
            $this->builder->where('level', $level);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given search
     *
     * @param string $city_id City ID
     *
     * @return mixed
     */
    protected function city($city_id)
    {
        if ($city_id) {
            $this->builder->where('city_id', $city_id);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given search
     *
     * @param string $search Date 'Y-m-d' -> '1984-04-09'
     *
     * @return mixed
     */
    protected function from($search)
    {
        if ($search) {
            $date = new Carbon($search);
            $this->builder->where('created_at', '>=', $date->toDateTimeString());
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given search
     *
     * @param string $search Date 'Y-m-d' -> '1984-04-09'
     *
     * @return mixed
     */
    protected function to($search)
    {
        if ($search) {
            $date = new Carbon($search);
            $this->builder->where('created_at', '<=', $date->toDateTimeString());
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given search
     *
     * @param string $phone Phone number '359897937766'
     *
     * @return mixed
     */
    protected function phone($phone)
    {
        if ($phone) {
            $this->builder->where('phone', 'like', '%' . $phone . '%');
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given search
     *
     * @param string $search Date 'Y-m-d' -> '1984-04-09'
     *
     * @return mixed
     */
    protected function birthday_from($search)
    {
        if ($search) {
            $date = new Carbon($search);
            $this->builder->whereMonth('birthday', $date->month)
                ->whereDay('birthday', '>=', $date->day);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given search
     *
     * @param string $search Date 'Y-m-d' -> '1984-04-09'
     *
     * @return mixed
     */
    protected function birthday_to($search)
    {
        if ($search) {
            $date = new Carbon($search);
            $this->builder->whereMonth('birthday', $date->month)
                ->whereDay('birthday', '<=', $date->day);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given search
     *
     * @param string $gender 'M' or 'F'
     *
     * @return mixed
     */
    protected function gender($gender)
    {
        if ($gender) {
            $this->builder->where('gender', $gender);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given search
     *
     * @param string $state '0' or '1'
     *
     * @return mixed
     */
    protected function active($state)
    {
        if ($state != 'all') {
            $this->builder->where('active', $state);
        }

        return $this->builder;
    }
}
