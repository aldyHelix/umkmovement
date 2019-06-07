@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div><br />
@endif
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title text-center">
                <h3>Terhubung dengan Kami</h3>
                <p class="white-text">Anda Dapat mengirimkan pesan singkat kepada kami untuk pemesanan dan konsultasi.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            @csrf
                            <input type="text" class="form-control" placeholder="Nama Anda *" id="name" name="nama" required data-validation-required-message="Tolong masukkan nama anda">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Anda *" id="email" name="email" required data-validation-required-message="Tolong sertakan email anda yang aktif.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" placeholder="No Hp yang dapat di hubungi *" id="phone" name="nomer_tlep" required data-validation-required-message="Tolong sertakan no handphone anda yang dapat kami hubungi.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Pesan Anda *" id="message" name="pesan" required data-validation-required-message="Tolong masukkan pesan anda"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                        <div id="success"></div>
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="footer-contact-info col-md-6">
                            <h4>Kontak Kami</h4>
                            <ul>
                                @foreach($kontak as $k)
                                <li><strong>{{$k->nama}} :</strong> {{$k->keterangan}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="clearfix"></div>
        
    </div>
</div>