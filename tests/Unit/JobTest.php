<?php

use App\Models\Job;

it('belongs to an employer', function () {
    // Arrange
    $user = App\Models\User::factory()->create();
    $employer = App\Models\Employer::factory()->create([
        'user_id' => $user->id
    ]);
    $job = Job::factory()->create(['employer_id' => $employer->id]);

    // Act
    expect($job->employer->is($employer))->toBeTrue();
    // Assert
});

it( 'can have tags', function () {
    $job = Job::factory()->create();

    $job->tag('Frontend');

    expect($job->tags)->toHaveCount(1);
});
