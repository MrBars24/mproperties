<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
      require_once(str_replace("\\","/",APPPATH).'libraries/tcpdf/tcpdf.php');
      
      class Tcpdf_lib extends TCPDF{

           function __construct()
		    {
		        parent::__construct();
		    }

		    // public function Header() {
	     //    // get the current page break margin
		    //     $bMargin = $this->getBreakMargin();
		    //     // get current auto-page-break mode
		    //     $auto_page_break = $this->AutoPageBreak;
		    //     // disable auto-page-break
		    //     $this->SetAutoPageBreak(false, 0);
		    //     // set bacground image
		    //     $img_file = base_url('uploads/profile/girl-alt.png');
		    //     $this->Image($img_file, -3, -2.9, 80, 0, '', '', '', false, 300, '', false, false, 0);
		    //     // restore auto-page-break status
		    //     $this->SetAutoPageBreak($auto_page_break, $bMargin);
		    //     // set the starting point for the page content
		    //     $this->setPageMark();
	    	// }
      }
?>
