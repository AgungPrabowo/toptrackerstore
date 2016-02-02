<ul class="nav nav-list">
					<li class="active">
						<a href="index.html">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>


					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-desktop"></i>
							<span class="menu-text"> User </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?=site_url('/admin/user');?>">
									<i class="icon-double-angle-right"></i>
									Daftar User
								</a>
							</li>
						</ul>
					</li>
					
					<!-- hak akses produk dimiliki operator dan admin -->
					<?php if($level == 'Admin'||$level == 'Operator'):?>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-edit"></i>
							<span class="menu-text"> Produk </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?=site_url('/admin/produk');?>">
									<i class="icon-double-angle-right"></i>
									Daftar Produk
								</a>
							</li>
						</ul>
					</li>
					<?php endif; ?>
					
					<!-- hak akses kategori dimiliki operator dan admin -->
					<?php if($level == 'Admin'||$level == 'Operator'): ?>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-edit"></i>
							<span class="menu-text"> Kategori </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?=site_url('/admin/kategori');?>">
									<i class="icon-double-angle-right"></i>
									Daftar Kategori
								</a>
							</li>
						</ul>
					</li>
					<?php endif; ?>

					<!-- hak akses customer dimiliki marketing dan admin -->
					<?php if($level == 'Admin'||$level == 'Marketing'): ?>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-comments-alt"></i>
							<span class="menu-text"> Customer </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?=site_url('/admin/customer/sales');?>">
									<i class="icon-double-angle-right"></i>
									Daftar Sales
								</a>
							</li>
						</ul>
					</li>
					<?php endif; ?>

					<!-- hak akses pesanan dimiliki marketing dan admin -->
					<?php if($level == 'Admin'||$level == 'Marketing'): ?>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-comments-alt"></i>
							<span class="menu-text"> Pesanan </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?=site_url('/admin/pesanan');?>">
									<i class="icon-double-angle-right"></i>
									Daftar Pesanan
								</a>
							</li>
						</ul>
					</li>
					<?php endif; ?>

				</ul><!--/.nav-list-->