<?php

namespace Tests\Feature;

use App\Models\User;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class ExampleTest extends TestCase
{
        public function test_user_is_registered($username): void
        {
            $user = User::where('name', $username)->get();
           
            if ($user) {
                $this->assertDatabaseHas('users', [
                    'name' => $username,
                ]);;
            }

            /*else {
                $this -> fail ("L'utilisateur·ice $username n'est pas enregistré·e");
            }
                */

            
        }
    
        public function test_users_are_registered(): void
        {
            $this->test_user_is_registered('Enola Nolan'); 
           
        }
}

         /*
     public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
     */
    

    /*public function test_user_not_registered(): void
    {
        $this -> assertDatabaseMissing('users', [
            'email' => 'nonexistent@example.com'
        ]);   
    }
        */

    /*public function test_invalid_email():void
    {
        $this -> assertDoesNotMatchRegularExpression('email', [
            'email' =>
        ])
    }*/
