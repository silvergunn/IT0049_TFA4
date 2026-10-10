<?= view('partials/header', ['title' => $title]) ?>

<section class="page-heading list-heading">
    <div>
        <span class="eyebrow">Team management</span>
        <h1>Staff accounts</h1>
        <p>Team identities and roles retrieved securely from the database.</p>
    </div>

    <div class="heading-actions">
        <a href="<?= site_url('users/new') ?>" class="btn btn-primary">
            + Add User
        </a>

        <span class="record-count">
            <?= count($users) ?> records
        </span>
    </div>
</section>

<?php if (session()->has('success')): ?>
    <div class="success-message">
        <?= esc(session('success')) ?>
    </div>
<?php endif ?>

<div class="table-wrapper">
    <div class="table-toolbar">
        <div>
            <span class="toolbar-dot"></span>
            <strong>Active team</strong>
        </div>

        <span>Live database records</span>
    </div>

    <table>
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <?php
                $avatarFile = 'default-avatar.svg';

                if (
                    ! empty($user['avatar'])
                    && is_file(
                        FCPATH . 'uploads/avatars/' . $user['avatar']
                    )
                ) {
                    $avatarFile = $user['avatar'];
                }
                ?>

                <tr>
                    <td data-label="Avatar">
                        <img
                            class="user-avatar"
                            src="<?= base_url(
                                'uploads/avatars/' . $avatarFile
                            ) ?>"
                            alt="<?= esc(
                                $user['full_name'],
                                'attr'
                            ) ?> profile picture"
                        >
                    </td>

                    <td data-label="Username">
                        <span class="username">
                            @<?= esc($user['username']) ?>
                        </span>
                    </td>

                    <td data-label="Full Name">
                        <strong class="person-name">
                            <?= esc($user['full_name']) ?>
                        </strong>
                    </td>

                    <td data-label="Role">
                        <span
                            class="role role-<?= esc(
                                strtolower($user['role']),
                                'attr'
                            ) ?>"
                        >
                            <?= esc($user['role']) ?>
                        </span>
                    </td>

                    <td data-label="Action">
                        <a
                            href="<?= site_url(
                                'users/edit/' . $user['id']
                            ) ?>"
                            class="btn btn-secondary btn-small"
                        >
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>

            <?php if ($users === []): ?>
                <tr>
                    <td class="empty-state" colspan="5">
                        No staff records are available.
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>

<?= view('partials/footer') ?>
