<?php
class CartController extends CI_Controller{
	public function cart_buy(){
		$id = $this->uri->segment(3);

	//	echo $id;
		$this->load->model('cartmodel');
		
		$this->data['buydata']=$this->cartmodel->buy_pro($id);
		$this->load->view('viewcart',$this->data);


	}
  //add data to cart
	function cartadd(){

		$this->load->library("cart");
    $output=''; 
		$data = array(
                        "id"     => $_POST["product_id"],
            "qty"    => $_POST["quantity"],
            "price"  => $_POST["product_price"],
            "name" => $_POST["product_name"]
			);
		$this->cart->insert($data);
	 $output .= '<h3>Shopping Cart</h3>
                      <div class="table-responsive">
                      <div align="right">
                      <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
                      </div><br /> 
                      <table class="table table-bordered">
                      <tr>
                      <th width="40%">Name</th>
                      <th width="15%">Quantity</th>
                      <th width="15%">Price</th>
                      <th width="15%">Total</th>
                      <th width="15%">Action</th>
                      </tr>';

                      $count = 0;
                      foreach($this->cart->contents() as $items){
                        $count++;
                      $output .='
                      <tr>
                      <td>'.$items["name"].'</td>
                      <td>'.$items["qty"].'</td>
                      <td>'.$items["price"].'</td>

                      <td>'.$items["subtotal"].'</td>
                      <td><button type="button" class="remove" id="'.$items['rowid'].'" name="id" value="'.$items['rowid'].'">Remove</button>
 
                      </tr>
                      ';
                      }
                      $output .= '
                      <tr>
                           <td colspan="4" align="right">Total</td>
                           <td>'.$this->cart->total().'</td>   
                          
                      </tr>
                      </table>
                      </div>
                      ';
                      if($count == 0)
                      {
                        $output = '<h3 align="center">Cart is Empty</h3>';
                      }
                      print_r($output);
                      return $output;
	}
    //remove date 
    public function remove(){
    	$this->load->library("cart");
   
    	$rowid = $_POST["row_id"];
    	$data = array(
           'rowid' =>$rowid,
           'qty'  => 0

    		);
    	$this->cart->update($data);
      $this->loadupdate();
    }
    //update after remove
public function loadupdate(){
  $output = '';
  $output .= '<h3>Shopping Cart</h3>
                      <div class="table-responsive">
                      <div align="right">
                      <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
                      </div><br /> 
                      <table class="table table-bordered">
                      <tr>
                      <th width="40%">Name</th>
                      <th width="15%">Quantity</th>
                      <th width="15%">Price</th>
                      <th width="15%">Total</th>
                      <th width="15%">Action</th>
                      </tr>';

                      $count = 0;
                      foreach($this->cart->contents() as $items){
                        $count++;
                      $output .='
                      <tr>
                      <td>'.$items["name"].'</td>
                      <td>'.$items["qty"].'</td>
                      <td>'.$items["price"].'</td>

                      <td>'.$items["subtotal"].'</td>
                      <td><button type="button" class="remove" id="'.$items['rowid'].'" name="id" value="'.$items['rowid'].'">Remove</button>
 
                      </tr>
                      ';
                      }
                      $output .= '
                      <tr>
                           <td colspan="4" align="right">Total</td>
                           <td>'.$this->cart->total().'</td>   
                          
                      </tr>
                      </table>
                      </div>
                      ';
                      if($count == 0)
                      {
                        $output = '<h3 align="center">Cart is Empty</h3>';
                      }
                      print_r($output);
                      return $output;

}

//clear whole cart data 
    public function clear(){
    	$this->load->library("cart");
    	$this->cart->destroy();
  
    }


}