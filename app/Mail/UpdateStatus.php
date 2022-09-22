<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class UpdateStatus extends Mailable {
    use Queueable, SerializesModels;

    public string $status;
    public User $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct (string $status, User $user) {
        $this->user = $user;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build () {
        $appName = Config::get('app.name');
        return $this->subject("[{$appName}] - Status do perfil alterado")->markdown('mail.update-status', [
            'user' => $this->user,
            'status' => $this->status,
        ]);
    }

    private function statusDescribe (string $status) {
        $label = 'Desconhecido';

        switch ($status) {
            case 'pending': $label = 'Pendente'; break;
            case 'approved': $label = 'Aprovado'; break;
            case 'unapproved': $label = 'Não aprovado'; break;
            case 'authorized': $label = 'Autorizado'; break;
            case 'unauthorized': $label = 'Não autorizado'; break;
            case 'analyzing': $label = 'Em análise'; break;
            case 'reviewing': $label = 'Em revisão'; break;
            case 'reported': $label = 'Reportado'; break;
            case 'cancelled': $label = 'Cancelado'; break;
            case 'robot': $label = 'Robô'; break;
            case 'deleted': $label = 'Deletado'; break;
        }

        return $label;
    }
}
