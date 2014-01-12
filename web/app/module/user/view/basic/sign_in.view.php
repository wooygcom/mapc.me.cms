<section class="col-md-6">

	<form method="post" action="<?= $URL['user']['sign_in_act']; ?>" class="form-signin">

		<h1 class="form-signin-heading"><?= $LANG['user']['sign_in']; ?></h1>

		<div class="form-group">
			<label>
				<?= $LANG['user']['email']; ?>
			</label>
			<input name="user_id" type="text" class="form-control" placeholder="<?= $LANG['user']['email']; ?>" autofocus="autofocus">
		</div>

		<div class="form-group">
			<label>
				<?= $LANG['user']['passwd']; ?>
			</label>
			<input name="user_passwd" type="password" class="form-control" placeholder="<?= $LANG['user']['passwd']; ?>">
		</div>

		<label class="checkbox">
			<input type="checkbox" value="remember-me"> <?= $LANG['user']['alt_sign_in_info_save']; ?>
		</label>

		<div class="form-group">
			<button class="btn btn-lg btn-primary btn-block" type="submit"><?= $LANG['user']['sign_in']; ?></button>
		</div>
	</form>

</section>


<section class="col-md-6">

	<form method="post" action="<?= $URL['user']['sign_up_act']; ?>" class="form-signin" role="form">

		<h1 class="form-signin-heading"><?= $LANG['user']['sign_up']; ?></h1>

		<input type="hidden" name="user_uid" value="<?= $user_info['user_uid']; ?>"/>

		<div class="form-group">
			<label>
				<?= $LANG['user']['name']; ?>
			</label>
			<input type="text" name="user_name" value="<?= $user_info['user_name']; ?>" class="form-control" placeholder="<?= $LANG['user']['name']; ?>" />
		</div>

		<div class="form-group">
			<label>
				<?= $LANG['user']['email']; ?>
			</label>
			<input type="text" name="user_email" value="<?= $user_info['user_email']; ?>" class="form-control" placeholder="<?= $LANG['user']['email']; ?>" />
		</div>

		<div class="form-group">
			<label>
				<?= $LANG['user']['passwd'];?>
			</label>
			<input type="password" name="user_passwd" value="" class="form-control" placeholder="<?= $LANG['user']['passwd']; ?>" />
		</div>

		<div class="form-group">
			<label>
				<?= $LANG['user']['passwd_confirm'];?>
			</label>
			<input type="password" name="user_passwd_confirm" value="" class="form-control" placeholder="<?= $LANG['user']['passwd_confirm']; ?>" />
		</div>

		<div class="form-group">
			<button type="submit" value="submit" class="btn btn-lg btn-primary btn-block" /><?= $LANG['user']['sign_up'];?></button>
		</div>

	</form>

</section>
