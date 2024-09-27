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
                                        <div class="table-responsive">
                                            <table class="invoice-table table table-borderless table-nowrap mb-0">
                                                <thead class="align-middle" style="background-color:#e9ecef;">
                                                    <tr class="table-active">
                                                        <th scope="col" style="width: 50px; ">#</th>
                                                        <th scope="col">
                                                            Product Details/تفاصيل المنتج
                                                        </th>
                                                        <th scope="col" style="width: 120px;">
                                                            <div class="d-flex currency-select input-light align-items-center">
                                                                Unit Price/سعر الوحدة
                                                            </div>
                                                        </th>
                                                        <th scope="col" style="width: 120px;">Quantity/الكمية</th>
                                                        <th scope="col" class="text-end" style="width: 150px;">Amount/كمية</th>
                                                        <th scope="col" class="text-end" style="width: 105px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="newlink">
                                                    <tr id="1" class="product">
                                                        <th scope="row" class="product-id">1</th>
                                                        <td class="text-start">
                                                        
                                                            <textarea class="form-control bg-light border-0" id="productDetails-1" rows="2" placeholder="Product Details"></textarea>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control product-price bg-light border-0" id="productRate-1" step="0.01" placeholder="0.00" required="">
                                                            <div class="invalid-feedback">
                                                                Please enter a rate
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-step">
                                                                <button type="button" class="minus">–</button>
                                                                <input type="number" class="product-quantity" id="product-qty-1" value="0" readonly="">
                                                                <button type="button" class="plus">+</button>
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div>
                                                                <input type="text" class="form-control bg-light border-0 product-line-price" id="productPrice-1" placeholder="$0.00" readonly="">
                                                            </div>
                                                        </td>
                                                        <td class="product-removal">
                                                            <a href="javascript:void(0)" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="5">
                                                            <a href="javascript:new_link()" id="add-item" class="btn btn-info fw-medium" style="  color:aliceblue; border-radius:0px;">
																<i class="bx bx-plus"></i>Add Item </a>
                                                        </td>
                                                    </tr>
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
								<!-- ................ -->
								<!-- <div class="col-12 col-lg-4">
									<label for="InputEmail" class="form-label">Description/و صف الصنف  </label>
									<textarea type="text" class="form-control" id="InputEmail" placeholder="Description Here....."></textarea>
									<span class="input-group-text input-styling"><i class="bx bx-location"></i></span>

								</div>
								<div class="col-12 col-lg-2">
								</div>
								<div class="col-12 col-lg-2">
									<label for="FisrtName" class="form-label">QUANTITY/ الامن والسلامة</label>
									<div class="input-group">
										<span class="input-group-text input-styling"><i class="bx bx-location"></i></span>
										<input type="text" class="form-control" id="input27" placeholder="Vat Reg">
									</div>
								</div>
								<div class="col-12 col-lg-2">
									<label for="FisrtName" class="form-label">UNITE PRICE/ الامن والسلامة</label>
									<div class="input-group">
										<span class="input-group-text input-styling"><i class="bx bx-location"></i></span>
										<input type="text" class="form-control" id="input27" placeholder="Vat Reg">
									</div>
								</div>
								<div class="col-12 col-lg-2">
									<label for="FisrtName" class="form-label">AMOUNT/ الامن والسلامة</label>
									<div class="input-group">
										<span class="input-group-text input-styling"><i class="bx bx-location"></i></span>
										<input type="text" class="form-control" id="input27" placeholder="Vat Reg">
									</div>
								</div>
								<div class="col-12 col-lg-8">
									
								</div>
								
								<div class="col-12 col-lg-4">
									<dl class="row">
							<dt class="col-sm-9" >SUB TOTAL AMOUNT/المبلغ الإجمالي الفرعي</dt>

							<dd class="col-sm-3">1000</dd>
						  
							<dt class="col-sm-4" >DISCOUNT/تخفيض</dt>
							<dd class="col-sm-5"><input type="text" class="form-control" value="10%" placeholder="Discount" /></dd>
							<dd class="col-sm-2">100</dd>

						  
							<dt class="col-sm-9">TOTAL AMOUNT/المبلغ الاجمالي</dt>
							<dd class="col-sm-3">900 </dd>
						  </dl>
								</div>
								
 -->

					
								
								
								



								
								<!-- <div class="col-12 col-lg-6">
									<label for="InputLanguage" class="form-label">Language</label>
									<select class="form-select" id="InputLanguage" aria-label="Default select example">
										<option selected>---</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									  </select>
								</div> -->


								<!-- <div class="col-12 col-lg-6">
									<button class="btn btn-primary px-4" style="margin-left: 40px; background-color: #86888a; color:aliceblue; border-radius:0px;">Save/يحفظ<i class='bx bx-right-arrow-alt ms-2'></i></button>
								</div> -->
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
				

    @endsection
