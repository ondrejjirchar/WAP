<?php
class Password {
    public static function generate($length) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($chars) - 1);
            $password .= $chars[$index];
        }
        return $password;
    }

    public static function check($password1, $password2) {
        return $password1 === $password2;
    }
}

class PasswordTest {
    public static function testGenerate() {
        $password = Password::generate(8);
        $regex = '/^[a-zA-Z0-9]{8}$/';
        if (!preg_match($regex, $password)) {
            echo 'Generování hesla selhalo: '.$password."\n";
            return false;
        }
        return true;
    }

    public static function testCheck() {
        $password1 = 'password';
        $password2 = 'password';
        $password3 = 'notpassword';
        if (!Password::check($password1, $password2)) {
            echo 'Kontrola hesla nebyla úspěšná: '.$password1.' vs '.$password2."\n";
            return false;
        }
        if (Password::check($password1, $password3)) {
            echo 'Kontrola hesla nebyla úspěšná: '.$password1.' vs '.$password3."\n";
            return false;
        }
        return true;
    }
}

if (PasswordTest::testGenerate()) {
    echo 'Generování hesla bylo úspěšné.'."\n";
}
if (PasswordTest::testCheck()) {
    echo 'Kontrola hesla byla úspěšná.'."\n";
}
