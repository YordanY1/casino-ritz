<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Career;
use App\Notifications\NewCareerNotification;
use App\Models\User;

class Careers extends Component
{
    use WithFileUploads;

    public $name, $email, $phone, $position, $message, $cv;

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

        $career = Career::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'phone'    => $this->phone,
            'position' => $this->position,
            'message'  => $this->message,
            'cv'       => $path,
        ]);

        User::all()->each->notify(new NewCareerNotification($career));

        session()->flash('success', 'Вашата кандидатура е изпратена успешно!');
        $this->reset();
    }

    public function render()
    {
        $jobPostingSchema = [
            '@type' => 'JobPosting',
            'title' => 'Кариери в Casino Ritz',
            'description' => 'Присъединете се към екипа на Casino Ritz в Пловдив. Отворени позиции: крупие, барман, сервитьор, охрана и други.',
            'hiringOrganization' => [
                '@type' => 'Organization',
                'name' => 'Casino Ritz',
                'sameAs' => url('/'),
                'logo' => asset('images/logo.png'),
            ],
            'jobLocation' => [
                '@type' => 'Place',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'ул. Васил Левски 11',
                    'addressLocality' => 'Пловдив',
                    'postalCode' => '4000',
                    'addressCountry' => 'BG',
                ]
            ],
            'employmentType' => 'FULL_TIME',
            'datePosted' => now()->toDateString(),
        ];

        return view('livewire.pages.careers')->layout('layouts.app', [
            'title' => __('careers.title') . ' - Casino Ritz Пловдив',
            'description' => 'Работа в Casino Ritz – търсим крупиета, бармани, сервитьори и охрана. Стани част от екипа ни в Пловдив.',
            'author' => 'Casino Ritz HR Team',
            'robots' => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1',
            'ogType' => 'website',
            'image' => asset('images/logo.png'),
            'twitter' => '@casinoritz',

            // breadcrumb
            'breadcrumb' => [
                ['name' => 'Начало', 'url' => url('/')],
                ['name' => 'Кариери', 'url' => url('/careers')],
            ],

            // WebPage schema
            'schema' => [
                '@type' => 'WebPage',
                'name' => 'Кариери в Casino Ritz',
                'description' => 'Стани част от премиум казино екипа в Пловдив.',
            ],

            // Job Posting Schema
            'jobPostingSchema' => $jobPostingSchema,

            // Organization (reuse)
            'organizationSchema' => [
                '@type' => 'Organization',
                'name' => 'Casino Ritz',
                'url' => url('/'),
                'logo' => asset('images/logo.png'),
                'sameAs' => [
                    'https://www.facebook.com/Ritzcasino',
                    'https://www.instagram.com/ritzstarcasino/',
                ],
            ],
        ]);
    }
}
