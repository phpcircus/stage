<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConfirmsActionsComponent extends Component
{
    /** @var bool */
    public $confirmingAction = false;

    /** @var string */
    public $action = '';

    /** @var string */
    public $confirmableId = '';

    /** @var string */
    public $uid = '';

    /**
     * Start confirming the requested action.
     */
    public function startConfirmingAction(string $id, string $action, string $uid): void
    {
        $this->resetErrorBag();

        $this->uid = $uid;

        $this->action = $action;

        $this->confirmableId = $id;

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
        $this->uid = '';
    }

    /**
     * Confirm the requested action.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function confirmAction(): void
    {
        $this->dispatchBrowserEvent('action-confirmed', ['uid' => $this->uid]);

        $this->stopConfirmingAction();
    }
}
