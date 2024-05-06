<?php
    use BaconQrCode\Renderer\ImageRenderer;
    use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
    use BaconQrCode\Renderer\RendererStyle\RendererStyle;
    use BaconQrCode\Writer;

    class QrGenerator{
        protected $renderer;

        public function __construct($size = 200){
            $this->renderer = new ImageRenderer(
                new RendererStyle($size),
                new ImagickImageBackEnd()
            );
        }

        public function generateFromStream($content){
            $writer = new Writer($this->renderer);
            $qrCodeData = $writer->writeString($content);
            $memoryStream = fopen('php://memory', 'w');
            fwrite($memoryStream, $qrCodeData);
            fseek($memoryStream, 0);
            $qrCode = stream_get_contents($memoryStream);
            fclose($memoryStream);
            return $qrCode;
        }

        public function download($content, $filename = 'qr-code.png'){
            $qrCodeData = $this->generateFromStream($content);
            $memoryStream = fopen('php://memory', 'w');
            try {
                fwrite($memoryStream, $qrCodeData);
                fseek($memoryStream, 0);
                header('Content-Type: image/png');
                header('Content-Disposition: attachment; filename="'. $filename. '"');
                fpassthru($memoryStream);
            } finally {
                fclose($memoryStream);
            }
        }
    }