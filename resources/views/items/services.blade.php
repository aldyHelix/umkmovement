    <!-- Start Feature Section -->
    <section id="service" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Jasa Kami</h3>
                        <p>Kami menawarkan jasa terbaik kepada anda.</p>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($service as $ser)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="feature">
                        <div class="media">
                            <div class="pull-left">
                                <i class="fa fa-{{$ser->logo_name}} fa-2x"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$ser->nama_service}}</h4>
                                <p>{{$ser->tagline}}</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-md-4 -->
            @endforeach    
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- End Feature Section -->