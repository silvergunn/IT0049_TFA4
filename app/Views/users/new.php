<?= view('partials/header', ['title' => $title]) ?>

<section class="page-heading">
    <div>
        <span class="eyebrow">User management</span>
        <h1>Add New User</h1>
        <p>Create a staff account and assign its role.</p>
    </div>
</section>

<div class="form-wrapper">

    <?php if (session()->has('errors')): ?>
        <div class="validation-errors">
            <strong>Please correct the following:</strong>

            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <form action="<?= site_url('users/create') ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc(old('username')) ?>"
                maxlength="50"
                autocomplete="off"
                required
            >
        </div>

        <div class="form-group">
            <label for="full_name">Full Name</label>

            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= esc(old('full_name')) ?>"
                maxlength="100"
                required
            >
        </div>

        <div class="form-group">
            <label for="role">Role</label>

            <select id="role" name="role" required>
                <option value="" disabled <?= old('role') ? '' : 'selected' ?>>
                    Select a role
                </option>

                <option
                    value="Admin"
                    <?= old('role') === 'Admin' ? 'selected' : '' ?>
                >
                    Admin
                </option>

                <option
                    value="Manager"
                    <?= old('role') === 'Manager' ? 'selected' : '' ?>
                >
                    Manager
                </option>

                <option
                    value="Cashier"
                    <?= old('role') === 'Cashier' ? 'selected' : '' ?>
                >
                    Cashier
                </option>
            </select>
        </div>

        <div class="form-actions">
            <a href="<?= site_url('users') ?>" class="btn btn-secondary">
                Cancel
            </a>

            <button type="submit" class="btn btn-primary">
                Save User
            </button>
        </div>
    </form>

</div>

<?= view('partials/footer') ?>