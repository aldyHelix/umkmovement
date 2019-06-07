<!-- Start Latest News Section -->
<section id="latest-news" class="latest-news-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Baca juga Informasi dari kami</h3>
                    <p>Anda dapat membaca tips dan trik untuk memulai usaha anda disini!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="latest-news">
            @foreach($berita as $ber)
                <div class="col-md-12">
                    <div class="latest-post">
                        <img src="{{asset('imagesupload/berita/' .$ber->foto_filename)}}" class="img-responsive" alt="..." style="max-height: 300px; max-width:300px; width: expression(this.width > 300 ? 300: true);">
                        <h4><a href="#">{{$ber->nama_berita}}</a></h4>
                        <div class="post-details">
                            <span class="date">{{date('d-m-Y', strtotime($ber->tgl_berita))}}</span>
                        </div>
                        <p>{{Str::words($ber->isi_berita, $words = 10, $end = '...')}}</p>
                        <a href="#berita-modal-{{$ber->id}}" data-toggle="modal" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            @endforeach    
            </div>
        </div>
    </div>
</section>
<!-- End Latest News Section -->
<!-- Start Portfolio Modal Section -->
@foreach($berita as $ber)
    <div class="section-modal modal fade" id="berita-modal-{{$ber->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h3>{{$ber->nama_berita}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('imagesupload/berita/300/' .$ber->foto_filename)}}" class="img-responsive" alt="..." style="max-height: 300px; max-width:300px; width: expression(this.width > 300 ? 300: true);">
                    </div>
                    <div class="col-md-6">
                        <p>{{date('d-m-Y', strtotime($ber->tgl_berita))}}</p>
                        <p>{{$ber->isi_berita}}</p>
                    </div>
                </div><!-- /.row -->  
            </div>
        </div>
    </div>
    <!-- End Portfolio Modal Section -->
    @endforeach