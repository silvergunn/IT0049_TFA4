<?= view('partials/header', ['title' => $title]) ?>

<section class="auth-page">
    <div class="auth-card">
        <div class="auth-intro">
            <span class="eyebrow">Protected workspace</span>

            <h1>Welcome back</h1>

            <p>
                Sign in using your staff account to manage
                customers and users.
            </p>
        </div>

        <?php if (session()->has('error')): ?>
            <div class="error-message">
                <?= esc(session('error')) ?>
            </div>
        <?php endif ?>

        <?php if (session()->has('errors')): ?>
            <div class="error-message">
                <ul>
                    <?php foreach (session('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form
            action="<?= site_url('login') ?>"
            method="post"
            class="auth-form"
        >
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="username">Username</label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="<?= old('username') ?>"
                    autocomplete="username"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary auth-button">
                Sign In
            </button>
        </form>
    </div>
</section>

<?= view('partials/footer') ?>