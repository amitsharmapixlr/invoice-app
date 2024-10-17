<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Str;

class GenerateInvoices implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::all();

        foreach ($users as $user) {

            $invoiceNumber = Str::random(6);
            
            $totalAmount = 250.50;
            
            $dueDate = now()->addDays(1);

            Invoice::create([
                'user_id' => $user->id,
                'invoice_number' => $invoiceNumber,
                'total_amount' => $totalAmount,
                'due_date' => $dueDate,
                'remaining_balance' => $totalAmount,
                'status' => 'Unpaid',
            ]);
        }

    }
}
