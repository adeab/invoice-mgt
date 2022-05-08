<?php

include('header.php');

?>

<h1>Change Password</h1>
<hr>

<div id="response" class="alert alert-success" style="display:none;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<div class="message"></div>
</div>
<!-- <h3>Work in progress...</h3>						 -->
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">			
			<div class="panel-body form-group form-group-sm">
				<form method="post" id="change_password">
					<input type="hidden" name="action" value="change_password">

					

					<div class="form-group">
						<input type="password" class="form-control required" name="password-old" id="password-old" placeholder="Enter Old Password">
					</div>
					<div class="form-group">
						<input type="password" class="form-control required" name="password" id="password" placeholder="Enter New Password">
					</div>
					<div class="form-group">
						<input type="password" class="form-control required" name="password-new" id="password-new" placeholder="Confirm New Password">
					</div>

					<div class="form-group">
						<div class="col-xs-12 margin-top btn-group">
							<input type="submit" id="action_change_password" class="btn btn-success float-right" value="Change Password" data-loading-text="Checking...">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<div>

<?php
	include('footer.php');
?>