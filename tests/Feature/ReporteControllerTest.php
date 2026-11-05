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

test('usuario puede crear un nuevo reporte', function () {
    // Dado un usuario
    $user = User::factory()->create();

    // Cuando el usuario envía un formulario para crear un nuevo reporte
    $response = $this->actingAs($user)
        ->post(route('reporte.store'), [
            'descripcion' => 'Reporte de prueba',
            'ubicacion' => 'Ubicación de prueba',
            'fecha_inicio' => now()->toDateString(),
        ]);

    // Entonces debería redirigir a la página de reportes y el reporte debería existir en la base de datos
    $response->assertRedirect(route('reporte.index'));
    $this->assertDatabaseHas('reportes', [
        'descripcion' => 'Reporte de prueba',
        'ubicacion' => 'Ubicación de prueba',
        'fecha_inicio' => now()->toDateString(),
        'user_id' => $user->id,
    ]);
});

test('usuario puede ver un reporte específico', function () {
    // Dado un usuario y un reporte
    $user = User::factory()->create();
    $reporte = Reporte::factory()->recycle($user)->create();

    // Cuando el usuario accede a la ruta de ver un reporte específico
    $response = $this->actingAs($user)->get(route('reporte.show', $reporte));

    // Entonces debería ver la página del reporte con la descripción del reporte
    $response->assertStatus(200)
        ->assertSee($reporte->descripcion);
});

test('usuario puede ver formulario para editar un reporte', function () {
    // Dado un usuario y un reporte
    $user = User::factory()->create();
    $reporte = Reporte::factory()->recycle($user)->create();

    // Cuando el usuario accede a la ruta de edición de un reporte específico
    $response = $this->actingAs($user)->get(route('reporte.edit', $reporte));

    // Entonces debería ver la página de edición del reporte con la descripción del reporte
    $response->assertStatus(200)
        ->assertSee($reporte->descripcion);
});

test('usuario puede actualizar un reporte', function () {
    // Dado un usuario y un reporte
    $user = User::factory()->create();
    $reporte = Reporte::factory()->recycle($user)->create();

    // Cuando el usuario envía un formulario para actualizar el reporte
    $response = $this->actingAs($user)
        ->put(route('reporte.update', $reporte), [
            'descripcion' => 'Reporte actualizado',
            'ubicacion' => 'Ubicación actualizada',
            'fecha_inicio' => now()->toDateString(),
        ]);

    // Entonces debería redirigir a la página del reporte y el reporte debería estar actualizado en la base de datos
    $response->assertRedirect(route('reporte.show', $reporte));
    $this->assertDatabaseHas('reportes', [
        'id' => $reporte->id,
        'descripcion' => 'Reporte actualizado',
        'ubicacion' => 'Ubicación actualizada',
        'fecha_inicio' => now()->toDateString(),
    ]);
});

test('usuario no puede ver reportes de otros usuarios', function () {
    // Dado dos usuarios y un reporte del segundo usuario
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $reporte = Reporte::factory()->recycle($user2)->create();

    // Cuando el primer usuario intenta acceder a la ruta de ver el reporte del segundo usuario
    $response = $this->actingAs($user1)->get(route('reporte.show', $reporte));

    // Entonces debería recibir un error 403 (Forbidden)
    $response->assertStatus(403);
})->todo('implementar autorizaciones');

test('usuario puede eliminar un reporte', function () {
    // Dado un usuario y un reporte
    $user = User::factory()->create();
    $reporte = Reporte::factory()->recycle($user)->create();

    // Cuando el usuario envía una solicitud para eliminar el reporte
    $response = $this->actingAs($user)->delete(route('reporte.destroy', $reporte));

    // Entonces debería redirigir a la página de reportes y el reporte debería estar eliminado (con soft delete) de la base de datos
    $response->assertRedirect(route('reporte.index'));
    $this->assertSoftDeleted($reporte);
});