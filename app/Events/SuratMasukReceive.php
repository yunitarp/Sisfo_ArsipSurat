<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Notifikasi;
use Session;

class SuratMasukReceive implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $status;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($status) //jadi, ini nih variable kiriman, misal di pesannya adek mau ada surat mausk kah atau surat keluar contoh
    {
        $this->status = $status;
        $this->message  = "Terdapat ".$status." Baru Hari Ini";
        $notifikasi = new Notifikasi();
        $notifikasi->isi_notifikasi = $this->message;
        $notifikasi->save();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['surat-received'];;
    }
}
