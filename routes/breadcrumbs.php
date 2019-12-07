<?php
//Home
Breadcrumbs::for('admin', function ($trail) {
$trail->push('Главная ', route('admin'));
});
//Home->ticket
Breadcrumbs::for('ticket', function ($trail) {
    $trail->parent('admin');
    $trail->push('просмотра тикета', url('/admin/ticket/{slug}'));
});

Breadcrumbs::for('department', function ($trail) {
    $trail->parent('admin');
    $trail->push('Отделы', url('/admin/departments/{slug}'));
});

Breadcrumbs::for('users', function ($trail) {
    $trail->parent('admin');
    $trail->push('Пользователи', url('admin/users'));
});