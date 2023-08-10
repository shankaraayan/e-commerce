<?php $__env->startSection('content'); ?>

<div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
	<div class="page-content">
		<div class="transition-all duration-150 container-fluid" id="page_layout">
			<div id="content_layout">

				<!-- BEGIN: Breadcrumb -->
				<div class="mb-5">
					<ul class="m-0 p-0 list-none">
						<li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
							<a href="<?php echo e(route('admin')); ?>">
								<iconify-icon icon="heroicons-outline:home"></iconify-icon>
								<iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
							</a>
						</li>
					 <a href="<?php echo e(route('admin')); ?>">
						<li class="inline-block relative text-sm text-primary-500 font-Inter ">
							Dashboard
							<iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
						</li>
						<a href="<?php echo e(route('admin.orders.list')); ?>">
						<li class="inline-block relative text-sm text-primary-500 font-Inter">
							Order
							<iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
							</li></a>
							<li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
						 View Order</li>
					</ul>
				</div>
				<!-- END: BreadCrumb -->
				<?php
				$productDetails = json_decode($orders->product_details);

				?>

<div class="lg:col-span-4 col-span-12 mb-5">
	<div class="card h-full">
		<header class="card-header">
			<h4 class="card-title">Order Info</h4>
		 
		</header>
		<div class="card-body p-6">
				<ul class="list space-y-8 mb-5">
						<div class="grid xl:grid-cols-3 grid-cols-1 gap-6">
								<li class="flex space-x-3 rtl:space-x-reverse">
										<div class="flex-1">
												<div class="uppercase text-xl text-slate-600 dark:text-slate-300 mb-1">
												Order Number
												</div>
												<a href="#" class="text-base text-slate-400 dark:text-slate-50">
														<?php echo e($orders->order_id); ?>

												</a>
										</div>
								</li>
								<!-- end single list -->
								<li class="flex space-x-3 rtl:space-x-reverse">
										<div class="flex-1">
												<div class="uppercase text-xl text-slate-600 dark:text-slate-300 mb-1">
												Transaction Id
												</div>
												<a href="#" class="text-base text-slate-400 dark:text-slate-50">
												<?php echo e($orders->transaction_id); ?>

												</a>
										</div>
								</li>
								<li class="flex space-x-3 rtl:space-x-reverse">
										<div class="flex-1">
												<div class="uppercase text-xl text-slate-600 dark:text-slate-300 mb-1">
												Order Date
												</div>
												<a href="#" class="text-base text-slate-400 dark:text-slate-50">
												<?php echo e(date('d-M-Y', strtotime($orders->created_at) )); ?>

												</a>
										</div>
								</li>
						</div>
				</ul>

				<ul class="list space-y-8 mb-4">
					<div class="grid xl:grid-cols-3 grid-cols-1 gap-6">
						<li class="flex space-x-3 rtl:space-x-reverse">
							<div class="flex-1">
								<div class="uppercase text-xl text-slate-600 dark:text-slate-300 mb-2 leading-[12px]">
								 Payment Method
								</div>
								<a href="#" class="text-base text-slate-400 dark:text-slate-50">
									<?php echo e($orders->payment_method); ?>

								</a>
							</div>
						</li>
						<!-- end single list -->
						<li class="flex space-x-3 rtl:space-x-reverse">

							<div class="flex-1">
								<div class="uppercase text-xl text-slate-600 dark:text-slate-300 mb-2 leading-[12px]">
								 Estimated Delivery Date
								</div>
								<a href="#" class="text-base text-slate-400 dark:text-slate-50">
									<?php echo e($orders->estimated_delivery_date); ?>

								</a>
							</div>
						</li>
						 <li class="flex space-x-3 rtl:space-x-reverse">
						<div class="flex-1">
							<div class="uppercase text-xl text-slate-600 dark:text-slate-300 mb-2 leading-[12px]">
								Order status
							</div>
							<span class="badge bg-primary-500 text-primary-500 bg-opacity-30 capitalize"><?php echo e($orders->status); ?></span>
						</div>
					</li>
						</div>
			 </ul>

                    <ul class="list space-y-8 mb-8">
						<div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
								<li class="flex space-x-3 rtl:space-x-reverse">
									<div class="flex-1">
										<div class="uppercase text-lg text-slate-600 dark:text-slate-300 mb-1 ">
											Shipping Address
										</div>
										<a href="#" class="text-base text-slate-400 dark:text-slate-50">
											<div id="shipping_address"></div>
											
											<?php
												$shipping = json_decode($orders->shipping_address,true);
												//dd($shipping);
												if($shipping['shipping_email'] == null){
														$shipping = json_decode($orders->billing_details,true);
												}
											?>

												<?php echo str_replace(', ,',', ',implode(', ',$shipping)); ?>

										</a>
									</div>
								</li>
								<li class="flex space-x-3 rtl:space-x-reverse">
											<div class="flex-1">
											<div class="uppercase text-lg text-slate-600 dark:text-slate-300 mb-1">
													Billing Address
											</div>
											<a href="#" class="text-base text-slate-400 dark:text-slate-50">
													<div id="billing_address"></div>
													<?php
															$billing = json_decode($orders->billing_details,true);
													?>
														<?php echo str_replace(', ,',', ',implode(', ',$billing)); ?>

											</a>
											</div>
								</li>
						</div>
				</ul>

		</div>
	</div>
