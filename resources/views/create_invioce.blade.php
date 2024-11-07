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
						<!-- <form onSubmit="return false"> -->
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
<!-- validation error message here -->
							@if($errors->any())
							@foreach($errors->all() as $error)
							<div class="alert alert-danger">{{$error}}</div>
							@endforeach
							@endif
		<!-- end validation error message here -->

<form action="{{ route('store.invioce') }}" method="POST" enctype="multipart/form-data">
  @csrf

							<div class="row g-3 ">
								<div class="col-12 col-lg-3">
                  <input type="hidden" name="company_id" value="{{$company->id}}">
									<label for="FisrtName" class="form-label">CUSTOMER VAT REG/تسجيل العملاء  </label>
									<div class="input-group">
										<span class="input-group-text input-styling"><i class="bx bx-hash"></i></span>
										<input type="text" class="form-control" name="customer_vat" id="input27" placeholder="Vat Reg">
									</div>
								</div>
								
								<div class="col-12 col-lg-2">
									<label for="InputLanguage" class="form-label">PAYMENT TYPE/شروط الدفع</label>
									<select class="form-select" name="payment_type" id="InputLanguage" aria-label="Default select example">
										<option value="cash" selected="">Cash</option>
										<option value="bank">Bank</option>
										<option value="credit_card">Credit Card</option>
										</select>
								</div>
								<div class="col-12 col-lg-2">
									<label for="FisrtName" class="form-label">INVOICE DATE /تاريخ الفاتورة</label>
									<div class="input-group">
										<input type="date" name="date" class="form-control" id="input27" placeholder="Vat Reg">
									</div>
								</div>
								<hr class="hr_styling">


								
								
								
								
								<div class="col-12 col-lg-4 ">
										<label for="LastName" class="form-label">CUSTOMER NAME/ اسم العميل</label>
										<input type="text" class="form-control" name="customer_name" id="LastName" placeholder="Customer Name">
								</div>
								<div class="col-12 col-lg-2">
								</div>
								<div class="col-12 col-lg-6">
									<label for="FisrtName" class="form-label">ADDRESS/ عنوان </label>
									<div class="input-group">
										<span class="input-group-text input-styling"><i class="bx bx-location"></i></span>
										<input type="text" class="form-control" name="customer_address" id="input27" placeholder="Vat Reg">
									</div>
								</div>
								<!-- .................... -->
<div class="card-body product_details">
		<div class="container mt-4">

          <table class="table table-bordered">
            <thead class="input-styling">
                <tr>
                    <th>Product Details</th>
                    <th>Rate</th>
                    <th>Quantity</th>
                    <th class="text">Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="dynamic-fields">
                <tr>
                    <td> <textarea class="form-control bg-light border-0" name="product_detail[]" id="productDetails-1" rows="2" placeholder="Product Details"></textarea></td>

                    <td><input type="number" name="unite_price[]" class="form-control" placeholder="unite price"></td>
                    <td>
                        <div class="input-group ">
                            <button type="button" class="btn btn-secondary decrease-quantity">-</button>
                            <input type="number" name="quantity[]" class="form-control quantity-field" value="0" min="0">
                            <button type="button" class="btn btn-secondary increase-quantity">+</button>
                        </div>
                    </td>
                    <td><input type="number" name="amount[]" class="form-control" placeholder="amount" readonly></td>
                                        
                    <td><button type="button" class="btn btn-danger remove-field">Remove</button></td>
                </tr>
            </tbody>
        </table>
        <button type="button" id="add-field" class="btn btn-primary mt-2">Add Item</button>
</div>
								    <hr class="hr_styling">

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
                                                                            <input type="text" name="discount" class="form-control bg-light border-0" id="cart-tax"  >
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Discount Amount/مبلغ الخصم <small class="text-muted"></small></th>
                                                                        <td>
                                                                            <input type="text" name="discount_amount" class="form-control bg-light border-0" id="cart-discount"  readonly="">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">VAT Amount/قيمة الضريبة</th>
                                                                        <td>
                                                                            <input type="text" name="vat_amount" class="form-control bg-light border-0" id="cart-shipping"  >
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="border-top border-top-dashed">
                                                                        <th scope="row">Total Amount/المبلغ الإجمالي</th>
                                                                        <td>
                                                                            <input type="text" name="total_amount" class="form-control bg-light border-0" id="cart-total" placeholder="0.00" readonly="">
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
                                            <button type="submit" class="btn btn-info"><i class=" bx bx-printer "></i> View Invoice/تحميل</button>
                                            <a href="javascript:void(0);" class="btn btn-primary"><i class=" bx bx-download"></i>Print/مطبعة </a>
                                            <a href="javascript:void(0);" class="btn btn-danger"><i class=" bx bx-plane"></i> Send Invoice/يرسل</a>
                                        </div>
                                    </div>

							</div><!---end row-->
							
						  </div>
