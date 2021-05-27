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
        if ($model && $id) {
            $this->model = resolve($model)->findOrFail($id);
        } elseif ($model && $id === null) {
            $this->model = resolve($model);
        } else {
            abort(404, 'Model not found.');
        }

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
