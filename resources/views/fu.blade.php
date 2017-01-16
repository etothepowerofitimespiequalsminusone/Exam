<h1>Only admins allowed here! Are you an admin?</h1>
@if(!Auth::check())
<a href="{!! route('login') !!}">click here to log in</a>
@endif