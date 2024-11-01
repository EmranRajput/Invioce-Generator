@extends('index')       
 @section('admin')  
 <style>
	.hr_styling{
		margin-left: 9px !important;
		margin-right: 18px !important;
		margin-top: 31px !important;
	}
 </style>         
            <div class="page-content">   
				<div id="stepper1" class="bs-stepper">
				  <div class="card">
					
					<div class="card-header crd_header">
							<div class="row g-3" >
								<div class="col-12 col-lg-9">
									<h3 class="mb-0 steper-title">{{$company->name_english}}</h3>
								</div>
								<div class="col-12 col-lg-3">
									<h2 class="mb-0 steper-title">  {{$company->name_other_language}}  </h2>
								</div>
							  </div>							
					</div>
				    <div class="card-body crd_body">
					  <div class="bs-stepper-content">
						<form onSubmit="return false">
						  <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
								<div class="row g-3">
										<div class="col-12 col-lg-10">
											<!-- VAT -->
											<div class="d-flex align-items-center mb-2">
												<h6 class="mb-0">VAT/الرقم الضريبي:</h6>
												<span class="ms-2">{{ $company->vat }}</span>
											</div>

											<!-- CR -->
											<div class="d-flex align-items-center mb-2">
												<h6 class="mb-0">CR/س-ت:</h6>
												<span class="ms-2">{{ $company->cr }}</span> <!-- Assuming 'cr_number' is the field -->
											</div>

											<!-- Mobile -->
											<div class="d-flex align-items-center mb-4">
												<h6 class="mb-0">Mobile/رقم الجوال:</h6>
												<span class="ms-2">{{ $company->phone }}</span> <!-- Assuming 'mobile' is the field -->
											</div>
										</div>

									<div class="col-12 col-lg-2">
										<img src="assets/images/avatars/the_law.png" alt="Admin" class="rounded-circle p-1 " width="110">										
									</div>
								</div>
							<div class="row g-3 ">
								<div class="col-12 col-lg-3">
									<label for="FisrtName" class="form-label">CUSTOMER VAT REG/تسجيل العملاء  </label>
									<div class="input-group">
										<span class="input-group-text input-styling"><i class="bx bx-hash"></i></span>
										<input type="text" class="form-control" id="input27" placeholder="Vat Reg">
									</div>
								</div>
								
								<div class="col-12 col-lg-2">
									<label for="InputLanguage" class="form-label">PAYMENT TYPE/شروط الدفع</label>
									<select class="form-select" id="InputLanguage" aria-label="Default select example">
										<option value="cash" selected="">Cash</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
										</select>
								</div>
								<div class="col-12 col-lg-2">
									<label for="FisrtName" class="form-label">INVOICE DATE /تاريخ الفاتورة</label>
									<div class="input-group">
										<input type="date" class="form-control" id="input27" placeholder="Vat Reg">
									</div>
								</div>
								<hr class="hr_styling">


								
								
								
								
								<div class="col-12 col-lg-4 ">
										<label for="LastName" class="form-label">CUSTOMER NAME/ اسم العميل</label>
										<input type="text" class="form-control" id="LastName" placeholder="Customer Name">
								</div>
								<div class="col-12 col-lg-2">
								</div>
								<div class="col-12 col-lg-6">
									<label for="FisrtName" class="form-label">ADDRESS/ عنوان </label>
									<div class="input-group">
										<span class="input-group-text input-styling"><i class="bx bx-location"></i></span>
										<input type="text" class="form-control" id="input27" placeholder="Vat Reg">
									</div>
								</div>
								<!-- .................... -->