</div>


<div class="lg:col-span-4 col-span-12 mb-5">
	<div class="card h-full">
		<header class="card-header">
			<h4 class="card-title">Order summary</h4>
		</header>
	 <div class="card">
										<div class="card-body px-6 pb-6">
											<div class="overflow-x-auto -mx-6">
												<div class="inline-block min-w-full align-middle">
													<div class="overflow-hidden ">
														<table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
															<thead class="bg-slate-200 dark:bg-slate-700">
																<tr>

																	<th scope="col" class=" table-th ">
																		Item
																	</th>

																	<th scope="col" class=" table-th ">
																		Price
																	</th>

																	<th scope="col" class=" table-th ">
																		Quantity
																	</th>
																	 <th scope="col" class=" table-th ">
																		Totals (Include VAT)
																	</th>
																	 

																</tr>
															</thead>
															<tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

														<?php
														$productDetailsArray = json_decode($orders['product_details'], true);
														
														?>

														<?php $__currentLoopData = $productDetailsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<tr class="even:bg-slate-50 dark:even:bg-slate-700">
																	<td class="table-td">
																		<?php echo e($product['product_name']); ?>

																	
																	</td>
																	<td class="table-td"><?php echo e(formatPrice($product['price'])); ?></td>
																	<td class="table-td "><?php echo e($product['quantity']); ?></td>

																<?php
																$total = 0;
																$tax = getTaxCountry((int)$product['shipping_country']);
                                    
																	if(empty($tax)){
																		$tax['vat_tax'] = 0;
																	}

																	if(isset($product['solar_product']) && $product['solar_product'] === 'yes'){
																		if($tax['short_code'] == 'DE'){
																			$tax['vat_tax'] = 0;
																		}
																	}
																	$total+=($product['price']*$product['quantity'] + (@$product['price'] * $tax['vat_tax'] /100 * @$product['quantity']) ) ;
																?>
																	<td class="table-td "><?php echo e((formatPrice($total))); ?></td>
																</tr>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	
																		<tr class="even:bg-slate-50 dark:even:bg-slate-700">
																				<td class="table-td" colspan="2" ></td>
																						<td class="table-td" >
																								Total Product Price <br>(Tax Inclusive)
																						<td class="table-td">
																				<?php
																					$fianlPrice = 0;
																					foreach($productDetailsArray as $product){
																						$tax = getTaxCountry((int)$product['shipping_country']);
                                    
																						if(empty($tax)){
																							$tax['vat_tax'] = 0;
																						}

																						if(isset($product['solar_product']) && $product['solar_product'] === 'yes'){
																							if($tax['short_code'] == 'DE'){
																								$tax['vat_tax'] = 0;
																							}
																						}

																							$fianlPrice += ($product['price']*$product['quantity'] + (@$product['price'] * $tax['vat_tax'] /100 * @$product['quantity']) );
																					}
																				?>
																				<?php echo e(formatPrice($fianlPrice)); ?>

																				</td>
																		</tr>

																		<?php   
																				$discount = end($productDetailsArray);

																				if(isset($discount['discount']) && $discount['discount']['type'] == 'flat'){
																						$discountPrice = $discount['discount']['discount_value'] . " ".$discount['discount']['type'] . " OFF";
																				}
																				elseif(isset($discount['discount']) && $discount['discount']['type'] == 'Percentage'){
																						$discountPrice = $discount['discount']['discount_value'] . " ". " %OFF";
																				}
																				else{
																						$discountPrice = '0';
																				}
																		?>
																		
																		<tr class="even:bg-slate-50 dark:even:bg-slate-700">
																				<td class="table-td" colspan="2" ></td>
																						<td class="table-td" >
																								Discount (<?php echo e($discount['discount']['code'] ?? 'N/A'); ?>)
																						<td class="table-td">
																				
																				<?php echo $discountPrice; ?>

																				</td>
																		</tr>
																		<tr class="even:bg-slate-50 dark:even:bg-slate-700">
																				<td class="table-td" colspan="2" ></td>
																						<td class="table-td" >
																								Shippment Price
																						<td class="table-td">
																				<?php
																				$productDetailsArray = end($productDetailsArray);
																				?>
																				<?php echo e(formatPrice($productDetailsArray['shipping_price'])); ?>

																				</td>
																		</tr>
																		<tr class="even:bg-slate-50 dark:even:bg-slate-700">
																				<td class="table-td" colspan="2" ></td>
																						<td class="table-td" >
																								Total
																						<td class="table-td">
																			 <?php
																						if(isset($discount['discount']) && $discount['discount']['type'] == 'flat'){
																						$fianlPrice = $fianlPrice - $discount['discount']['discount_value'];
																						}
																						elseif(isset($discount['discount']) && $discount['discount']['type'] == 'Percentage'){
																								$fianlPrice = $fianlPrice - ($fianlPrice * $discount['discount']['discount_value'] / 100 );
																						}
																						else{
																								$fianlPrice = $fianlPrice;
																						}
																			 ?>
																				<?php echo e(formatPrice($fianlPrice  + $productDetailsArray['shipping_price'])); ?>

																				</td>
																		</tr>

															</tbody>
														</table>
													</div>
												</div>
										 </div>
										</div>
									</div>
	</div>
</div>

</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/orders/view.blade.php ENDPATH**/ ?>