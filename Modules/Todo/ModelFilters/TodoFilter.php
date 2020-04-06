<?php

namespace Modules\Todo\ModelFilters;

use EloquentFilter\ModelFilter;
use Modules\Core\Traits\Filter\SearchAble;
use Modules\Core\Traits\Filter\Sortable;

class TodoFilter extends ModelFilter
{
    use SearchAble;
    use Sortable;

    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /**
     * The attributes that are simply searchable using query as &search_keyword=keyword.
     *
     * @var array
     */
    public $searchable = ["name"];

    /**
     * The attributes that are sortable using query as &sort_by=attributeName&sort_direction=direction (i.e. asc/desc).
     *
     * @var array
     */
    public $sortable = ['created_at', 'updated_at', 'id', 'name'];

}
