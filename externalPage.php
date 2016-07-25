외부 페이지 입니다.

<hr/>

<?php
echo Xpressengine\User\Models\User::where('displayName', 'admin')->first()->email;
?>

<hr/>

<?php
if (Auth::check()) {
    echo '로그인 되어 있습니다.';
    echo Auth::user()->getDisplayName();
} else {
    echo '로그인 해주세요.';
}
?>
