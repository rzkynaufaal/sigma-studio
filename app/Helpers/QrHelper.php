<?php

namespace App\Helpers;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Writer;

class QrHelper
{
    public static function generateBase64(string $text, int $size = 200)
    {
        $renderer = new ImageRenderer(
            new RendererStyle($size),
            new ImagickImageBackEnd()
        );

        $writer = new Writer($renderer);
        $qrImage = $writer->writeString($text);

        return 'data:image/png;base64,' . base64_encode($qrImage);
    }
}
