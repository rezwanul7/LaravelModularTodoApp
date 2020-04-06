<?php

namespace Modules\Core\Traits\Filter;

trait Sortable
{
    /**
     * Sort the Items by a specific column
     * Optionally sort in a specific direction
     * sort_by=columnName&sort_direction=asc
     * @param $column
     * @return mixed
     */
    public function sortBy($column)
    {
        // Check if pre-defined orderBy method exists to sort by
        if (method_exists($this, $method = 'orderBy' . studly_case($column))) {
            return $this->$method();
        }

        // Otherwise order by the column in a specific direction, default DESC
        return $this->sortable($column) ? $this->orderBy($column, $this->input('sort_direction', 'DESC')) : $this->orderBy('created_at', 'DESC');
    }

    /**
     * Checks if a column is sortable
     */
    public function sortable($column)
    {
        if (!isset($this->sortable)) {
            $this->sortable = [];
        }
        return in_array($column, array_merge($this->getModel()->getFillable(), $this->sortable));
    }

    public function withLatest($latest)
    {
        if ($latest) {
            $this->latest();
        }
    }

}