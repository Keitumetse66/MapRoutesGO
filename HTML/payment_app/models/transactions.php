<?php
class Transaction {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function addTransaction($data) {
        //Prepare Query
        $this->db->query('INSERT INTO transactions (u_id, customer_id, product, amount, currency, status) VALUES(:u_id, :customer_id, :product, :amount, :currency, :status)');

        //Bind Values
        $this->db->bind(':u_id', $data['U_id']);
        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':product', $data['product']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':currency', $data['currency']);
        $this->db->bind(':status', $data['status']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

}





?>