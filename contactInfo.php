<?php
	class ContactInfo{
		private $customerName;
		private $phoneNumber;
		private $emailAddress;
		private $referral;
		
		function __construct($customerName, $phoneNumber, $emailAddress, $referral){
			$this->setCustomerName($customerName);
			$this->setPhoneNumber($phoneNumber);
			$this->setEmailAddress($emailAddress);
			$this->setReferral($referral);
		}
		
		public function getCustomerName(){
			return $this->customerName;
		}
		
		public function setCustomerName($customerName){
			$this->customerName = $customerName;
		}
		
		public function getPhoneNumber(){
			return $this->phoneNumber;
		}
		
		public function setPhoneNumber($phoneNumber){
			$this->phoneNumber = $phoneNumber;
		}
		
		public function getEmailAddress(){
			return $this->emailAddress;
		}
		
		public function setEmailAddress($emailAddress){
			$this->emailAddress = $emailAddress;
		}
		
		public function getReferral(){
			return $this->referral;
		}
		
		public function setReferral($referral){
			$this->referral = $referral;
		}
		
	}
?>