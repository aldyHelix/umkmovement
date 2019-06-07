    <!-- Start Portfolio Section -->
    <section id="portfolio" class="portfolio-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Hasil Kerja Kami</h3>
                        <p>anda dapat melihat hasil pekerjaan kami disini untuk mendapatkan kepercayaan anda.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- Start Portfolio items max 6 items -->
                    <ul id="portfolio-list">
                    @foreach($portofolio as $p)
                        <li>
                            <div class="portfolio-item">
                                <img src="{{asset('imagesupload/portofolio/300/' .$p->foto_portofolio)}}" alt="..." style="max-height: 300px; max-width:300px; width: expression(this.width > 300 ? 300: true);" />
                                <div class="portfolio-caption">
                                    <h4>{{$p->nama_portofolio}}</h4>
                                    <a href="#portfolio-modal-{{$p->id}}" data-toggle="modal" class="link-1"><i class="fa fa-magic"></i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach    
                    </ul>
                    <!-- End Portfolio items -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->

    <!-- Start Portfolio Modal Section -->
@foreach($portofolio as $p)
    <div class="section-modal modal fade" id="portfolio-modal-{{$p->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="section-title text-center">
                        <h3>{{$p->nama_portofolio}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('imagesupload/portofolio/' .$p->foto_portofolio)}}" class="img-responsive" alt="...">
                    </div>
                    <div class="col-md-6">
                        <p>{{$p->deskripsi_portofolio}}</p>
                        <p>{{date('d-m-Y', strtotime($p->tgl_selesai))}}</p>
                    </div>
                </div><!-- /.row -->  
            </div>
        </div>
    </div>
    <!-- End Portfolio Modal Section -->
    @endforeach