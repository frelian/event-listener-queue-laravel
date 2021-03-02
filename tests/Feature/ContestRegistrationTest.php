<?php

namespace Tests\Feature;

use App\Events\NewEntryReceivedEvent;
use App\Mail\WelcomeContestMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContestRegistrationTest extends TestCase
{

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Mail::fake();
    }

    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test  */
    public  function an_email_can_be_entered_into_the_contest() {

        $this->withoutExceptionHandling();

        $this->post('/contest', [
            'email' => 'abc@abc.com',
        ]);

        $this->assertDataBaseCount('contest_entries', 1);
    }

    /** @test  */
    public function email_is_required()
    {

        $this->post('/contest', [
            'email' => '',
        ]);

        $this->assertDataBaseCount('contest_entries', 0);
    }

    /** @test  */
    public function email_needs_to_be_an_email()
    {
        $this->post('/contest', [
            'email' => '',
        ]);

        $this->assertDataBaseCount('contest_entries', 0);

    }

    /** @test */
    public function an_event_is_fired_when_user_registers()
    {
        /*
         * To make test comment next lines, to print handle method WelcomeContestEntryNotification
         *
         */
        Event::fake([
            NewEntryReceivedEvent::class,
        ]);

        $this->post('/contest', [
            'email' => 'abc@abc.com',
        ]);

        Event::assertDispatched(NewEntryReceivedEvent::class);
    }

    /** @test */
    public function a_welcome_email_is_sent()
    {
        $this->post('/contest', [
            'email' => 'abc@abc.com',
        ]);

        Mail::assertQueued(WelcomeContestMail::class);
    }
}
