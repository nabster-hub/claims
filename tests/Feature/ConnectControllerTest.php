<?php

namespace Tests\Feature;

use App\Models\Claim;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConnectControllerTest extends TestCase
{
    use RefreshDatabase;
    private function generateClientNumber(): int
    {
        $length = rand(6, 15);
        return (int) str_pad((string) rand(1, 9), $length, (string) rand(0, 9), STR_PAD_RIGHT);
    }

    public function test_connect_store_for_legal_entity()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $claim1 = Claim::factory()->create(['type' => 1]);
        $clintNo1 = $this->generateClientNumber();

        $this->post(route('connect.store', ['claim' => $claim1->id]), [
            'clientNo' => $clintNo1,
        ])->assertRedirect(route('connect.show', ['claim' => $claim1->id]));

        $this->assertDatabaseHas('connects', [
            'claim_id' => $claim1->id,
            'client' => $clintNo1,
        ]);

        $claim2 = Claim::factory()->create(['type' => 2]);
        $clintNo2 = $this->generateClientNumber();

        $this->post(route('connect.store', ['claim' => $claim2->id]), [
            'clientNo' => $clintNo2,
            'act_date' => now()->toDateString(),
            'act_number' => rand(1000, 9999),
            'receipt_number' => rand(1000, 9999),
            'receipt_sum' => rand(1000, 9999),
            'SMR' => 'Company ' . rand(1000, 9999),
            'distance_solder' => rand(1, 99)
        ])->assertRedirect(route('connect.show', ['claim' => $claim2->id]));

        $this->assertDatabaseHas('connects', [
            'claim_id' => $claim2->id,
            'client' => $clintNo2,
        ]);
    }

}
