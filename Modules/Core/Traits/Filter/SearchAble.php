<?php

namespace Modules\Core\Traits\Filter;

trait SearchAble
{

    /**
     * The attributes that are simply searchable using query as &search_keyword=keyword.
     *
     * @var array
     * @return
     */

    public function searchKeyword($searchKeyword)
    {
//        dd($searchKeyword);
        return $this->where(function ($q) use ($searchKeyword) {

            for ($i = 0; $i < sizeof($this->searchable); $i++) {
                $searchField = $this->searchable[$i];
                if ($i == 0) {
                    $q->where($searchField, 'LIKE', "%$searchKeyword%");
                } else {
                    $q->orWhere($searchField, 'LIKE', "%$searchKeyword%");
                }
            }
            return $q;
        });
    }

}