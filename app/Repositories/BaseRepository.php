<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

abstract class BaseRepository
{
    public const ORDER = 'desc';
    public const SORT = 'id';
    public const BY = 20;

    protected function applyOrderBy(Builder $query, array $params = []): Builder
    {
        $order = $params['order'] ?? self::ORDER;
        $sort = $params['sort'] ?? self::SORT;

        $query->orderBy($sort, $order);

        return $query;
    }

    protected function queryApplyPagination($query, array $params = [])
    {
        $perPage = $params['perPage'] ?? self::BY;
        $page = $params['page'] ?? 1;

        $startRow = ($page - 1) * $perPage;

        return $query->offset($startRow)->limit($perPage);
    }
}
