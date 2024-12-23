<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Login</h3>
            </div>
            <div class="card-body">
                <?php if($this->session->flashdata('login_error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('login_error'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if($this->session->flashdata('register_success')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('register_success'); ?>
                    </div>
                <?php endif; ?>

                <?php echo form_open('auth/login'); ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>">
                        <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                <?php echo form_close(); ?>
                
                <div class="mt-3 text-center">
                    <p>Don't have an account? <a href="<?php echo base_url('auth/register'); ?>">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
