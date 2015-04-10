<?php namespace SevenShores\Kraken\Commands;

use SevenShores\Kraken\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateContact extends Command implements SelfHandling
{
    /**
     * @var string
     */
    private $email;

    /**
     * Create a new command instance.
     *
     * @param string $email
     */
    public function __construct($email)
    {
        $this->email = $email;
        parent::__construct();
    }

    /**
     * Execute the command.
     *
     * @return Response
     */
    public function handle()
    {
        $contact = Contact::create([
            'email' => $this->email,
        ]);

        $this->response->success('New contact created');
        $this->response->setModel($contact);

        return $this->response;
    }
}
