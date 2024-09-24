
<style>
	.menu-title{
		font-size: 20px;
	}
	#menu{
		padding-top: 20px;
	}
</style>

<div class="sidebar-wrapper" data-simplebar="true" style="margin-top: 5px;">
			<div class="sidebar-header" style="margin-top: 5px;">
				<!-- <div>
					<img src="assets/images/logo_place.png" class="logo-icon" alt="logo icon">
				</div> -->
				<div>
					<img src="{{asset('assets/images/logo_place.png')}}" class="logo-icon logo-text" style="width: 130px; margin-left:30px;" alt="logo icon">
					<!-- <h4 class="logo-text"></h4> -->
				</div>
				<div class="toggle-icon ms-auto">
				</div>
			 </div>
			<!--navigation-->
			
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				
				<li>
					<a href="{{route('new.invioce')}}" class="">
						<div class="parent-icon"><i class='bx bx-note'></i>
						</div>
						<div class="menu-title">New Invioce</div>
					</a>
				</li>
                <li>
					<a href="javascript:;" class="">
						<div class="parent-icon"><i class='bx bx-file'></i>
						</div>
						<div class="menu-title">My Invioces</div>
					</a>
				</li>
                
				<li>
					<a href="javascript:;">
						<div class="parent-icon">
						</div>
						
						<button class="btn btn-info dropdown-toggle menu-title" style="padding-left: 50px; padding-right: 50px;  border-radius:0%; margin-top: 50px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">Update</button>

					</a>
					<ul>
						<li> <a href="app-emailbox.html"><i class='bx bx-radio-circle'></i>Company Update</a>
						</li>
						<li> <a href="app-chat-box.html"><i class='bx bx-radio-circle'></i>Tex Update</a>
						</li>
						<li> <a href="app-chat-box.html"><i class='bx bx-radio-circle'></i>VAT Amount</a>
						</li>
						
					</ul>
				</li>

				
				
				
				
				
					
					
				
	
				
			</ul>
			<!--end navigation-->
		</div>