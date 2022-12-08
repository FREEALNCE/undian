<?php

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

Breadcrumbs::for('dashboard_home', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Home', '#');
});

Breadcrumbs::for('edit_profile', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Edit Profile', route('profile.edit'));
});

Breadcrumbs::for('change_password', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Change Password', route('password.edit'));
});

Breadcrumbs::for('edit_user', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Edit Profile', route('user.edit'));
});

Breadcrumbs::for('edit_password', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Change Password', route('password.edit'));
});

//Dashboard > Roles 
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Roles", route('roles.index'));
});

Breadcrumbs::for('detail_role', function ($trail, $role) {
    $trail->parent('roles', $role);
    $trail->push($role->name, route('roles.show', ['role' => $role]));
});

Breadcrumbs::for('add_role', function ($trail) {
    $trail->parent('roles');
    $trail->push('Add Role', route('roles.create'));
});

Breadcrumbs::for('edit_role', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push($role->name, route('roles.edit', ['role' => $role]));
});

//Dashboard > Users 
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("User", route('users.index'));
});

Breadcrumbs::for('add_user', function ($trail) {
    $trail->parent('users');
    $trail->push('Add User', route('users.create'));
});

Breadcrumbs::for('edit_new_user', function ($trail, $user) {
    $trail->parent('users');
    $trail->push($user->name, route('users.edit', ['user' => $user]));
});

//Dashboard > Day Generator
Breadcrumbs::for('days', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Day", route('days.index'));
});

Breadcrumbs::for('tambah_day', function ($trail) {
    $trail->parent('days');
    $trail->push('Add New Day Number', route('days.create'));
});

Breadcrumbs::for('detail_day', function ($trail, $day) {
    $trail->parent('days', $day);
    $trail->push('Edit Day Number', route('days.show', ['day' => $day]));
});

//Dashboard > Night Generator
Breadcrumbs::for('nights', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Night", route('nights.index'));
});

Breadcrumbs::for('tambah_night', function ($trail) {
    $trail->parent('nights');
    $trail->push('Add New Night Number', route('nights.create'));
});

Breadcrumbs::for('detail_night', function ($trail, $night) {
    $trail->parent('nights', $night);
    $trail->push('Edit Night Number', route('nights.show', ['night' => $night]));
});

// Website Settings
Breadcrumbs::for('website', function ($trail) {
    $trail->push("Website Setting");
});

Breadcrumbs::for('first_page', function ($trail) {
    $trail->parent('website');
    $trail->push('First Page', route('first-page.index'));
});

Breadcrumbs::for('second_page', function ($trail) {
    $trail->parent('website');
    $trail->push('Second Page', route('second-page.index'));
});

Breadcrumbs::for('third_page', function ($trail) {
    $trail->parent('website');
    $trail->push('Third Page', route('third-page.index'));
});

Breadcrumbs::for('website_lov', function ($trail) {
    $trail->parent('website');
    $trail->push('Website Settings', route('website-lov.index'));
});
