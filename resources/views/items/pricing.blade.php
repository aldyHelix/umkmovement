 <!-- Start Pricing Table Section -->
 <div id="pricing" class="pricing-section">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="col-md-12">
                     <div class="section-title text-center">
                         <h3>Our Pricing Plan</h3>
                         <p class="white-text">Duis aute irure dolor in reprehenderit in voluptate</p>
                     </div>
                 </div>
             </div>
         </div>

         <div class="row">
             <div class="pricing">
                 @foreach($service as $ser)
                 <div class="col-md-12">
                     <div class="pricing-table">
                         <div class="plan-name" style="background: yellow;">
                             <h5 style="color: black;">{{$ser->nama_service}}</h5>
                         </div>
                         <div class="plan-price">
                             <div class="price-value price-value-left"><span>Rp</span> {{number_format($ser->range_1, 0, "." , ".")}}</div>
                             <div class="interval"><small>Sampai dengan</small></div>
                             <div class="price-value price-value-right"><span>Rp</span> {{number_format($ser->range_2, 0, "." , ".")}}</div>
                         </div>
                         <div class="plan-list">
                             <ul>
                                 <li>{{$ser->fitur_1}}</li>
                                 <li>{{$ser->fitur_2}}</li>
                                 <li>{{$ser->fitur_3}}</li>
                                 <li>{{$ser->fitur_4}}</li>
                                 <li>{{$ser->fitur_5}}</li>
                             </ul>
                         </div>
                         <div class="plan-signup">
                             <a href="#price-modal-{{$ser->id}}" data-toggle="modal" class="btn-system btn-small">Read more</a>
                         </div>
                     </div>
                 </div>
                @endforeach 
             </div>
         </div>
         
     </div>
 </div>
 <!-- End Pricing Table Section -->
 <!-- Start Portfolio Modal Section -->
 @foreach($service as $ser)
 <div class="section-modal modal fade" id="price-modal-{{$ser->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                     <h3>{{$ser->nama_service}} Details</h3>
                     <p>{{$ser->tagline}}</p>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-6">
                     <p>{{$ser->deskripsi}}</p>
                 </div>

             </div><!-- /.row -->
         </div>
     </div>
 </div>
 @endforeach
 <!-- End Portfolio Modal Section -->