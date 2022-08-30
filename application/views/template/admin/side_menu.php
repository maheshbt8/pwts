<div class="main-sidebar sidebar-style-2">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="<?php echo base_url()?>dashboard"> <img alt="image" src="<?php echo base_url()?>assets/img/logo.png" class="header-logo" /> 
                            <!--<span class="logo-name">Aegis</span>-->
						</a>
					</div>
					<div class="sidebar-user">
						<div class="sidebar-user-picture">
							<img alt="image" src="<?php echo base_url()?>assets/img/userbig.png">
						</div>
						<div class="sidebar-user-details">
							<div class="user-name"><?php echo $user->email;?></div>
							<div class="user-role"><?php echo $user->first_name.''.$user->last_name;?></div>
						</div>
					</div>
					<ul class="sidebar-menu">
						<li class="menu-header">Main</li>
						<li class="dropdown active"><a href="<?php echo base_url('dashboard');?>" class="nav-link "><i
									data-feather="monitor"></i><span>Dashboard</span>
							</a>
							
						</li>
						<?php if($this->ion_auth_acl->has_permission('withdrawal')):?>
						<li class="dropdown "><a href="<?php echo base_url('wallet_transactions/list');?>" class="nav-link "><i
									data-feather="monitor"></i><span>Transactions</span>
							</a>
						</li>
						<?php endif;?>
						<?php if($this->ion_auth_acl->has_permission('vendor')):?>
						<li class="dropdown "><a href="<?php echo base_url('user_services/r');?>" class="nav-link "><i
									data-feather="monitor"></i><span>Our Services</span>
							</a>
							
						</li>
						<?php endif;?>
						<?php if($this->ion_auth_acl->has_permission('admin') || $this->ion_auth_acl->has_permission('hr')):?>
						<li class="dropdown "><a href="<?php echo base_url('admin/master/vendors_filter/0');?>" class="nav-link "><i
									data-feather="monitor"></i><span>Our Vendors</span>
							</a>
							
						</li>
						<?php endif;?>
						<?php if($this->ion_auth_acl->has_permission('admin') || $this->ion_auth_acl->has_permission('hr')):?>
						<li class="dropdown">
                            <a href="#" class="nav-link has-dropdown">
                            <i data-feather="briefcase" class="metismenu-state-icon"></i><span>Vendors</span>
                            </a>
							<ul class="dropdown-menu">
								<li><a class="nav-link" href="<?php echo base_url('vendors/all');?>">All Vendors</a></li>
								<li><a class="nav-link" href="<?php echo base_url('vendors/approved');?>">Approved Vendors</a></li>
                                <li><a class="nav-link" href="<?php echo base_url('vendors/pending');?>">Pending Vendors</a></li>
								<li><a class="nav-link" href="<?php echo base_url('vendors/cancelled');?>">Cancelled Vendors</a></li>
							</ul>
						</li>
						<?php endif;?>
                        
						<?php if($this->ion_auth_acl->has_permission('admin')):?>
    						<li class="dropdown"><a href="#" class="nav-link has-dropdown"><i
    									data-feather="command"></i><span>Listing Master Data</span></a>
    							<ul class="dropdown-menu">
        							<?php if($this->ion_auth_acl->has_permission('list_master')):?>
        								<li><a class="nav-link" href="<?php echo base_url('category/r');?>">Category</a></li>
    								<?php endif;?>
                                    <?php if($this->ion_auth_acl->has_permission('food_items')):?>
                                        <li><a class="nav-link" href="<?php echo base_url('food_item/r');?>">Projects</a></li>
                                    <?php endif;?>
    								<?php if($this->ion_auth_acl->has_permission('list_master')):?>
    									<li><a class="nav-link" href="<?php echo base_url('sub_category/r');?>">Sub Category</a></li>
    								<?php endif;?>
    								<!-- <?php if($this->ion_auth_acl->has_permission('list_master')):?>
    									<li><a class="nav-link" href="<?php echo base_url('brands/r');?>">Brands</a></li>
    								<?php endif;?> -->
    								<?php if($this->ion_auth_acl->has_permission('list_master')):?>
    									<li><a class="nav-link" href="<?php echo base_url('amenity/r');?>">Amenity</a></li>
    								<?php endif;?>
    								<?php if($this->ion_auth_acl->has_permission('list_master')):?>
    									<li><a class="nav-link" href="<?php echo base_url('service/r');?>">Services</a></li>
    								<?php endif;?>
    								<?php if($this->ion_auth_acl->has_permission('list_master')):?>
    									<li><a class="nav-link" href="<?php echo base_url('state/r');?>">States</a></li>
    								<?php endif;?>
    								<?php if($this->ion_auth_acl->has_permission('list_master')):?>
    									<li><a class="nav-link" href="<?php echo base_url('district/r');?>">Districts</a></li>
    								<?php endif;?>
    								<?php if($this->ion_auth_acl->has_permission('list_master')):?>
    									<li><a class="nav-link" href="<?php echo base_url('constituency/r');?>">Constituency</a></li>
    								<?php endif;?>
    							</ul>
    						</li>
						<?php endif;?>
						<!-- <li class="dropdown"><a href="#" class="nav-link ">
                            <i data-feather="mail"></i><span>All Users</span></a>
				        </li> -->
						<!--<li class="menu-header">UI Elements</li>-->
                        <?php if($this->ion_auth_acl->has_permission('admin') || $this->ion_auth_acl->has_permission('hr')):?>
                            <li class="dropdown"><a href="#" class="nav-link has-dropdown"><i
                                        data-feather="copy"></i><span>All Users</span></a>
                                <ul class="dropdown-menu">
                                    <?php if($this->ion_auth_acl->has_permission('emp') || $this->ion_auth_acl->has_permission('hr')):?>
                                        <li><a class="nav-link" href="<?php echo base_url('emp_list/users')?>">Users</a></li>
                                    <?php endif;?>
                                </ul>
                            </li>
                        <?php  endif;?>
						<?php if($this->ion_auth_acl->has_permission('emp') || $this->ion_auth_acl->has_permission('hr')):?>
    						<li class="dropdown"><a href="#" class="nav-link has-dropdown"><i
    									data-feather="copy"></i><span>Employees</span></a>
    							<ul class="dropdown-menu">
        							<?php if($this->ion_auth_acl->has_permission('emp')):?>
        								<li><a class="nav-link" href="<?php echo base_url('employee/r');?>">Add Employee</a></li>
        								<li><a class="nav-link" href="<?php echo base_url('role/r');?>">Add Role</a></li>
    								<?php endif;?>
    								<?php if($this->ion_auth_acl->has_permission('emp') || $this->ion_auth_acl->has_permission('hr')):?>
    									<li><a class="nav-link" href="<?php echo base_url('emp_list/executive')?>">Executives</a></li>
    								<?php endif;?>
    				            </ul>
    						</li>
						<?php  endif;?>
                        	<li class="dropdown"><a href="#" class="nav-link has-dropdown"><i
    									data-feather="copy"></i><span>Settings</span></a>
    							<ul class="dropdown-menu">
        							<?php if($this->ion_auth_acl->has_permission('site_settings')):?>
        								<li><a class="nav-link" href="<?php echo base_url('settings/r');?>">Site Settings</a></li>
    								<?php endif;?>
                                    <?php if($this->ion_auth_acl->has_permission('site_settings')):?>
                                    <li><a class="nav-link" href="<?php echo base_url('promos/r');?>">Promo Codes</a></li>
                                    <!-- <li><a class="nav-link" href="<?php echo base_url('vendor_settings/r');?>">Vendor Settings</a></li> -->
                                    <?php endif;?>
                                    <?php if(!$this->ion_auth_acl->has_permission('admin') && $this->ion_auth_acl->has_permission('food')):?>
                                        <li><a class="nav-link" href="<?php echo base_url('vendor_profile/r');?>">Bank Details</a></li>
                                    <?php endif;?>
    								<?php if($this->ion_auth_acl->has_permission('slider_settings')):?>
    									<li><a class="nav-link" href="<?php echo base_url('sliders/r');?>">Manage Sliders</a></li>
    								<?php endif;?>
    								<?php if($this->ion_auth_acl->has_permission('slider_settings')):?>
    									<li><a class="nav-link" href="<?php echo base_url('category_banner/r');?>">Manage Category Banner</a></li>
    								<?php endif;?>
    				            </ul>
    						</li>
					</ul>
				</aside>
			</div>