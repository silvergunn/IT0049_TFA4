<?= view('partials/header', ['title' => $title]) ?>

<section class="page-heading">
    <div>
        <span class="eyebrow">Customer management</span>
        <h1>Add New Customer</h1>
        <p>Enter the customer’s contact information below.</p>
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

    <form action="<?= site_url('customers/create') ?>" method="post">
        <?= csrf_field() ?>

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
            <label for="email">Email Address</label>

            <input
                type="email"
                id="email"
                name="email"
                value="<?= esc(old('email')) ?>"
                maxlength="100"
                required
            >
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>

            <input
                type="text"
                id="phone"
                name="phone"
                value="<?= esc(old('phone')) ?>"
                maxlength="20"
            >
        </div>

        <div class="form-actions">
            <a href="<?= site_url('customers') ?>" class="btn btn-secondary">
                Cancel
            </a>

            <button type="submit" class="btn btn-primary">
                Save Customer
            </button>
        </div>
    </form>

</div>

<?= view('partials/footer') ?>