<?php

namespace App\Console\Commands;

use App\Mail\UpdateStatus;
use App\Models\User;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UpdateUserStatus extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:status {email} {status=pending}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para atualizar status do usuário mentor e enviar o e-mail avisando a alteração';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct () {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle () {
        $user = User::where('email', Str::lower($this->argument('email')))->first();
        $status = Str::lower($this->argument('status'));

        if ($user) {
            if ($user->is_mentor === true) {
                if (in_array($status, ['approved', 'unapproved'])) {
                    try {
                        $user->status = $status;
                        $user->save();
    
                        Mail::to($user->email)->send(new UpdateStatus($status, $user));
                    } catch (Exception $error) {
                        $this->error($error->getMessage());
                        return 1;
                    }

                    $this->info("✅ Status atualizado com sucesso!");
                } else {
                    $this->error("❌ Status inválido");
                }
            } else {
                $this->error("❌ Usuário não é mentor");
            }
        } else {
            $this->error("❌ E-mail não encontrado");
        }
    }
}
