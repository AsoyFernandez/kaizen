<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QRCode;

class QRCodeController extends Controller
{
    public function lokasi($id)
    {
    	$filename = "images/$id-qrcode.png";
    	QRCode::url(route('pengaduan.create') . "?lokasi=" . $id)->setOutfile($filename)->png();
    	return response()->download($filename)->deleteFileAfterSend(true);
    }
}
