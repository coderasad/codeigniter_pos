<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

	public function checkEmail(){
        $email = $this->input->post('email', true);
        if($email){
            $result = $this->om->view('*','users',['email' => $email]);
            if($result){
                echo"
                    Email Not Available.
                ";
            }else{
                echo"
                    Email Available.
                ";
            }
        }
    }
    
	public function checkProduct(){
        $pid = $this->input->post('pid', true);
        if($pid){
            $result = $this->om->view('product.quantity','product',['id' => $pid]);
            if($result){
                foreach($result as $data){                    
                    echo $data->quantity;                    
                }
            }else{
                echo"Product Select First";
            }
        }
    }
    
	public function customer_due(){
        $customer_id = $this->input->post('customer_id', true);
        if($customer_id){
            $result = $this->om->view('customer.*','customer',['id' => $customer_id]);
            if($result){
                foreach($result as $data){                    
                    echo $data->due_balance + $data->opening_balance;                    
                }
            }
        }
    }
	public function pay_amount(){
        $supplier_id = $this->input->post('supplier_id', true);
        if($supplier_id){
            $result = $this->om->view('supplier.*','supplier',['id' => $supplier_id]);
            if($result){
                foreach($result as $data){                    
                    echo $data->due_balance + $data->opening_balance;                      
                }
            }
        }
    }
	public function checkPrice(){
        $qid = $this->input->post('qid', true);
        if($qid){
            $result = $this->om->view('product.sell_price','product',['id' => $qid]);
            if($result){
                foreach($result as $data){                    
                    echo $data->sell_price;                    
                }
            }else{
                echo"Product Select First";
            }
        }
    }
    
	public function addRow(){
        $demo_id = $this->input->post('demo_id', true);
        if($demo_id){
            $product = $this->om->view('*','product');
            if($product){?>
                <tr>
                    <td style="width: 220px">                                            
                        <select id="product_id_<?php echo $demo_id; ?>" name="product_id" class="select2 form-control mb-3 custom-select product_id" style="width: 100%; height:36px;">
                            <option>Select Product</option>
                            <?php 
                                foreach($product as $data){
                                    echo "
                                        <option value='{$data->id}'>{$data->name}</option>
                                    ";
                                }
                            ?>
                        </select>
                    </td>
                    <td id="available_quantity_<?php echo $demo_id; ?>"> 
                        <input type="text" name="available_quantity" class="form-control text-right" value="" readonly="">
                    </td>
                    <td>
                        <input type="number" name="quantity[]" id="quantity_<?php echo $demo_id; ?>" min="0" autocomplete="off" class="total_qntt_1 form-control text-right" placeholder="0 Pcs">
                    </td>
                    <td style="width: 85px">
                        <input type="number" name="rate[]" id="rate_<?php echo $demo_id; ?>"  min="0" placeholder="0.00" id="price_item_1" class="price_item1 price_item form-control text-right">
                    </td>
                    <!-- Discount -->
                    <td>
                        <input type="number" name="discount[]" id="discount_<?php echo $demo_id; ?>" class="form-control text-right" value="" min="0" tabindex="7" placeholder="0.00">
                    </td>

                    <td style="width: 100px">
                        <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_<?php echo $demo_id; ?>" value="" tabindex="-1" readonly="readonly"  placeholder="0.00">
                    </td>

                    <td>                                            
                        <button style="text-align: right;" class="btn btn-danger btn_delete" type="button" value="Delete">Delete</button>
                    </td>
                </tr>
            <?php }else{
                echo"";
            }
        }
    }
}
