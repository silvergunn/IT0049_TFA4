<?= view('partials/header', ['title' => $title]) ?>

<?php
$avatarFile = 'default-avatar.svg';

if (
    ! empty($user['avatar'])
    && is_file(FCPATH . 'uploads/avatars/' . $user['avatar'])
) {
    $avatarFile = $user['avatar'];
}
?>

<section class="page-heading">
    <div>
        <span class="eyebrow">User management</span>
        <h1>Edit User</h1>
        <p>Update the staff account and upload a profile picture.</p>
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

    <div class="avatar-preview">
        <img
            src="<?= base_url(
                'uploads/avatars/' . $avatarFile
            ) ?>"
            alt="<?= esc($user['full_name'], 'attr') ?> profile picture"
        >

        <div>
            <strong>Current profile picture</strong>
            <span>Upload a new JPG or PNG to replace it.</span>
        </div>
    </div>

    <form
        action="<?= site_url('users/update/' . $user['id']) ?>"
        method="post"
        enctype="multipart/form-data"
    >
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc(old('username', $user['username'])) ?>"
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
                value="<?= esc(old('full_name', $user['full_name'])) ?>"
                maxlength="100"
                required
            >
        </div>

        <div class="form-group">
            <label for="role">Role</label>

            <?php $selectedRole = old('role', $user['role']); ?>

            <select id="role" name="role" required>
                <option
                    value="Administrator"
                    <?= $selectedRole === 'Administrator'
                        ? 'selected'
                        : '' ?>
                >
                    Administrator
                </option>

                <option
                    value="Admin"
                    <?= $selectedRole === 'Admin' ? 'selected' : '' ?>
                >
                    Admin
                </option>

                <option
                    value="Manager"
                    <?= $selectedRole === 'Manager' ? 'selected' : '' ?>
                >
                    Manager
                </option>

                <option
                    value="Cashier"
                    <?= $selectedRole === 'Cashier' ? 'selected' : '' ?>
                >
                    Cashier
                </option>

                <option
                    value="Staff"
                    <?= $selectedRole === 'Staff' ? 'selected' : '' ?>
                >
                    Staff
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="avatar">Profile Picture</label>

            <input
                type="file"
                id="avatar"
                name="avatar"
                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
            >

            <small class="form-help">
                JPG or PNG only. Maximum file size: 2 MB.
            </small>
        </div>

        <div class="form-actions">
            <a href="<?= site_url('users') ?>" class="btn btn-secondary">
                Cancel
            </a>

            <button type="submit" class="btn btn-primary">
                Update User
            </button>
        </div>
    </form>

</div>

<?= view('partials/footer') ?>