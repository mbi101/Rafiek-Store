<?php

namespace App\Services\Dashboard;

use App\Models\Category;
use App\Repositories\Dashboard\CategoryRepository;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Facades\DataTables;

class SearchService
{
    /**
     * Apply search to query
     *
     * @param Builder $query
     * @param string|null $keyword
     * @param array $columns
     * @param array $filters
     * @return Builder
     */

    public function applySearch(Builder $query, ?string $keyword = null, array $columns = [], array $filters = []): Builder
    {
        if ($keyword && !empty($columns)) {
            $query->where(function ($q) use ($keyword, $columns) {
                foreach ($columns as $column) {
                    if (str_contains($column, '.')) {
                        [$relation, $relColumn] = explode('.', $column);
                        $q->orWhereHas($relation, function ($q2) use ($relColumn, $keyword) {
                            $q2->where($relColumn, 'LIKE', "%{$keyword}%");
                        });
                    } else {
                        $q->orWhere($column, 'LIKE', "%{$keyword}%");
                    }
                }
            });
        }

        foreach ($filters as $column => $condition) {
            if (is_array($condition)) {
                if (isset($condition['from']) && $condition['from']) {
                    $query->where($column, '>=', $condition['from']);
                }
                if (isset($condition['to']) && $condition['to']) {
                    $query->where($column, '<=', $condition['to']);
                }
            } elseif ($condition !== null && $condition !== '') {
                $query->where($column, $condition);
            }
        }

        return $query;
    }
}
