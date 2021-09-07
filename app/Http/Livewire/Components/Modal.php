<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Modal extends Component
{
    /** @var bool */
    public $show;

    /** @var \Illuminate\Database\Eloquent\Model */
    public $model;

    /** @var array */
    protected $listeners = [
        'show' => 'show',
    ];

    /**
     * Show the modal.
     *
     * @param  string|\Illuminate\Database\Eloquent\Model
     */
    public function show(string $model, $id = null): void
    {
        match ([$model, $id]) {
            [$model, null] => $this->model = resolve($model),
            [$model, $id] => $this->model = $model::findOrFail($id),
            default => abort(404, 'Model not found.')
        };

        $this->setFields($this->model);
        $this->show = true;
    }

    /**
     * Reset the form.
     */
    public function resetForm(): void
    {
        $this->reset();
        $this->show = false;
    }
}
