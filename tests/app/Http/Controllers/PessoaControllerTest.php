<?php

namespace app\Http\Controllers;

use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Pessoa;

class PessoaControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testUserCanListPessoas()
    {
        Pessoa::factory(5)->create();

        $result = $this->get('/pessoas');

        $result->assertResponseStatus(200);
        $result->seeJsonStructure(['data']);
    }
    public function testUserInsertPessoa()
    {
        $payload = [

            'nome' => 'Micael Ricardo Santana',
            'cpf' =>  '222.222.222-22',
            'email' => 'micael.ricardo@outlook.com',
            'categoria_id' => 3
        ];

        $result =  $this->post('/pessoas', $payload);

        $result->assertResponseStatus(201);
    }

    public function testUserSubmitAllFields()
    {
        $payload = [
            'tudo' => 'vazio'
        ];

        $result =  $this->post('/pessoas', $payload);

        $result->assertResponseStatus(422);
    }

    public function testUserCanRetrieveASpecificPessoa()
    {
        $modal = Pessoa::factory()->create();

        $result = $this->get('/pessoas/' . $modal->id);

        $result->assertResponseOk();
        $result->seeJsonContains(['nome' => $modal->nome]);
    }

    public function testUserShouldReceive404WhenSearchSomethingThatDoesntExists()
    {

        $result = $this->get('/pessoas/1000');

        $result->assertResponseStatus(404);
    }

    public function testUserCanDeleteAPessoa()
    {
        $model = Pessoa::factory()->create();

        $this->delete('/pessoas/' . $model->id);
        
        $this->assertResponseStatus(204);
        $this->notSeeInDatabase('pessoas',['id' => $model->id]);
    }

}
