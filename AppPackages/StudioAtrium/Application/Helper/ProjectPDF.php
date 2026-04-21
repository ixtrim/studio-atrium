<?php
namespace StudioAtrium\Application\Helper;

if (!defined('PDF_PAGE_ORIENTATION')) define('PDF_PAGE_ORIENTATION', 'P');
if (!defined('PDF_UNIT'))             define('PDF_UNIT',             'mm');
if (!defined('PDF_PAGE_FORMAT'))      define('PDF_PAGE_FORMAT',      'A4');
if (!defined('PDF_CREATOR'))          define('PDF_CREATOR',          'Studio Atrium');
if (!defined('PDF_FONT_MONOSPACED'))  define('PDF_FONT_MONOSPACED',  'courier');
if (!defined('PDF_MARGIN_FOOTER'))    define('PDF_MARGIN_FOOTER',    10);
if (!defined('PDF_MARGIN_BOTTOM'))    define('PDF_MARGIN_BOTTOM',    25);
if (!defined('PDF_IMAGE_SCALE_RATIO'))define('PDF_IMAGE_SCALE_RATIO',1.25);

class ProjectPDF extends \TCPDF
{
    private string $footerHtml = '';

    public function setFooterHTML(string $html): void
    {
        $this->footerHtml = $html;
    }

    public function Footer(): void
    {
        if ($this->footerHtml) {
            $this->writeHTML($this->footerHtml, true, false, true, false, '');
        }
    }
}
