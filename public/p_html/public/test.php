<?php

		  class click2mail_cost_estimate {
					private $USERNAME = "albinartifice";
					private $PASSWORD = "CoolRunnings1988";

					private $documentClass  = "Postcard 5 x 8";
					private $layout         = "Double Sided Postcard";
					private $productionTime = "Next Day";
					private $envelope       = "";
					private $color          = "Full Color";
					private $paperType      = "White Matte";
					private $printOption    = "Printing both sides";
					private $quantity       = "1";
					private $mailClass      = "First Class";

					public function getCostEstimate(
							  $documentClass 	= "",
							  $layout 			= "",
							  $productionTime 	= "",
							  $envelope 		= "",
							  $color 			= "",
							  $paperType 		= "",
							  $printOption 		= "",
							  $quantity 		= "",
							  $mailClass 		= ""
					){
							  $this->documentClass  = $documentClass 	? $documentClass 		: $this->documentClass;
							  $this->layout         = $layout 			? $layout 				: $this->layout;
							  $this->productionTime = $productionTime 	? $productionTime 		: $this->productionTime;
							  $this->envelope       = $envelope 		? $envelope 			: $this->envelope;
							  $this->color          = $color 			? $color 				: $this->color;
							  $this->paperType      = $paperType 		? $paperType 			: $this->paperType;
							  $this->printOption    = $printOption 		? $printOption 			: $this->printOption;
							  $this->quantity       = $quantity 		? $quantity 			: $this->quantity;
							  $this->mailClass      = $mailClass 		? $mailClass 			: $this->mailClass;

							  $ar = array(
										"documentClass"    => $this->documentClass
										, "layout"         => $this->layout
										, "productionTime" => $this->productionTime
										, "envelope"       => $this->envelope
										, "color"          => $this->color
										, "paperType"      => $this->paperType
										, "printOption"    => $this->printOption
										, "quantity"       => $this->quantity
										, "mailClass"      => $this->mailClass
							  );

							  $fields_string = http_build_query($ar);
							  $url           = "https://" . $this->USERNAME . ":" . $this->PASSWORD . "@rest.click2mail.com/molpro/costEstimate/?" . $fields_string;
							  $response      = file_get_contents($url);

							  $_SESSION['cost_estimate'] = new SimpleXMLElement($response);

							  return $_SESSION['cost_estimate'];
					}
		  }

		  $c2m = new click2mail_cost_estimate();

		  print_r($c2m->getCostEstimate());