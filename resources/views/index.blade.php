@include('items.header')
@include('items.navbar')
@include('items.slider')
@include('items.services')
@include('items.factinfo')
@include('items.aboutus')
@include('items.ourteam')
@include('items.pricing')
@if($hasilkerjaselesai > 0)
	@include('items.portofolio')
@endif
@if($countberita)
@include('items.news')
@endif
@if($countpartner > 0)
@include('items.clients')
@endif
<section id="contact" class="contact">
	@include('items.contact')
	@include('items.footer')
</section>
@include('items.loader')
@include('items.closers')