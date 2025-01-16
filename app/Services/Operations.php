<?php



namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operations {

    public static function decryptId($id)
    {
        //recebemos uma hash encryptada
        try {
            $decrypted_id = Crypt::decrypt($id);

        } catch (DecryptException $e) {
            return redirect()->route('home');
        }

        return $decrypted_id;
    }
}
