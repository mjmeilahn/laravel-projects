<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataHandler extends Controller
{

    function handle(Request $request) 
    {
        $data = $request->input('data');

        // Sanitize string
        $sanitize = filter_var(
            $data, 
            FILTER_SANITIZE_STRING, 
            FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_HIGH
        );

        // Remove semi-colons, escape special chars
        $str = html_entity_decode($sanitize);
        $str = str_replace(';', '', $str);
        $cleaned = htmlspecialchars($str);

        // Encrypt data before sending
        $encryption = password_hash($cleaned, PASSWORD_DEFAULT);

        // Show output
        return view('welcome')
                    ->with('encryption', $encryption)
                    ->with('cleaned', $cleaned);
    }
}


