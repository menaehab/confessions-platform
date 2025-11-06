<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\RateLimiter;

#[Layout('layout')]
class HomePage extends Component
{
    public $message;
    public $successMessage;

    public function sendMessage()
    {
        $this->resetErrorBag();
        $this->successMessage = null;

        $key = 'send-message:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 1)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('message', "رجاءً انتظر $seconds ثانية قبل إرسال رسالة أخرى.");
            $this->dispatch('show-error');
            return;
        }

        $validated = $this->validate([
            'message' => 'required|string|min:1',
        ]);

        try {
            Message::create([
                'content' => $validated['message'],
            ]);

            RateLimiter::hit($key, 30);
            $this->successMessage = 'تم ارسال الرسالة بنجاح';
            $this->message = '';
        } catch (\Exception $e) {
            $this->addError('message', 'حدث خطأ أثناء حفظ الرسالة. الرجاء المحاولة مرة أخرى.');
            $this->dispatch('show-error');
        }
    }

    public function render()
    {
        return view('livewire.home-page');
    }
}
