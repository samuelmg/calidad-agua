<?php

use App\Models\Reporte;
use App\Models\User;

test('usuario puede ver listado de sus reportes', function () {
    // Dado un usuario
    $user = User::factory()->create();
    $reportes = Reporte::factory()
        ->recycle($user)
        ->count(3)
        ->create();
        // ->create(['user_id' => $user->id]);

    // Cuando el usuario accede a la ruta de reportes
    $response = $this->actingAs($user)->get('/reporte');

    // Entonces debería ver la página de reportes con el título "Mis Reportes"
    $response->assertStatus(200)
        ->assertSee('Mis Reportes')
        ->assertSee($reportes->first()->descripcion);
});

test('usuario puede ver formulario para crear un nuevo reporte', function () {
    // Dado un usuario
    $user = User::factory()->create();

    // Cuando el usuario accede a la ruta de creación de reportes
    $response = $this->actingAs($user)->get(route('reporte.create'));

    // Entonces debería ver la página de creación de reportes con el título "Crear Reporte"
    $response->assertStatus(200)
        ->assertSee('Crea tu reporte de agua');
});
