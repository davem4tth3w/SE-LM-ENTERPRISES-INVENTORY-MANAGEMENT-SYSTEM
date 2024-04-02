<?php
// pdf.php

require_once 'dompdf2.0.4/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf{
    public function __construct() {
        parent::__construct();
        // Set paper size (A4, A5, etc.) and orientation (portrait or landscape)
        $this->setPaper('A4', 'portrait');
    }
}

?>

