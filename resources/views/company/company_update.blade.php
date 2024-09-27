@extends('index')       
@section('admin') 
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Company</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit</li>
							</ol>
						</nav>
					</div>
					
				</div>
			  <!--end breadcrumb-->

			  <!--start stepper one--> 
			   
			    <hr>
				<div id="stepper1" class="bs-stepper">
				  <div class="card">
					
					
				    <div class="card-body">
					
					  <div class="bs-stepper-content">
						<form  action="{{route('update.company')}}" method="post" enctype="multipart/form-data">
                            @csrf

						  <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
							<h5 class="mb-1 fw-bold">Company Update</h5>
							<p class="mb-4">Enter your company information</p>
                            @foreach($company as $item)
                            <input type="hidden" name="company_id" value="{{$item->id}}">

							<div class="row g-3">
								<div class="col-12 col-lg-12">
									<label for="FisrtName" class="form-label fw-bold">Company Name in English</label>
									<input type="text" name="name_english" value="{{$item->name_english}}" class="form-control" id="FisrtName" placeholder="Company Name">
								</div>
                                <div class="col-12 col-lg-12">
									<label for="FisrtName" class="form-label fw-bold">Company Name in Other Language</label>
									<input type="text" name="name_other_language" value="{{$item->name_other_language}}" class="form-control" id="FisrtName" placeholder="Company Name">
								</div>
								<div class="col-12 col-lg-4">
									<label for="LastName" class="form-label fw-bold">Company VAT</label>
									<input type="text"name="vat" value="{{$item->vat}}" class="form-control" id="LastName" placeholder="Value Added Text Number">
								</div>
								<div class="col-12 col-lg-4">
									<label for="PhoneNumber" class="form-label fw-bold">Company CR</label>
									<input type="text" name="cr" value="{{$item->cr}}" class="form-control" id="PhoneNumber" placeholder="Commercial Registration Number">
								</div>
								<div class="col-12 col-lg-4">
									<label for="InputEmail" class="form-label fw-bold">Company Phone No.</label>
									<input type="text" name="phone" value="{{$item->phone}}" class="form-control" id="InputEmail" placeholder="Company Phone Number">
								</div>
                                @endforeach
                                <div class="col-12">
									<div class="d-flex align-items-center gap-3">
										<button type="submit" class="btn btn-primary px-4">Update<i class='bx bx-store-alt ms-2'></i></button>
									</div>
								</div>
								
								
							</div><!---end row-->
							
						  </div>

						

						  
						  
						</form>
					  </div>
					   
					</div>
				   </div>
				 </div>
				<!--end stepper one-->   
			</div>

@endsection