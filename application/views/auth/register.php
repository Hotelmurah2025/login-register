<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Register</h3>
            </div>
            <div class="card-body">
                <?php if($this->session->flashdata('register_error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('register_error'); ?>
                    </div>
                <?php endif; ?>

                <?php echo form_open('auth/register'); ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>">
                        <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
                        <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        <?php echo form_error('confirm_password', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                <?php echo form_close(); ?>
                
                <div class="mt-3 text-center">
                    <p>Already have an account? <a href="<?php echo base_url('auth/login'); ?>">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
