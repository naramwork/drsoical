<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Verse;

class VerseTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('content'),
        ];
    }

    public function query(): Builder
    {
        return Verse::query();
    }
}
