<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConfirmsActionsComponent extends Component
{
    /** @var bool */
    public $confirmingAction = false;

    /** @var string */
    public $confirmableId = '';

    /** @var string */
    public $action = '';

    /**
     * Start confirming the requested action.
     */
    public function startConfirmingAction(string $id, string $action): void
    {
        $this->resetErrorBag();

        $this->confirmableId = $id;

        $this->action = $action;

        $this->confirmingAction = true;

        $this->dispatchBrowserEvent('confirming-action');
    }

    /**
     * Stop confirming the requested action.
     */
    public function stopConfirmingAction(): void
    {
        $this->confirmingAction = false;
        $this->action = '';
        $this->confirmableId = '';
    }

    /**
     * Confirm the requested action.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function confirmAction(): void
    {
        $this->dispatchBrowserEvent('action-confirmed', ['action' => $this->action, 'confirmableId' => $this->confirmableId]);

        $this->stopConfirmingAction();
    }
}
