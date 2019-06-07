
<!-- Clients Aside -->
<section id="partner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Partner Kami</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="clients">
            @foreach($partner as $part)
                <div class="col-md-12">
                    <img src="{{asset('imagesupload/' .$part->filename)}}" class="img-responsive" alt="..." style="max-height:75px; max-width:200px; width: expression(this.width > 200 ? 200: true);">
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>