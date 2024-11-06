@extends('layout')

@section('title', 'List Product')

@section('content')

<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mb-5 ftco-animate">
					<a href="images/quan-ao-doi-nam-nu-thu-dong.jpg" class="image-popup prod-img-bg"><img
							src="{{ url($product->img )}}" class="img-fluid" alt="Colorlib Template"></a>
				</div>
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					<h3>{{ $product->name }}</h3>
					<div class="rating d-flex">
						<p class="text-left mr-4">
							<a href="#" class="mr-2">5.0</a>
							<a href="#"><span class="ion-ios-star"></span></a>
							<a href="#"><span class="ion-ios-star"></span></a>
							<a href="#"><span class="ion-ios-star"></span></a>
							<a href="#"><span class="ion-ios-star"></span></a>
							<a href="#"><span class="ion-ios-star-outline"></span></a>
						</p>
						<p class="text-left mr-4">
							<a href="#" class="mr-2" style="color: #000;">100 <span
									style="color: #bbb;">Rating</span></a>
						</p>
						<p class="text-left">
							<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
						</p>
					</div>
					<p class="price"><span>{{ $product->price }}</span></p>
					<p>{{ $product->desc }}</p>
					<div class="row mt-4">
						<div class="col-md-6">
							<div class="form-group d-flex">
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="" id="" class="form-control">
										<option value="">S</option>
										<option value="">M</option>
										<option value="">L</option>
										<option value="">XL</option>
									</select>
								</div>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="d-flex align-items-center mb-8 pt-2" style="margin-left: 17px">
							<input id="quantityInput" type="number" name="quantity" value="1" min="1" max="999" onchange="updateQuantity()">
									<div class="input-group-btn">
			
							<script>
								function updateQuantity() {
									var quantity = document.getElementById('quantityInput').value;
									document.getElementById('hiddenQuantity').value = quantity; // Cập nhật giá trị của trường ẩn
								}
							</script>
						</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<p style="color: #000;">80 piece available</p>
						</div>
					</div>
					<form id="addToCartForm" method="POST" action="{{ route('cart.add') }}" class="d-inline">
						@csrf
						<input type="hidden" name="product_id" value="{{ $product->id }}">
						<input id="hiddenQuantity" type="hidden" name="quantity" value="1">
						<button class="btn btn-primary btn-sm text-white p-2" type="submit" style="border-radius: 5px;">
							<a href="">Add To Cart</a> 
						</button>
					</form>
				</div>
			</div>




			<div class="row mt-5">
				<div class="col-md-12 nav-link-wrap">
					<div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist"
						aria-orientation="vertical">
						<a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill"
							href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>

						<a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2"
							role="tab" aria-controls="v-pills-2" aria-selected="false">Manufacturer</a>

						<a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3"
							role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>

					</div>
				</div>
				<div class="col-md-12 tab-wrap">

					<div class="tab-content bg-light" id="v-pills-tabContent">

						<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
							aria-labelledby="day-1-tab">
							<div class="p-4">
								<h3 class="mb-4">Vn shop</h3>
								<p>Shop thời trang của chúng tôi được thiết kế hiện đại và tinh tế, với không gian rộng
									rãi, thoáng đãng, mang đến cảm giác thoải mái cho khách hàng khi mua sắm. Các kệ
									trưng bày được bố trí khoa học, theo từng dòng sản phẩm như thời trang nam, nữ, đồ
									đôi, và phụ kiện, giúp khách hàng dễ dàng tìm kiếm và lựa chọn.</p>
							</div>
						</div>

						<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
							<div class="p-4">
								<h3 class="mb-4">Manufactured By VnShop</h3>
								<p>
									Nhà sản xuất shop thời trang của chúng tôi cam kết mang đến sản phẩm chất lượng cao,
									được sản xuất từ nguồn nguyên liệu chọn lọc và quy trình kiểm soát nghiêm ngặt. Với
									đội ngũ thiết kế sáng tạo và tay nghề thợ may chuyên nghiệp, chúng tôi liên tục cập
									nhật xu hướng thời trang mới nhất để đáp ứng nhu cầu đa dạng của khách hàng. Từ khâu
									ý tưởng, sản xuất đến hoàn thiện, mỗi sản phẩm đều được chăm chút kỹ lưỡng nhằm mang
									đến sự hài lòng tối đa. Chúng tôi không chỉ tập trung vào chất lượng mà còn chú
									trọng đến việc tối ưu hóa giá cả, giúp khách hàng dễ dàng tiếp cận với những mẫu mã
									phong phú và thời thượng.</p>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
							<div class="row p-4">
								<div class="col-md-7">
									<h3 class="mb-4">23 Reviews</h3>
									<div class="review">
										<div class="user-img" style="background-image: url(images/avt1.jfif)"></div>
										<div class="desc">
											<h4>
												<span class="text-left">Trâm Anh</span>
												<span class="text-right">22/10/2024</span>
											</h4>
											<p class="star">
												<span>
													<i class="ion-ios-star"></i>
													<i class="ion-ios-star"></i>
													<i class="ion-ios-star"></i>
													<i class="ion-ios-star"></i>
													<i class="ion-ios-star-outline"></i>
												</span>
												<span class="text-right"><a href="#" class="reply"><i
															class="icon-reply"></i></a></span>
											</p>
											<p>Sản phẩm đẹp, chất lượng vượt mong đợi! Shop tư vấn nhiệt tình và giao
												hàng nhanh chóng. Rất hài lòng!"</p>
										</div>
									</div>
									<div class="review">
										<div class="user-img" style="background-image: url(images/avt2.jfif)"></div>
										<div class="desc">
											<h4>
												<span class="text-left">Ngọc Châu/span>
													<span class="text-right">20/10/2024</span>
											</h4>
											<p class="star">
												<span>
													<i class="ion-ios-star"></i>
													<i class="ion-ios-star"></i>
													<i class="ion-ios-star"></i>
													<i class="ion-ios-star"></i>
													<i class="ion-ios-star"></i>
												</span>
												<span class="text-right"><a href="#" class="reply"><i
															class="icon-reply"></i></a></span>
											</p>
											<p>Mình rất thích phong cách thiết kế của shop, vừa hiện đại vừa tinh tế.
												Chắc chắn sẽ quay lại mua thêm!</p>
										</div>
									</div>
									<div class="review">
										<div class="user-img" style="background-image: url(images/avt4.jfif)"></div>
										<div class="desc">
											<h4>
												<span class="text-left">Trung Dũng</span>
												<span class="text-right">19/10/2024</span>
											</h4>
											<p class="star">
												<span>
													<i class="ion-ios-star"></i>
													<i class="ion-ios-star"></i>
													<i class="ion-ios-star"></i>
													<i class="ion-ios-star"></i>
													<i class="ion-ios-star"></i>
												</span>
												<span class="text-right"><a href="#" class="reply"><i
															class="icon-reply"></i></a></span>
											</p>
											<p> Áo quần đúng chuẩn form, vải mát và dễ chịu khi mặc. Giá cả hợp lý với
												chất lượng, quá tuyệt</p>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="rating-wrap">
										<h3 class="mb-4">Give a Review</h3>
										<p class="star">
											<span>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star"></i>
												(30%)
											</span>
											<span>8386 Reviews</span>
										</p>
										<p class="star">
											<span>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star-outline"></i>
												(90%)
											</span>
											<span>25 Reviews</span>
										</p>
										<p class="star">
											<span>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												(55%)
											</span>
											<span>30 Reviews</span>
										</p>
										<p class="star">
											<span>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												(16%)
											</span>
											<span>16 Reviews</span>
										<p class="star">
											<span>
												<i class="ion-ios-star"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												(3%)
											</span>
											<span>3 Reviews</span>
										</p>
										<p class="star">
											<span>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												(1%)
											</span>
											<span>1 Reviews</span>
										</p>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection