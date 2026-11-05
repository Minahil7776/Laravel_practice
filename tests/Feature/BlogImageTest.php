<?php

use Illuminate\Support\Facades\Storage;

test('blog images are served from the public disk', function () {
    Storage::fake('public');
    Storage::disk('public')->put('blog_images/example.png', 'image contents');

    $response = $this->get(route('blog-images.show', 'example.png'));

    $response->assertOk();
    $response->assertHeader('Content-Type', 'image/png');
});

test('missing blog images return not found', function () {
    Storage::fake('public');

    $this->get(route('blog-images.show', 'missing.png'))->assertNotFound();
});
