<?php

Route::group(['middleware' => ['auth.basic','employees']], function () {
    Route::get('/', 'DashboardController@index');
});

Route::post('/webhook/github', 'GitHubWebhookController@gitRepoReceivedPush');

Route::ohDearWebhooks('/oh-dear-webhooks');
