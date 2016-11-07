<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indexpage extends CI_Controller {

 	function __construct(){
 		parent::__construct();
 		 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "tblcontributorspayment";
 	}
	public function index()
	{
		$this->load->view('index');
	}

	function aboutus(){
		$data["index"] = 7;
 		$this->load->view('about',$data);

	}

	function utilities(){
		$data["index"] = 8;
 		$this->load->view('admin/utilities',$data);

	}

	function generateExcelProject($p,$df,$dt){
		// $p = $this->input->post("p");
		// $df = $this->input->post("df");
		// $dt = $this->input->post("dt");

		$df = new DateTime($this->input->post("df"));
		$dt = new DateTime($this->input->post("dt")); 

		$df = $df->format("Y-m-d");
		$dt = $dt->format("Y-m-d");

		$data["project"] = $this->getProjectItem($p);
		$data["listdate"] = $this->getProjectRange($data["project"]->STARTDATE,$dt); 
		$data["startdate"] = $df;
		$data["contributors"] = $this->viewContributorsByProject($p); 
		$this->load->view('print', $data);
	}

	function viewContributorsByProject($project){
		$this->param["queryFile"] = "viewcontributions";
		$replace = array();
		$replace[] = array("KEY"=>"#projectid#","VALUE"=>$project);
		$this->param["queryReplace"] = $replace;
		$result = $this->query_model->getData($this->param); 
		return $result;
	}

	function getProjectItem($id){
		$this->param["table"] = "tblprojects";
		$this->param["fields"] = "*";
		$this->param["conditions"] = "ID = $id";
		$result = $this->query_model->getData($this->param);
		return $result[0];
	}

	function weeks_in_month($year, $month){
		date_default_timezone_set('Asia/Manila');
		$list = array();
		$year = intval($year);
		$month = intval($month); 

	    $num_of_days = date("t", mktime(0,0,0,$month,1,$year));
	  
	    $num_of_weeks = 0; 
	    for($i=1; $i<=$num_of_days; $i++)
	    { 
	      $currentDate = new DateTime($year . "-" . $month . '-' . $i);	 
	      $day_of_week = date('N', strtotime($year . "-" . $month . '-' . $i));
	      if($day_of_week == 7){ 
	      	$list[] = $i;
	      	$num_of_weeks++;
	      }
	        
	    } 
	    $obj = new StdClass();
	    $obj->NUMWEEKS = $num_of_weeks;
	    $obj->LISTDAYS = implode(",", $list);
	    return $obj;
	  }

	function getProjectRange($from, $to){
		$list =  array(); 
		$curDate = date_create($to);

		$curMonth = date_format($curDate, 'F');
		$curYEar = date_format($curDate, 'Y');

		$startDate = date_create($from);

		$startMonth = date_format($startDate, 'F');
		$startYear = date_format($startDate, 'Y');
		$intMonth = date_format($startDate, 'm');


		while($curMonth != $startMonth || $curYEar != $startYear){
			$listObj = new StdClass();
			$listObj->MONTH = $startMonth;
			$listObj->YEAR = $startYear;
			$listObj->WEEKS = $this->weeks_in_month($startYear,$intMonth);
			$list[] = $listObj;

			$startDate->add(new DateInterval('P1M'));
			$startMonth = date_format($startDate, 'F');
			$startYear = date_format($startDate, 'Y'); 
			$intMonth = date_format($startDate, 'm');

		}
		$listObj = new StdClass();
		$listObj->MONTH = $startMonth;
		$listObj->YEAR = $startYear;
		$listObj->WEEKS = $this->weeks_in_month($startYear,$intMonth);
		$list[] = $listObj;
	 
		return (object)($list);

	}

	function dbbackup(){
		$this->load->dbutil();
		$this->load->library("Email_Lib");
		$date = date('Y-m-d his');
		$newZip = 'cms-' . $date .'.zip';
		$prefs = array(
                'tables'      => array('tblassetsexpenses', 'tblcontributors','tblcontributorspayment','tblprojectcontributors','tblprojects','tblusers','vwactualcontributionbyproject','vwprojectcontribution','vwrecentcontributorpay','vwtargetcontributionbyproject'),  // Array of tables to backup.
                'ignore'      => array(),           // List of tables to omit from the backup
                'format'      => 'zip',             // gzip, zip, txt
                'filename'    => 'cms.sql',    // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );

		$backup = $this->dbutil->backup($prefs);
		$this->load->helper('file');

		write_file('bkdb/'. $newZip, $backup); 
		$subject = 'CMS Backup -' . $date;
		$data["attachment"] = $newZip;
		$result = $this->email_lib->sendMailTemplate($subject,"",$data); 

		if(!$result) 
			$this->session->set_flashdata('result', "<p class=\"label label-danger result\">The backup has been failed.</p>");
		else
			$this->session->set_flashdata('result', "<p class=\"label label-info result\">The backup has been sent.</p>");

		redirect('indexpage/utilities');
	}

}
