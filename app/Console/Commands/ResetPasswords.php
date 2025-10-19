<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ResetPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:reset-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset svih korisnika na default password';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Resetujem passworde...');

        // Pronađi ili kreiraj admin korisnika
        $admin = User::where('email', 'admin@autodijelovi.com')->first();
        if (!$admin) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@autodijelovi.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]);
            $this->info('✅ Admin korisnik kreiran: admin@autodijelovi.com / password');
        } else {
            $admin->password = Hash::make('password');
            $admin->save();
            $this->info('✅ Admin password resetovan: admin@autodijelovi.com / password');
        }

        // Pronađi ili kreiraj običnog korisnika
        $user = User::where('email', 'korisnik@autodijelovi.com')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Korisnik Test',
                'email' => 'korisnik@autodijelovi.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]);
            $this->info('✅ Korisnik kreiran: korisnik@autodijelovi.com / password');
        } else {
            $user->password = Hash::make('password');
            $user->save();
            $this->info('✅ Korisnik password resetovan: korisnik@autodijelovi.com / password');
        }

        // Reset passworda za sve korisnike
        $allUsers = User::all();
        foreach ($allUsers as $u) {
            $u->password = Hash::make('password');
            $u->save();
        }

        $this->info('✅ Svi passwordi su resetovani na: password');
        $this->newLine();
        $this->info('Testni nalozi:');
        $this->info('Admin: admin@autodijelovi.com / password');
        $this->info('Korisnik: korisnik@autodijelovi.com / password');

        return 0;
    }
}
