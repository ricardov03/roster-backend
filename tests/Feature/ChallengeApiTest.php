<?php

it('can retrieve the student list')->skip();
it('can retrieve a single student detail')->skip();
it('can retrieve create an student')->skip();
it('can retrieve modify an student')->skip();
it('can retrieve delete an student')->skip();

it('can retrieve the courses list', function () {
    $response = $this->get(route('courses.index'));
    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'code',
                    'description',
                    'sections' => [
                        '*' => [
                            'id',
                            'name',
                            'course',
                            'instructor',
                        ],
                    ],
                ],
            ],
        ]);
});
it('can retrieve a single course with their details')->skip();