<div class="card-body product_details">
		<div class="container mt-4">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Product Details</th>
        <th>Rate</th>
        <th>Quantity</th>
        <th class="text-end">Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="newlink">
      <!-- Existing row structure -->
      <tr id="1" class="product">
        <th scope="row" class="product-id">1</th>
        <td class="text-start">
          <textarea class="form-control bg-light border-0" id="productDetails-1" rows="2" placeholder="Product Details"></textarea>
        </td>
        <td>
          <input type="number" class="form-control product-price bg-light border-0" id="productRate-1" step="0.01" placeholder="0.00" required="">
          <div class="invalid-feedback">Please enter a rate</div>
        </td>
        <td>
          <div class="input-step">
            <button type="button" class="minus">–</button>
            <input type="number" class="product-quantity" id="product-qty-1" value="0" readonly="">
            <button type="button" class="plus">+</button>
          </div>
        </td>
        <td class="text-end">
          <input type="text" class="form-control bg-light border-0 product-line-price" id="productPrice-1" placeholder="$0.00" readonly="">
        </td>
        <td class="product-removal">
          <a href="javascript:void(0)" class="btn btn-danger delete-item">Delete</a>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">
          <a href="javascript:void(0)" id="add-item" class="btn btn-info fw-medium text-white" style="border-radius:0px;">
            <i class="bx bx-plus"></i> Add Item
          </a>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
                                                    <tr class="border-top border-top-dashed mt-2">
                                                        <td colspan="3"></td>
                                                        <td colspan="2" class="p-0">
                                                            <table class="table table-borderless table-sm table-nowrap align-middle mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">Sub Total/المجموع الفرعي</th>
                                                                        <td style="width:150px;">
                                                                            <input type="text" class="form-control bg-light border-0" id="cart-subtotal" placeholder="0.00" readonly="">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Discount %/تخفيض  </th>
                                                                        <td>
                                                                            <input type="text" class="form-control bg-light border-0" id="cart-tax" placeholder="0.00" readonly="">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Discount Amount/مبلغ الخصم <small class="text-muted"></small></th>
                                                                        <td>
                                                                            <input type="text" class="form-control bg-light border-0" id="cart-discount" placeholder="0.00" readonly="">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">VAT Amount/قيمة الضريبة</th>
                                                                        <td>
                                                                            <input type="text" class="form-control bg-light border-0" id="cart-shipping" placeholder="0.00" readonly="">
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="border-top border-top-dashed">
                                                                        <th scope="row">Total Amount/المبلغ الإجمالي</th>
                                                                        <td>
                                                                            <input type="text" class="form-control bg-light border-0" id="cart-total" placeholder="0.00" readonly="">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!--end table-->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        
                            
                                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                            <button type="submit" class="btn btn-info"><i class=" bx bx-printer "></i> Print/مطبعة</button>
                                            <a href="javascript:void(0);" class="btn btn-primary"><i class=" bx bx-download"></i> Download Invoice/تحميل</a>
                                            <a href="javascript:void(0);" class="btn btn-danger"><i class=" bx bx-plane"></i> Send Invoice/يرسل</a>
                                        </div>
                                    </div>

							</div><!---end row-->
							
						  </div>

						  
							

							
						  </div>
						</form>
					  </div>
					   
					</div>
				   </div>
				 </div>
				<!--end stepper one--> 
                </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
				<script>
  $(document).ready(function() {
    let rowCount = 1;

    // Function to add a new row
    $('#add-item').click(function() {
      rowCount++;
      const newRow = `
        <tr id="${rowCount}" class="product">
          <th scope="row" class="product-id">${rowCount}</th>
          <td class="text-start">
            <textarea class="form-control bg-light border-0" id="productDetails-${rowCount}" rows="2" placeholder="Product Details"></textarea>
          </td>
          <td>
            <input type="number" class="form-control product-price bg-light border-0" id="productRate-${rowCount}" step="0.01" placeholder="0.00" required="">
            <div class="invalid-feedback">Please enter a rate</div>
          </td>
          <td>
            <div class="input-step">
              <button type="button" class="minus">–</button>
              <input type="number" class="product-quantity" id="product-qty-${rowCount}" value="0" readonly="">
              <button type="button" class="plus">+</button>
            </div>
          </td>
          <td class="text-end">
            <input type="text" class="form-control bg-light border-0 product-line-price" id="productPrice-${rowCount}" placeholder="$0.00" readonly="">
          </td>
          <td class="product-removal">
            <a href="javascript:void(0)" class="btn btn-danger delete-item">Delete</a>
          </td>
        </tr>
      `;
      $('#newlink').append(newRow);
    });

    // Function to delete a row
    $('#newlink').on('click', '.delete-item', function() {
      $(this).closest('tr').remove();
      updateRowNumbers();
    });

    // Update row numbers after deletion
    function updateRowNumbers() {
      $('#newlink .product').each(function(index) {
        $(this).attr('id', index + 1);
        $(this).find('.product-id').text(index + 1);
        $(this).find('textarea, input').each(function() {
          const idAttr = $(this).attr('id');
          if (idAttr) {
            const newId = idAttr.replace(/\d+$/, index + 1);
            $(this).attr('id', newId);
          }
        });
      });
      rowCount = $('#newlink .product').length;
    }

    // Quantity increment and decrement functionality
    $('#newlink').on('click', '.plus', function() {
      const $quantity = $(this).siblings('.product-quantity');
      $quantity.val(parseInt($quantity.val()) + 1);
    });

    $('#newlink').on('click', '.minus', function() {
      const $quantity = $(this).siblings('.product-quantity');
      const currentValue = parseInt($quantity.val());
      if (currentValue > 0) {
        $quantity.val(currentValue - 1);
      }
    });
  });
//   ..........................
document.addEventListener('DOMContentLoaded', function() {
    // Function to calculate line price
    function calculateLinePrice(rowCount) {
        const productPrice = parseFloat(document.getElementById(`productRate-${rowCount}`).value) || 0;
        const productQuantity = parseInt(document.getElementById(`product-qty-${rowCount}`).value) || 0;
        const linePrice = (productPrice * productQuantity).toFixed(2);
        
        document.getElementById(`productPrice-${rowCount}`).value = `$${linePrice}`;
    }
});
</script>

    @endsection
