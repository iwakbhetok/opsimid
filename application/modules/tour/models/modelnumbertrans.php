<?php
class modelNumbertrans extends CI_Model {
	
	var $thnTrans;
	var $blnTrans;
	var $ticketId;
	var $hotelId;
	var $dokumenId;
	var $bhId;
	var $bdId;
	var $tourId;
	var $othersId;
	var $vendorhotelId;
	var $vendordokId;
	var $vendorturId;
	var $vendorotherId;
	var $lastVh;
	var $lastVd;
	var $lastVt;
	var $lastVo;
	var $lastTiket;
	var $lastBh;
	var $lastBd;
	var $lastHotel;
	var $lastDokumen;
	var $lastTour;
	var $lastOthers;
	var $lastDP;
	var $groupId;
	var $lastDPhotel;
	var $lastPaymentTicket;
	var $lastPaymentHotel; 
	var $lastRefundHotel;
	var $lastRefundTicket;
	
	
	/* Get the paramater of auto numbering, set up in cosntruct */
	public function __construct(){
        parent::__construct();
//		$this->load->model('logUpdate');
		
		$data = $this->db->get_where("mst_conf", array("id" => 1))->row();
		
		$this->thnTrans = $data->thn_trans;
		$this->blnTrans = $data->bln_trans;
		$this->ticketId = $data->tiket_id;
		$this->hotelId = $data->hotel_id;
		$this->bhId = $data->bh_id;
		$this->bdId = $data->bd_id;
		$this->btId = $data->bt_id;
		$this->dokumenId = $data->dokumen_id;
		$this->tourId = $data->tour_id;
		$this->othersId = $data->others_id;
		$this->vendorhotelId = $data->vendorhotel_id;
		$this->vendordokId = $data->vendordok_id;
		$this->vendorturId = $data->vendortur_id;
		$this->vendorotherId = $data->vendorother_id;
		$this->lastTiket = (float)$data->last_tiket;
		$this->lastHotel = (float)$data->last_hotel;
		$this->lastBh = (float)$data->last_bh;
		$this->lastBd = (float)$data->last_bd;
		$this->lastDokumen = (float)$data->last_dokumen;
		$this->lastTour = (float)$data->last_tour;
		$this->lastOthers = (float)$data->last_others;
		$this->lastVh = (float)$data->last_vh;
		$this->lastVd = (float)$data->last_vd;
		$this->lastVt = (float)$data->last_vt;
		$this->lastVo = (float)$data->last_vo;
		$this->lastDP = (float)$data->last_dp;
		$this->lastDPhotel = (float)$data->last_dp_hotel;
		$this->lastDPtur = (float)$data->last_dp_tur;
		$this->lastPaymentTicket = (float)$data->last_paymentticket;
		$this->lastPaymentHotel = (float)$data->last_paymenthotel;
	    $this->lastRefundHotel = (float)$data->last_refundhotel;
		$this->lastRefundTicket= (float)$data->last_refundticket;
		$this->groupId = $this->convertToChar($this->session->userdata('userGroup'), 2);		
	}
	/* end setup */
	
	/* convert to char from number */
	private function convertToChar($number, $maxLen = NULL)	{
		
		if(empty($maxLen)) {
			$maxLen = 3;
		}
		
		$len = $maxLen - strlen($number);
		$return = "";
		
		for ($x=1; $x<=$len; $x++) {
			$return.= "0";
		}
		$return.= $number;
		
		return $return;
	}
	/* end convert */
	
	public function getVendorHotel() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$vhNum = $this->lastVh + 1;
		$lastVh = $this->vendorhotelId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($vhNum);
		
		return $lastVh;		
	}
	public function updateVendorHotel(){
		$vhNum = $this->lastVh + 1;
		$lastVh = $this->convertToChar($vhNum);
		
		$this->db->set("last_vh", $lastVh);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	
	public function getVendorDokumen() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$vdNum = $this->lastVd + 1;
		$lastVd = $this->vendordokId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($vdNum);
		
		return $lastVd;		
	}
	public function updateVendorDokumen(){
		$vdNum = $this->lastVd + 1;
		$lastVd = $this->convertToChar($vdNum);
		
		$this->db->set("last_vd", $lastVd);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	
//	public function getVendorTur() {	
////		$log = $this->session->all_userdata();
//		$valid = false;
//		
//		$vtNum = $this->lastVt + 1;
//		$lastVt = $this->vendorturId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($vtNum);
////                print_r($lastVt);
//		return $lastVt;		
//	}
        
        public function getVendorTur($max) {	
//		$log = $this->session->all_userdata();
//		$valid = false;
		
		$vtNum = $max + 1;
		$lastVt = $this->vendorturId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($vtNum);
//                print_r($lastVt);
		return $lastVt;		
	}
	public function updateVendorTur(){
		$vtNum = $this->lastVt + 1;
		$lastVt = $this->convertToChar($vtNum);
		
		$this->db->set("last_vt", $lastVt);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	
	public function getVendorOther() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$voNum = $this->lastVo + 1;
		$lastVo = $this->vendorotherId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($voNum);
	
		return $lastVo;		
	}
	public function updateVendorOther(){
		$voNum = $this->lastVo + 1;
		$lastVo = $this->convertToChar($voNum);
		
		$this->db->set("last_vo", $lastVo);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	
	/*  Get DP/TOP UP  transaction and update the last Number */	
	public function getDPNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$DPNum = $this->lastDP + 1;
		$lastDP = $this->groupId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($DPNum);
		
		return $lastDP;		
	}
	public function updateDPNumber(){
		$DPNum = $this->lastDP + 1;
		$lastDP = $this->convertToChar($DPNum);
		
		$this->db->set("last_dp", $lastDP);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	/* End DP/TOP UP Number handle */
	
	
	/*  Get DP/TOP UP  transaction and update the last Number */	
	public function getDPHotelNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$DPHotelNum = $this->lastDPhotel + 1;
		$lastDPhotel = $this->groupId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($DPHotelNum);
		
		return $lastDPhotel;		
	}
	public function updateDPHotelNumber(){
		$DPHotelNum = $this->lastDPhotel + 1;
		$lastDPhotel = $this->convertToChar($DPHotelNum);
		
		$this->db->set("last_dp_hotel", $lastDPhotel);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	/* End DP/TOP UP Number handle */
		
	
	/*  Get Ticket Number transaction and update the last Number */	
	public function getTicketNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$tiketNum = $this->lastTiket + 1;
		$lastTiket = $this->ticketId."".$this->groupId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($tiketNum);
		return $lastTiket;		
	}	
	public function updateTicketNumber(){
		$tiketNum = $this->lastTiket + 1;
		$lastTiket = $this->convertToChar($tiketNum);
		
		$this->db->set("last_tiket", $lastTiket);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	/* End Ticket Number handle */
	
	
	public function getBhNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$bhNum = $this->lastBh + 1;
		$lastBh = $this->bhId."".$this->groupId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($bhNum);
		return $lastBh;		
	}	
	public function updateBhNumber(){
		$bhNum = $this->lastBh + 1;
		$lastBh = $this->convertToChar($bhNum);
		
		$this->db->set("last_bh", $lastBh);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	
	public function getBdNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$bdNum = $this->lastBd + 1;
		$lastBd = $this->bdId."".$this->groupId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($bdNum);
		return $lastBd;		
	}	
	public function updateBdNumber(){
		$bdNum = $this->lastBd + 1;
		$lastBd = $this->convertToChar($bdNum);
		
		$this->db->set("last_bd", $lastBd);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	
	public function getBtNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$btNum = $this->lastDPtur + 1;
		$lastDPtur = $this->btId."".$this->groupId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($btNum);
		return $lastDPtur;		
	}	
	public function updateBtNumber(){
		$btNum = $this->lastDPtur + 1;
		$lastDPtur = $this->convertToChar($btNum);
		
		$this->db->set("last_dp_tur", $lastDPtur);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	
	
	
	/*  Get Ticket Number transaction and update the last Number */	
	public function getTicketPaymentNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$PaymentTicketNume = $this->lastPaymentTicket + 1;
		$lastPaymentTicket = $this->groupId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($PaymentTicketNume);
		return $lastPaymentTicket;		
	}	
	public function updateTicketPaymentNumber(){
		$PaymentTicketNume = $this->lastPaymentTicket + 1;
		$lastPaymentTicket = $this->convertToChar($PaymentTicketNume);
		
		$this->db->set("last_paymentticket", $lastPaymentTicket);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	/* End Ticket Number handle */
	
	
	/*  Get Hotel Invoice Number transaction and update the last Number */	
	public function getHotelNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$hotelNum = $this->lastHotel + 1;
		$lastHotel = $this->hotelId."".$this->session->userdata('userGroup')."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($hotelNum);
		return $lastHotel;		
	}	
	public function updateHotelNumber(){
		$hotelNum = $this->lastHotel + 1;
		$lastHotel= $this->convertToChar($hotelNum);
		
		$this->db->set("last_hotel", $lastHotel);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	/* End Ticket Number handle */
	
	public function getOtherNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$otherNum = $this->lastOthers+ 1;
		$lastOthers= $this->othersId."".$this->session->userdata('userGroup')."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($otherNum);
		return $lastOthers;		
	}	
	public function updateOtherNumber(){
		$otherNum = $this->lastOthers+ 1;
		$lastOthers= $this->convertToChar($otherNum);
		
		$this->db->set("last_others", $lastOthers);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	
	public function getDokNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$dokNum = $this->lastDokumen+ 1;
		$lastDokumen= $this->dokumenId."".$this->session->userdata('userGroup')."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($dokNum);
		return $lastDokumen;		
	}	
	public function updateDokNumber(){
		$dokNum = $this->lastDokumen+ 1;
		$lastDokumen= $this->convertToChar($dokNum);
		
		$this->db->set("last_dokumen", $lastDokumen);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	
	
	/*  Get Hotel Payment transaction number and update the last Number */	
	public function getHotelPaymentNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$PaymentHotelNum = $this->lastPaymentHotel + 1;
		$lastPaymentHotel = $this->groupId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($PaymentHotelNum);
		return $lastPaymentHotel;		
	}	
	public function updateHotelPaymentNumber(){
		$PaymentHotelNum = $this->lastPaymentHotel + 1;
		$lastPaymentHotel = $this->convertToChar($PaymentHotelNum);
		
		$this->db->set("last_paymenthotel", $lastPaymentHotel);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	/* End Ticket Number handle */	
	
	
	public function getHotelRefundNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$RefundHotelNum = $this->lastRefundHotel + 1;
		$lastRefundHotel = $this->groupId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($RefundHotelNum);
		return $lastRefundHotel;		
	}	
	public function updateHotelRefundNumber(){
		$RefundHotelNum = $this->lastRefundHotel + 1;
		$lastRefundHotel = $this->convertToChar($RefundHotelNum);
		
		$this->db->set("last_refundhotel", $lastRefundHotel);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	/* End Ticket Number handle */	
	
	public function getTicketRefundNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$RefundTicketNum = $this->lastRefundTicket+ 1;
		$lastRefundTicket = $this->groupId."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($RefundTicketNum);
		return $lastRefundTicket;		
	}	
	public function updateTicketRefundNumber(){
		$RefundTicketNum = $this->lastRefundTicket+ 1;
		$lastRefundTicket = $this->convertToChar($RefundTicketNum);
		
		$this->db->set("last_refundticket", $lastRefundTicket);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	/* End Ticket Number handle */	
	
	
	public function getDokumenNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$dokNum = $this->lastDokumen + 1;
		$lastDokumen = $this->dokumenId."".$this->session->userdata('userGroup')."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($dokNum);
		return $lastDokumen;		
	}
	
	public function getTourNumber()	{	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$tourNum = $this->lastTour + 1;
		$lastTour = $this->tourId."".$this->session->userdata('userGroup')."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($tourNum);
		return $lastTour;		
	}
	
	public function updateTourNumber(){
		$tourNum = $this->lastTour + 1;
		$lastTour= $this->convertToChar($tourNum);
		
		$this->db->set("last_tour", $lastTour);
		$this->db->where("id", 1);
		$this->db->update("mst_conf");
	}
	
	public function getOthersNumber() {	
		$log = $this->session->all_userdata();
		$valid = false;
		
		$othersNum = $this->lastOthers + 1;
		$lastOthers = $this->othersId."".$this->session->userdata('userGroup')."".$this->thnTrans."".$this->blnTrans."".$this->convertToChar($othersNum);
		return $lastOthers;		
	}
	
	
	
}
?>