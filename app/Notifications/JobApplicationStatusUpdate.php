<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobApplicationStatusUpdate extends Notification
{
    use Queueable;

    protected $status;
    protected $jobTitle;

    public function __construct($status, $jobTitle)
    {
        $this->status = $status;
        $this->jobTitle = $jobTitle;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        if ($this->status === 'accepted') {
            return (new MailMessage)
                ->subject('Hasil Pengajuan Lowongan Kerja Pabrik Gula Mrican')
                ->line('Selamat anda lolos masuk ke tahap selanjutnya untuk posisi "' . $this->jobTitle . '".')
                ->line('Kami akan menghubungi Anda untuk informasi lebih lanjut.');
        } else {
            return (new MailMessage)
                ->subject('Hasil Pengajuan Lowongan Kerja Pabrik Gula Mrican')
                ->line('Mohon Maaf, anda belum lolos masuk ke tahap selanjutnya untuk posisi "' . $this->jobTitle . '".')
                ->line('Silahkan Coba lagi di lowongan mendatang.')
                ->line('Terima kasih atas minat Anda.');
        }
    }
}