<?php
//Admin panel
//Home
Breadcrumbs::for('admin', function ($trail) {
$trail->push('Главная ', route('admin'));
});
//Home->ticket
Breadcrumbs::for('ticket', function ($trail) {
    $trail->parent('admin');
    $trail->push('просмотра тикета', url('/admin/ticket/{slug}'));
});
//Home->department
Breadcrumbs::for('department', function ($trail) {
    $trail->parent('admin');
    $trail->push('Отделы', url('/admin/departments/{slug}'));
});
//Home->users
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('admin');
    $trail->push('Пользователи', url('admin/users'));
});

//Users
//home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная ', route('home'));
});
//home->createTicket
Breadcrumbs::for('create', function ($trail) {
    $trail->parent('home');
    $trail->push(' Создать тикет', url('/create'));
});
//home->ticket
Breadcrumbs::for('show', function ($trail) {
    $trail->parent('home');
    $trail->push('просмотра тикета', url('/ticket/{slug}'));
});