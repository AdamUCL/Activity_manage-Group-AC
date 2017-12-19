<?php 

	function PHPExcel($type,$name,$list)
	{
		// Import Excel data type
		import("Org.Util.PHPExcel");
		
		$objPHPExcel = new \PHPExcel();
		// set Excel file details
		$objPHPExcel->getProperties()->setCreator("snail team")
									 ->setLastModifiedBy("snail team")
									 ->setTitle("Excel")
									 ->setSubject("Excel")
									 ->setDescription("Excel")
									 ->setKeywords("excel")
									 ->setCategory("file");

		switch ($type) {
			// export information
			case 1:
				// set excel unit information
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A1', 'Username') 
							->setCellValue('B1', 'Phone') 
							->setCellValue('C1', 'Email') 
							->setCellValue('D1', 'Activity name')
							->setCellValue('E1', 'Sign time')
							->setCellValue('F1', 'Title')
							->setCellValue('G1', 'Descr')
							->setCellValue('H1', 'Start time')
							->setCellValue('I1', 'End time')
							->setCellValue('J1', 'Location');
				// set unit width
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('A')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('B')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('C')
							->setWidth(25);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('D')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('E')
							->setWidth(20);	
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('F')
							->setWidth(20);	
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('G')
							->setWidth(20);	
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('H')
							->setWidth(20);	
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('I')
							->setWidth(20);	
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('J')
							->setWidth(20);																

				foreach($list as $k => $v){
					$num = $k + 2;
					// import data into each unit
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A'.$num, $v['username']) 
								->setCellValueExplicit('B'.$num, $v['user_phone'], PHPExcel_Cell_DataType::TYPE_STRING)
								->setCellValue('C'.$num, $v['user_email'])
								->setCellValueExplicit('D'.$num, $v['name'], PHPExcel_Cell_DataType::TYPE_STRING)
								->setCellValue('E'.$num, $v['create_time'])
								->setCellValue('F'.$num, $v['title'])
								->setCellValue('G'.$num, $v['descr'])
								->setCellValue('H'.$num, $v['start_time'])
								->setCellValue('I'.$num, $v['end_time'])
								->setCellValue('J'.$num, $v['location']);

					
					$objPHPExcel->getActiveSheet()
								->getStyle('A'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('B'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('C'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('D'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('E'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('F'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('G'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('H'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('I'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('J'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);																	
				 }
				break;
			// export information
			case 2:
				// set Excel sub tile
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A1', '姓名') 
							->setCellValue('B1', '身份证号码');
				// set unit width
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('A')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('B')
							->setWidth(30);
				foreach($list as $k => $v){
					$num = $k + 2;
					// import data into each unit
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A'.$num, $v['name']) 
								->setCellValueExplicit('B'.$num, $v['card'], PHPExcel_Cell_DataType::TYPE_STRING);

				
					$objPHPExcel->getActiveSheet()
								->getStyle('A'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('B'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
				 }
				break;
			// export information
			case 3:
				// set Excel unit head content
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A1', 'name')
							->setCellValue('B1', 'practice person')
							->setCellValue('C1', 'mark')
							->setCellValue('D1', 'reason')
							->setCellValue('E1', 'time');
				// set unit width
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('A')
							->setWidth(30);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('B')
							->setWidth(30);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('C')
							->setWidth(30);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('D')
							->setWidth(30);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('E')
							->setWidth(50);
				foreach($list as $k => $v){
					$num = $k + 2;
					// import data into each unit
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A'.$num, $v['stu_id'])
								->setCellValue('B'.$num, $v['do_id'])
								->setCellValue('C'.$num, $v['score'])
								->setCellValue('D'.$num, $v['cause'])
								->setCellValue('E'.$num, $v['created']);
					
					$objPHPExcel->getActiveSheet()
								->getStyle('A'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('B'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('C'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('D'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('E'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
				 }
				break;
			// export information
			case 4:
				// set excel unit content
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A1', 'name')
							->setCellValue('B1', 'reasons')
							->setCellValue('C1', 'starttime')
							->setCellValue('D1', 'endtime')
							->setCellValue('E1', 'duration');
				// set unit width
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('A')
							->setWidth(30);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('B')
							->setWidth(30);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('C')
							->setWidth(30);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('D')
							->setWidth(30);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('E')
							->setWidth(50);
				foreach($list as $k => $v){
					$num = $k + 2;
			
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A'.$num, $v['pid'])
								->setCellValue('B'.$num, $v['cause'])
								->setCellValue('C'.$num, $v['start_time'])
								->setCellValue('D'.$num, $v['end_time'])
								->setCellValue('E'.$num, $v['day']);

				
					$objPHPExcel->getActiveSheet()
								->getStyle('A'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('B'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('C'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('D'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('E'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
				 }
				break;

				case 5:
				// set unit content
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A1', '姓名')
							->setCellValue('B1', '性别')
							->setCellValue('C1', '籍贯')
							->setCellValue('D1', '身份证号码')
							->setCellValue('E1', '小组')
							->setCellValue('F1', '绩效分')
							->setCellValue('G1', '手机')
							->setCellValue('H1', '邮箱')
							->setCellValue('I1', 'QQ')
							->setCellValue('J1', '学校所在省')
							->setCellValue('K1', '毕业院校')
							->setCellValue('L1', '专业')
							->setCellValue('M1', '学历')
							->setCellValue('N1', '计算机基础')
							->setCellValue('O1', '工作经验(年)')
							->setCellValue('P1', '目标薪资')
							->setCellValue('Q1', '紧急联系人')
							->setCellValue('R1', '与紧急联系人的关系')
							->setCellValue('S1', '紧急联系人手机');
				// set unit width
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('A')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('B')
							->setWidth(10);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('C')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('D')
							->setWidth(30);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('E')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('F')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('G')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('H')
							->setWidth(30);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('I')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('J')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('K')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('L')
							->setWidth(30);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('M')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('N')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('O')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('P')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('Q')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('R')
							->setWidth(20);
				$objPHPExcel->getActiveSheet()
							->getColumnDimension('S')
							->setWidth(20);
								
				foreach($list as $k => $v){
					$num = $k + 2;
				
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A'.$num, $v['name'])
								->setCellValue('B'.$num, $v['sex'])
								->setCellValue('C'.$num, $v['address'])
								->setCellValueExplicit('D'.$num, $v['card'], PHPExcel_Cell_DataType::TYPE_STRING)
								->setCellValue('E'.$num, $v['team'])
								->setCellValue('F'.$num, $v['performance'])
								->setCellValue('G'.$num, $v['phone'])
								->setCellValue('H'.$num, $v['email'])
								->setCellValue('I'.$num, $v['qq'])
								->setCellValue('J'.$num, $v['school_address'])
								->setCellValue('K'.$num, $v['school'])
								->setCellValue('L'.$num, $v['subject'])
								->setCellValue('M'.$num, $v['education'])
								->setCellValue('N'.$num, $v['computer'])
								->setCellValue('O'.$num, $v['work_year'])
								->setCellValue('P'.$num, $v['target'])
								->setCellValue('Q'.$num, $v['contacts_name'])
								->setCellValue('R'.$num, $v['contacts_relation'])
								->setCellValue('S'.$num, $v['contacts_phone']);

					// 设置单元格左对齐
					$objPHPExcel->getActiveSheet()
								->getStyle('A'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('B'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('C'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('D'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('E'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('F'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('G'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('H'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('I'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('J'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('K'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('L'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('M'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('N'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('O'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('P'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('Q'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('R'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					$objPHPExcel->getActiveSheet()
								->getStyle('S'.$num)
								->getAlignment()
								->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
				 }
				break;
			case 6:
				$str=[A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z];
				
				$key = array_keys($list['0']);
				for ($i=0; $i < count($list['0']); $i++) { 
	
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($str[$i].'1', $key[$i]);
					
					$objPHPExcel->getActiveSheet()->getColumnDimension($str[$i])->setWidth(20);
					
					$objPHPExcel->getActiveSheet()->getStyle($str[$i].'1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
				}

			
				for ($i=0; $i < count($list); $i++) {
					
					for ($j=0; $j < count($list['0']); $j++) { 
						$objPHPExcel->setActiveSheetIndex(0)->setCellValue($str[$j].($i+2), array_values($list[$i])[$j]);
					
						$objPHPExcel->getActiveSheet()->getStyle($str[$j].($i+2))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					}
				}
				break;
		}

		// import input
		import("Org.Util.PHPExcel.IOFactory");	
		// describle download type
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment;filename=".$name." ".date("Y-m-d",time()).".xlsx");
		header("Cache-Control: max-age=0");
		// export xlsx
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}
	

	function test($to,$param){
		
		import('Vendor.lib.Ucpaas');

		$options['accountsid']='5434736dacc81112c54fe4690f3918db';
		$options['token']='5533ad03bfed6a6a8bbab65f106c4c31';
		$ucpass = new Ucpaas($options);
		echo $ucpass->getDevinfo('json');
		$appId = "e0fd9976a2434d71b5930d300b70b05a";
		$to = $to;
		$templateId = "40602";
		$param=$param;

		echo $ucpass->templateSMS($appId,$to,$templateId,$param);
	}
	
 ?>