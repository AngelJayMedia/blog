<?php

namespace App\Http\Livewire\Newsletter;

use App\Actions\Newsletter\EmailSubscriberAction;
use App\Mail\SubscriberMailable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class Form extends Component
{
    public string $name = '';
    public string $email = '';

    protected $rules = [
        'name'      => ['required'],
        'email'     => ['required', 'email', 'unique:subscribers'],
    ];

    public function formSubmit()
    {
        $this->validate();

        $token = bcrypt($this->email);

        $data = array(
            'name'      => $this->name,
            'email'     => $this->email,
        );

        (new EmailSubscriberAction)([
            'name'  => $this->name,
            'email' => $this->email,
            'token' => $token,
        ]);

        if (!Newsletter::isSubscribed($this->email)) {
            Newsletter::subscribe($this->email, ['NAME' => $this->name, 'TOKEN' => $token]);
        }

        Mail::to($this->email)
            ->bcc('your@email.com', 'Your Name')
            ->send(new SubscriberMailable($data));

        session()->flash('success', 'You are subscribed!');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.newsletter.form');
    }
}
