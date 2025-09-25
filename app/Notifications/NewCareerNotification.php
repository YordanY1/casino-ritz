<?php

namespace App\Notifications;

use App\Models\Career;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;

class NewCareerNotification extends Notification
{
    use Queueable;

    public function __construct(public Career $career) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'id'       => $this->career->id,
            'name'     => $this->career->name,
            'position' => $this->career->position,
            'cv'       => $this->career->cv,
        ];
    }

    public function toFilament($notifiable): void
    {
        FilamentNotification::make()
            ->title('Нова кандидатура')
            ->success()
            ->body("{$this->career->name} кандидатства за {$this->career->position}")
            ->sendToDatabase($notifiable);
    }
}
