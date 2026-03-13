<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Seed the application's database with sample tickets.
     */
    public function run(): void
    {
        $tickets = [
            ['user_id' => 10, 'title' => 'Probleme de connexion utilisateur'],
            ['user_id' => 11, 'title' => 'Erreur lors du paiement'],
            ['user_id' => 11, 'title' => 'Demande de remboursement'],
            ['user_id' => 11, 'title' => 'Bug affichage tableau de bord'],
            ['user_id' => 11, 'title' => 'Mot de passe oublie'],
        ];

        foreach ($tickets as $ticket) {
            Ticket::create($ticket);
        }
    }
}
