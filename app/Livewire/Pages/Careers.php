<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;

class Careers extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $position;
    public $message;
    public $cv;

    public array $positions = [
        'Крупие',
        'Барман',
        'Сервитьор',
        'Охрана',
        'Други',
    ];

    protected $rules = [
        'name'     => 'required|string|min:3',
        'email'    => 'required|email',
        'phone'    => 'required|string|min:6',
        'position' => 'required|string',
        'cv'       => 'required|file|mimes:pdf,doc,docx|max:2048',
        'message'  => 'nullable|string|max:1000',
    ];

    public function submit()
    {
        $this->validate();

        $path = $this->cv->store('cvs', 'public');

        // 
        // Mail::to('hr@casino-ritz.eu')->send(new CareerApplication(...));

        session()->flash('success', 'Вашата кандидатура е изпратена успешно!');

        $this->reset(); // ресетва формата
    }

    public function render()
    {
        return view('livewire.pages.careers')->layout('layouts.app', [
            'title' => __('careers.title'),
        ]);
    }
}
