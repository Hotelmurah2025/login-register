<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Welcome, <?php echo $username; ?>!</h3>
                <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
            </div>
            <div class="card-body">
                <p>This is your dashboard. You have successfully logged in!</p>
            </div>
        </div>
    </div>
</div>
