
<a href="<?php echo route('logout'); ?>">Logout</a>

<?php echo $var = Session::get('id'); ?>

<?php
if ($var = 'sumit12') {
    return Redirect::route('dashboard');
    echo "here you are";
    exit;
} else {
    return Redirect::route('home');
}

