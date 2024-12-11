@extends('layout')

@section('title', 'LIỆN HỆ')

@section('content')

<div class="container-fluid bg-secondary mb-5" style="background-image: url('images/bgr1.jpg'); width: 100%">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
      
  </div>
</div>

<section class="ftco-section contact-section bg-light">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Address:</span> 70 Nguyễn Huệ,Vĩnh Ninh,Thừa Thiên Huế,Việt Nam</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone:</span> <a href="tel://34566666">+84 345 666 666</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:</span> <a href="mailto:Vnshop@gmail.com">Vnshop@gmail.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Website</span> <a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1238.156589141328!2d107.58738095850609!3d16.45748791701312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a147ba6bdbff%3A0x2e605afab4951ad9!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEPDtG5nIG5naGnhu4dwIEh14bq_!5e0!3m2!1svi!2s!4v1718154662562!5m2!1svi!2s"
                        width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        </div>
      </div>
    </section> 

@endsection