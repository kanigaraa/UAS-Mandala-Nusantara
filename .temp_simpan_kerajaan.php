    public function simpan_kerajaan() {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        $config['upload_path']      = './assets/kerajaan/'; 
        $config['allowed_types']    = 'png|jpg|jpeg';      
        $config['max_size']         = 5048;               
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('icon')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('admin/tambah_kerajaan');
        } else{
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            
            // Get manual ID if provided
            $manual_id = $this->input->post('id');
            $manual_kingdom_id = $this->input->post('kingdom_id');
            
            // If kingdom_id is not provided, create a new kingdoms entry
            if (empty($manual_kingdom_id)) {
                // Create entry in kingdoms table first
                $kingdoms_data = [
                    'nama' => $this->input->post('nama'),
                    'subjudul' => $this->input->post('kategori') . ' - ' . $this->input->post('lokasi'),
                    'gambar' => $file_name,
                    'deskripsi' => $this->input->post('deskripsi')
                ];
                
                // If manual ID is provided, use it for kingdoms table too
                if (!empty($manual_id)) {
                    $kingdoms_data['id'] = $manual_id;
                }
                
                $this->db->insert('kingdoms', $kingdoms_data);
                $kingdom_id = !empty($manual_id) ? $manual_id : $this->db->insert_id();
            } else {
                $kingdom_id = $manual_kingdom_id;
            }
            
            // Now insert into kerajaan table
            $data = [
                'kingdom_id'    => $kingdom_id,
                'nama'          => $this->input->post('nama'),
                'lokasi'        => $this->input->post('lokasi'),
                'icon'          => $file_name,
                'kategori'      => $this->input->post('kategori'),
                'deskripsi'     => $this->input->post('deskripsi')
            ];
            
            // Add ID if provided manually
            if (!empty($manual_id)) {
                $data['id'] = $manual_id;
            }
            
            $this->load->model('Kerajaan_model');
            $this->Kerajaan_model->insert($data);

            $this->session->set_flashdata('success', 'Data Kerajaan berhasil ditambahkan!');
            redirect('dashboard');
        }
    }
