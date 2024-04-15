<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RaceRegistered extends Mailable
{
    use Queueable, SerializesModels;

    protected $_request = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->_request = $request;
    }

    /**
     * Build the message.
     *
     * @return RaceRegistered
     */
    public function build()
    {
        return $this->view('emails.race-registered', ['request' => $this->_request]);
    }
}
