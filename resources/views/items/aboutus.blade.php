<!-- Start About Us Section -->
<section id="about-us" class="about-us-section-1">
    <div class="container">
        <div id="testimonial-carousel" class="testimonials-carousel">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center">
                        <h3>Tentang Kami</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="welcome-section text-center">
                                <img src="{{asset('images3/foto1.jpg')}}" class="img-responsive" alt="..">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="welcome-section text-center">
                                <h4>{{$tentang->headline}}</h4>
                                <div class="border"></div>
                                <p>{{$tentang->deskripsi}}</p>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</section>
<!-- End About Us Section -->


<!-- Start About Us Section 2 -->
<div class="about-us-section-2">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="skill-shortcode">
                    <!-- Progress Bar -->
                    @foreach($service as $ser)
                    <div class="skill">
                        <p style="font-size: 15px">{{$ser->nama_service}}</p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" data-percentage="{{$ser->persentase}}" style="background: yellow;">
                                <span class="progress-bar-span">{{$ser->persentase}}%</span>
                                <span class="sr-only">{{$ser->persentase}}% Complete</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide about-slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{asset('images3/foto4.jpg')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('images3/foto3.jpeg')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('images3/foto2.jpg')}}" alt="">
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Start About Us Section 2 -->