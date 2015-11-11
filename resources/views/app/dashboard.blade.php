<?php

if (Auth::check()) {
    // The user is logged in...
	echo "I'm logged in as";
}else{
	echo "I'm not logged in";
}

?>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif