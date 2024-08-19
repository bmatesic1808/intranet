<?php
// Employees
Breadcrumbs::for('users', function ($trail) {
    $trail->push('Employees', route('users.index'));
});

Breadcrumbs::for('dossier', function ($trail, $user) {
    $trail->parent('users');
    $trail->push('Dossier');
    $trail->push($user->name, route('users.show', $user->id));
});

Breadcrumbs::for('points', function ($trail, $user) {
    $trail->parent('users');
    $trail->push('Activity Points');
    $trail->push($user->name, route('user.points', $user->id));
});

Breadcrumbs::for('performance-review', function ($trail, $user) {
    $trail->parent('users');
    $trail->push('Performance reviews');
    $trail->push($user->name, route('performance.reviews.show', $user->id));
});

Breadcrumbs::for('meetings', function ($trail, $user) {
    $trail->parent('users');
    $trail->push('1 on 1 meetings');
    $trail->push($user->name, route('meetings.show', $user->id));
});

Breadcrumbs::for('employee-absence', function ($trail, $user) {
    $trail->parent('users');
    $trail->push('Absence');
    $trail->push($user->name, route('absence.show', $user->id));
});

Breadcrumbs::for('employee-sick-leave', function ($trail, $user) {
    $trail->parent('users');
    $trail->push('Sick Leave');
    $trail->push($user->name, route('sick-leave.show', $user->id));
});

Breadcrumbs::for('employee-monthly-index', function ($trail, $user) {
    $trail->parent('users');
    $trail->push('Monthly Questionaire');
    $trail->push($user->name, route('monthly.index', $user->id));
});

Breadcrumbs::for('employee-monthly-my-archive', function ($trail) {
    $trail->push('Monthly Questionaire');
    $trail->push('My Archive');
});

Breadcrumbs::for('employee-monthly-show', function ($trail, $questionaire) {
    $trail->parent('users');
    $trail->push('Monthly Questionaire');
    $trail->push($questionaire->user->name, route('monthly.index', $questionaire->user->id));
    $trail->push($questionaire->created_at->format('d. m. Y.'));
});

Breadcrumbs::for('employee-monthly-edit', function ($trail, $questionaire) {
    $trail->push('Monthly Questionaire Archive', route('monthly.my.archive'));
    $trail->push($questionaire->created_at->format('d. m. Y.'));
});

// Absence
Breadcrumbs::for('absence', function ($trail) {
    $trail->push('Absence', route('absence.index'));
});

Breadcrumbs::for('absence-company-overview', function ($trail) {
    $trail->push('Company Absence Overview', route('absence.company.overview'));
});

// Sick Leave
Breadcrumbs::for('sick-leave', function ($trail) {
    $trail->push('Sick leave', route('sick-leave.index'));
});

// Equipment
Breadcrumbs::for('equipment', function ($trail) {
    $trail->push('Equipment', route('equipment.index'));
});

Breadcrumbs::for('equipment-show', function ($trail, $user) {
    $trail->parent('users');
    $trail->push('Equipment');
    $trail->push($user->name, route('equipment.show', $user->id));
});

// Presentations
Breadcrumbs::for('presentations', function ($trail) {
    $trail->push('Quarterly Presentations', route('presentations.index'));
});

// Monthly Questionaire
Breadcrumbs::for('monthly-questionaire', function ($trail) {
    $trail->push('Monthly Questionaire', route('monthly.create'));
});

// Monthly Questionaire
Breadcrumbs::for('monthly-questionaire-analytics', function ($trail) {
    $trail->push('Monthly Questionaire Analytics', route('monthly.analytics'));
});

// CEO Questionaire
Breadcrumbs::for('ceo-questionaire', function ($trail) {
    $trail->push('CEO Questionaire', route('ceo.create'));
});

// CEO Questionaire Archive
Breadcrumbs::for('ceo-questionaire-archive', function ($trail) {
    $trail->push('CEO Questionaire Archive', route('ceo.index'));
});

// Sop
Breadcrumbs::for('sop', function ($trail) {
    $trail->push('Standard operating procedures', route('sop.index'));
});

Breadcrumbs::for('sop-create', function ($trail) {
    $trail->push('Standard operating procedures');
    $trail->push('Create', route('sop.create'));
});

Breadcrumbs::for('sop-edit', function ($trail, $sop) {
    $trail->parent('sop');
    $trail->push('Edit Article');
    $trail->push($sop->title, route('sop.edit', $sop->id));
});

Breadcrumbs::for('sop-show', function ($trail, $sop) {
    $trail->parent('sop');
    $trail->push('View Article');
    $trail->push($sop->title, route('sop.show', $sop->id));
});

// Activity
Breadcrumbs::for('activities', function ($trail) {
    $trail->push('App activity', route('activities.index'));
});

// Overview
Breadcrumbs::for('overview', function ($trail) {
    $trail->push('Overview', route('overview.index'));
});

// Company
Breadcrumbs::for('company', function ($trail) {
    $trail->push('Company informations', route('company.index'));
});

// Teambuilding
Breadcrumbs::for('teambuilding', function ($trail) {
    $trail->push('Teambuilding', route('teambuilding.index'));
});

// Teambuilding
Breadcrumbs::for('profile', function ($trail) {
    $trail->push('My Profile', route('profile.show'));
});

// Create new team
Breadcrumbs::for('team-create', function ($trail) {
    $trail->push('Create a new team', route('teams.create'));
});

// Team settings
Breadcrumbs::for('team-settings', function ($trail, $team) {
    $trail->push('Team Settings');
    $trail->push($team->name, route('teams.show', $team->id));
});

Breadcrumbs::for('management-absence', function ($trail) {
    $trail->push('Pregled godišnjih odmora', route('overview.management.absence'));
});

Breadcrumbs::for('management-sickleave', function ($trail) {
    $trail->push('Pregled bolovanja', route('overview.management.sickleave'));
});