<?php

namespace App\Http\Livewire;

use App\Models\Verse;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class VersesTable extends LivewireDatatable
{
    public $model = Verse::class;

    protected $listeners = ['refreshVerseComponent' => '$refresh'];

    public function columns()
    {
        return [
            Column::name('content')->searchable()->alignCenter()->unsortable()->label('النص'),
            Column::name('surah')->alignCenter()->unsortable()->label('السورة'),
            Column::name('range')->alignCenter()->unsortable()->label('المجال'),
            Column::name('part')->alignCenter()->unsortable()->label('الجزء'),
            NumberColumn::name('order')
                ->defaultSort('asc')
                ->searchable()
                ->alignCenter()
                ->label('الترتيب'),

            Column::callback(['id', 'order', 'content'], function ($id, $order, $content) {

                return view('actions.verses-action', ['type' => 'verse', 'id' => $id, 'order' => $order, 'content' => $content]);
            })->unsortable()
        ];
    }




    /**
     * tow functions to customize table style
     *
     * @param  mixed $row
     * @param  mixed $column
     * @return void
     */
    public function cellClasses($row, $column)
    {

        return 'align-middle text-lg text-right py-4 leading-10';
    }

    public function rowClasses($row, $loop)
    {
        if ($loop->even) {
            return 'bg-gray-50';
        }
    }

    /**
     * changeOrder function to help sorting verses by its order column  either up or down
     *
     * @param  mixed $order : selected row order
     * @param  mixed $action : up or down
     * @return void
     */
    public function changeOrder(String $order, String $action)
    {


        if ($action == 'down') {

            $query = '`order` = (select min(`order`) from verses where `order` >=' . $order + 1 . ')';
        } elseif ($action == 'up') {
            $query = '`order` = (select max(`order`) from verses where `order` <=' . $order - 1 . ')';
        } else {
            $this->showError();
            return;
        }


        $verse = Verse::where('order', $order)->first();
        $secondaryVerse = Verse::whereRaw($query)->first();


        if ($secondaryVerse != null) {

            $verse->order = $secondaryVerse->order;
            $secondaryVerse->order = $order;
            $secondaryVerse->save();
            $saved = $verse->save();
            if ($saved) {
                $this->emit('customMessage', 'تمت إعادة الترتيب بنجاح', 'green');
                $this->emit('setShowAlertModal');
            }
        } else {
            $this->showError();
        }
    }


    public function showError()
    {
        $this->emit('customMessage', 'هذه العملية غير متاحة', 'red');
        $this->emit('setShowAlertModal');
    }
}
