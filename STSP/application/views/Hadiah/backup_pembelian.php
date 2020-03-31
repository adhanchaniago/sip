public function view_pembelian($rowno=0){

    // Search text
    $search_text = "";
    $search_text1 = "";
    if($this->input->post('submit') != NULL ){
      $search_text = $this->input->post('search');
      $search_text1 = $this->input->post('search1');
      $this->session->set_userdata(array("search"=>$search_text,"search1"=>$search_text1));
    }else{
      if($this->session->userdata('search') != NULL OR $this->session->userdata('search1') != NULL){
        $search_text = $this->session->userdata('search');
        $search_text1 = $this->session->userdata('search1');
      }
    }

    // Row per page
    $rowperpage = 10;

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $allcount = $this->Model_hadiah->getrecordCount($search_text,$search_text1);

    // Get records
    $users_record = $this->Model_hadiah->getData($rowno,$rowperpage,$search_text,$search_text1);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'Hadiah/view_Pembelian';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;

    // Initialize
    $this->pagination->initialize($config);
 
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['row'] = $rowno;
    $data['search'] = $search_text;
    $data['search1'] = $search_text1;

    // Load view
    $this->template->load('template','Hadiah/view_pembelian',$data);
 
  }
  <tbody>
								 <?php 
									$sno = $row+1;
									foreach($result as $data){
									  echo "<tr href = #  class= detail data-id = ".$data['no_beli'].">";
									  echo "<td>".$sno."</td>";
									  echo "<td>".$data['no_beli']."</a></td>";
									  echo "<td align=center>".$data['tgl']."</a></td>";
									  echo "<td>".$data['nama_toko']."</td>";
									  echo "<td align=center>".$data['no_telp']."</td>";
									  echo "<td align=right>".number_format($data['total'])."</td>";
									  echo "<td>".$data['keterangan']."</td>";
									  echo "<td>".$data['user']."</td>";
									  echo "</tr>";
									  $sno++;

									}
									if(count($result) == 0){
									  echo "<tr>";
									  echo "<td colspan='8' align = 'center'><b>Data Tidak Ada.</b></td>";
									  echo "</tr>";
									}
									?>
								</tbody>
							</table>
							<div style='margin-top: 10px;'>
						   <?= $pagination; ?>
						   </div>