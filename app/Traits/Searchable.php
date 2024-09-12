<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    /**
     * Aplicar búsqueda en varias columnas del modelo.
     *
     * @param Builder $query
     * @param string $searchTerm
     * @param array $columns
     * @return Builder
     */
    public function scopeSearch(Builder $query, $searchTerm)
    {
        // Dividir el término de búsqueda en varias palabras si son múltiples
        $searchTerms = explode(' ', $searchTerm);
        $columns = $this->columnsSearch ?? [];

        // Aplicar la búsqueda en las columnas especificadas
        return $query->where(function ($q) use ($columns, $searchTerms) {
            foreach ($searchTerms as $term) {
                $q->where(function ($q) use ($term, $columns) {
                    foreach ($columns as $column) {
                        $q->orWhere($column, 'LIKE', "%{$term}%");
                    }
                });
            }
        });
    }
}
