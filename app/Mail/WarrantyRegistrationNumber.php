<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WarrantyRegistrationNumber extends Mailable
{
    use Queueable, SerializesModels;

    public $warranty_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($warranty_data)
    {
        $this->warranty_data = $warranty_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Email.warranty-registration')
            ->with('warranty_data',$this->warranty_data);
    }
}
