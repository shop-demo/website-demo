<?php
	return [
				//Menu thể loại
				[
					'name'=>'Danh mục',
					'route'=>'admin.menuList',
					'items'=>[
							['name'=>'Danh sách danh mục',
							 'route'=>'admin.menuList',	
							],
							['name'=>'Thêm danh mục',
							 'route'=>'admin.menuAdd',	
							]								

					]
				],
				[ //Sản phẩm
					'name'=>'sản phẩm',
					'route'=>'admin.sanphamList',
					'items'=>[
							['name'=>'Danh sách sản phẩm',
							 'route'=>'admin.sanphamList',	
							],
							['name'=>'Thêm sản phẩm',
							 'route'=>'admin.sanphamAdd',	
							]
							

					]
				],
				[ //Thành viên
					'name'=>'Thành viên',
					'route'=>'admin.thanhvienList',
					'items'=>[
							['name'=>'Danh sách Thành viên',
							 'route'=>'admin.thanhvienList',	
							],
							['name'=>'Thêm Thành viên',
							 'route'=>'admin.thanhvienAdd',	
							]
							

					]
				],[ //comment-bình luận sản phẩm
					'name'=>'comment',
					'route'=>'listComm',
					'items'=>[
							['name'=>'Danh sách comment',
							 'route'=>'listComm',	
							],
							
							

					]
				],
				[ //Khách hàng
					'name'=>'Khách hàng',
					'route'=>'admin.listKhachhang',
					'items'=>[
							['name'=>'Danh sách khách hàng',
							 'route'=>'admin.listKhachhang',	
							],
					]
				],
				[ //vai trò-roles
					'name'=>'Roles-Vai trò',
					'route'=>'admin.listRole',
					'items'=>[
							['name'=>'Danh sách Roles',
							 'route'=>'admin.listRole',	
							],
					]
				]



	];






?>