<!-- ................................................................ -->

<!-- ....................... -->

							
						  </div>
						</form>
					  </div>
					   
					</div>
				   </div>
				 </div>
				<!--end stepper one--> 
                </div>
<!-- ................................... -->



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Function to calculate row amount
    function calculateRowAmount($row) {
        const unitPrice = parseFloat($row.find('input[name="unite_price[]"]').val()) || 0;
        const quantity = parseInt($row.find('input[name="quantity[]"]').val()) || 0;
        const amount = unitPrice * quantity;
        $row.find('input[name="amount[]"]').val(amount.toFixed(2)); // Display amount in the row
        calculateTotal(); // Recalculate total invoice amount
    }

    // Function to calculate subtotal, discount, VAT, and total
    function calculateTotal() {
        let subtotal = 0;
        $('#dynamic-fields tr').each(function() {
            const rowAmount = parseFloat($(this).find('input[name="amount[]"]').val()) || 0;
            subtotal += rowAmount;
        });

        const discountPercent = parseFloat($('input[name="discount"]').val()) || 0;
        const discountAmount = (subtotal * discountPercent) / 100;
        const vatAmount = parseFloat($('input[name="vat_amount"]').val()) || 0;
        const totalAmount = subtotal - discountAmount + vatAmount;

        // Update fields
        $('#cart-subtotal').val(subtotal.toFixed(2));
        $('#cart-discount').val(discountAmount.toFixed(2));
        $('#cart-shipping').val(vatAmount.toFixed(2));
        $('#cart-total').val(totalAmount.toFixed(2));
    }

    // Add new row
    $('#add-field').click(function() {
        const fieldHTML = `
            <tr>
                <td><textarea class="form-control bg-light border-0" name="product_detail[]" rows="2" placeholder="Product Details"></textarea></td>
                <td><input type="number" name="unite_price[]" class="form-control" placeholder="unit price"></td>
                <td>
                    <div class="input-group">
                        <button type="button" class="btn btn-secondary decrease-quantity">-</button>
                        <input type="number" name="quantity[]" class="form-control quantity-field" value="1" min="1">
                        <button type="button" class="btn btn-secondary increase-quantity">+</button>
                    </div>
                </td>
                <td><input type="text" name="amount[]" class="form-control" placeholder="amount" readonly></td>
                <td><button type="button" class="btn btn-danger remove-field">Remove</button></td>
            </tr>`;
        $('#dynamic-fields').append(fieldHTML);
    });

    // Remove row
    $('#dynamic-fields').on('click', '.remove-field', function() {
        $(this).closest('tr').remove();
        calculateTotal(); // Recalculate total invoice amount after removing a row
    });

    // Increase quantity
    $('#dynamic-fields').on('click', '.increase-quantity', function() {
        const $quantityField = $(this).siblings('.quantity-field');
        let currentValue = parseInt($quantityField.val()) || 0;
        $quantityField.val(currentValue + 1);
        calculateRowAmount($(this).closest('tr')); // Calculate amount for the row
    });

    // Decrease quantity
    $('#dynamic-fields').on('click', '.decrease-quantity', function() {
        const $quantityField = $(this).siblings('.quantity-field');
        let currentValue = parseInt($quantityField.val()) || 0;
        if (currentValue > 1) {
            $quantityField.val(currentValue - 1);
            calculateRowAmount($(this).closest('tr')); // Calculate amount for the row
        }
    });

    // Calculate amount on unit price or quantity change
    $('#dynamic-fields').on('input', 'input[name="unit_price[]"], input[name="quantity[]"]', function() {
        calculateRowAmount($(this).closest('tr'));
    });

    // Calculate total when discount or VAT changes
    $('input[name="discount"], input[name="vat_amount"]').on('input', function() {
        calculateTotal();
    });
});

</script>

    @endsection
