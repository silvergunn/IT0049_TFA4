<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta name="theme-color" content="#0b1220">

    <title><?= esc($title) ?> | SimplePOS</title>

    <link
        rel="stylesheet"
        href="<?= base_url('css/style.css') ?>?v=3"
    >
</head>

<body>

<?php
$currentPath = trim(uri_string(), '/');
$isLoggedIn = (bool) session()->get('isLoggedIn');
$displayName = session()->get('full_name')
    ?: session()->get('username');
?>

<header class="site-header">
    <div class="container navigation">
        <a
            class="brand"
            href="<?= base_url() ?>"
            aria-label="SimplePOS home"
        >
            <span class="brand-mark">S</span>

            <span>
                <strong>SimplePOS</strong>
                <small>Retail workspace</small>
            </span>
        </a>

        <nav aria-label="Primary navigation">
            <a
                class="<?= $currentPath === '' ? 'active' : '' ?>"
                href="<?= base_url() ?>"
            >
                Home
            </a>

            <?php if ($isLoggedIn): ?>
                <a
                    class="<?= str_starts_with(
                        $currentPath,
                        'customers'
                    ) ? 'active' : '' ?>"
                    href="<?= site_url('customers') ?>"
                >
                    Customers
                </a>

                <a
                    class="<?= str_starts_with(
                        $currentPath,
                        'users'
                    ) ? 'active' : '' ?>"
                    href="<?= site_url('users') ?>"
                >
                    Users
                </a>
            <?php endif ?>

            <a
                class="<?= $currentPath === 'about' ? 'active' : '' ?>"
                href="<?= site_url('about') ?>"
            >
                About
            </a>

            <?php if ($isLoggedIn): ?>
                <span class="nav-user">
                    <?= esc($displayName) ?>
                </span>

                <form
                    action="<?= site_url('logout') ?>"
                    method="post"
                    class="logout-form"
                >
                    <?= csrf_field() ?>

                    <button
                        type="submit"
                        class="nav-logout"
                    >
                        Logout
                    </button>
                </form>
            <?php else: ?>
                <a
                    class="<?= $currentPath === 'login'
                        ? 'active'
                        : '' ?>"
                    href="<?= site_url('login') ?>"
                >
                    Sign In
                </a>
            <?php endif ?>
        </nav>
    </div>
</header>

<main class="container">
