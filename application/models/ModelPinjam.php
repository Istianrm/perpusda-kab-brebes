<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ModelPinjam extends CI_Model
{

    // Manipulasi tabel pinjam
    public function simpanPinjam($data)
    {
        try {
            // Check if the primary key (no_pinjam) already exists
            $existingRecord = $this->db->get_where('pinjam', ['no_pinjam' => $data['no_pinjam']])->row();

            if (!$existingRecord) {
                // If the record doesn't exist, perform the insert
                $this->db->insert('pinjam', $data);
                return true;
            } else {
                // Handle the duplicate entry error
                return false;
            }
        } catch (Exception $e) {
            // Handle the exception
            log_message('error', 'Error in ModelPinjam.php: ' . $e->getMessage());
            return false;
        }
    }

    public function deleteData($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }

    public function joinData()
    {
        $this->db->select('*');
        $this->db->from('pinjam');
        $this->db->join('detail_pinjam', 'detail_pinjam.no_pinjam=pinjam.no_pinjam', 'Right');
        return $this->db->get()->result_array();
    }
    // ... (other functions remain unchanged)

    // Manipulasi tabel detail_pinjam
    public function simpanDetail($idbooking, $nopinjam)
    {
        $sql = "INSERT INTO detail_pinjam (no_pinjam, id_buku) SELECT pinjam.no_pinjam, booking_detail.id_buku FROM pinjam, booking_detail WHERE booking_detail.id_booking=$idbooking AND pinjam.no_pinjam='$nopinjam'";
        $this->db->query($sql);
    }
}
