<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class PengajuanCutiDivalidasi extends Notification
{
    use Queueable;

    protected $status;
    protected $tanggalPengajuan;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($status, $tanggalPengajuan)
    {
        $this->status = $status;
        $this->tanggalPengajuan = $tanggalPengajuan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database']; // Channel untuk menyimpan notifikasi ke database
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Pengajuan cuti Anda telah ' . $this->status,
            'tanggal_pengajuan' => $this->tanggalPengajuan,
            'status' => $this->status,
        ];
    }
}
