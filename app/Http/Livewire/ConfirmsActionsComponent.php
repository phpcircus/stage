<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Actions\ConfirmPassword;
use Livewire\Component;

class ConfirmsActionsComponent extends Component
{
    /** @var bool */
    public $confirmingAction = false;

    /** @var string */
    public $confirmableId = '';

    /** @var string */
    public $confirmablePassword = '';

    /** @var bool */
    public $confirmsPassword = false;

    /**
     * Start confirming the requested action.
     */
    public function startConfirmingAction($id): void
    {
        $this->resetErrorBag();

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
    }

    /**
     * Confirm the requested action.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function confirmAction(): void
    {
        if ($this->confirmsPassword) {
            if (! app(ConfirmPassword::class)(app(StatefulGuard::class), Auth::user(), $this->confirmablePassword)) {
                throw ValidationException::withMessages([
                    'confirmable_password' => [__('This password does not match our records.')],
                ]);
            }
        }
        $this->dispatchBrowserEvent('action-confirmed');

        $this->stopConfirmingAction();
    }
}
