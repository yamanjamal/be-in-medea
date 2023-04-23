<?php

namespace App\Http\QueryPipelines\CategoryPipeline;

use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Database\Eloquent\Builder;
use App\Http\QueryPipelines\CategoryPipeline\Filters\SortByName;
use App\Http\QueryPipelines\CategoryPipeline\Filters\SortByDiscount;

class CategoryPipeline extends Pipeline
{
    protected ?Request $request;

    public function setRequest(Request $request): static
    {
        $this->request = $request;
        return $this;
    }

    protected function pipes(): array
    {
        return [
            new SortByName(request: $this->request),
            new SortByDiscount(request: $this->request),
        ];
    }

    public static function make(Builder $builder, Request $request): Builder
    {
        return app(static::class)
            ->setRequest(request: $request)
            ->send($builder)
            ->thenReturn();
    }
}