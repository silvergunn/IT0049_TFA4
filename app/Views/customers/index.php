<?= view('partials/header', ['title' => $title]) ?>

<section class="page-heading list-heading">
    <div>
        <span class="eyebrow">Customer management</span>
        <h1>Customer directory</h1>
        <p>Contact information retrieved securely from the MySQL database.</p>
    </div>

    <div class="heading-actions">
        <a
            href="<?= site_url('customers/new') ?>"
            class="btn btn-primary"
        >
            + Add Customer
        </a>

        <span class="record-count">
            <?= count($customers) ?> records
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
            <strong>All customers</strong>
        </div>

        <span>Live database records</span>
    </div>

    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td data-label="Full Name">
                        <strong class="person-name">
                            <?= esc($customer['full_name']) ?>
                        </strong>
                    </td>

                    <td data-label="Email Address">
                        <a
                            class="data-link"
                            href="mailto:<?= esc($customer['email'], 'attr') ?>"
                        >
                            <?= esc($customer['email']) ?>
                        </a>
                    </td>

                    <td data-label="Phone Number">
                        <?= esc($customer['phone']) ?>
                    </td>

                    <td data-label="Action">
                        <a
                            href="<?= site_url(
                                'customers/edit/' . $customer['id']
                            ) ?>"
                            class="btn btn-secondary btn-small"
                        >
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>

            <?php if ($customers === []): ?>
                <tr>
                    <td class="empty-state" colspan="4">
                        No customer records are available.
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>

<?= view('partials/footer') ?>
