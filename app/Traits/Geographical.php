<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Geographical
{
    /**
     * @param Builder $query
     * @param float $latitude Latitude
     * @param float $longitude Longitude
     * @return Builder
     */
    public function scopeDistance($query, $latitude, $longitude)
    {
        $latName = $this->getQualifiedLatitudeColumn();
        $lonName = $this->getQualifiedLongitudeColumn();

        // Adding already selected columns to query, all columns will be selected by default
        if ($query->getQuery()->columns === null) {
            $query->select($this->getTable() . '.*');
        } else {
            $query->select($query->getQuery()->columns);
        }

        $sql = "((ACOS(SIN(? * PI() / 180) * SIN(" . $latName . " * PI() / 180) + COS(? * PI() / 180) * COS(" .
            $latName . " * PI() / 180) * COS((? - " . $lonName . ") * PI() / 180)) * 180 / PI()) * 60 * ?) as distance";

        $kilometers = true;
        // if (property_exists(static::class, 'kilometers')) {
        //     // $kilometers = static::$kilometers;
        // }

        if ($kilometers) {
            $query->selectRaw($sql, [$latitude, $latitude, $longitude, 1.1515 * 1.609344]);
            // dd($query->toSql());
        } else {
            // miles
            $query->selectRaw($sql, [$latitude, $latitude, $longitude, 1.1515]);
        }

        //echo $query->toSql();
        //var_export($query->getBindings());
        return $query;
    }

    public function scopeGeofence($query, $latitude, $longitude, $inner_radius, $outer_radius)
    {
        $query = $this->scopeDistance($query, $latitude, $longitude);
        return $query->havingRaw('distance BETWEEN ? AND ?', [$inner_radius, $outer_radius]);
    }

    protected function getQualifiedLatitudeColumn()
    {
        return $this->getConnection()->getTablePrefix() . $this->getTable() . '.' . $this->getLatitudeColumn();
    }

    protected function getQualifiedLongitudeColumn()
    {
        return $this->getConnection()->getTablePrefix() . $this->getTable() . '.' . $this->getLongitudeColumn();
    }

    public function getLatitudeColumn()
    {
        return 'latitude';
    }

    public function getLongitudeColumn()
    {
        return 'longitude';
    }
}
