<h1>Login User</h1>
<hr>
<?php if ($this->session->flashdata('notification_status')) : ?>
	<?= '<p class="alert alert-success mt-2">'.$this->session->flashdata('notification_msg').'</p>'; ?>
<?php endif; ?>

<?= validation_errors();?>

<?= form_open('login');?>
<div class="form-group">
	<label>Username</label>

	<input class="form-control" type="text" name="username" autocomplete="off" placeholder="Enter username" value="<?= set_value('username');?>">
</div>
<div class="form-group mt-2">
	<label>Password</label>
	<input class="form-control" type="password" name="password" placeholder="Enter Password" value="<?= set_value('password');?>">
</div>
<button type="submit" class="btn btn-primary mt-2">Login</button>