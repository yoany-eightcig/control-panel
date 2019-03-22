<div class="modal fade" tabindex="-1" role="dialog" id="updateForm{{ $element->id }}">
  	<div class="modal-dialog" role="document">
		<div class="modal-content">
	  		<div class="modal-header">
				<h5 class="modal-title">User Info</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  			<span aria-hidden="true">&times;</span>
				</button>
	  		</div>
		  	<div class="modal-body">
				<form method="POST" action="{{ route('changePassword') }}" id="form{{ $element->id }}" name="form{{ $element->id }}">
					@csrf

		  		    <input type="hidden" name="user_id" value="{{ $element->id }}">
		  		    <input type="hidden" name="project_id" value="{{ $project_id }}">

		  		    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
		  		        <label for="new-password" class="control-label">New Password</label>

		  		        <div class="col-md">
		  		            <input id="new-password" type="password" class="form-control" name="new-password" required>

		  		            @if ($errors->has('new-password'))
		  		                <span class="help-block">
		  		                <strong>{{ $errors->first('new-password') }}</strong>
		  		            </span>
		  		            @endif
		  		        </div>
		  		    </div>

		  		    <div class="form-group">
		  		        <label for="new-password-confirm" class="control-label">Confirm New Password</label>

		  		        <div class="col-md">
		  		            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required/>
		  		        </div>
		  		    </div>
					<input type="submit" class="btn btn-primary" value="Change Password"/>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	  			</form>
		  	</div>
		</div>
  	</div>
</div>	
